package handler

import (
	"fmt"
	"net/http"

	"github.com/gorilla/mux"
)

func ShowVisitorInfo(writer http.ResponseWriter, request *http.Request) {
	vars := mux.Vars(request)
	name := vars["name"]
	country := vars["country"]

	fmt.Fprintf(writer, "This guy named %s was coming from %s.", name, country)
}
