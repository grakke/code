package main

import "fmt"

type address struct {
	province string
	city     string
}

func (addr address) String() string {
	return fmt.Sprintf("The addr is %s, %s", addr.province, addr.city)
}

func printString(s fmt.Stringer) {
	fmt.Println(s.String())
}

func main() {
	// 具体类型的指针实现接口
	add := address{province: "北京", city: "北京"}
	printString(add)
	printString(&add)

	// 指向接口的指针永远不可能实现该接口
	var si fmt.Stringer = address{province: "上海", city: "上海"}
	printString(si)
	// sip := &si
	// printString(sip)

	// 值传递 无法修改值
	p := person{name: "张三", age: 18}
	fmt.Printf("main函数：p的内存地址为%p\n", &p)
	modifyPerson1(p)
	fmt.Println("person name:", p.name, ",age:", p.age)

	// 指针类型
	p = person{name: "张三", age: 18}
	fmt.Printf("main函数：p的内存地址为%p\n", &p)
	modifyPerson2(&p)
	fmt.Println("person name:", p.name, ",age:", p.age)

	// 引用类型
	m := make(map[string]int)
	m["飞雪无情"] = 18
	fmt.Println("飞雪无情的年龄为", m["飞雪无情"])
	modifyMap(m)
	fmt.Println("飞雪无情的年龄为", m["飞雪无情"])
	fmt.Printf("main函数：m的内存地址为%p\n",m)
}

type person struct {
	name string
	age  int
}

func modifyPerson1(p person) {
	fmt.Printf("modifyPerson函数：p的内存地址为%p\n", &p)
	p.name = "李四"
	p.age = 20
}

func modifyPerson2(p *person) {
	fmt.Printf("modifyPerson函数：p的内存地址为%p\n", p)
	p.name = "李四"
	p.age = 20
}

func modifyMap(p map[string]int) {
	fmt.Printf("modifyMap函数：p的内存地址为%p\n",p)
	p["飞雪无情"] = 20
}
