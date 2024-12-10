package main

import (
	"errors"
	"fmt"
)

func main() {
	result, err := sum(1, 2)
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println(result)
	}
	result, err = sum1(4, 5)
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println(result)
	}

	fmt.Println(sum2(4, 5, 6, 7, 8))

	sum2 := func(a, b int) int {
		return a + b
	}
	fmt.Println(sum2(1, 2))

	cl := colsure()
	fmt.Println(cl())
	fmt.Println(cl())
	fmt.Println(cl())

	age := Age(25)
	age.String()
	age.Modify(45)
	age.String()
	(&age).Modify(55)
	age.String()
}

func sum(a, b int) (int, error) {
	if a < 0 || b < 0 {
		return 0, errors.New("a或者b不能是负数")
	}
	return a + b, nil
}

func sum1(a, b int) (sum int, err error) {
	if a < 0 || b < 0 {
		return 0, errors.New("a或者b不能是负数")
	}

	sum = a + b
	err = nil
	return
}

func sum2(params ...int) int {
	sum := 0
	for _, i := range params {
		sum += i
	}
	return sum
}

func colsure() func() int {
	i := 0
	return func() int {
		i++
		return i
	}
}

type Age uint

func (age Age) String() {
	fmt.Println("The age is", age)
}
func (age *Age) Modify(newAge uint) {
	*age = Age(newAge)
}
