package main

import "fmt"

func newString() string {
	s := new(string)
	*s = "飞雪无情"

	return *s
}

func main() {
	sp := newString()
	fmt.Println(sp)
	fmt.Println("飞雪无情")

	m := map[int]*string{}
	s := "飞雪无情"
	m[0] = &s
	fmt.Println(*m[0])
}
