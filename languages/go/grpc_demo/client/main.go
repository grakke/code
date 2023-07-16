package main

import (
	"crypto/tls"
	"crypto/x509"
	"io/ioutil"
	"log"
	"net/rpc"
)

type Result struct {
	Num, Ans int
}

func main() {
	// http 1.1
	// client, _ := rpc.DialHTTP("tcp", "localhost:1234")

	// 跳过鉴权
	// config := &tls.Config{
	// 	InsecureSkipVerify: true,
	// }
	// conn, _ := tls.Dial("tcp", "localhost:1234", config)
	// defer conn.Close()
	// client := rpc.NewClient(conn)

	// 添加鉴权
	certPool := x509.NewCertPool()
	certBytes, err := ioutil.ReadFile("./../server/server.crt")
	if err != nil {
		log.Fatal("Failed to read server.crt")
	}
	certPool.AppendCertsFromPEM(certBytes)

	config := &tls.Config{
		RootCAs: certPool,
	}

	conn, _ := tls.Dial("tcp", "localhost:1234", config)
	defer conn.Close()
	client := rpc.NewClient(conn)

	// 同步 sync
	var result Result
	if err := client.Call("Cal.Square", 12, &result); err != nil {
		log.Fatal("Failed to call Cal.Square. ", err)
	}
	log.Printf("%d^2 = %d", result.Num, result.Ans)

	// 异步 sync
	// asyncCall := client.Go("Cal.Square", 12, &result, nil)
	// log.Printf("%d^2 = %d", result.Num, result.Ans)
	// time.Sleep(3 * time.Second)

	// <-asyncCall.Done
	// log.Printf("%d^2 = %d", result.Num, result.Ans)
}
