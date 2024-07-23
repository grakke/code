use std::fs;
use structopt::StructOpt;

#[derive(StructOpt, Debug)]
#[structopt(name = "scrape_url")]
struct Opt {
    #[structopt(help = "input url", parse(try_from_str = parse_url))]
    pub url: String,
    #[structopt(help = "output file, stdout if not present")]
    pub output: Option<String>,
}

fn main() -> Result<(), Box<dyn std::error::Error>> {
    // cargo run -- https://www.rust-lang.org rust.md
    let args = std::env::args().collect::<Vec<String>>();
    if args.len() < 3 {
        println!("Usage: url outpath");
        return Ok(());
    }

    let url = "https://www.rust-lang.org/";
    let output = "rust.md";

    if let [_path, url, output, ..] = args.as_slice() {
        println!("url: {}, output: {}", url, output);
    } else {
        println!("Use default parameter");
    }

    // let opt = Opt::from_args();

    // let url = opt.url;
    // let output = &opt.output.unwrap_or("rust.md".to_string());

    println!("Fetching url:{}", url);
    let body = reqwest::blocking::get(url)?.text()?;

    println!("Converting html to markdown .....");
    let md = html2md::parse_html(&body);

    fs::write(output, md.as_bytes())?;
    println!("Converted markdown has been saved in {}", output);

    Ok(())
}
