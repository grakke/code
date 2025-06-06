# PHP 学习记录

- Principle
    - 结构清晰
    - 示例达意
    - 不要模模糊糊
    - 不断迭代
    - 做好记录
- 实践
    - [Modern PHP](ModernPHP)

## [Syntax](syntax)

### Error & Exception

- error_reporting
    - E_ALL|-1 报告所有 PHP 错误
        - 0 关闭所有 PHP 错误报告
    - 位运算
        - 组合 E_ERROR | E_WARNING | E_PARSE | E_NOTICE
        - 排除 E_ALL ^ E_NOTICE
- 不同于 PHP 5 错误报告机制，PHP 7 中大多数错误被作为 Error 异常抛出
    - 这种 Error 异常可以像 Exception 那样被捕获
    - 如果没有对 Error 异常进行捕获，则调用全局异常处理器（通过 set_exception_handler 函数注册）处理
    - 如果全局异常处理器也没有注册，则按照传统错误报告方式处理
- display_errors 选项决定是否向用户显示错误报告和 Error 异常
    - 默认为 1，表示显示用户级错误
    - 设置为 0 则表示不显示用户级错误
- 错误指致命错误（Fatal Error，比如编译错误和语法错误），出现运行时错误后，程序无法继续往后执行，需要执行一些清理工作并记录日志后退出当前处理流程
- 异常:程序中出现的可预测的、可恢复的中轻度问题.出现异常后，可以对其进行捕获，或者抛给上层的业务代码处理，和错误报告类似
    - 如果通过 set_exception_hanlder 函数定义了全局异常处理器，则所有未处理异常会集中到这里处理
    - 如果没有定义任何处理异常的代码，最终会抛出一个 Fatal Error（也就是说，所有未处理异常都会被当作错误进行兜底处理）
- Throwable
    - Error
    - Exception

### [OOP](syntax/oop)

- 继承：子类通过继承访问父类属性和方法（protected 或者 public 方式定义）
    - 子类实例可以转化为父类
- 封装
    - 调用者无需关心对象方法实现细节
    - 通过访问控制限定属性和方法的可见性
- 多态
    - 子类可以重写父类方法，子类对象中调用该方法会自动转发到子类方法调用
- 抽象类 Abstract Class:包含抽象方法的类
    - 抽象方法 通过 abstract 关键字修饰的方法
    - 抽象方法只是一个方法声明，不能有具体实现
- 接口:可以定义多个方法声明，不能有任何实现，方法的可见性都应该是 public，因为--接口中的方法都要被其他类实现
    - 接口和抽象类一样不能被实例化只能被其他类实现
    - 和抽象类不同，接口中不包含任何具体的属性和方法，完全是待实现的「契约」，实现接口的类就相当于和它签了契约，必须要通过实现接口中声明的所有方法来履行契约
    - 通过接口类型定义方法中的参数类型约束，这样就可以传入实现该接口的对象实例进行实际的方法调用
    - 作为必须实现的契约保证：作为抽象类定义或者实现类的功能附加
- 只有接口和具体实现类两级结构，所有的实现类都要定义某个属性，破坏代码的复用性
    - 可以插入一个抽象类 BaseCar 作为中间层，来定义具体实现类的共有属性
    - 抽象类实现接口，接口方法声明为抽象方法就不需要在这一层实现，再让具体实现类继承抽象类并实现接口方法
    - 使用抽象类的好处是除了公共属性和方法这些可以被复用的代码外，对于接口中声明的方法可以直接通过抽象方法的方式抛给子类去实现，而不必在父类这一层级去实现
