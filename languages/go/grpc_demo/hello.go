package main

import "fmt"
import "rsc.io/quote"
import greetings2 "greetings"

func main() {
	fmt.Println("Hello World!")
	fmt.Println(quote.Go())
	message := greetings2.Hello("Gladys")
	fmt.Println(message)
}
