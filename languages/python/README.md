# Python

- 语言简洁

## 语法

- 数据结构
  - 基础数据类型
  - list && tuple
  - dict && set
  - iterator && generator
- 控制语句
- 函数
- 网络编程
- oop
- 函数式编程
- 模块
  - 有效 Python 模块 文件夹中有一个 `__init__.py` 文件

## 表现层状态转化 representational state transfer REST

## scrapy

- todo: 配置 mongo

```sh
scrapy crawl douban_spider
scrapy crawl douban_spider -o douban.csv
```

## 数据结构

- hash
  - 通过散列函数计算键的散列值，值是唯一的，查找 1
  - 冲突：不是将值放到格子里，而是放到该格子所关联的数组里
    - 查找：线性地在该数组中，检查每个子数组的索引 0 位置，如果碰到要找的词("dab")， 就返回该子数组的索引 1 的值
  - 负载因子：数量量与存储空间比值

## 算法

### 递归

- 递归只是让解决方案更清晰，并没有性能上的优势
- 基线条件(base case) 指的是函数不再调用自己，从而避免形成无限循环
- 递归条件(recursive case)：函数调用自己

### BFS

- 通过图与队列实现
- 避免无限循环：标记为已检
  - 使用一个 列表来记录检查过的人
- 运行时间: O(人数 + 边数)，通常写作O(V + E)，其中V为顶点(vertice)数，E为边数

## Django

