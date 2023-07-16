package main

import (
	"fmt"
	"time"
)

func count(ch chan int) {
	ch <- 1
	// 没有完全执行: 来不及执行
	fmt.Println("Counting")
}

func main() {
	// 声明：包含 10 个channel的数组
	chs := make([]chan int, 10)
	for i := 0; i < 10; i++ {
		chs[i] = make(chan int)
		go count(chs[i])
	}

	// 每个channel被读取前，通道写入操作是阻塞的。
	// 所有 goroutine 启动完成后，通过 <-ch 语句从10个channel中依次读取数据
	// 在对应 channel写入数据前，这个操作也是阻塞的。这样 用channel实现了类似锁的功能，进而保证所有 goroutine 完成后主函数才返回
	for _, ch := range chs {
		fmt.Println(<-ch)
		//<-ch
		//fmt.Println(i, <-ch)
	}

	// 超时机制
	// 首先，实现并执行一个匿名的超时等待函数
	timeout := make(chan bool, 1)
	ch := make(chan int)
	go func() {
		time.Sleep(1e9) // 等待1秒钟
		timeout <- true
	}()
	// 然后我们把timeout这个channel利用起来
	select {
	case <-ch:
		// 从ch中读取到数据
	case <-timeout:
		// 一直没有从ch中读取到数据，但从timeout中读取到了数据
		fmt.Println("Timeout!!!")
	}
}
