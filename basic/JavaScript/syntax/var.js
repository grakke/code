const x = 1
let y = 5

console.log(x, y)   // 1, 5 are printed
y += 10
console.log(x, y)   // 1, 15 are printed
y = 'sometext'
console.log(x, y)   // 1, sometext are printed
x = 4               // causes an error

var b;
void function () {
    var env = { b: 1 };
    b = 2;
    console.log("In function b:", b);
    with (env) {
        var b = 3;
        console.log("In with b:", b);
    }
}();
console.log("Global b:", b);
