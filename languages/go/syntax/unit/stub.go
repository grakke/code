package unit

import (
	"fmt"

	. "github.com/prashantv/gostub"
)

var str string

func main() {
	stubs := Stub(&str, "learnku")
	defer stubs.Reset()
	fmt.Println(str)
	// 可以多次打桩
	stubs.Stub(&str, "xdcute")
	fmt.Println(str)

	var printStr = func(val string) string {
		return val
	}
	stubs1 := Stub(&printStr, func(val string) string {
		return "hello," + val
	})
	defer stubs1.Reset()
	fmt.Println("After stub:", printStr("xdcute"))

	var printStr1 = func(val string) string {
		return val
	}
	// StubFunc 第一个参数必须是一个函数变量的指针，该指针指向的必须是一个函数变量，第二个参数为函数 mock 的返回值
	stubs2 := StubFunc(&printStr1, "xdcute,万生世代")
	defer stubs2.Reset()
	fmt.Println("After stub:", printStr1("lalala"))

	var PrintStr2 = printStr1
	var printStr2 = func(val string) {
		fmt.Println(val)
	}

	stubs3 := StubFunc(&printStr2)
	PrintStr2("xdcute")
	defer stubs3.Reset()

}
