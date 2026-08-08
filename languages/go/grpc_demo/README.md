# Examples

The following examples are provided to help users get started with gRPC-Go.
They are arranged as follows:

`data` is a directory containing data used by the examples, e.g. TLS certificates.

##`helloworld` - a simple example showing a basic client and server

```sh
go run greeter_server/main.go
go run greeter_client/main.go

# Update the gRPC service
protoc --go_out=. --go_opt=paths=source_relative \
    --go-grpc_out=. --go-grpc_opt=paths=source_relative \
    helloworld/helloworld.proto
```

##`routeguide` - a more complicated example showing different types of streaming RPCs

##`features` - a collection of examples, each focused on a single gRPC feature
