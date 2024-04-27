## TDD

### [kata](https://kata-log.rocks/)

- [kata-bootstraps](https://github.com/swkBerlin/kata-bootstraps)
  - TypeScript Jest boilerplate
- Bowling Game Kata
  - 十论，每轮两次机会加一起，加上前一轮次得分
  - X strike 一个全中有额外两次机会，加到本轮 Frame 得分中
    - roll two strikes in a row
  - / spare add ten points. But the difference is instead of adding the points from your next two throws, you only add the points from next throw
  - -‘ can mean one of two things. A gutter or missing pins.
- Fizz Buzz
  - Write a program that prints one line for each number from 1 to 100
  - Usually just print the number itself.
  - For multiples of three print Fizz instead of the number
  - For the multiples of five print Buzz instead of the number
  - For numbers which are multiples of both three and five print FizzBuzz instead of the number
- [Yatzy](https://sammancoaching.org/kata_descriptions/yatzy.html)
  - Each player rolls five six-sided dice. They can re-roll some or all of the dice up to three times (including the original roll).
  - The player then places the roll in a category, such as ones, twos, fives, pair, two pairs etc (see the rules below). If the roll is compatible with the category, the player gets a score for the roll according to the rules. If the roll is not compatible with the category, the player scores zero for the roll.
  - Your task is to score a GIVEN roll in a GIVEN category.
- Yatzy Categories and Scoring Rules
  - Chance:The player scores the sum of all dice
  - Yatzy:If all dice have the same number, the player scores 50 points
  - Ones, Twos, Threes, Fours, Fives, Sixes:The player scores the sum of the dice that reads one, two, three, four, five or six, respectively.
  - Pair:The player scores the sum of the two highest matching dice. 3,3,3,3,1 scores 6 (3+3)
  - Two pairs:If there are two pairs of dice with the same number, the player scores the sum of these dice 1,1,2,2,2 scores 6 (1+1+2+2)
  - Three of a kind|Four of a kind
  - Small straight 1,2,3,4,5, the player scores 15
  - Full house:If the dice are two of a kind and three of a kind, the player scores the sum of all the dice

```sh
npm install -g yarn

# Run tests once
yarn test

# Run tests with Jest-CLI custom arguments (https://jestjs.io/docs/en/cli.html)
yarn test --clearCache --debug

# Run tests for a specific file
yarn test MyFile.test.ts

# Run tests once with coverage
# Coverage report available in ./coverage/index.html
yarn test:cover

# Run all tests in watch mode without coverage
yarn test:watch

# Run the tests with watch mode only for files changed since the last Git commit
yarn test:changed

# Run tests for CI environment (optimized for TravisCI)
yarn test:ci
```

```sh
composer install
composer test -- --filter testNotFailing
composer test
composer test-coverage

# Run from docker
test.sh
```

```sh
go mod tidy

go test -v
```

## DDD

### [ddd-coding-practice](https://github.com/davenkin/ddd-coding-practice)

- 本项目是ecommerce系统的订单子系统，用于向用户展示产品并接受用户订单。
- 技术选型 Spring Boot、Gradle、MySQL、Junit 5、Rest Assured、Docker
- 技术架构图
- 部署架构图
- 项目所依赖的其他系统，比如订单系统依赖于会员系统。
- 各个环境的访问方式，数据库连接等
- 常用的公共的编码实践方式

![需求](ddd/ddd-coding-practice/需求.png)

#### 本地构建

|功能|命令|备注|
| --- | --- | --- |
|生成IntelliJ工程|`./idea.sh`|自动打开IntelliJ|
|本地运行|`./run.sh`|监听5005调试端口|
|本地构建|`./local-build.sh`|运行所有类型的自动化测试|
|停止数据库|`./gradlew composeDown`|将清空所有数据|
|手动启动数据库|`./gradlew composeUp`||

#### 领域对象

|领域对象|中文名|业务功能|
| --- | --- | --- |
|Product|产品|包含名称和价格|
|Order|订单|表示用于下的订单，包含多个产品及其数量|

#### 测试策略

|测试类型|代码目录|测试内容|
| --- | --- | --- |
|单元测试|`src/test/java`|包含核心领域模型（包含领域对象和Factory类）的测试|
|组件测试|`src/componentTest/java`|用于测试一些核心的组件级对象，比如Repository|
|API测试|`src/apiTest/java`|模拟客户端调用API|

### [php-ddd-example](https://github.com/CodelyTV/php-ddd-example)

- <https://pro.codely.tv/library/ddd-en-php>
- This project tries to be a MOOC (Massive Open Online Course) platform. It's decoupled from any framework, but it has some Symfony and Laravel implementations
- Bounded Contexts
  - Mooc: Place to look in if you wanna see some code 🙂. Massive Open Online Courses public platform with users, videos, notifications, and so on.
  - BackOffice: Here you'll find the use cases needed by the Customer Support department in order to manage users, courses, videos, and so on.
- Application execution
  - Mooc Backend: <http://localhost:8030/health-check>
  - Backoffice Backend: <http://localhost:8040/health-check>
  - Backoffice Frontend: <http://localhost:8041/health-check>
- [Monitoring](http://localhost:9999/)

```sh
git clone https://github.com/CodelyTV/php-ddd-example php-ddd-example
cd php-ddd-example
cp .env .env.local
make build

make deps
make test
```
