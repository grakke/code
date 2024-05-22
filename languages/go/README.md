# Golang

## [](tour/)

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

## [Golong syntax guide](syntax/)

## 论坛 Go Web Programming

- [chitchat](./chitchat/)

```sh
goi18n extract -outdir=locales -format=json messages.go
```
