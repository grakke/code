type last_name = string;

class Person {
  // 类属性
  type: string;
  // 类私有属性
  protected name: string;
  private age: number;

  // getter
  get personName() {
    return "person" + this.name;
  }

  // setter
  set personName(v: string) {
    this.name = "set person" + v;
  }

  get personAge() {
    return this.age;
  }

  // 类构建方法
  constructor(n: string, a: number) {
    this.type = "人类";
    this.name = n;
    this.age = a;
    //   public first_name: string;
    // public last_name: last_name
  }

  // 类方法
  greet() {
    console.log("你好");
  }
}

// 使用关键词 extends 定义 Fronter 类继承 Person 类
class Fronter extends Person {
  constructor(n: string, a: number) {
    super(n, a);
    this.type = "前端人类";
  }

  greetWithInfo() {
    // private 与 protected 关键字同样是将属性设置为私有属性
    // const age = this.age; // 无法访问，private 修饰的属性只有 Person 类本身可以访问
    // const name = this.name; // 可以访问，protected 设置的属性除了类本身外，继承类中也能访问
    console.log(`你好，我叫${name}，我的年龄是${age}。`);
  }
}

const person = new Fronter("前端人类", 99);

console.log("person.type: ", person.type); // 人类
// console.log("person.name: ", person.name); // 私有属性，class 外部无法直接访问
console.log("person.personName: ", person.personName); // 通过 getter 获取想要的私有属性
person.personName = "前端人类plus"; // 通过 setter 设置属性