- 类型运算符 instanceof，用于判断某个对象实例是否实现了某个接口，或者是某个父类/抽象类的子类实例
- 对象组合水平扩展:在一个类中组合（或者说依赖）另一个类而不是继承另一个类来扩展功能
    - 契约声明，调用事项:考虑的是可以在对应方法中调用这个类型提供的某些方法，然后在调用该方法的地方传入的对象实例只要实现了这些方法即可，这样该方法就不会和具体的类绑定，提高了代码的扩展性和复用性
    -
  定义方法参数时设定一个类型约束，然后调用该方法时，支持传入不同类的对象实例，并且需要通过某种机制保证这些类都实现了方法参数设定类型约束需要实现的方法，就好像它们之间达成了某种「契约」一样，不同的类都按照契约履行合同，而履行的方式就是实现类型约束要求提供的方法，传入的对象实例就可以正常在方法体中使用而不会出错
- 通过接口解除对具体类的依赖
    - 依赖注入：构造函数 普通方法
- trait:一种通过组合水平扩展类功能的机制
    - 支持属性和方法以及可见性设置（private、protected、public），并且即使是 private 级别的方法和属性，依然可以在使用类中调用
    - 把 Trait 的所有代码组合到使用类，变成了使用类的一部分。从另一个角度来印证，就是 Trait 中定义的属性不能再使用类中重复定义
    - 介于类继承和标准对象组合之间的一种存在，就像抽象类是不完全的面向接口编程一样
    - 多个 Trait 中包含同名方法:直接报冲突错误
        - 声明替换
        - 起别名
- 静态属性和静态方法：无需对类进行实例化，可以直接调用
    - 不能通过 $this 调用非静态属性/方法,通过 self:: 引用当前类的静态属性和方法
    - 支持动态修改
    - 一个类中调用其他类的静态属性和方法，需要通过 完整类名:: 进行引用
    - 静态方法的继承和重写
    - self 指向的是定义时持有它的类而不是调用时的
    - 后期静态绑定（Late Static Bindings）针对的是静态方法的调用，使用该特性时不再通过 self:: 引用静态方法，而是通过
      static::. static 指向的是调用它的方法所在的类，而不是定义时
        - 如果是在定义它的类中调用，则指向当前类，和 self 功能一样
        - 如果是在子类或者其他类中调用，则指向调用该方法所在的类
- 对象序列化是一种持久化对象的方式，并且序列化对象只会保留对象属性
- 反序列化时，实际上是通过序列化字符串中的类名对这个类进行实例化，如果当前作用域下恰好包含了该类的定义，就可以在反序列化后的对象上调用对应的类方法，即便没有保存任何对象方法
- 魔术方法
    - __sleep() ：会在序列化方法 serialize 执行之前调用，以便在序列化之前对对象进行清理工作
    - __wakeup()：会在反序列化方法 unserialize 执行之前调用，以便准备必要的对象资源
    - __call:当在指定对象上调用一个不存在的成员方法时，则尝试调用该方法作为兜底
    - __callStatic:当在指定类上调用一个不存在的静态方法，则尝试调用该方法作为兜底
    - __set() 方法会在给不可访问属性赋值时调用
    - __get() 方法会在读取不可访问属性值时调用
    - __isset() 当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用,不可访问有两层意思
        - 属性的可见性不是 public
        - 对应属性压根不存在，以 __set() 和__get() 为例
    - __unset() 当对不可访问属性调用 unset() 时，__unset() 会被调用
    - _invoke 会在以函数方式调用对象时执行
    - __clone()：以 clone 关键字执行对象复制时，会调用这个方法,拷贝一个全新的对象.
        - 嵌套的对象属性依然存在这个互相影响的问题，因此，把引用赋值和 clone 拷贝统统称之为「浅拷贝」
        - 只有嵌套的对象属性也不相互污染的拷贝才是真正相互对立的「深拷贝」。要实现要用到 __clone 魔术方法
- 对象默认情况下通过引用传递:将一个对象 A 赋值给另一个对象 B 时，B 的属性值修改会同步到对象 A

### [PHP Objects, Patterns, and Practice](./Popp)

#### [设计模式](https://xueyuanjun.com/books/php-design-pattern)

