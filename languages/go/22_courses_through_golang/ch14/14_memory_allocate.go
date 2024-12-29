package main

import "fmt"

func main() {
	// 值类型没有初始化会自动分配内存地址
	var s string
	fmt.Printf("%p\n", &s)

	// 指针类型没有初始化,不能对其进行赋值操作
	var sp *string
	// *sp = "飞雪无情"
	// fmt.Println(*sp)
	// 手动分配内存地址
	sp = new(string)
	*sp = "飞雪无情"
	fmt.Println(*sp)

	p := person{name: "张三", age: 18}
	fmt.Println(p.age, p.name)

	pp := NewPerson("飞雪无情", 20)
	fmt.Println("Name:", pp.name,", Age:", pp.age)
}

type person struct {
	name string
	age  int
}

func NewPerson(name string, age int) *person {
	p := new(person)
	p.name = name
	p.age = age

	return p
}
