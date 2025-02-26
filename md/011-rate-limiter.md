

我们通常叫做[限流器] 作用在于限制 vendor 访问服务器 API 的速率

Rate limiter provides an easy way to limit any action during a specified window of time.

And that's a issue we should to resolve in many scenarios, so in generally, we will put certain rate limiter to Middleware,
as well known as [Throttle].

------------

How Rate limiter works?

```php

class RedisRateLimiter {
    protected function attempt() {
        $rate_limit_key = rand();
        
        $current = $this->redis->get($rate_limit_key);
        
        if (!$current) {
             $this->redis->set($key, timeout);
             
             return true;
        }
        
        if ($current > max) {
            return false;
        }
        
        $current = $this->redis->incr($key);
        
        return true;
    }
}



```
