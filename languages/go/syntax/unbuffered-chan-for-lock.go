package main

import (
	"fmt"
	"sync"
)

type counter struct {
    sync.Mutex
    i int
}

var cter counter

func Increase() int {
    cter.Lock()
    defer cter.Unlock()
    cter.i++
    return cter.i
}

func main() {
	// 基于“共享内存”+“互斥锁”的Goroutine安全的计数器
    var wg sync.WaitGroup
    for i := 0; i < 10; i++ {
        wg.Add(1)
        go func(i int) {
            v := Increase()
            fmt.Printf("goroutine-%d: current counter value is %d\n", i, v)
            wg.Done()
        }(i)
    }
    wg.Wait()

    var wg1 sync.WaitGroup
    cter := NewCounter()
    for i := 0; i < 10; i++ {
        wg1.Add(1)
        go func(i int) {
            v := cter.Increase()
            fmt.Printf("goroutine-0%d: current counter value is %d\n", i, v)
            wg1.Done()
        }(i)
    }
    wg1.Wait()
}

type counter1 struct {
    c chan int
    i int
}

func NewCounter() *counter1 {
    cter := &counter1{
        c: make(chan int),
    }
    go func() {
        for {
            cter.i++
            cter.c <- cter.i
        }
    }()
    return cter
}

func (cter *counter1) Increase() int {
    return <-cter.c
}
