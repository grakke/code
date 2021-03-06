# Generated by the gRPC Python protocol compiler plugin. DO NOT EDIT!
import grpc

import receiver_pb2 as receiver__pb2


class ReceiverStub(object):
  """服务定义
  """

  def __init__(self, channel):
    """Constructor.

    Args:
      channel: A grpc.Channel.
    """
    self.receive = channel.unary_unary(
        '/Receiver/receive',
        request_serializer=receiver__pb2.Event.SerializeToString,
        response_deserializer=receiver__pb2.Reply.FromString,
        )


class ReceiverServicer(object):
  """服务定义
  """

  def receive(self, request, context):
    # missing associated documentation comment in .proto file
    pass
    context.set_code(grpc.StatusCode.UNIMPLEMENTED)
    context.set_details('Method not implemented!')
    raise NotImplementedError('Method not implemented!')


def add_ReceiverServicer_to_server(servicer, server):
  rpc_method_handlers = {
      'receive': grpc.unary_unary_rpc_method_handler(
          servicer.receive,
          request_deserializer=receiver__pb2.Event.FromString,
          response_serializer=receiver__pb2.Reply.SerializeToString,
      ),
  }
  generic_handler = grpc.method_handlers_generic_handler(
      'Receiver', rpc_method_handlers)
  server.add_generic_rpc_handlers((generic_handler,))
