# Copy here code of line function from previous exercise and use it in your solution
def line(length, str):
    if len(str) > 1:
        char = str[0]
    elif str == '':
        char = '*'
    else:
        char = str
    print(length * char)


def shape(size1, char1, size2, char2):
    # You should call function line here with proper parameters
    i = 1
    while i <= size1:
        line(i, char1)
        i += 1
    while size2 > 0:
        line(size1, char2)
        size2 -= 1


# You can test your function by calling it within the following block
if __name__ == "__main__":
    shape(5, "x", 2, "o")
