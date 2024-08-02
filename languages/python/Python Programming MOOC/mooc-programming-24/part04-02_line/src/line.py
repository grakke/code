# Write your solution here

def line(length, str):
    if len(str) > 1:
        char = str[0]
    elif str == '':
        char = '*'
    else:
        char = str
    print(length * char)


# You can test your function by calling it within the following block
if __name__ == "__main__":
    line(5, "x")
