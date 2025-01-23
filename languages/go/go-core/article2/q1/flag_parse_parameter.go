package main

import (
	"flag"
	"fmt"
)

var name string
var address = flag.String("address", "everywhere", "The greeting address.")

func init() {
	flag.StringVar(&name, "name", "everyone", "The greeting object.")
}

func main() {
	flag.Parse()
	fmt.Printf("Hello, %s! from %s \n", name, *address)
}
