const fs = require('fs')

const getFile = (fileName) => {
    return new Promise((resolve, reject) => {
        fs.readFile(fileName, (err, data) => {
            if (err) {
                reject(err)  // 调用 `reject` 会导致 promise 失败，无论是否传入错误作为参数，
                return        // 且不再进行下去。
            }
            resolve(data)
        })
    })
}

getFile('/etc/passwd')
    .then(data => console.log(data))
    .catch(err => console.error(err))

// 例子2
let done = true

const isItDoneYet = new Promise((resolve, reject) => {
    if (done) {
        const workDone = '这是创建的东西'
        resolve(workDone)
    } else {
        const why = '仍然在处理其他事情'
        reject(why)
    }
})

const checkIfItsDone = () => {
    isItDoneYet
        .then(ok => {
            console.log(ok)
        })
        .catch(err => {
            console.error(err)
        })
}

checkIfItsDone()
