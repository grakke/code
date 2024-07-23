package main

import (
	"fmt"
	"unsafe"
)

func main() {
	// 声明时指定元素类型和数组长度.长度定义后不可更改
	var a [8]byte
	var b = [3][3]int{{1, 2, 3}, {4, 5, 6}, {7, 8, 9}} // 二维数组
	fmt.Println("数组长度：", len(b))
	fmt.Println("数组大小：", unsafe.Sizeof(b))

	// 声明时初始化
	d := [3]int32{1, 2, 3}
	var e = new([3]string) // 通过 new 初始化
	f := [5]int32{1, 2, 3}
	g := [...]int32{1, 2, 3}
	h := [5]int32{1: 3, 3: 7}
	var arr4 = [...]int{
		99: 39, // 将第100个元素(下标值为99)的值赋值为39，其余元素值均为0
	}
	fmt.Println(a, b, d, e, f, g, h)

	// 获取
	v1, v2 := d[0], d[len(d)-1]
	fmt.Println(v1, v2)

	// 遍历
	d[1] = 88
	// for i := 0; i < len(d); i++ {
	for i, v := range d {
		fmt.Println("Element", i, "of arr is", v)
	}

	for i := 1; i < 9; i++ {
		for j := 1; j <= i; j++ {
			fmt.Printf("%d x %d = %d ", j, i, i*j)
		}
		fmt.Println()
	}

	var threeD [3][5][2]int32
	for i := 0; i < 3; i++ {
		for j := 0; j < 5; j++ {
			for k := 0; k < 2; k++ {
				threeD[i][j][k] = int32((i + 1) * (j + 1) * (k + 1))
			}
		}
	}
	fmt.Println("All at once:", threeD)

	numbers := [...]int{99: -1}
	fmt.Println("First Position:", numbers[0], " Last Position:", numbers[99], " Length:", len(numbers))

	// 用空数组来作为管道类型可以减少管道元素赋值时的开销。当然一般更倾向于用无类型的匿名结构体代替
	c1 := make(chan [0]int)
	go func() {
		fmt.Println("c1")
		c1 <- [0]int{}
	}()
	<-c1

	c2 := make(chan struct{})

	go func() {
		fmt.Println("c2")
		c2 <- struct{}{} // struct{}部分是类型, {}表示对应的结构体值 }()
		<-c2
	}()
}
