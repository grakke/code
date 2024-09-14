package main

// 定义Iterator接口，它声明了迭代器必须实现的Next和Current方法
type Iterator interface {
	Next() bool           // 移动到下一个元素，并返回是否成功移动
	Current() interface{} // 返回当前元素
}

// 定义ConcreteIterator结构体，它实现了Iterator接口
type ConcreteIterator struct {
	items []string // 存储聚合对象的元素列表
	index int      // 当前迭代到的元素索引
}

// Next方法实现，用于移动到下一个元素
func (c *ConcreteIterator) Next() bool {
	if c.index < len(c.items) {
		c.index++ // 索引递增
		return true
	}
	return false // 如果索引超出范围，返回false
}

// Current方法实现，用于返回当前元素
func (c *ConcreteIterator) Current() interface{} {
	if c.index > 0 && c.index <= len(c.items) {
		return c.items[c.index-1] // 返回当前索引的元素
	}
	return nil // 如果索引不在范围内，返回nil
}

// 定义Aggregate接口，表示聚合对象，它将负责创建迭代器
type Aggregate interface {
	CreateIterator() Iterator // 创建并返回迭代器
}

// 定义ConcreteAggregate结构体，它实现了Aggregate接口
type ConcreteAggregate struct {
	items []string // 聚合对象存储的元素列表
}

// CreateIterator方法实现，用于创建并返回一个迭代器
func (a *ConcreteAggregate) CreateIterator() Iterator {
	return &ConcreteIterator{items: a.items, index: 0} // 返回一个新的迭代器实例
}

func main() {
	// 创建聚合对象并添加元素
	aggregate := &ConcreteAggregate{items: []string{"Item1", "Item2", "Item3"}}

	// 使用聚合对象创建迭代器
	iterator := aggregate.CreateIterator()

	// 使用迭代器遍历聚合对象中的所有元素
	for iterator.Next() {
		fmt.Println(iterator.Current())
	}
}
