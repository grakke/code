package main

import (
	"fmt"
	"reflect"
	"strconv"
	"strings"
	"unicode/utf8"
	"unsafe"
)

// rune -> []byte
func encodeRune() {
    var r rune = 0x4E2D
    fmt.Printf("the unicode charactor is %c\n", r) // 中
    buf := make([]byte, 3)
    _ = utf8.EncodeRune(buf, r) // 对rune进行utf-8编码
    fmt.Printf("utf-8 representation is 0x%X\n", buf) // 0xE4B8AD
}

// []byte -> rune
func decodeRune() {
    var buf = []byte{0xE4, 0xB8, 0xAD}
    r, _ := utf8.DecodeRune(buf) // 对buf进行utf-8解码
    fmt.Printf("the unicode charactor after decoding [0xE4, 0xB8, 0xAD] is %s\n", string(r)) // 中
}

func dumpBytesArray(arr []byte) {
    fmt.Printf("[")
    for _, b := range arr {
        fmt.Printf("%c ", b)
    }
    fmt.Printf("]\n")
}
func main() {
	var str string
	str = "Hello World"
	// 字符串 一种不可变值类型，一旦初始化之后，内容不能被修改
	str += "!"
	str = str +
		", Henry"
	fmt.Printf("The length of \"%s\" is %d \n", str, len(str))

	fullName := "John Doe \t(alias \"Foo\")\n"
	fmt.Printf(fullName)

	// 字符串以 byte 数组存储
	fmt.Printf("The first character of \"%s\" is %c.\n", str, str[0])
	// for i := 0; i < len(str); i++ {
	for i, ch := range str {
		fmt.Println(i, ch, string(ch)) // ch 的类型为 rune
	}
	fmt.Println(str[:5], str[7:], str[8:10])

	// 得到中文字符
	str3 := "Go语言"
	fmt.Println("len(str3)：", len(str3))
	runeArr := []rune(str3)
	fmt.Println(reflect.TypeOf(runeArr[2]).Kind()) // int32
	fmt.Println(runeArr[2], string(runeArr[2]))    // 35821 语
	fmt.Println("len(runeArr)：", len(runeArr))     // len(runeArr)：4

	str_2 := "死神来了, 死神"
	comma := strings.Index(str_2, ", ")
	pos := strings.Index(str_2[comma:], "死神")
	fmt.Println(comma, pos, str_2[comma+pos:])

	// 对应 UTF-8 编码转化为字符串
	v30 := 65
	v31 := string(v30)
	v32 := 30028
	v33 := string(v32)

	// 将字节数组或者 rune（Unicode 编码字符）数组转化为字符串
	v34 := []byte{'h', 'e', 'l', 'l', 'o'}
	v35 := string(v34)
	v36 := []rune{0x5b66, 0x9662, 0x541b}
	v37 := string(v36)
	fmt.Println(v31, v33, v35, v37)

	// 字符串与其他基本数据类型之间转化
	v1 := "100"
	v2, err := strconv.Atoi(v1) // 将字符串转化为整型，v2 = 100
	v4 := strconv.Itoa(v2)      // 将整型转化为字符串, v4 = "100"

	v5 := "true"
	v6, err := strconv.ParseBool(v5) // 将字符串转化为布尔型
	v5 = strconv.FormatBool(v6)      // 将布尔值转化为字符串

	v7 := "100"
	v8, err := strconv.ParseInt(v7, 10, 64) // 将字符串转化为整型，第二个参数表示几进制，第三个参数表示最大位数
	v7 = strconv.FormatInt(v8, 10)          // 将整型转化为字符串，第二个参数表示几进制

	v9, err := strconv.ParseUint(v7, 10, 64) // 将字符串转化为无符号整型，参数含义同 ParseInt
	v7 = strconv.FormatUint(v9, 10)          // 将字符串转化为无符号整型，参数含义同 FormatInt

	v10 := "99.99"
	v11, err := strconv.ParseFloat(v10, 64) // 将字符串转化为浮点型，第二个参数表示精度
	v10 = strconv.FormatFloat(v11, 'E', -1, 64)

	q := strconv.Quote("Hello, 世界")       // 为字符串加引号
	q = strconv.QuoteToASCII("Hello, 世界") // 将字符串转化为 ASCII 编码

	fmt.Println(v2, v4, v5, v6, v7, v8, v9, v10, v11, q, err)

	fmt.Printf("%#v\n", []rune("世界")) // []int32{19990 , 30028}
	fmt.Printf("%#v\n", string([]rune{'世', '界'})) // 世界

	var s = "hello"
    hdr := (*reflect.StringHeader)(unsafe.Pointer(&s)) // 将string类型变量地址显式转型为reflect.StringHeader
    fmt.Printf("0x%x\n", hdr.Data) // 0x10a30e0
    p := (*[5]byte)(unsafe.Pointer(hdr.Data)) // 获取Data字段所指向的数组的指针
    dumpBytesArray((*p)[:]) // [h e l l o ]   // 输出底层数组的内容
}
