package main

import (
	"encoding/json"
	"fmt"
	"reflect"
)

type J struct {
	a string //小写无tag
	b string `json:"B"` //小写+tag
	C string //大写无tag
	D string `json:"DD" otherTag:"good"` //大写+tag
}

func printTag(stru interface{}) {
	t := reflect.TypeOf(stru).Elem()
	for i := 0; i < t.NumField(); i++ {
		fmt.Printf("结构体内第%v个字段 %v 对应的json tag是 %v , 还有otherTag？ = %v \n", i+1, t.Field(i).Name, t.Field(i).Tag.Get("json"), t.Field(i).Tag.Get("otherTag"))
	}
}

type User struct {
	Name  string `json:"name"`          // 总是输出
	Age   int    `json:"age,omitempty"` // 如果 Age=0，输出 JSON 时消失
	Token string `json:"-"`             // 永远不参与 JSON 转换（忽略）
	ID    int    `json:"id,string"`     // 输出为字符串，如 "100"
}

func main() {
	j := J{
		a: "1",
		b: "2",
		C: "3",
		D: "4",
	}
	printTag(&j)

	u := User{Name: "Tom", Age: 0, Token: "abc123", ID: 100}
	data, _ := json.Marshal(u)
	// 输出：{"name":"Tom","id":"100"} （注意 age 和 token 都没了）
	fmt.Println(string(data))
}
