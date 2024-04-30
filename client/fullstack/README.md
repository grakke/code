# [Fullstack](https://fullstackopen.com/en/)

- Parts 0-5 (core course) - Full Stack Web Development

## Web 应用的基础设施

- General Info
- Fundamentals of Web apps
  - Make sure that the Network tab is open, and check the Disable cache option as shown. Preserve log can also be useful (it saves the logs printed by the application when the page is reloaded) as well as "Hide extension URLs"(hides requests of any extensions installed in the browser, not shown in the picture above).
  - The Network tab shows how the browser and the server communicate.
  - When entering the page, the browser fetches the HTML document detailing the structure and the textual content of the page from the server. The server has formed this document somehow.
  - Event handlers and Callback functions
    - Event handler functions are called callback functions. The application code does not invoke the functions itself, but the runtime environment - the browser, invokes the function at an appropriate time when the event has occurred
  - Document Object Model, or DOM, is an Application Programming Interface (API) that enables programmatic modification of the element trees corresponding to web pages
  - Manipulating the document object from console
  - CSS
  - Loading a [page](https://studies.cs.helsinki.fi/exampleapp/notes) containing JavaScript - review
    - 获取 HTML->CSS->JavaScript, 执行 JavaScript 内容->the browser executes an event handler
  - Forms and HTTP POST
  - AJAX (Asynchronous JavaScript and XML)
    - without the need to rerender the page.
  - [Single page app](https://studies.cs.helsinki.fi/exampleapp/spa)
    - comprise only one HTML page fetched from the server, the contents of which are manipulated with JavaScript that executes in the browser.
    - <https://github.com/mluukkai/example_app>
  - JavaScript-libraries
    - jQuery
    - BackboneJS
    - [React](https://react.dev/)
  - Full-stack web development
    - We will code the backend with JavaScript, using the Node.js runtime environment. Using the same programming language on multiple layers of the stack gives full-stack web development a whole new dimension
  - JavaScript fatigue

## React 入门

- Introduction to React
  - keep the console open all the time
  - Component
  - JSX
  - Multiple components
  - props: passing data to components
    - parameter props. As an argument, the parameter receives an object, which has fields corresponding to all the "props" the user of the component defines.
  - Possible error message
  - Some notes
    - The console should always be open
    - First letter of React component names must be capitalized
  - Do not render objects
    - the individual things rendered in braces must be primitive values, such as numbers or strings.
    - React also allows arrays to be rendered if the array contains values ​​that are eligible for rendering (such as numbers or strings).
  - Exercises
    - Don't try to program all the components concurrently, because that will almost certainly break down the whole app. Proceed in small steps, first make e.g. the component Header and only when it works for sure, you could proceed to the next component.
    - 使用 component 中的属性会传递到 component 中 props 的属性
- JavaScript
  - The official name of the JavaScript standard is ECMAScript. At this moment, the latest version is the one released in June of 2023 with the name ECMAScript®2023, otherwise known as ES14. Today, the most popular way to do transpiling is by using Babel. Transpilation is automatically configured in React applications created with vite.
  - Node.js is a JavaScript runtime environment based on Google's Chrome V8 JavaScript engine and works practically anywhere - from servers to mobile phones.

```sh
npm create vite@latest part1 -- --template react
```

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

- 如果一个箭头函数由单个命令组成，那么函数体就不需要用花括号括起来
- Destructuring:从对象和数组中解构出值

## thought

- TDD
- reuse
- serverless
- refactor
- data structure more compound, function more simple

## rule

- compontent
  - name upper
  - 组件的内容(通常)需要包含 一个根元素 or 创建组件数组

## version

- object with function:when function as reference 通过引用调用该方法时， this 的值就变成了所谓的全局对象

```sh
npm install -g json-server
npx json-server --port 3001 --watch db.json
```

- 在浏览器中运行的代码使用 ES6模块。模块定义为export ，并与import一起使用
- Node.js 使用了所谓的 CommonJS。 原因在于，早在 JavaScript 在语言规范中支持模块之前，Node 生态系统就有对模块需求。 在撰写本文的时候，Node 还不支持 ES6模块，但是支持 ES6 只是时间问题

## 部署

- 前端build文件夹复制到后端项目根目录
- `app.use(express.static('build'))`
- 前端构建的baseURl 去掉 http
