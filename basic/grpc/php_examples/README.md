# gRPC PHP examples

- Install the grpc extension
- supports protocol buffers out-of-the-box. You will need the following things to get started:
  - protoc: the protobuf compiler binary to generate PHP classes for your messages and service defainition.
    - C Extension
      - `pecl install protobuf-{VERSION}.tgz`
    - PHP Package `google/protobuf`
  - grpc_php_plugin_binary: a plugin for protoc to generate the service stub classes.
    - grpc_php_plugin_binary 需要拉取全部仓库，才能生成，无法更新生成文件
  - protobuf.so: the protobuf extension runtime library.
    - `pecl install protobuf`

```sh
pecl install grpc

git clone -b RELEASE_TAG_HERE https://github.com/grpc/grpc
cd grpc
git submodule update --init
mkdir -p cmake/build
cd cmake/build
cmake ../..
make protoc grpc_php_plugin_binary
bazel build @com_google_protobuf//:protoc
bazel build src/compiler:grpc_php_plugin_binary
```

## 试验

- 修改定义文件后，没有 grpc_php_plugin_binary 无法更新生成文件

```sh
php -f greeter_server.php
php -f greeter_client.php
```
