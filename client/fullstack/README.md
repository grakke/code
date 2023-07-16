# [Fullstack](https://fullstackopen.com/en/)

## Web 应用的基础设施

- 基础知识

## React 入门

## 与服务端通信

## 用NodeJS和Express写服务端程序

## 测试 Express 服务端程序, 以及用户管理

## 测试 React 应用

## 利用Redux进行状态管理

## React router、自定义 hook，利用CSS和webpack给app添加样式

## GraphQL

## TypeScript

## React Native

## CI/CD

## 容器

## 使用关系型数据库

## ES6

* 如果一个箭头函数由单个命令组成，那么函数体就不需要用花括号括起来
* Destructuring:从对象和数组中解构出值

## thought

* TDD
* reuse
* serverless
* refactor
* data structure more compound, function more simple

## rule

* compontent
  * name upper
  * 组件的内容(通常)需要包含 一个根元素 or 创建组件数组

## version

* object with function:when function as reference 通过引用调用该方法时， this 的值就变成了所谓的全局对象

```sh
npm install -g json-server
npx json-server --port 3001 --watch db.json
```

* 在浏览器中运行的代码使用 ES6模块。模块定义为export ，并与import一起使用
* Node.js 使用了所谓的 CommonJS。 原因在于，早在 JavaScript 在语言规范中支持模块之前，Node 生态系统就有对模块需求。 在撰写本文的时候，Node 还不支持 ES6模块，但是支持 ES6 只是时间问题

## 部署

* 前端build文件夹复制到后端项目根目录
* `app.use(express.static('build'))`
* 前端构建的baseURl 去掉 http
