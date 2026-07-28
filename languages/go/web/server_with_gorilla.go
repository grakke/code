package main

import (
	"fmt"
	"gorilla/mux"
	"log"
	"net/http"
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

func ShowVisitorInfo(writer http.ResponseWriter, request *http.Request) {
	vars := mux.Vars(request)
	name := vars["name"]
	country := vars["country"]
	fmt.Fprintf(writer, "This guy named %s, was coming from %s .", name, country)
}

func RegisterRoutes(r *mux.Router) {
	indexRouter := r.PathPrefix("/index").Subrouter()
	indexRouter.Handle("/", HelloHandler).Methods("GET")
	indexRouter.HandleFunc("/welcome", &WelcomeHandlerStruct{})
	// indexRouter.HandleFunc("/books/{title}", DeleteBook).Methods("DELETE")

	userRouter := r.PathPrefix("/user").Subrouter()
	userRouter.HandleFunc("/names/{name}/countries/{country}", ShowVisitorInfo)
}

func main() {
	router := mux.NewRouter()
	RegisterRoutes(router)

	server := &http.Server{
		Addr:    ":8080",
		Handler: router,
	}
	log.Fatal(server.ListenAndServe())
}
