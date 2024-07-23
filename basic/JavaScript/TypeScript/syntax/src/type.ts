// any
let randomValue: any = 10;
randomValue = 'Mateo';   // OK
randomValue = true;      // OK

console.log(randomValue.name);  // Logs "undefined" to the console
randomValue();                  // Returns "randomValue is not a function" error
randomValue.toUpperCase();      // Returns "randomValue is not a function" error

// unknow
let notSure: unknown = 4;
notSure = false;
notSure = "maybe a string instead";
// console.log(notSure.name);  // Error: Object is of type unknown
// notSure();                  // Error: Object is of type unknown
// notSure.toUpperCase();      // Error: Object is of type unknown
if (typeof randomValue === "string") {
  console.log((randomValue as string).toUpperCase());    //* Returns MATEO to the console.
} else {
  console.log("Error - A string was expected here.");    //* Returns an error message.
}

// 联合和交叉类型
function add (x: number | string, y: number | string) {
  if (typeof x === 'number' && typeof y === 'number') {
    return x + y;
  }
  if (typeof x === 'string' && typeof y === 'string') {
    return x.concat(y);
  }
  throw new Error('Parameters must be numbers or strings');
}
console.log(add('one', 'two'));  //* Returns "onetwo"
console.log(add(1, 2));          //* Returns 3
console.log(add('one', 2));      //* Returns error


function rollDice (): 1 | 2 | 3 | 4 | 5 | 6 {
  return (Math.floor(Math.random() * 6) + 1) as 1 | 2 | 3 | 4 | 5 | 6;
}
const result = rollDice();

interface ValidationSuccess {
  isValid: true;
  reason: null;
}
interface ValidationFailure {
  isValid: false;
  reason: string;
}
type ValidationResult = ValidationSuccess | ValidationFailure;

type testResult = "pass" | "fail" | "incomplete";
let myResult: testResult;
myResult = "incomplete";    //* Valid
myResult = "pass";          //* Valid

type dice = 1 | 2 | 3 | 4 | 5 | 6;
let diceRoll: dice;
diceRoll = 1;    //* Valid
diceRoll = 2;    //* Valid


interface Employee {
  employeeID: number;
  age: number;
}
interface Manager {
  stockPlan: boolean;
}
type ManagementEmployee = Employee & Manager;
let newManager: ManagementEmployee = {
  employeeID: 12345,
  age: 34,
  stockPlan: true
};

// void
function warnUser (): void {
  console.log("This is my warning message");
}

// never
// Function returning never must not have a reachable end point
function error (message: string): never {
  throw new Error(message);
}



// Inferred return type is never
function fail () {
  return error("Something failed");
}

// Function returning never must not have a reachable end point
function infiniteLoop (): never {
  while (true) { }
}

declare function create (o: object | null): void;

// OK
create({ prop: 0 });
create(null);


let mystery: any = 4; // number
mystery = "four"; // string -- no error


let the_void: void = undefined;
the_void = null;

// the_void = "nothing"; // Error
