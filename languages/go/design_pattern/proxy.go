package main

import "fmt"

// 定义一个Subject接口，声明了真实主题和代理主题共有的接口。
type Subject interface {
	request()
}

// RealSubject 结构体实现了 Subject 接口，代表真实主题。
type RealSubject struct{}

func (r *RealSubject) request() {
	fmt.Println("Real Subject")
}

// Proxy 结构体包含一个指向 RealSubject 的指针，作为代理主题。
type Proxy struct {
	realSubject *RealSubject // 代理主题包含一个对真实主题的引用，初始为 nil
}

func (p *Proxy) request() {
	if p.realSubject == nil {
		p.realSubject = &RealSubject{}
	}
	p.realSubject.request()
}
