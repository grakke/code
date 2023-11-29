#[derive(PartialEq, Debug)]
// Declare Car struct to describe vehicle with four named fields
// TO DO: Replace the "mileage" field from the previous exercise with an "age" field
// TO DO" The "age" field should hold tuple value of two fields: String, u32
struct Car {
    color: String,
    motor: Transmission,
    roof: bool,
    mileage: u32,
}

#[derive(PartialEq, Debug)]
// Declare enum for Car transmission type
enum Transmission {
    Manual,
    SemiAuto,
    Automatic,
}

// Get the car quality by testing the value of the input argument
// - miles (u32)
// Create a tuple for the car quality with the age ("New" or "Used") and miles
// Return a tuple with the arrow `->` syntax
fn car_quality(miles: u32) -> (String, u32) {
    // Declare and initialize the return tuple value
    // For a new car, set the miles to 0
    // TO DO: Correct the quality declaration so we can change the values later
    let quality: (String, u32) = ("New".to_string(), 0);

    // Use a conditional expression to check the miles
    // If the car has accumulated miles, then the car is used
    if miles > 0 {
        // TO DO: Add the code to set the quality value for a used car
        quality;
    }

    // TO DO: Return the completed tuple
    return;
}

fn main() {
    // Create car color array
    // TO DO: Set the values: 0 = Blue, 1 = Green, 2 = Red, 3 = Silver
    let colors;

    // Initialize variables
    let (mut index, mut order) = (1, 1);

    // Declare the car type and initial values
    // TO DO: Create "car" as a "Car" struct
    // TO DO: Create "engine" as a "Transmission" enum
    // TO DO: Initialize "roof" to the value when the car has a hard top
    let car = Car;
    let mut miles = 1000; // Start used cars with 1,000 miles
    let mut roof; // convertible = false | hard top = true
    let engine = Transmission;
}
