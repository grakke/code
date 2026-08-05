# CODEBUDDY.md This file provides guidance to CodeBuddy when working with code in this repository.

## 项目概述

`gin-demo` 是一个基于 Go 语言 [gin](https://github.com/gin-gonic/gin) 框架的示例项目，源自 Go 官方教程《Developing a RESTful API with Go and Gin》。当前处于起步阶段：业务代码全部集中在 `main.go` 的单文件中，使用内存切片（`albums`）模拟数据存储，尚未引入数据库、分层架构或测试。

虽然项目目前仍是单文件 demo，但本仓库已配置 `.codebuddy/rules/project.mdc` 中规定了一套完整的 Go 后端开发规范（见下文“约定与规范”），后续扩展功能时应严格遵循分层架构。

## 常用命令

### 运行服务

```sh
go run .
```

启动后默认监听 `:8080`（gin 默认端口）。

### 构建二进制

```sh
go build -o gin-demo .
```

### 拉取/整理依赖

```sh
go mod tidy
```

### 运行测试

```sh
go test ./...
```

### 运行单个测试

```sh
go test -run TestXxx ./path/to/package
```

将 `TestXxx` 替换为具体测试函数名。

### 静态检查（vet）

```sh
go vet ./...
```

### 手动验证 API（来自 README）

```sh
curl http://localhost:8080/albums
curl http://localhost:8080/albums \
    --include --header "Content-Type: application/json" \
    --request "POST" \
    --data '{"id": "4","title": "The Modern Sound of Betty Carter","artist": "Betty Carter","price": 49.99}'
```

## 代码架构

### 当前结构（单文件 demo）

整个应用逻辑位于 `main.go` 的 `main` 包中，包含：

- **数据模型 `album`**：带 JSON tag 的结构体（`ID`、`Title`、`Artist`、`Price`）。
- **内存数据源 `albums`**：包级 `[]album` 切片，预置 3 条记录，作为临时“数据库”。
- **路由注册**：在 `main()` 中直接通过 `mux.GET/POST` 绑定处理函数，并按层级分组：
  - 顶层：`/ping`、`/pong`、`/ping/hello`、`/about`、`/albums`（GET/POST）、`/albums/:id`（GET）。
  - `system/auth` 组：`/addRole`、`/removeRole`。
  - `user/auth` 组：`/login`、`/register`。
- **全局中间件**：`mux.Handlers` 设置了两个匿名日志中间件（`log 1`/`log 2`），对所有路由生效。
- **Handler 函数**：`getAlbums`、`postAlbums`、`getAlbumByID` 直接操作内存切片并返回 JSON。

注意：当前 demo 中所有 handler 都属于 Controller 角色，业务逻辑与数据存储耦合在同一处，**不符合**项目规范要求的分层架构。

### 目标架构（按项目规范）

`.codebuddy/rules/project.mdc` 规定后续开发必须采用以下分层，新增功能时应按此拆分 `main.go` 中的逻辑：

```
Controller  →  Service  →  Repository  →  Model
```

- **Controller 层**：只做参数校验和响应封装，不写业务逻辑；所有对外 API 必须带 Swagger 注解。
- **Service 层**：承载业务逻辑，**禁止直接写 SQL**。
- **Repository 层**：唯一允许操作数据库的地方。
- **Model 层**：定义数据模型/表结构。

另外，按记忆约定，所有 API 返回应统一使用 `pkg/response` 包的标准格式（该包当前尚未创建）。

### 路由分组约定

现有代码已体现 gin 的嵌套 `Group` 模式（父组 `.Group()` 派生子组），新增模块应沿用该模式组织路径，而非把所有路由平铺在根。

## 约定与规范（来自 .codebuddy/rules/project.mdc）

以下规则对后续提交强制生效，编写代码前务必遵守：

- **架构红线**：严格分层；Controller 不写业务；数据库操作只走 Repository；对外 API 必须含 Swagger 注解。
- **代码风格**：函数/方法有中文简要注释；错误不得用 `_` 忽略，必须显式处理或上抛；变量 `camelCase`、常量 `ALL_CAPS`；单函数不超过 80 行。
- **安全策略**：数据库变更优先生成 SQL 脚本而非直接执行；涉及数据库结构修改须先确认；敏感配置（密钥、连接串）经配置中心读取，禁止硬编码。
- **开发行为**：新增功能前先分析现有代码、优先复用；变更范围最小化（一次 PR 解决一个问题）；每次变更附清晰 commit 信息；新增功能须同步写单元测试。

## 个人偏好

- 回复与代码注释使用中文；优先使用 Go 标准库；变量命名 `camelCase`。
