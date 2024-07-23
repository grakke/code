package main

import "fmt"

func swap(a, b int) {
	a, b = b, a
	fmt.Printf("函数值传递互换,函数内 a: %d,b: %d\n", a, b)
}

func swapByPointer(a, b *int) {
	*a, *b = *b, *a
	fmt.Printf("函数指针传递互换,函数内 a: %d,b: %d\n", *a, *b)
}

func main() {
	// 指针变量:指向一个值的内存地址
	// 指针指向的内存地址的大小是固定的，在 32 位机器上占 4 个字节，在 64 位机器上占 8 个字节，与指针指向内存地址存储的值类型无关
	a := 100
	var ptr *int
	ptr = &a
	fmt.Printf("指针变量存储的地址 ptr = %d\n", ptr)
	fmt.Printf("指针变量值 *ptr = %d\n", *ptr)
	*ptr = 200
	fmt.Println("指针变量值修改", a)
	var pptr **int
	pptr = &ptr
	fmt.Printf("指向指针的指针变量 **pptr = %d\n", **pptr)

	b := 2
	fmt.Printf("初始值 a: %d,b: %d\n", a, b)
	swap(a, b)
	fmt.Printf("值互换了么 a: %d,b: %d\n", a, b)
	swapByPointer(&a, &b)
	fmt.Printf("最终值 a: %d,b: %d\n", a, b)

	fmt.Println("==================================")

	// 类型指针:允许对这个指针类型的数据进行修改指向其它内存地址，传递数据时如果使用指针则无须拷贝数据从而节省内存空间
	// 和 C 语言中指针不同，Go 语言中的类型指针不能进行偏移和运算，更为安全
	arr := []int{10, 100, 200}
	// 指针数组：
	var ptrA [3]*int
	for i := 0; i < len(arr); i++ {
		/* 整数地址赋值给指针数组 */
		ptrA[i] = &arr[i]
	}
	for i := 0; i < len(ptrA); i++ {
		fmt.Printf("a[%d] = %d\n", i, *ptrA[i])
	}
	arr[2] = 800
	for i := 0; i < len(ptrA); i++ {
		fmt.Printf("ptrA[%d] = %d\n", i, *ptrA[i])
	}

	var a01 int = 5

	var p *int = &a01
	fmt.Printf("%p\n", p)
}
