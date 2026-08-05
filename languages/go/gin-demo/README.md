# Gin Demo

```sh
go mod init gin-demo
go get github.com/gin-gonic/gin
```

## [Tutorial: Developing a RESTful API with Go and Gin](https://go.dev/doc/tutorial/web-service-gin)

```sh
curl http://localhost:8080/albums

curl http://localhost:8080/albums \
    --include \
    --header "Content-Type: application/json" \
    --request "POST" \
    --data '{"id": "4","title": "The Modern Sound of Betty Carter","artist": "Betty Carter","price": 49.99}'
```


## 工具

- [Knot](https://github.com/ProjAnvil/Knot/) API 文档管理平台，帮助团队组织、记录和分享他们的 API 规范
  - Knot 平台是 CodeBuddy 生态的管理中枢，提供知识库、MCP、Rules、Skills、智能体等核心能力的统一管理