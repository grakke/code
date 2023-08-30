# [Python Programming MOOC 2023](https://programming-23.mooc.fi/)

## The Introduction to Programming parts 1~7 in the material

### Part 1

- Getting started
  - use the print command
  - use programming for arithmetic operations
  - single quotation print out the actual quotation marks themselves:
- Information from the user
  - write a program which uses input from the user
  - use variables to store input and print it out
  - combine strings
- More about variables
  - use variables in different contexts
    - the variable is assigned a new value.
    - variables naming
      - name variables according to what they are used for
      - A variable name should begin with a letter, and it can only contain letters, numbers and underscores _
      - Lowercase and uppercase letters are different characters
      - use only lowercase characters in variable names. If the variable name consists of multiple words, use an underscore between the words
  - what kind of data can be stored in variables
    - A string can contain numbers, but it is processed differently.
    - different operations affect different types of variables in different ways.
    - print command also has built-in functionalities that support combining different types of values:
      - add a comma between the values. All the values will be printed out regardless of their type
      - automatically inserted whitespace between each comma-separated part of the printout
    - f-strings are another way of formatting printouts, can contain multiple variables.内部支持计算
    - Each print command usually prints out a line of its own, complete with a change of line at the end. if the print command is given an additional argument end = "", it will not print a line change.
  - The difference between strings, integers and floating point numbers
- Arithmetic operations
  - use variables in various arithmetic operations
    - The order of operations is familiar from mathematics: first calculate the exponents, then multiplication and division, and finally addition and subtraction. The order can be changed with parentheses.
    - Operands, operators and data types
    - integer division operator //
    - Division (floating point result)
  - deal with numbers in user input
    - "Reusing" a variable only makes sense when there is a need to temporarily store things of a similar type and purpose
    - *= +=
  - cast values into other fundamental data types
- Conditional statements
  - use a simple conditional statement in programming
    - Comparison operators
    - in 不能做变量命
  - what a Boolean value is
    - Any condition used in a conditional statement will result in a truth value, that is, either true or false.
    - Variables of type bool can only have two values: True or False.
    - Any bit of code that results in a Boolean value is called a Boolean expression.
  - express conditionals with comparison operators
    - Loyalty bonus

```python
print("2 + 2 * 10") # 2 + 2 * 10
# there are 365 days in a year and 24 hours in each day
print(365*24)
print('print("Hello there!")')

name = input("What is your name?")

result = 10 * 25
# the following line produces an error
print("The result is " + result)
print("The result is " + str(result))
print("The result is", result)
print(f"The result is {result}")

print("Hi", name, ", you are", age, "years old. You live in", city, ".")

print("Hi ", end="")
print("there!")

number = int(input("Please type in a number:"))
print(f"{number} times 5 is {5 * number}")
```

### part 2

- Programming terminology
  - familiar with some essential terminology in programming
    - Statement a conditional statement.contain two statements (a print statement and an assignment statement)
    - Block a group of consecutive statements that are at the same level in the structure of the program
      - expressed by indenting all code in the block by the same amount of whitespace.
    - Expression
      - An expression is a bit of code that results in a determined data type
      - Because all expressions have a type, they can be assigned to variables
    - A function executes some functionality.
      - Functions can also take one or more arguments, which are data that can be fed to and processed by the function.
      - Arguments are sometimes also referred to as parameters. There is a technical distinction between an argument and a parameter, but the words are often used interchangeably.
      - A function is executed when it is called. That is, when the function (and its arguments, if any) is mentioned in the code.
  - know the difference between a statement and an expression
  - be able to find out the data type of an evaluated expression
    - Data type
      - type("Anna")
    - Syntax
      - print
        - 双引号 纯文本 不解析变量
        - 变量名 解析
        - ， 插入拼接
        - f 混合 {} 变量解析
    - Debugging
      - Bugs manifest in different ways. Some bugs cause an error during execution.
      - Errors during execution are usually rather easy to fix, because the error message states the line of code causing the error.
      - Discovering and locating this type of bug can be challenging.
      - Debugging usually means running the program multiple times. It can come in handy to temporarily "hard-code" the problematic input, instead of asking the user for input each time.
  - learnt to use debugging methods to find mistakes in your code
