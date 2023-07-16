package main

import (
	"log"

	"google.golang.org/grpc"
)

func main() {
	grpc.NewServer()

	// test := &Student{
	// 	Name:   "geektutu",
	// 	Male:   true,
	// 	Scores: []int32{98, 85, 88},
	// }
	// data, err := proto.Marshal(test)
	// if err != nil {
	// 	log.Fatal("marshaling error: ", err)
	// }
	// newTest := &Student{}
	// err = proto.Unmarshal(data, newTest)
	// if err != nil {
	// 	log.Fatal("unmarshaling error: ", err)
	// }
	// // Now test and newTest contain the same data.
	// if test.GetName() != newTest.GetName() {
	// 	log.Fatalf("data mismatch %q != %q", test.GetName(), newTest.GetName())
	// }

	cal := new(Cal)
	var result Result
	cal.Square(11, &result)
	log.Printf("%d^2 = %d", result.Num, result.Ans)
}
