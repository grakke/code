# [20种不同并发模型示例](https://github.com/newland2024/MyEchoServer)

本仓库通过c++语言，使用了20种不同的并发模型实现了回显服务，并设计实现了简单的应用层协议。<https://mp.weixin.qq.com/s/aTYie9PHcoXRYYmmIGaOXA>

## 预备工作

- 常见的I/O模型
  - 阻塞I/O
    - 只要I/O暂不可用，读写操作就会被阻塞，直到I/O可用为止，在被阻塞期间，当前进程是被挂起的
    - 无法充分的使用CPU，导致并发效率低下
  - 非阻塞I/O
    - 读写操作都是立即返回，当前进程并不会被挂起，可以充分的使用CPU
    - 非阻塞I/O通常会和多路I/O复用配合着一起使用，实现多个客户端请求的并发处理
  - 多路I/O复用
    - 实现多个客户端连接的同时监听，大大提升了程序感知客户端连接可读写状态变化的效率
    - 在Linux下多路I/O复用的系统调用为select、poll、epoll
  - 信号驱动I/O
    - 通过注册SIGIO信号的处理函数实现了一个I/O就绪的通知机制，在SIGIO信号的处理函数再进行读写操作，避免了低效的I/O是否就绪的轮询操作
    - 在信号处理函数中是不能调用异步信号不安全的函数，例如，有锁操作的函数就是异步信号不安全的，故信号驱动I/O应用的并不多。
  - 异步I/O
    - 先向操作系统注册读写述求，然后就立马返回，进程不会被挂起。操作系统在完成读写操作之后，再调用进程之前注册读写述求时指定的回调函数，或者触发指定的信号。
  - 阻塞I/O、非阻塞I/O、多路I/O复用、信号驱动I/O都是同步IO
    - 同步I/O和异步I/O的区别在于，是否需要进程自己再调用I/O读写函数。同步I/O需要，异步I/O不需要

## 目录结构

- common是公共代码的目录
  - codec.hpp 协议的编解码实现
  - packet.hpp 共享的二进制缓冲区 文件中实现
  - 命令行参数解析实现 在cmdline.h和cmdline.cpp文件
  - 协程池实现 在coroutine.h和coroutine.cpp文件
    - 通过getcontext、makecontext、swapcontext这三个库函数来实现，并且通过C++11的模版函数和可变参数模板的特性，实现了支持变参列表的协程创建函数
- BenchMark 基准性能压测工具的代码目录
  - 用多线程+Reactor的并发模型来实现。发起请求的每个线程都是一个单独的Reactor模型
  - Reactor是一种事件监听和分发模型，配合epoll可以实现高效的并发处理，从而能充分的利用CPU，即使是单线程也能产生足够大的请求负载
  - 特性
    - 支持对监听在指定的ip和port的服务发起压测。
    - 支持多线程压测，并可以指定使用的线程数。
    - 支持指定客户端连接建立成功之后，最多可以发起多少次请求。（ps：这个选项值如果设置为1，则请求就退化成通过短连接来完成）
    - 支持指定请求包的大小，单位为字节。
    - 支持指定每个线程下发起请求的客户端并发连接数。
    - 支持指定总的压测时间，单位秒。
    - 支持指定压测能产生的最大的流量负载，单位qps。
    - 支持debug模式
  - 结果数据
    - 接口的pct50、pct95、pct99和pct999的耗时数据。
    - 请求成功数、请求失败数、尝试建立连接数、连接失败数、读失败数和写失败数
    - 客户端连接数和请求成功的qps数
    - 请求失败率和连接失败率
