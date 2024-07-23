// numbers
let x = 123; // i32
let y = 4.5; // f64
println!("The numbe is {} {}",x,y);

let number: u32 = 14;
println!("The number is {}.", number);

let number_64 = 4.0;      // compiler infers the value to use the default type f64
let number_32: f32 = 5.0; // type f32 specified via annotation

// boolean
let x = false;

// Specify the data type "char"
let character_1: char = 'S';
let character_2: char = 'f';

// Complier interprets a single item in quotations as the "char" data type
let smiley_face = '😃';

// Complier interprets a series of items in quotations as a "str" data type and creates a "&str" reference
let string_1 = "miley ";

// Specify the data type "str" with the reference syntax "&str"
let string_2: &str = "ace";

println!("{} is a {}{}{}{}.", smiley_face, character_1, string_1, character_2, string_2);

// strings
let name = "Saitama"; // &str
let name  = String::from("Genos"); // String
let name2 = "King".to_string();    // String
let name3 = name2.as_str();     // &str

// Tuple of length 3
let tuple_e = ('E', 5i32, true);
// Use tuple indexing and show the values of the elements in the tuple
println!("Is '{}' the {}th letter of the alphabet? {}", tuple_e.0, tuple_e.1, tuple_e.2);

// Classic struct with named fields
struct Student { name: String, level: u8, remote: bool }

// Tuple struct with data types only
struct Grades(char, char, char, char, f32);

// Unit struct
struct Unit;

// Instantiate a MouseClick struct and bind the coordinate values
let click = MouseClick { x: 100, y: 250 };
println!("Mouse click location: {}, {}", click.x, click.y);

// Instantiate a KeyPress tuple and bind the key values
let keys = KeyPress(String::from("Ctrl+"), 'N');
println!("\nKeys pressed: {}{}", keys.0, keys.1);

// Instantiate WebEvent enum variants
// Set the boolean page Load value to true
let we_load = WebEvent::WELoad(true);
// Set the WEClick variant to use the data in the click struct
let we_click = WebEvent::WEClick(click);
// Set the WEKeys variant to use the data in the keys tuple
let we_key = WebEvent::WEKeys(keys);

// Print the values in the WebEvent enum variants
// Use the {:#?} syntax to display the enum structure and data in a readable form
println!("\nWebEvent enum structure: \n\n {:#?} \n\n {:#?} \n\n {:#?}", we_load, we_click, we_key);enum WebEvent {
    // An enum variant can be like a unit struct without fields or data types
    WELoad,
    // An enum variant can be like a tuple struct with data types but no named fields
    WEKeys(String, char),
    // An enum variant can be like a classic struct with named fields and their data types
    WEClick { x: i64, y: i64 }
}

// Declare Car struct to describe vehicle with four named fields
struct Car {
    color: String,
    transmission: Transmission,
    convertible: bool,
    mileage: u32,
}

#[derive(PartialEq, Debug)]
// Declare enum for Car transmission type
// TO DO: Fix enum definition so code compiles
enum Transmission {
    Manual;
    SemiAuto;
    Automatic;
}

// Build a "Car" by using values from the input arguments
// - Color of car (String)
// - Transmission type (enum value)
// - Convertible (boolean, true if car is a convertible)
fn car_factory(color: String, transmission: Transmission, convertible: bool)->Car {

    // TO DO: Complete "car" declaration to be an instance of a "Car" struct
    // Use the values of the input arguments
    // All new cars always have zero mileage
    let car: Car;

}

// array
let list = [1, 2, 3]; //  fixed size
let mut list = vec![1, 2, 3]; //  grow/shrink in size

// Hashmap
use std::collections::HashMap;

  let mut colors = HashMap::new();

  colors.insert("white".to_string(), "#fff");
  colors.insert("black".to_string(), "#000");

  println!("{:?}", colors.get("white").unwrap()); // #fff

// Bag of data
struct Employee {
    name: String,
    age: i32,
    occupation: String,
  }

    let employee = Employee {
      name: "Saitama".to_string(),
      age: 25,
      occupation: "Hero".to_string(),
    };
}


fn main() {
    // We have orders for three new cars!
    // We'll declare a mutable car variable and reuse it for all the cars
    let mut car = car_factory(String::from("Red"), Transmission::Manual, false);
    println!("Car 1 = {}, {:?} transmission, convertible: {}, mileage: {}", car.color, car.transmission, car.convertible, car.mileage);

    car = car_factory(String::from("Silver"), Transmission::Automatic, true);
    println!("Car 2 = {}, {:?} transmission, convertible: {}, mileage: {}", car.color, car.transmission, car.convertible, car.mileage);

    car = car_factory(String::from("Yellow"), Transmission::SemiAuto, false);
    println!("Car 3 = {}, {:?} transmission, convertible: {}, mileage: {}", car.color, car.transmission, car.convertible, car.mileage);
}