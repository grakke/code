package main

import (
	"fmt"
	"net/http"
	"os"

	"github.com/rs/zerolog/log"
)

func main() {
	http.HandleFunc("/ping", func(w http.ResponseWriter, r *http.Request) {
	   log.Print("ping")
	   fmt.Fprint(w, "pong")
	})
	http.HandleFunc(
		"/service",
		func(w http.ResponseWriter, r *http.Request) {
		resp, err := http.Get("http://k8s-combat-service:8081/ping")
		if err != nil {
		   log.Print(err)
		   fmt.Fprint(w, err)
		   return
		}
		fmt.Fprint(w, resp.Status)
	 },
	)

	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		name, _ := os.Hostname()
		fmt.Fprint(w, name)
	 })

	http.ListenAndServe(":8081", nil)
 }