
fn main() {
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