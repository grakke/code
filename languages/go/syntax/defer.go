package main

import (
	"fmt"
	"sync"
)

func printError() {
	fmt.Println("兜底执行")
}

func get(index int) (ret int) {
	defer func() {
		if r := recover(); r != nil {
			fmt.Println("Some error happened!", r)
			ret = -1
		}
	}()
	arr := [3]int{2, 3, 4}
	return arr[index]
}

func doSomething() error {
	var mu sync.Mutex
	mu.Lock()
	defer mu.Unlock()

	r1, err := OpenResource1()
	if err != nil {
		return err
	}
	defer r1.Close()

	r2, err := OpenResource2()
	if err != nil {
		return err
	}
	defer r2.Close()

	r3, err := OpenResource3()
	if err != nil {
		return err
	}
	defer r3.Close()

	// 使用r1，r2, r3
	return doWithResources()
}

func foo1() {
	for i := 0; i <= 3; i++ {
		defer fmt.Println(i)
	}
}

func foo2() {
	for i := 0; i <= 3; i++ {
		defer func(n int) {
			fmt.Println(n)
		}(i)
	}
}

func foo3() {
	for i := 0; i <= 3; i++ {
		defer func() {
			fmt.Println(i)
		}()
	}
}

func main() {
	// 会在函数执行完成后或读取文件过程中抛出错误时执行
	// 一个函数/方法中可以存在多个 defer 语句，defer 调用顺序遵循先进后出的原则
	// 要尽量在函数/方法的前面定义它们，以免在后面执行时漏掉
	defer printError()
	defer func() {
		fmt.Println("代码清理逻辑!")
	}()
	// recover() 函数对 panic 进行捕获和处理，从而避免程序崩溃然后直接退出
	defer func() {
		if err := recover(); err != nil {
			fmt.Printf("Runtime panic caught: %v\n", err)
		}
	}()

	var i = 1
	var j = 0
	if j == 0 {
		// 遇到 panic 时，Go 语言会中断当前协程中（main 函数）后续代码的执行
		// 执行中断代码之前定义的 defer 语句（按照先入后出的顺序）
		// 程序退出并输出 panic 错误信息，以及出现错误的堆栈跟踪信息
		// 显式抛出 panic
		// 支持的参数类型是 interface{}
		panic("除数不能是0")
	}
	var k = i / j

	fmt.Printf("%d / %d = %d\n", i, j, k)
	fmt.Println("方法调用完毕，回到main函数")

	fmt.Println(get(5))
	fmt.Println("finished")

	fmt.Println("foo1 result:")
	foo1()
	fmt.Println("\nfoo2 result:")
	foo2()
	fmt.Println("\nfoo3 result:")
	foo3()
}
