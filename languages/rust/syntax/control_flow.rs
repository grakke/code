fn fib_loop(n: u8) {
    let mut a = 1;
    let mut b = 1;
    let mut i = 2u8;

    loop {
        next_fib(&mut a, &mut b);
        println!("next val is {}", b);

        if i >= n {
            break;
        }
    }
}

fn fib_while(n: u8) {
    let (mut a, mut b, mut i) = (1, 1, 2);

    while i < n {
        next_fib(&mut a, &mut b);
        i += 1;

        println!("next val is {}", b);
    }
}


fn fib_for(n: u8) {
    let (mut a, mut b) = (1, 1);

    for _i in 2..n {
        next_fib(&mut a, &mut b);

        println!("next val is {}", b);
    }
}

fn next_fib(a: &mut i32, b: &mut i32) {
    let c = *a + *b;
    *a = *b;
    *b = c;
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

fn is_divisible_by(dividend: u32, divisor: u32) -> bool {
    if divisor == 0 {
        println!("\nError! Division by zero is not allowed.");
        // To prevent division by zero, halt execution and return to the caller
        return false;
    } else if dividend % divisor > 0 {
        println!(
            "\n{} % {} has a remainder of {}.",
            dividend,
            divisor,
            (dividend % divisor)
        );
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

fn calculate_tax(income: i32) -> i32 {
    if income < 10 {
        return 0;
    } else if income >= 10 && income < 50 {
        return 20;
    } else {
        return 50;
    }
}

fn main() {
    let n = 10;
    fib_loop(n);
    fib_while(n);
    fib_for(n);

    if is_zero(0) {
        println!("The value is zero.");
    }
    let file = read_file("main.rs");

    if file.is_some() {
        let contents = file.unwrap();
        println!("{}", contents);
    } else {
        println!("Empty!");
    }

    match file {
        Some(contents) => println!("{}", contents),
        None => println!("Empty!"),
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

    if 1 == 2 {
        println!("True, the numbers are equal.");
    } else {
        println!("False, the numbers are not equal.");
    }

    let formal = true;
    let greeting = if formal { // "if" keyword used here as an expression
        "Good day to you."     // Returns the string "Good day to you."
        } else {
        "Hey!"                 // Returns the string "Hey!"
    };
    println!("{}", greeting)   // Prints "Good day to you."

    let num = 500; // "num" can be set at some point in the program, for now set it to 500
    let out_of_range: bool;
    if num < 0 {
        out_of_range = true;
    } else if num == 0 {
        out_of_range = true;
    } else if num > 512 {
        out_of_range = true;
    } else {
        out_of_range = false;
    }

    let income = 100;
    let tax = calculate_tax(income);
    println!("{}", tax);

    let mut counter = 1;
    // stop_loop is set when loop stops
    let stop_loop = loop {
        counter *= 2;
        if counter > 100 {
            // Stop loop, return counter value
            break counter;
        }
    };
    // Loop should break when counter = 128
    println!("Break the loop at counter = {}.", stop_loop);

    // Order 11 cars
    // TO DO: Replace "loop expression" - loop 11 times, use "order" variable
    loop expression {

        // Set car transmission type
        engine = Transmission::Manual;

        // Order the cars, New are even numbers, Used are odd numbers
        // TO DO: Fix indexing into `colors` array, vary color for the orders
        if index % 2 != 0 {
            car = car_factory(colors().to_string(), engine, roof, miles);
        } else {
            car = car_factory(colors().to_string(), engine, roof, 0);
        }

        // Display car order details
        println!("{}: {}, Closed roof, {:?}, {}, {} miles", order, car.age.0, car.motor, car.color, car.age.1);

        // Change values for next loop
        // TO DO: Increment "order" by 1, and "miles" by 1,000
        order;
        miles;

        // Adjust the index for the car details
        // Order 11 cars, use index range of 0 -- 4, then repeat from 0
        if index < 4 {
            index = index + 1;
        } else {
            index = 1;
        }
    }

    while counter < 5 {
        println!("We loop a while...");
        counter = counter + 1;
    }

    let big_birds = ["ostrich", "peacock", "stork"];
    for bird in big_birds.iter() {
        println!("The {} is a big bird.", bird);
    }

    for number in 0..5 {
        println!("{}", number * 2);
    }


    let mut count = 0;
    while count < 10 {
        println!("{}", count);
        count += 1;
    }

    let numbers = [1, 2, 3, 4, 5];

    for n in numbers.iter() {
        println!("{}", n);
    }

    for n in 1..5 {
        println!("{}", n);
    }

    // Iterators
    let numbers = vec![1, 2, 3, 4, 5];

    let double = |n: &i32| -> i32 { n * 2 };
    let less_than_10 = |n: &i32| -> bool { *n < 10 };

    let result: Vec<i32> = numbers.iter().map(double).filter(less_than_10).collect();
    println!("{:?}", result); // [2, 4, 6, 8]

    let rgb = [96, 172, 57];
    let [red, green, blue] = rgb;
    println!("{}", red); // 96
    println!("{}", green); // 172
    println!("{}", blue); // 57

    let person = Person {
    name: "shesh".to_string(),
    city: "singapore".to_string(),
    };
    let Person { name, city } = person;
    println!("{}", name); // name
    println!("{}", city); // city

    let point = Point { x: 10, y: 0 };

    match point {
    Point { x: 0, y: 0 } => println!("both are zero"),
    Point { x: 0, y } => println!("x is zero and y is {}", y),
    Point { x, y: 0 } => println!("x is {} and y is zero", x),
    Point { x, y } => println!("x is {} and y is {}", x, y),
    }

        print_color("rose"); // roses are red,
        print_color("violet"); // violets are blue,
        print_color("you"); // sugar is sweet, and so are you.
    }

    fn print_color(color: &str) {
    match color {
        "rose" => println!("roses are red,"),
        "violet" => println!("violets are blue,"),
        _ => println!("sugar is sweet, and so are you."),
    }
}


struct Person {
    name: String,
    city: String,
  }


// compare
truct Point {
    x: i32,
    y: i32,
}