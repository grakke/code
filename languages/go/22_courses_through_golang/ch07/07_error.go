package main

import (
	"errors"
	"fmt"
	"strconv"
)

type commonError struct {
	errorCode int    //错误码
	errorMsg  string //错误信息
}

func (ce *commonError) Error() string {
	return ce.errorMsg
}

func add(a, b int) (int, error) {
	if a < 0 || b < 0 {
		// return 0,errors.New("a或者b不能为负数")
		return 0, &commonError{
			errorCode: 1,
			errorMsg:  "a或者b不能为负数"}
	} else {
		return a + b, nil
	}
}

type MyError struct {
	err error
	msg string
}

func (e *MyError) Error() string {
	return e.err.Error() + e.msg
}
func connectMySQL(ip, username, password string) {
	if ip == "" {
		panic("ip不能为空")
	}
	//省略其他代码
}
func main() {
	i, err := strconv.Atoi("a")
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println(i)
	}

	sum, err := add(-1, 2)
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println(sum)
	}

	sum, err = add(-1, 2)
	//  断言
	if cm, ok := err.(*commonError); ok {
		fmt.Println("错误代码为:", cm.errorCode, "，错误信息为：", cm.errorMsg)
	} else {
		fmt.Println(sum)
	}

	// err是一个存在的错误，可以从另外一个函数返回
	// newErr := MyError{err, "数据上传问题"}
	e := errors.New("原始错误e")
	w := fmt.Errorf("Wrap了一个错误:%w", e)
	fmt.Println(w)
	fmt.Println(errors.Unwrap(w))
	fmt.Println(errors.Is(w, e))

	var cm *commonError
	if errors.As(err, &cm) {
		fmt.Println("错误代码为:", cm.errorCode, "，错误信息为：", cm.errorMsg)
	} else {
		fmt.Println(sum)
	}

	defer func() {
		if p := recover(); p != nil {
			fmt.Println(p)
		}
	}()
	connectMySQL("", "root", "123456")
}
