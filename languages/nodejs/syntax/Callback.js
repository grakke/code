/*block sample*/
var fs = require('fs');

var data = fs.readFileSync('input.txt');

//  阻塞
console.log(data.toString());
console.log('代码执行结束1');

//  非阻塞
fs.readFile('input.txt', function (err, data) {
	if (err) {
		return console.error(err);
	}
	console.log(data.toString());
});
console.log('代码执行结束2');
