# Golang

## [Go语言第一课](go_first_class/) Tony Bai

- bookstore

```sh
curl -X POST -H "Content-Type:application/json" localhost:8080/book -d '{"id": "978-7-111-55842-2", "name": "The Go Programming Language","authors":["Alan A.A.Donovan", "Brian W. Kergnighan"],"press":"Pearson Education"}'

curl -X GET -H "Content-Type:application/json" localhost:8080/book/978-7-111-55842-2

{"id":"978-7-111-55842-2","name":"The Go Programming Language","authors":["Alan A.A.Donovan"]}
```

## [Go语言核心36讲](core/) 郝林
