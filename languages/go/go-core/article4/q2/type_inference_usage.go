package main

import (
	"flag"
	"fmt"
)

func main() {
	var name = getTheFlag()

	flag.Parse()
	fmt.Printf("Hello, %v!\n", *name)
}

// func getTheFlag() *string {
// 	return flag.String("name", "everyone", "The greeting object.")
// }

func getTheFlag() *int {
	return flag.Int("num", 1, "The number of greeting object.")
}
