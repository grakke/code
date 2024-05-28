package main

import (
	"fmt"
	"reflect"
	"unsafe"
)

func main() {
	s1 := "hello"
	b := []byte(s1)

	// []byte to string
	s2 := string(b)
	fmt.Println(&s1, &b, &s2)

	msg1 := "hello"
	// 声明并定义了一个 *reflect.StringHeader 类型的指针变量，对应的指针值还是原来 msg1 的内存地址,最前面的的 * 是从*reflect.StringHeader 类型的指针变量中取出值
	sh := *(*reflect.StringHeader)(unsafe.Pointer(&msg1))
	bh := reflect.SliceHeader{
		Data: sh.Data,
		Len:  sh.Len,
		Cap:  sh.Len,
	}
	msg2 := *(*[]byte)(unsafe.Pointer(&bh))
	fmt.Printf("%v", msg2)
}
