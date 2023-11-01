// boolean
var isDone = false;
// number
var decimal = 6;
var float = 3.14;
var hex = 0xf00d;
var binary = 10;
var octal = 484;
var Bint = 100n;
var y = 0xffffn;
// string
var color = "blue";
color = 'red';
var fullName = "Bob Bobbington";
var age = 37;
var sentence = "Hello, my name is " + fullName + ".\n\nI'll be " + (age + 1) + " years old next month.";
var sentence1 = "Hello, my name is " +
    fullName +
    ".\n\n" +
    "I'll be " +
    (age + 1) +
    " years old next month.";
var sym = Symbol();
var obj1 = { foo: 123 };
var obj2 = [1, 2, 3];
var obj3 = function (n) { return n + 1; };
var u = undefined;
var n = null;
// unknow
var notSure = 4;
notSure = "maybe a string instead";
notSure = false;
var str = getValue("myString");
function warnUser() {
    console.log("This is my warning message");
}
// never
// Function returning never must not have a reachable end point
function error(message) {
    throw new Error(message);
}
// Inferred return type is never
function fail() {
    return error("Something failed");
}
// Function returning never must not have a reachable end point
function infiniteLoop() {
    while (true) { }
}
// OK
create({ prop: 0 });
create(null);
