FROM golang:1.22 AS dependencies
ENV GOPROXY=https://goproxy.cn,direct
WORKDIR /go/src/app
COPY go.mod .
#COPY ../../go.sum .
RUN --mount=type=ssh go mod download

# 第二阶段：构建可执行文件
FROM golang:1.22 AS builder
WORKDIR /go/src/app
COPY . .
#COPY --from=dependencies /go/pkg /go/pkg
RUN go build

# 第三阶段：部署
FROM debian:bookworm-20241016-slim
# RUN apt-get update && apt-get install -y curl
COPY --from=builder /go/src/app/k8s-combat /go/bin/k8s-combat
ENV PATH="/go/bin:${PATH}"

# 启动 Go 程序
CMD ["k8s-combat"]