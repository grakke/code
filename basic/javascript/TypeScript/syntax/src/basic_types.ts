// boolean
const isDone: boolean = false;

// number
const decimal: number = 6;
const float: number = 3.14;
const hex: number = 0xf00d;
const binary: number = 0b1010;
const octal: number = 0o744;

const Bint: bigint = 100n;
const y: bigint = 0xffffn;

// string
let color: string = "blue";
color = 'red';
let fullName: string = `Bob Bobbington`;
let age: number = 37;
let sentence: string = `Hello, my name is ${fullName}.

I'll be ${age + 1} years old next month.`;

let sentence1: string =
  "Hello, my name is " +
  fullName +
  ".\n\n" +
  "I'll be " +
  (age + 1) +
  " years old next month.";

const sym: symbol = Symbol();

const obj1: object = { foo: 123 };
const obj2: object = [1, 2, 3];
const obj3: object = (n: number) => n + 1;

let u: undefined = undefined;
let n: null = null;

// unknow
let notSure: unknown = 4;
notSure = "maybe a string instead";
notSure = false;

// any
declare function getValue(key: string): any;
const str: string = getValue("myString");

function warnUser(): void {
  console.log("This is my warning message");
}

// never
// Function returning never must not have a reachable end point
function error(message: string): never {
  throw new Error(message);
}

// Inferred return type is never
function fail() {
  return error("Something failed");
}

// Function returning never must not have a reachable end point
function infiniteLoop(): never {
  while (true) { }
}

declare function create(o: object | null): void;

// OK
create({ prop: 0 });
create(null);