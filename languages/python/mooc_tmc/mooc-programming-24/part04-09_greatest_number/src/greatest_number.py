# Write your solution here
def greatest_number(num1, num2, num3):
    if num1 > num2:
        greater = num1
    else:
        greater = num2

    if greater < num3:
        return num3
    else:
        return greater


# You can test your function by calling it within the following block
if __name__ == "__main__":
    greatest = greatest_number(5, 4, 8)
    print(greatest)
