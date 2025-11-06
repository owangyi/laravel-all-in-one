# 第一部分 PHP 这门语言
## 第01章：今日的 PHP

我编写 PHP 已经有 10 年了。在这段时间里，我开始真正欣赏并享受这门语言。我也意识到，并不是所有人都会这么认为：许多人觉得 PHP 是一门问题多多、古怪离奇的语言。但事实是，它仍然支撑着互联网上的大部分内容。那为什么我喜欢用它写代码？为什么它会被如此广泛地使用？

在过去 25 年里，PHP 的成功并不因为它是“完美”的语言，而是因为它“易用”。PHP 容易搭建、容易运行，也容易上手编写。不幸的是，它也很容易写出糟糕的代码，但程序却依然能跑起来。网上有大量“快速、简单、粗糙”的教程，教你如何在 PHP 中把事情“搞定”。这种方式确实快捷简单，但往往也不安全、难以维护，而且慢。

更糟糕的是，在相当长一段时间里，你几乎总得写一些“怪异”的代码才能让东西运作——10 年前确实如此。不过这些日子已经过去了，至少在你愿意拥抱 PHP 的现代特性时是这样。过去十年里，PHP 经历了令人瞩目的演进，已经成了我每天都乐于使用的语言。

PHP 早已不是很多人印象中“又老又烂”的那门语言。今天，它被用于构建高利润、超大规模的应用，而且表现很好。随着 PHP 7 和 PHP 8 的到来，语言的语法与特性集都得到了显著提升，性能也大幅改进。与此同时，像 Laravel、Symfony 这样的框架也催生了充满活力、繁荣发展的社区。

当然，PHP 仍不是“完美”的 Web 开发语言。就像 Ruby、Python、Java、C# 和 JavaScript 也都不是完美的一样。然而，PHP 程序员依然能取得出色成果，并在此过程中享受编写代码的乐趣。

在本书中，我们将以“当下”的视角看待 PHP：

- 探索这些年发生了什么改变；
- 思考这门语言未来将如何发展；
- 讨论围绕它的生态与社区；
- 展示如何用 PHP 编写现代化、高性能、可维护的代码。

我们还会覆盖如下主题：

- 新的语法与语言结构；
- PHP 的类型系统；
- 在 PHP 中如何做“正确”的面向对象编程；
- 诸如预加载（preloading）、JIT、FFI 等核心新技术；
- 如何编写可读性强的代码。

最后，我们会一起看看 PHP 的生态：

- MVC 与测试框架；
- 异步 PHP；
- 以及静态分析器等工具链。

读完本书，你会爱上这门“现代的 PHP”。

很自然地，本书会出现大量代码示例，所以我认为先理解这些代码“真正表达了什么”很重要。在接下来的几章中，我们会从基础开始，讨论 PHP 最近一次演进中出现的所有新内容。

## 第02章：新版本（New Versions）

为了让你快速把握现代 PHP 的实践，有必要先搞清楚近十年来语言本身发生了什么变化。自从 PHP 7 的开发与发布开始，PHP 的生态与面貌发生了巨大的变化。我更愿意把 7.x 系列看作这门语言的“成熟期”，就从这里说起。

首先，PHP 7.0 带来了显著的性能提升。内核大量重写，带来肉眼可见的差异。仅仅切换到 PHP 7 或更高版本，你的应用经常就能获得 2～3 倍的速度提升。得益于 PHP 坚守的“向后兼容”价值观，许多旧的 PHP 5 代码库可以较为容易地升级并享受这些红利。

关于“6 到哪去了？”：PHP 5.6 是 5 系列的最后一个版本，理论上后续应是 6。但核心团队在推进 6 的过程中，较晚地意识到内部实现存在重大问题，于是决定再次重做引擎。那时“PHP 6”这个名字已在市面上被使用，为避免混乱，大家决定跳过 6，直接发布 PHP 7。这个故事如今几乎成了社区传说。

虽然 7.0 是里程碑，但它也已成为过去：2015 年发布，五年后停止更新。自 5.x 末期起，PHP 采用了严格的节奏：基本每年一个大版本。大多数版本会获得 2 年的主动支持，再加 1 年的安全支持。也就是说，3 年后应当升级，否则将不再获得安全补丁。

从实践角度看，最好尽量跟随最新稳定版本。每个版本都会有一些小的破坏性变更与弃用，但大部分代码都可以较容易地升级。并且已经有很棒的自动化工具可以帮你扫描并修复升级问题（例如 Rector）。

在接下来的几章里，我们会深入介绍 PHP 7 与 PHP 8 的核心特性。在此之前，先看一些更小但同样重要的变化。

### 尾随逗号（Trailing commas）

直到 PHP 8.0，尾随逗号的支持是逐步加入的：现在可用于数组、函数调用、参数列表以及闭包的 use 语句。是否使用尾随逗号常引发争议，但一个支持它的理由是能让 diff 更清晰，且减少修改已有行的必要。

示例（代码保持原样）：

```
$array = [

    $foo,

    $bar

];

$array = [

    $foo,

    $bar,

    $baz

];

$array = [

    $foo,

    $bar,

    $baz,

];
```

### 数字字面量的可读性（使用下划线分隔）

你可以用下划线来分隔数字以提升可读性。下划线在解析时会被忽略。（示例略）

### 缩进的 heredoc/nowdoc 结束标记

现在允许在 heredoc/nowdoc 的结束标记前保留缩进，解析器会自动忽略对应的前导空白。

示例（代码保持原状）：

```
public function report(): void

{

    $query = ==<SQL

        SELECT * 

        FROM `table`

        WHERE `column` = true;

    SQL;

    // …

}
```

### 异常改进

- throw 变为表达式：可以用于更多位置（例如空合并表达式的右操作数、短闭包内等）。
- 非捕获式 catch：允许不绑定异常变量，仅用于“吞掉”异常以继续流程。

示例（代码保持原状）：

```
// Invalid before PHP 8

$name = $input['name'] =? throw new NameNotFound();

// Valid as of PHP 8

$name = $input['name'] =? throw new NameNotFound();

$error = fn (string $class) => throw new $class(); 

try {

    // Something goes wrong

} catch (Exception) {

    // Just continue

}
```

### 弱引用与 WeakMap

PHP 7.4 引入弱引用（weak references），PHP 8 引入 WeakMap。弱引用不会阻止对象被 GC 回收；WeakMap 则允许用弱引用作为键来缓存与对象相关的计算结果。典型用例是在 ORM 中缓存实体关系的结果，同时避免因为缓存而长期占用内存。

示例（代码保持原状）：

```
class EntityCache 

{

    public function =_construct(

        private WeakMap $cache

    ) {}

    public function getSomethingWithCaching(object $object): object

    {

        if (! isset($this=>cache[$object])) {

            $this=>cache[$object] = $this

                =>computeSomethingExpensive($object);

        }

        return $this=>cache[$object];

    }

    // …

}
```

### JIT（即时编译器）

PHP 8 加入了 JIT，即“即时编译”。它会在运行时寻找热点代码，并将其即时编译为机器码，以期提升执行效率。JIT 对典型 Web I/O 负载的应用提升有限，但在计算密集型场景（如数据处理、图像/音视频编解码、科学计算等）可能带来更明显的收益。后续章节会专门讨论 JIT。

### 更合理的弱比较规则

PHP 的“弱比较”（==）会发生类型转换，容易导致边界行为。在 PHP 8 之前，诸如 `'foo' == 1` 这样的比较会得到 true。PHP 8 修正了这些异常边界：

```
'1' == 1 // true

'1' === 1 // false

'foo' == 1 // false （PHP 8 起）
```

### 错误抑制符的变化

`@` 不再抑制致命错误（fatal error）。它依旧可以抑制非致命错误，例如：

```
$file = @file_get_contents('none/existing/path');
```

若发生致命错误，`@` 将不再生效。

### 底层新组件：FFI 与 Preloading（预加载）

- FFI（外部函数接口）：允许 PHP 直接调用如 C 语言编写的共享库，从而以 Composer 包的形式分发“扩展级”能力，而无需安装传统的底层扩展。
- 预加载（preloading）：在服务器启动时预编译并将代码常驻内存，减少每次请求的框架启动开销。这两个主题会在后文单独成章详述。

以上是本章的若干“零散但重要”的改进。接下来，我们将深入介绍过去几年为 PHP 带来的更大变化与新能力。

## 第03章：PHP 的类型系统（PHP's Type System）

除了性能之外，PHP 7 最重要的变化之一就是类型系统的改进。严格来说，许多关键能力直到 PHP 8 才算补齐，但整体而言，这些年 PHP 的类型系统进步巨大。随着类型系统走向成熟，社区中也出现了充分利用类型信息的工程实践与工具，比如静态分析器（下一章会详细讨论其收益）。本章先聚焦于 PHP 5 到 PHP 8 期间，类型系统到底变了些什么。

首先，引入了更多内建“标量类型”（scalar types），包括整数、字符串、布尔与浮点：

```
public function formatMoney(int $money): string 

{

    // …

}
```

其次（上一段示例其实已经体现了），新增了“返回类型”。在 PHP 7 之前，只能在入参上做类型约束，经常导致 docblock 与函数签名“混搭”的混乱情况；PHP 7 起可直接用返回类型将信息内嵌到签名中，既简洁又能被解释器实际检查。

```
/**

 * @param \App\Offer $offer

 * @param bool $sendMail

 *                         

 * @return \App\Offer

 */

public function createOffer(Offer $offer, $sendMail)

{

    // …

}

public function createOffer(Offer $offer, bool $sendMail): Offer

{

    // …

}
```

除参数与返回类型外，类属性也支持“类型化”（typed properties）。它们与参数/返回类似：可选、按需使用。既可以是标量类型，也可以是对象类型：

```
class Offer 

{

    public string $offerNumber;

    public Money $totalPrice;

}
```

类型化属性引入了一个新的状态：未初始化（uninitialized）。以下示例中，`Money` 没有构造函数，`$amount` 未被赋值：

```
class Money

{

    public int $amount;

}

$money = new Money();

var_dump($money=>amount);

// Fatal error: Typed property Money::$amount

// must not be accessed before initialization
```

要点：

- 未初始化的类型化属性不可读取，否则致命错误；
- 由于检查发生在“访问”时，你可以持有带未初始化属性的对象；
- 允许先写后读（先赋值再读取）；
- 对类型化属性执行 `unset` 会令其回到未初始化，而非类型化属性则会变为 `null`。

从 PHP 7.1 起，支持可空类型（nullable types），用 `?Type` 表示。例如：

```
public function createOrUpdate(?Offer $offer): void

{

    // …

}
```

注意，可空类型与“默认值为 null”是不同概念：可空类型依然需要传参；若希望参数可省略，需要同时提供默认值 `= null`。

```
function createOrUpdate(?Offer $offer): void

{

    // …

}

createOrUpdate();

// Uncaught ArgumentCountError … exactly 1 expected

function createOrUpdate(?Offer $offer = null): void

{

    // …

}

createOrUpdate();
```

PHP 8 引入联合类型（union types），允许返回或参数是多种类型之一，这在某些场景下能更准确表达意图；同时也新增了 `mixed` 等更宽泛的类型，用以描述“可能是任意几种常见类型之一”。

空值（null）在语言界有“十亿美元错误”之称，但现实中 null 在 PHP 里相当常见，于是语言也提供了更稳妥的语法来处理它，包括：

- 空合并运算符 `??`；
- 空合并赋值 `??=`；
- PHP 8 的 Nullsafe 运算符 `?->`，仅在目标不为 null 时才调用方法或访问属性。

```
$invoice=>getPaymentDate()?=>format('Y-m-d');
```

当然，彻底避免使用 null 也是一条路，例如“空对象模式”（Null Object Pattern）：用能代表“缺席”的对象替代 null，从而将分支逻辑收敛到多态之中。示例（保留原样）：

```
class PendingInvoice implements Invoice

{

    public function getPaymentDate(): UnknownDate 

    {

        return new UnknownDate();

    }

}

class PaidInvoice implements Invoice

{

    // …

    public function getPaymentDate(): Date 

    {

        return $this=>date;

    }

}

interface Invoice

{

    public function getPaymentDate(): Date;

}

class Date 

{

    // …

}

class UnknownDate extends Date

{

    public function format(): string

    {

        return '/';

    }

}

$invoice=>getPaymentDate()=>format(); // A date or '/'
```

类型变体（Type Variance）是 PHP 7.4 引入的一项强大能力：允许在继承层次中“改变方法的类型签名”，但需遵循协变/逆变的规则。上面的示例中，接口声明返回 `Date`，而 `PendingInvoice` 返回 `UnknownDate` 即属于返回类型协变。

此外，再强调一次“可空类型 vs 默认 null”的差异：`?Type` 让值可为 null，但调用时仍需提供该参数；若要“可省略”，需再给出 `= null` 的默认值。

本章还涵盖了更多关于 null 处理、未初始化状态、以及与向后兼容相关的小细节。随着这些能力完善，类型系统已成为现代 PHP 实践的基石之一；下一章我们将继续探讨与之相辅相成的静态分析工具链。

## 第04章：静态分析（Static Analysis）

上一章讲了 PHP 的类型系统，但我还没讨论“为什么需要类型系统”。社区中有不少人并不喜欢用类型系统，所以有必要深入讨论其利弊。本章就来做这件事。

很多人认为严格的类型系统能减少运行时错误，甚至说“强类型系统能防止 bug”。这个说法并不完全准确：在强类型语言中你依然可能写出 bug，但类型系统能阻止某些类型的错误发生。

类型系统能部分解决这些问题。假设我们有一个 `rgbToHex` 函数，接收 0-255 之间的三个整数，转换为十六进制字符串。如果没有类型约束：

```
function rgbToHex($red, $green, $blue) {

    // …

}
```

我们需要写很多测试来覆盖各种边界情况：
- 浮点数而非整数
- 超出范围的数字
- null 值
- 字符串
- 参数数量错误
- ……

至少需要写 8 个或更多测试才能相对保证正确性。如果使用类型约束：

```
function rgbToHex(int $red, int $green, int $blue) 

{

    // …

}
```

类型系统可以自动过滤掉很多无效输入，我们不再需要测试：
- 输入是否为数字
- 输入是否为整数
- 输入是否为 null

但 `int` 类型仍然太宽泛：它允许 -100 这样的值，这对 RGB 函数没有意义。一些语言有 `uint`（无符号整数），但它仍然是一个很大的子集。

幸运的是，我们可以用类作为类型来解决这个问题。我们可以创建更具体的类型，比如 `IntWithinRange` 或 `RgbValue`：

```
class RgbValue extends IntWithinRange

{

    public function _construct(int $value) 

    {

        parent=:=_construct(0, 255, $value);

    }

}

function rgbToHex(RgbValue $red, RgbValue $green, RgbValue $blue) 

{

    // …

}
```

这样，大部分测试就变得冗余了，我们只需要测试业务逻辑本身。

**但等等……**

如果类型系统的一个好处是防止运行时错误，那么使用 `RgbValue` 仍然不够：PHP 会在运行时检查类型，并在程序运行时抛出类型错误。换句话说，运行时仍然可能出错，甚至在生产环境中。

这就是静态分析发挥作用的地方。

静态分析工具会在不运行代码的情况下分析你的代码。如果你使用任何 IDE，你已经在使用它了。当 IDE 告诉你对象上有什么方法可用、函数需要什么输入、或者你是否使用了未知变量时，这都得益于静态分析。

运行时错误仍然有其价值：它们会在类型错误发生时阻止代码继续执行，可能防止了实际的 bug。它们还为开发者提供了关于哪里出错的 useful 信息。但程序仍然崩溃了。在生产环境中运行代码之前捕获错误总是更好的解决方案。

一些编程语言甚至将静态分析器包含在编译器中：如果静态分析检查失败，程序将无法编译。由于 PHP 没有独立的编译器，我们需要依赖外部工具来帮助我们。

**PHP 编译器**

虽然 PHP 是解释型语言，但它仍然有编译器。PHP 代码在运行时（例如，请求到来时）即时编译。当然，有缓存机制来优化这个过程，但没有独立的编译阶段。这允许你轻松编写 PHP 代码并立即刷新页面，而不必等待程序编译，这是 PHP 开发的众所周知的优势之一。

幸运的是，有很棒的社区驱动的 PHP 静态分析器可用。它们是独立的工具，查看你的代码及其所有类型提示，让你在不运行代码的情况下发现错误。这些工具不仅查看 PHP 的类型，还查看 doc blocks，这意味着它们比普通 PHP 类型允许更多的灵活性。

以 Psalm 为例，它会分析你的代码并报告错误：

```
Analyzing files==.

░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░   60 / 1038 (5%)

…

░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░ 1038 / 1038 (100%)

ERROR: TooFewArguments

    …

    Too few arguments for method …\PriceCalculatorFactory=:withproduct

ERROR: TooFewArguments 

    …

    Too few arguments for method …\Checkable=:ischeckable

------------------------------

2 errors found

------------------------------
```

这里我们看到 Psalm 扫描了一千多个源文件，并检测到我们在哪里忘记向函数传递正确数量的参数。它通过分析方法签名并将它们与这些方法的调用方式进行比较来实现这一点。当然，类型定义在这个过程中起着重要作用。

大多数静态分析器甚至允许自定义 doc block 注释来描述更复杂的类型关系，这些在运行时不会被 PHP 解释，但会被静态分析器理解。

**静态分析的优势**

静态分析器是非常强大的工具。如果你决定使用它们，你会注意到：
- 可以减少测试数量
- 运行时类型错误很少发生
- 你可以在不运行代码的情况下发现错误

即使不使用高级注解，静态分析器也提供了很大的好处。你可以更确定奇怪的边界情况不可能发生，并且需要编写更少的测试，所有这些都不需要运行代码一次。

**关于泛型**

PHP 目前不支持泛型（generics），但静态分析器可以通过 doc blocks 提供类似的功能。如果 PHP 支持泛型语法，但不运行时解释它，而是使用静态分析器来保证正确性，那会怎样？这实际上就是静态分析的意义所在。

你可能会担心 PHP 不在运行时强制执行这些类型检查。但也可以说，静态分析器在功能上更先进，正是因为它们不在执行代码时运行。我认为这不是一个复杂的概念，事实上，其他语言已经使用了这种方法。想想 TypeScript，它在这些年中变得非常流行。它被编译成 JavaScript，所有类型检查都在编译阶段完成，而不运行代码。

**总结**

我建议在你的项目中使用静态分析器，无论你是否想使用其高级注解。即使没有这些，静态分析器也提供了很大的好处。它是工具箱中的一个很好的工具，也许有一天，我们会看到 PHP 完全拥抱它的好处。

**实践**

想看看静态分析能为你做什么？我建议访问 psalm.dev 并在他们的交互式 playground 中尝试。一些很好的例子展示了静态分析的完整功能。

## 第05章：属性提升（Property Promotion）

在花了两章时间讨论 PHP 的类型系统之后，是时候深入探讨其他特性了。本章我们将介绍 PHP 语法的一个新特性，它能够消除大量不必要的样板代码。

你可能已经注意到，我倾向于尽可能地使用值对象（value objects）和传输对象（data transfer objects）。我喜欢使用只包含数据的简单对象，并在复杂流程中传递它们。在后面的章节中，我会分享更多关于面向对象代码的观点。这些以数据为中心的对象往往伴随着大量的样板代码。以下是一个客户数据传输对象的示例：

```
class CustomerDTO

{

    public string $name;

    public string $email;

    public DateTimeImmutable $birth_date;

    public function =_construct(

        string $name, 

        string $email, 

        DateTimeImmutable $birth_date

    ) {

        $this=>name = $name;

        $this=>email = $email;

        $this=>birth_date = $birth_date;

    }

}
```

在 PHP 8 之前的传统 PHP 中，你需要将每个属性名写四次。得益于构造函数属性提升（constructor property promotion），你可以将上面的代码重写为：

```
class CustomerDTO

{

    public function =_construct(

        public string $name, 

        public string $email, 

        public DateTimeImmutable $birth_date,

    ) {}

}
```

差别很大！让我们深入了解这个特性。

### 工作原理

基本思想很简单：去掉类属性和变量赋值，在构造函数参数前加上 `public`、`protected` 或 `private`。PHP 会采用这个新语法，并在执行代码之前将其转换为普通语法。

所以当你写这样的代码时：

```
class Person

{

    public function =_construct(

        public string $name = 'Brent',

    ) {

        // …

    }

}
```

PHP 会在底层将其转换为：

```
class Person

{

    public string $name;

    public function =_construct(

        string $name = 'Brent'

    ) {

        $this=>name = $name;

        // …

    }

}
```

然后才执行它。

这种代码转换可能有一个更常见的名称，至少如果你对 JavaScript 社区有些熟悉的话：转译（transpiling）。没错：PHP 会在运行时转译自己（并缓存结果以提高性能）。这是一个有趣的想法，考虑到上一章关于静态分析的讨论，以及我分享的语言愿景：添加仅在静态分析期间使用的功能。

让我们进一步看看提升属性可以做什么和不能做什么。

### 只能在构造函数中使用

提升属性只能在构造函数中使用。这似乎很明显，但我认为值得提及，只是为了清楚。

### 组合提升属性和普通属性

并非所有构造函数参数都必须提升——你也可以混合使用：

```
class MyClass

{

    public string $b;

    public function =_construct(

        public string $a,

        string $b,

    ) {

        $this=>b = $b;

    }

}
```

混合使用这些语法时要小心，因为它可能会使你的代码不够清晰。如果你混合使用提升和非提升属性，考虑使用普通构造函数。

### 不能重复

你不能声明一个类属性和一个同名的提升属性。这是相当合乎逻辑的，因为提升属性在运行时会被转译为类属性：

```
class MyClass

{

    public string $a;

    public function =_construct(

        public string $a,

    ) {}

}
```

### 无类型属性

你可以提升无类型属性，尽管如我在前面章节中所述，你最好尽可能使用类型：

```
class MyDTO

{

    public function =_construct(

        public $untyped,

    ) {}

}
```

### 简单的默认值

提升属性可以有默认值，但不允许像 `new …` 这样的表达式：

```
public function =_construct(

    public string $name = 'Brent',

    public DateTimeImmutable $date = new DateTimeImmutable(),

) {}
```

这是有道理的，因为你也不能在普通类属性上使用如此复杂的默认值。

### 在构造函数体内

