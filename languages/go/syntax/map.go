package main

import (
	"fmt"
	"reflect"
)
type simplePerson struct {
    Age int
}

func (p *simplePerson) GrowUp() {
    p.Age++
}

func main() {
	// var m map[string]int // m = nil
	// m["key"] = 1         // 发生运行时异常：panic: assignment to entry in nil map

	var countryCapitalMap = make(map[string]string)

	/* map插入key - value对,各个国家对应的首都 */
	countryCapitalMap["France"] = "巴黎"
	countryCapitalMap["Italy"] = "罗马"
	countryCapitalMap["Japan"] = "东京"
	countryCapitalMap["India"] = "新德里"

	/*使用键输出地图值 */
	for country := range countryCapitalMap {
		fmt.Println(country, "首都：", countryCapitalMap[country])
	}

	/*查看元素在集合中是否存在 */
	capital, ok := countryCapitalMap["American"]
	if ok {
		fmt.Println("American 首都是", capital)
	} else {
		fmt.Println("American 首都不存在")
	}

	fmt.Println("========================")
	delete(countryCapitalMap, "France")
	fmt.Println("法国条目被删除")
	for country := range countryCapitalMap {
		fmt.Println(country, "首都是", countryCapitalMap[country])
	}

	v1 := [3]int{1, 2, 3}
	v2 := [3]int{1, 2, 3}
	fmt.Println("v1 == v2:", reflect.DeepEqual(v1, v2))
	//prints: v1 == v2: true

	s1 := []int{1, 2, 3}
	s2 := []int{1, 2, 3}
	fmt.Println("s1 == s2:", reflect.DeepEqual(s1, s2))
	//prints: s1 == s2: true

	m1 := map[string]string{"one": "a", "two": "b"}
	m2 := map[string]string{"two": "b", "one": "a"}
	fmt.Println("m1 == m2:", reflect.DeepEqual(m1, m2))
	//prints: m1 == m2: true

	m3 := map[int][]string{
		1: []string{"val1_1", "val1_2"},
		3: []string{"val3_1", "val3_2", "val3_3"},
		7: []string{"val7_1"},
	}

	type Position struct {
		x float64
		y float64
	}

	m4 := map[Position]string{
		Position{29.935523, 52.568915}:  "school",
		Position{25.352594, 113.304361}: "shopping-mall",
		Position{73.224455, 111.804306}: "hospital",
	}
	// 与 m4 等价
	m5 := map[Position]string{
		{29.935523, 52.568915}:  "school",
		{25.352594, 113.304361}: "shopping-mall",
		{73.224455, 111.804306}: "hospital",
	}
	fmt.Println(m3, m4, m5)

	m := map[string]*simplePerson{
        "iswbm": &simplePerson{Age: 20},
    }
    m["iswbm"].Age = 23
    m["iswbm"].GrowUp()

	m6 := map[string]int{
        "key1": 1,
        "key2": 2,
    }

    fmt.Println(m6) // map[key1:1 key2:2]
    foo6(m6)
    fmt.Println(m6) // map[key1:11 key2:12]

}

func foo6(m map[string]int) {
    m["key1"] = 11
    m["key2"] = 12
}