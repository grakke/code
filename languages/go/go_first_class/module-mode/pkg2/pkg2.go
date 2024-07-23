package pkg2

import (
	"fmt"

	_ "github.com/grakke/module-mode/pkg3"
)

func init() {
	fmt.Println("I'm pkg2")
}
