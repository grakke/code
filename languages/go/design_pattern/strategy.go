package main

import "fmt"

type Strategy interface {
	algorithm()
}

type ConcreteStrategyA struct{}

func (c *ConcreteStrategyA) algorithm() {
	fmt.Println("Executing Algorithm A")
}

type ConcreteStrategyB struct{}

func (c *ConcreteStrategyB) algorithm() {
	fmt.Println("Executing Algorithm B")
}

type Context struct {
	strategy Strategy
}

func (c *Context) executeStrategy() {
	c.strategy.algorithm()
}

func main() {
	context := &Context{}

	strategyA := &ConcreteStrategyA{}
	context.strategy = strategyA
	context.executeStrategy()

	strategyB := &ConcreteStrategyB{}
	context.strategy = strategyB
	context.executeStrategy()
}
