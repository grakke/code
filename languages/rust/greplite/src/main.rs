use std::env;
use std::fs::File;
use std::io::{self, BufRead, BufReader};

fn main() -> io::Result<()> {
    let args = env::args().collect::<Vec<_>>();
    if args.len() < 3 {
        eprintln!("Usage: greplite <search_string> <file_path>");
        std::process::exit(1);
    }

    let search_string = &args[1];
    let file_path = &args[2];

    run(search_string, file_path)
}

fn run(search_string: &str, file_path: &str) -> io::Result<()> {
    let file = File::open(file_path)?;
    let reader = BufReader::new(file);

    for line in reader.lines() {
        let line = line?;
        if line.contains(search_string) {
            println!("{line}");
        }
    }

    Ok(())
}
