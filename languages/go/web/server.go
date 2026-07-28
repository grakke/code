package main

import (
	"fmt"
	"log"
	"net/http"
	"time"
)

func HelloHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Hello World!0")
}

type HelloHandlerStruct struct {
	content string
}

func (handler *HelloHandlerStruct) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, handler.content)
}

type WelcomeHandlerStruct struct {
}

func (*WelcomeHandlerStruct) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Welcome")
}

type Middleware func(http.HandlerFunc) http.HandlerFunc

func Logging() Middleware {
	return func(f http.HandlerFunc) http.HandlerFunc {
		return func(w http.ResponseWriter, r *http.Request) {
			start := time.Now()
			defer func() { log.Print(r.URL.Path, time.Since(start)) }()
			f(w, r)
		}
	}
}

func Method(m string) Middleware {
	return func(f http.HandlerFunc) http.HandlerFunc {
		return func(w http.ResponseWriter, r *http.Request) {
			if r.Method != m {
				http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
				return
			}
			f(w, r)
		}
	}
}

func Chain(f http.HandlerFunc, middlewares ...Middleware) http.HandlerFunc {
	for _, m := range middlewares {
		f = m(f)
	}
	return f
}

// func main() {
// 	http.HandleFunc("/", Chain(HelloHandler, Method("GET"), Logging()))
// 	http.Handle("/hello", &HelloHandlerStruct{content: "Hello World!"})

//		http.ListenAndServe(":8000", nil)
//	}
//
// 自定义 mux
func main() {
	mux := http.NewServeMux()
	mux.HandleFunc("/", HelloHandler)
	mux.Handle("/welcome", &WelcomeHandlerStruct{})
	http.ListenAndServe(":8080", mux)
}
