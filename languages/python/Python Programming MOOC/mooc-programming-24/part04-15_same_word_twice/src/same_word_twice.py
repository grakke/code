# Write your solution here
my_list = []
while True:
    word = input("Word: ")
    if word in my_list:
        print(f"You typed in {len(my_list)} different words")
        break
    else:
        my_list.append(word)
