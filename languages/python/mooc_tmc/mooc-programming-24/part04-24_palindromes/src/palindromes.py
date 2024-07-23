# Write your solution here

while True:
    str = input("Please type in a palindrome:")
    length = len(str)
    mid = length // 2
    for i in range(mid):
        if str[i] == str[length - 1 - i]:
            continue
        else:
            print("that wasn't a palindrome")
            break
    print(f"{str} is a palindrome!")

# Note, that at this time the main program should not be written inside
# if __name__ == "__main__":
# block!
