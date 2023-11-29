// Declare a variable
const a_number;

// Declare a second variable and bind the value
const a_word = "Ten";

// Bind a value to the first variable
a_number = 10;

println!("The number is {}.", a_number);
println!("The word is {}.", a_word);

// Declare first variable binding with name "shadow_num"
let shadow_num = 5;

// Declare second variable binding, shadows existing variable "shadow_num"
let shadow_num = shadow_num + 5;

// Declare third variable binding, shadows second binding of variable "shadow_num"
let shadow_num = shadow_num * 2;

println!("The number is {}.", shadow_num);