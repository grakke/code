
// array
let list: number[] = [1, 2, 3];
let list1: Array<number> = [1, 2, 3];

// tuple
let x: [string, number];
// Initialize it
x = ["hello", 10]; // OK

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