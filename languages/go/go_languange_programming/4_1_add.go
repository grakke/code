package main

import (
	"fmt"
	"time"
)

func Add(x, y int) {
	z := x + y
	fmt.Println(z)
}

func main() {
	for i := 0; i < 10; i++ {
		go Add(i, i)
	}
	// 不管协程执行，直接结束
	time.Sleep(1e9)
}
