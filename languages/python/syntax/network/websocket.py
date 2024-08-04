import websocket
import ssl
import _thread
import time

count = 5


def on_message(ws, message):
    # 在接收到服务器发送消息时调用
    print('Received: ' + message)


def on_open(ws):
    # 在和服务器建立完成连接时调用
    # 线程运行函数
    def gao():
        # 往服务器依次发送0-4，每次发送完休息0.01秒
        for i in range(5):
            time.sleep(0.01)
            msg = "{0}".format(i)
            ws.send(msg)
            print('Sent: ' + msg)
        # 休息1秒用于接收服务器回复的消息
        time.sleep(1)

        # 关闭Websocket的连接
        ws.close()
        print("Websocket closed")

    # 在另一个线程运行gao()函数
    _thread.start_new_thread(gao, ())


if __name__ == "__main__":
    # websocket.enableTrace(True)
    ws = websocket.WebSocketApp("wss://echo.websocket.org/", on_message=on_message, on_open=on_open)
    ws.run_forever()

    # ws = websocket.WebSocketApp("wss://api.gemini.com/v1/marketdata/btcusd?top_of_book=true&offers=true",
    #                             on_message=on_message)
    # ws.run_forever(sslopt={"cert_reqs": ssl.CERT_NONE})
