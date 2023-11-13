
// array
const divine_lovers: string[] = ["Zeus", "Aphrodite"];
const digits: Array<number> = [143219876, 112347890];

const not_only_strings: any[] = [];
not_only_strings.push("This Works!")
not_only_strings.push(42);

// tuple
let x: [string, number];
x = ["hello", 10]; // OK

let athena: [string, number];
athena = ['Athena', 9386];

var name1: string = athena[0];
const age1: number = athena[1];

enum Color1 { Red, Green, Blue };
// const red : Color = Color1.Red;
console.log(Color1[0]); // 'Red'

// 允许指定起始序号
enum RomanceLanguages { Spanish = 1, French, Italian, Romanian, Portuguese };
console.log(RomanceLanguages[4]); // 'Romanian'
console.log(RomanceLanguages[0]); // undefined

// enum
enum Color {
  Red = 1,
  Green = 2,
  Blue = 4,
}
let c: Color = Color.Green;

let obj: Object;
obj = true;
obj = 'hi';
obj = 1;
obj = { foo: 123 };
obj = [1, 2];
obj = (a: number) => a + 1;