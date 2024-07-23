{
    let a = 10;
    var b = 1;
}
// a // ReferenceError: a is not defined.
b // var 穿透

var a = [];
for (let i = 0, j = ""; i < 10; i++) {
    a[i] = function () {
        console.log(i);
    };
    let j = "c";
    // j 不在同一个作用域，有各自单独的作用域
    console.log(j);
}
a[6](); // 6

for (let i = 0; i < 3; i++) {
    let i = 'abc';
    console.log(i); // 两个 i 作用域不一样
}

// var 命令会发生“变量提升”现象，即变量可以在声明之前使用，值为undefined
console.log(foo); // 输出undefined
var foo = 2;

// let 所声明变量一定要在声明后使用，否则报错
// console.log(bar); // 报错ReferenceError
// let bar = 2;

// typeof x; // ReferenceError
// let x;
// 一个变量根本没有被声明，使用typeof反而不会报错
typeof undeclared_variable; // "undefined"

// 参数x默认值等于另一个参数y，此时y还没有声明，属于“死区”
// function bar(x = y, y = 2) {
//     return [x, y];
// }
// bar(); // 报错

// ES5 没有块级作用域带来很多不合理的场景 //
//  var 内层变量因为变量提升覆盖外层变量
var tmp = new Date();
function f() {
    console.log(tmp);
    if (false) {
        var tmp = "hello world";
    }
}
f(); // undefined

//  用来计数的循环变量泄露为全局变量
var s = "hello";
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
}
console.log(i); // 5

// 外层代码块不受内层代码块的影响
function f1() {
    let n = 5;
    if (true) {
        let n = 10;
    }
    console.log(n);
}
f1();// 5

// 在 ES5 中运行得到“I am inside!” 内部的函数会提升
// 在 ES6 浏览器中运行会报错 在块级作用域之外不可引用

function f2() {
    console.log("I am outside!");
}
(function () {
    if (false) {
        function f2() {
            console.log("I am inside!");
        }
    }

    // f2(); // TypeError: f is not a function
})();

// 块级作用域内部，优先使用函数表达式,而不是函数声明语句
{
    let a = "secret";
    let f = function () {
        return a;
    };

    console.log(f());
}

// 解构赋值
{
    let [foo, [[bar], baz]] = [1, [[2], 3]];
    let [, , third1] = ["foo", "bar", "baz"];
    let [head, ...tail] = [1, 2, 3, 4];
    let [x, y, ...z] = ["a"];
    let { foo1, bar1 } = { foo: "aaa", bar: "bbb" };

    function* fibs() {
        let a = 0;
        let b = 1;
        while (true) {
            yield a;
            [a, b] = [b, a + b];
        }
    }

    let [first, second, third, fourth, fifth, sixth] = fibs();
    sixth // 5
}

// 不完全解构
{
    let [a, [b], d] = [1, [2, 3], 4];
    // let [foo] = {}; // 报错
    let [x, y, z] = new Set(['a', 'b', 'c']);
    // 指定默认值
    let [x1, y1 = "b"] = ["a", undefined]; // x='a', y='b'
    let [x2 = 1] = [undefined];
    x2 // 1

    let [x3 = 1] = [null];
    x3 // null

}

// 对象的解构赋值
{
    let { foo: baz } = { foo: "aaa", bar: "bbb" };
    let { log, sin, cos } = Math;
    const { log1 } = console;

    let obj = { first: 'hello', last: 'world' };
    let { first: f, last: l } = obj;
    f // 'hello'
    l // 'world'
    first // error: first is not defined

    let obj1 = {
        p: ["Hello", { y: "World" }]
    };
    let {
        p: [x, { y }]
    } = obj1;

    let arr = [1, 2, 3];
    let { 0: first, [arr.length - 1]: last } = arr;
    first // 1
    last // 3

    let x1;
    ({ x1 } = { x1: 1 });

    const [a, b, c, d, e] = "hello";
    let { length: len } = 'hello';
    len // 5

    [
        [1, 2],
        [3, 4]
    ].map(([a, b]) => a + b); // [ 3, 7 ]


    function move({ x = 0, y = 0 } = {}) {
        return [x, y];
    }
    move({ x: 3, y: 8 }); // [3, 8]
    move({ x: 3 }); // [3, 0]
    move({}); // [0, 0]
    move(); // [0, 0]

    // 为函数move的参数指定默认值，而不是为变量x和y指定默认值，会得到与上面写法不同的结果
    function move1({ x, y } = { x: 0, y: 0 }) {
        return [x, y];
    }
    move1({ x: 3, y: 8 }); // [3, 8]
    move1({ x: 3 }); // [3, undefined]
    move1({}); // [undefined, undefined]
    move1(); // [0, 0]
}

// 用途
{
    let x = 1;
    let y = 2;
    [x, y] = [y, x];

    function example() {
        return [1, 2, 3];
    }
    let [a, b, c] = example();

    // 返回一个对象

    function example() {
        return {
            foo: 1,
            bar: 2
        };
    }
    let { foo, bar } = example();
    function f1({ x, y, z }) { console.log(x) }
    f1({ z: 3, y: 2, x: 1 });


    let jsonData = {
        id: 42,
        status: "OK",
        data: [867, 5309]
    };
    let { id, status, data: number } = jsonData;
    console.log(id, status, number);
    // 42, "OK", [867, 5309]

    // 指定参数的默认值避免了在函数体内部再写var foo = config.foo || 'default foo';
    jQuery.ajax = function (
        url,
        {
            async = true,
            beforeSend = function () { },
            cache = true,
            complete = function () { },
            crossDomain = false,
            global = true
            // ... more config
        } = {}
    ) {
        // ... do stuff
    };

    const { SourceMapConsumer, SourceNode } = require("source-map");

    const map = new Map();
                map.set('first', 'hello');
                map.set('second', 'world');

                for (let [key, value] of map) {
                console.log(key + " is " + value);
                }
}