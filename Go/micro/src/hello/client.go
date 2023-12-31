package main

import (
	"context"
	"fmt"
	"github.com/micro/go-micro"
	proto "hello/proto"
)

func main() {
	// 创建一个新的服务
	service := micro.NewService(micro.Name("Greeter.Client"))
	// 初始化
	service.Init()

	// 创建 Greeter 客户端
	greeter := proto.NewGreeterService("go.micro.srv.greeter", service.Client())

	// 远程调用 Greeter 服务的 Hello 方法
	rsp, err := greeter.Hello(context.TODO(), &proto.HelloRequest{Name: "学院君"})
	if err != nil {
		fmt.Println(err)
	}

	// Print response
	fmt.Println(rsp.Greeting)
}