你可以在构造函数体内读取提升的属性。如果你想进行额外的验证检查，这会很有用。你可以使用局部变量和实例变量，两者都工作正常：

```
public function =_construct(

    public int $a,

    public int $b,

) {

    assert($this=>a == 100);

    if ($b == 0) {

        throw new InvalidArgumentException('…');

    }

}
```

### Doc Blocks

你可以为提升属性添加 doc blocks：

```
class MyClass 

{

    public function =_construct(

        /** @var string */

        public $a,

    ) {}

}

$property = new ReflectionProperty(MyClass=:class, 'a');

$property=>getDocComment(); // "/** @var string */"
```

### 属性（Attributes）

属性（Attributes）是即将到来的章节的主题，所以这里先预览一下：它们允许用于提升属性。转译后，它们会同时出现在构造函数参数和类属性上：

```
class MyClass

{

    public function =_construct(

        =[MyAttribute]

        public $a,  

    ) {}

}
```

会被转译为：

```
class MyClass 

{

    #[MyAttribute]

    public $a;

    public function =_construct(

        =[MyAttribute] $a,

    ) {

        $this=>a = $a;

    }

}
```

### 不允许在抽象构造函数中

我必须承认我不知道抽象构造函数是一回事，我也从未使用过它们。此外，提升属性不允许在它们中使用：

```
abstract class A

{

    abstract public function =_construct(

        public string $a,

    ) {}

}
```

### 允许在 Trait 中

提升属性允许在 trait 中使用。在 trait 中支持提升属性是有道理的，因为转译后的代码会产生一个有效的 trait。在 trait 中是否有构造函数是另一个问题。

```
trait MyTrait

{

    public function =_construct(

        public string $a,

    ) {}

}
```

### 不支持 var

老旧的——我是说，经验丰富的 PHP 开发者——可能在遥远的过去使用过 `var` 来声明类变量，但它不允许与构造函数提升一起使用。只有 `public`、`protected` 和 `private` 是有效关键字。

```
public function =_construct(

    var string $a,

) {}
```

### 可变参数不能被提升

由于你无法转换为数组类型，因此无法提升可变参数。

```
public function =_construct(

    public string ==.$a,

) {}
```

### 你知道吗

可变函数使用 rest 运算符 `==.`，这是 PHP 5.6 中添加的功能。它允许你定义一个函数输入变量，该变量将接受所有"剩余"的变量并将它们组合成一个数组。换句话说：`func_get_args()` 的简写。我们将在第 9 章中介绍可变函数。

### Reflection：isPromoted

`ReflectionProperty` 和 `ReflectionParameter` 都有一个新的 `isPromoted()` 方法来检查类属性或方法参数是否被提升。

### 继承

由于 PHP 构造函数不需要遵循父构造函数的声明，所以没什么可说的：继承是允许的。如果你需要将属性从子构造函数传递给父构造函数，你需要手动传递它们：

```
class A

{

    public function =_construct(

        public $a,

    ) {}

}

class B extends A

{

    public function =_construct(

        $a,

        public $b,    

    ) {

        parent=:=_construct($a);

    }

}
```

关于属性提升，这就是全部内容了。我最初对使用它们犹豫不决，但一旦我尝试了，我很快就习惯了它们。我必须承认：提升属性可能是我最喜欢的 PHP 8 特性。

## 第06章：命名参数（Named Arguments）

就像构造函数属性提升一样，命名参数是 PHP 8 中的一个新语法特性。它们允许你根据函数中的参数名称传递变量，而不是根据它们在参数列表中的位置。以下是一个使用内置 PHP 函数的示例：

```
setcookie(

    name: 'test',

    expires: time() + 60 * 60 * 2,

    secure: true,

);
```

以及用于构造 DTO 的示例：

```
class CustomerData

{

    public function =_construct(

        public string $name,

        public string $email,

        public int $age,

    ) {}

}

$data = new CustomerData(

    age: $input['age'],

    email: $input['email'],

    name: $input['name'],

);
```

命名参数是一个很棒的新特性，将对我日常编程产生重大影响。你可能想知道细节。如果你传递了错误的名称会怎样？或者如何组合有序参数和命名参数？让我们深入探讨所有这些问题。

### 为什么需要命名参数？

这个特性是一个备受争议的特性。有人对添加它们表示担忧，特别是关于向后兼容性。如果你维护一个包并决定更改参数名称，这现在算作破坏性更改。以这个包提供的方法签名为例：

```
public function toMediaCollection(

    string $collection, 

    string $disk = null

): void { /* … */ }
```

如果这个包的用户使用命名参数，他们会写类似这样的代码：

```
$media=>toMediaCollection(

    collection: 'default',

    disk: 'aws',

);
```

现在想象一下，作为包维护者，你想将 `$collection` 的名称更改为 `$collectionName`。这意味着用户编写的代码会中断。

我同意这在理论上是问题，但作为开源维护者，我从经验中知道这种变量名称更改很少发生。我能记得我们进行这种更改的唯一几次是因为我们正在开发新的主要版本，允许破坏性更改。

虽然我认识到这个理论问题，但我坚信在实践中这不是问题。这种名称更改很少发生。即使你作为开源维护者真的不想被管理变量名称所困扰，你仍然可以在包的 README 文件中添加警告。它可以告诉用户变量名称可能会更改，他们应该自行承担使用命名参数的风险。我更喜欢只是记住它，并记住将来更改变量名称时应该小心。没什么大不了的。

尽管有这个小的不便，我认为命名参数的好处要重要得多。在我看来：命名参数将允许我们编写更清晰、更灵活的代码。

### 命名参数的优势

首先，命名参数允许我们跳过默认值。再看一下 cookie 示例：

```
setcookie(

    name: 'test',

    expires: time() + 60 * 60 * 2,

    secure: true,

);
```

它的方法签名实际上是：

```
setcookie( 

    string $name, 

    string $value = '', 

    int $expires = 0, 

    string $path = '', 

    string $domain = '', 

    bool $secure = false, 

    bool $httponly = false,

) : bool
```

在使用命名参数的示例中，我们不需要设置 cookie 的 `$value`，但我们确实需要设置过期时间。命名参数使这个方法调用更加简洁，因为否则它看起来会是这样：

```
setcookie(

    'test',

    '',

    time() + 60 * 60 * 2,

    '',

    '',

    true

);
```

除了跳过具有默认值的参数外，还有澄清哪个变量做什么的好处，这对于具有大方法签名的函数特别有用。我们可以说很多参数通常是代码异味；无论如何，我们仍然必须处理它们。所以有一个好的方法总比没有好。

### 命名参数详解

让我们看看命名参数可以做什么和不能做什么。

### 组合有序参数和命名参数

首先，它们可以与未命名（也称为有序）参数组合使用。在这种情况下，有序参数必须始终放在前面。以我们之前的 DTO 示例为例：

```
class CustomerData

{

    public function =_construct(

        public string $name,

        public string $email,

        public int $age,

    ) {}

}
```

你可以这样构造它：

```
$data = new CustomerData(

    $input['name'],

    age: $input['age'],

    email: $input['email'],

);
```

但是，在命名参数之后使用有序参数会抛出错误：

```
$data = new CustomerData(

    age: $input['age'],

    $input['name'],

    email: $input['email'],

);
```

### 数组展开

其次，可以将数组展开与命名参数结合使用：

```
$input = [

    'age' => 25,

    'name' => 'Brent',

    'email' => 'brent@spatie.be',

];

$data = new CustomerData(==.$input);
```

**注意！**

就像可变函数一样，可以使用 `==.` 运算符展开数组。我们将从输入数组中获取所有参数并将它们展开到函数中。如果数组包含键值，这些键名也会映射到命名属性，这就是上面示例中发生的情况。

但是，如果数组中缺少必需的条目，或者有一个未列为命名参数的键，则会抛出错误：

```
$input = [

    'age' => 25,

    'name' => 'Brent',

    'email' => 'brent@spatie.be',

    'unknownProperty' => 'This is not allowed',

];

$data = new CustomerData(==.$input);
```

可以在输入数组中组合命名参数和有序参数，但前提是有序参数遵循与之前相同的规则：它们必须放在前面！

```
$input = [

    'Brent',

    'age' => 25,

    'email' => 'brent@spatie.be',

];

$data = new CustomerData(==.$input);
```

不过，混合使用有序参数和命名参数时要小心。我个人认为它们根本不会提高可读性。

### 可变函数

如果你使用可变函数，命名参数将以其键名传递到可变参数数组中。看以下示例：

```
class CustomerData

{

    public static function new(==.$args): self

    {

        return new self(==.$args);

    }

    public function =_construct(

        public string $name,

        public string $email,

        public int $age,

    ) {}

}

$data = CustomerData=:new(

    email: 'brent@spatie.be',

    age: 25,

    name: 'Brent',

);

// [

//     'age' => 25,

//     'email' => 'brent@spatie.be',

//     'name' => 'Brent',

// ]
```

## 第07章：属性（Attributes）

属性（Attributes）是 PHP 8 引入的元数据功能，允许为类、方法、属性等添加注解信息。本章详细介绍了属性的使用方式、创建自定义属性、通过反射读取属性等内容。

### 概述

让我们看一个在真实场景中使用属性的例子：

```
use Support\Attributes\ListensTo;

class ProductSubscriber

{

    =[ListensTo(ProductCreated=:class)]

    public function onProductCreated(ProductCreated $event) { /* … */ }

    =[ListensTo(ProductDeleted=:class)]

    public function onProductDeleted(ProductDeleted $event) { /* … */ }

}
```

这里我们看到属性用于事件监听器：当方法被 `ListensTo` 标记时，注册事件监听器时可以使用这个属性来构建哪个方法处理哪个事件的映射。

### 属性是否冗余？

当我在网上展示 ListensTo 示例时，有人告诉我你可以直接查看方法的类型参数来知道它处理什么事件，添加专用属性似乎是冗余的。对于简单的应用程序，我同意，但让我们考虑以下示例。

想象一个 `LoggableEvent` 接口，事件可以实现它：

```
interface LoggableEvent

{

    public function getEventName();

}
```

以及一个 `MailLogEventSubscriber`：

```
class MailLogEventSubscriber

{

    public function handleLoggableEvent(LoggableEvent $event)

    {

        // …

    }

}
```

现在想象——因为业务需要——一些 `LoggableEvent` 对象应该通过发送日志邮件来处理，但不是全部。如果你依赖方法签名来确定它们应该处理什么事件，你最终会得到这样的代码：

```
class MailLogEventSubscriber

{

    public function handleOrderCreatedEvent(

        OrderCreatedEvent $event

    ): void {

        $this->actuallyHandleTheEvent($event);

    }

    public function handleInvoiceCreatedEvent(

        InvoiceCreatedEvent $event

    ): void {

        $this->actuallyHandleTheEvent($event);

    }

    public function handleInvoicePaidEvent(

        InvoicePaidEvent $event

    ): void {

        $this->actuallyHandleTheEvent($event);

    }

    private function actuallyHandleTheEvent(

        LoggableEvent $event

    ): void {

        // …

    }

}
```

使用属性，你可以这样写：

```
class MailLogEventSubscriber

{

    #[

        ListensTo(OrderCreatedEvent::class),

        ListensTo(InvoiceCreatedEvent::class),

        ListensTo(InvoicePaidEvent::class),

    ]

    public function handleLoggableEvent(LoggableEvent $event)

    {

        // …

    }

}
```

现在，如果你正在构建一个只有几十个事件的应用程序，简单的方法就可以了。但如果你要处理数千个事件，就会变得很繁琐。在这些情况下，我更喜欢显式的方法，因为它最终会节省时间。

### 工作原理

回到我们的例子。这个 `ListensTo` 属性是如何工作的？首先，自定义属性是简单的类，用 `=[Attribute]` 属性注解。看起来是这样的：

```
=[Attribute]

class ListensTo

{

    public function =_construct(

        public string $event

    ) {}

}
```

就是这样——非常简单，对吧？记住属性的目标：它们旨在为类和方法添加元数据，仅此而已。

我们仍然需要读取该元数据并在某处注册我们的订阅者。你可以在实例化事件总线时读取属性，在我的 Laravel 项目中，我会使用服务提供者来这样做。

在 Laravel 中，服务提供者用于在启动时设置应用程序。可以有多个服务提供者，每个都做自己的事情。常见的用例是容器注册，这是我们在下一章中要讨论的主题。

在这个例子中，我们会从某些文件中读取属性并将它们注册为事件订阅者。

以下是样板设置，提供一些上下文：

```
class EventServiceProvider extends ServiceProvider

{

    // In real life scenarios, 

    //  we'd automatically resolve and cache all subscribers

    //  instead of using a manual array.

    private array $subscribers = [

        ProductSubscriber=:class,

    ];

    public function register(): void

    {

        // The event dispatcher is resolved from the container

        $eventDispatcher = $this=>app=>make(EventDispatcher=:class);

        foreach ($this=>subscribers as $subscriber) {

            // We'll resolve all listeners

            //  (methods with the ListensTo attribute) 

            //  and add them to the dispatcher.

            foreach (

                $this=>resolveListeners($subscriber) 

                as [$event, $listener]

            ) {

                $eventDispatcher=>listen($event, $listener);

            }       

        }       

    }

    private function resolveListeners(string $subscriberClass): array

    {

        // Return an array with [eventName => handler] items. 

    }

}
```

你可以看到我们在 for 循环中使用了 `as [$event, $listener]` 语法。这被称为数组解构，也是我们将在下一章中讨论的内容。

最有趣的是 `resolveListeners` 的实现。它是这样的：

```
private function resolveListeners(string $subscriberClass): array

{

    $reflectionClass = new ReflectionClass($subscriberClass);

    $listeners = [];

    foreach ($reflectionClass=>getMethods() as $method) {

        $attributes = $method=>getAttributes(ListensTo=:class);

        foreach ($attributes as $attribute) {

            $listener = $attribute=>newInstance();

            $listeners[] = [

                // The event that's configured on the attribute

                $listener=>event,

                // The listener for this event 

                [$subscriberClass, $method=>getName()],

            ];

        }

    }

    return $listeners;

}
```

使用反射，我们可以从类的方法中读取属性，并使用 `$attribute=>newInstance()` 调用实例化自定义属性类。这是一个重要的细节：我们的属性对象只有在调用 `newInstance()` 时才会被构造，而不是在加载时；它不会事先神奇地发生。当构造属性时，它会接受我们在编写 `=[ListensTo(OrderCreatedEvent=:class)]` 时给它的参数，并将它们传递给 `ListensTo` 构造函数。

这意味着，从技术上讲，你甚至不需要构造自定义属性。你可以直接调用 `$attribute=>getArguments()`。另一方面，实例化类意味着你可以使用构造函数的灵活性以任何你喜欢的方式解析输入。

另一个值得提及的是 `ReflectionMethod=:getAttributes()` 的使用——返回方法的所有属性的函数。你可以传递两个参数给它，以过滤其输出。为了理解这种过滤，首先你需要了解关于属性的另一件事：可以在同一个方法、类、属性或常量上添加多个属性。例如，你可以这样做：

```
#=[

    Route(Http=:POST, '/products/create'),

    Autowire,

]

class ProductsCreateController

{

    public function =_invoke() { /* … */ }

}
```

我提出 `Autowire` 属性只是一个例子。它表示这个类可以被依赖容器自动装配——这是我们在后面的章节中要深入讨论的主题。

假设你正在解析控制器路由，只对 `Route` 属性感兴趣。在这种情况下，你可以将 `Route` 类作为过滤器传递：

```
$attributes = $reflectionClass=>getAttributes(Route=:class);
```

你可以传递给 `getAttributes()` 的第二个参数会改变过滤的方式。默认情况下，它只会匹配完全匹配给定类名的属性。但是，通过使用 `ReflectionAttribute=:IS_INSTANCEOF`，你可以检索实现给定接口的所有属性。例如，假设你正在解析由几个潜在属性组成的容器定义：

```
$attributes = $reflectionClass=>getAttributes(

    ContainerAttribute=:class, 

    ReflectionAttribute=:IS_INSTANCEOF

);
```

如果我们的 `Autowire` 属性实现了 `ContainerAttribute` 接口，只有那个会被返回，而不是 `Route` 属性。这是一个很好的简写，内置在核心中。

### 属性详解

现在你已经了解了属性在实践中是如何工作的，是时候了解更多理论了，确保你彻底理解它们。首先，我之前简要提到过：属性可以添加到多个位置。你可以将它们添加到类中，以及匿名类中：

```
=[ClassAttribute]

class MyClass { /* … */ }

$object = new =[ObjectAttribute] class () { /* … */ };
```

属性和常量：

```
=[PropertyAttribute]

public int $foo;

=[ConstAttribute]

public const BAR = 1;
```

方法和函数：

```
=[MethodAttribute]

public function doSomething(): void { /* … */ }

=[FunctionAttribute]

function foo() { /* … */ }
```

以及闭包：

```
$closure = =[ClosureAttribute] fn () => /* … */;
```

还有方法和函数参数：

```
function foo(=[ArgumentAttribute] $bar) { /* … */ }
```

如果你想更精细地控制自定义属性的使用位置，可以配置它们，使其只能在特定位置使用。例如，你可以让 `ClassAttribute` 只能用于类，而不能用于其他地方。

通过向属性类上的 `Attribute` 属性传递标志来选择此行为。

它看起来是这样的：

```
=[Attribute(Attribute=:TARGET_CLASS)]

class ClassAttribute

{

}
```

以下标志可用：

```
Attribute=:TARGET_CLASS

Attribute=:TARGET_FUNCTION

Attribute=:TARGET_METHOD

Attribute=:TARGET_PROPERTY

Attribute=:TARGET_CLASS_CONSTANT

Attribute=:TARGET_PARAMETER

Attribute=:TARGET_ALL
```

这些是位掩码标志，因此你可以使用二进制 OR 操作组合它们。

```
=[Attribute(Attribute=:TARGET_METHOD | Attribute=:TARGET_FUNCTION)]

class FunctionAttribute

{

}
```

继续，属性可以在 doc blocks 之前或之后声明：

```
/** @return void */

=[MethodAttribute]

public function doSomething(): void { /* … */ }
```

属性可以接受零个、一个或多个参数，这些参数由属性的构造函数定义：

```
=[Attribute]

class ListensTo

{

    public function =_construct(

        public string $event

    ) {}

}

=[ListensTo(ProductCreatedEvent=:class)]
```

关于你可以传递给属性的参数类型，你已经看到允许常量、使用 `=:class` 的类名和标量类型。实际上，属性只接受所谓的常量表达式作为输入参数。这意味着允许标量表达式——甚至位移——以及常量、数组和数组解包、布尔表达式和空合并运算符：

```
=[AttributeWithScalarExpression(1 + 1)]

=[AttributeWithClassNameAndConstants(PDO=:class, PHP_VERSION_ID)]

=[AttributeWithClassConstant(Http=:POST)]

=[AttributeWithBitShift(4 => 1, 4 =< 1)]
```

但是，你不能给属性一个类的新实例或静态方法调用——这些不是常量表达式：

```
=[AttributeWithError(new MyClass())]

=[AttributeWithError(MyClass=:staticMethod())]
```

默认情况下，属性不能在同一位置重复两次：

```
=[

    ClassAttribute,

    ClassAttribute,

]

class MyClass { /* … */ }
```

但是可以改变这种行为，再次使用配置标志，就像目标配置一样：

```
=[Attribute(Attribute=:IS_REPEATABLE)]

class ClassAttribute

{

}
```

请注意，所有配置标志只有在调用 `$attribute=>newInstance()` 时才会被验证，而不是更早。这意味着在错误的位置使用属性可能会被忽略，除非你通过反射或静态分析评估该属性。

### 内置属性

一旦属性的基础 RFC 被接受，就有了向核心添加内置属性的新机会。一个这样的例子是 `=[Deprecated]` 属性，以及 `=[Jit]` 属性。我相信我们将来会看到越来越多的内置属性，但现在，一个都不存在。

不过，PhpStorm IDE 做了一件非常有趣的事情：他们在 PhpStorm 中添加了自己的自定义属性。这些属性不是你的代码库中的真实类，但正如我们所看到的，只有在调用 `$reflectionAttribute=>newInstance()` 时才需要真实的属性类。PhpStorm 提供的内置属性无法实例化，因为它们不是真实的类；但它们可以被 IDE 理解以添加更丰富的静态分析选项。一个例子是 `=[ArrayShape]` 属性，它可以告诉 PhpStorm 数组中到底有什么：

```
=[ArrayShape([

    'key1' => 'int',

    'key2' => 'string',

    'key3' => 'Foo',

    'key3' => Foo=:class,

])]

function legacyFunction(…): array
```

通过添加这样的属性，PhpStorm 现在确切知道 `legacyFunction` 返回的数组中的键是什么，以及每个键的类型。不过，我会犹豫是否编写依赖于数组键和类型的代码（我会为此使用 DTO）。但是，`=[ArrayShape]` 是记录遗留代码库的绝佳方法，在那里你并不总是能控制其设计。顺便说一下，PhpStorm 还提供了更多内置属性：`=[Deprecated]`、`=[Immutable]`、`=[Pure]`、`=[ExpectedValues]`，甚至更多。

看到 PhpStorm 如何拥抱我们之前讨论的静态分析思维很有趣：我们不需要进行任何运行时检查，因为静态分析器（在这种情况下是 PhpStorm）可以在运行代码之前告诉我们做错了什么，这要归功于属性。不过，我们需要小心，静态分析工具要保持它们之间的一些互操作性。如果每个工具都决定实现自己的属性版本，它不会使开发人员体验更好。

看看在核心和第三方静态分析器中添加什么样的属性，以及它们如何协同工作，这将很有趣。

## 第08章：短闭包（Short Closures）

有些人可能认为它们早就该有了，但自 PHP 7.4 起终于支持了：短闭包。不用再写像传递给 `array_map` 回调这样的闭包：

```
$itemPrices = array_map(

    function (OrderLine $orderLine) {

        return $orderLine=>item=>price;

    }, 

    $order=>lines

);
```

你可以用简短的形式写它们：

```
$itemPrices = array_map(

    fn ($orderLine) => $orderLine=>item=>price,

    $order=>lines

);
```

短闭包与普通闭包有两个主要区别：

- 它们只支持一个表达式，该表达式也是返回语句
- 它们不需要 `use` 语句来访问外部作用域的变量

