package main

import (
	"context"
	"fmt"
	"sync"

	"github.com/redis/go-redis/v9"
	"go.uber.org/atomic"

	// "git.code.oa.com/pcg-csd/trpc-ext/redis"
)

type RedisClient interface {
	Do(ctx context.Context, cmd string, args ...interface{}) (interface{}, error)
}

// Client 数据库
type Client struct {
	client RedisClient // redis 操作
	script string      // lua脚本
}

// NewBucketClient 创建redis令牌桶
func NewBucketClient(redis RedisClient) *Client {
	helper := redis
	return &Client{
		client: helper,
		script: `
         -- 令牌桶限流脚本
         -- KEYS[1]: 桶的名称
         -- ARGV[1]: 桶的容量
         -- ARGV[2]: 令牌产生速率

         local bucket = KEYS[1]
         local capacity = tonumber(ARGV[1])
         local tokenRate = tonumber(ARGV[2])

         local redisTime = redis.call('TIME')
         local now = tonumber(redisTime[1])

         local tokens, lastRefill = unpack(redis.call('hmget', bucket, 'tokens', 'lastRefill'))
         tokens = tonumber(tokens)
         lastRefill = tonumber(lastRefill)

         if not tokens or not lastRefill then
            tokens = capacity
            lastRefill = now
         else
            local intervalsSinceLast = (now - lastRefill) * tokenRate
            tokens = math.min(capacity, tokens + intervalsSinceLast)
         end

         if tokens < 1 then
            return 0
         else
            redis.call('hmset', bucket, 'tokens', tokens - 1, 'lastRefill', now)
            return 1
         end
      `,
	}
}

// 获取令牌，获取成功立即返回true，否则返回false
func (c *Client) isAllowed(ctx context.Context, key string, capacity int64, tokenRate int64) (bool, error) {
	result, err := redis.Int(c.client.Do(ctx, "eval", c.script, 1, key, capacity, tokenRate))
	if err != nil {
		fmt.Println("Redis 执行错误:", err)
		return false, err
	}
	return result == 1, nil
}

// 调用检测
func main() {
	c := NewBucketClient(redis.GetPoolByName("redis://127.0.0.1:6379"))
	gw := sync.WaitGroup{}
	gw.Add(120)
	count := atomic.Int64{}
	for i := 0; i < 120; i++ {
		go func(i int) {
			defer gw.Done()
			status, err := c.isAllowed(context.Background(), "test", 100, 10)
			if status {
				count.Add(1)
			}
			fmt.Printf("go %d status:%v error: %v\n", i, status, err)
		}(i)
	}
	gw.Wait()
	fmt.Printf("allow %d\n\n", count.Load())
}
