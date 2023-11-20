"\u0061";

"\uD842\uDFB7";
"\u{20BB7}";

"\u{1F680}" === "\uD83D\uDE80";

'\z' === 'z'  // true
'\172' === 'z' // true
'\x7A' === 'z' // true
'\u007A' === 'z' // true
'\u{7A}' === 'z' // true

for (let codePoint of "foo") {
    console.log(codePoint);
}

// $("#result").append(`
//   There are <b>${basket.count}</b> items
//    in your basket, <em>${basket.onSale}</em>
//   are on sale!
// `);

let x = 1;
let y = 2;
`${x} + ${y * 2} = ${x + y * 2}`;
let obj = { x: 1, y: 2 };
`${obj.x + obj.y}`;

function fn() {
    return "Hello World";
}
`foo ${fn()} bar`;

const tmpl = addrs => `
  <table>
  ${addrs
        .map(
            addr => `
    <tr><td>${addr.first}</td></tr>
    <tr><td>${addr.last}</td></tr>
  `
        )
        .join("")}
  </table>
`;
const data = [
    { first: "<Jane>", last: "Bond" },
    { first: "Lars", last: "<Croft>" }
];
console.log(tmpl(data));

let func = name => `Hello ${name}!`;
func("Jack");

// 通过模板字符串生成正式模板
let template = `
<ul>
  <% for(let i=0; i < data.supplies.length; i++) { %>
    <li><%= data.supplies[i] %></li>
  <% } %>
</ul>
`;

function compile(template) {
    const evalExpr = /<%=(.+?)%>/g;
    const expr = /<%([\s\S]+?)%>/g;

    template = template
        .replace(evalExpr, "`); \n  echo( $1 ); \n  echo(`")
        .replace(expr, "`); \n $1 \n  echo(`");

    template = "echo(`" + template + "`);";

    let script = `(function parse(data){
      let output = "";

      function echo(html){
        output += html;
      }

      ${template}

      return output;
    })`;

    return script;
}
let parse = eval(compile(template));
console.log(parse({ supplies: ["broom", "mop", "cleaner"] }));

// 标签模板
let a = 5;
let b = 10;
// 第一个参数是一个数组，该数组的成员是模板字符串中没有变量替换的部分
// 其他参数，都是模板字符串各个变量被替换后的值
function tag(s, v1, v2) {
    console.log(s[0]);
    console.log(s[1]);
    console.log(s[2]);
    console.log(v1);
    console.log(v2);

    return "OK";
}
tag`Hello ${a + b} world ${a * b}`;
// 等同于
tag(["Hello ", " world ", ""], 15, 50);
// "Hello "
// " world "
// ""
// 15
// 50
// "OK"

let total = 30;
let msg = passthru`${total} The total is ${total} (${total * 1.05} with tax)`;
function passthru(literals) {
    let result = "";
    let i = 0;

    while (i < literals.length) {
        result += literals[i++];
        if (i < arguments.length) {
            result += arguments[i];
        }
    }

    return result;
}
console.log(msg);

let sender = "&amp;sdfgasdgafsd&amp;";
let message = SaferHTML`<p>${sender} has sent you a message.</p>`;
function SaferHTML(templateData) {
    let s = templateData[0];
    for (let i = 1; i < arguments.length; i++) {
        let arg = String(arguments[i]);

        // Escape special characters in the substitution.
        s += arg
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");

        // Don't escape special characters in the template.
        s += templateData[i];
    }
    return s;
}
console.log(message);
// <p>&lt;script&gt;alert("abc")&lt;/script&gt; has sent you a message.</p>

i18n`Welcome to ${siteName}, you are visitor number ${visitorNumber}!`
// "欢迎访问xxx，您是第xxxx位访问者！"

// 调用其他语言
// java`
// class HelloWorldApp {
//   public static void main(String[] args) {
//     System.out.println("Hello World!"); // Display the string.
//   }
// }
// `
// HelloWorldApp.main();
// ES5不能识别码点大于0xFFFF的字符,ES6可以识别大于0xFFFF的字符
String.fromCharCode(0x20bb7);

// 返回一个斜杠都被转义（即斜杠前面再加一个斜杠）的字符串，往往用于模板字符串的处理方法
String.raw`Hi\n${2 + 3}!`; // 实际返回 "Hi\\n5!"，显示的是转义后的结果 "Hi\n5!"
String.raw({ raw: ["foo", "bar"] }, 1 + 2);

// 代码实现
String.raw = function (strings, ...values) {
    let output = "";
    let index;
    for (index = 0; index < values.length; index++) {
        output += strings.raw[index] + values[index];
    }

    output += strings.raw[index];
    return output;
};


// 对于这种4个字节的字符，JavaScript 不能正确处理，字符串长度会误判为2，而且charAt()方法无法读取整个字符，charCodeAt()方法只能分别返回前两个字节和后两个字节的值
var s = "𠮷";
s.length; // 2
s.charAt(0); // ''
s.charAt(1); // ''
s.charCodeAt(0); // 55362
s.charCodeAt(1); // 57271

let s = "𠮷a";
s.codePointAt(0); // 134071
s.codePointAt(1); // 57271
s.codePointAt(2); // 97
s.codePointAt(0).toString(16); // "20bb7"
s.codePointAt(2).toString(16); // "61"

let arr = [..."𠮷a"]; // arr.length === 2
arr.forEach(ch => console.log(ch.codePointAt(0).toString(16)));

String.fromCodePoint(0x78, 0x1f680, 0x79) === 'x\uD83D\uDE80y'
// true

'\u01D1'.normalize() === '\u004F\u030C'.normalize() // true

let s = "Hello world!";
s.startsWith("Hello"); // true
s.endsWith("!"); // true
s.includes("o"); // true

"hello".repeat(2); // "hellohello"
"na".repeat(2.9); // "nana"

// 符串补全长度的功能。如果某个字符串不够指定长度，会在头部或尾部补全
"x".padStart(5, "ab"); // 'ababx'
"x".padStart(4, "ab"); // 'abax'
"x".padEnd(5, "ab"); // 'xabab'
"x".padEnd(4, "ab"); // 'xaba'

const s = "  abc  ";
s.trim(); // "abc"
s.trimStart(); // "abc  "
s.trimEnd(); // "  abc"

'aabbcc'.replaceAll('b', '_')
// 'aa__cc'
// $& 表示匹配的字符串，即`b`本身
// 所以返回结果与原字符串一致
'abbc'.replaceAll('b', '$&')
// 'abbc'

// $` 表示匹配结果之前的字符串
// 对于第一个`b`，$` 指代`a`
// 对于第二个`b`，$` 指代`ab`
'abbc'.replaceAll('b', '$`')
// 'aaabc'

// $' 表示匹配结果之后的字符串
// 对于第一个`b`，$' 指代`bc`
// 对于第二个`b`，$' 指代`c`
'abbc'.replaceAll('b', `$'`)
// 'abccc'

// $1 表示正则表达式的第一个组匹配，指代`ab`
// $2 表示正则表达式的第二个组匹配，指代`bc`
'abbc'.replaceAll(/(ab)(bc)/g, '$2$1')
// 'bcab'

// $$ 指代 $
'abc'.replaceAll('b', '$$')
// 'a$c'

'aabbcc'.replaceAll('b', () => '_')
// 'aa__cc'
