# Write your solution here
my_list = []
while True:
    num = int(input("New item:"))
    if num == 0:
        print("Bye!")
        break

    my_list.append(num)
    print(f"The list now: {my_list}")
    print(f"The list in order: {sorted(my_list)}")
