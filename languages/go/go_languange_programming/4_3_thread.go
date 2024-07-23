package main

import (
	"fmt"
	"sync"
	"time"
)

var counter int = 0

// lock 同一把锁，保证串行
func Count(lock *sync.Mutex) {
	lock.Lock()
	counter++
	fmt.Println(counter)
	lock.Unlock()
}

func main() {
	t1 := time.Now()
	lock := &sync.Mutex{}
	for i := 0; i < 10; i++ {
		go Count(lock)
	}

	// counter 控制延时结束，全部执行完再退出
	for true {
		//	//lock.Lock()
		//	//c := counter
		//	//lock.Unlock()
		//	//runtime.Gosched()
		//
		if counter >= 10 {
			break
		}
	}
	t2 := time.Now()

	// 测试1 结果随机性
	fmt.Println("Time cost:", t2.Sub(t1))
}
