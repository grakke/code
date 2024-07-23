package pkg3

import "fmt"

var _ = constInitCheck()

const (
	d1 = "d1"
	d2 = "d2"
)

func constInitCheck() string {
	if d1 != "" {
		fmt.Println("pkg3: const d1 has been initialized")
	}
	if d2 != "" {
		fmt.Println("pkg3: const d2 has been initialized")
	}
	return ""
}

func init() {
	fmt.Println("I'm pkg3")
}
