function sleep(duration) {
    return new Promise(function (resolve, reject) {
        setTimeout(resolve, duration);
    })
}
async function foo() {
    console.log("a")
    await sleep(2000)
    console.log("b")
}

// async function foo1(name) {
//     await sleep(2000)
//     console.log("name")
// }
// async function foo2() {
//     await foo1("a");
//     await foo1("b");
// }
foo()