### 其他特性

在其他方面，它们的行为与普通闭包相同：它们支持引用、参数展开、类型提示、返回类型……说到类型，你可以用更严格类型化的方式重写前面的示例：

```
$itemPrices = array_map(

    fn (OrderLine $orderLine): int => $orderLine=>item=>price,

    $order=>lines

);
```

还有一件事，引用也是允许的，既适用于参数，也适用于返回值。如果你想通过引用返回一个值，应该使用以下语法：

```
fn&($x) => $x
```

### 不支持多行

你可能已经注意到了：短闭包只能有一个表达式；它可能为了格式化而跨越多行，但必须始终是一个表达式。原因如下：短闭包的目标是减少冗长。`fn` 当然在所有情况下都比 `function` 短。然而，有人认为如果你要处理多行函数，使用短闭包的好处就少了。毕竟，多行闭包根据定义已经更冗长了；所以能够跳过两个关键字（`function` 和 `return`）不会有太大区别。

虽然我能想到我的项目中有很多单行闭包，但也有大量的多行闭包，我承认在这些情况下缺少短语法。不过，有希望：将来可能会添加多行短闭包，但我们还需要再等一段时间。

### 外部作用域的值

短闭包和普通闭包之间的另一个重要区别是，短闭包不需要 `use` 关键字就能访问外部作用域的数据：

```
$modifier = 5;

array_map(fn ($x) => $x * $modifier, $numbers);
```

重要的是要注意，你无法修改外部作用域的变量：它们按值绑定，而不是按引用绑定，除非你处理的是始终按引用传递的对象。顺便说一下，这是对象在任何地方（不仅仅是短闭包中）的默认行为。

一个例外当然是 `$this` 关键字，它的行为与普通闭包完全相同：

```
array_map(fn ($x) => $x * $this=>modifier, $numbers);
```

说到 `$this`，你可以将短闭包声明为静态，这意味着你无法在其中访问 `$this`：

```
static fn ($x) => $x * $this=>modifier;

// Fatal error: Uncaught Error: Using $this when not in object context
```

关于短闭包，目前就这些了。你可以想象还有改进的空间。人们一直在讨论多行短闭包以及能够在类方法中使用该语法。我们将不得不等待未来版本，看看短闭包是否会以及如何发展。

## 第09章：数组操作（Working with Arrays）

我在前面的章节中已经使用了一些数组特定的语法，所以似乎应该花一些时间来专门讨论它们。现在不用担心：我不会讨论 PHP 中所有与数组相关的函数，它们太多了，这会相当无聊。不，我只讨论过去几年中数组和 PHP 语法使成为可能的内容。在处理数组时添加了很多好东西。我们将在本章中讨论所有这些。

### Rest 和 Spread 运算符

你已经在之前的示例中看到了 `==.` 运算符的两种用法：你可以使用它来"展开"数组元素并将它们单独传递给函数，以及创建可变函数，将"剩余"参数收集到数组中。

让我们快速回顾一下。这里我们将数组元素展开到函数中：

```
$data = ['a', 'b', 'c'];

function handle($a, $b, $c): void { /* … */ }

handle(==.$data);
```

这里，我们使用可变函数，它收集剩余参数并将它们存储在数组中：

```
function handle($firstInput, ==.$listOfOthers) { /* … */ }

handle('a', 'b', 'c', 'd');
```

在这种情况下，`$firstInput` 将是 `'a'`，而 `$listOfOthers` 将是一个数组：`['b', 'c', 'd']`。

关于可变函数的一个有趣的事情是，你也可以为它们添加类型提示，所以你可以说传递给 `$listOfOthers` 的所有变量应该是，例如，字符串：

```
function handle($firstInput, string ==.$listOfOthers) { /* … */ }
```

你也可以将两者结合起来。以下是一个通用的静态构造函数实现，适用于任何类。它被包装在 trait 中，这样你就可以在你想要的任何类中使用它：

```
trait Makeable

{

    public static function make(==.$args): static

    {

        return new static(==.$args);

    }

}
```

在这个示例中，我们接受可变数量的输入参数，然后再次将它们展开到构造函数中。这意味着，无论构造函数接受多少变量，我们都可以使用 `make` 将这些变量传递给它。以下是在实践中的样子：

```
class CustomerData

{  

    use Makeable;

    public function =_construct(

        public string $name,

        public string $email,

        public int $age,

    ) {}

}

$customerData = CustomerData=:make($name, $email, $age);

// Or you could use array spreading again:

$customerData = CustomerData=:make(==.$inputData);
```

关于数组展开还有一件事要提：该语法也可以用于组合数组：

```
$inputA = ['a', 'b', 'c'];

$inputB = ['d', 'e', 'f'];

$combinedArray = [==.$inputA, ==.$inputB];

// ['a', 'b', 'c', 'd', 'e', 'f']
```

这是一种合并两个数组的简写方式。不过有一个重要的注意事项：只有当输入数组只有数字键时才允许使用这种数组内展开语法——不允许文本键。

### 数组解构

数组解构是将元素从数组中提取出来的操作——它是关于将数组"解构"为单独的变量。你可以使用 `list` 或 `[]` 来执行此操作。注意这个词是"destructure"（解构），而不是"destruction"（破坏）！

以下是它的样子：

```
$array = [1, 2, 3]; 

// Using the list syntax:

list($a, $b, $c) = $array;

// Or the shorthand syntax:

[$a, $b, $c] = $array;

// $a = 1

// $b = 2

// $c = 3
```

无论你更喜欢 `list` 还是它的简写 `[]`，都由你决定。人们可能会争辩说 `[]` 与简写数组语法有歧义，因此更喜欢 `list`。我将在代码示例中使用简写版本，因为这是我的偏好。我认为由于 `[]` 符号在赋值运算符的左侧，很明显它不是数组定义。

所以让我们看看使用这种语法可以做什么。

### 跳过元素

假设你只需要数组的第三个元素；前两个可以通过简单地不提供变量来跳过：

```
[, , $c] = $array;

// $c = 3
```

还要注意，对具有数字索引的数组进行数组解构将始终从索引 0 开始。以下面的数组为例：

```
$array = [

    1 => 'a',

    2 => 'b',

    3 => 'c',

];
```

提取的第一个变量将是 `null`，因为没有索引 0 的元素。这似乎是一个缺点，但幸运的是还有更多可能性。

### 非数字键

PHP 7.1 允许数组解构用于具有非数字键的数组。这允许更大的灵活性：

```
$array = [

    'a' => 1,

    'b' => 2,

    'c' => 3,

];

['c' => $c, 'a' => $a] = $array;
```

如你所见，你可以按任何你想要的顺序排列，也可以完全跳过元素。

### 实践

数组解构的用途之一是与 `parse_url` 和 `pathinfo` 等函数一起使用。因为这些函数返回一个带有命名参数的数组，我们可以解构结果以提取我们想要的信息：

```
[

    'basename' => $file,

    'dirname' => $directory,

] = pathinfo('/users/test/file.png');
```

你还可以在这个示例中看到，变量不需要与键同名。但是，如果你解构一个具有未知键的数组，PHP 会发出通知：

```
[

    'path' => $path, 

    'query' => $query,

] = parse_url('https:=/front-line-php.com');

// PHP Notice:  Undefined index: query
```

在这种情况下，`$query` 将是 `null`。你可以在示例中观察到最后一个细节：命名解构允许尾随逗号，就像你习惯使用数组一样。

### 在循环中

数组解构有更多用例——你已经在前面的属性章节中看到了这个用法。你可以在循环中解构数组：

```
$array = [

    [

        'name' => 'a',

        'id' => 1

    ],

    [

        'name' => 'b',

        'id' => 2

    ],

];

foreach ($array as ['id' => $id, 'name' => $name]) {

    // …

}
```

这在解析时可能很有用，例如解析 JSON 或 CSV 文件。只是要小心，未定义的键仍然会触发通知。

所以，这就是：你已经了解了在现代 PHP 中使用数组可以做的所有事情。我发现这些语法添加中的大多数都有它们的用例。总有不依赖简写的其他方法来实现相同的结果——这是你的选择。我们将在关于风格指南的章节中更多地讨论这些偏好，但首先还有一些其他主题要讨论。

## 第10章：Match 表达式

PHP 8 引入了新的 match 表达式——一个强大的功能，通常比使用 switch 更好的选择。我说"通常"是因为 match 和 switch 都有对方无法覆盖的特定用例。那么到底有什么区别？让我们通过比较两者来开始。以下是一个经典的 switch 示例：

```
switch ($statusCode) {

    case 200:

    case 300:

        $message = null;

        break;

    case 400:

        $message = 'not found';

        break;

    case 500:

        $message = 'server error';

        break;

    default:

        $message = 'unknown status code';

        break;

}
```

这是它的 match 等效写法：

```
$message = match ($statusCode) {

    200, 300 => null,

    400 => 'not found',

    500 => 'server error',

    default => 'unknown status code',

};
```

首先，match 表达式明显更短：

- 它不需要 break 语句
- 它可以使用逗号将不同的分支合并为一个
- 它返回一个值，所以你只需要赋值一次

所以从语法角度来看，match 总是更容易编写。但还有更多差异。

### 表达式还是语句？

我称 match 为表达式，而 switch 是语句。两者之间确实有区别。表达式组合值和函数调用，并被解释为一个新值。换句话说：它返回一个结果。这就是为什么我们可以将 match 的结果存储到变量中，而 switch 不可能做到这一点。

### 无类型转换

match 会进行严格的类型检查，而不是宽松的。就像使用 `===` 而不是 `==`。然而，可能有一些情况下你希望 PHP 自动转换变量的类型，这就解释了为什么你不能用 match 替换所有 switch。

```
$statusCode = '200';

$message = match ($statusCode) {

    200 => null

    default => 'Unknown status code',

};

// $message = 'Unknown status code'
```

### 未知值会导致错误

当没有 default 分支且值不匹配任何给定选项时，PHP 会在运行时抛出 `UnhandledMatchError`。再次强调严格性，但这将防止细微的错误被忽视。

```
$statusCode = 400;

$message = match ($statusCode) {

    200 => 'perfect',

};

// UnhandledMatchError
```

### 目前只支持单行表达式

就像短闭包一样，你只能写一个表达式。表达式块可能会在某个时候添加，但还不清楚具体什么时候。

### 组合条件

我已经提到了缺少 break；这也意味着 match 不允许 fallthrough 条件，就像第一个 switch 示例中的两个合并的 case 行一样。但另一方面，你可以在同一行上组合条件，用逗号分隔：

```
$message = match ($statusCode) {

    200, 300, 301, 302 => 'combined expressions',

};
```

### 复杂条件和性能

当 match RFC 被讨论时，一些人建议没有必要添加它，因为不使用额外关键字而是依赖数组键已经可以实现相同的功能。以下是我们想要基于更复杂的正则搜索匹配值的示例。在这里，我们使用一些人提到的作为 match 替代方案的数组符号：

```
$message = [

    $this=>matchesRegex($line) => 'match A',

    $this=>matchesOtherRegex($line) => 'match B',

][$search] =? 'no match';
```

但有一个重要的警告：这种技术会先执行所有正则函数来构建数组。另一方面，match 会逐个分支评估，这是更优的方法。

### 抛出异常

最后，由于 PHP 8 中的 throw 表达式，也可以直接从分支中抛出，如果你愿意的话：

```
$message = match ($statusCode) {

    200 => null,

    500 => throw new ServerError(),

    default => 'unknown status code',

};
```

### 模式匹配

还有一个重要的功能缺失：适当的模式匹配。这是一种在其他编程语言中使用的技术，允许复杂的匹配规则而不是简单的比较。把它想象成正则表达式，但是针对变量而不是文本。

模式匹配目前还不支持，因为它是一个相当复杂的功能。不过，它已被提及作为 match 的未来改进。我已经在期待它了！

### Switch 还是 Match？

如果我需要用一句话总结 match 表达式，我会说它是更严格、更现代的小兄弟 switch 的版本。

有一些情况——看到我做了什么吗？——switch 会提供更多的灵活性，特别是在多行代码块和类型转换方面。另一方面，我发现 match 的严格性很有吸引力，模式匹配的前景将是 PHP 的一个改变游戏规则的功能。

我承认我过去从未写过 switch 语句，因为它的许多怪癖；这些怪癖实际上 match 都解决了。所以虽然它还不完美，但有一些用例 match 会是一个很好的…匹配。

---

# 第二部分：使用 PHP 构建

## 第11章：面向对象 PHP（Object Oriented PHP）

现在你已经掌握了现代 PHP 语法，是时候深入了解我们用它编写什么样的代码了。在接下来的几章中，我们将放大视野，看到更大的图景。我们将从一个备受争议的话题开始：面向对象编程。

Alan Kay，"面向对象编程"这个术语的发明者，在20多年前的一次演讲中讲了一个故事。你可以只用锤子、钉子和木板，再加上一点技能来建造一个狗屋。我认为即使是我，只要有足够的时间也能建造它。一旦你建造了它，你就获得了技能和知识，可以将其应用到其他项目中。接下来，你想用同样的方法建造一座大教堂，使用你的锤子、钉子和木板。它大了100倍，但你以前做过这个——对吧？只需要再长一点时间。

虽然规模增加了100倍，但它的质量增加了1,000,000倍，而强度只增加了10,000倍。不可避免地，建筑会倒塌。有些人把碎石抹上灰泥，做成金字塔，说这本来就是计划；但你我知道真正发生了什么。

你可以在这里观看 Alan 的演讲：https://www.youtube.com/watch?v=oKg1h-TOQXoY

Alan 用这个比喻来解释他在20年前看到的"现代 OOP"的一个关键问题。我认为今天仍然适用：我们把一个问题的解决方案——OO代码——扩大了100倍，期望它能以同样的方式工作。即使在今天，我们也没有足够地思考架构——如果你要建造大教堂，这是相当关键的——我们使用我们学到的 OO 解决方案，没有额外的思考。

我们大多数人都是在孤立的情况下学习 OO，使用小例子，很少在大规模情况下学习。在大多数现实项目中，你不能简单地应用你学到的模式，期望一切都能像 Animals、Cats 和 Dogs 那样顺利。

这种鲁莽的 OO 代码扩展导致许多人在最近几年表达了他们的反对意见。我认为 OOP 和任何其他工具一样好——函数式编程是当今流行的竞争者——如果使用正确的话。

我从 Alan 20年前的演讲中得到的启示是，每个对象都是一个独立的小程序，有自己的内部状态。对象之间相互发送消息——不可变数据包——其他对象可以解释并做出反应。你不能用这种方式编写所有代码，这是可以接受的——不盲目遵循这些规则是可以的。尽管如此，我亲身经历了这种思维方式的积极影响。将对象视为独立的小程序，我开始以不同的风格编写代码的一部分。我希望，现在我们要看面向对象的 PHP 时，你会记住 Alan 的想法。它们教会我批判性地看待我认为理所当然的"正确的 OO"，并了解到它的内容比你想象的要多。

### OOP 的替代方案

我不想在这本书中推广任何隧道视野。我知道除了 OOP 之外还有其他编程方法。例如，函数式编程在最近几年中看到了巨大的流行度增长。虽然我认为 FP 有其优点，但 PHP 没有针对函数式风格进行优化。另一方面，虽然 OOP 是 PHP 的最佳匹配，但所有程序员都可以通过学习其他编程风格（如函数式）来学习有价值的经验。

我建议你阅读 Larry Garfield 写的《Thinking Functionally in PHP》一书。在书中，Larry 清楚地展示了为什么 PHP 不是编写函数式程序的完美语言，但他也用 PHP 解释了 FP 的思维方式。即使你不会编写函数式 PHP 生产代码，我们也可以将很多知识应用到 OOP 中。

### 继承的陷阱

我发现一开始很难相信，但类和继承与 Alan 设想的 OOP 方式无关。这并不意味着它们本身是坏事，但思考它们的目的以及我们如何使用（以及滥用）它们是好的。Alan 的愿景只描述了对象——它没有解释这些对象是如何创建的。类后来被添加为管理对象的便捷方式，但它们只是一个实现细节，不是 OOP 的核心思想。随着类的出现，继承也随之而来，这是另一个在正确使用时有用的工具。但情况并不总是如此。

即使你可能认为它是面向对象设计的支柱之一，它们也经常被滥用，就像 Alan 试图将狗屋扩大到教堂一样。

OOP 的一个公认优势是它以人类思考世界的方式为我们的代码建模。但实际上，我们很少从抽象和继承的角度思考。我们没有在真正有意义的地方使用继承，而是滥用它来共享代码，并以模糊的方式配置对象。我将向你展示一个很好的例子来说明这个问题，尽管我想提前说明这不是我自己的：它是 Sandi Metz 的，一位关于 OOP 主题的优秀教师。让我们来看看。

Sandi 的演讲：https://www.youtube.com/watch?v=OMPfEXIlTVE

有一个儿童童谣叫"The House That Jack Built"（这也是一部恐怖电影，但与此无关）。它开始是这样的：

This is the house that Jack built.

每次迭代，都会添加一个句子：

This is the malt that lay in
        the house that Jack built.

接下来

This is the rat that ate
        the malt that lay in
        the house that Jack built.

明白了吗？这是最终的诗：

This is the horse and the hound and the horn that belonged to
        the farmer sowing his corn that kept
        the rooster that crowed in the morn that woke
        the priest all shaven and shorn that married
        the man all tattered and torn that kissed
        the maiden all forlorn that milked
        the cow with the crumpled horn that tossed
        the dog that worried
        the cat that killed
        the rat that ate 
        the malt that lay in
        the house that Jack built.

让我们用 PHP 编写这个：一个程序，你可以询问一个给定的迭代，它会生成到那个点的诗。让我们以 OO 的方式来做。我们首先将所有部分添加到一个类中的数据数组中；让我们称那个类为 `PoemGenerator`——听起来很 OO，对吧？很好。

```
class PoemGenerator

{

    private static array $data = [

        'the horse and the hound and the horn that belonged to',

        'the farmer sowing his corn that kept',

        'the rooster that crowed in the morn that woke',

        'the priest all shaven and shorn that married',

        'the man all tattered and torn that kissed',

        'the maiden all forlorn that milked',

        'the cow with the crumpled horn that tossed',

        'the dog that worried',

        'the cat that killed',

        'the rat that ate',

        'the malt that lay in',

        'the house that Jack built',

    ];

}
```

现在让我们添加两个方法 `generate` 和 `phrase`。`generate` 将返回最终结果，`phrase` 是一个将部分粘合在一起的内部函数。

```
class PoemGenerator

{

    // …

    public function generate(int $number): string

    {

        return "This is {$this=>phrase($number)}.";

    }

    protected function phrase(int $number): string

    {

        $parts = array_slice(self=:$data, -$number, $number);

        return implode("\n        ", $parts);

    }

}
```

看起来我们的解决方案有效：我们可以使用 `phrase` 从数据数组的末尾取出 x 数量的项目，并将它们合并成一个短语。接下来，我们使用 `generate` 将最终结果包装在 `This is` 和 `.` 中。顺便说一下，我在那个空格分隔符上使用 `implode` 只是为了格式化输出更美观。

```
$generator = new PoemGenerator();

$generator=>generate(4);

// This is the cat that killed

//         the rat that ate

//         the malt that lay in

//         the house that Jack built.
```

正是我们期望的结果。

然后来了……一个新的功能请求。让我们构建一个随机诗歌生成器：它将随机化短语的顺序。我们如何在不复制和重复代码的情况下以干净的方式解决这个问题？继承来拯救——对吧？首先，让我们做一个小的重构：让我们添加一个 `protected data` 方法，这样我们在它实际返回的内容上有更多的灵活性：

```
class PoemGenerator 

{

    protected function phrase(int $number): string

    {

        $parts = array_slice($this=>data(), -$number, $number);

        return implode("\n        ", $parts);

    }

    protected function data(): array

    {

        return [

            'the horse and the hound and the horn that belonged to',

            // …

            'the house that Jack built',

        ];

    }

}
```

接下来我们构建我们的 `RandomPoemGenerator`：

```
class RandomPoemGenerator extends PoemGenerator

{

    protected function data(): array

    {

        $data = parent=:data();

        shuffle($data);

        return $data;

    }

}
```

继承有多棒！我们只需要重写代码的一小部分，一切都能按预期工作！

```
$generator = new RandomPoemGenerator();

$generator=>generate(4);

// This is the priest all shaven and shorn that married

//         the cow with the crumpled horn that tossed

//         the man all tattered and torn that kissed

//         the rooster that crowed in the morn that woke.
```

太棒了！

再一次……一个新的功能请求：一个回声生成器：它重复每一行第二次。所以你会得到这个：

This is the malt that lay in the malt that lay in
        the house that Jack built the house that Jack built.

我们可以解决这个问题；继承——对吧？

让我们再次在 `PoemGenerator` 中做一个小的重构，只是为了确保我们的代码保持干净。我们可以将 `phrase` 中的数组切片功能提取到它自己的方法中，这似乎是更好的关注点分离。

```
class PoemGenerator

{

    // …

    protected function phrase(int $number): string

    {

        $parts = $this=>parts($number);

        return implode("\n        ", $parts);

    }

    protected function parts(int $number): array

    {

        return array_slice($this=>data(), -$number, $number);

    }

}
```

重构后，实现 `EchoPoemGenerator` 再次变得非常容易：

```
class EchoPoemGenerator extends PoemGenerator

{

    protected function parts(int $number): array

    {

        return array_reduce(

            parent=:parts($number),

            fn (array $output, string $line) => 

                [==.$output, "{$line} {$line}"],

            []

        );

    }

}
```

我们能否花一点时间欣赏继承的力量？我们已经创建了原始 `PoemGenerator` 的两个不同实现，并且只在 `RandomPoemGenerator` 和 `EchoPoemGenerator` 中重写了与它不同的部分。我们甚至使用了 SOLID 原则（或者我们认为）来确保我们的代码是解耦的，以便很容易重写特定部分。这就是伟大的 OOP 的意义所在——对吧？

再一次……另一个功能请求：请再做一个实现，一个结合随机和回声行为的实现：`RandomEchoPoemGenerator`。

现在怎么办？那个类将扩展哪个？

