package main

import (
	"fmt"
	"sync"
)

// 定义一个结构体Singleton，用于存储单例的实例数据
type singleton struct {
	value string // 存储单例对象的任何数据
}

// 定义一个Once对象，用于确保初始化操作只执行一次
var once sync.Once

// 定义一个全局变量instance，用于存储单例的实例
var instance *singleton

// 初始化函数，由Once.Do调用
func initSingleton() {
	instance = &singleton{value: "unique instance"} // 这里初始化singleton实例
}

// getInstance函数用于获取单例的实例
func getInstance() *singleton {
	// 执行initSingleton，确保instance只被初始化一次
	once.Do(initSingleton)
	return instance
}

func main() {
	singletonInstance := getInstance()
	fmt.Println(singletonInstance.value)

	// 再次获取单例的实例，将返回相同的实例
	anotherInstance := getInstance()
	if singletonInstance == anotherInstance {
		fmt.Println("Both instances are the same") // 输出: Both instances are the same
	}

	// 测试并发环境下的单例模式
	var wg sync.WaitGroup
	for i := 0; i < 10; i++ {
		wg.Add(1)
		go func() {
			defer wg.Done()
			singletonInstance := getInstance()
			fmt.Println(singletonInstance.value)
		}()
	}
	wg.Wait()
}
