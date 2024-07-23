package main

import (
	"fmt"
	"math/rand"
	"time"
)

func location(city string) (string, string) {
	var region string
	var continent string
	switch city {
	case "Delhi", "Hyderabad", "Mumbai", "Chennai", "Kochi":
		region, continent = "India", "Asia"
	case "Lafayette", "Louisville", "Boulder":
		region, continent = "Colorado", "USA"
	case "Irvine", "Los Angeles", "San Diego":
		region, continent = "California", "USA"
	default:
		region, continent = "Unknown", "Unknown"
	}
	return region, continent
}

func getScore() int {
	return 55
}

func main() {
	if score := getScore(); score > 90 {
		fmt.Println("Grade: A")
	} else if score > 80 {
		fmt.Println("Grade: B")
	} else if score > 70 {
		fmt.Println("Grade: C")
	} else if score > 60 {
		fmt.Println("Grade: D")
	} else {
		fmt.Println("Grade: F")
	}

	// 条件为布尔值
	sec := time.Now().Unix()
	rand.NewSource(sec)
	var score = rand.Int31n(200)

	switch {
	case score >= 90:
		fmt.Println("Grade: A")
	case score >= 80 && score < 90:
		fmt.Println("Grade: B")
	case score >= 70 && score < 80:
		fmt.Println("Grade: C")
	case score >= 60 && score < 70:
		fmt.Println("Grade: D")
	default:
		fmt.Println("Grade: F")
	}

	// 等值判断
	switch score {
	case 90, 100:
		fmt.Println("Grade: A")
	case 80:
		fmt.Println("Grade: B")
	case 70:
		fmt.Println("Grade: C")
	case 60:
		// 执行紧跟分支代码
		fallthrough
	case 65:
		fmt.Println("Grade: D")
	default:
		fmt.Println("Grade: F")
	}

	switch sum := 30; {
	case sum < 40:
		fmt.Printf("%d is lesser than 40\n", sum)
		fallthrough
	case sum > 20:
		fmt.Printf("%d is greater than 20\n", sum)
	}

	region, continent := location("Irvine")
	fmt.Printf("John works in %s, %s\n", region, continent)

	switch time.Now().Weekday().String() {
	case "Monday", "Tuesday", "Wednesday", "Thursday", "Friday":
		fmt.Println("It's time to learn some Go.")
	default:
		fmt.Println("It's weekend, time to rest!")
	}
	fmt.Println(time.Now().Weekday().String())

	sum := 0
	for i := 1; i <= 100; i++ {
		sum += i
	}
	fmt.Printf("Sum of 1~100:%d \n", sum)

	sum = 0
	i := 0
	for i < 10 {
		i++
		sum += i
	}
	fmt.Println(sum)

	arr := [][]int{{1, 2, 3}, {4, 5, 6}, {7, 8, 9}}
	for i := 0; i < 3; i++ {
		for j := 0; j < 3; j++ {
			num := arr[i][j]
			if j > 1 {
				break
			} else {
				continue
			}
			fmt.Println(num)
		}
	}

	// lable 与标签结合跳转到指定的标签语句
ITERATOR1:
	for i := 0; i < 3; i++ {
		for j := 0; j < 3; j++ {
			num := arr[i][j]
			if j > 1 {
				break ITERATOR1
			}
			fmt.Println(num)
		}
	}

	for i := 0; i < 3; i++ {
		for j := 0; j < 3; j++ {
			num := arr[i][j]
			if j > 1 {
				goto EXIT
			}
			fmt.Println(num)
		}
	}

EXIT:
	fmt.Println("Exit \n")

    var m = []int{1, 2, 3, 4, 5}

    for i, v := range m {
        go func(i, v int) {
            time.Sleep(time.Second * 3)
            fmt.Println(i, v)
        }(i, v)
    }

    time.Sleep(time.Second * 10)

	var a = [5]int{1, 2, 3, 4, 5}
    var r [5]int

    fmt.Println("original a =", a)

    for i, v := range a {
		// for i, v := range a[:] {
        if i == 0 {
            a[1] = 12
            a[2] = 13
        }
        r[i] = v
    }

    fmt.Println("after for range loop, r =", r)
    fmt.Println("after for range loop, a =", a)
}
