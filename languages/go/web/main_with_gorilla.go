package main

import (
	"go-web/router"
	"go-web/utils/vlog"
	"log"
	"net/http"

	"github.com/gorilla/mux"
)

func main() {
	r := mux.NewRouter()
	router.RegisterRoutes(r)

	// 将logrus的Logger转换为io.Writer
	errorWriter := vlog.ErrorLog.Writer()
	// 记得关闭io.Writer
	defer errorWriter.Close()
	server := &http.Server{
		Addr:     ":8080",
		Handler:  r,
		ErrorLog: log.New(vlog.ErrorLog.Writer(), "", 0),
	}
	err := server.ListenAndServe()
	if err != nil {
		if err == http.ErrServerClosed {
			log.Print("Server closed under request")
		} else {
			log.Fatal("Server closed unexpected")
		}
	}
}