- 创建型
    - 工厂方法模式 Factory Method 类实例化延迟到子类中
        - 类定义创建对象的接口，子类实例化具体类
    - 抽象工厂模式 Abstract Factory
        - 定义抽象功能的接口集合
        - 子类组合构建各自的对象
    - 简单工厂模式 Simple Factory
        - 实例化对象 不需要客户了解对象属于哪个具体的子类,根据参数获得对应的类实例，避免了直接实例化类
        - 需要知道所有要生成的类型，子类过多或者子类层次过多时不适合使用
    - 静态工厂模式 Static Factory
        - 与简单工厂类似，该模式用于创建一组相关或依赖的对象，不同之处在于静态工厂模式使用一个静态方法来创建所有类型的对象，该静态方法通常是
          factory 或 build
    - 对象池模式 Object Pool
        - 每次实例化数量较少情况下，使用对象池可以获得显著的性能提升
    - 原型模式 Prototype
        - 创建原型使用克隆方法实现对象创建而不是使用标准的 new 方式
    - 单例模式 Singleton
        - 保证在整个应用程序的生命周期中，任何一个时刻，单例类实例都只存在一个，同时这个类还必须提供一个访问该类的全局访问点
    - 建造者模式 Builder
        - 构建与表示分离
- 行为型
    - 责任链模式 Chain Of Responsibilities
        - 将处理请求的对象连成一条链，沿着这条链传递该请求，直到有一个对象处理请求为止，这使得多个对象都有机会处理请求
        - 可以降低系统的耦合度，简化对象的相互连接，同时增强给对象指派职责的灵活性，增加新的请求处理类也很方便
        - 缺点 不能保证请求一定被接收，且对于比较长的职责链，请求的处理可能涉及到多个处理对象，系统性能将受到一定影响，而且在进行代码调试时不太方便
    - 命令模式 Command
        - 将请求封装成对象，从而可用不同的请求对客户进行参数化；对请求排队或记录请求日志，以及支持可撤消的操作
    - 迭代器模式 Iterator
        - 提供一种方法访问一个容器（Container）对象中各个元素，而又不需暴露该对象的内部细节
    - 中介者模式 Mediator
        - 用一个中介对象来封装一系列的对象交互，中介者使各对象不需要显式地相互引用，从而使其耦合松散，而且可以独立地改变它们之间的交互
        - 通过中介对象来封装对象之间的关系，使之各个对象在不需要知道其他对象的具体信息情况下通过中介者对象来与之通信。
        -
      同时通过引用中介者对象来减少系统对象之间关系，提高了对象的可复用和系统的可扩展性。但是就是因为中介者对象封装了对象之间的关联关系，导致中介者对象变得比较庞大，所承担的责任也比较多。它需要知道每个对象和他们之间的交互细节，如果它出问题，将会导致整个系统都会出问题
    - 备忘录模式 Memento
        - 在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态，这样就可以在合适的时候将该对象恢复到原先保存的状态
    - 空对象模式 Null Object
        - 以前返回对象或 null 的方法现在返回对象或空对象 Null Object，减少代码中的条件判断
    - 观察者模式 Observer
        - 为对象实现发布/订阅功能：一旦主体对象状态发生改变，与之关联的观察者对象会收到通知，并进行相应操作
    - 规格模式 Specification
        - 组合模式的一种扩展。有时项目中某些条件决定了业务逻辑，这些条件就可以抽离出来以某种关系（与、或、非）进行组合，从而灵活地对业务逻辑进行定制
        - 在查询、过滤等应用场合中，通过预定义多个条件，然后使用这些条件的组合来处理查询或过滤，而不是使用逻辑判断语句来处理，可以简化整个实现逻辑。
        - 这里的每个条件就是一个规格，多个规格/条件通过串联的方式以某种逻辑关系形成一个组合式的规格
    - 状态模式 State
        - 当控制一个对象状态转换的条件表达式过于复杂时的情况。状态模式允许一个对象在其内部状态改变的时候改变其行为，把状态的判断逻辑转移到表示不同的一系列类当中，从而把复杂的逻辑判断简单化
        - 把所研究的对象的行为包装在不同的状态对象里，每一个状态对象都属于一个抽象状态类的一个子类
    - 策略模式 Strategy
    - 模板方法模式 Template Method
        - 一个方法中定义一个算法的骨架，而将一些步骤延迟到子类中。模板方法使得子类可以在不改变算法结构的情况下，重新定义算法中的某些步骤
    - 访问者模式 Visitor
        - 一个作用于某对象结构中的各元素的操作。它使你可以在不改变各元素的类的前提下定义作用于这些元素的新操作
