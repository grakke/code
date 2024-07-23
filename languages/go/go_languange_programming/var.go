package main

import (
	"fmt"
	"math"
)

const N = 5

var v1 bool = true

var v12 int = 10
var fvalue1 float32 = 12

var value1 complex64 = 3.2 + 12i

var str string = "Hello world" // 字符串赋值

var array = [6]int{1, 2, 3, 4, 5, 6} // 数组
var arr2 [32]byte                    // 长度为32的数组，每个元素为一个字节
var arr3 [2 * N]struct{ x, y int32 } // 复杂类型数组
var arr4 [1000]*float64              // 指针数组
var arr5 [3][5]int                   // 二维数组
var arr6 [2][2][2]float64            // 等同于[2]([2]([2]float64))

var v4 []int // 数组切片
var v5 struct {
	f int
}

var v6 *int           // 指针
var v7 map[string]int // map，key为string类型，value为int类型
var v8 func(a int)

func test() int {
	bvalue := (1 == 2)
	age := 30
	fvalue2 := 12.0
	value2 := 3.2 + 12i

	fmt.Println(bvalue, age, fvalue2, value2)
	return 0
}

var (
	v11        = 10
	v13 string = "abcd"
)

const (
	a = 1 << iota
	b
	c
)

// p为用户自定义的比较精度，比如0.00001
func IsEqual(f1, f2, p float64) bool {
	return math.Dim(f1, f2) < p
}

func main() {
	test()
	value3 := complex(3.2, 12)
	fmt.Println(v6, real(value3), imag(value3))
	fmt.Printf("The length of \"%s\" is %d \n", str, len(str))
	fmt.Printf("The first character of \"%s\" is %c.\n", str, str[0])

	str := "Hello,世界"
	n := len(str)
	for i := 0; i < n; i++ {
		ch := str[i] // 依据下标取字符串中的字符，类型为byte
		fmt.Println(i, ch)
	}
	for i, ch := range str {
		fmt.Println(i, ch) //ch的类型为rune
	}

	for i, v := range array {
		fmt.Println("Array element[", i, "]=", v)
	}
}
