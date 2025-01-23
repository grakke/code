package lib

import (
	in "go-core/article3/q4/lib/internal"
	"os"
)

func Hello(name string) {
	in.Hello(os.Stdout, name)
}
