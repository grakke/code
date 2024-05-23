package main

import (
	"bytes"
	"fmt"
	"reflect"
	"unsafe"
)

func main() {
	// 通过内置 make 函数创建切片，长度必选，容量可选，默认容量和切片长度一致
	months := [...]string{"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"}
	all := months[:]
	fmt.Println("All Months:", all, len(all), cap(all))

	quarter1 := months[0:3]
	quarter2 := months[3:6]
	quarter3 := months[6:9]
	quarter4 := months[9:12]
	fmt.Println(quarter1, len(quarter1), cap(quarter1))
	fmt.Println(quarter2, len(quarter2), cap(quarter2))
	fmt.Println(quarter3, len(quarter3), cap(quarter3))
	fmt.Println(quarter4, len(quarter4), cap(quarter4))

	quarter2Extended := quarter2[:4]
	fmt.Println(quarter2Extended, len(quarter2Extended), cap(quarter2Extended))

	summer := months[5:8]
	for i, v := range summer {
		fmt.Println("summer[", i, "] =", v)
	}

	// 基于切片创建切片,可以超越长度
	firstHalf := months[:6]
	q1 := firstHalf[:9]
	fmt.Printf("len=%d cap=%d slice=%v, %v \n ", len(firstHalf), cap(firstHalf), firstHalf, q1)

	secondHalf := months[6:]
	q2 := secondHalf[1:3]
	fmt.Printf("len=%d cap=%d slice=%v, %v \n", len(secondHalf), cap(secondHalf), secondHalf, q2)

	// 容量扩展
	slice1 := make([]int, 0)
	for i := 0; i < 10; i++ {
		slice1 = append(slice1, i)
		fmt.Printf("%d\tcap=%d\t%v\n", i, cap(slice1), slice1)
	}

	slice2 := make([]int, 5, 10)
	slice7 := append(slice2, 99, 98, 77, 45, 67, 5, 5, 7, 4, 6, 7, 8)
	fmt.Println(slice2, len(slice2), cap(slice2), slice7, len(slice7), cap(slice7))

	arr := [10]int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	sl := arr[3:7:9]
	sl[0] += 10
	fmt.Println("arr[3] =", arr[3]) // 14

	letters := []string{"A", "B", "C", "D", "E"}
	remove := 2
	if remove < len(letters) {
		fmt.Println("Before", letters, "Remove ", letters[remove])
		letters = append(letters[:remove], letters[remove+1:]...)
		fmt.Println("After", letters)
	}

	// 复制
	slice1 = []int{1, 2, 3, 4, 5}
	slice2 = []int{5, 4, 3}
	fmt.Println("Copy Slice1", slice1, "to Slice2", slice2)
	copy(slice2, slice1)
	fmt.Println("Slice1", slice1, "slice2", slice2)

	slice2 = []int{5, 4, 3}
	fmt.Println("Copy Slice2", slice2, "To Slice1", slice1)
	copy(slice1, slice2)
	fmt.Println("Slice2", slice2, "Slice1", slice1)

	// 删除 通过生成新切片实现
	slice3 := []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	fmt.Println("Slice3:", slice3)

	slice31 := slice3[:len(slice3)-5]
	slice32 := slice3[5:]
	fmt.Println("Remove tail 5 element:", slice31, "Cap:", cap(slice31), "\nRemove head 5 element", slice32, "Cap:", cap(slice32))

	fmt.Println("删除中间三个元素", append(slice3[:1], slice3[4:]...))
	fmt.Println("Slice3:", slice3)

	slice37 := slice3[:copy(slice3, slice3[3:])] // 删除开头前三个元素
	fmt.Println(s)

	// 用range去求一个s的和。数组类似
	nums := []int{2, 3, 4}
	sum := 0
	for _, num := range nums {
		sum = sum + num
	}
	fmt.Println("sum:", sum)
	//在数组上使用range将传入index和值两个变量。上面那个例子不需要使用该元素的序号，所以我们使用空白符"_"省略了。有时侯我们确实需要知道它的索引。
	for i, num := range nums {
		if num == 3 {
			fmt.Println("index:", i)
		}
	}

	// range也可以用在map的键值对上
	kvs := map[string]string{"a": "apple", "b": "banana"}
	for k, v := range kvs {
		fmt.Printf("%s -> %s\n", k, v)
	}

	//range也可以用来枚举Unicode字符串。第一个参数是字符的索引，第二个是字符（Unicode的值）本身。
	for i, c := range "go" {
		fmt.Println(i, c)
	}

	path := []byte("AAAA/BBBBBBBBB")
	sepIndex := bytes.IndexByte(path, '/')
	dir1 := path[:sepIndex]
	dir2 := path[sepIndex+1:]
	fmt.Println("dir1 =>", string(dir1)) //prints: dir1 => AAAA
	fmt.Println("dir2 =>", string(dir2)) //prints: dir2 => BBBBBBBBB

	dir1 = append(dir1, "suffix"...)
	fmt.Println("dir1 =>", string(dir1)) //prints: dir1 => AAAAsuffix
	fmt.Println("dir2 =>", string(dir2)) //prints: dir2 => uffixBBBB

	var s1 []int
	s2 := make([]int,0)
	s4 := make([]int,0)

	fmt.Printf("s1 pointer:%+v, s2 pointer:%+v, s4 pointer:%+v, \n", *(*unsafe.Slice)(unsafe.Pointer(&s1)),*(*reflect.SliceHeader)(unsafe.Pointer(&s2)),*(*reflect.SliceHeader)(unsafe.Pointer(&s4)))
	fmt.Printf("%v\n", (*(*reflect.SliceHeader)(unsafe.Pointer(&s1))).Data==(*(*reflect.SliceHeader)(unsafe.Pointer(&s2))).Data)
	fmt.Printf("%v\n", (*(*reflect.SliceHeader)(unsafe.Pointer(&s2))).Data==(*(*reflect.SliceHeader)(unsafe.Pointer(&s4))).Data)
}
