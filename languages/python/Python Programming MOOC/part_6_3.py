def read_input():
    while True:
        try:
            input_str = input("Please type in an integer: ")
            number = int(input_str)
            if number < 10 and number > 5:
                return number
        # except ValueError:
        #     pass  # this command doesn't actually do anything
        except:
            print("Something went wrong")

        print("You must type in an integer between 5 and 10")


number = read_input()
print("You typed in:", number)


def factorial(n):
    if n < 0:
        raise ValueError("The input was negative: " + str(n))
    k = 1
    for i in range(2, n + 1):
        k *= i
    return k


print(factorial(3))
print(factorial(6))
print(factorial(-1))


def new_person(name, age):

    if name == "" or len(name) > 40 or age < 0 or age > 150:
        raise ValueError("The input was invalid! ")

    return (name, age)


def filter_incorrect():
    pass
