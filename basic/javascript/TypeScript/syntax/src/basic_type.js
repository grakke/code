// boolean
var isDone = false;
var yes = true;
// number
var decimal = 6;
var float_pi = 3.14159;
var hex = 0xf00d;
var binary = 10;
var octal = 484;
var Bint = 100n;
var y = 0xffffn;
// string
var color = "blue";
color = 'red';
var fullName = "Bob Bobbington";
var age = 37;
var sentence = "Hello, my name is " + fullName + ".\n\nI'll be " + (age + 1) + " years old next month.";
console.log(sentence);
var sym = Symbol();
var obj1 = { foo: 123 };
var obj2 = [1, 2, 3];
var obj3 = function (n) { return n + 1; };
var u = undefined;
var n = null;
// enum
var ContractStatus;
(function (ContractStatus) {
    ContractStatus[ContractStatus["Permanent"] = 1] = "Permanent";
    ContractStatus[ContractStatus["Temp"] = 2] = "Temp";
    ContractStatus[ContractStatus["Apprentice"] = 3] = "Apprentice";
})(ContractStatus || (ContractStatus = {}));
var employeeStatus = ContractStatus.Temp;
console.log(employeeStatus);
// 允许指定起始序号
var RomanceLanguages;
(function (RomanceLanguages) {
    RomanceLanguages[RomanceLanguages["Spanish"] = 1] = "Spanish";
    RomanceLanguages[RomanceLanguages["French"] = 2] = "French";
    RomanceLanguages[RomanceLanguages["Italian"] = 3] = "Italian";
    RomanceLanguages[RomanceLanguages["Romanian"] = 4] = "Romanian";
    RomanceLanguages[RomanceLanguages["Portuguese"] = 5] = "Portuguese";
})(RomanceLanguages || (RomanceLanguages = {}));
;
var lang1 = RomanceLanguages.French;
console.log(lang1); // 'Romanian'
console.log(RomanceLanguages[0]); // undefined