- More conditionals
  - create multiple branches within conditional statements
    - 对立条件 用 else
    - 多个条件 elif
  - understand the purpose of if, elif and else statements within a conditional statement
    - comparison operators can also be used on strings
  - use the modulo operation % in Boolean expressions
- Combining conditions
  - Logical operators
  - chaining conditions
  - Nested conditionals
- Simple loops control structures
  - conditional structures allow you to choose between sections of code,
  - iteration structures allow you to repeat sections of code.
  - 输入的时机
  - 跳出的条件
  - 没有 ++ 操作符

```python
n1 = int(input("Number 1: "))
n2 = int(input("Number 2: "))
n3 = int(input("Number 3: "))
n4 = int(input("Number 4: "))

if n1 > n2 and n1 > n3 and n1 > n4:
    greatest = n1
elif n2 > n3 and n2 > n4:
    greatest = n2
elif n3 > n4:
    greatest = n3
else:
    greatest = n4

print(f" {greatest} is the greatest of the numbers.")

# 先去掉最大的
letter1 =input("1st letter:")
letter2 =input("2nd letter:")
letter3 =input("3rd letter:")

if letter1 > letter2 and letter1 > letter3:
    if letter2 > letter3:
        print("The letter in the middle is", letter2)
    else:
        print("The letter in the middle is", letter3)
elif letter2 > letter3:
    # 条件 letter 2 和 letter3 有比letter1大的
    # 去掉最大的 跟 letter1比较
    if letter1 > letter3:
        print("The letter in the middle is", letter1)
    else:
        print("The letter in the middle is", letter3)
else:
    if letter1 > letter2:
        print("The letter in the middle is", letter1)
    else:
        print("The letter in the middle is", letter2)


while True:
    code = input("Please type in your PIN: ")
    if code == "1234":
        break
    print("Incorrect...try again")

print("Correct PIN entered!")

attempts = 0

while True:
    pin = int(input("PIN: "))
    attempts += 1
    if pin == 4321:
        if attempts == 1:
            print("Correct! It only took you one single attempt!")
        else:
            print("Correct! It took you", attempts ,"attempts")
        break
    else:
        print("Wrong")

year = int(input("Please type in a year: "))

if year % 4 == 0:
    if year % 100 == 0 and year % 400 != 0:
        print("That year is not a leap year.")
    else:
        print("That year is a leap year.")
else:
    print("That year is not a leap year.")

# The next leap year
year = int(input("Year: "))
aim = year
while True:
    aim += 1
    if aim % 4 == 0:
        if aim % 100 == 0 and aim % 400 != 0:
            continue
        else:
            print("The next leap year after",year,"is", aim)
            break
```

### Part 3