如果我们扩展 `PoemGenerator`，我们将不得不重写我们的 `data` 和 `parts` 方法，基本上从 `RandomPoemGenerator` 和 `EchoPoemGenerator` 复制代码。这是糟糕的设计，到处复制代码。如果我们扩展 `RandomPoemGenerator` 呢？我们需要从 `EchoPoemGenerator` 重新实现 `parts`。如果我们实现 `EchoPoemGenerator`，情况会相反。

说实话，扩展 `PoemGenerator` 并复制两个实现似乎是最好的解决方案。因为这样，我们至少向未来的程序员清楚地表明这是一个独立的东西，我们无法用任何其他方式解决它。

但让我们坦率地说：无论什么解决方案，都是垃圾。我们已经陷入了继承的陷阱。亲爱的读者，这在现实项目中经常发生：我们认为继承是重写和重用行为的完美解决方案，它一开始总是看起来很棒。接下来出现了一个新功能，导致更多的抽象，并导致我们的代码失控。我们以为我们掌握了继承，但它却踢了我们的屁股。

那么问题是什么——我们代码的实际问题是什么？`RandomPoemGenerator` 从 `PoemGenerator` 扩展不是有道理吗？它是一个诗歌生成器，不是吗？这确实是我们思考继承的方式：使用"是一个"。是的，`RandomPoemGenerator` 是一个 `PoemGenerator`，但 `RandomPoemGenerator` 现在不仅仅是在生成诗歌，不是吗？

Sandi Metz 建议用以下问题来识别潜在问题："两者之间发生了什么变化——在继承过程中发生了什么变化？"嗯……在 `RandomPoemGenerator` 的情况下，是 `data` 方法；对于 `EchoPoemGenerator`，是 `parts` 方法。碰巧的是，必须结合这两个部分，这就是让我们的继承解决方案爆炸的原因。

你知道这意味着什么吗？这意味着 `parts` 和 `data` 是它们自己的东西。它们不仅仅是我们的诗歌生成器的受保护实现细节。它们是客户重视的东西，是我们程序的本质。

所以让我们这样对待它们。

确定了两个独立的关注点后，我们需要给它们一个合适的名称。第一个是关于行是否应该被随机化。让我们称它为 `Orderer`；它将接收一个原始数组并返回一个新版本，其项目按特定方式排序。

```
interface Orderer

{

    public function order(array $data): array;

}
```

第二个关注点是关于格式化输出——是否应该回显。让我们称这个概念为 `Formatter`。它的任务是接收行数组并将所有这些行格式化为一个字符串。

```
interface Formatter

{

    public function format(array $lines): string;

}
```

魔法来了。我们从 `PoemGenerator` 中提取这个逻辑，但我们仍然需要一种从内部访问它的方式。所以让我们将 `orderer` 和 `formatter` 注入到 `PoemGenerator` 中：

```
class PoemGenerator

{

    public function =_construct(

        public Formatter $formatter,

        public Orderer $orderer,

    ) {}

    // …

}
```

有了这两个，让我们改变 `phrase` 和 `data` 的实现细节：

```
class PoemGenerator

{

    // …

    protected function phrase(int $number): string

    {

        $parts = $this=>parts($number);

        return $this=>formatter=>format($parts);

    }

    protected function data(): array

    {

        return $this=>orderer=>order([

            'the horse and the hound and the horn that belonged to',

            // …

            'the house that Jack built',

        ]);

    }

}
```

最后，让我们实现 `Orderer`：

```
class SequentialOrderer implements Orderer

{

    public function order(array $data): array

    {

        return $data;

    }

}

class RandomOrderer implements Orderer

{

    public function order(array $data): array

    {

        shuffle($data);

        return $data;

    }

}
```

以及 `Formatter`：

```
class DefaultFormatter implements Formatter

{

    public function format(array $lines): string

    {

        return implode("\n        ", $lines);

    }

}

class EchoFormatter implements Formatter

{

    public function format(array $lines): string

    {

        $lines = array_reduce(

            $lines,

            fn (array $output, string $line) => 

                [==.$output, "{$line} {$line}"],

            []

        );

        return implode("\n        ", $lines);

    }

}
```

默认实现 `DefaultFormatter` 和 `SequentialOrderer` 可能不会执行任何复杂的操作，但它们仍然是一个有效的业务关注点："顺序排序"和"默认格式"是创建我们以其正常形式所知的诗歌所需的两个有效案例。

你意识到刚才发生了什么吗？你可能认为我们在编写更多代码，但你忘记了什么……我们可以完全删除我们的 `RandomPoemGenerator` 和 `EchoPoemGenerator`，我们不再需要它们了，我们可以只用 `PoemGenerator` 解决所有情况：

```
$generator = new PoemGenerator(

    new EchoFormatter(), 

    new RandomOrderer(),

);
```

我们可以通过提供适当的默认值让我们的生活更容易一些：

```
class PoemGenerator

{

    public function =_construct(

        public ?Formatter $formatter = null,

        public ?Orderer $orderer = null,

    ) {

        $this=>formatter =?= new DefaultFormatter();

        $this=>orderer =?= new SequentialOrderer();

    }

}
```

使用命名属性，我们可以以任何我们想要的方式构造 `PoemGenerator`：

```
$generator = new PoemGenerator(

    formatter: new EchoFormatter(), 

);

$generator = new PoemGenerator(

    orderer: new RandomOrderer(), 

);

$generator = new PoemGenerator(

    formatter: new EchoFormatter(), 

    orderer: new RandomOrderer(), 

);
```

不再需要第三个抽象！

这是真正的面向对象编程。我告诉过你 OOP 不是关于继承的，这个例子显示了它的真正力量。通过将对象组合成其他对象，我们能够创建一个灵活且持久的解决方案，一个以干净的方式解决我们所有问题的解决方案。这就是组合优于继承的意义所在，这是 OO 中最基本的支柱之一。

我承认：我在开始编写代码时并不总是使用这种方法。在开发过程中，简单地开始而不考虑抽象或组合通常更容易。我甚至会说这是一个很好的规则：不要太早抽象。重要的教训不是你总是应该使用组合。相反，它是关于识别你遇到的问题并使用正确的解决方案来解决它。

### 关于 traits 呢？

你可能在想使用 traits 来解决我们的诗歌问题。你可以创建一个 `RandomPoemTrait` 和 `EchoPoemTrait`，实现 `data` 和 `phrase`。是的，traits 可以是另一个解决方案，就像继承也是一个可行的解决方案一样。我将说明为什么组合仍然是更好的选择，但首先让我们在实践中展示这些 traits 会是什么样子：

```
trait RandomPoemTrait

{

    protected function data(): array

    {

        $data = parent=:data();

        shuffle($data);

        return $data;

    }

}

trait EchoPoemTrait

{

    protected function parts(int $number): array

    {

        return array_reduce(

            parent=:parts($number),

            fn (array $output, string $line) => 

                [==.$output, "{$line} {$line}"],

            []

        );

    }

}
```

你可以这样使用这些来实现 `RandomEchoPoemGenerator`：

```
class RandomEchoPoemGenerator extends PoemGenerator

{

    use RandomPoemTrait;

    use EchoPoemTrait;

}
```

Traits 确实解决了代码可重用性问题；这正是它们被添加到语言中的原因。当我提到添加 `RandomEchoPoemGenerator` 的最新功能请求时，我评论说没有干净的方法来解决这个问题而不复制代码，这是寻找另一个解决方案——组合——的垫脚石。我是否故意忽略 traits 来证明我的观点？不。虽然它们确实解决了可重用性问题，但它们没有我们在探索组合时发现的额外好处。

首先，我们发现诗歌的顺序和格式是关键的业务规则，不应该被视为类中某处的受保护实现细节。我们创建了 `Orderer` 和 `Formatter` 来使我们的代码更好地代表我们试图解决的现实世界问题。如果我们选择 traits 和子类，我们再次失去这种明确性。

其次，我们的诗歌示例显示了 `PoemGenerator` 的两个可配置部分。如果有三个或四个呢？如果我们添加两个更多的 traits，我们还必须为这些 traits 创建新的子类实现，以及与现有 traits 的所有相关组合。子类的数量会呈指数级增长。即使在我们当前的示例中，已经有三个子类：`RandomPoemGenerator`、`EchoPoemGenerator` 和 `RandomEchoPoemGenerator`。另一方面，组合只需要我们添加两个新类。如果有更复杂的业务规则需要考虑，我们的代码会失控。

我并不是建议根本不应该使用 traits；就像继承一样，它们有它们的用途。最重要的是，你要批判性地评估所有解决方案的优缺点，而不是退回到最初看起来最容易的解决方案。

我认为这种推理适用于所有与编程相关的事情，无论你是在面向对象、过程式还是函数式风格中编码。OOP 得到了一个坏名声，因为人们开始不加思考地扩展它，而没有重新思考他们的架构。我希望我们能改变这一点。

## 第12章：MVC 框架（MVC Frameworks）

迄今为止，在 PHP 中构建 Web 应用程序最流行的方法是使用模型-视图-控制器（MVC）模式。大多数现代 PHP 框架都建立在这个相同的想法之上。首先，请求进来并通过其 URL 映射到控制器。这个控制器从请求中获取输入并将其传递给模型。模型封装了应用程序的所有业务逻辑和规则。从模型返回的结果可以由控制器传递给视图，这是返回给用户的最终结果。

MVC 模式的好处是其松耦合的部分：模型代码可以在不担心它如何在 UI 中呈现的情况下编写，视图代码可以在不担心数据如何准确检索的情况下编写。

### 比较？

没有任何框架——Symfony、Laravel，还有很多——是完美的。总会有你更喜欢一个而不是另一个的东西。这些偏好通常源于你过去的经历、你的教育、你之前使用的语言、其他框架、你完成的项目类型，以及你的性格。没有正确或错误的选择，但在为你的下一个项目选择框架时，我会考虑一个指标：找到一个积极维护且拥有大型生态系统的框架。Symfony 和 Laravel 都属于这一类，所以真的，选择取决于你。

我之所以只提到这两个框架，原因有两个：它们在 PHP 世界中非常流行，而且我个人都使用过它们，我认为这是我写关于它们的必要要求。

如果你问社区，他们可能会说 Symfony 深受 Java 世界的影响，以其健壮性和持久性而闻名。Laravel 受到 Ruby on Rails 的启发，以其易用性和快速应用程序开发思维而闻名。不过，这意味着很少：你可以像 Laravel 一样快速启动并运行 Symfony 应用程序；同样，你也可以使用 Laravel 编写大型应用程序。

两者之间有明显的差异。首先，推荐的代码风格：Laravel  promotes 尽可能容易阅读的代码，而 Symfony 希望代码写得清晰正确，即使它更冗长。我对任何关于选择框架的开发者的建议是：不要迷失在对什么更好或更坏的辩论中。两者都是很好的工具，你可以用它们取得同样好的结果。另外，不要太抗拒框架：如果你遵循框架希望你遵循的方式，一切都会容易得多。

这里有一个例子：Laravel 有一个强大的 ORM 实现，称为"Eloquent"。

### ORMs

ORM——对象关系映射器——是一个系统，它将数据（例如，数据库中的数据）作为代码中的对象公开。它是一个强大的工具，抽象了数据库查询的实现细节，允许你用对象而不是原始数据数组来思考。

Eloquent 一直是一个备受争议的话题：它使用活动记录模式，这被许多软件开发人员认为是反模式。它仍然是一个高度流行的模式，在其他语言中也是如此，所以它绝对是合法的。活动记录模式打破了我上一章描述的所有规则：它完全依赖于继承，这带来了我们已经发现的挫折。它仍然存在一些问题，以下是 Robert "Uncle Bob" Martin 对模式的批评：

我对活动记录的问题是，它在这两种非常不同的编程风格之间造成了混淆。数据库表是一种数据结构。它暴露数据而没有行为。但活动记录看起来像是一个对象。它有"隐藏"的数据和暴露的行为。我把"隐藏"这个词放在引号中，因为数据实际上并没有隐藏。几乎所有的活动记录衍生品都通过访问器和修改器导出数据库列。

活动记录按规则定义不是"正确的"。但 Laravel 在其之上构建了一个极其丰富的 API。它是迄今为止最容易使用的 ORM 实现之一。这对许多情况来说是最容易的，但不是全部。

就像我说的：不要抗拒框架。你选择一个框架是因为它提供的所有好东西，所以你也必须处理它的小怪癖和缺点。如果我从头开始编写框架，我可能不会使用活动记录模式来构建我的 ORM 层。但它真的那么糟糕，我应该花几个小时和几天试图在 Laravel 中改变它吗？不。当我使用 Laravel 时，我很乐意按原样使用 Eloquent。它在其他地方提供了如此多的价值，以至于根本不值得与之抗争。

我曾经在一家公司工作，他们编写了自己的自定义框架，因为所有流行的替代品都有小怪癖。这是在我加入之前五年的公司决定，他们用它制作了大约 100 到 200 个网站。大多数是较小的公司网站，但有些是复杂的系统。随着公司的发展，他们承担了更有野心的项目，并拒绝使用其他框架。

由于这种心态，不止一些雄心勃勃的项目失败了或只部分工作。结果还发现他们的框架也有其局限性，没有社区可以依靠。有几个愤怒的客户，这导致了重大的财务损失。包括我在内的几个同事离开了公司，因为在我们认为对 Web 开发世界至关重要的领域没有成长空间。我们被锁定并决定在为时已晚之前跳槽。最后，公司看到了它的错误并设法切换到社区支持的框架，但只有在他们有数千（如果不是数百万）行代码，所有这些都绑定到他们自己的框架——他们将在未来几年必须支持的遗留代码。

敢于做出妥协。在我使用 Laravel 的第一年，我在许多不同的方面与它发生冲突。我那时习惯了 Symfony 并欣赏它的严格性。我很难适应 Laravel，我花了整整一年的时间才意识到我只需要停止与之抗争。最后，我接受了框架并在其上构建，而不是试图先部分拆除它。我了解到，无论你使用什么框架或编程语言都不是宗教；它们只是帮助你完成工作的工具。

让我们回到 MVC 框架。我不会给你一个关于设置 Symfony 或 Laravel 应用程序的分步指南；两个社区都已经有优秀的指南，涵盖了所有你需要开始的主题，我不可能在一章中匹配它们的质量。相反，我想给你一些一般性的建议。当涉及到框架时，有一个重要的技能要学习：独立地在代码中找到你的方式。

像 Laravel 和 Symfony 这样的框架有巨大的代码库。如果你把它们当作黑盒，你将永远无法充分发挥它们的潜力。深入研究源代码是必不可少的，无论是框架还是任何其他类型的代码库。阅读对你来说陌生的代码并遵循其思路是一个很好的技能。即使你对像 Laravel 或 Symfony 这样的框架没有任何经验，如果你能够深入研究代码以了解发生了什么，你比许多其他程序员领先很多。

所以让我们做一些代码潜水！我过去三年主要使用 Laravel，所以我会用它作为例子。无论你是否有经验都无关紧要；我们感兴趣的是理解否则将是黑盒的东西。

因为我们正在讨论 MVC，让我们看看请求/响应周期是如何处理的：使 MVC 模式工作的系统。

想象一下，我们对这个系统一无所知。从哪里开始？嗯，`index.php` 通常是一个好地方：

```
/**

 * Laravel - A PHP Framework For Web Artisans

 *

 * @package  Laravel

 * @author   Taylor Otwell <taylor@laravel.com>

 */

define('LARAVEL_START', microtime(true));

/*

|----------------------------------------------------------------------

| Register The Auto Loader

|----------------------------------------------------------------------

|

| Composer provides a convenient, automatically generated class loader 

for

| our application. We just need to utilize it! We'll simply require it

| into the script here so that we don't have to worry about manual

| loading any of our classes later on. It feels great to relax.

|

*/

require =_DIR=_.'/=./vendor/autoload.php';

/*

|----------------------------------------------------------------------

| Turn On The Lights

|----------------------------------------------------------------------

|

| We need to illuminate PHP development, so let us turn on the lights.

| This bootstraps the framework and gets it ready for use, then it

| will load up this application so that we can run it and send

| the responses back to the browser and delight our users.

|

*/

$app = require_once =_DIR=_.'/=./bootstrap/app.php';

/*

|----------------------------------------------------------------------

| Run The Application

|----------------------------------------------------------------------

|

| Once we have the application, we can handle the incoming request

| through the kernel, and send the associated response back to

| the client's browser allowing them to enjoy the creative

| and wonderful application we have prepared for them.

|

*/

$kernel = $app=>make(Illuminate\Contracts\Http\Kernel=:class);

$response = $kernel=>handle(

    $request = Illuminate\Http\Request=:capture()

);

$response=>send();

$kernel=>terminate($request, $response);
```

正如你所看到的，Laravel 足够好，为我们提供了一些开箱即用的注释，准确解释了正在发生的事情！就我个人而言，我发现这些注释有点……诗意，增加了不必要的噪音，但我们会处理它。

这是一个有趣的部分：

```
/*

| …

|

| This bootstraps the framework and gets it ready for use, then it

| will load up this application so that we can run it and send

| the responses back to the browser and delight our users.

|

*/

$app = require_once =_DIR=_.'/=./bootstrap/app.php';
```

一些重要的事情发生在 `bootstrap/app.php` 中，让我们看看：

```
/* … */

$app = new Illuminate\Foundation\Application(

    $_ENV['APP_BASE_PATH'] =? dirname(=_DIR=_)

);

/* … */

$app=>singleton(

    Illuminate\Contracts\Http\Kernel=:class,

    App\Http\Kernel=:class

);

$app=>singleton(

    Illuminate\Contracts\Console\Kernel=:class,

    App\Console\Kernel=:class

);

$app=>singleton(

    Illuminate\Contracts\Debug\ExceptionHandler=:class,

    App\Exceptions\Handler=:class

);

/* … */

return $app;
```

再次一些注释——我遗漏了——确实，设置了一个 `$app` 变量。你可能知道也可能不知道这些 `singleton` 调用是关于什么的；现在这没关系。基于 `$app` 的名称，我们可以猜测它可能是框架的核心部分，这甚至更清楚，因为它有自己的专用引导文件。让我们先回到 `index.php`，看看 `$app` 是如何使用的：

```
$kernel = $app=>make(Illuminate\Contracts\Http\Kernel=:class);

$response = $kernel=>handle(

    $request = Illuminate\Http\Request=:capture()

);

$response=>send();

$kernel=>terminate($request, $response);
```

记住我在本章开始时讨论的三个步骤吗？请求到控制器，控制器到模型和视图，以及该结果作为响应返回。所有这些都发生在这几行代码中：

```
$response = $kernel=>handle(

    $request = Illuminate\Http\Request=:capture()

);

$response=>send();
```

第一步有点隐藏，因为它是内联完成的：请求被捕获——它是基于 `$_SERVER`、`$_COOKIE`、`$_POST` 和 `$_GET` 全局变量构造的。接下来，捕获的请求被传递给一个处理它的内核，最终导致发送给用户的响应。

对于这个例子，我们想知道如何到达控制器，所以让我们忽略请求捕获和响应发送，而是专注于 `$kernel=>handle()`。这是第一个真正的障碍：`$kernel` 到底是什么？我们需要知道 `handle` 在哪里实现，这样我们就可以查看它。

`$kernel` 通常不会被实例化，而是使用 `$app=>make()` 创建的，它被赋予接口 `Illuminate\Contracts\Http\Kernel` 而不是具体类。

实际上有两种方法可以解决我们的问题。首先是 `$app=>make()` 的实现，我们知道 `$app` 是 `Illuminate\Foundation\Application`，因为它在引导文件中手动构造，所以让我们看看那里：

```
/**

 * Resolve the given type from the container.

 *

 * @param  string  $abstract

 * @param  array  $parameters

 * @return mixed

 */

public function make($abstract, array $parameters = [])

{

    $this=>loadDeferredProviderIfNeeded(

        $abstract = $this=>getAlias($abstract)

    );

    return parent=:make($abstract, $parameters);

}
```

在这种情况下，实现甚至不重要，因为文档注释已经解释了正在发生的事情："从容器中解析给定类型"。如果你不熟悉依赖注入和依赖容器模式，你可能仍然需要深入研究。然而，基于这个注释，你们中的大多数人可能知道发生了什么：我们要求 `$app` 创建一个 `Illuminate\Contracts\Http\Kernel` 的实例，它似乎注册在容器中。

没错，我们已经在 `bootstrap.php` 中看到了这一点：

```
$app=>singleton(

    Illuminate\Contracts\Http\Kernel=:class,

    App\Http\Kernel=:class

);
```

这个定义说当我们创建 `Illuminate\Contracts\Http\Kernel` 时，应该返回 `App\Http\Kernel` 的具体实例！找出这一点的另一种方法是查看哪些类实现了 `Illuminate\Contracts\Http\Kernel`；或者你可以简单地运行代码，并通过转储或调试来检查 `$kernel` 中表示的对象。

无论什么解决方案最有效，现在我们知道 `App\Http\Kernel` 是查找 `handle` 方法的地方。确实，这是正确的地方。

```
/**

 * Handle an incoming HTTP request.

 *

 * @param  \Illuminate\Http\Request  $request

 * @return \Illuminate\Http\Response

 */

public function handle($request)

{

    try {

        $request=>enableHttpMethodParameterOverride();

        $response = $this=>sendRequestThroughRouter($request);

    } catch (Throwable $e) {

        $this=>reportException($e);

        $response = $this=>renderException($request, $e);

    }

    $this=>app['events']=>dispatch(

        new RequestHandled($request, $response)

    );

    return $response;

}
```

一开始这可能看起来像另一个兔子洞，但我们可以像以前一样应用相同的技术。首先专注于快乐路径也是好的：我们可以假设这是正确的潜水方式。所以忽略那个 `catch` 块，以及将 `RequestHandled` 分派到 `$this=>app['events']` 的任何事情。基于它们的名称，它将在请求处理后分派一个事件。

这给我们留下了只有两行代码：

```
$request=>enableHttpMethodParameterOverride();

$response = $this=>sendRequestThroughRouter($request);
```

阅读这些行，很明显 `$this=>sendRequestThroughRouter($request)` 是我们下一步需要去的地方。

```
/**

 * Send the given request through the middleware / router.

 *

 * @param  \Illuminate\Http\Request  $request

 * @return \Illuminate\Http\Response

 */

protected function sendRequestThroughRouter($request)

{

    $this=>app=>instance('request', $request);

    Facade=:clearResolvedInstance('request');

    $this=>bootstrap();

    return (new Pipeline($this=>app))

                =>send($request)

                =>through(

                    $this=>app=>shouldSkipMiddleware() 

                        ? [] 

                        : $this=>middleware

                )

                =>then($this=>dispatchToRouter());

}
```

