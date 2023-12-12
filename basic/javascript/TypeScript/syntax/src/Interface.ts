interface LabeledValue {
  label: string;
}
function printLabel (labeledObj: LabeledValue) {
  console.log(labeledObj.label);
}
let myObj = { size: 10, label: "Size 10 Object" };
printLabel(myObj);

interface IceCreamArray {
  [index: number]: string;
}
let myIceCream: IceCreamArray;
myIceCream = ['chocolate', 'vanilla', 'strawberry'];
let myStr1: string = myIceCream[0];
console.log(myStr1);

interface SquareConfig {
  color?: string;
  width?: number;
  [propName: string]: any;
}
function createSquare (config: SquareConfig): { color: string; area: number } {
  return {
    color: config.color || "red",
    area: config.width ? config.width * config.width : 20,
  };
}
let mySquare = createSquare({ color: "black" });
let mySquare1 = createSquare({ width: 100, opacity: 0.5 } as SquareConfig);

interface SearchFunc {
  (source: string, subString: string): boolean;
}
let mySearch: SearchFunc = function (src, sub) {
  let result = src.search(sub);
  return result > -1;
};

interface StringArray {
  [index: number]: string;
}
let myArray: StringArray = ["Bob", "Fred"];
let myStr: string = myArray[0];

// class types
interface ClockInterface {
  currentTime: Date;
  setTime (d: Date): void;
}
class Clock implements ClockInterface {
  currentTime: Date = new Date();
  setTime (d: Date) {
    this.currentTime = d;
  }
  constructor(h: number, m: number) { }
}
interface ClockConstructor {
  new(hour: number, minute: number): ClockInterface1;
}
interface ClockInterface1 {
  tick (): void;
}
function createClock (
  ctor: ClockConstructor,
  hour: number,
  minute: number
): ClockInterface1 {
  return new ctor(hour, minute);
}
class DigitalClock implements ClockInterface1 {
  constructor(h: number, m: number) { }
  tick () {
    console.log("beep beep");
  }
}
class AnalogClock implements ClockInterface1 {
  constructor(h: number, m: number) { }
  tick () {
    console.log("tick tock");
  }
}
let digital = createClock(DigitalClock, 12, 17);
let analog = createClock(AnalogClock, 7, 32);

// extend
interface Shape {
  color: string;
}
interface PenStroke {
  penWidth: number;
}
interface Square extends Shape, PenStroke {
  sideLength: number;
}
let square1 = {} as Square;
square1.color = "blue";
square1.sideLength = 10;
square1.penWidth = 5.0;

// Hybrid
interface Counter {
  (start: number): string;
  interval: number;
  reset (): void;
}
function getCounter (): Counter {
  let counter = function (start: number) { } as Counter;
  counter.interval = 123;
  counter.reset = function () { };
  return counter;
}
let c1 = getCounter();
c1(10);
c1.reset();
c1.interval = 5.0;

interface Food {
  name: string;
  calories: number;
}
function speak (food: Food): void {
  console.log("Our " + food.name + " has " + food.calories + " calories.");
}
var ice_cream = {
  name: "ice cream",
  calories: 200
}
speak(ice_cream);

const fetchURL = 'https://jsonplaceholder.typicode.com/posts'
interface Post {
    userId: number;
    id: number;
    title: string;
    body: string;
}
async function fetchPosts(url: string) {
    let response = await fetch(url);
    let body = await response.json();
    return body as Post[];
}
async function showPost() {
    let posts = await fetchPosts(fetchURL);
    // Display the contents of the first item in the response
    let post = posts[0];
    console.log('Post #' + post.id)
    // If the userId is 1, then display a note that it's an administrator
    console.log('Author: ' + (post.userId === 1 ? "Administrator" : post.userId.toString()))
    console.log('Title: ' + post.title)
    console.log('Body: ' + post.body)
}
showPost();


interface Shape1 {
  name: string;
  width: number;
  height: number;
  color: string;
}

function area1 (shape: Shape1) {
  var area = shape.width * shape.height;

  return "I'm a " + shape.name + " with an area of " + area + " cm aquard ";
}
console.log(area1({ name: "square", width: 30, height: 30, color: "blue" }));