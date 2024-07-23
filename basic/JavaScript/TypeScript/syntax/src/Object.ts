// Literal_type
const helloWorld = "Hello World";
let hiWorld = "Hi World";

type Easing = "ease-in" | "ease-out" | "ease-in-out";

class UIElement {
  animate (dx: number, dy: number, easing: Easing) {
    if (easing === "ease-in") {
      // ...
    } else if (easing === "ease-out") {
    } else if (easing === "ease-in-out") {
    } else {
      // It's possible that someone could reach this
      // by ignoring your types though.
    }
  }
}
let button = new UIElement();
button.animate(0, 0, "ease-in");

// Array
let list: number[] = [1, 2, 3];
let list1: Array<number> = [1, 2, 3];
const divine_lovers: string[] = ["Zeus", "Aphrodite"];
const digits: Array<number> = [143219876, 112347890];

const not_only_strings: any[] = [];
not_only_strings.push("This Works!")
not_only_strings.push(42);

let a: number[] = [1, 2, 3, 4];
let ro: ReadonlyArray<number> = a;
a = ro as number[];

// tuple
const s: [string, string, boolean] = ['a', 'b', true];

let athena: [string, number];
athena = ['Athena', 9386];
var name1: string = athena[0];
const age1: number = athena[1];

type NamedNums = [
  string,
  ...number[]
];
const b: NamedNums = ['B', 1, 2, 3];

type Color = [
  red: number,
  green: number,
  blue: number
];

type t0 = readonly [number, string]
// 用到了工具类型Readonly<T>
type t1 = Readonly<[number, string]>


let obj: Object;
obj = true;
obj = 'hi';
obj = 1;

obj = { foo: 123 };
obj = [1, 2];
obj = (a: number) => a + 1;
