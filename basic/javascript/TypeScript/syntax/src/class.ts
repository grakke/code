class ListItem {
  name: string
  constructor(name: string) {
    this.name = name
  }
}
interface User {
  name: string;
  email: string;
}
class RegisteredUser implements User {
  constructor(
    public name: string,
    public email: string
  ) { }
}

class Shape {

  area: number;
  color: string;

  constructor(public name: string, public width: number, public height: number) {
    this.area = width * height;
    this.color = "pink";
  };

  shoutout () {
    return "I'm " + this.color + " " + this.name + " with an area of " + this.area + " cm squared.";
  }
}

var square = new Shape("square", 30, 30);

console.log(square.shoutout());
console.log('Area of Shape: ' + square.area);
console.log('Name of Shape: ' + square.name);
console.log('Color of Shape: ' + square.color);
console.log('Width of Shape: ' + square.width);
console.log('Height of Shape: ' + square.height);

class Shape3D extends Shape {
  volume: number;
  constructor(public name: string, width: number, height: number, length: number) {
    // super 方法调用了基类 Shape 的构造函数 Shape
    super(name, width, height);
    this.volume = length * this.area;
  };

  shoutout () {
    return "I'm " + this.name + " with a volume of " + this.volume + " cm cube.";
  }

  superShout () {
    return super.shoutout();
  }
}

var cube = new Shape3D("cube", 30, 30, 30);
console.log(cube.shoutout());
console.log(cube.superShout());

class ListComponent {
  private _things: Array<ListItem>;
  constructor() {
    this._things = [];
  }
  get things (): Array<ListItem> { return this._things; }
}

class CompletedListItem extends ListItem {
  completed: boolean;
  constructor(name: string) {
    super(name);
    this.completed = true;
  }
}

class Menu {
  items: Array<string>;
  pages: number;

  constructor(item_list: Array<string>, total_pages: number) {
    this.items = item_list;
    this.pages = total_pages;
  }

  list (): void {
    console.log("Our menu for today:");
    for (var i = 0; i < this.items.length; i++) {
      console.log(this.items[i]);
    }
  }
}
// Create a new instance of the Menu class.
var sundayMenu = new Menu(["pancakes", "waffles", "orange juice"], 1);
// Call the list method.
sundayMenu.list();

class HappyMeal extends Menu {
  // Properties are inherited

  // A new constructor has to be defined.
  constructor(item_list: Array<string>, total_pages: number) {
    // In this case we want the exact same constructor as the parent class (Menu),
    // To automatically copy it we can call super() - a reference to the parent's constructor.
    super(item_list, total_pages);
  }

  // Just like the properties, methods are inherited from the parent.
  // However, we want to override the list() function so we redefine it.
  list (): void {
    console.log("Our special menu for children:");
    for (var i = 0; i < this.items.length; i++) {
      console.log(this.items[i]);
    }

  }
}

// Create a new instance of the HappyMeal class.
var menu_for_children = new HappyMeal(["candy", "drink", "toy"], 1);
// This time the log message will begin with the special introduction.
menu_for_children.list();


interface Vehicle {
  make: string;
  color: string;
  doors: number;
  accelerate (speed: number): string;
  brake (): string;
  turn (direction: 'left' | 'right'): string;
}

class Car implements Vehicle  {
  // Properties
  private static numberOfCars: number = 0;  // New static property
  private _make: string;
  private _color: string;
  private _doors: number;

  // Constructor
  constructor(make: string, color: string, doors = 4) {
    this._make = make;
    this._color = color;
    if ((doors % 2) === 0) {
      this._doors = doors;
    } else {
      throw new Error('Doors must be an even number');
    }
    Car.numberOfCars++;
  }
  // Accessors
  get make() {
    return this._make;
  }
  set make(make) {
    this._make = make;
  }
  get color() {
    return 'The color of the car is ' + this._color;
  }
  set color(color) {
    this._color = color;
  }
  get doors() {
    return this._doors;
  }
  set doors(doors) {
    if ((doors % 2) === 0) {
      this._doors = doors;
    } else {
      throw new Error('Doors must be an even number');
    }
  }

  // Methods
  accelerate(speed: number): string {
    return `${this.worker()} is accelerating to ${speed} MPH.`
  }
  brake(): string {
    return `${this.worker()} is braking with the standard braking system.`
  }
  turn(direction: 'left' | 'right'): string {
    return `${this.worker()} is turning ${direction}`;
  }
  // This function performs work for the other method functions
  protected worker(): string {
    return this._make;
  }

  public static getNumberOfCars(): number {
    return Car.numberOfCars;
  }
}
let myCar1 = new Car('Cool Car Company', 'blue', 2);
console.log(myCar1.color);
let myCar2 = new Car('Galaxy Motors', 'red', 4);
let myCar3 = new Car('Galaxy Motors', 'gray');
console.log(myCar3.doors);
console.log(Car.getNumberOfCars());

class ElectricCar extends Car {
  // Properties unique to ElectricCar
  private _range: number;
  // Constructor
  constructor(make: string, color: string, range: number, doors = 2) {
    super(make, color, doors);
    this._range = range;
  }
  // Accessors
  get range () {
    return this._range;
  }
  set range (range) {
    this._range = range;
  }
  // Methods
  charge () {
    console.log(this.worker() + " is charging.")
  }
  // Overrides the brake method of the Car class
  brake (): string {
    return `${this.worker()}  is braking with the regenerative braking system.`
  }
}
let spark = new ElectricCar('Spark Motors', 'silver', 124, 2);
let eCar = new ElectricCar('Electric Car Co.', 'black', 263);
console.log(eCar.doors);         // returns the default, 2
console.log(spark.brake());
