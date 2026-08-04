package main

import (
	"log"
	"net/http"

	"github.com/gin-gonic/gin"
)

func main() {
	mux := gin.Default()

	// 设置全局通用handlers，这里是设置了engine的匿名成员RouterGroup的Handlers成员
	mux.Handlers = []gin.HandlerFunc{
		func(c *gin.Context) {
			log.Println("log 1")
			c.Next()
		},
		func(c *gin.Context) {
			log.Println("log 2")
			c.Next()
		},
	}

	// 绑定/ping 处理函数
	mux.GET("/ping", func(c *gin.Context) {
		c.String(http.StatusOK, "ping")
	})
	mux.GET("/pong", func(c *gin.Context) {
		c.String(http.StatusOK, "pong")
	})
	mux.GET("/ping/hello", func(c *gin.Context) {
		c.String(http.StatusOK, "ping hello")
	})

	mux.GET("/about", func(c *gin.Context) {
		c.String(http.StatusOK, "about")
	})

	// system组
	system := mux.Group("system")
	// system->auth组
	systemAuth := system.Group("auth")
	{
		// 获取管理员列表
		systemAuth.GET("/addRole", func(c *gin.Context) {
			c.String(http.StatusOK, "system/auth/addRole")
		})
		// 添加管理员
		systemAuth.GET("/removeRole", func(c *gin.Context) {
			c.String(http.StatusOK, "system/auth/removeRole")
		})
	}
	// user组
	user := mux.Group("user")
	// user->auth组
	userAuth := user.Group("auth")
	{
		// 登陆
		userAuth.GET("/login", func(c *gin.Context) {
			c.String(http.StatusOK, "user/auth/login")
		})
		// 注册
		userAuth.GET("/register", func(c *gin.Context) {
			c.String(http.StatusOK, "user/auth/register")
		})

		mux.Run()
	}
}
