package main

import (
	"fmt"
	"math"
)

type Shape interface {
	Sides() int
	Area() int
}
type Square struct {
	len int
}

func (s *Square) Sides() int32 {
	return 4
}

func main() {
	var i interface{} = "hello"

	s, ok := i.(string)
	fmt.Println(s, ok)

	f, ok := i.(float64)
	fmt.Println(f, ok)

	interface_test()

	// 接口完整性检查:如果没有实现完相关的接口方法，编译器会报错
	// var _ Shape = (*Square)(nil)

	m := make(map[string]interface{})
	m["name"] = "Tom"
	m["age"] = 18
	m["scores"] = [3]int{98, 99, 85}
	fmt.Println(m) // map[age:18 name:Tom scores:[98 99 85]]

	var a int64 = 13
	var i1 interface{} = a
	v1, ok := i1.(int64)
	fmt.Printf("v1=%d, the type of v1 is %T, ok=%t\n", v1, v1, ok) // v1=13, the type of v1 is int64, ok=true
	v2, ok := i1.(string)
	fmt.Printf("v2=%s, the type of v2 is %T, ok=%t\n", v2, v2, ok) // v2=, the type of v2 is string, ok=false

	v3 := i1.(int64)
	fmt.Printf("v3=%d, the type of v3 is %T\n", v3, v3) // v3=13, the type of v3 is int64
	v4 := i1.([]int)                                    // panic: interface conversion: interface {} is int64, not []int
	fmt.Printf("the type of v4 is %T\n", v4)
}

// ---------- 接 口 --------//
type shape interface {
	area() float64      //计算面积
	perimeter() float64 //计算周长
}

// --------- 长方形 ----------//
type rect struct {
	width, height float64
}

func (r *rect) area() float64 { //面积
	return r.width * r.height
}
func (r *rect) perimeter() float64 { //周长
	return 2 * (r.width + r.height)
}

// ----------- 圆  形 ----------//
type circle struct {
	radius float64
}

func (c *circle) area() float64 { //面积
	return math.Pi * c.radius * c.radius
}
func (c *circle) perimeter() float64 { //周长
	return 2 * math.Pi * c.radius
}

// ----------- 接口的使用 -----------//
func interface_test() {
	r := rect{width: 2.9, height: 4.8}
	c := circle{radius: 4.3}
	s := []shape{&r, &c} //通过指针实现

	for _, sh := range s {
		fmt.Println(sh)
		fmt.Println(sh.area())
		fmt.Println(sh.perimeter())
	}
}