- Loops with conditions
  - how to create a while loop with a condition
    - Initialisation, condition and update
    - Any Boolean expression or combination thereof is a valid condition in a loop
  - what roles initialisation, formulating a condition and updating variables perform in a loop
    - "hard-coding" the input while testing
    - Print statement debugging
    - visualisation tool on the [Python Tutor](https://www.pythontutor.com/) website. The tool allows you to execute your code line by line, and also shows you the values stored in variables at each step.
  - create loops with different kinds of conditions
- Working with strings
  - use the operators + and * with strings
  - how to find out the length of a string
  - what is meant by string indexing
    - negative indexing
      - The last character in a string is at index -1, the second to last character is at index -2, and so forth.
      - You can think of `input_string[-1]` as shorthand for `input_string[len(input_string) - 1]`
      - 范围 -1~ -len(str)
  - how to look for substrings within a string
    - Half open intervals `[a:b]` a is included in the interval, but the character at the end index b is left out
    - 遍历时边界条件 因为尾标不包括，界定范围
    - **写 while 先写框架**
    - The operator in returns a Boolean value, so it will only tell us if a substring exists in a string
    - find can be used for  finding out where exactly it is not exist return -1
    - 边界条件的推演
- More loops
  - break command used to stop the execution of a loop immediately
  - continue command causes the execution of the loop to jump straight to the beginning of the loop
- Defining functions
  - how to write and call your own functions
    - testing `if __name__ == "__main__"`
  - what is meant by the argument and the parameter of a function
    - global variables
  - define parameters in your own functions

```python
limit = int(input("Limit: "))
sum =0
begin =1
str = "The consecutive sum: 1"

while (sum + begin) < limit:
    sum += begin
    begin +=1
    str += f" + {begin} "

sum += begin
print(f"{str}= {sum}")

word = "banana"
print(word*3) # bananabananabanana

# 杨辉三角
n = 10 # number of layers in the pyramid
row = "*"

while n > 0:
    print(" " * n + row)
    row += "**"
    n -= 1

input_string[0:3]


print("t" in "test") # treu

# prints out all the substrings which are at least three characters long, and which begin with the character specified by the user
str = input("Please type in a word:")
chr = input("Please type in a character: ")

while True:
    if len(str) == 0 or len(str) < 3:
        break
    i = str.find(chr)
    if i == -1 or (i+3) > len(str):
        break
    else:
        print(str[i:i+3])
    str = str[i+1:]


num = int(input("Please type in a number: "))
i = 1

while i <= num:
    j = 1
    while j <= num:
        print(f"{i} x {j} = {i * j}")
        j += 1
    i += 1
```

### Part 4

- The Visual Studio Code editor, Python interpreter and built-in debugging tool
  - The interactive Python interpreter
    - dir function in the interpreter. It tells you which methods are available to use on a given object
    - prints something out only if the line of code has a value.
    - quit() |exit()
  - The built-in debugger
    - set breakpoint
    - Run->Start debugging f5
    - step over
    - step into|out
    - Variables view contains the current values of all variables active in the code. You can proceed with the execution line by line by clicking on the down arrow, which is labelled Step into.
    - Debug console tab, which lets you evaluate expressions with the current values stored in the variables
- More functions
  - When the function is called, the arguments are assigned to variables, which are defined in the function definition. These variables are called parameters, and they are listed inside the parentheses after the function name.
  - called parameters and arguments as formal and actual parameters
- Lists
  - what lists are in Python
    - lists are mutable
    - method 自动改动内部布局
  - access a specified item within a list
  - add items to a list, and how to remove them
    - pop returns the removed item
  - familiar with built-in list functions and methods
    - Methods vs functions
- Definite iteration
  - the difference between definite and indefinite iteration
  - how a Python for loop works
  - use a for loop to iterate through lists and strings
    - range function
      - just one argument, which signifies the end-point of the range. The end-point itself is excluded
      - With two arguments, the function will return a range between the two numbers
      - a third argument you can also specify the size of the step the range takes between each value.
- Print statement formatting
- More strings and lists
  - Strings and lists have a lot in common, especially in the way they behave with different operators. The main difference is that strings are immutable.
  - string variables holding A string can be replaced by another string.

```python
my_list = [7, 2, 2, 5, 2]

my_list[1] = 3
my_list.append(3)
my_list.insert(2, 20)
my_list.pop(3) # by index
my_list.remove(2) # by value

my_list.sort()
print(sorted(my_list)) # don't change the original list
greatest = max(my_list)
smallest = min(my_list)
list_sum = sum(my_list)

for item in my_list:
    print(item)

for i in range(5):
for i in range(3, 7):
for i in range(6, 2, -1):

numbers = list(range(2, 7))
print(numbers)

print("Hi " + name + " your age is " + str(age) + " years" )
print("Hi", name, "your age is", age, "years" )
print("Hi", name, "your age is", age, "years", sep="")
print(f"Hi {name} your age is {age} years")

number = 1/3
print(f"The number is {number:.2f}")

names =  [ "Steve", "Jean", "Katherine", "Paul" ]
for name in names:
  print(f"{name:15} centre {name:>15}")

print(my_list[6:2:-1])
print(my_string[::-1])

my_string.count("ch")
my_string.replace("Hi", "Hey")

print("XYZ".isupper()) # True
```

### Part 5

- More lists
  - create lists with different types of items
  - use lists to organise data
  - store a matrix as a two-dimensional list
- References
  - a reference to a variable
    - What is stored in a variable is not the value per se, but a reference to the object which is the actual value of the variable
    - A reference is often represented by an arrow from the variable to the actual value in memory
    - The function id can be used to find out the exact location the variable points to The reference, or the ID of the variable, is an integer, which can be thought of as the address in computer memory where the value of the variable is stored.
    - Many of the builtin types in Python, such as str, are immutable. This means the value of the object, or any part of it cannot change. The value can be replaced with a new value immutable value has only address
  - multiple references to the same object
    - the assignment b = a copies the reference
    - Copying a list
      - iteration and append points to a different list
      - `my_list_copy = my_list[:]`
    - Editing a list given as an argument
      - `my_list[:] = [100, 99, 98, 97]`
    - a change made through any one of the references affects also the other references, as their target is the same.
    - create an actual separate copy of a list, you can create a new list and add each item from the original list in turn
    - An easier way to copy a list is the bracket operator [], which we used for slices previously. The notation [:] selects all items in the collection. As a side effect, it creates a copy of the list
  - use lists as parameters in functions
    - 引用类型 不用返回值
  - a side effect of a function
    - function modifying the list received as a parameter could cause problems elsewhere in the program.
- Dictionary
  - familiar with the dictionary data structure
    - The notation {} creates an empty dictionary
    - All keys in a dictionary must be immutable. So, a list cannot be used as a key
    - Python stores the contents of a dictionary in a hash table. Each key is reduced to a hash value, which determines where the key is stored in computer memory.
    - the values stored in a dictionary can change, so any type of data is acceptable as a value. A value can also be mapped to more than one key in the same dictionary.
  - use a dictionary with different types of keys and values
    - `word in {}` word 是否存在 dic 键值中
    - `del dic[key]` `deleted = dic.pop(key)`
    - `== None`
    - `dic.clear()`
  - how to traverse through the contents of a dictionary
    - When traversing a collection with a for loop, the contents may not change while the loop is in progress.
    - key, item in dic.items(): RuntimeError: dictionary keys changed during iteration
    - dic can't use slice
    - pop will also cause an error if you try to delete a key which is not present in the dictionary. It is possible to avoid this by giving the method a second argument, which contains a default return value. This value is returned in case the key is not found in the dictionary. The special Python value None will work here
  - name some typical use cases for dictionaries
- Tuple
  - familiar with the tuple data type
    - The most important differences between Tuple and List
      - Tuples are enclosed in parentheses (), while lists are enclosed in square brackets []
      - Tuples are immutable, while the contents of a list may change
    - Tuples are ideal for when there is a set collection of values which are in some way connected
    - immutable,can be used as keys in a dictionary.
    - The parentheses are not strictly necessary when defining tuples.easily return multiple values using tuples.
    - The method my_dictionary.items() returns each key-value pair as a tuple, where the first item is the key and the second item is the value.
    - common use case for tuples is swapping the values of two variables
  - create tuples from various types of values
  - the difference between a tuple and a list
  - name some typical use cases for tuples

```py
my_list = [[5, 2, 3], [4, 1], [2, 2, 5, 1]]
print(id(my_list))

my_list = [1,2,3,4]
new_list = my_list # 同一个引用
new_list = my_list[:] # 复制 得到不同引用

def augment_all(my_list: list):
    new_list = []
    for item in my_list:
        new_list.append(item + 10)
    # my_list = new_list 变量的作用域
    # copy items from the new list into the old list
    for i in range(len(my_list)):
        my_list[i] = new_list[i]

numbers = [1, 2, 3]
print("in the beginning:", numbers) # [1, 2, 3]
augment_all(numbers)
print("after the function is executed:", numbers) # [1, 2, 3]

my_list[1:3] = [10, 20]
numbers[:] = new_list
```

### Part 6

- Reading files
  - how to read the contents of files with Python
    - read line is str, need to convert data type `parts = map(int, parts)`
  - what a text file and a CSV file are
    - format use , spilt different str, file end with csv
  - process the contents of a CSV file in your programs
  - Reading the same file multiple times
    - the file can only be processed once. Once the last line is read, the file handle rests at the end of the file, and the data in the file can no longer be accessed.
    - want to access the contents in the second for loop, we will have to open the file a second time
    - usually best to read the file just once, and store its contents in an appropriate format for further processing
  - Removing unnecessary lines, spaces and line breaks .strip()
  - Combining data from different files
    - dic 变更不同 key
- Writing files
  - how to create files with Python code
    - Appending data to an existing file
    - Clearing file contents and deleting files
      - `with open("file_to_be_cleared.txt", "w") as my_file:`
      - `open('file_to_be_cleared.txt', 'w').close()`
      - `os.remove("unnecessary_file.csv")`
  - write text based data to a file
  - how to create a CSV file
- Handling errors
  - Input validation how to handle invalid input
  - what are exceptions in programming
    - Errors that occur while the program is already running are called exceptions. It is possible to prepare for exceptions, and handle them so that the execution continues despite them occurring.
    - Exception handling in Python is accomplished with try and except statements. The idea is that if something within a try block causes an exception, Python checks if there is a corresponding except block. If such a block exists, it is executed and the program themn continues as if nothing happened.
    - Typical errors
      - ValueError
      - TypeError
      - IndexError
      - ZeroDivisionError
  - be familiar with the most common exception types in Python
  - be able to handle exceptions in your own programs
    - Raising exceptions
- Local and global variables
  - what is meant by a local variable
    - Variables defined within a Python function are local variables, only available within the function. This applies to both function parameters, and other variables defined within the function definition. A variable which is local to a function does not exist outside the function.
  - how the scope of a variable affects how it is used
    - Variables defined within the main function are global variables,The value stored in a global variable can be accessed from any other function in the program
    - A global variable cannot be changed directly from within another function.
  - what the Python keyword global means
    - If we wish to specify that we mean to change the global variable within a function, we will need the Python keyword global
    - Global variables are useful in situations where we need to have some common, "higher level" information available to all functions in the program.
  - use local and global variables in the correct contexts

### Part 7

- [Modules](https://docs.python.org/3/library/)
  - Selecting distinct sections from a module
- Randomness
  - randint(1, 6)
  - shuffle(words)
  - The features of the module random are based on an algorithm which produces random numbers based on a specific initialization value and some arithmetic operations. The initialization value is often called a seed value.
  - If we have functions which rely on randomization, and we set seed value, the function will produce the same result each time it is executed. The result may be different with different Python versions, but in essence randomness is lost by setting a seed value.
- Times and dates
  - datetime.now()
  - datetime(2021, 6, 26)
  - timedelta(weeks=32, days=15)
  - +/-
  - .days|seconds
  - .strftime("%d/%m/%Y %H:%M")
- Data processing
  - csv.reader(my_file, delimiter=";"):
  - data = my_file.read() json.loads(data)
  - my_request = urllib.request.urlopen("<https://helsinki.fi>")
- Creating your own modules
  - The functions defined in the file can be accessed by importing the file
  - the file containing the Python module must be located either in the same directory with the program importing it, or in one of the default Python directories, or else the Python interpreter will not find it when the import statement is executed.
  - Python has a built-in variable **name**, which contains the name of the program being executed. If the program is being executed on its own, the value of the variable is **main**. If the program has been imported, the value of the variable is the name of the imported module
- More Python features

## the Advanced Course in Programming parts 8~14

### Part 8

- Objects and methods
- Classes and objects
- Defining classes
- Defining methods
- More examples of classes

## 思考

- 事实
  - 可预知
  - 互动演绎的 不可控
- 智慧
  - 阅读文本，理解全面
  - 感知 真实、全面
  - 形成智慧 看到一些东西时，能看到事情的真实情况或者未明说的情况
  - 不要想着一步写到位，先开始做，有目标工具帮助不断修正
- 方法论 掺杂个人的认识与实践，需要跟个人实际沟通或者观察
  - 循环先写好框架，具体实现
  - 目标拆解成伪代码。实现最小的目标
- 准确率 预演跟实际的符合水平 代码运行过程不是自己想当然的事情
- Becoming a proficient programmer requires a lot of practice, sometimes even quite mechanical practice. It also involves developing problem solving skills and applying intuition.
- Part 1～3 通过测试保证代码正确
- 语言为什么这样设计
  - list tuple dic 用了同一套接口 访问、遍历
