package main

import "fmt"

// src/fmt/print.go
//
//	type Stringer interface {
//	    String() string
//	}
type person struct {
	name string
	age  uint
	addr address
}

func NewPerson(name string) *person {
	return &person{name: name}
}

// 实现 Stringer 接口 方法和接口里方法的签名（名称、参数和返回值）一样
func (p *person) String() string {
	return fmt.Sprintf("The name is %s, age is %d.", p.name, p.age)
}

type address struct {
	province string
	city     string
}

// 实现 Stringer 接口
func (addr address) String() string {
	return fmt.Sprintf("The addr is %s%s.", addr.province, addr.city)
}

// 应用 接口做类型限制 面向接口程
func printString(s fmt.Stringer) {
	fmt.Println(s.String())
}

type WalkRun interface {
	Walk()
	Run()
}

func (p *person) Walk() {
	fmt.Printf("%s能走\n", p.name)
}

func (p *person) Run() {
	fmt.Printf("%s能跑\n", p.name)
}

func main() {
	var p person
	p.name = "独孤堂主"

	p1 := person{"飞雪无情", 30, address{"浙江省", "杭州市"}}
	p2 := person{age: 36, name: "西门吹雪",
		addr: address{
			province: "湖南省",
			city:     "长沙市",
		}}
	p3 := NewPerson("Henry")
	fmt.Println(p.name, p.age, p.addr.province)
	fmt.Println(p1.name, p1.age, p1.addr.province)
	fmt.Println(p2.name, p2.age, p2.addr.province)
	fmt.Println(p3.name)
	printString(&p2)
	printString(p2.addr)

	var s fmt.Stringer = &p1
	p4, ok := s.(*person)
	if ok {
		fmt.Println(p4)
	} else {
		fmt.Println("s不是一个 person 指针")
	}

	p.Run()
	p.Walk()
}