- ConcurrencyModel 20种不同并发模型的代码目录
  - SingleProcess
  - MultiProcess
  - MultiThread
  - ProcessPool1
  - ProcessPool2
    - 前面的进程池并发模型中，所有的子进程都会调用accept函数来接受新的客户端连接。这种方式存在竞争，当客户端新的连接到来时，多个子进程之间会争夺接受连接的机会。在操作系统内核2.6版本之前，所有子进程都会被唤醒，但只有一个可以accept成功，其他失败，并设置EGAIN错误码。导致不必要的系统调用，降低系统的性能。
    - 在内核2.6版本及之后，新增了互斥等待变量，只有一个子进程会被唤醒，减少了不必要的系统调用，提高了系统的性能。这种方式称为"惊群"问题的解决方案可以有效地避免不必要的系统调用，提高系统的并发处理能力
    - 虽然内核2.6版本及之后只有一个子进程被唤醒，但仍然存在互斥等待，这种方式并不够优雅。可以使用socket套接字的SO_REUSEPORT选项，让多个进程同时监听在相同的网络地址（IP+Port）上，内核会自动在多个进程之间做连接的负载均衡，而不存在互斥等待行为，从而提高系统的性能和可靠性
  - ThreadPool
  - LeaderAndFollower
    - 一开始所有线程都是follower 竞争上岗，有一个线程成为leader。leader线程会监听客户端连接的到来，接受到客户端的连接时会放弃领导权，由其他follower去竞争。此时leader线程变成worker线程，为新来的客户端提供服务
  - Select
    - select函数存在天然的缺陷，因为select函数最多支持对1024个文件描述的事件进行监听，且文件描述符的值必须小于1024，而1024这个值是由FD_SETSIZE 宏来决定
  - Poll
    - poll函数在没有触碰到系统其他限制之前，理论上只要内存充足，则可以支持监听的文件描述符数量是没有上限的
  - Epoll
    - epoll是poll的一种变种，通过事件注册和通知机制，有效提升了事件监听效率，并且对更大数量文件描述符的监听有更好的可扩展性。相比于poll和select 更加高效，能够处理更多的连接
  - SelectReactorSingleProcess 用select函数实现Reactor的并发模型
  - PollReactorSingleProcess
  - EpollReactorSingleProcess 用 epoll 默认的水平触发模式
  - EpollReactorSingleProcessET 用 epoll 的边缘模式来实现
    - 同上一个示例的区别在于读写事件的监听都会切换成边缘模式
    - 特别注意 启用边缘模式时，每次I/O的读写都要执行多次读写，直到返回EAGAIN 或者 EWOULDBLOCK 的错误码为止
  - EpollReactorSingleProcessCoroutine 使用协程池配合epoll来实现
    - 创建了一个大小为5000的协程池。在处理客户端的请求时会单独创建一个协程来为客户端服务，在协程中如果遇到读写暂不可用，则会退出当前协程的执行，切换回主协程中执行，等到读写可用时再唤醒协程的执行
  - EpollReactorProcessPoolMS
    - Reactor并发模型还有一种变种，将客户端连接的接受放在单独的MainReactor中，MainReactor再将客户端连接移交给SubReactor进行读写操作的处理。使用单独的线程来接受客户端连接可以更快地为新的客户端提供服务，因为同时处理的客户端连接数更多，从而提高了请求处理的并发度，从而更好地利用了CPU
  - EpollReactorProcessPoolCoroutine Reactor-单进程协程池的并发模型存在进程池的版本
  - EpollReactorThreadPool
  - EpollReactorThreadPoolHSHA Reactor-HSHA的变种
  - EpollReactorThreadPoolMS
- test目录为单元测试代码的目录

```sh
.
├── BenchMark
│   ├── benchmark.cpp
│   ├── client.hpp
│   ├── clientmanager.hpp
│   ├── makefile
│   ├── percentile.hpp
│   ├── stat.hpp
│   └── timer.hpp
├── ConcurrencyModel
│   ├── Epoll
│   ├── EpollReactorProcessPoolCoroutine
│   ├── EpollReactorProcessPoolMS
│   ├── EpollReactorSingleProcess
│   ├── EpollReactorSingleProcessCoroutine
│   ├── EpollReactorSingleProcessET
│   ├── EpollReactorThreadPool
│   ├── EpollReactorThreadPoolHSHA
│   ├── EpollReactorThreadPoolMS
│   ├── LeaderAndFollower
│   ├── MultiProcess
│   ├── MultiThread
│   ├── Poll
│   ├── PollReactorSingleProcess
│   ├── ProcessPool1
│   ├── ProcessPool2
│   ├── Select
│   ├── SelectReactorSingleProcess
│   ├── SingleProcess
│   └── ThreadPool
├── common
│   ├── cmdline.cpp
│   ├── cmdline.h
│   ├── codec.hpp
│   ├── conn.hpp
│   ├── coroutine.cpp
│   ├── coroutine.h
│   ├── epollctl.hpp
│   ├── packet.hpp
│   └── utils.hpp
├── readme.md
└── test
    ├── codectest.cpp
    ├── coroutinetest.cpp
    ├── makefile
    ├── packettest.cpp
    ├── unittestcore.hpp
    └── unittestentry.cpp
```

