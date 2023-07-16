package main

import (
	"fmt"
	"net/http"
	"os"
	"time"
)

type ConfigurableSleeper struct {
	duration time.Duration
}

func main() {
	fmt.Println(Hello("", ""))

	http.ListenAndServe(":5000", http.HandlerFunc(MyGreeterHandler))

	sleeper := &ConfigurableSleeper{1 * time.Second}
	Countdown(os.Stdout, sleeper)
}
