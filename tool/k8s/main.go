package main

import (
	"fmt"
	"net/http"

	"github.com/rs/zerolog/log"
)

func main() {
	http.HandleFunc("/ping", func(w http.ResponseWriter, r *http.Request) {
	   log.Print("ping")
	   fmt.Fprint(w, "pong")
	})

	http.ListenAndServe(":8081", nil)
 }