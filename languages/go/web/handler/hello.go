package handler

import (
	"fmt"
	"net/http"
)

func HelloHandler(writer http.ResponseWriter, request *http.Request) {
	fmt.Fprint(writer, "Hello World!")
}

type Hello struct {
	Content string
}

func (handler *Hello) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	fmt.Fprint(w, handler.Content)
}
