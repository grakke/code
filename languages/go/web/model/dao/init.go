package dao

import (
	"os"
	"time"

	"gorm.io/driver/mysql"
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

var _DB *gorm.DB

func DB() *gorm.DB {
	return _DB
}

func init() {
	_DB = initDB()
}

func initDB() *gorm.DB {
	dsn := os.Getenv("MYSQL_DSN")
	if dsn == "" {
		dsn = "go_web:go_web@tcp(localhost:33063)/g0_web?charset=utf8&parseTime=True&loc=Local"
	}

	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	if err == nil {
		sqlDB, err2 := db.DB()
		if err2 == nil {
			if err2 = sqlDB.Ping(); err2 == nil {
				sqlDB.SetMaxOpenConns(100)
				sqlDB.SetMaxIdleConns(10)
				sqlDB.SetConnMaxLifetime(time.Second * 300)
				return db
			}
		}
	}

	fallback, err := gorm.Open(sqlite.Open("file::memory:?cache=shared"), &gorm.Config{})
	if err != nil {
		panic(err)
	}
	return fallback
}