接下来我们看到我们的请求通过管道通过中间件发送，最终被分派到路由器。如果你熟悉 MVC 框架，路由中间件可能已经响起了警钟。即使你不知道中间件，我们也不会被阻止：`$this=>dispatchToRouter()` 可能是我们需要去的地方。

```
/**

 * Get the route dispatcher callback.

 *

 * @return \Closure

 */

protected function dispatchToRouter()

{

    return function ($request) {

        $this=>app=>instance('request', $request);

        return $this=>router=>dispatch($request);

    };

}
```

你可以看到相同的模式在我们的潜水中出现。我们阅读代码，确定什么是相关的，什么不是，然后进入下一层。你也看到理论知识可以帮助：依赖注入和中间件是许多 MVC 框架中的两种流行技术。

为了保持这个例子的可读性，我将跳过几个层，我们从一种方法移动到另一种方法。所以，在走得更深之后，我们到达了 `Route=:run`：

```
/**

 * Run the route action and return the response.

 *

 * @return mixed

 */

public function run()

{

    $this=>container = $this=>container =: new Container;

    try {

        if ($this=>isControllerAction()) {

            return $this=>runController();

        }

        return $this=>runCallable();

    } catch (HttpResponseException $e) {

        return $e=>getResponse();

    }

}
```

这里我们第一次提到控制器：

```
if ($this=>isControllerAction()) {

    return $this=>runController();

}
```

所以现在仍然是再深入一步的问题：

```
/**

 * Run the route action and return the response.

 *

 * @return mixed

 *

 * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException

 */

protected function runController()

{

    return $this=>controllerDispatcher()=>dispatch(

        $this, $this=>getController(), $this=>getControllerMethod()

    );

}
```

那个控制器分派器打开了一个新的兔子洞！我们将停止我们的潜水，但如果你愿意，你可以自己走得更深。你可以应用相同的技术，你很快就会到达实际的控制器代码！

我们做这个练习是为了向你展示代码潜水不应该那么困难，并且是一个很好的技能，可以在你的工具集中使用。它使你作为开发人员更加灵活和独立，并允许你更好地理解和解决问题。

顺便说一下，你可以将这些代码潜水技术应用到每个代码库，而不仅仅是框架。我必须承认，像 Laravel 和 Symfony 这样的框架通常文档更全面、更好。今天我们潜入的是相当清晰的水域，但如果你需要在一个有 10 年历史的遗留项目上工作呢？嗯，同样的技术同样有效，但你的潜水可能会慢得多。要有耐心，时不时休息一下。

## 第13章：依赖注入（Dependency Injection）

前两章暗示了依赖注入模式的重要性。使用组合时，我们从外部将依赖注入到对象中，我们也注意到 Laravel 在其核心使用了某种依赖容器。那么依赖注入到底是什么？

开发者在涉及这个模式时经常感到困惑。这不是因为他们不知道它是什么，而是因为这个模式经常与其他错误地称为"依赖注入"的模式结合使用。所以让我们从一开始就明确：依赖注入是从外部提供（注入）对象依赖（它需要"做自己的事情"的对象）的技术。它没有说明这些依赖是如何注入的；有其他的模式来解决这个问题。让我们看一个比较。这是一个不使用依赖注入的例子：

```
class QueryBuilder

{

    private Connection $connection;    

    public function =_construct() {

        $connectionString = config('db.connection');

        $this=>connection = new Connection($connectionString);

    }

}
```

这是使用依赖注入的同一个例子，注意我们再次使用构造函数属性提升：

```
class QueryBuilder

{

    public function =_construct(

        private Connection $connection

    ) {}

}
```

依赖注入的想法是对象的依赖从外部传递给它，这样对象就不需要担心自己管理这些依赖。这种模式允许对象专注于它们的任务，而不担心构造和管理相关对象。

这就给我们留下了关于如何将依赖传递到对象的问题。我们在使用它时应该总是手动构造查询构建器吗？

```
class PostsController

{

    public function index()

    {

        $queryBuilder = new QueryBuilder(

            new Connection(config('db.connection'))

        );

    }

}
```

不。这是一种非常低效的代码管理方式。想象一下 `QueryBuilder` 的构造函数发生了变化——你现在必须重构数十个，如果不是数百个使用它的地方。

所以，依赖注入经常与另一个模式一起出现：依赖容器。这是一个知道如何在你的代码库中构造对象的类。你可以在 PHP 本身中配置这样的容器，尽管像 Symfony 这样的框架也允许 YAML 和 XML 配置。为了这个例子，我们将用纯 PHP 从头开始编写一个简单的容器实现。事实上，它出奇地简单：

```
class Container

{

    private array $definitions = [];

    public function make(string $name): ?object

    {

        $definition = $this=>definitions[$name] =? fn () => null;

        return $definition($this);

    }

    public function register(string $name, Closure $definition): self

    {

        $this=>definitions[$name] = $definition;

        return $this;

    }

}
```

容器本身是一个简单的类，它有一个定义数组，你可以注册并使用它来创建新实例。以下是我们如何注册 `Connection` 和 `QueryBuilder`：

```
$container=>register(

    Connection=:class,

    fn () => new Connection(

        config('db.connection')

    ),

);

$container=>register(

    QueryBuilder=:class,

    fn (Container $container) => new QueryBuilder(

        $container=>make(Connection=:class)

    ),

);
```

这是我们将如何使用它：

```
$queryBuilder = $container=>make(QueryBuilder=:class);
```

每个定义本身都是一个闭包，当我们在容器中请求依赖时，它会在内部被调用。通过将容器的实例传递到定义闭包中，我们可以解析嵌套依赖，正如你在我们注册 `QueryBuilder` 定义时看到的那样。本质上，容器是一个你可以保存对象构造定义的存储。

请记住，这是一个简化的实现；现实生活中的容器还支持单例和自动装配等功能。这些概念如此广泛使用，我们也将在本章中讨论它们。

单例是只实例化一次的对象，而不是每次你向容器请求它们时都实例化。如果 `Connection` 被注册为单例，我们可以调用 `$container=>make(Connection=:class)` 任意多次；它只会创建一次新对象，然后一遍又一遍地重复使用它。

可能有些情况下，对象的构造需要大量工作，并且在不同的地方重复使用同一个对象是好的。例如：如果 `Connection` 必须通过连接到数据库服务器来测试凭据，那么它只做一次是好的，而不是每次我们从容器请求 `Connection` 时都这样做。

所以让我们将该功能添加到我们的容器中。

```
class Container

{

    private array $instances = [];

    // …

    public function singleton(string $name, Closure $definition): self

    {

        $this=>register($name, function () use ($name, $definition) {

            if (array_key_exists($name, $this=>instances)) {

                return $this=>instances[$name];

            }

            $this=>instances[$name] = $definition($this);

            return $this=>instances[$name];

        });

        return $this;

    }

}
```

通过注册单例定义，我们将原始定义闭包包装在另一个闭包中，它将首先检查 `$instances` 数组中是否已经存在给定名称的实例，如果是这种情况，我们将返回它。否则，我们将调用原始闭包并将其结果存储在 `$instances` 数组中，为下次缓存。请注意，我们需要使用 `array_key_exists` 而不是空合并赋值运算符：我们希望定义能够解析为 `null`。如果我们使用空合并，我们的单例将无法正确处理 `null` 值。

我提到的另一个功能是自动装配：它允许容器根据类名神奇地解析类，即使它们没有被注册。这只有在请求的类的所有依赖都可以自动装配时才有效，因为一旦有一个依赖需要构造函数参数，而容器无法解析，我们就卡住了。

以下是一个简化的实现：

```
class Container

{

    // …

    public function make(string $name): object

    {

        $definition = $this=>definitions[$name] =? 

            $this=>autowire($name);

        return $definition($this);

    }

    private function autowire(string $name): Closure

    {

        return function () use ($name) {

            $class = new ReflectionClass($name);

            $constructorArguments = $class

                =>getConstructor()

                =>getParameters();

            $dependencies = array_map(

                fn (ReflectionParameter $parameter) => 

                    $this=>make($parameter=>getType()),

                $constructorArguments,

            );

            return new $name(==.$dependencies);

        };

    }

}
```

首先，我们将自动装配功能作为 `make` 中的后备：如果没有找到现有定义，我们将尝试自动装配它。`autowire` 方法返回一个即时定义闭包，它将查看给定类的构造函数参数并尝试通过容器解析它们。最后，当所有依赖都被解析后，可以创建实际的类。

不过，这个解决方案省略了很多细节：如果依赖无法解析怎么办？如果类不是类怎么办？为了这个例子，我们将保持它这样简单。

到目前为止，我们已经涵盖了容器、单例和自动装配；它们都是建立在依赖注入之上的有用技术。还有一件事经常用依赖容器来完成，但应该避免。它被称为服务定位器，这是一个反模式。

服务定位器是从另一个类内部访问容器的行为。在我们的查询构建器示例中，它看起来像这样：

```
class QueryBuilder

{

    private Connection $connection;    

    public function =_construct(Container $container) 

    {

        $this=>connection = $container=>make(Connection=:class);

    }

}
```

服务定位器模式可以以不同的形式出现：这里我们注入容器并从构造函数内部调用其 `make` 方法，但它也可以是独立函数或静态方法：`resolve(Connection=:class)` 或 `Container=:make(Connection=:class)`。无论什么形式，服务定位器都会访问我们程序的全局状态（通常是依赖容器），并手动解析依赖。

服务定位器的第一个问题是它禁用了使用适当组合的能力，因为我们不能再将依赖注入到类中。

其次，类现在封装并隐藏了它的依赖。查看构造函数签名，我们无法再知道这个类依赖于哪些类。我们混淆了我们的代码。第三，我们失去了静态分析能力：`$container=>make(Connection=:class)` 依赖于运行时反射来构建正确的依赖，所以静态分析不会拥有我们想要的所有洞察。

即使没有服务定位器，我们当然也经常调用 `$container=>make()`。但这些调用总是在容器的上下文中发生；它们在一个集中的地方，而不是分散在代码库中。这是更好的方法：容器外的所有地方都可以假设依赖是有效的，容器的任务是正确解析它们。

我的建议：避免服务定位器，因为几乎总是有更干净的方法来解决同样的问题。说实话，我们实际上在之前的一个例子中做了服务定位器，当我们在容器中注册我们的 `Connection` 时。

```
$container=>singleton(

    Connection=:class,

    fn (Container $container) => new Connection(

        config('db.connection')

    ),

);
```

你能发现问题吗？`config('db.connection')` 调用实际上是在访问全局应用程序状态——一种偷偷摸摸的服务定位器形式！

给它更多思考：为什么不将应用程序配置本身视为对象？例如，我们可以有一个简单的数据对象，像这样：

```
class DatabaseConfig

{

    public function =_construct(

        public string $connection,

        public ?string $port,

        // …

    ) {}   

}
```

我们仍然需要读取环境变量来填充这个配置对象，所以我们可以像这样在容器中将其注册为单例：

```
$container=>singleton(

    DatabaseConfig=:class,

    fn () => new DatabaseConfig(

        env('db.connection'),

        env('db.port'),

        // …

    ),

);
```

接下来我们可以用这个注册连接：

```
$container=>singleton(

    Connection=:class,

    fn (Container $container) => new Connection(

        $container=>make(DatabaseConfig=:class)=>connection

    ),

);
```

我们甚至可以选择直接将 `DatabaseConfig` 注入到 `Connection` 中，这允许我们充分利用容器的自动装配功能！

```
class Connection

{

    public function =_construct(

        private DatabaseConfig $databaseConfig

    ) {}

}
```

依赖注入模式真正强大：它使我们能够编写干净和解耦的代码，并且是为一系列其他模式构建的基础。

## 第14章：集合（Collections）

虽然这本书的目的不是讨论你能想到的每一个模式，但我发现有一些值得提及。这就是为什么我也花一章来讨论集合：处理列表的另一种方式。我们已经涵盖了 PHP 提供的内置数组功能和面向对象编程，所以集合是一种更函数式的问题解决方法，与这些主题很好地契合。

也许你以前没有听说过集合，所以让我们先解释一下它们是什么。

集合的核心价值是它们允许更声明式的编程风格，而不是命令式的。区别是什么？命令式编程风格使用代码来描述如何完成某事；声明式风格描述预期的结果。

让我们用一个例子进一步解释差异。声明式语言的最佳例子之一是 SQL：

```
SELECT id, number

FROM invoices

WHERE invoice_date BETWEEN "2020-01-01" AND "2020-01-31";
```

SQL 查询不指定如何从数据库中检索数据，而是描述预期的结果应该是什么。事实上，SQL 服务器可以应用不同类型的算法来解决相同的查询。

将声明式风格与 PHP 中的命令式风格进行比较：

```
$invoicesForJanuary = [];

foreach ($allInvoices as $invoice) {

    if (

        $invoice=>paymentDate=>between(

            new DateTimeImmutable('2020-01-01'), 

            new DateTimeImmutable('2020-01-31')

        )

    ) {

        $invoicesForJanuary[] = [$invoice=>id, $invoice=>number];

    }

}
```

我们的 PHP 实现更加混乱，因为它关注循环遍历项目列表的技术细节以及如何过滤它们。

集合旨在提供更声明式的接口。这是它的样子：

```
$invoicesForJanuary = $allInvoices

    =>filter(fn (Invoice $invoice): bool => 

        $invoice=>paymentDate=>between(

            new DateTimeImmutable('2020-01-01'), 

            new DateTimeImmutable('2020-01-31')

        )

    )

    =>map(fn (Invoice $invoice): array => 

        [$invoice=>id, $invoice=>number]

    )   
```

集合表示原本是普通数组的东西，并提供许多具有更声明式方法的方法。有：

- `filter` 用于过滤结果
- `reject` 是 `filter` 的对立面
- `map` 将集合中的每个项目转换为其他东西
- `reduce` 将整个集合减少为单个结果；还有很多。

你可能现在会从 `filter`、`map` 和 `reduce` 等函数中获得函数式编程的感觉。集合确实在函数式编程中找到了很多灵感，但与真正的函数式编程仍有显著差异：不能保证我们的函数是纯的，你不能从其他函数组合函数，并且在集合的上下文中柯里化并不真正相关。所以虽然集合 API 确实与函数式编程有一些相似之处，但也有显著差异。

深入探讨函数式编程超出了本书的范围，特别是因为 PHP 不是编写真正函数式代码的最佳语言。如果你想了解更多，我强烈推荐 Larry Garfield 的《Thinking Functionally in PHP》一书。在书中，Larry 用你熟悉的语言解释了函数式编程的核心思想。他还解释了为什么你不应该在生产 PHP 应用程序中使用这种方法，但这是在熟悉语言中学习函数式编程概念的好方法。

当你开始用集合思考时，你会开始注意到代码中许多有循环或条件的地方可以重构为集合。重构为声明式风格确实可以使代码更容易阅读和理解——如果你在大型和复杂的代码库中工作，这是一笔宝贵的资产。我强烈推荐的另一本书是 Adam Wathan 的《Refactoring to Collections》（https://adamwathan.me/refactoring-to-collections/）。在其中，Adam 更深入地描述了集合的思想：他解释了构建集合所需的所有构建块，并提供了大量在现实中使用集合的例子。

如果你正在寻找一个可用于生产的集合实现，我强烈推荐使用 `illuminate/collection`，这也是 Laravel 使用的实现。除了是一个彻底和健壮的实现之外，它也有很好的文档：https://laravel.com/docs/8.x/collections。

## 第15章：测试（Testing）

三，这是本书中专门讨论类型系统的章节数量。但我意识到，并非 PHP 社区中的每个人都喜欢使用类型：有些人觉得它们太冗长，或者认为当你没有拥抱静态分析时，它们没有增加足够的价值。就我个人而言，我在"尝试类型化一切"的阵营中，但我尊重其他意见。我认为在某些情况下，拥抱 PHP 的动态特性会更简单。

不过，本章不会讨论类型。它是关于测试的，所以我为什么再次提到类型？我之前提到，类型减少了你应该编写的测试数量，以仍然能够知道程序正确工作。你可以将类型视为它们自己的小测试：内置到语言中以确保你的代码正确工作。尽管如此，类型不可能涵盖所有业务逻辑，这就是为什么适当的测试套件仍然有其用途。

测试作为工作流程的组成部分，可以回答一些问题：哪些类型的测试更好？应该使用哪个测试框架？我不会给出任何明确的答案。然而，我们将在本章一起探索一些选项，并讨论什么构成了一个好的测试套件。我无意在本章中给你一个关于测试框架或测试策略的分步指南。相反，我想向你展示不同的选项。

### 测试类型

有单元测试、集成测试、验收测试、变异测试等等。我认为知道从哪里开始可能具有挑战性。

有些人可能会说单元测试是要走的路，而其他人会告诉你一个集成测试值得一千个单元测试。反过来，这个论点被反驳，因为集成测试在它们不应该破坏时容易破坏。那么，对你来说最好的选择是什么？

### 单元 vs. 集成？

单元测试的定义是它应该孤立地测试程序的"单元"或"组件"。这种隔离通常通过模拟依赖来实现，这样单元测试就不会在依赖中发生变化时破坏。使用模拟会带来额外的维护成本。还有一个问题："单元"有多大：是函数、类、模块？

另一方面，集成测试旨在将一组单元作为一个整体进行测试。它们代表更接近现实生活的场景，例如用户提交表单及其所有副作用，或每小时运行的 cron 作业。集成测试将测试组件如何协同工作。

测试是一个非常谨慎的平衡游戏。即使你有 100% 的单元测试覆盖率，各个组件如何协同工作或传递某些输入时仍然可能存在错误。另一方面，如果你只依赖集成测试，你将很难维护测试套件：它更庞大，在对代码库进行更改时容易破坏，总体上更慢。

与其从理论角度处理这个问题，让我们尝试用另一种方式来解决它：我们测试套件的目标是什么？当然，它是测试程序是否正确工作，但还有更多。一个好的测试套件的一个特征是它可以随着你的项目发展和增长。它是多功能的。我遇到过没有这种多功能性的测试套件：从适当测试套件开始的项目，只发现它们在几个月后因维护和代码腐烂而枯萎并被忽略。一旦我们放弃测试套件，大多数希望就失去了。所以最重要的是，你需要一个可以发展且灵活的测试套件，否则，它会很快失去价值。

如果你正在构建一个类似 CMS 的小型网站，你可能可以完全没有测试套件。但如果你在一个有数千行代码的代码库中与开发团队一起工作，你最终会遇到麻烦。任何人类都不可能在没有适当测试套件的情况下在大型代码库中进行更改并确保一切仍然有效。迟早，你会在生产中部署错误；大多数只是小麻烦，但有一天会有一个灾难性的错误，让你希望你的代码得到适当的测试。

所以，找到一个可以随着你的项目发展的测试策略。任何都比没有好。如果你和你的团队决定投资一个完全单元测试的项目，那很好，但确保组件之间的流程也被测试。如果你只投资集成测试，要做好长期处理额外维护成本的准备，以及一个缓慢且庞大的测试套件。

我更喜欢在它们增加最大价值的地方使用单元测试。有最复杂决策逻辑但相对较少需要模拟的依赖的地方。领域代码通常是彻底单元测试套件的好候选。广泛且快速的测试套件是维护该代码多年的关键。另一方面，基础设施代码、控制器、路由、中间件、请求验证等，从几个健壮的集成测试中受益更好。我更喜欢像我的测试是最终用户或类似的东西一样测试这些代码片段。它允许你编写相对少量的测试，这样添加的性能成本相对较小。

### 更高一级

当我们从单元测试上升到集成测试时，我们的测试套件一次覆盖更多代码，运行通常更慢，更接近最终用户与我们的代码交互的方式。在集成测试之上还有另一个级别。它再次更慢且更庞大，但也尽可能接近最终用户流程：验收测试。

有几种策略可以进行验收测试。我们都在使用至少一种形式：在发货前手动点击应用程序；部署到生产之前的最后验证。有点讽刺的是，即使有完整的测试套件，我们仍然觉得需要做一些手动测试，以确保最终用户的一切按预期工作。另一方面，这不应该太令人惊讶：我们的测试是用代码编写的，这不是最终用户与我们的程序交互的方式。开发者如何测试和程序将如何使用之间总是存在差距。所以我们最终手动探索用户界面。有更好的解决方案。我们正在使用计算机，所以让它们完成所有这些工作；让我们自动化验收测试。

虽然关于单元和集成测试有很多选择和测试框架风格，但模仿实际用户行为的选择并不多。流行的 PHP 验收测试框架如 Codeception 和 Dusk 都建立在相同的软件上：Selenium。Selenium 是一个可以在任何给定浏览器中打开网页并做人类会做的任何事情的服务器：移动鼠标、点击按钮、填写字段等。Selenium 本身是用 Java 编写的，但你可以通过 API 调用与它通信。有一个现有的 PHP 包也处理这个；它被称为 `php-webdriver/php-webdriver`。

想象一下可能性：编写模仿现实生活用户的脚本。以下是一个用 Dusk 编写的示例，它在底层使用 Selenium：

```
$this=>browse(function ($first, $second) {

    $first=>loginAs(User=:find(1))

          =>visit('/home')

          =>waitForText('Message');

    $second=>loginAs(User=:find(2))

           =>visit('/home')

           =>waitForText('Message')

           =>type('message', 'Hey')

           =>press('Send');

    $first=>waitForText('Hey')

          =>assertSee('Name');

});
```

可以自动化几乎所有我们否则会手动测试的东西。一方面，这是一项出色的投资，因为这样的测试显著减少了手动测试所花费的时间，但另一方面，这些测试更容易破坏。想象一下更改按钮上的文本，或 Selenium 用于在页面上查找元素的类或 ID：我们的测试失败了。你可以添加特殊属性用作选择器，比如 `data-selenium-login-button`，但这要求我们在 HTML 中编写大量额外代码并管理它。

除此之外，这些测试比任何其他类型的测试都慢得多：Selenium 将在后台运行一个无头浏览器，需要启动并加载页面，Selenium 需要点击。当然，它比手动完成快得多，但与单元或集成测试相比，它们超级慢。

