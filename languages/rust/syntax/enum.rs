use std::collections::HashMap;
use std::mem::size_of;

enum Direction {
    Forward,
    Backward,
    Left,
    Right,
}

enum Operation {
    PowerOn,
    PowerOff,
    Move(Direction),
    Rotate,
    TakePhoto { is_landscape: bool, zoom_level: i32 },
}

fn operate_drone(operation: Operation) {
    match operation {
        Operation::PowerOn => println!("Power On"),
        Operation::PowerOff => println!("Power Off"),
        Operation::Move(direction) => move_drone(direction),
        Operation::Rotate => println!("Rotate"),
        Operation::TakePhoto {
            is_landscape,
            zoom_level,
        } => println!("TakePhoto {}, {}", is_landscape, zoom_level),
    }
}

fn move_drone(direction: Direction) {
    match direction {
        Direction::Forward => println!("Move Forward"),
        Direction::Backward => println!("Move Backward"),
        Direction::Left => println!("Move Left"),
        Direction::Right => println!("Move Right"),
    }
}

enum E {
    A(f64),
    B(HashMap<String, String>),
    C(Result<Vec<u8>, String>),
}

// 一个声明宏，会打印各种数据结构本身的大小，在 Option 中的大小，以及在 Result 中的大小
macro_rules! show_size {
    (header) => {
        println!(
            "{:<24} {:>4}    {}    {}",
            "Type", "T", "Option<T>", "Result<T, io::Error>"
        );
        println!("{}", "-".repeat(64));
    };
    ($t:ty) => {
        println!(
            "{:<24} {:4} {:8} {:12}",
            stringify!($t),
            size_of::<$t>(),
            size_of::<Option<$t>>(),
            size_of::<Result<$t, std::io::Error>>(),
        )
    };
}

fn main() {
    show_size!(header);
    show_size!(u8);
    show_size!(f64);
    show_size!(&u8);
    show_size!(Box<u8>);
    show_size!(&[u8]);

    show_size!(String);
    show_size!(Vec<u8>);
    show_size!(HashMap<String, String>);
    show_size!(E);

    operate_drone(Operation::Move(Direction::Forward));
    operate_drone(Operation::TakePhoto {
        is_landscape: true,
        zoom_level: 10,
    })
}
