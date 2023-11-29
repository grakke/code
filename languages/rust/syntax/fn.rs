// fn calculate_tax(income: i32) -> i32 {
//     income * 90 / 100;
// }

fn apply(value: i32, f: fn(i32) -> i32) -> i32 {
    f(value)
}

fn square(value: i32) -> i32 {
    value * value
}

fn cube(value: i32) -> i32 {
    value * value * value
}
fn pi() -> f64 {
    3.1415926
}
fn not_pi() {
    3.1415926;
}

fn main() {
    println!("apply suqare:{}", apply(4, square));
    println!("apply cube:{}", apply(4, cube));

    let is_pi = pi();
    let is_unit1 = not_pi();
    let is_unit2 = {
        pi();
    };
    println!(
        "is_pi:{:?},is_unit1:{:?},is_unit2:{:?}",
        is_pi, is_unit1, is_unit2
    );

    // let income = 100;
    // let tax = calculate_tax(income);
    // println!("{}", tax);

    // is_divisible_by(12, 4);
    // is_divisible_by(13, 5);
    // is_divisible_by(14, 0);

    // let income = 100;
    // let tax = calculate_tax(income);
    // println!("{}", tax);

    // // closure Without arguments
    // let greet = || println!("hello");
    // greet(); // "hello"

    // // With arguments:
    // greet = |msg: &str| println!("{}", msg);
    // greet("good morning!"); // "good morning!"

    let add = |a: i32, b: i32| -> i32 { a + b };
    add(1, 2);
    // 多行
    let add = |a: i32, b: i32| -> i32 {
        let sum = a + b;
        return sum;
    };
    add(1, 2);
}