## 压测结果

- 单进程的并发模型性能是最差的
- 多进程和多线程的并发模型，由于能使用到多个CPU，所以性能有所提升，但是因为需要频繁的创建和销毁进程和线程，接口的pct50和pct95耗时较高。
- 进程池1和进程池2的并发模型，由于没有频繁的创建和销毁进程和线程的损耗，性能比多进程和多线程的并发模型高，接口的pct50和pct95耗时也更低。
- 进程池2并发模型接口的pct999耗时比进程池1并发模型的高出不少，这个是因为进程池2的并发模型是由操作系统来做负载均衡的，但这个策略并无法保证对流量负载做完美的均分，导致接口长尾的耗时较高，而进程池1的并发模型是多进程抢锁，每个进程的流量负载会更均衡，但因为有锁，所以进程池1的并发模型性能比进程池2的并发模型低一些。
- 线程池的并发模型和进程池2的并发模型，性能差异并不是很大，因为线程池的并发模型也是由操作系统来做负载均衡的，所以存在接口长尾的耗时较高的情况。
- 领导者/跟随者的并发模型和进程池1的并发模型很相似，这两个模型所有的指标都差异很小，领导者/跟随者的并发模型可以看到显式的使用锁，而进程池1的并发模型没有
- select函数的性能明显是没有poll函数和epoll函数性能好的，在客户端连接数不多的情况下epoll并没有明显的优势
- 在大量客户端连接的情况下，poll函数的性能是明显不如epoll函数的
- ET模式下的epoll并不比LT模式下的epoll性能高，协程池的并发模型性能和其他的三个并发模型性能差异不大，协程池的并发模型因为多了协程的切换，导致接口耗时会更大
- 直接写的方式，比直接切换写监听的性能要高出4%左右，这是因为通常客户端连接大概率的可写的，不用再额外的先切换到写的监听

```sh
# 一个线程、单个请求包1k、单客户端单次最多请求40次、64个客户端、压测60秒、限频20万qps
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 1 -max_req_count 40 -pkt_size 1024 -client_count 64 -run_time 60 -rate_limit 200000

# IO复用模型对比
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 1 -max_req_count 40 -pkt_size 256 -client_count 2000 -run_time 30 -rate_limit 200000

BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 512 -client_count 8000 -run_time 30 -rate_limit 200000

# EPOLL下LT模式、ET模型和协程池对比
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 4096 -client_count 250 -run_time 30 -rate_limit 200000
# EPOLL下直接写和直接切换写监听对比
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 512 -client_count 250 -run_time 60 -rate_limit 200000

# HSHA模式下worker线程和io线程写应答对比
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 4096 -client_count 250 -run_time 30 -rate_limit 200000

# MS模式下MainReactor线程是否监听可读事件对比
# EpollReactorThreadPoolMS使用1个MainReactor线程和1个SubReactor线程来运行。
# 长连接压测命令：
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 4096 -client_count 250 -run_time 30 -rate_limit 200000

# 短连接压测命令：
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1 -pkt_size 4096 -client_count 250 -run_time 30 -rate_limit 200000

# EPOLL下动态和固定超时时间对比
# EpollReactorSingleProcessCoroutine两种不同模式（是否使用动态超时时间）进行了压测。
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 4096 -client_count 1000 -run_time 60 -rate_limit 200000

# EPOLL下进程池或者线程池对比
# 长连接压测命令：
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1000000 -pkt_size 512 -client_count 500 -run_time 60 -rate_limit 1000000

# 短连接压测命令：
BenchMark -ip 0.0.0.0 -port 1688 -thread_count 4 -max_req_count 1 -pkt_size 512 -client_count 500 -run_time 60 -rate_limit 1000000
```
