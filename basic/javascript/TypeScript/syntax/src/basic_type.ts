// boolean
const isDone: boolean = false;
let yes = true;

// number
const decimal: number = 6;
const float_pi: number = 3.14159;
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
console.log(sentence);

const sym: symbol = Symbol();

let u: undefined = undefined;
let n: null = null;

// enum
enum ContractStatus {
  Permanent = 1,
  Temp,
  Apprentice
}
let employeeStatus: ContractStatus = ContractStatus.Temp;
console.log(employeeStatus);
console.log(ContractStatus[2]);
