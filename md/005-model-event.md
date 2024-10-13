## Scenario

可以监听「更新/创建/删除」 Model 时的动作，并执行后续动作[Model Event](https://learnku.com/docs/laravel/10.x/eloquent/14888#87f9f7)

## Usage

1. Model event 有哪些？
```
retrieved、creating、created、
updating、updated、saving、saved、
deleting、deleted、restoring、restored、replicating
```
2. 执行顺序
```
1. 以 -ing 结尾的事件名称在模型的任何更改被持久化之前被调度，而以 -ed 结尾的事件在对模型的更改被持久化之后被调度。
2. 当你对模型进行更新操作时，模型事件的触发顺序是固定的。以下是这些事件的触发顺序：

retrieved：在从数据库获取模型实例后立即触发。
saving：在任何模型保存操作进行前触发，包括创建和更新操作。
creating/created 或 updating/updated：
updating：在更新模型前触发。
updated：在更新模型后触发。
saved：在所有保存操作（创建和更新）后触发。
因此，它们的顺序为：

saving
updating
updated
saved
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