- 结构型
    - [适配器模式 Adapter|Wrapper](test/DesignPatterns/AdapterTest.php)
        - 作为一个中间层实现将已存在的东西（接口）转换成适合需要、能被所利用的,希望的接口
        - 使得原本由于接口不兼容而不能一起工作的类可以在一起工作
    - 桥梁模式 Bridge
        - 将不变的框架使用抽象类定义出来，然后再将变化的内容使用具体的子类来分别实现
        - 面向客户的只是一个抽象类，这种方式可以较好的避免为抽象类中现有接口添加新的实现所带来的影响，缩小了变化带来的影响
        - 各个子类的行为经常发生变化，或者有一定的重复和组合关系时，我们不妨将这些行为提取出来，也采用接口的方式提供出来，然后以组合的方式将服务提供给原来的子类
        - 用于将抽象和实现解耦，使得两者可以独立地变化
        - 为了解决继承的缺点而提出的设计模式。在该模式下，实现可以不受抽象的约束，不用再绑定在一个固定的抽象层次上
    - 组合模式 Composite
        - 将对象组合成树形结构以表示“部分-整体”的层次关系。使得用户对单个对象和组合对象的使用具有一致性
    - 数据映射模式 Data Mapper
        - 在持久化数据存储层（通常是关系型数据库）和驻于内存的数据表现层之间进行双向数据传输的数据访问层
        - 目的是让持久化数据存储层、驻于内存的数据表现层、以及数据映射本身三者相互独立、互不依赖
        - 由一个或多个映射器（或者数据访问对象）组成，用于实现数据传输。通用的数据访问层可以处理不同的实体类型，而专用的则处理一个或几个
        - 核心在于它的数据模型遵循单一职责原则（Single Responsibility Principle）, 这也是和 Active Record
          模式的不同之处。最典型的数据映射模式例子就是数据库 ORM 模型 （Object Relational Mapper）
    - 装饰器模式 Decorator
        - 能够从一个对象的外部动态地给对象添加功能
        - 基于对象组合的方式，灵活的给对象添加所需要的功能
        - 本质就是动态组合。动态是手段，组合才是目的
    - 依赖注入模式 Dependency Injection：控制反转（Inversion of Control）的一种实现方式
      -
      当调用者需要被调用者的协助时，在传统的程序设计过程中，通常由调用者来创建被调用者的实例，但在这里，创建被调用者的工作不再由调用者来完成，而是将被调用者的创建移到调用者的外部，从而反转被调用者的创建，消除了调用者对被调用者创建的控制，因此称为控制反转
        - 通常的解决方案是将创建被调用者实例的工作交由 IoC
          容器来完成，然后在调用者中注入被调用者（通过构造器/方法注入实现），这样我们就实现了调用者与被调用者的解耦，该过程被称为依赖注入
        - 依赖注入不是目的，是一系列工具和手段，最终的目的是帮助开发出松散耦合（loose
          coupled）、可维护、可测试的代码和程序。这条原则的做法是大家熟知的面向接口，或者说是面向抽象编程
    - 门面|外观模式 Facade:用于为子系统中的一组接口提供一个一致的界面
        - 门面模式定义了一个高层接口，使得子系统更加容易使用
        - 引入门面角色之后，用户只需要直接与门面角色交互，用户与子系统之间的复杂关系由门面角色来实现，从而降低了系统的耦合度
    - 代理模式 Proxy 为其他对象提供一种代理以控制对这个对象的访问
        - 使用代理模式创建代理对象，让代理对象控制目标对象的访问（目标对象可以是远程的对象、创建开销大的对象或需要安全控制的对象），并且可以在不改变目标对象的情况下添加一些额外的功能。
        - 在某些情况下，一个客户不想或者不能直接引用另一个对象，而代理对象可以在客户端和目标对象之间起到中介的作用，并且可以通过代理对象去掉客户不能看到的内容和服务或者添加客户需要的额外服务。经典例子就是网络代理
        - 适配器模式 —— 适配器模式为它所适配的对象提供了一个不同的接口，而代理提供了与它的实体相同的接口
        - 装饰器模式 —— 两者目的不同：装饰器为对象添加一个或多个功能，而代理则控制对对象的访问
    - 注册(树)模式 Registry
        - 创建一个中央存储器来存放这些对象 —— 通常通过一个只包含静态方法的抽象类来实现（或者通过单例模式）
