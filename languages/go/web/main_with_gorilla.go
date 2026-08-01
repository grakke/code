package main

import (
	"go-web/router"
	"net/http"
	"os"

	"github.com/gorilla/mux"
	"github.com/sirupsen/logrus"
	log "github.com/sirupsen/logrus"
)

func init() {
	// 设置日志格式为json格式
	log.SetFormatter(&log.JSONFormatter{})

	// 设置将日志输出到指定文件（默认的输出为stderr,标准错误）
	// 日志消息输出可以是任意的io.writer类型
	logFile := "./static/logs/app.log"
	file, _ := os.OpenFile(logFile, os.O_RDWR|os.O_CREATE|os.O_APPEND, 0666)
	log.SetOutput(file)

	// 设置只记录日志级别为warn及其以上的日志
	log.SetLevel(log.WarnLevel)
}

var outlog = log.New()

func main() {
	r := mux.NewRouter()
	router.RegisterRoutes(r)

	server := &http.Server{
		Addr:    ":8080",
		Handler: r,
	}
	log.Fatal(server.ListenAndServe())

	log.WithFields(log.Fields{
		"animal": "walrus",
		"size":   10,
	}).Info("A group of walrus emerges from the ocean")

	log.WithFields(log.Fields{
		"omg":    true,
		"number": 122,
	}).Warn("The group's number increased tremendously!")

	log.WithFields(log.Fields{
		"omg":    true,
		"number": 100,
	}).Fatal("The ice breaks!")

	outlog.Out = os.Stdout
	outlog.Formatter = &log.JSONFormatter{}

	outlog.WithFields(logrus.Fields{
		"animal": "walrus",
		"size":   10,
	}).Info("A group of walrus emerges from the ocean")
}
