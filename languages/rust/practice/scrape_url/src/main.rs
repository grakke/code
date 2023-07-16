use std::fs;

// fn apply(value:i32,f:fn(i32)->i32)->i32{
//     f(value)
// }

// fn square(value:i32)->i32{
//     value*value
// }

// fn cube(value:i32)->i32{
//     value*value*value
// }
// fn pi()->f64{
//     3.1415926
// }
// fn not_pi(){
//     3.1415926;
// }

fn main() {
    /////// 1. scrape url

    let url = "https://www.rust-lang.org/";
    let output = "rust.md";

    println!("Fetching url:{}", url);
    // let body = reqwest::blocking::get(url).unwrap().text().unwrap();
    let body = reqwest::blocking::get(url)?.text()?;

    println!("Converting html to markdown .....");
    let md = html2md::parse_html(&body);

    // fs::write(output, md.as_bytes()).unwrap();
    fs::write(output, md.as_bytes())?;
    println!("Converted markdown has been saved in {}", output);

    /////// 2. function
    // println!("apply suqare:{}", apply(4,square));
    // println!("apply cube:{}", apply(4,cube));

    // let is_pi = pi();
    // let is_unit1 = not_pi();
    // let is_unit2 = {
    //     pi();
    // };
    // println!("is_pi:{:?},is_unit1:{:?},is_unit2:{:?}", is_pi, is_unit1, is_unit2);

    /////// 3. data struct
    // let alice = User {
    //     id: UserId(1),
    //     name: "Alice".into(),
    //     gender: Gender::Female,
    // };
    // let bob = User {
    //     id: UserId(2),
    //     name: "Bob".into(),
    //     gender: Gender::Male,
    // };
    // let topic = Topic {
    //     id: TopicId(1),
    //     name: "Rust".into(),
    //     owner: UserId(1),
    // };

    // let event1 = Event::Join((alice.id, topic.id));
    // let event2 = Event::Join((bob.id, topic.id));
    // let event3 = Event::Message((bob.id, topic.id, "Start learning Rust".into()));
    // let event4 = Event::Leave((bob.id, topic.id));

    // println!(
    //     "event1: {:?}, event2: {:?}, event3: {:?},event4: {:?}",
    //     event1, event2, event3, event4
    // );

    ///// 4 控制流程
    // let n = 10;
    // fib_for(n);
    // fib_loop(n);
    // fib_while(10);
}

///// 数据结构
// #[derive(Debug)]
// enum Gender {
//     Female = 1,
//     Male = 2,
// }

// #[derive(Debug, Copy, Clone)]
// struct UserId(u64);

// #[derive(Debug)]
// struct User {
//     id: UserId,
//     name: String,
//     gender: Gender,
// }

// #[derive(Debug, Copy, Clone)]
// struct TopicId(u64);
// #[derive(Debug)]
// struct Topic {
//     id: TopicId,
//     name: String,
//     owner: UserId,
// }

// #[derive(Debug)]
// enum Event {
//     Join((UserId, TopicId)),
//     Leave((UserId, TopicId)),
//     Message((UserId, TopicId, String)),
// }

//// 控制流程
// fn fib_loop(n: u8) {
//     let mut a = 1;
//     let mut b = 1;
//     let mut i = 2u8;

//     loop {
//         let c = a + b;
//         a = b;
//         b = c;
//         i += 1;
//         println!("next val is: {}", b);
//         if i >= n {
//             break;
//         }
//     }
// }

// fn fib_while(n: u8) {
//     let (mut a, mut b, mut i) = (1, 1, 2);
//     while i < n {
//         let c = a + b;
//         a = b;
//         b = c;
//         i += 1;

//         println!("next val is {:?}", b);
//     }
// }

// fn fib_for(n: u8) {
//     let (mut a, mut b) = (1, 1);
//     for _i in 2..n {
//         let c = a + b;
//         a = b;
//         b = c;
//         println!("next val is {:?}", b);
//     }
// }
