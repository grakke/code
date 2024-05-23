package unit

import (
	"log"
)

type DB interface {
	Get(key string) (int, error)
}

func GetFromDB(db DB, key string) int {
	if value, err := db.Get(key); err == nil {
		return value
	}

	return -1
}

type OrderDBI interface {
	GetName(orderid int) string
}
type OrderInfo struct {
	orderid int
}

func (order OrderInfo) GetName(orderid int) string {
	log.Println("原本应该连接数据库去取名称")
	return "xdcute"
}

// func main() {
// 	var orderDBI OrderDBI
// 	orderDBI = new(OrderInfo)
// 	ret := orderDBI.GetName(1)
// 	fmt.Println("取到的用户名:", ret)
// }