- more
    - 服务定位器模式 Service Locator :为应用程序中服务的创建和初始化提供一个中心位置
        - 服务定位器模式和依赖注入模式都是控制反转（IoC）模式的实现
        - 在服务定位器中注册给定接口的服务实例，然后通过接口获取服务并在应用代码中使用而不需要关心其具体实现
        - 在服务提供者中绑定接口及其实现，将服务实例注册到服务容器中，然后在使用时可以通过依赖注入或者通过服务接口/别名获取服务实例的方式调用服务
    - 委托模式 Delegation
        - 写一个附加的类提供附加的功能，并使用原来的类的实例提供原有的功能

## [TDD](tdd)

- 测试就是需求:客户到底要的是什么，以什么优先级要
- 不要一下把复杂逻辑写出,一步步来
- 每步测试结果设想

```sh
phpunit --bootstrap src/autoload.php tests
```

### FizzBuzz

- 打印出从1到100的数字
- 其中3的倍数替换成“Fizz”
- 5的倍数替换成“Buzz”
- 既能被3整除、又能被5整除的数则替换成“FizzBuzz”
- 要求
    - 代码整洁，没有重复代码
    - 有单元测试，单元测试覆盖率100%
    - 10分钟内完成

### 写一个程序，用于处理英寸、英尺、码之间的换算

- 1英尺(foot) 应该等于 12英寸(inch)
- 1码(yard) 应该等于 3英尺
- 1码 应该等于 36英寸

### Args

- Schema:数据类型验证,默认值
    - 默认值实现验证

## [算法](algorithms)

- PHP 底层 SPL 库中
- SplStack
- SplFixedArray
- BST
    - in-order
    - pre-order：广度优先
    - post-order:深度优先
- 参考
    - [PHP 7 Data Structures and Algorithms](https://github.com/PacktPublishing/PHP7-Data-Structures-and-Algorithms)
- 排序
    - bubble:当前值前面遍历，俩俩比较，最大的放最后面
    - selection：取出当前值，遍历取出后面中的最小值，放在当前位置
    - insertion:取出当前值，逆序遍历前面，有大的移到到当前位置
- `pecl install ds`

### [Leetcode](algorithms/leetcode/README.md)

## [Framework](./framework)

- [simple-framework](https://github.com/CraryPrimitiveMan/simple-framework)

### admin

```h
cp -r node_modules/@fortawesome/fontawesome-free/webfonts application/public
```

## 扩展

### [Swoole 从入门到实战](https://xueyuanjun.com/books/swoole-tutorial)

### [PHP 全栈工程师指南](https://xueyuanjun.com/books/php-fullstack)

### [thrift](tools/thrift)

```sh
thrift -r --gen php:server hello.thrift
```

### gRPC

### phpspec

