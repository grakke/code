package main

import (
	"fmt"
	"os"
	"strconv"
)

func main() {
	//fmt.Printf("%g\n", BoilingC-FreezingC) // "100" °C
	//boilingF := CToF(BoilingC)
	//fmt.Printf("%g\n", boilingF-CToF(FreezingC)) // "180" °F
	////fmt.Printf("%g\n", boilingF-FreezingC)       // compile error: type mismatch
	//
	//c := FToC(212.0)
	//fmt.Println(c.String()) // "100°C"
	//fmt.Printf("%v\n", c)
	//fmt.Printf("%s\n", c)
	//fmt.Println(c)
	//fmt.Printf("%g\n", c)
	//fmt.Println(float64(c)) // "100"; does not call String

	for _, arg := range os.Args[1:] {

		t, err := strconv.ParseFloat(arg, 64)
		if err != nil {
			fmt.Fprintf(os.Stderr, "cf: %v\n", err)
			os.Exit(1)
		}
		f := tempconv.Fahrenheit(t)
		c := tempconv.Celsius(t)
		fmt.Printf("%s = %s, %s = %s\n",
			f, tempconv.FToC(f), c, tempconv.CToF(c))
	}
}
