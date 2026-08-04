package main

import (
	"log"
	"net/http"

	"github.com/gin-gonic/gin"
)

type album struct {
	ID     string  `json:"id"`
	Title  string  `json:"title"`
	Artist string  `json:"artist"`
	Price  float64 `json:"price"`
}

var albums = []album{
	{ID: "1", Title: "Blue Train", Artist: "John Coltrane", Price: 56.99},
	{ID: "2", Title: "Jeru", Artist: "Gerry Mulligan", Price: 17.99},
	{ID: "3", Title: "Sarah Vaughan and Clifford Brown", Artist: "Sarah Vaughan", Price: 39.99},
}

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

	}
	mux.GET("/albums", getAlbums)
	mux.GET("/albums/:id", getAlbumByID)
	mux.POST("/albums", postAlbums)

	if err := mux.Run(); err != nil {
		log.Fatal(err)
	}
}

func getAlbums(c *gin.Context) {
	c.IndentedJSON(http.StatusOK, albums)
}

// postAlbums adds an album from JSON received in the request body.
func postAlbums(c *gin.Context) {
	var newAlbum album

	// Call BindJSON to bind the received JSON to newAlbum.
	if err := c.BindJSON(&newAlbum); err != nil {
		return
	}

	// Add the new album to the slice.
	albums = append(albums, newAlbum)
	c.IndentedJSON(http.StatusCreated, newAlbum)
}

func getAlbumByID(c *gin.Context) {
	id := c.Param("id")

	// Loop over the list of albums, looking for
	// an album whose ID value matches the parameter.
	for _, a := range albums {
		if a.ID == id {
			c.IndentedJSON(http.StatusOK, a)
			return
		}
	}
	c.IndentedJSON(http.StatusNotFound, gin.H{"message": "album not found"})
}
