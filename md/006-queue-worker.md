## 梳理文档

1. 队列是什么？ 
   队列是用来处理异步任务的，先把要做的东西放到一个容器里，然后从容器里面取出执行
2. 创建「队列任务」
3. 「队列任务」模版
4. 分发任务
5. 执行任务（任务是怎么执行的？）
5. 自定义配置
```
1. onConnection
2. onQueue()
3. tries
4. timeout
5. retry_after （多久后重试）

！--timeout 值应始终比 retry_after 配置值至少短几秒钟。 这将确保处理冻结任务的进程始终在重试任务之前终止。 如果你的 --timeout 选项比你的 retry_after 配置值长，你的任务可能会被处理两次
```


## configs

1. 连接 -> 就是指定使用「哪个容器」比如 redis, sqs；这些容器也叫驱动
2. 队列 -> 是指任务的列表，容器可能存在多个队列
3. 任务 -> 每个队列里面可能有多个任务（`任务可以是任何可序列化的 PHP 对象，并且通常是处理特定逻辑的类，比如发送电子邮件、处理文件等。`）


## Usage

1. 手动注册
```
protected $listen = [
\App\Events\AdvisorCreated::class => [
\App\Listeners\AdvisorCreated\SendToSalesforce::class,
\App\Listeners\AdvisorCreated\CreateSampleHouseholds::class,
],
```
2. Callback
```
Event::listen(['eloquent.saving: *', 'eloquent.updating: *', 'eloquent.creating: *', 'eloquent.deleting: *', 'eloquent.restoring: *', 'eloquent.forceDeleting: *'], function (string $event_name, array $data): bool|null {
/** @var \Illuminate\Database\Eloquent\Model $object */
$object = $data[0];

if ($object instanceof Model) {
$event_name = strstr_or_fail(substr($event_name, 9), ':', true); // remove 'eloquent.' prefix and ': xxxxx' postfix

// Call event functions
$fqcn = Model::NAMESPACE . '\Events\\' . class_basename($object) . 'Event';

if (class_exists($fqcn)) {
if (method_exists($fqcn, $event_name) || $object instanceof Tweak) { // Call TweakEvent::__callStatic($event_name) if event method is not exist
return $fqcn::$event_name($object);
}
}
}

return null;
});
```
3. Event Subscriber
4. Auto discover
```
/**
* 确定是否应用自动发现事件和监听器。

* DEFAUT FALSE
*/
public function shouldDiscoverEvents(): bool
{
return true;
}
```
