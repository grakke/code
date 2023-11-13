type last_name = string;

class Person {
  constructor(
    public first_name: string,
    public last_name: last_name
  ) { }
}
class ListItem {}

class ListComponent {
  private _things: Array<ListItem>;
  constructor() {
    this._things = [];
  }
  get things(): Array<ListItem> { return this._things; }
}

class CompletedListItem extends ListItem {
  completed: boolean;
  constructor(name: string) {
    super(name);
    this.completed = true;
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

  shoutout() {
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

// 继承
class Shape3D extends Shape {

  volume: number;

  constructor(public name: string, width: number, height: number, length: number) {
    // super 方法调用了基类 Shape 的构造函数 Shape
    super(name, width, height);
    this.volume = length * this.area;
  };

  shoutout() {
    return "I'm " + this.name + " with a volume of " + this.volume + " cm cube.";
  }

  superShout() {
    return super.shoutout();
  }
}

var cube = new Shape3D("cube", 30, 30, 30);
console.log(cube.shoutout());
console.log(cube.superShout());

class Menu {
  // Our properties:
  // By default they are public, but can also be private or protected.
  items: Array<string>;  // The items in the menu, an array of strings.
  pages: number;         // How many pages will the menu be, a number.

  // A straightforward constructor.
  constructor(item_list: Array<string>, total_pages: number) {
    // The this keyword is mandatory.
    this.items = item_list;
    this.pages = total_pages;
  }

  // Methods
  list(): void {
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
  list(): void {
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