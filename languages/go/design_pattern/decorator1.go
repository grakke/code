package main

import "fmt"

// 定义Component接口，所有组件和装饰者的基类
type Component interface {
	operation() // 组件执行的操作
}

// 定义具体组件 ConcreteComponent，实现了Component接口
type ConcreteComponent struct{}

func (c *ConcreteComponent) operation() {
	fmt.Println("ConcreteComponent: performing basic operation")
}

// 定义Decorator抽象结构体，包含一个Component接口类型的字段
type Decorator struct {
	component Component // 用于组合Component接口
}

// 实现Decorator的operation方法，调用其Component的operation方法
func (d *Decorator) operation() {
	if d.component != nil {
		d.component.operation() // 调用被装饰者的operation
	}
}

// 定义具体装饰者ConcreteDecoratorA，嵌入了Decorator结构体
type ConcreteDecoratorA struct {
	Decorator // 继承Decorator，实现装饰功能
}

// 为ConcreteDecoratorA实现operation方法，添加额外的职责
func (cda *ConcreteDecoratorA) operation() {
	cda.Decorator.operation() // 首先调用被装饰者的operation
	fmt.Println("ConcreteDecoratorA: added additional responsibilities")
}

func main() {
	// 创建具体组件
	component := &ConcreteComponent{}

	// 创建装饰者并关联具体组件
	decoratorA := &ConcreteDecoratorA{Decorator{component}}

	// 执行装饰后的组件操作
	decoratorA.operation()
}