- [Django](https://developer.mozilla.org/zh-CN/docs/Learn/Server-side/Django)
- [HelloDjango - Django博客教程](https://www.zmrenwu.com/courses/hellodjango-blog-tutorial/)

### manage.py

- test 运行功能测试和单元测试

```shell script
django-admin.py startproject superlists
python manage.py startapp lists
python manage.py runserver

python manage.py makemigrations|showmigrations
# 创建真正的数据库
python manage.py migrate
python manage.py migrate --noinput

python manage.py test
python manage.py test lists
python manage.py test functional_tests
```

## 敏捷

- 不要预先做大量设计
  - 除了要花费大量时间收集需求之外，设计阶段还要用等量的时间在纸上规划软件
  - 在实践中解决问题比理论分析能学到更多，而且让应用尽早接 受真实用户的检验效果更好
  - 尽早把最简可用的应用放出来，根据实际使用中得到的反馈逐步向前推进设计
- “YAGNI”(读作 yag-knee) “You ain’t gonna need it” 不管想法有多好，大多数情况下最终用不到这个功能

## TDD

- 用户故事 User Story 从用户角度描述应用应该如何运行。用来组织功能测试
- 功能测试｜验收测试 acceptance test｜端到端测试 end-to-end test 使用 Selenium 实现的测试可以驱动真正的网页浏览器，能从用户的角度查看应用是如何运作的
  - 作用 跟踪用户故事(User Story)，模拟用户使用某个功能的过程，以及应用应该如何响应用户的操作
  - 最重要作用 从外部观察整个应用是如何运作的。另一个术语是黑箱测试(black box test)，因为这种测试对所要测试的系统内部一无所知
- TDD 常与敏捷软件开发方法结合在一起使用
  - 先写功能测试，从用户角度描述应用新功能
  - 功能测试失败后，想办法编写代码让它通过(或者说至少让当前失败的测试通过)。 此时，使用一个或多个单元测试定义希望代码实现的效果，保证为应用中的每一行代 码(至少)编写一个单元测试。
  - 单元测试失败后，编写最少量应用代码，刚好让单元测试通过。有时，要在第 2 步 和第 3 步之间多次往复，直到觉得功能测试有一点进展为止。
  - 再次运行功能测试，看能否通过，或者有没有进展。这一步可能促使编写一些新的单元测试和代码等
- MVP 最简可用的应用
- 功能测试 站在用户的角度从外部测试应用，单元测试 站在程序员角度从内部测试应用
  - 功能测试 从用户角度是一个用户故事
  - 单元测试 将用户故事拆分实现的步骤
  - 功能测试站在高层驱动开发，而单元测试则从低层驱动做些什么
  - 功能测试作用 帮助开发具有所需功能的应用，还能保证不会无意中破坏这些功能
  - 单元测试作用 帮助编写简洁无错代码
  - 功能测试是应用能否正常运行的最终评判，而单元测试只是整个开发过程中的一个辅助工具
- 不测试常量
  - 不要测试常量，而应该测试实现方式
- 重构时，修改代码或者测试，但不能同时修改
  - 把重构和功能调整完全分开来做
- 预见到问题时，要做出判 断，是停止正在做的事从头再来，还是暂时不管，以后再解决。有时完成手头的工作是可 以接受的做法，但有些时候问题可能很严重，必须停下来重新思考
- 一个测试只测试一件事
- 确保测试隔离，管理全局状态
  - 每次测试结束后都要还原永久状态
- 避免使用“含糊的”休眠
  - 使用重试循环，它可以轮询应用，尽早向前行进
- 不要依赖Selenium的隐式等待

## behave

```shell script
pip install allure-behave

behave -f allure_behave.formatter:AllureFormatter -o report ./features

allure serve report
```

## 工具

### Pycharm

- keymap
  - main 自动补全整个 main 从句
  - 句子最后增添.if 并点击 Tab 键，PyCharm 将修复该 if 条件句
  - True.while
  - run:Mac:Ctrl+Shift+R，在 Windows 或 Linux 系统中，使用快捷键 Ctrl+Shift+F10
  - 断点：Mac 系统中使用 Ctrl+Shift+D 键，在 Windows 或 Linux 系统中使用 Shift+Alt+F9 键
    - F8 执行当前代码行，并执行到下一行代码
    - 使用 F7 跳转到当前行内的函数
    - Debugger 标签
    - Console 标签
  - 测试： Settings/Preferences → Tools → Python Integrated Tools　选择 pytest
    - 创建测试:Mac 系统中使用 Shift+Cmd+T 键，在 Windows 或 Linux 系统中使用 Ctrl+Shift+T
    - 运行测试：Mac 系统中使用 Ctrl+R 键，在 Windows 或 Linux 系统中使用 Shift+F10 键
  - 搜索和导航
    - 在当前文件中搜索代码段：在 Mac 系统中使用 Cmd+F 键，在 Windows 或 Linux 系统中使用 Ctrl+F 键。
    - 在整个项目中搜索代码段：在 Mac 系统中使用 Cmd+Shift+F 键，在 Windows 或 Linux 系统中使用 Ctrl+Shift+F 键。
    - 搜索类：在 Mac 系统中使用 Cmd+O 键，在 Windows 或 Linux 系统中使用 Ctrl+N 键。
    - 搜索文件：在 Mac 系统中使用 Cmd+Shift+O 键，在 Windows 或 Linux 系统中使用 Ctrl+Shift+N 键。
    - 如果不知道要搜索的是文件、类还是代码段，则搜索全部：按两次 Shift 键
  - 导航
    - 前往变量的声明：在 Mac 系统中使用 Cmd 键，在 Windows 或 Linux 系统中使用 Ctrl 键，然后单击变量。
    - 寻找类、方法或文件的用法：使用 Alt+F7 键。
    - 查看近期更改：使用 Shift+Alt+C 键，或者在主菜单中点击 View → Recent Changes。
    - 查看近期文件：在 Mac 系统中使用 Cmd+E 键，在 Windows 或 Linux 系统中使用 Ctrl+E 键，或者在主菜单中点击 View → Recent Files。
    - 多次跳转后在导航历史中前进和后退：在 Mac 系统中使用 Cmd+[ / Cmd+] 键，在 Windows 或 Linux 系统中使用 Ctrl+Alt+Left / Ctrl+Alt+Right 键。

## Guidelines

### 代码规范

- PEP 8 规范
- 选择四个空格的缩进，不要使用 Tab
- 每行最大长度请限制在 79 个字符
- 空行规范:全局的类和函数的上方需要空两个空行，而类的函数之间需要空一个空行
- 函数的参数列表中会出现逗号，请注意逗号后要跟一个空格
- 冒号经常被用来初始化字典，冒号后面也要跟一个空格
- `#`后、注释前加一个空格
- 操作符两边都保留空格
- 过长
  - 号来将过长的运算进行封装，此时虽然跨行，但是仍处于一个逻辑引用之下。第二行参数和第一行第一个参数对齐
  - 通过换行符来实现

### 文档规范

- 所有 import 尽量放在开头
- 不要使用 import 一次导入多个模块

### 注释规范

- 英文注释:请注意开头大写及结尾标点，注意避免语法错误和逻辑错误，同时精简要表达的意思
- 文档描述

### 命名规范

- 变量使用小写，通过下划线串联起来
- 常量，最好的做法是全部大写，并通过下划线连接
- 函数名，同样也请使用小写的方式，通过下划线连接起来
- 类名，则应该首字母大写，然后合并起来

### 代码分解

- 不写重复代码
- 减少迭代层数，尽可能让代码扁平化
- 函数的粒度应该尽可能细，不要让一个函数做太多的事情。所以，对待一个复杂的函数，需要尽可能地把它拆分成几个功能简单的函数，然后合并起来
- 类拆分

### 优化

- 从一开始写代码时，就必须对功能和规范这两者双管齐下.功能完整和规范完整的优先级是不分先后的，应该是同时进行的

### 项目文档

- 统的概述，包括各个组成部分以及工作流程的介绍
- 每个组成部分的具体介绍，包括必要性、设计原理等等
- 系统的 performance，包括 latency 等等参数
- 主要说明如何对系统的各个部分进行修改，主要给出相应的 code pointer 及对应的测试方案

## 图书

- [Python 金融大数据分析 Python for Fianace](./pyhont_for_finance)

## 课程

- [Python 核心技术与实战](./python_core_action/)
- [Mooc](./mooc_tmc/)
