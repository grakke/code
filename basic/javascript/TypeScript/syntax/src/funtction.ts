let myAdd: (baseValue: number, increment: number) => number = function (
  x: number,
  y: number
): number {
  return x + y;
};

//optional
function buildName(firstName: string, lastName?: string) {
  if (lastName) return firstName + " " + lastName;
  else return firstName;
}

// default
function buildName1(firstName: string, lastName = "Smith") {
  return firstName + " " + lastName;
}

// Rest Parameters
function buildName3(firstName: string, ...restOfName: string[]) {
  return firstName + " " + restOfName.join(" ");
}

let employeeName = buildName3("Joseph", "Samuel", "Lucas", "MacKinzie");


interface Card {
  suit: string;
  card: number;
}

interface Deck {
  suits: string[];
  cards: number[];
  createCardPicker(this: Deck): () => Card;
}

let deck: Deck = {
  suits: ["hearts", "spades", "clubs", "diamonds"],
  cards: Array(52),
  // NOTE: The function now explicitly specifies that its callee must be of type Deck
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


function capitalizeName(name: string): string {
  return name.toUpperCase();
}

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

alert('hello world in TypeScript!');

// 类型批注
function area(shape: string, width: number, height: number) {
  var area = width * height;
  return "I'm a " + shape + " with an area of " + area  + " cm aquard ";
}

document.body.innerHTML = area('rectangle', 30, 15);

// 接口
interface Shape {
  name: string;
  width: number;
  height: number;
  color: string;
}

function area1(shape: Shape) {
  var area = shape.width * shape.height;
  return "I'm a " + shape.name + " with an area of " + area  + " cm aquard ";
}

console.log( area1( {name: "square", width: 30, height: 30, color: "blue"} ) );

// 箭头函数表达式
var shape = {
    name: "rectangle",
    popup: function() {

        console.log('This inside popup(): ' + this.name);

        setTimeout(function() {
            console.log('This inside setTimeout(): ' + this.name);
            console.log("I'm a " + this.name + "!");
        }, 3000);

    }
};

shape.popup();

