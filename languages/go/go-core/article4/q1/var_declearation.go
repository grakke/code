package main

import (
	"flag"
	"fmt"
)

func main() {
	var name string
	flag.StringVar(&name, "name", "everyone", "The greeting object.")

	// 方式1
	// var name = flag.String("name", "everyone", "The greeting object.")

	// 方式2
	// name := flag.String("name", "everyone", "The greeting object.")

	flag.Parse()
	fmt.Printf("Hello, %v!\n", name)

	// 适用于方式1和方式2
	// fmt.Printf("Hello, %v!\n", *name)
}
