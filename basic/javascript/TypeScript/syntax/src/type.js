// any
var randomValue = 10;
randomValue = 'Mateo'; // OK
randomValue = true; // OK
console.log(randomValue.name); // Logs "undefined" to the console
randomValue(); // Returns "randomValue is not a function" error
randomValue.toUpperCase(); // Returns "randomValue is not a function" error
// unknow
var notSure = 4;
notSure = false;
notSure = "maybe a string instead";
console.log(randomValue.toUpperCase());
// console.log(notSure.name);  // Error: Object is of type unknown
// notSure();                  // Error: Object is of type unknown
// notSure.toUpperCase();      // Error: Object is of type unknown
// void
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
var mystery = 4; // number
mystery = "four"; // string -- no error
var the_void = undefined;
the_void = null;
// the_void = "nothing"; // Error
