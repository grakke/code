package main

import (
	"fmt"
	"unsafe"
)

type W struct {
	b int32
	c int64
}

func main() {
	var w *W = new(W)
	fmt.Println(w.b, w.c) // 默认值0，0

	//通过指针运算给b变量赋值为10
	b := unsafe.Pointer(uintptr(unsafe.Pointer(w)) + unsafe.Offsetof(w.b))
	*((*int)(b)) = 10
	fmt.Println(w.b, w.c) // 10，0
}
