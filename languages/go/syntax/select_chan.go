package main

import (
	"fmt"
	"time"
)

var stop chan bool

func reqTask(name string) {
	for {
		select {
		case <-stop:
			fmt.Println("stop", name)
			return
		default:
			fmt.Println(name, "send request")
			time.Sleep(1 * time.Second)
		}
	}
}

func worker() {
	heartbeat := time.NewTicker(30 * time.Second)
	defer heartbeat.Stop()
	for {
		select {
		case <-c:
			// ... do some stuff
		case <- heartbeat.C:
			//... do heartbeat stuff
		}
	}
}


func main() {

	stop = make(chan bool)
	go reqTask("worker1")
	time.Sleep(3 * time.Second)

	stop <- true
	time.Sleep(1 * time.Second)

	// worker()
}
