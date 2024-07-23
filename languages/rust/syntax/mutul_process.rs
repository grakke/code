use std::sync::Arc;
use std::thread::spawn;

fn main() {
    let arr = vec![1];

    std::thread::spawn(move || {
        println!("{:?}", arr);
    });

    let str = Arc::new(String::from("Hello World"));
    let a = str.clone();
    let b = Arc::clone(&str);
    std::thread::spawn(move || {
        println!("线程: {:?}", b);
    });
    println!("main: {:?}", a);
}
