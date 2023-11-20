let promise = new Promise(function (resolve, reject) {
    console.log('Promise');
    resolve();
});

// then方法指定的回调函数将在当前脚本所有同步任务执行完才会执行，所以resolved最后输出
promise.then(function () {
    console.log('resolved.');
});

console.log('Hi!');