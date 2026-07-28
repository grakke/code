package main

// import (
// 	"go-web/handler"
// 	"go-web/middleware"
// 	"log"
// 	"net/http"

// 	"github.com/gorilla/mux"
// )

// func main() {
// 	r := mux.NewRouter()
// 	r.Use(middleware.Logging())
// 	r.Use(middleware.Method("GET"))

// 	r.HandleFunc("/", handler.HelloHandler).Methods("GET")
// 	r.Handle("/hello", &handler.Hello{Content: "Hello World!"})

// 	log.Fatal(http.ListenAndServe(":8000", r))
// }

// 自定义 mux
// func main() {
// 	mux := http.NewServeMux()
// 	mux.HandleFunc("/", HelloHandler)
// 	mux.Handle("/welcome", &WelcomeHandlerStruct{})
// 	http.ListenAndServe(":8080", mux)

// mux.Handle("/", &helloHandler{})

// server := &http.Server{
// 	Addr:    ":8081",
// 	Handler: mux,
// }

// 创建系统信号接收器
// done := make(chan os.Signal)
// signal.Notify(done, os.Interrupt, syscall.SIGINT, syscall.SIGTERM)
// go func() {
// 	<-done

// 	if err := server.Shutdown(context.Background()); err != nil {
// 		log.Fatal("Shutdown server:", err)
// 	}
// }()

// log.Println("Starting HTTP server...")
// err := server.ListenAndServe()
// if err != nil {
// 	if err == http.ErrServerClosed {
// 		log.Print("Server closed under request")
// 	} else {
// 		log.Fatal("Server closed unexpected")
// 	}
// }
// }
