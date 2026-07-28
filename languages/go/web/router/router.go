package router

import (
	"go-web/handler"
	"go-web/middleware"

	"github.com/gorilla/mux"
)

func RegisterRoutes(r *mux.Router) {
	r.Use(middleware.Logging())

	indexRouter := r.PathPrefix("/index").Subrouter()
	indexRouter.HandleFunc("/", handler.HelloHandler).Methods("GET")
	indexRouter.Handle("/welcome", &handler.Welcome{})
	indexRouter.HandleFunc("/display_headers", handler.DisplayHeadersHandler)
	indexRouter.HandleFunc("/display_url_params", handler.DisplayUrlParamsHandler)
	indexRouter.HandleFunc("/display_form_data", handler.DisplayFormDataHandler)
	indexRouter.HandleFunc("/read_cookie", handler.ReadCookieHandler)
	indexRouter.HandleFunc("/parse_json_request", handler.DisplayPersonHandler).Methods("POST")

	userRouter := r.PathPrefix("/user").Subrouter()
	userRouter.HandleFunc("/names/{name}/countries/{country}", handler.ShowVisitorInfo)
	userRouter.Use(middleware.Method("GET"))

	viewRouter := r.PathPrefix("/view").Subrouter()
	viewRouter.HandleFunc("/index", handler.ShowIndexView)
}
