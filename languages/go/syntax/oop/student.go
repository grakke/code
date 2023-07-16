package oop

import "fmt"

// 通过结构体定义属性
// 结构体是值类型，如果传入值字面量，实际上传入的是结构体值的副本，对内存耗费更大，所以传入指针性能更好
type Student struct {
	id    uint
	name  string
	male  bool
	score float64
}

// 构造函数
func NewStudent(id uint, name string, male bool, score float64) *Student {
	return &Student{id: id, name: name, score: score, male: male}
}

// 通过接受体扩展方法：只读传值，修改　传引用
// 一个自定义数据类型的方法集合中仅会包含它的所有「值方法」，而该类型对应的指针类型包含的方法集合才囊括了该类型的所有方法，包括所有「值方法」和「指针方法」
func (s Student) GetName() string {
	return s.name
}

func (s *Student) SetName(name string) {
	s.name = name
}

func (s Student) String() string {
	return fmt.Sprintf("{id: %d, name: %s, male: %t, score: %f}",
		s.id, s.name, s.male, s.score)
}

type Country struct {
	Name string
}
type City struct {
	Name string
}
type Stringable interface {
	ToString() string
}

func (c Country) ToString() string {
	return "Country = " + c.Name
}
func (c City) ToString() string {
	return "City = " + c.Name
}

// Program to an interface not an implementation:把“业务类型” Country 和 City 和“控制逻辑” Print() 给解耦
func PrintStr(p Stringable) {
	fmt.Println(p.ToString())
}