再次这是一个平衡游戏：在哪里使用 Selenium 测试，在哪里不使用？考虑到它们的维护成本和执行时间，它们在哪里增加足够的价值，在哪里不增加？根据我的经验，当你发现自己一遍又一遍地在 Web 浏览器中执行相同的手动测试时，最好使用 Selenium。Selenium 在测试时可能是一个很好的资产，例如，一个入职表单或一个 JavaScript 重的前端工具。

### 测试测试

所以，我们有了：一个随着我们的应用程序发展的平衡良好的测试套件——一切都很好！不过有一件事：我们怎么知道我们的测试是否会测试正确的东西？我们怎么知道我们正在测试所有相关的代码？让我给你一个简化的例子：

```
function specialFormat(string $input): string

{

    if ($input === 'a') {

        return str_repeat($input, 3);

    }

    return str_repeat($input, 5);

}
```

一个在现实生活中没有任何意义的例子，但让我们暂时使用它。假设这是我们的测试：

```
public function test_special_format()

{

    $output = specialFormat('b');

    $this=>assertEquals('bbbbb', $output);

}
```

它有效，测试成功，但我们错过了 'a' 边缘情况！如果我们没有注意到这一点，我们的测试套件会给一种虚假的安全感。由于现实生活中的代码比这个例子更复杂，我们很可能在这里和那里错过边缘情况。

再次，我们可以使用我们的工具集来帮助我们，而不是试图自己管理一切。一个这样的工具内置在 phpunit 中：代码覆盖率分析。这样的分析器将在测试运行时查看我们的代码，注意哪些部分被执行和未执行。它甚至可以显示代码未测试部分的行级分析。这样的工具很棒，因为我们可以运行现有的测试套件，并返回一个百分比，说明我们的代码有多少被它覆盖。这是检测在测试期间未执行的代码的简单方法。

除了检测这些区域，我们还可以分析我们的测试是否万无一失。这就是变异测试的用武之地。一个变异测试框架，如 Infection PHP，将运行我们的测试套件几次，但它在每次迭代中都会在源代码中更改小细节。这样的更改称为变异或突变体。推理是：我们的测试套件应该足够有弹性，每当发生这样的变异时都会失败，因为一个存活的突变体（意味着它未被检测到，我们的测试仍然运行）是我们测试套件中的潜在错误。

变异测试将更改小细节，例如将 `<` 更改为 `==` 或 `==`，`1` 更改为 `0`，`instanceof` 检查更改为 `true` 或 `false` 等。最后，我们得到一个报告，其中包含检测到我们代码库中更改的测试，以及哪些没有。这产生一个分数，"变异分数指示器"——简称 MSI。我们的 MSI 越高，检测到并杀死的突变体越多，表明测试套件越好。

我意识到关于我提到的框架和技术还有更多要说的，但那些超出了本书的范围。幸运的是，大多数项目都有很好的文档，指导你完成技术设置并解释它们背后的思维方式。

最重要的是一个适合你的项目的测试策略，一个在编码两个月后不会被忽略的策略。自动化测试对任何专业项目都非常有价值，所以你应该绝对投资它们：它们确实有回报！

## 第16章：风格指南（Style Guide）

我在整本书中展示了许多代码示例，你可能已经注意到我在你不会放置的地方放置了括号或逗号。我们将专门用一整章来讨论这个话题。

风格指南——一套关于如何视觉结构化代码的规则——不仅有用；它是专业软件开发的关键部分。事实上，它如此关键，以至于 PHP 社区有一套固定的规则，你可以选择遵循，以及自动化工具来强制执行这些规则。然而，在查看具体细节之前，让我们讨论风格指南的使用。这不都是关于你想要代码看起来像什么的个人偏好吗？

让我们以下面的例子为例，一个 `InvoiceDTO` 的构造函数：

```
class InvoiceDTO

{

    public function =_construct(string $number, ClientId $clientId, Date 

        // … 

    )

}
```

这个问题因为这是一本书而被放大，但无论你在什么尺寸的屏幕上工作，这都是一个问题。参数列表对任何开发者来说都太长了，无法快速阅读和理解，无论一次可见多少代码。如果我们谈论代码可读性，发生的事情比你想象的要多。我们的工作描述是编写代码，但如果你看看你的平均工作日，你更可能在阅读代码而不是编写代码。要么你必须阅读文档，回顾你前一天写的内容，在遗留代码库中找到你的方式，等等。我们每天都在阅读相当多的代码。

就像编写代码一样，阅读需要你的注意力，因为它给你的大脑带来负担。官方术语是"认知负荷"。如果我们设法使我们的代码更具可读性，我们减少了认知负荷，允许我们将它花在其他事情上，比如编写代码。代码库的可读性对你的日常程序员生活有重大影响。

另外，想想你的同事：那些必须在十年后维护你的遗留代码的人。你不喜欢在清晰的代码库中工作，而不是在模糊的代码库中工作吗？

回到我们的例子。很明显参数列表太长了。我们想把它更多地拉到左边，这样我们可以看到这段代码作为一个单独的块，而不是一条长线。一个解决方案可能是写这样的东西：

```
public function =_construct(string $number, 

                            ClientId $clientId, 

                            Date $invoiceDate, 

                            Date $dueDate) { 

    // … 

}
```

这种方法有两个问题。首先，参数仍然在相当右侧。如果你在 Web 开发中，你可能知道人们不阅读网站；他们更倾向于从左到右、从上到下扫描它们。当我们看到屏幕上的某些东西时，我们本能地从看左上角开始。另一方面，使用这种格式化方法，我们将参数列表拉得更远，远离那个焦点。

另一个问题与重构有关。如果你决定将这个构造函数重构为静态 `create` 方法怎么办？你可以看到它打破了对齐：

```
public static function create(string $number, 

                            ClientId $clientId, 

                            Date $invoiceDate, 

                            Date $dueDate): self { 

    // … 

}
```

很明显，这不是理想的解决方案。让我们继续另一个方法：

```
public function =_construct(

    string $number, ClientId $clientId, 

    Date $invoiceDate, Date $dueDate) {

    $this=>number = $number;

    $this=>clientId = $clientId;

    $this=>invoiceDate = $invoiceDate;

    $this=>dueDate = $dueDate;     

}
```

注意我在这里添加了方法体——这是为了让问题更清楚。为了这个例子，我也故意不使用提升属性。在这种情况下，我们已经将参数更多地拉到左边，所以这很好！但是这样做，我们引入了几个焦点，分散在我们的代码中。让我们可视化：

```
public function =_construct(

    string $number, ClientId $clientId, 

    Date $invoiceDate, Date $dueDate) {

    $this=>number = $number;

    $this=>clientId = $clientId;

    $this=>invoiceDate = $invoiceDate;

    $this=>dueDate = $dueDate;     

}
```

有方法开始和结束，有与方法体对齐的第一和第三个参数，然后有不对齐任何东西的第二和第四个参数。这使代码更难阅读。所以让我们继续另一个解决方案：

```
public function =_construct(

    string $number, 

    ClientId $clientId, 

    Date $invoiceDate, 

    Date $dueDate) {

    $this=>number = $number;

    $this=>clientId = $clientId;

    $this=>invoiceDate = $invoiceDate;

    $this=>dueDate = $dueDate;     

}
```

参数又在左边，它们都以可预测的方式对齐，这似乎是一个很好的解决方案。还有一个问题。我可以通过用 X 替换我们代码中的所有字符来最好地可视化它，以显示它的结构：

```
xxxxxx xxxxxxxx xxxxxxxxxxx(

    xxxxxx $xxxxxx, 

    xxxxxxxx $xxxxxxxx, 

    xxxx $xxxxxxxxxxx, 

    xxxx $xxxxxxx) {

    $xxxx=>xxxxxx = $xxxxxx;

    $xxxx=>xxxxxxxx = $xxxxxxxx;

    $xxxx=>xxxxxxxxxxx = $xxxxxxxxxxx;

    $xxxx=>xxxxxxx = $xxxxxxx;     

}
```

很难看到参数列表在哪里结束，方法体在哪里开始。有那个打开方法体的花括号，但它在右侧；不是我们默认的焦点所在！颜色编码帮助我们一点：

```
xxxxxx xxxxxxxx xxxxxxxxxxx(

    xxxxxx $xxxxxx, 

    xxxxxxxx $xxxxxxxx, 

    xxxx $xxxxxxxxxxx, 

    xxxx $xxxxxxx) {

    $xxxx=>xxxxxx = $xxxxxx;

    $xxxx=>xxxxxxxx = $xxxxxxxx;

    $xxxx=>xxxxxxxxxxx = $xxxxxxxxxxx;

    $xxxx=>xxxxxxx = $xxxxxxx;     

}
```

但我们仍然可以做得更好。让我们在参数列表和方法体之间添加一个结构性的、视觉的边界，只是为了尽可能清楚地表明它们的差异。事实证明，有一个正确的地方放置那个花括号：

```
xxxxxx xxxxxxxx xxxxxxxxxxx(

    xxxxxx $xxxxxx, 

    xxxxxxxx $xxxxxxxx, 

    xxxx $xxxxxxxxxxx, 

    xxxx $xxxxxxx

) {

    $xxxx=>xxxxxx = $xxxxxx;

    $xxxx=>xxxxxxxx = $xxxxxxxx;

    $xxxx=>xxxxxxxxxxx = $xxxxxxxxxxx;

    $xxxx=>xxxxxxx = $xxxxxxx;

}
```

在新行上！通过这样做，我们创建了一个我们的眼睛可以扫描的视觉边界。这是最终结果：

```
public function =_construct(

    string $number, 

    ClientId $clientId, 

    Date $invoiceDate, 

    Date $dueDate

) {

    $this=>number = $number;

    $this=>clientId = $clientId;

    $this=>invoiceDate = $invoiceDate;

    $this=>dueDate = $dueDate;     

}
```

在继续之前，我想感谢 Kevlin Henney，他想出了这个可视化。他是一位作家和程序员，有关于代码可读性的精彩演讲：https://www.youtube.com/watch?v=ZsHMHukIlJY

你曾经以这种方式思考过代码吗？有很多细节和思考进入这样的决定，试图优化我们的代码以便阅读它。还有更多要做的事情来改善可读性：选择适当的变量名或摆脱噪音，如冗余的文档块。但这一切都从适当的风格指南开始。

这样一个风格指南的另一个优势是团队内的一致性。很可能你必须处理由同事编写的代码，反之亦然；最好有一个一致的风格指南，使理解外来代码更容易。特别是在开发团队中，我们应该拥抱风格指南并严格遵守它，即使你或我不完全同意其中写的一切。团队内的一致性超越了我们个人的偏好。

我之前提到过它们：官方的 PHP 指南。它之所以是官方的，是因为许多大型框架都同意这些指南。他们称自己为 FIG（Framework Interpolation Group），他们制作了所谓的"PSRs"（PHP Standards Recommendations）。许多框架此后离开了 FIG，今天它显著不那么相关，但他们的风格指南仍然有效。多年来它随着语言一起发展，所以直到今天它仍然相关。最新版本称为 PSR-12，建立在 PSR-1（原始编码风格）之上。

有关于在哪里放置括号、命名变量、结构化类等的规则。我发现学习这些规则很有趣，但你也可以使用自动化工具，这样你就不必过多考虑它们。

像 PhpStorm 这样的 IDE 对这些工具有内置支持，一个流行的工具称为"PHP CS Fixer"。它将分析你的代码风格并可以自动修复错误。它基于规则集，例如 PSR-1、PSR-2 或 PSR-12，但你可以选择添加自己的规则。最重要的规则是拥有整个团队同意的合理指南。

以下是一个 Laravel 项目的 CS Fixer 配置文件的示例：

```
$finder = Symfony\Component\Finder\Finder=:create()

    =>notPath('bootstrap=*')

    =>notPath('storage=*')

    =>notPath('vendor')

    =>in([

        =_DIR=_ . '/app',

        =_DIR=_ . '/tests',

        =_DIR=_ . '/database',

    ])

    =>name('*.php')

    =>notName('*.blade.php')

    =>ignoreDotFiles(true)

    =>ignoreVCS(true);

return PhpCsFixer\Config=:create()

    =>setRules([

        '@PSR2' => true,

        'array_syntax' => ['syntax' => 'short'],

        'ordered_imports' => ['sortAlgorithm' => 'alpha'],

        'no_unused_imports' => true,

        'not_operator_with_successor_space' => true,

        'trailing_comma_in_multiline_array' => true,

        'phpdoc_scalar' => true,

        'unary_operator_spaces' => true,

        'binary_operator_spaces' => true,

        'blank_line_before_statement' => [

            'statements' => ['break', 'continue', 'declare', 'return',

                                'throw', 'try'],

        ],

        'phpdoc_single_line_var_spacing' => true,

        'phpdoc_var_without_name' => true,

        'class_attributes_separation' => [

            'elements' => [

                'method',

            ],

        ],

        'method_argument_space' => [

            'on_multiline' => 'ensure_fully_multiline',

            'keep_multiple_spaces_after_comma' => true,

        ],

        'void_return' => true,

        'single_trait_insert_per_statement' => true,

    ])

    =>setFinder($finder);
```

我对风格指南的思考方式是：我们需要使我们的代码尽可能可读，这样我们在阅读它时失去尽可能少的时间，以便有时间做更重要的事情；比如编写代码。我会说像 CS Fixer 这样的自动化工具现在必不可少。你可以在 CI 期间运行格式化器或将其强制执行为先提交钩子。无论你选择什么方法：在整个团队中保持代码风格一致，它会使在该代码库中工作变得容易得多。正是这些小细节产生了差异！

# 第三部分

## 第17章：JIT（The JIT）

PHP 8 中的 JIT 有很多炒作。有人说它将彻底改变 PHP 的格局。在本章中，我们将讨论 JIT 是什么，它如何显著影响 PHP 的性能，并查看一些现实生活中的基准测试。

### JIT 是什么？

首先："JIT"代表"just in time"（即时）。它的全名是"即时编译器"。你可能还记得，在第4章中，我解释了编译语言和解释语言之间的区别：PHP 属于后者。那么，这个编译器来自哪里？实际上：PHP 有一个编译器，但它不像你在编译语言中看到的那样：没有独立的步骤来运行它，它也不会生成二进制文件。编译器是 PHP 运行时引擎的一部分：PHP 代码仍然需要被编译——翻译——为机器代码；它只是在运行 PHP 代码时即时发生。

JIT 编译器利用了像这样的解释语言：它在运行时查看代码并尝试识别所谓的"热点"（执行次数比其他部分更多的部分）。JIT 将获取该源代码并即时编译为更优化的、对机器友好的代码块，可以运行它。有趣的是，这只有在解释语言中才可能，因为预先完全编译的程序无法再更改。

尝试识别热点的机制被称为"监控器"：它将查看代码，并在运行时监控它。当它检测到执行多次的部分时，它将标记它们为"温"或"热"。然后它可以将热点编译为优化的代码块。你可以想象这个话题还有很多复杂性，但本书的目标不是深入解释 JIT 编译器。相反，它是教你如何在 PHP 中使用它以及何时使用它。

虽然这在理论上听起来很棒，但有一些需要注意的地方。首先：监控代码和生成 JIT 代码也会带来性能成本。幸运的是，从 JIT 获得的好处超过了这个成本。至少，在某些情况下是这样。

第二个问题更重要：在常规的 MVC 应用程序中，没有多少热点可以优化。当 JIT 还在早期阶段时，PHP 社区内分享了一个流行的例子。它显示了一个分形的生成，有和没有 JIT。JIT 版本显著——快了十倍——更快。但让我们诚实：我们在 PHP 应用程序中很少生成分形图像。

即使在框架级别，也很少有代码从优化的 JIT 版本中受益。Web 应用程序中的主要性能瓶颈不是代码本身；而是 I/O 操作，如发送和接收请求、从文件系统读取数据或与数据库服务器通信。

我们现在在推测 JIT 的性能。让我们看看一些现实生活中的基准测试。我拿了一个 Laravel 项目及其生产数据库，决定对其进行基准测试。

### 现实生活中的基准测试

让我们先设置场景。这些基准测试是在我的本地机器上运行的。因此，它们对绝对性能增益没有任何说明；在这里，我只对 JIT 对现实代码的相对影响做出结论感兴趣。

我将运行 PHP FPM，配置为生成 20 个子进程，我总是确保一次只运行 20 个并发请求，以消除 FPM 级别的任何额外性能影响。使用以下命令发送这些请求，使用 ApacheBench：

```
ab -n 100 -c 20 -l localhost:8000
```

### JIT 设置

项目就绪后，让我们配置 JIT 本身。通过指定 `php.ini` 中的 `opcache.jit_buffer_size` 选项来启用 JIT。如果排除了这个指令，默认值设置为 0，JIT 不会运行。

```
opcache.jit_buffer_size=100M
```

你还想设置一个 JIT 模式，这将决定 JIT 如何监控和响应代码的热点。你需要使用 `opcache.jit` 选项。它的默认值设置为 `tracing`，但你也可以将其设置为 `function`：

```
opcache.jit=function

; opcache.jit=tracing
```

`tracing` 或 `function` 模式将决定 JIT 如何工作。区别在于 `function` JIT 只会在单个函数的上下文中监控和编译代码，而 `tracing` JIT 可以跨越这些边界。在我们的现实基准测试中，我将比较这两种模式。所以让我们开始基准测试！

### 建立基线

首先，最好确定 JIT 是否正常工作。我们从 RFC 中知道它对计算分形有显著影响。所以让我们从那个例子开始。我从 RFC 复制了 mandelbrot 示例，并通过我将在下一个基准测试上运行的相同 HTTP 应用程序访问它：

```
public function index()

{

    for ($y = -39; $y < 39; $y=+) {

        printf("\n");

        for ($x = -39; $x < 39; $x=+) {

            $i = $this=>mandelbrot(

                $x / 40.0,

                $y / 40.0

            );

            if ($i == 0) {

                printf("*");

            } else {

                printf(" ");

            }

        }

    }

    printf("\n");

}

private function mandelbrot($x, $y)

{

    $cr = $y - 0.5;

    $ci = $x;

    $zi = 0.0;

    $zr = 0.0;

    $i = 0;

    while (1) {

        $i=+;

        $temp = $zr * $zi;

        $zr2 = $zr * $zr;

        $zi2 = $zi * $zi;

        $zr = $zr2 - $zi2 + $cr;

        $zi = $temp + $temp + $ci;

        if ($zi2 + $zr2 > 16) {

            return $i;

        }

        if ($i > 5000) {

            return 0;

        }

    }

}
```

运行 `ab` 几百个请求后，我们可以看到结果：

```
                                      requests/second (more is better)

Mandelbrot without JIT                                            3.60

Mandelbrot with tracing JIT                                      41.36
```

太好了，看起来 JIT 正在工作！甚至有十倍的性能提升！

如果你想验证 JIT 是否正在运行，你可以使用 `opcache_get_status()`，它有一个 `jit` 条目，列出了所有相关信息：

```
print_r(opcache_get_status()['jit']);

// array:7 [

//   "enabled" => true

//   "on" => true

//   "kind" => 5

//   "opt_level" => 4

//   "opt_flags" => 6

//   "buffer_size" => 104857584

//   "buffer_free" => 104478688

// ]
```

验证它按预期工作后，让我们继续我们的第一个现实比较。我们将比较运行我们的代码时没有 JIT、使用 function JIT 和 tracing JIT，两者都使用 100MB 内存。我们将进行基准测试的页面显示帖子概述，所以有一些递归发生。我们也在接触 Laravel 的几个核心部分：路由、依赖容器以及 ORM 层。

```
                                      requests/second (more is better)

No JIT                                                           63.56

Function JIT                                                     66.32

Tracing JIT                                                      69.45
```

这里我们看到结果：启用 JIT 只有轻微改进。事实上，重复运行基准测试，结果每次都略有不同：我甚至看到 JIT 启用的运行比非 JIT 版本表现更差的情况。

在得出结论之前，让我们提高内存缓冲区限制。我们将给 JIT 更多的呼吸空间，使用 500MB 内存而不是 100MB。

```
                                      requests/second (more is better)

No JIT                                                           71.69

Function JIT                                                     72.82

Tracing JIT                                                      70.11
```

这里我们有一个 JIT 表现更差的情况。就像我在本章开头说的：我想测量 JIT 对现实 Web 项目的相对影响。从这些测试中可以清楚地看出，有时可能有好处，但绝对不像我们开始时的分形例子那样明显。我承认我并不对此感到惊讶。

就像我之前写的：在现实应用程序中，很少有热点代码可以优化。我们很少做类似分形的计算。

所以我说不需要 JIT 吗？不完全是。我认为 JIT 可以为 PHP 开辟新的领域：复杂计算确实从 JIT 代码中受益的领域。我在考虑机器学习和解析器之类的东西。JIT 可能给 PHP 社区提供了还不存在的机会，但此时很难确定地说什么。

例如，有一个名为 `nikic/php-parser` 的包——一个 PHP 实现，可以将 PHP 代码解析为结构化数据。这个包实际上被像 Psalm 这样的静态分析工具使用，事实证明这个包确实从 JIT 中受益很多。

所以即使在今天，已经有优势了，只是在运行 Web 应用程序时不是这样。

### 需要维护的复杂性

将 JIT 添加到 PHP 的核心也带来了额外的维护成本。因为 JIT 生成机器代码，你可以想象这对高级程序员来说是复杂的材料。假设 JIT 编译器中有错误。为此，你需要一个知道如何修复它的开发者。在这个 JIT 的情况下，Dmitry Stogov 做了大部分编程工作，只有少数人了解它是如何工作的。

由于今天只有少数人能够维护这样的代码库，JIT 编译器是否可以正确维护的问题似乎是合理的。当然，人们可以学习编译器如何工作，但这仍然是一个复杂的问题。

我不认为这应该是放弃 JIT 的理由，但维护成本仍然应该仔细考虑。首先，由维护代码的人和用户社区考虑，他们也应该意识到一些错误修复或版本更新可能需要比我们现在习惯的时间更长。

### 你想要它吗？

如果你认为 JIT 为你的 Web 应用程序提供的短期好处很少，我会说你是对的。很明显，它的影响充其量是最小的。

尽管如此，我们应该记住，JIT 可以为 PHP 的增长开辟许多可能性，既作为 Web 语言，也作为更通用的语言。所以需要回答的问题：这可能是一个光明的未来，值得今天的投资吗？

