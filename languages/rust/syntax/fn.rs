fn calculate_tax(income: i32) -> i32 {
    income * 90 / 100;
}

fn is_divisible_by(dividend: u32, divisor: u32) -> bool {
    if divisor == 0 {
        println!("\nError! Division by zero is not allowed.");
        // To prevent division by zero, halt execution and return to the caller
        return false;
    } else if dividend % divisor > 0 {
        println!("\n{} % {} has a remainder of {}.", dividend, divisor, (dividend % divisor));
    } else {
        println!("\n{} % {} has no remainder.", dividend, divisor);
    }

    // Create the boolean value and return it to the function caller
    dividend % divisor == 0
}

fn is_zero(input: u8) -> bool {
    if input == 0 {
        return true;
    }
    false
}
fn read_file(path: &str) -> Option<&str> {
    let contents = "hello";

    if path != "" {
        return Some(contents);
    }

  match file {
    Some(contents) => println!("{}", contents),
    None => println!("Empty!"),
  }
    return None;
}

fn main() {
    let income = 100;
    let tax = calculate_tax(income);
    println!("{}", tax);

    is_divisible_by(12, 4);
    is_divisible_by(13, 5);
    is_divisible_by(14, 0);

    if is_zero(0) {
        println!("The value is zero.");
    }
    let file = read_file("path/to/file");

    if file.is_some() {
        let contents = file.unwrap();
        println!("{}", contents);
    } else {
        println!("Empty!");
    }

    if is_divisible_by(12, 4) {
        println!("12 is evenly divisible by 4.");
    }

    // 13 % 5 has a remainder of 2
    if is_divisible_by(13, 5) {
        println!("13 is evenly divisible by 5.");
    }

    // 14 % 0 is division by zero, print an error message
    if is_divisible_by(14, 0) {
        println!("14 is evenly divisible by 0.");
    }
      match file {
    Some(contents) => println!("{}", contents),
    None => println!("Empty!"),
  }

    let income = 100;
    let tax = calculate_tax(income);
    println!("{}", tax);
}

// closure Without arguments
let greet = || println!("hello");
greet(); // "hello"
// With arguments:
let greet = |msg: &str| println!("{}", msg);
greet("good morning!"); // "good morning!"

let add = |a: i32, b: i32| -> i32 { a + b };
add(1, 2);
// 多行
let add = |a: i32, b: i32| -> i32 {
    let sum = a + b;
    return sum;
};
add(1, 2);
