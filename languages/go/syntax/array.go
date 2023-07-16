package main

import (
	"fmt"
)

func main() {
	// 声明时指定元素类型和数组长度.长度定义后不可更改
	var a [8]byte                                      // 长度为8的数组，每个元素为一个字节
	var b = [3][3]int{{1, 2, 3}, {4, 5, 6}, {7, 8, 9}} // 二维数组（9宫格）

	// 声明时初始化
	d := [3]int32{1, 2, 3}
	var e = new([3]string) // 通过 new 初始化
	f := [5]int32{1, 2, 3}
	g := [...]int32{1, 2, 3}
	h := [5]int32{1: 3, 3: 7}
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
}
