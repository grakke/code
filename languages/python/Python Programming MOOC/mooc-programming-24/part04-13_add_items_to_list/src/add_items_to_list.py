# Write your solution here
count = int(input("How many items: "))

my_list = []
i = 1
while i <= count:
    num = int(input(f"Item {i}"))
    my_list.append(num)
    i += 1
print(my_list)
