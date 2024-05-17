package main

import (
	"fmt"
	"time"
)

type T struct {
    a int
}

func (t T) Get() int {
    return t.a
}

func (t *T) Set(a int) int {
    t.a = a
    return t.a
}

type field struct {
    name string
}

// func (p *field) print() {
func (p field) print() {
    fmt.Println(p.name)
}

func main() {
    data1 := []*field{{"one"}, {"two"}, {"three"}}
    for _, v := range data1 {
        go v.print()
    }

    data2 := []field{{"four"}, {"five"}, {"six"}}
	// 与print的receiver参数类型不同，需要将其取地址后再传入(*field).print函数。每次传入的&v实际上是变量v的地址，而不是切片data2中各元素的地址
    for _, v := range data2 {
        // go (*field).print(&v)
		go v.print()
    }

    time.Sleep(3 * time.Second)
}