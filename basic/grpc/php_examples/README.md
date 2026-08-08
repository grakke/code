# gRPC PHP examples

- Install the grpc extension
- supports protocol buffers out-of-the-box. You will need the following things to get started:
  - protoc: the protobuf compiler binary to generate PHP classes for your messages and service defainition.
    - C Extension
      - `pecl install protobuf-{VERSION}.tgz`
    - PHP Package `google/protobuf`
  - grpc_php_plugin_binary: a plugin for protoc to generate the service stub classes.
  - protobuf.so: the protobuf extension runtime library.
    - `pecl install protobuf`

```sh
pecl install grpc

bazel build @com_google_protobuf//:protoc
bazel build src/compiler:grpc_php_plugin_binary
```