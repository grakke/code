package main

import "fmt"

func main() {
	name := "飞雪无情"
	nameP := &name //取地址
	fmt.Println("name变量的值为:", name)
	fmt.Println("name变量的内存地址为:", nameP)

	nameV:=*nameP
	fmt.Println("nameP指针指向的值为:",nameV)
	*nameP = "公众号:飞雪无情" //修改指针指向的值
	fmt.Println("nameP指针指向的值为:", *nameP)
	fmt.Println("name变量的值为:", name)
}
