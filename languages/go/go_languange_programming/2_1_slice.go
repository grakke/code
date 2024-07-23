package main

import "fmt"

func main() {
	var myArray [8]int = [8]int{1, 2, 3, 4, 5, 6, 7, 8}

	fmt.Println("Elements of myArray:")
	for _, v := range myArray {
		fmt.Println(v, "")
	}

	var mySlice []int = myArray[:4]
	iteratorSlice(mySlice)
	fmt.Println()

	mySlice = make([]int, 5, 10)
	mySlice2 := []int{8, 9, 10}
	mySlice = append(mySlice, mySlice2...)
	fmt.Println("len(mySlice):", len(mySlice))
	fmt.Println("cap(mySlice):", cap(mySlice))
	fmt.Println()

	oldSlice := []int{1, 2, 3, 4, 5}
	newSlice := oldSlice[:3]
	iteratorSlice(newSlice)
	fmt.Println()

	slice1 := []int{1, 2, 3, 4, 5}
	slice2 := []int{5, 4, 3}
	copy(slice1, slice2) // 只会复制slice2的3个元素到slice1的前3个位置
	copy(slice2, slice1) // 只会复制slice1的前3个元素到slice2中
	iteratorSlice(slice1)
	iteratorSlice(slice2)
}

func iteratorSlice(slice []int) {
	fmt.Println("Elements of Slice:")
	for _, v := range slice {
		fmt.Println(v, "")
	}
	return
}
