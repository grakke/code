package main

import (
	"fmt"
	"math"
)

func main() {
	var integer8 int8 = 127
	var integer16 int16 = 32767
	var integer32 int32 = 2147483647
	var integer64 int64 = 9223372036854775807
	fmt.Println(integer8, integer16, integer32, integer64)

	var intValue1 int8 // -128-127
	intValue1 = 127
	intValue2 := 45555
	intValue1 = int8(intValue2)              // int_value_2 将会被自动推导为 int 类型
	intValue3 := intValue1 + int8(intValue2) // 同类型的整型值不能直接进行算术运算
	fmt.Println(intValue1, int8(intValue2), intValue3)

	rune := 'G'
	fmt.Println(rune)

	var float32 float32 = 2147483647
	var float641 float64 = 9223372036854775807
	fmt.Println(float32, float641)
	fmt.Println(math.MaxFloat32, math.MaxFloat64)

	var u uint8 = 255
	fmt.Println(u, u+1, u*u) // "255 0 1"
	var i int8 = 127
	fmt.Println(i, i+1, i*i)

	const e = 2.71828
	const Avogadro = 6.02214129e23
	const Planck = 6.62606957e-34

	// 算术运算符
	intValue3++ // 只能作为语句，不能作为表达式
	fmt.Println(intValue1)
	intValue1 *= intValue1 // -13* -13? 87

	fmt.Println(intValue1, intValue2, intValue3)

	// 比较运算符
	if intValue1 < intValue3 {
		fmt.Println("int_value_1 比 int_value_3 小")
	}

	// 位运算符
	var intValueBit uint8
	intValueBit = 255
	intValueBit = ^intValueBit
	fmt.Println(intValueBit)

	intValueBit = 1
	intValueBit = intValueBit << 3
	fmt.Println(intValueBit) // 8
	fmt.Println(7 & 5)

	var x uint8 = 1<<1 | 1<<5
	var y uint8 = 1<<1 | 1<<2
	fmt.Printf("%08b，%d\n", x, x)       // "00100010", the set {1, 5}
	fmt.Printf("%08b，%d\n", y, y)       // "00000110", the set {1, 2}
	fmt.Printf("%08b，%d\n", x&y, x&y)   // "00000010", the intersection {1}
	fmt.Printf("%08b，%d\n", x|y, x|y)   // "00100110", the union {1, 2, 5}
	fmt.Printf("%08b，%d\n", x^y, x^y)   // "00100100", the symmetric difference {2, 5}
	fmt.Printf("%08b，%d\n", x&^y, x&^y) // "00100000", the difference {5}
	for i := uint(0); i < 8; i++ {
		if x&(1<<i) != 0 { // membership test
			fmt.Println(i) // "1", "5"
		}
	}
	fmt.Printf("%08b\n", x<<1) // "01000100", the set {2, 6}
	fmt.Printf("%08b\n", x>>1) // "00010001", the set {0, 4}

	// 逻辑运算符
	if intValue1 < intValue3 && intValue1 == -87 {
		fmt.Println("条件为真")
	}

	// 数据类型转化
	v21 := uint(16)    // 初始化 v1 类型为 unit
	v22 := int8(v21)   // 将 v1 转化为 int8 类型并赋值给 v2
	v23 := uint16(v22) // 将 v2 转化为 uint16 类型并赋值给 v3
	v24 := uint(255)
	v25 := int8(v24) // v2 = -1
	v26 := 99.99
	v27 := int8(v26)
	v28 := float64(v27)
	fmt.Println(v21, v22, v23, v24, v25, v26, v27, v28, "/n")
	fmt.Println(int32(integer16) + integer32)
}
