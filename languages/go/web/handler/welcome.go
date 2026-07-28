package handler

import (
	"fmt"
	"net/http"
)

type Welcome struct{}

func (*Welcome) ServeHTTP(writer http.ResponseWriter, request *http.Request) {
	fmt.Fprintf(writer, "Welcome")
}
