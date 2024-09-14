package main

import "fmt"

// 定义Component接口，作为组合中对象的一致性协议
type Component interface {
	Operation()             // 执行操作的方法
	Add(Component)          // 向组合中添加子节点的方法
	Remove(Component)       // 从组合中移除子节点的方法
	GetChild(int) Component // 根据索引获取子节点的方法
}

// 定义Leaf结构体，表示组合中的叶节点
type Leaf struct {
	name string
}

// Leaf实现Component接口的Operation方法
func (l *Leaf) Operation() {
	fmt.Println("Leaf:", l.name)
}

// Leaf实现Component接口的Add方法，叶节点不能有子节点，因此这里可以不实现或抛出错误
func (l *Leaf) Add(c Component) {
	fmt.Println("Cannot add to a leaf")
}

// Leaf实现Component接口的Remove方法，叶节点不能有子节点，因此这里可以不实现或抛出错误
func (l *Leaf) Remove(c Component) {
	fmt.Println("Cannot remove from a leaf")
}

// Leaf实现Component接口的GetChild方法，叶节点没有子节点，因此这里返回nil
func (l *Leaf) GetChild(i int) Component {
	return nil
}

// 定义Composite结构体，表示组合中的容器节点
type Composite struct {
	name     string
	Children []Component // 存储子节点的列表
}

// Composite实现Component接口的Operation方法
func (c *Composite) Operation() {
	fmt.Println("Composite:", c.name)
	for _, child := range c.Children {
		child.Operation() // 递归调用子节点的Operation方法
	}
}

// Composite实现Component接口的Add方法，向Children列表中添加子节点
func (c *Composite) Add(component Component) {
	c.Children = append(c.Children, component)
}

// Composite实现Component接口的Remove方法，从Children列表中移除子节点
func (c *Composite) Remove(component Component) {
	for i, child := range c.Children {
		if child == component {
			c.Children = append(c.Children[:i], c.Children[i+1:]...)
			break
		}
	}
}

// Composite实现Component接口的GetChild方法，根据索引获取子节点
func (c *Composite) GetChild(i int) Component {
	if i < 0 || i >= len(c.Children) {
		return nil // 索引超出范围，返回nil
	}
	return c.Children[i]
}

func main() {
	// 创建叶节点
	leafA := &Leaf{name: "Leaf A"}
	leafB := &Leaf{name: "Leaf B"}

	// 创建组合节点
	composite := &Composite{name: "Composite Root"}
	composite.Add(leafA) // 向组合中添加叶节点A
	composite.Add(leafB) // 向组合中添加叶节点B

	// 执行组合节点的操作
	composite.Operation()
}
