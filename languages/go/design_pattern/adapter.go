package main

import "fmt"

// Target接口 客户端使用的特定领域相关的接口
type Target interface {
	request() // 客户端期望调用的方法
}

// 一个已经存在的类Adaptee，有自己的接口
type Adaptee struct{}

func (a *Adaptee) specificRequest() {
	fmt.Println("Adaptee performs a specific request")
}

// 定义Adapter结构体，作为Target接口和Adaptee类之间的桥梁
type Adapter struct {
	adaptee *Adaptee
}

// Adapter 实现了Target接口的request方法
// 该方法内部委托给Adaptee的specificRequest方法
func (a *Adapter) request() {
	if a.adaptee != nil {
		a.adaptee.specificRequest()
	}
}

func main() {
	adaptee := &Adaptee{}
	adapter := &Adapter{adaptee: adaptee}

	var target Target = adapter
	target.request()
}
