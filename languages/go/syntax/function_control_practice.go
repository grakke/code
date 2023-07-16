package main

import (
	"fmt"
	"math/rand"
	"strconv"
	"time"
)

func fizzBuzz() string {
	rand.Seed(time.Now().Unix())
	var num int = (int)(rand.Int63n(100))

	switch {
	case num%15 == 0:
		return "FizzBuzz"
	case num%3 == 0:
		return "Fizz"
	case num%5 == 0:
		return "Buzz"
	}

	return strconv.Itoa(num)
}

func is_prime(number int) bool {
	for i := 2; i < number; i++ {
		if number%i == 0 {
			return false
		}
	}

	//  质数 大于 1 任意数字，只能被它自己和 1 整除
	if number > 1 {
		return true
	} else {
		return false
	}
}

func main() {
	fizzBuzz()

	fmt.Println("Prime numbers less than 20:")
	for num := 2; num < 20; num++ {
		if is_prime(num) {
			fmt.Printf("%v\r\n", num)
		}
	}
	// 用户输入一个数字，如果该数字为负数，则进入紧急状态
	val := 0
	for {
		fmt.Print("Enter number: ")
		fmt.Scanf("%d", &val)

		switch {
		case val < 0:
			panic("You entered a negative number!")
		case val == 0:
			fmt.Println("0 is neither negative nor positive")
		default:
			fmt.Println("You entered:", val)
		}

		if val > 0 {
			break
		}

	}
}
