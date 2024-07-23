// var promise = new Promise(function (resolve, reject) {
//     // ...
//     if ( /* 异步操作成功 */ true) {
//         resolve(value);
//     } else {
//         /* 异步操作失败 */
//         reject(new Error());
//     }
// });

var p1 = new Promise(function (resolve, reject) {
    resolve('成功');
});
p1.then(console.log, console.error); // "成功"

var p2 = new Promise(function (resolve, reject) {
    reject(new Error('失败'));
});
p2.then(console.log, console.error);// Error: 失败

// var preloadImage = function (path) {
//     return new Promise(function (resolve, reject) {
//         var image = new Image();
//         image.onload = resolve;
//         image.onerror = reject;
//         image.src = path;
//     });
// };
// preloadImage('https://example.com/my.jpg')
//     .then(function (e) {
//         document.body.append(e.target)
//     })
//     .then(function () {
//         console.log('加载成功')
//     })

function sleep(duration) {
    return new Promise(function (resolve, reject) {
        setTimeout(resolve, duration);
    })
}
sleep(1000).then(() => console.log("finished"));

var r = new Promise(function (resolve, reject) {
    console.log("a");
    resolve()
});
r.then(() => console.log("c"));
console.log("b")

var r = new Promise(function (resolve, reject) {
    console.log("a");
    resolve()
});
setTimeout(() => console.log("d"), 0)
r.then(() => console.log("c"));
console.log("b")

setTimeout(() => console.log("d"), 0)
var r = new Promise(function (resolve, reject) {
    resolve()
});
r.then(() => {
    var begin = Date.now();
    while (Date.now() - begin < 1000);
    console.log("c1")
    new Promise(function (resolve, reject) {
        resolve()
    }).then(() => console.log("c2"))
});

function sleep(duration) {
    return new Promise(function (resolve, reject) {
        console.log("b");
        setTimeout(resolve, duration);
    })
}
console.log("a");
sleep(5000).then(() => console.log("c"));

function sleep(duration) {
    return new Promise(function (resolve, reject) {
        setTimeout(resolve, duration);
    })
}
async function foo(name) {
    await sleep(2000)
    console.log(name)
}
async function foo2() {
    await foo("a");
    await foo("b");
}