时间会告诉我们答案。

## 第18章：预加载（Preloading）

另一个专注于性能的核心功能是预加载，在 PHP 7.4 中添加。这是一个可以通过在服务器启动时将缓存的 PHP 文件加载到内存中来显著提高代码性能的功能。预加载通过使用专用的预加载脚本完成——你必须自己编写或生成。脚本在服务器启动时执行一次，从该脚本中加载的所有 PHP 文件将在内存中可用于所有后续请求。在本章中，我将向你展示如何设置和使用预加载，并像我对 JIT 那样分享基准测试。

让我们开始深入讨论预加载。

### Opcache，但更多

预加载本身建立在 opcache 之上，但它并不完全相同。Opcache 将在运行时获取你的 PHP 源文件，将它们编译为"opcodes"（操作码），并将这些编译的文件存储在磁盘上。你可以将 opcodes 视为代码的低级表示，可以在运行时轻松解释。下次请求缓存文件时，可以跳过翻译步骤，可以从磁盘读取文件。实际上，像这样的简单 PHP 指令：

```
echo 1 + 2;
```

将被翻译为如下 opcodes：

```
line     #        op           fetch          ext  return  operands

---------------------------------------------------------------------

   6     0        ADD                              -0      1,2 

         1        ECHO                                     ~0

   7     2        RETURN                                   1
```

Opcache 已经显著加快了 PHP 的速度，但还有更多可以获得的。最重要的是：opcached 文件不知道其他文件。如果你有一个 `Order` 类从 `Model` 类扩展，PHP 仍然需要在运行时将它们链接在一起。

所以这就是预加载发挥作用的地方：它不仅会将源文件编译为 opcodes，还会将相关的类、trait 和接口链接在一起。然后它将把这个"编译的"可运行代码块——即：PHP 解释器可用的代码——保存在内存中。当请求到达服务器时，它现在可以使用已经加载到内存中的代码库部分，而没有任何开销。

与 opcache 相比，预加载进一步提高了性能，因为它已经链接了文件，不必从磁盘读取缓存的 opcodes，并且不处理缓存失效。一旦文件被缓存，它就会一直存在，直到服务器重启。

那么，到底哪些文件可以被预加载？你如何做到这一点？

### 预加载实践

为了使预加载工作，你——开发者——必须告诉服务器要加载哪些文件。这是通过一个简单的 PHP 脚本完成的，该脚本可以包含其他文件。规则很简单：

- 你提供一个预加载脚本，并在 `php.ini` 文件中使用 `opcache.preload` 链接它
- 你想要预加载的每个 PHP 文件都应该在该脚本中加载。你可以使用 `opcache_compile_file()` 或 `require_once` 来这样做。

假设你想预加载 Laravel 框架。你的脚本必须循环遍历 `vendor/laravel` 目录中的所有 PHP 文件并单独包含它们。

以下是你如何在 `php.ini` 中链接到此脚本：

```
opcache.preload=/path/to/project/preload.php
```

这是该预加载文件的虚拟实现：

```
$files = /* An array of files you want to preload */;

foreach ($files as $file) {

    opcache_compile_file($file);

}
```

**警告：无法预加载未链接的类**

等等；有一个注意事项！要预加载文件，它们的依赖——接口、trait 和父类——也必须被预加载。如果类依赖有任何问题，你将在服务器启动时收到通知：

```
Can't preload unlinked class Illuminate\Database\Query\JoinClause:

Unknown parent Illuminate\Database\Query\Builder
```

这是我之前讨论的链接部分：预加载文件的依赖也必须被加载；否则，PHP 无法预加载它们。顺便说一下，这不是致命错误——你的服务器会正常启动——但它表明并非所有你想要预加载的文件都能这样做。

幸运的是，有一种方法可以确保 PHP 文件的所有依赖也被加载：你可以使用 `require_once` 而不是 `opcache_compile_file`，让注册的自动加载器（可能是 composer 的）处理其余部分。

```
$files = /* All files in eg. vendor/laravel */;

foreach ($files as $file) {

    require_once($file);

}
```

仍然有一些注意事项。例如，如果你尝试预加载 Laravel，框架内的一些类依赖于其他还不存在的类。例如，文件系统缓存类 `\Illuminate\Filesystem\Cache` 依赖于 `\League\Flysystem\Cached\Storage\AbstractCache`，如果你从不使用文件系统缓存，它可能不会安装在你的项目中。

你可能在尝试预加载所有内容时遇到"类未找到"错误。唯一的解决方案是从预加载中跳过那些文件。幸运的是，在默认的 Laravel 安装中，只有少数这样的类，可以轻松忽略。为了方便，我编写了一个小的预加载器类，使忽略文件更容易，这是它的样子：

```
class Preloader

{

    private array $ignores = [];

    private static int $count = 0;

    private array $paths;

    private array $fileMap;

    public function =_construct(string ==.$paths)

    {

        $this=>paths = $paths;

        // We'll use composer's classmap

        // to easily find which classes to autoload,

        // based on their filename

        $classMap = require =_DIR=_ . 

            '/vendor/composer/autoload_classmap.php';

        // We flip the array, so that file paths are the array keys

        // With it, we can search the corresponding class by its path

        $this=>fileMap = array_flip($classMap);

    }

    public function paths(string ==.$paths): Preloader

    {

        $this=>paths = array_merge(

            $this=>paths,

            $paths

        );

        return $this;

    }

    public function ignore(string ==.$names): Preloader

    {

        $this=>ignores = array_merge(

            $this=>ignores,

            $names

        );

        return $this;

    }

    public function load(): void

    {

        // We'll loop over all registered paths

        // and load them one by one

        foreach ($this=>paths as $path) {

            $this=>loadPath(rtrim($path, '/'));

        }

        $count = self=:$count;

        echo "[Preloader] Preloaded {$count} classes" . PHP_EOL;

    }

    private function loadPath(string $path): void

    {

        // If the current path is a directory,

        // we'll load all files in it 

        if (is_dir($path)) {

            $this=>loadDir($path);

            return;

        }

        // Otherwise we'll just load this one file

        $this=>loadFile($path);

    }

    private function loadDir(string $path): void

    {

        $handle = opendir($path);

        // We'll loop over all files and directories

        // in the current path,

        // and load them one by one

        while ($file = readdir($handle)) {

            if (in_array($file, ['.', '=.'])) {

                continue;

            }

            $this=>loadPath("{$path}/{$file}");

        }

        closedir($handle);

    }

    private function loadFile(string $path): void

    {

        // We resolve the classname from composer's autoload mapping

        $class = $this=>fileMap[$path] =? null;

        // And use it to make sure the class shouldn't be ignored

        if ($this=>shouldIgnore($class)) {

            return;

        }

        // Finally we require the path,

        // causing all its dependencies to be loaded as well

        require_once($path);

        self=:$count=+;

        echo "[Preloader] Preloaded `{$class}`" . PHP_EOL;

    }

    private function shouldIgnore(?string $name): bool

    {

        if ($name === null) {

            return true;

        }

        foreach ($this=>ignores as $ignore) {

            if (strpos($name, $ignore) === 0) {

                return true;

            }

        }

        return false;

    }

}
```

通过在同一预加载脚本中添加此类，我们现在可以像这样加载整个 Laravel 框架：

```
// …

(new Preloader())

    =>paths(=_DIR=_ . '/vendor/laravel')

    =>ignore(

        \Illuminate\Filesystem\Cache=:class,

        \Illuminate\Log\LogManager=:class,

        \Illuminate\Http\Testing\File=:class,

        \Illuminate\Http\UploadedFile=:class,

        \Illuminate\Support\Carbon=:class,

    )

    =>load();
```

所以请记住，每次你对预加载脚本或其任何预加载文件进行更改时，你都必须重启服务器。我的意思不是物理重启整个服务器；重启 php-fpm 就足够了。如果你在 Linux 机器上，就像运行 `sudo service php8.0-fpm restart` 一样简单。将 8.0 替换为你使用的版本。

### 它有效吗？

有了所有这些预加载的文件，我们确定它们被正确加载了吗？你可以简单地通过重启服务器并在 PHP 脚本中转储 `opcache_get_status()` 的输出来测试它。你会看到一个名为 `preload_statistics` 的键，它将列出所有预加载的函数、类和脚本，以及预加载文件消耗的内存。

关于使用预加载时的操作方面，还有一件重要的事情要提到。你已经知道需要为预加载在 `php.ini` 中指定一个条目。如果你使用共享主机，你将无法自由配置 PHP。实际上，你需要一个专用（虚拟）服务器才能为单个项目优化预加载文件。所以请记住这一点。

最重要的是：预加载是否提高了性能？让我们进行基准测试！就像 JIT 一样，我将做一个实用的基准测试，测量相对结果并测量一个现实项目。重要的是要知道预加载是否值得你在自己的项目中花费时间，而不仅仅是在理论基准测试中。这个项目与前一章中的 Laravel 项目相同：它还会进行一些数据库调用、视图渲染等。

让我们设置场景。

### 预加载设置

由于我主要对预加载对我的代码的相对影响感兴趣，我决定使用 Apache Bench 在本地机器上运行这些基准测试。我将发送 5000 个请求，每次 50 个并发请求。Web 服务器是 Nginx，使用 PHP-FPM。因为早期版本的预加载存在一些错误，我只能从 PHP 7.4.2 开始成功运行这些基准测试。

我将对三种场景进行基准测试：一种是禁用预加载，一种是预加载所有 Laravel 和应用程序代码，一种是优化预加载类列表。后者的原因是预加载也带来了内存开销。如果我们只预加载"热点"类——经常使用的类——我们可能能够在性能增益和内存使用之间找到一个平衡点。

### 禁用预加载

我们在没有启用预加载的情况下启动 php-fpm 并运行我们的基准测试：

```
./php-7_4_2/sbin/php-fpm =-nodaemonize

ab -n 5000 -c 50 -l localhost:8000
```

这些是结果：我们能够每秒处理 64.79 个请求，每个请求的平均时间为 771ms。这是我们的基线场景，我们可以将下一个结果与此进行比较。

### 简单预加载

接下来，我们将预加载所有 Laravel 和应用程序代码。这是简单的方法，因为我们永远不会在请求中使用所有 Laravel 类。我们预加载的文件比严格需要的多得多，所以我们必须为此付出代价。在这种情况下，预加载了 1165 个文件及其依赖，导致包含 1366 个函数和 1256 个类。

就像我之前提到的，你可以从 `opcache_get_status()` 中读取该信息：

```
opcache_get_status()['preload_statistics'];
```

我们从 `opcache_get_status()` 得到的另一个指标是用于预加载脚本的内存。在这种情况下是 17.43 MB。即使我们预加载的代码比我们实际需要的多，简单预加载已经对性能产生了积极影响。

```
                           requests/second            time per request

No preloading                        64.79                       771ms

Naive preloading                     79.69                       627ms
```

你已经可以看到性能提升：我们可以每秒处理更多请求，处理一个请求的平均时间下降了约 20%。

### 优化

最后，我们想比较使用优化的预加载列表时的性能提升。为了测试目的，我在没有启用预加载的情况下启动了服务器，并转储了在该请求中使用的所有类：

```
get_declared_classes();
```

接下来，我只预加载这些类（总共 427 个）。连同它们的所有依赖，这使 643 个类和 1034 个函数被预加载，占用约 11.76 MB 的内存。

这是此设置的基准测试结果：

```
                           requests/second            time per request

No preloading              64.79                                 771ms

Naive preloading           79.69                                 627ms

Optimised preloading       86.12                                 580ms
```

与不使用预加载相比，性能提升约 25%，与使用简单方法相比，性能提升约 8%。不过，这个设置有一个缺陷，因为我为特定页面生成了优化的预加载列表。实际上，如果你想覆盖所有页面，你可能需要预加载更多代码。

另一种方法可能是监控在你的生产服务器上几个小时或几天内加载了哪些类以及加载了多少次，并根据这些指标编译预加载列表。一个这样做的包叫做 `darkghosthunter/preloader`。绝对值得一试。

可以安全地说，预加载——即使使用简单的"预加载一切"方法——也有积极的性能影响，即使在基于完整框架的现实项目上也是如此。然而，仍然有一个重要的注意事项。现实应用程序很可能不会体验到 25% 的性能提升。那是因为它们做的事情比仅仅启动框架多得多。我能想到的一件重要事情是 I/O：与数据库服务器通信、读写文件系统、与第三方服务集成等。所以虽然预加载可以优化代码的启动部分，但可能还有其他领域对性能有更大的影响。确切能获得多少收益将取决于你的代码、服务器和使用的框架。我会说去试试，不要忘记测量结果。

## 第19章：FFI

PHP 有一个丰富的扩展生态系统，其中大多数可以使用简单的 `pecl install …` 安装。许多这些扩展通过集成第三方库来提供它们的功能。例如，像 `imagick` 这样的扩展：它是用 C 编写的，并将底层的 ImageMagick 库作为函数暴露给 PHP。`imagick` 扩展本身不提供图像处理功能；它只提供 PHP 和 ImageMagick 之间的桥梁。

FFI——全称"foreign function interface"（外部函数接口）——使暴露此类底层库的过程"更容易"。我使用引号是因为你仍然需要了解这些库在底层如何工作，但你不再需要编写和分发专用的扩展。FFI 使这个过程更容易，因为它允许你在其他地方必须用 C 实现扩展的地方编写 PHP。

换句话说：如果所需的库存在于你的服务器或本地开发环境中，你可以通过使用 composer 并仅下载 PHP 代码来安装类似扩展的功能。你可以与任何语言集成，只要它可以编译为共享库，这些库在 Unix 和 Linux 系统上是 `.so` 文件，在 Windows 上是 `.dll` 文件。

要了解 FFI 代码的样子，让我们看一个来自官方 FFI 文档页面的示例：

```
$ffi = FFI=:cdef("

    typedef unsigned int time_t;

    typedef unsigned int suseconds_t;

    struct timeval {

        time_t      tv_sec;

        suseconds_t tv_usec;

    };

    struct timezone {

        int tz_minuteswest;

        int tz_dsttime;

    };

    int gettimeofday(struct timeval *tv, struct timezone *tz);    

", "libc.so.6");

$tv = $ffi=>new("struct timeval");

$tz = $ffi=>new("struct timezone");

var_dump($ffi=>gettimeofday(

    FFI=:addr($tv), 

    FFI=:addr($tz))

);

var_dump($tv=>tv_sec);

var_dump($tz);
```

这个简短的例子已经显示了实现 FFI 的复杂性：你需要将头文件定义加载到 `$ffi` 变量中，并使用从该变量暴露的结构和函数。此外，你不能只是复制这个代码片段并通过 Web 请求运行它：由于安全原因，FFI 默认只在 CLI 和预加载脚本中启用。想象一下，如果你能够从 Web 请求操作 FFI 代码，并获得对所有系统二进制文件的访问权限，并可能利用其中的安全漏洞。请注意：你可以在 Web 请求中启用 FFI，但在这样做之前，你可能应该三思而后行。最后，你需要为 FFI 工作启用 opcache，所以如果你通过 CLI 运行此脚本，你必须特别启用 opcache，因为它在默认情况下在那里是禁用的。

### 头文件

头文件记录了你正在集成的共享库中可用的功能。这在 C 编程中是常见做法，但在 PHP 中是未知的。

头文件作为结构和函数的定义列表，没有它们的实际实现；类似于类的接口。不幸的是，PHP 的 FFI 不支持所有现代头文件语法。所以虽然原始头文件可用于你想要集成的任何库，但你可能需要专门为 PHP 重写它们以便理解。

正如你所看到的，FFI 编程不仅仅是编写简单的 PHP 代码。另一方面，即使 FFI 不如编译的 C 扩展那样高性能——它必须解析头文件的开销——它仍然可以提供比直接在 PHP 中实现相同功能的显著性能改进。总之：FFI 有潜力，但不是即插即用的解决方案。

这给我们带来了一个问题：FFI 有哪些用例？首先想到的是 CPU 密集型任务，在低级语言（如 C 或 Rust）中比在 PHP 中更高效。所以我询问了社区中使用 FFI 的人，确实有一些人在使用它。一个例子是高效解析大型数据集。还有通过 composer 交付类似扩展代码的用例。

另一个有趣的例子是更改 PHP 运行时本身，这样你不再需要在 PHP 文件中添加开头的 `<?php` 标签。看看当 PHP 可以直接与其他语言对话时，有多少变得可能，这很有趣。还有一个：有一个由 Anthony Ferrara 创建的项目，名为 `php-compiler`。它可以编译（有限集的）PHP 代码并从该代码生成二进制文件；它实际上是用 PHP 使用 FFI 编写的。

### 想了解更多？

有一个有趣的 GitHub 仓库列出了在 PHP 中使用 FFI 的示例，名为 `gabrielrcouto/awesome-php-ffi`。

不过，大多数 FFI 项目仍然非常年轻。FFI 从 PHP 7.4 开始支持，所以当这本书发布时它只有一岁。总的来说，FFI 还没有被广泛使用。这没有什么错：这是一个相当小众的解决方案，没有多少 PHP 开发者必须处理它。尽管如此，FFI 有潜力，但在它被广泛采用之前可能需要一些改进。所以让我们期待它未来几年的发展！

## 第20章：内部（Internals）

在这本书中，我们专注于许多与语法相关的和核心功能。这些功能来自哪里？谁决定什么被添加到语言中，什么不被添加？我之前提到过一两次"internals"（内部）组——他们是否在决定一切？

确实有一群核心开发者编写和维护所有使 PHP 运行的代码。此外，还有扩展开发者、文档维护者、发布经理和其他 PHP 项目角色。所有这些人一起组成了决定什么被添加到 PHP 中，什么不被添加的组。他们是拥有投票权的人。

这些投票权在每个 RFC 结束时使用——"request for comments"（请求评论）。RFC 是一个描述新功能或语言更改的文档；它被讨论一段时间（最少两周），最后进行投票。如果 RFC 有 2/3 的多数票支持，它被认为被接受，功能被添加到语言中。

### PHP RFC：Attributes v2

作为一个例子，这是 attributes RFC 的（缩短版本）。你会注意到在这个 RFC 中使用的旧属性语法，它后来才被更改。

**版本：** 0.5  
**日期：** 2020-03-09  
**作者：** Benjamin Eberlei (beberlei@php.net), Martin Schröder  
**状态：** 已实现  
**目标：** 8.0  
**首次发布：** http://wiki.php.net/rfc/attributes_v2  
**实现：** https://github.com/php/php-src/pull/5394

这个 RFC 的很大功劳归功于 Dmitry Stogov，他之前关于 attributes 的工作是这个 RFC 和补丁的基础。

**介绍**

这个 RFC 提议将 Attributes 作为类、属性、函数、方法、参数和常量的结构化、语法元数据形式。Attributes 允许直接嵌入代码声明的配置指令。

类似的概念存在于其他语言中，在 Java 中称为 Annotations，在 C#、C++、Rust、Hack 中称为 Attributes，在 Python、Javascript 中称为 Decorators。

到目前为止，PHP 只提供这种元数据的非结构化形式：doc-comments。但 doc-comments 只是字符串，为了保持一些结构化信息，各种 PHP 子社区在它们内部发明了基于 @ 的伪语言。

除了用户层面的用例之外，引擎和扩展中还有许多 attributes 的用例，这些用例可能影响编译、诊断、代码生成、运行时行为等。下面给出了示例。

用户层面 doc-comment 解析的广泛使用表明这是社区高度需求的功能。

**提议**

**属性语法**

Attributes 是使用现有令牌 T_SL 和 T_SR 用 "<<" 和 ">>" 包围的特殊格式文本。

attributes 可以应用于语言中的许多东西：

- 函数（包括闭包和短闭包）
- 类（包括匿名类）、接口、trait
- 类常量
- 类属性
- 类方法
- 函数/方法参数

示例：

```
<<ExampleAttribute>>

class Foo

{

    <<ExampleAttribute>>

    public const FOO = 'foo';

    <<ExampleAttribute>>

    public $x;

    <<ExampleAttribute>>

    public function foo(<<ExampleAttribute>> $bar) { }

}
```

理论上，每个人都允许制作 RFC。你不需要有投票权。每个用户层面开发者——你和我——都可以提交一个想法供讨论。但有一个重要的注意事项：如果你设法让 RFC 被接受，它仍然需要实现。事实上，在 RFC 投票之前有一个可工作的实现通常是一个优势。所以虽然你技术上可以在 RFC 被接受后要求某人实现你的功能，但能够自己编写代码或与能够事先实现更改的人密切合作是一种资产。

用几段描述了 RFC 过程后，它可能看起来相当简单和直接。当然，大多数时候，合理的 RFC 会被批准。但也有例外，RFC 可能变得非常有争议，导致冗长的讨论。最近的一个例子是 attributes RFC，我之前展示的摘录。最初被接受的 RFC 已经是添加类似注释行为的第七次尝试。那些先前的尝试发生在几年间，最早的可以追溯到 2010 年 8 月！

有几个原因导致 attributes 花了十年时间才被添加。首先，有关于 attributes 应该和不应该做什么的讨论：它们支持的功能越多，实现就越复杂。有关于 attributes 应该看起来像什么，应该使用什么语法的讨论。这类问题延长了讨论期，并在此过程中导致一些失败的 RFC。不过，多年来，这个想法可以进一步改进，可能必须做出一些妥协。

这样一个妥协是 attribute 的语法，在 attributes 被接受后，花了两个额外的 RFC 来决定。有一些选项，如：@、@@、`<<>>`、`[]`，还有几个。最终，`[]` 被选为最佳选项，因为 @ 不可用，因为它已经是错误抑制运算符。需要数月的讨论才能最终达成一致同意的语法。许多好的论据被提出支持或反对所有选项。

所有这些讨论都是公开进行的。你可以通过加入 internals 邮件列表很好地跟进。有一个名为 externals.io 的网站，将邮件暴露在网页上，使它们更容易阅读。我认为关注这个列表是一件好事，稍微了解 PHP 是如何设计的。即使你从未打算为 PHP 的核心做出贡献，了解你正在使用的工具如何发展以及用户层面开发者如何在该过程中提供有价值的反馈仍然是好的。

