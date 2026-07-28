package main

import (
	"fmt"
	"log"
	"net/http"
	"time"

	"github.com/gorilla/mux"
)

type WelcomeHandlerStruct struct{}

type MiddlewareFunc func(http.Handler) http.Handler

func ShowVisitorInfo(writer http.ResponseWriter, request *http.Request) {
	vars := mux.Vars(request)
	name := vars["name"]
	country := vars["country"]
	fmt.Fprintf(writer, "This guy named %s was coming from %s .", name, country)
}

func HelloHandler(writer http.ResponseWriter, request *http.Request) {
	fmt.Fprintf(writer, "Hello World!")
}

func (*WelcomeHandlerStruct) ServeHTTP(writer http.ResponseWriter, request *http.Request) {
	fmt.Fprintf(writer, "Welcome")
}

func Logging() mux.MiddlewareFunc {
	return func(next http.Handler) http.Handler {
		return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
			start := time.Now()
			defer func() { log.Println(r.URL.Path, time.Since(start)) }()
			next.ServeHTTP(w, r)
		})
	}
}

func Method(m string) mux.MiddlewareFunc {
	return func(next http.Handler) http.Handler {
		return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
			if r.Method != m {
				http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
				return
			}
			next.ServeHTTP(w, r)
		})
	}
}

func RegisterRoutes(r *mux.Router) {
	r.Use(Logging())
	indexRouter := r.PathPrefix("/index").Subrouter()
	indexRouter.HandleFunc("/", HelloHandler).Methods("GET")
	indexRouter.Handle("/welcome", &WelcomeHandlerStruct{})

	userRouter := r.PathPrefix("/user").Subrouter()
	userRouter.HandleFunc("/names/{name}/countries/{country}", ShowVisitorInfo)
	userRouter.Use(Method("GET"))
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
