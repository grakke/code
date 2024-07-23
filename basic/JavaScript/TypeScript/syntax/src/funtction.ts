//optional
function buildName (firstName: string, lastName?: string) {
  if (lastName) return firstName + " " + lastName;
  else return firstName;
}

// default
function buildName1 (firstName: string, lastName = "Smith") {
  return firstName + " " + lastName;
}

// Rest Parameters
function buildName3 (firstName: string, ...restOfName: string[]) {
  return firstName + " " + restOfName.join(" ");
}
let employeeName = buildName3("Joseph", "Samuel", "Lucas", "MacKinzie");

interface Message {
  text: string;
  sender: string;
}
function displayMessage ({ text, sender }: Message) {
  console.log(`Message from ${sender}: ${text}`);
}
displayMessage({ sender: 'Christopher', text: 'hello, world' });

function area (shape: string, width: number, height: number) {
  var area = width * height;

  return "I'm a " + shape + " with an area of " + area + " cm aquard ";
}
console.log('rectangle', 30, 15);

interface Card {
  suit: string;
  card: number;
}
interface Deck {
  suits: string[];
  cards: number[];
  createCardPicker (this: Deck): () => Card;
}

let deck: Deck = {
  suits: ["hearts", "spades", "clubs", "diamonds"],
  cards: Array(52),
  createCardPicker: function (this: Deck) {
    return () => {
      let pickedCard = Math.floor(Math.random() * 52);
      let pickedSuit = Math.floor(pickedCard / 13);

      return { suit: this.suits[pickedSuit], card: pickedCard % 13 };
    };
  },
};
let cardPicker = deck.createCardPicker();
let pickedCard = cardPicker();
alert("card: " + pickedCard.card + " of " + pickedCard.suit);

// Anonymous function
let sum = function (input: number[]): number {
  let total: number = 0;
  for (let i = 0; i < input.length; i++) {
    if (isNaN(input[i])) {
      continue;
    }
    total += Number(input[i]);
  }
  return total;
}
console.log(sum([1, 2, 3]));

// Arrow function
let addNumbers2 = (x: number, y: number): number => x + y;

// 箭头函数
var shape = {
  name: "rectangle",
  popup: function () {
    console.log('This inside popup(): ' + this.name);

    setTimeout(function () {
      console.log('This inside setTimeout(): ' + this.name);
      console.log("I'm a " + this.name + "!");
    }, 3000);
  }
};
shape.popup();

// 类型签名
type calculator = (x: number, y: number) => number;
let addNumbers: calculator = (x: number, y: number): number => x + y;
let subtractNumbers: calculator = (x: number, y: number): number => x - y;
console.log(addNumbers(1, 2));
console.log(subtractNumbers(1, 2));

let doCalculation = (operation: 'add' | 'subtract'): calculator => {
  if (operation === 'add') {
    return addNumbers;
  } else {
    return subtractNumbers;
  }
}
console.log(doCalculation('add')(1, 2))

let myAdd: (baseValue: number, increment: number) => number = function (x: number, y: number): number {
  return x + y;
};

let multiply: (first: number, second: number) => number;
multiply = function (first, second) {
  return first * second;
}

let multiplyFirst: (first: number) => ((second: number) => number);
multiplyFirst = function (first) {
  return function (num) {
    return first * num;
  }
}