package main

import (
	"fmt"
	"unicode/utf8"
)

func main() {
	array := [5]string{"a", "b", "c", "d", "e"}
	fmt.Println(array[2])

	array = [...]string{"a", "b", "c", "d", "e"}
	fmt.Println(array[4])
	for i := 0; i < 5; i++ {
		fmt.Printf("数组索引:%d,值:%s\n", i, array[i])
	}
	for i, v := range array {
		fmt.Printf("数组索引:%d,值:%s\n", i, v)
	}
	for _, v := range array {
		fmt.Printf("对应值:%s\n", v)
	}

	aa := [3][3]int{}
	aa[0][0] = 1
	aa[0][1] = 2
	aa[0][2] = 3
	aa[1][0] = 4
	aa[1][1] = 5
	aa[1][2] = 6
	aa[2][0] = 7
	aa[2][1] = 8
	aa[2][2] = 9
	fmt.Println(aa)

	slice := array[2:5]
	fmt.Println(slice)

	slice1 := make([]string, 4, 8)
	slice2 := []string{"a", "b", "c", "d", "e"}
	fmt.Println(len(slice1), cap(slice1), len(slice2), cap(slice2))

	slice[1] = "f"
	fmt.Println(array)

	slice2 = append(slice1, "f")
	fmt.Println(slice2, len(slice2), cap(slice2))
	slice2 = append(slice1, "f", "g")
	fmt.Println(slice2, len(slice2), cap(slice2))
	slice2 = append(slice1, slice...)
	fmt.Println(slice2, len(slice2), cap(slice2))

	nameAgeMap := make(map[string]int)
	nameAgeMap["飞雪无情"] = 20
	fmt.Println(nameAgeMap)
	nameAgeMap = map[string]int{"飞雪无情": 30}
	nameAgeMap["独孤堂主"] = 36
	fmt.Println(nameAgeMap)

	age, ok := nameAgeMap["飞雪无情1"]
	if ok {
		fmt.Println(age)
	}

	for k, v := range nameAgeMap {
		fmt.Println("Key is", k, ", Value is", v)
	}

	delete(nameAgeMap, "飞雪无情")
	fmt.Println(nameAgeMap)

	s := "Hello飞雪无情"
	bs := []byte(s)
	fmt.Println(len(s))
	fmt.Println(utf8.RuneCountInString(s))
	fmt.Println(bs)
	fmt.Println(s[0], s[1], s[15])
	for i, r := range s {
		fmt.Println(i, r)
	}
}
