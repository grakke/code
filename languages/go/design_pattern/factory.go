package main

import "fmt"

// 定义一个接口Product，声明了所有具体产品对象必须实现的操作
type Product interface {
	operation() // 产品对象的操作
}

// 定义具体产品ConcreteProductA，实现了Product接口
type ConcreteProductA struct{}

func (p *ConcreteProductA) operation() {
	fmt.Println("Operation of ConcreteProductA")
}

// 定义另一个具体产品ConcreteProductB，也实现了Product接口
type ConcreteProductB struct{}

func (p *ConcreteProductB) operation() {
	fmt.Println("Operation of ConcreteProductB")
}

// 定义一个抽象工厂Creator，声明了工厂方法factoryMethod，用于创建产品对象
type Creator interface {
	factoryMethod() Product // 工厂方法，用于创建产品对象
}

// 定义具体工厂CreatorA，实现了Creator接口
type CreatorA struct{}

func (c *CreatorA) factoryMethod() Product {
	return &ConcreteProductA{} // 具体工厂CreatorA返回ConcreteProductA的实例
}

// 定义另一个具体工厂CreatorB，也实现了Creator接口
type CreatorB struct{}

func (c *CreatorB) factoryMethod() Product {
	return &ConcreteProductB{} // 具体工厂CreatorB返回ConcreteProductB的实例
}

func main() {
	// 创建具体工厂CreatorA的实例
	creatorA := &CreatorA{}
	productA := creatorA.factoryMethod()
	productA.operation() // 调用产品A的操作

	// 创建具体工厂CreatorB的实例
	creatorB := &CreatorB{}
	productB := creatorB.factoryMethod()
	productB.operation() // 调用产品B的操作
}
