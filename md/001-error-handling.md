## Action Item
- PHP exception, error design
- Laravel exception handler
- sentry register, configuration 
- slack integration(alert rule)

## PHP Exception
聊聊 PHP 的异常（Exception）和错误（Error）处理，这是一个非常有意思的话题，因为 PHP 在这方面经历了一段漫长的“进化史”。

早期的 PHP 处理方式非常“脚本化”，而现代 PHP（PHP 7 和 PHP 8）则变得非常“面向对象”和现代化。

我们可以从以下四个维度来深入了解：

1.  **历史包袱：错误（Error）与异常（Exception）的区别**
2.  **现代变革：PHP 7/8 的 `Throwable` 机制**
3.  **实战：如何优雅地统一处理**
4.  **最佳实践**

---

### 1. 历史包袱：错误 vs 异常

在 PHP 7 之前，这两者是井水不犯河水的：

*   **错误 (Error)**：属于 **PHP 引擎级别** 的问题。
    *   比如：语法错误、调用不存在的函数、除以零、内存溢出。
    *   特点：传统上，很多错误（如 `E_ERROR` 致命错误）会导致脚本直接停止运行，且**无法被 `try-catch` 捕获**。
    *   等级：`E_NOTICE` (提示), `E_WARNING` (警告，不停止脚本), `E_ERROR` (致命，停止脚本), `E_DEPRECATED` (废弃) 等。

*   **异常 (Exception)**：属于 **业务逻辑/代码级别** 的问题。
    *   比如：数据库连接失败、用户输入不合法、逻辑断言失败。
    *   特点：是面向对象的，需要开发者主动 `throw`，并可以被 `try-catch` 捕获。如果不捕获，脚本会停止并报出 `Uncaught Exception`。

**以前的痛点**：
你写了一个 `try-catch`，结果因为调用了一个 `null` 对象的方法，PHP 报了一个 Fatal Error 直接退出了，`catch` 块完全没起作用。这让写出健壮的守护进程或框架变得很困难。

---

### 2. 现代变革：PHP 7/8 的 `Throwable` 机制

PHP 7 引入了一个巨大的改变：**很多原本是致命错误（Fatal Error）的引擎错误，现在变成了可以捕获的异常对象。**

为了保持兼容性，PHP 设计了一个新的接口层级：

```text
interface Throwable
├── class Exception (传统的逻辑异常)
│   ├── RuntimeException
│   └── ...
└── class Error (原本的 PHP 引擎错误)
    ├── TypeError (类型错误)
    ├── ParseError (解析错误，eval中常见)
    ├── ArithmeticError (算术错误)
    └── ...
```

**关键点：**
*   `Exception` 和 `Error` 都实现了 `Throwable` 接口。
*   在 PHP 7+ 中，你可以捕获 `Error` 了！

**示例：**

```php
try {
    // 调用一个不存在的函数，在 PHP 5 是 Fatal Error，直接挂掉
    undefined_function();
} catch (Error $e) {
    // 在 PHP 7+ 这里可以捕获到！
    echo "捕获到了引擎错误: " . $e->getMessage();
} catch (Exception $e) {
    // 这里捕获普通的逻辑异常
    echo "捕获到了逻辑异常: " . $e->getMessage();
}
```

**注意**：如果你想捕获**所有**可能的问题，应该使用 `catch (Throwable $t)`。因为如果你只写 `catch (Exception $e)`，是捕获不到 `TypeError` 这种引擎错误的。

---

### 3. 实战：如何优雅地统一处理

在现代框架（如 Laravel, Symfony）中，我们希望把“传统的 PHP Error（如 Warning, Notice）”也转化为“异常”，以便统一使用 `try-catch` 或全局异常处理器来记录日志。

这通常通过 `ErrorException` 类来实现。

#### 第一步：将 Error 转换为 Exception
我们可以使用 `set_error_handler` 接管 PHP 的非致命错误（Notice, Warning），并将它们手动抛出为异常。

```php
// 注册错误处理器
set_error_handler(function ($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        // 如果这个错误级别被 error_reporting 忽略，就不处理
        return;
    }
    // 将错误“升级”为异常
    throw new ErrorException($message, 0, $severity, $file, $line);
});

// 测试
try {
    $a = 10 / 0; // 这是一个 Warning (PHP 8以前) 或 Error
    // 或者读取不存在的数组键
    $arr = [];
    echo $arr['undefined']; // 这原本是个 Notice
} catch (ErrorException $e) {
    echo "把 Notice/Warning 当作异常捕获了: " . $e->getMessage();
}
```

#### 第二步：全局兜底（最后的防线）
对于那些即使在 `try-catch` 之外抛出的异常，或者确实无法捕获的错误，我们需要最后一道防线来记录日志并给用户返回友好的 "500 Server Error" 页面。

```php
// 1. 捕获未被 catch 的异常 (包括被转换的 ErrorException 和 PHP 7 的 Error)
set_exception_handler(function (Throwable $exception) {
    // 记录日志
    error_log($exception->getMessage());
    // 显示友好的错误页
    echo "系统出小差了，请稍后再试。";
    exit;
});

// 2. 捕获那种极其严重的、连 set_error_handler 都抓不住的 Fatal Error (比如内存耗尽)
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error && ($error['type'] === E_ERROR || $error['type'] === E_PARSE)) {
        // 这里通常只能记录日志，因为脚本已经彻底挂了
        error_log("致命错误退出: " . $error['message']);
    }
});
```

---

### 4. 最佳实践总结

1.  **区分环境**：
    *   **开发环境**：`display_errors = On`，`error_reporting = E_ALL`。你要看到所有问题。
    *   **生产环境**：`display_errors = Off`，`log_errors = On`。绝对不能把错误堆栈直接打印给用户看（有安全风险），必须写入日志文件。

2.  **拥抱 `Throwable`**：
    *   在编写通用的库或中间件时，如果你想捕获一切，请使用 `catch (Throwable $e)` 而不是 `catch (Exception $e)`。

3.  **不要滥用 `@` 抑制符**：
    *   代码里充斥着 `@json_decode(...)` 是很糟糕的习惯。它效率低，且会隐藏潜在的 Bug。正确的做法是先判断或使用 `try-catch`。

4.  **自定义异常类**：
    *   不要什么都 throw `Exception`。
    *   定义具体的业务异常，如 `UserNotFoundException`, `PaymentFailedException`。这样在上层捕获时逻辑更清晰：
        ```php
        try {
            process_payment();
        } catch (PaymentFailedException $e) {
            // 提示用户扣款失败
        } catch (Exception $e) {
            // 系统内部错误
        }
        ```

5.  **Finally 的使用**：
    *   资源释放（关闭文件句柄、数据库连接）一定要放在 `finally` 块中，确保无论是否报错都会执行。

### 总结

PHP 的错误处理已经从“游击队”（散乱的 Notice/Warning/Fatal Error）进化到了“正规军”（统一的 `Throwable` 接口）。

**现代 PHP 开发的核心思想是：把一切错误都当做异常来处理，由框架层统一捕获、记录日志并返回标准响应。**
