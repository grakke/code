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
    - name upper
    - 组件的内容(通常)需要包含 一个根元素 or 创建组件数组
    - 在浏览器中运行的代码使用 ES6模块。模块定义为export ，并与import一起使用
    - Node.js 使用了所谓的 CommonJS。 原因在于，早在 JavaScript 在语言规范中支持模块之前，Node 生态系统就有对模块需求。 在撰写本文的时候，Node 还不支持 ES6模块，但是支持 ES6 只是时间问题
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
  - Variables
  - Arrays
  - Objects
    - Object methods and "this"
    - Arrow functions and functions defined using the function keyword vary substantially when it comes to how they behave with respect to the keyword this, which refers to the object itself.
    - Methods can be assigned to objects even after the creation of the object
    - When calling the method through a reference, the method loses knowledge of what the original this was. Contrary to other languages, in JavaScript the value of this is defined based on how the method is called. When calling the method through a reference, the value of this becomes the so-called global object and the end result is often not what the software developer had originally intended.
    - object with function:when function as reference 通过引用调用该方法时， this 的值就变成了所谓的全局对象
    - Losing track of this when writing JavaScript code brings forth a few potential issues. Situations often arise where React or Node (or more specifically the JavaScript engine of the web browser) needs to call some method in an object that the developer has defined.
      - One situation leading to the "disappearance" of this arises when we set a timeout to call the greet function on the object
  - Functions
    - 如果一个箭头函数由单个命令组成，函数体就不需要用花括号括起来
  - Classes
  - 重构数据结构
  - JavaScript materials
    - [Mozilla's JavaScript Guide](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
    - [A re-introduction to JavaScript (JS tutorial)](https://developer.mozilla.org/en-US/docs/Web/JavaScript/A_re-introduction_to_JavaScript)
    - [You-Don't-Know-JS](https://github.com/getify/You-Dont-Know-JS)
    - [javascript.info](https://javascript.info/)
    - The free and highly engaging book [Eloquent JavaScript](https://eloquentjavascript.net/) takes you from the basics to interesting stuff quickly. It is a mixture of theory projects and exercises and covers general programming theory as well as the JavaScript language.
    - [Namaste 🙏 JavaScript](https://www.youtube.com/playlist?list=PLlasXeu85E9cQ32gLCvAvr9vNaUccPVNP) is another great and highly recommended free JavaScript tutorial in order to understand how JS works under the hood. a pure in-depth JavaScript course released for free on YouTube. It will cover the core concepts of JavaScript in detail and everything about how JS works behind the scenes inside the JavaScript engine.
    - [egghead.io](https://egghead.io/) has plenty of quality screencasts on JavaScript, React, and other interesting topics. Unfortunately, some of the material is behind a paywall.
- Component state, event handlers
  - Component helper functions
  - destructure values from objects and arrays upon assignment
    - 从对象和数组中解构出值
    - 不能跨级解析
  - Page re-rendering
  - Stateful component
  - Event handling
  - An event handler is a function
  - Passing state - to child components
  - Changes in state cause re-rendering
    - Calling a function that changes the state causes the component to re-render.
  - Refactoring the components
- A more complex state, debugging React apps
  - Complex state
    - it is forbidden in React to mutate state directly, since it can result in unexpected side effects. Changing state has to always be done by setting the state to a new object
  - Handling arrays
  - Update of the state is asynchronous
  - Conditional rendering
  - Old React
    - we use the state hook to add state to our React components, which is part of the newer versions of React and is available from version 16.8.0 onwards
  - Debugging React applications
    - Keep the browser's developer console open at all times. Keep both your code and the web page open together at the same time, all the time. **don't write more code but rather find and fix the problem immediately.**
    - It is highly recommended to add the React developer tools extension to Chrome
  - Rules of Hooks
    - The useState function (as well as the useEffect function introduced later on in the course) must not be called from inside of a loop, a conditional expression, or any place that is not a function defining a component. This must be done to ensure that the hooks are always called in the same order, and if this isn't the case the application will behave erratically.
    - To recap, hooks may only be called from the inside of a function body that defines a React component
  - Event Handling Revisited
  - A function that returns a function
  - Do Not Define Components Within Components
    - React treats a component defined inside of another component as a new component in every render. This makes it impossible for React to optimize the component.
  - Useful Reading
    - [official React documentation](https://react.dev/learn)
    - [Start learning React](https://egghead.io/courses/start-learning-react)
    - [Beginner's Guide to React](https://egghead.io/courses/the-beginner-s-guide-to-reactjs)
  - Web programmers oath
    - I will have my browser developer console open all the time
    - I progress with small steps
    - I will write lots of console.log statements to make sure I understand how the code behaves and to help pinpointing problems
    - If my code does not work, I will not write more code. Instead I start deleting the code until it works or just return to a state when everything was still working
    - When I ask for help in the course Discord or Telegram channel or elsewhere I formulate my questions properly, see here how to ask for help
  - Utilization of Large language models
  - [Exercise unicafe](./part1/unicafe/)
    - TODO
      - 随机生成的问题
      - 投票如何传递参数与更新票数

```sh
npm create vite@latest part1 --template react
```

## 与服务端通信

- Rendering a collection, modules
  - JavaScript Arrays
  - Key-attribute
  - Map
- Forms
  - Saving the notes in the component state
  - Controlled component
- Getting data from server
- Altering data in server
- Adding styles to React app

## 用NodeJS和Express写服务端程序

- 部署
  - 前端build文件夹复制到后端项目根目录
  - `app.use(express.static('build'))`
  - 前端构建的baseURl 去掉 http

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

## 思考

- 课程的进化方法 优化的思路
  - 分块重构，不破坏功能
  - 方法深挖
- 框架借鉴后端的代码重构
- TDD
  - progress with small steps
- reuse
- serverless
- refactor
- data structure more compound, function more simple
