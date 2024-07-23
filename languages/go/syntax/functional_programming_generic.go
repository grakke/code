package main

import (
	"fmt"
	"strings"
)

func gMap[T1 any, T2 any](arr []T1, f func(T1) T2) []T2 {
	result := make([]T2, len(arr))
	for i, elem := range arr {
		result[i] = f(elem)
	}
	return result
}

func gReduce[T1 any, T2 any](arr []T1, init T2, f func(T2, T1) T2) T2 {
	result := init
	for _, elem := range arr {
		result = f(result, elem)
	}
	return result
}

func gCountIf[T any](arr []T, f func(T) bool) int {
	cnt := 0
	for _, elem := range arr {
		if f(elem) {
			cnt += 1
		}
	}
	return cnt
}

func gFilter[T any](arr []T, in bool, f func(T) bool) []T {
	result := []T{}
	for _, elem := range arr {
		choose := f(elem)
		if (in && choose) || (!in && !choose) {
			result = append(result, elem)
		}
	}
	return result
}

func gFilterIn[T any](arr []T, f func(T) bool) []T {
	return gFilter(arr, true, f)
}

func gFilterOut[T any](arr []T, f func(T) bool) []T {
	return gFilter(arr, false, f)
}

type Employee struct {
	Name     string
	Age      int
	Vacation int
	Salary   float32
}

var employees = []Employee{
	{"Hao", 44, 0, 8000.5},
	{"Bob", 34, 10, 5000.5},
	{"Alice", 23, 5, 9000.0},
	{"Jack", 26, 0, 4000.0},
	{"Tom", 48, 9, 7500.75},
	{"Marry", 29, 0, 6000.0},
	{"Mike", 32, 8, 4000.3},
}

type Sumable interface {
	// type int,
	// int8, int16, int32, int64,
	// 	  uint, uint8, uint16, uint32, uint64,
	// 	  float32, float64
}

func gSum[T any, U Sumable](arr []T, f func(T) U) U {
	var sum U
	for _, elem := range arr {
		sum += f(elem)
	}
	return sum
}

func main() {
	nums := []int{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}
	squares := gMap(nums, func(elem int) int {
		return elem * elem
	})
	print(squares) //0 1 4 9 16 25 36 49 64 81

	strs := []string{"Hao", "Chen", "MegaEase"}
	upstrs := gMap(strs, func(s string) string {
		return strings.ToUpper(s)
	})
	print(upstrs) // HAO CHEN MEGAEASE

	dict := []string{"零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖"}
	strs = gMap(nums, func(elem int) string {
		return dict[elem]
	})
	print(strs) // 零 壹 贰 叁 肆 伍 陆 柒 捌 玖

	nums1 := []int{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}
	sum := gReduce(nums1, 0, func(result, elem int) int {
		return result + elem
	})
	fmt.Printf("Sum = %d \n", sum)

	nums2 := []int{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}
	odds := gFilterIn(nums2, func(elem int) bool {
		return elem%2 == 1
	})
	print(odds)

	// 统计年龄大于40岁的员工数
	old := gCountIf(employees, func(e Employee) bool {
		return e.Age > 40
	})
	fmt.Printf("old people(>40): %d\n", old)
	// ld people(>40): 2
	// 统计薪水超过 6000元的员工数
	high_pay := gCountIf(employees, func(e Employee) bool {
		return e.Salary >= 6000
	})
	fmt.Printf("High Salary people(>6k): %d\n", high_pay)
	//High Salary people(>6k): 4

	// 统计年龄小于30岁的员工的薪水
	younger_pay := gSum(employees, func(e Employee) float32 {
		if e.Age < 30 {
			return e.Salary
		}
		return 0
	})
	fmt.Printf("Total Salary of Young People: %0.2f\n", younger_pay)
	//Total Salary of Young People: 19000.00

	// 统计全员的休假天数
	total_vacation := gSum(employees, func(e Employee) int {
		return e.Vacation
	})
	fmt.Printf("Total Vacation: %d day(s)\n", total_vacation)
	//Total Vacation: 32 day(s)

	// 把没有休假的员工过滤出来
	no_vacation := gFilterIn(employees, func(e Employee) bool {
		return e.Vacation == 0
	})
	print(no_vacation)
	//{Hao 44 0 8000.5} {Jack 26 0 4000} {Marry 29 0 6000}
}