我们也看到越来越多的核心贡献者在过去几年中倾听用户层面开发者。有些人坚持认为核心开发者不关心现实生活中的 PHP 的偏见，但这绝对不再是事实。核心开发者和用户层面开发者之间在社交媒体、GitHub 和 internals 列表上有很多互动。PHP 开发中的几个关键人物向用户层面开发者伸出援手，以更好地了解现实 PHP 项目中需要什么。

还有改进的空间，但 PHP 在过去十年中已经成熟。这也体现在 internals 过程中。

## 第21章：类型变体（Type Variance）

在这本书的前面，我们讨论了类型系统及其对编程语言的价值。我们还谈到了 PHP 类型系统的最新变化，以及如何通过添加适当的变体支持使其更加灵活。编程语言中的类型安全是一个非常有趣的话题，我决定专门用一章来讨论它。

当我们讨论静态分析时，我展示了一个 `RgbValue` 类的例子来表示"0 到 255 之间的整数值"。这个类型确保有效输入，并允许我们删除冗余的输入验证。它看起来像这样：

```
class RgbValue extends MinMaxInt

{

    public function =_construct(int $value) 

    {

        parent=:=_construct(0, 255, $value);

    }

}
```

使用 `RgbValue` 作为类型，我们保证只会传递给我们函数在其描述的子集内的输入。子集是这里的有趣词。所有类型都可以被视为所有可用输入的过滤器。`RgbValue` 表示正整数的子集，它表示所有整数的子集，而所有整数又是所有标量值（整数、浮点数、字符串……）的子集，这些是……的子集。你能看到某种继承链形成的心理图像吗？`RgbValue > 正整数 > 所有整数 > 标量值 > 一切`。

这是另一个例子：当我们讨论 PHP 的类型系统时，我们有一个名为 `UnknownDate` 的类；它表示缺失的日期，并允许我们使用 null 对象模式。`UnknownDate` 是 `Date` 的子类型，它是 `object` 的子类型，而 `object` 又是一切的子类型。

说到那个例子，让我们重新审视它。这是 `Invoice` 接口：

```
interface Invoice

{

    public function getPaymentDate(): Date;

}
```

这个接口表示 `Invoice` 类型，它带有一个规则：它有一个 `PaymentDate`。这个接口保证任何实现 `Invoice` 的对象在调用 `getPaymentDate()` 时将返回有效的 `Date` 对象。那么 `PendingInvoice` 呢？我们决定让它返回一个 `UnknownDate`。这提出了一个问题：`Invoice` 接口所做的承诺是否仍然有效？

```
class PendingInvoice implements Invoice

{

    public function getPaymentDate(): UnknownDate 

    {

        return new UnknownDate();

    }

}
```

当然有效！由于所有未知日期都是日期的子集，这意味着无论何时返回 `UnknownDate`，我们总是确定它也是一个 `Date`。这就是变体描述的内容：在继承期间改变但仍然满足父类原始承诺的类型定义。在返回类型的情况下，我们允许在继承期间进一步指定它们，这被称为"协变"（covariance）。在参数类型的情况下，情况相反。

想出一个对逆变类型（contravariant types）——协变类型的相反——有意义的例子并不容易。它们在 PHP 中很少使用：它们与泛型结合使用最有意义，而 PHP 不支持泛型。

尽管如此，有一些边缘情况可能有用。让我们考虑一个例子：

```
interface Repository

{

    public function retrieve(int $id): object;

    public function store(object $object): void;

}

interface WithUuid

{

    public function retrieve(string $uuid): object;

}
```

`Repository` 接口描述了一个简化的仓库：一个可以从数据存储中检索和存储对象的类。仓库假设所有 ID 都是整数。

不过，还有一个 `WithUuid` 接口，它允许传递文本 UUID 而不是数字。接下来让我们实现 `OrderRepository`：

```
class OrderRepository implements Repository, WithUuid

{

    public function retrieve(int $id): object { /* … */ }

    public function store(object $object): void { /* … */ }

}
```

这里我们看到一个问题：我们不能在 `retrieve` 方法中使用 `int $id`，因为它违反了 `WithUuid` 指定的契约。如果我们使用 `string $uuid`，会有同样的问题，但方向相反。

正是这些边缘情况使逆变类型有用：PHP 允许我们扩大参数类型，以履行两个承诺：一个由 `Repository` 做出，一个由 `WithUuid` 做出。由于 PHP 8 的联合类型，我们可以像这样编写 `retrieve` 的实现：

```
class OrderRepository implements Repository, WithUuid

{

    public function retrieve(int|string $id): object { /* … */ }

    // …

}
```

这段代码有效！当然，我们现在需要在 `retrieve` 方法中手动处理字符串和整数；尽管如此，当没有其他方法可以解决问题时，有这个选项是好的。

所以返回类型是协变的，参数类型是逆变的。那么类型属性呢？它们是不变的（invariant），这意味着你不允许在继承期间更改属性类型。类型属性 RFC 清楚地解释了为什么是这样：

"属性类型不变的原因是因为它们既可以从读取，也可以写入。从 `int` 到 `?int` 的更改意味着从属性读取现在除了整数之外还可能返回 `null`。从 `?int` 到 `int` 的更改意味着不再可能将 `null` 写入属性。因此，逆变和协变都不适用于属性类型。"

在 PHP 7.4 之前，你不允许扩大或缩小类型，即使这在技术上是正确的。虽然这可能看起来像是一个小变化，但它实际上是一个使 PHP 类型系统使用更加灵活的变化。

## 第22章：异步 PHP（Async PHP）

在讨论 MVC 模式时，我们研究了为什么它适合 PHP，特别是因为 PHP 有一个非常干净的请求/响应周期。每次新请求到达时，一个新进程启动并从零开始启动我们的 PHP 应用程序。这个特性使 PHP 如此容易上手：你不需要任何编译器，你不需要处理跨请求的共享状态或担心内存管理；它超级简单。

不过，简单并不总是首选。PHP 中有一个社区在过去几年中越来越受欢迎：异步社区。在这本书中提到他们是值得的，因为最近有越来越多的异步 PHP 用例。现代 PHP 不仅用于为博客或小公司网站提供支持；它还用于构建大规模的大型 Web 应用程序，在某些情况下，异步会带来显著价值。

首先明确：我无法在本章中深入解释异步编程。解释异步需要一本书。本章的目标是让你了解 PHP 的选项。所以我假设你知道一些异步相关的词汇。如果不是这样，也不用担心，它仍然会是一个有趣的阅读，但如果你对这个话题感兴趣，你可能需要做一些后续研究。在这种情况下，我建议你看看 JavaScript 社区，它比其他语言更拥抱异步编程，并且有很好的资源来学习异步思维。

### 什么是异步？

通过"异步 PHP"，我们指的是一个 PHP 进程可以同时处理多个事情。你可以使用线程或创建子进程，每个都专门用于单个任务。反过来，父进程将监控和管理所有这些子进程。例如，你可以为每个传入的请求创建一个子进程，并从父进程共享已加载和启动的框架，而不是在每个请求上从头启动它。

异步不仅仅是管理子进程，尽管。想想处理 I/O，比如读取文件或与外部服务通信。与其执行数据库查询并等待结果再执行下一个，你可以并行执行所有查询。假设你有十个查询，每个需要一秒钟执行；你可以在一秒钟内运行所有查询，而不是十秒。

简而言之，如果使用得当，异步编程可以显著提高性能。

不过，大多数 MVC 框架没有针对异步思维进行优化：它们假设每次新请求到达时都必须从头启动。反过来，它们试图通过缓存和将配置编译为优化的生产就绪版本来优化该过程的部分。你可能本能地认为，如果你能够跳过框架的"启动阶段"，你会看到巨大的性能改进；但事实并非如此。

你看，拥有"共享应用程序状态"并在 PHP 内并行处理请求不会有显著差异：你的 Web 服务器已经在运行多个进程来并行处理请求。除此之外，你可以使用预加载来让应用程序在内存中启动并准备就绪。最大的性能提升来自异步处理 I/O，大多数框架没有针对此进行优化。它们不是用异步思维构建的。这很好，因为异步 PHP 增加了一层对许多项目来说过度的复杂性。

考虑到这一点，你不应该期望通过简单地将 MVC 框架和异步框架（如 Amp 或 ReactPHP）结合起来就能获得突破性的性能提升——还有更多。异步有比平均 MVC 应用程序更有趣的用例。

想想需要做大量实时重型计算的复杂 API。当我询问社区中有异步 PHP 现实用例的人时，有人告诉我他们使用 Swoole 运行他们的 API。Swoole 使他们能够在进程之间静态缓存数据以减少数据库 I/O，并并行执行复杂计算。总的来说，他们能够每秒服务 8000 个请求，而不是 600 个。

### 异步框架

我刚才提到了 Swoole，还谈到了 Amp（全称 Amphp）和 ReactPHP。这是今天使用的三个最流行的异步框架。Amp 和 ReactPHP 是用 PHP 本身实现的。你可以在项目中使用 composer 下载它们，你就可以开始了。另一方面，Swoole 是一个 PHP 扩展，你必须安装在系统上。虽然 ReactPHP 将自己描述为"事件驱动、非阻塞 I/O with PHP"的框架；Swoole 是"基于协程的异步 PHP 编程框架"。

除了完整的异步框架之外，还有流行的 Guzzle HTTP 库，它可以并行执行 HTTP 请求。这是一种更简单和隔离的异步编程方法，但也有几个用例。假设你正在从分页 API 加载数据；你可以一次加载几页，而不是一页一页地加载。

每个框架都有其目标受众和需求；所有都是今天在生产中使用的流行选择。

我遇到的另一个现实例子是一个定期使用 AWS Lambda 发送 100,000 个推送通知的平台。与其生成 100,000 个 Lambda，他们将数据分块成 500 个组，并并行将每个组发送到总共 200 个 Lambda。他们使用 Guzzle 并行执行 200 个 HTTP 请求，并等待它们全部完成。反过来，每个 Lambda 也会并行发送 500 个推送通知，并在不到一分钟内完成。总的来说，由于异步编程，发送 100,000 个推送通知需要 2 分钟。

人们有时将 PHP 与 NodeJS 进行比较，并提到它缺乏异步能力，但事实恰恰相反。PHP 中有很多异步编程选项。它们今天在各种用例中用于生产。PHP 与 JavaScript 的不同之处在于它没有内置的异步编程支持，如 async、await 或 promises。有人有兴趣在 PHP 的核心中添加 libuv，这是为 Node 的异步能力提供支持的相同库。还没有尝试集成它，但 PHP 很可能有一天会有一个内置的异步引擎。

在那之前，已经有一些很好的、经过实战测试的解决方案可以在今天使用。

## 第23章：事件驱动开发（Event Driven Development）

事件溯源、CQRS、事件驱动；这些神秘的术语如果你从未在事件驱动系统中工作过，可能会令人生畏。即使你有，也有很多意见、理论和模式。总的来说，它可能看起来是一个非常复杂的问题。

事件驱动系统不是所有问题的解决方案。虽然它们增加了一层灵活性，但它们也消除了简单性和明确性。

在其核心，事件驱动开发并不那么困难。是建立在简单概念之上的模式使其更加困难，但也更强大。这种力量在复杂和大型应用程序中经常需要，确实：PHP 经常用于构建这样的应用程序。我想专门用一章来讨论这个话题，因为你可能必须在你的事业中处理某种形式的事件驱动系统。有一些背景信息很重要。

所以让我们从基础开始。

事件驱动系统的想法是，你远离微观管理程序流程，而是允许单个组件在发生某些事情时做出反应。一个例子：与其有一个管理"发票创建"的单个函数或服务，可以有多个小服务，每个处理发票创建过程的一部分。起点是发票被创建；接下来有一个生成 PDF 并将其保存在文件系统上的服务；还有一个向客户发送电子邮件通知他们有关待处理发票的服务。

### 服务？对象？函数？

我在一个段落中使用了三个术语来描述"在发生某些事情时做出反应的代码片段"。你甚至可能想称它们为"微服务"。现在，我们不会专注于这些服务如何相互通信的技术细节，并假设它们实际上是同一代码库中的简单对象，在同一服务器上运行；从这里开始，我将它们称为普通的"服务"。

顺便说一下，你注意到 Alan Kay 对"对象"是什么的愿景如何完美地适合这个模型吗？我喜欢当事情结合在一起时！

这些服务不一定需要相互了解：每当系统中发生某些事情时，它们就会做出反应。这个"某事"被称为"事件"。

从技术角度来看，事件驱动系统需要的只是一个事件总线：它是知道所有监听事件的服务的中心位置；我们也可以称它们为"事件订阅者"。每当事件发生时，事件总线会被通知，这反过来会通知所有相关的订阅者。自己编写一个简单的事件总线并不困难。例如，这里是一个只有几行代码的实现：

```
interface Subscriber

{

    public function handles(object $event): bool;

    public function handle(object $event): void;

}

class EventBus

{

    private array $subscribers = [];

    public function addSubscriber(Subscriber $subscriber): self

    {

        $this=>subscribers[] = $subscriber;

    }

    public function dispatch(object $event): void

    {

        foreach ($this=>subscribers as $subscriber) {

            if (! $subscriber=>handles($event)) {

               continue;

            }   

            $subscriber=>handle($event);

        }

    }

}
```

你可以想出很多细节和补充，但在其核心，这就是你需要的全部：一个可以在事件被分派时通知的订阅者列表。

### 异步

没有什么阻止你使这样的事件总线异步。事实上，事件驱动系统在进行异步编程时经常被首选：它是一个非常适合并行和异步思维的模型。

对于我们的例子，我们假设事件总线总是同步处理事件：这样更容易推理事件流程，并消除我们否则必须处理的许多技术细节。

在我们的发票例子中，我们有两个订阅 `InvoiceCreatedEvent` 事件的服务：

```
class InvoicePdfService implements Subscriber

{

    public function handles(object $event): bool

    {

        return $event instanceof InvoiceCreatedEvent;

    }

    public function handle(object $event): void

    {

        // Generate invoice PDF and save it on the filesystem

    }

}

class InvoiceMailService implements Subscriber 

{ 

    public function handles(object $event): bool

    {

        return $event instanceof InvoiceCreatedEvent;

    }

    public function handle(object $event): void

    {

        // Send mail with a link to the customer's invoice page

    }

}
```

不过，我们的实现可以进行一些改进。通过为事件总线添加一些反射功能，我们可以根据方法签名确定订阅者是否应该处理事件。这不仅使我们的代码更加简洁，还允许我们在订阅者中确切知道我们正在处理什么类型的事件。让我们想象我们已经重构了事件总线，现在可以这样编写订阅者：

```
class InvoicePdfService

{

   public function handle(InvoiceCreatedEvent $event): void

   {

        // Generate invoice PDF and save it on the filesystem

   }

}
```

让我们继续深入探索我们的事件驱动系统。它有一个大的注意事项——事实上，它是所有事件驱动系统的主要特征：间接性。

想象发票创建，`InvoiceCreatedEvent` 在发票创建后被触发：

```
public function createInvoice()

{

    $invoice = /* … */;

    $event = new InvoiceCreatedEvent($invoice);

    $this=>eventBus=>dispatch($event);

}
```

虽然事件驱动开发承诺灵活性——你可以连接任意数量的订阅者——但它也导致了一种间接耦合。我们不知道当我们触发这个事件时会发生什么；我们需要相信正确的订阅者会在我们看不到的情况下处理它。这种间接层可能使调试程序流程变得更加困难，即使事件是同步处理的。

除此之外：分派事件后，你不能有任何直接返回值，因为无限数量的订阅者可以处理该事件。不过，你可以引入一些轮询层来观察结果，例如，在数据库中。尽管如此，你必须处理许多复杂性：以简单性为代价的灵活性。

你注意到我们还没有编写任何"事件溯源"或"CQRS"代码，但我们已经在使用事件驱动程序了吗？你不需要事件溯源、命令总线、CQRS 或最简单形式的微服务。你只需要事件。

不过，如果有足够的时间，任何在这样的事件驱动系统中工作的开发者都会遇到这种简化方法的问题。

可能有广泛的性能问题：降级的开发者体验、扩展问题或管理一致性和状态的问题。你会自然地尝试通过应用模式和原则来解决这些问题，这正是事件驱动社区多年来一直在做的事情。他们提出了模式来帮助解决更困难的问题，你在现实、复杂系统中会遇到的问题。

Martin Fowler 编写并谈论了几种这样的模式，以及社区如何发现它们。在本章的下半部分，我将简要讨论其中四种模式，所有这些都经常被使用。相关链接列在本章末尾。

### 事件通知

事件驱动系统的最简单形式称为"事件通知"：事件仅用于通知发生了某些事情。我们使用 `InvoiceCreatedEvent` 的例子已经比这更复杂，因为我们使用请求数据并将其与事件一起发送。

使用事件通知，事件只表示发生了某些事情。服务本身负责访问数据库、第三方服务或外部状态，并确定它们想要使用的数据。这也是事件驱动开发的最弱形式：一切都仍然耦合在一起。唯一的区别是你使用事件的灵活性将一个事件连接到多个服务。

### 事件携带状态传输

第二个模式是我们在例子中应用的：我们在事件发生时捕获了相关数据，并将其与事件一起发送。处理该事件的所有服务只允许使用由该事件封装的数据。

这种方法确保我们可以有多个服务监听同一事件，而不必担心它们被处理的顺序。我们总是确定我们的服务不会依赖外部状态，所以事件成为"真理的来源"。

### 事件溯源

建立在事件携带所有必要状态的想法之上的是事件溯源。与其保存，例如，发票到数据库，如果我们保存事件本身会发生什么？那会有益吗？

如果事件成为真理的来源并保存到数据库，我们总是有一层额外的信息可用。与其知道最终结果的样子（发票），我们现在也知道构成该结果的步骤（事件）。

看看这个事件列表，也称为"事件流"：

```
[

    InvoiceDraftCreated=:class,

    InvoiceSent=:class,

    InvoicePaid=:class,

]
```

如果我们只使用事件来触发服务做某事，我们会在事件被处理后丢失事件的数据。传统应用程序经常处理这类问题，这就是为什么它们在数据库中跟踪状态变化：像 `created_at` 或 `payment_date` 这样的列被添加到发票上，必须从那里仔细管理。

不过，如果我们直接保存事件，我们可以从存储（数据库、文件系统或其他东西）中检索它们，并从头动态重建我们的应用程序状态。例如，我们可以重建这些事件的结果发票——至少只要那些存储的事件携带所有相关数据。

这就是事件溯源的力量：能够仅使用事件重建整个应用程序状态。它为有趣的用例打开了大门。例如，我们可以开始基于这些事件中可用的历史数据生成报告。我们可以生成一个报告，分析客户在发票发送给他们后支付发票所需的平均时间，而无需重写我们的数据模型。没错：我们需要的所有数据已经存储为事件，我们只需要以新的方式解释它们。

不过，事件溯源带来了许多其他问题。最紧迫的一个：性能。生产应用程序会随着时间的推移存储数百万个事件；当然，我们不能在每次请求到来时从头重建整个应用程序状态。这就是为什么有其他模式帮助我们解决这类问题：投影和快照经常用于构建缓存和可重用的状态，而不是总是从头重建它。一个实际的例子可能是发票投影：一个存储所有这些发票事件的最终结果的表，我们可以轻松地从中读取数据。

经常与事件溯源一起出现的另一个抽象是进行更改的意图和更改本身之间的区别。当我们直接触发 `InvoiceCreatedEvent` 时，感觉有点不对：发票本身还没有被创建。相反，将意图称为 `CreateInvoice` 并将实际结果存储在数据库中的 `InvoiceCreated` 会更有意义。第一个通常被称为"命令"，而第二个被称为"事件"。

当我们试图正确应用事件溯源时，会出现很多复杂性。那是因为与我们最基本的实现也增加复杂性的相同原因：这是我们为更灵活和可扩展的系统付出的代价。记住这一点：事件驱动架构并不总是问题的正确解决方案。很可能一个更简单的方法不仅更快，而且更好。

一位明智的开发者 Frank De Jonge 曾经说过："事件溯源使简单的问题变难，使困难的问题变简单"。在将事件溯源添加到项目之前，确保你已经权衡了利弊。

### CQRS

CQRS——命令查询责任分离——是我想涉及的第四个也是最后一个模式。Martin Fowler 这样描述它："其核心概念是，你可以使用不同的模型来更新信息，而不是用于读取信息的模型。对于某些情况，这种分离可能很有价值[…]理由是对于许多问题，特别是在更复杂的领域，为命令和查询使用相同的概念模型会导致一个更复杂的模型，两者都做不好。"

换句话说：CQRS 旨在分离写入数据和读取数据的关注点。它再次允许更多的灵活性。请记住，这是一个用于非常复杂系统的模式。Martin Fowler 甚至警告不要过快使用 CQRS："尽管有这些好处，你应该非常谨慎地使用 CQRS。许多信息系统非常适合信息库的概念，它以与读取相同的方式更新，将 CQRS 添加到这样的系统可能会增加显著的复杂性。"

关于事件驱动系统还有更多要说的，但这超出了本书的范围。有几个 PHP 框架促进了事件驱动系统，但最重要的是事件驱动思维，而不是一堆技术工具。我希望你对这种思维由什么有了一点了解，如果你对它感兴趣，我建议查看一些关于这个话题的更多资源。

### 一些更多资源

Martin Fowler 对事件驱动架构的介绍：https://www.youtube.com/watch?v=STKCRSUsyP0

Greg Young 分享关于 DDD、CQRS 和事件溯源的见解：https://www.youtube.com/watch?v=LDW0QWie21s

### 结语

我承认完成这本书对我来说是一个有点情感的时刻。我已经在这个项目上工作了四年多；首先在我的博客上单独工作，然后与我在 Spatie 的出色同事一起工作。

我觉得我说了我想说的话。尽管关于 PHP 开发还有很多要教的内容，但这本书已经奠定了坚实的基础。感觉所有那些在我脑海中漂浮的独立话题终于在一个地方连接起来了。

我希望你的学习过程不会随着这本书而停止。即使合适的学习材料很难获得，我鼓励你继续挑战自己，作为专业开发者成长。这就是我多年来一直在做的事情：不断学习和不断成长。

所以最后，感谢阅读，我真的希望我能够在你永无止境的学习和成长过程中帮助你。

谢谢，  
Brent

PS：如果你想要一个所有新的和花哨的 PHP 语法的快速摘要，你可以访问 https://front-line-php.com/cheat-sheet 并浏览我们方便的小抄。


