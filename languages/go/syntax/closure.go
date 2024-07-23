package main

import "fmt"

//  i 在函数定义的返回值上声明，根据 go 的 caller-save 模式， i 变量会存储在 main 函数的栈空间。func1 的 return 重新把 5 赋值给了 i ，此时 i = 5
// 闭包函数存储了这个变量 i 的指针。在 defer 中对 i 进行自增，是直接更新到 i 的指针上
func func1() (i int) {
    i = 10
    defer func() {
        i += 1
    }()
    return 5
}
//  i 只能存储在 func1 的栈空间里，与此同时，return 的值不会作用于原变量 i 上，而是会存储在该函数在另一块栈内存里。因此在 defer 中对原 i 进行自增，并不会作用到 func1 的返回值上
func func2() (int) {
    i := 10
    defer func() {
        i += 1
    }()
    return i
}

func adder() func(int) int {
    sum := 0
    return func(x int) int {
        sum += x
        return sum
    }
}
func main() {
    closure := func1()
    fmt.Println(closure)
    closure = func2()
    fmt.Println(closure)

	valueFunc:= adder()
    fmt.Println(valueFunc(2))
}