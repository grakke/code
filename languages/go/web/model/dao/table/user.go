package table

import "time"

type User struct {
	Id int64 `gorm:"column:id;primary_key"`
	UserName string `gorm:"column:username"`
	Secret string `gorm:"column:secret;type:varchar(1000)"`
	CreatedAt time.Time `gorm:"column:created_at"`
	UpdatedAt time.Time `gorm:"column:updated_at"`
}

func TableName() string {
	return "users"
}
