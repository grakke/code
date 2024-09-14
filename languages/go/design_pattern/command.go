package main

import "fmt"

// 定义Command接口，声明了所有具体命令必须实现的Execute方法
type Command interface {
	Execute()
}

// 定义Receiver结构体，将执行命令的实际请求
type Receiver struct{}

func (r *Receiver) Action() {
	fmt.Println("Receiver: Action")
}

// 定义ConcreteCommand结构体，实现了Command接口
// 每个具体命令都包含一个Receiver的引用，表示请求的接收者
type ConcreteCommand struct {
	receiver *Receiver // 命令执行的接收者
}

// ConcreteCommand实现Command接口的Execute方法
// 该方法调用Receiver的Action方法来执行请求
func (c *ConcreteCommand) Execute() {
	c.receiver.Action() // 执行请求
}

// 定义Invoker结构体，负责调用命令对象的Execute方法
type Invoker struct {
	command Command // 存储命令对象
}

// 调用命令对象的Execute方法
func (i *Invoker) Invoke() {
	i.command.Execute()
}

func main() {
	receiver := &Receiver{}
	command := &ConcreteCommand{receiver: receiver}
	invoker := &Invoker{command: command}
	invoker.Invoke()
}
