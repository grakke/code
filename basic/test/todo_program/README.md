# [测试示例](https://github.com/dreamhead/geektime-todo/)

## 框架

- Mockito
  - 断言程序库 AssertJ，API 是流畅风格的 API（Fluent API）

```sh
# 生成 IDEA 工程
./gradlew idea

# 检查
./gradlew check

# 数据库迁移
./gradlew migrate

# 生成构建产物
./gradlew build

# 生成发布包
## 对于 CLI 项目，运行如下命令
./gradlew uberJar

## 在 todo-cli/build/libs 下就会生成一个 Uber JAR，可以独立运行的
java -jar todo-uber-<version>.jar
```
