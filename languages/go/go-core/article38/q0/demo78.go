package main

import (
	"bytes"
	"fmt"
)

func main() {
	// 示例1。
	var buffer1 bytes.Buffer
	contents := "Simple byte buffer for marshaling data."
	fmt.Printf("Write contents %q ...\n", contents)
	buffer1.WriteString(contents)
	fmt.Printf("The length of buffer: %d\n", buffer1.Len())
	// bytes.Buffer does not have a Cap() method; capacity is implementation-dependent.
	fmt.Println()

	// 示例2。
	p1 := make([]byte, 7)
	n, err := buffer1.Read(p1)
	if err != nil {
		fmt.Printf("Error reading from buffer: %v\n", err)
		return
	}
	fmt.Printf("%d bytes were read. (call Read)\n", n)
	fmt.Printf("The length of buffer: %d\n", buffer1.Len())
	// bytes.Buffer has no exported Cap() method. Show capacities using cap().
	fmt.Printf("The capacity of destination slice p1: %d\n", cap(p1))
	fmt.Printf("The capacity of buffer's unread bytes slice: %d\n", cap(buffer1.Bytes()))
}
