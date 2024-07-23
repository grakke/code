import { returnGreeting as greeting } from './modules/greetings_module';
import * as allGreetingFunctions from './modules/greetings_module';
import { returnGreeting as greetingLength } from './modules/greetings-utilities_module';
import * as dotenv from 'dotenv';
import * as LoanPrograms from './modules/loan-programs';

// tsc --module commonjs module.ts
greeting('Hola!')  // Displays 'The message from Greetings_module is Hola!'
allGreetingFunctions.returnGreeting('Bonjour');  // Displays 'The message from Greetings_module is Bonjour!'
greetingLength('Ciao!');  // Displays 'The message from GreetingsWithLength_module is Ciao! It is 5 characters long.'


// tsc --module amd *.ts
import sayHi = require('./modules/hi');
sayHi();

const result = dotenv.config();
if (result.error) {
  throw result.error;
}
console.log(result.parsed);  // Returns { DB_HOST: 'localhost', WEB_HOST: 'staging.adventure-works.com' }
console.log(process.env.DB_HOST);
console.log(process.env.WEB_HOST);

let interestOnlyPayment = LoanPrograms.calculateInterestOnlyLoanPayment({ principle: 30000, interestRate: 5 });
let conventionalLoanPayment = LoanPrograms.calculateConventionalLoanPayment({ principle: 30000, interestRate: 5, months: 180 });
console.log(interestOnlyPayment)
console.log(conventionalLoanPayment)