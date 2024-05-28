package main

import (
	"fmt"

	"golang.org/x/exp/constraints"
)

func print[T any] (arr []T) {
	for _, v := range arr {
		fmt.Print(v)
		fmt.Print(" ")
	}
	fmt.Println("")
}

// Stack
type stack [T any] []T
func (s *stack[T]) push(elem T) {
	*s = append(*s, elem)
}

func (s *stack[T]) pop() {
	if len(*s) > 0 {
		*s = (*s)[:len(*s)-1]
	}
}
func (s *stack[T]) top() *T{
	if len(*s) > 0 {
		return &(*s)[len(*s)-1]
	}
	return nil
}

func (s *stack[T]) len() int{
	return len(*s)
}

func (s *stack[T]) print() {
	for _, elem := range *s {
		fmt.Print(elem)
		fmt.Print(" ")
	}
	fmt.Println("")
}
type node[T comparable] struct {
	data T
	prev *node[T]
	next *node[T]
}

type list[T comparable] struct {
	head, tail *node[T]
	len int
}

func (l *list[T]) isEmpty() bool {
	return l.head == nil && l.tail == nil
}

func (l *list[T]) add(data T) {
	n := &node[T] {
		data : data,
		prev : nil,
		next : l.head,
	}
	if l.isEmpty() {
		l.head = n
		l.tail = n
	}
	l.head.prev = n
	l.head = n
}

func (l *list[T]) push(data T) {
	n := &node[T] {
		data : data,
		prev : l.tail,
		next : nil,
	}
	if l.isEmpty() {
		l.head = n
		l.tail = n
	}
	l.tail.next = n
	l.tail = n
}

func (l *list[T]) del(data T) {
	for p := l.head; p != nil; p = p.next {
		if data == p.data {

			if p == l.head {
				l.head = p.next
			}
			if p == l.tail {
				l.tail = p.prev
			}
			if p.prev != nil {
				p.prev.next = p.next
			}
			if p.next != nil {
				p.next.prev = p.prev
			}
			return
		}
	}
}

func (l *list[T]) print() {
	if l.isEmpty() {
		fmt.Println("the link list is empty.")
		return
	}
	for p := l.head; p != nil; p = p.next {
		fmt.Printf("[%v] -> ", p.data)
	}
	fmt.Println("nil")
}

func Add[T constraints.Integer](a, b T) T {
    return a + b
}

func main() {
	strs := []string{"Hello", "World",  "Generics"}
	decs := []float64{3.14, 1.14, 1.618, 2.718 }
	nums := []int{2,4,6,8}

	print(strs)
	print(decs)
	print(nums)

	ss := stack[string]{}
	ss.push("Hello")
	ss.push("Hao")
	ss.push("Chen")
	ss.print()
	fmt.Printf("stack top is - %v\n", *(ss.top()))
	ss.pop()
	ss.pop()
	ss.print()

	ns := stack[int]{}
	ns.push(10)
	ns.push(20)
	ns.print()
	ns.pop()
	ns.print()
	*ns.top() += 1
	ns.print()
	ns.pop()
	fmt.Printf("stack top is - %v\n", ns.top())

	var l = list[int]{}
	l.add(1)
	l.add(2)
	l.push(3)
	l.push(4)
	l.add(5)
	l.print() //[5] -> [2] -> [1] -> [3] -> [4] -> nil
	l.del(5)
	l.del(1)
	l.del(4)
	l.print() //[2] -> [3] -> nil

	var m, n int = 5, 6
    println(Add(m,n)) // Add[int](m, n)
    var i,j int64 = 15, 16
    println(Add(i,j)) // Add[int64](i, j)
    var c,d byte = 0x11, 0x12
    println(Add(c,d)) // Add[byte](c, d)
}

// go run -gcflags=-G=3