// The <T> after the function name symbolizes that it's a generic function.
// When we call the function, every instance of T will be replaced with the actual provided type.

// Receives one argument of type T,
// Returns an array of type T.
function genericFunc<T> (argument: T): T[] {
  var arrayOfT: T[] = [];    // Create empty array of type T.
  arrayOfT.push(argument);   // Push, now arrayOfT = [argument].

  return arrayOfT;
}

var arrayFromString = genericFunc<string>("beep");
console.log(arrayFromString[0]);         // "beep"
console.log(typeof arrayFromString[0])   // String

var arrayFromNumber = genericFunc(42);
console.log(arrayFromNumber[0]);         // 42
console.log(typeof arrayFromNumber[0])   // number

// 使用泛型约束来限制类型
type ValidTypes = string | number;
function identity<T extends ValidTypes, U> (value: T, message: U): T {
  let result: ValidTypes = '';
  let typeValue: string = typeof value;

  if (typeof value === 'number') {           // Is it a number?
    result = value + value;                // OK
  } else if (typeof value === 'string') {    // Is it a string?
    result = value + value;                // OK
  }

  console.log(`The message is ${message} and the function returns a ${typeValue} value of ${result}`);
}
let returnNumber = identity<number, string>(100, 'Hello!');
returnNumber = returnNumber * 100;   // OK
let returnString = identity<string, string>('100', 'Hola!');
// let returnBoolean = identity<boolean, string>(true, 'Bonjour!');

// 将类型限制为另一个对象的属性
function getPets<T, K extends keyof T> (pet: T, key: K) {
  return pet[key];
}
let pets1 = { cats: 4, dogs: 3, parrots: 1, fish: 6 };
let pets2 = { 1: "cats", 2: "dogs", 3: "parrots", 4: "fish" }
console.log(getPets(pets1, "fish"));  // Returns 6
// console.log(getPets(pets2, "3"));     // Error

// 声明泛型接口
interface Identity<T, U> {
  value: T;
  message: U;
}
let returnNumber1: Identity<number, string> = {
  value: 25,
  message: 'Hello!'
}
let returnString1: Identity<string, number> = {
  value: 'Hello!',
  message: 25
}

// 将泛型接口声明为函数类型
interface ProcessIdentity<T, U> {
  (value: T, message: U): T;
}
function processIdentity<T, U> (value: T, message: U): T {
  console.log(message);
  return value
}
let processor: ProcessIdentity<number, string> = processIdentity;
let returnNumber2 = processor(100, 'Hello!');   // OK
// let returnString2 = processor('Hello!', 100);   // Type check error

// 将泛型接口声明为类类型
interface ProcessIdentity1<T, U> {
  value: T;
  message: U;
  process (): T;
}
class processIdentityClass<X, Y> implements ProcessIdentity1<X, Y> {
  value: X;
  message: Y;
  constructor(val: X, msg: Y) {
    this.value = val;
    this.message = msg;
  }
  process (): X {
    console.log(this.message);
    return this.value
  }
}
let processor1 = new processIdentityClass<number, string>(100, 'Hello');
processor1.process();           // Displays 'Hello'
// processor.value = '100';       // Type check error

class Car1 {
  make: string = 'Generic Car';
  doors: number = 4;
}
class ElectricCar1 extends Car1 {
  make = 'Electric Car';
  doors = 4
}
class Truck extends Car1 {
  make = 'Truck';
  doors = 2
}
function accelerate<T extends Car1> (car: T): T {
  console.log(`All ${car.doors} doors are closed.`);
  console.log(`The ${car.make} is now accelerating!`)
  return car
}
let myElectricCar = new ElectricCar1;
accelerate<ElectricCar1>(myElectricCar);
let myTruck = new Truck;
accelerate<Truck>(myTruck);