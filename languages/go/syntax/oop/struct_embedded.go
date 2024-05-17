package main

import (
	"fmt"
	"io"
	"reflect"
	"strings"
)

type MyInt int

func (n *MyInt) Add(m int) {
	*n = *n + MyInt(m)
}

type t struct {
	a int
	b int
}

type S struct {
	*MyInt
	t
	io.Reader
	s string
	n int
}

func main() {
	m := MyInt(17)
	r := strings.NewReader("hello, go")
	s := S{
		MyInt: &m,
		t: t{
			a: 1,
			b: 2,
		},
		Reader: r,
		s:      "demo",
	}

	var sl = make([]byte, len("hello, go"))
	// s.Reader.Read(sl)
	s.Read(sl)
	fmt.Println(string(sl))
	// s.MyInt.Add(5)
	s.Add(5)
	fmt.Println(*(s.MyInt))

	t := T{
        T1: T1{},
        T2: &T2{},
    }

    dumpMethodSet(t)
    dumpMethodSet(&t)

	var t1 T1
	var pt1 *T1
	var t3 T3
	var pt3 *T3

    var t4 T4
    var pt4 *T4

	dumpMethodSet(t1)
	dumpMethodSet(t3)
	dumpMethodSet(t4)

	dumpMethodSet(pt1)
	dumpMethodSet(pt3)
	dumpMethodSet(pt4)
}

type T1 struct{}

func (T1) T1M1()   { println("T1's M1") }
func (*T1) PT1M2() { println("PT1's M2") }

type T2 struct{}

func (T2) T2M1()   { println("T2's M1") }
func (*T2) PT2M2() { println("PT2's M2") }

type T struct {
    T1
    *T2
}
type T3 T1
type T4 = T1


func dumpMethodSet(i interface{}) {
	dynTyp := reflect.TypeOf(i)

	if dynTyp == nil {
		fmt.Printf("there is no dynamic type\n")
		return
	}

	n := dynTyp.NumMethod()
	if n == 0 {
		fmt.Printf("%s's method set is empty!\n", dynTyp)
		return
	}

	fmt.Printf("%s's method set:\n", dynTyp)
	for j := 0; j < n; j++ {
		fmt.Println("-", dynTyp.Method(j).Name)
	}
	fmt.Printf("\n")
}