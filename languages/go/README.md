# Golang

## [A Tour of Go](tour/)

- <https://go.dev/tour/>
- <https://golang.google.cn/>
- 基础
  - 包、变量与函数 学习 Go 程序的基本构成
  - 流程控制语句：for、if、else、switch 和 defer
    - 学习如何使用条件、循环、分支和推迟语句来控制代码的流程。
  - 更多类型：结构体、切片和映射
    - 学习如何基于现有类型定义新的类型：本节课涵盖了结构体、数组、切片和映射
- 方法和接口
  - 学习如何为类型定义方法；如何定义接口；以及如何将所有内容贯通起来。
  - 方法和接口 包含了方法和接口，这种构造可以用来定义对象及其行为。
- 泛型
  - 学习如何在 Go 函数和结构体中使用类型参数。
  - 泛型
    - Go 通过类型参数来支持泛型编程
- 并发
  - 概览 goroutine 和 channel，以及如何使用它们来实现不同的并发模式

## [Go语言第一课](go_first_class/) Tony Bai

- 09 bookstore
- 27 instrument_trace
  - `go build github.com/grakke/instrument_trace/cmd/instrument`
  - `./instrument -w  examples/demo/demo.go`
- 33 [go-channel-operation-benchmark](./go_first_class/go-channel-operation-benchmark/)
- 35
  - [workerpool](./go_first_class/workerpool/)
- 37|38 [tcp-server-demo](./go_first_class/tcp-server/)

```sh
curl -X POST -H "Content-Type:application/json" localhost:8080/book -d '{"id": "978-7-111-55842-2", "name": "The Go Programming Language","authors":["Alan A.A.Donovan", "Brian W. Kergnighan"],"press":"Pearson Education"}'

curl -X GET -H "Content-Type:application/json" localhost:8080/book/978-7-111-55842-2

{"id":"978-7-111-55842-2","name":"The Go Programming Language","authors":["Alan A.A.Donovan"]}

go test mutex_test.go  -test.bench=".*"  -cpu='2,8,16,32'
```

## [Go语言核心36讲](core/) 郝林

## [Golang syntax guide](./syntax/)

```sh
go test -gcflags=all=-l -coverprofile=coverage.out
go tool cover -html=coverage.out
```

## 论坛 Go Web Programming

- [chitchat](./chitchat/)

```sh
goi18n extract -outdir=locales -format=json messages.go
```

## [Learn Go with tests](https://studygolang.gitbook.io/learn-go-with-tests)

```sh
curl -X POST http://localhost:5000/players/Pepper
curl http://localhost:5000/players/Pepper
```
