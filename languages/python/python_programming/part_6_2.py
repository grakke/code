with open("new_file.txt", "w") as my_file:
    my_file.write("Hello there!\n")
    my_file.write("This is the second line\n")
    my_file.write("This is the last line\n")

# name = input("Whom should I sign this to: ")
# file_name = input("Where shall I save it: ")

# with open(file_name, "w") as my_file:
#     my_file.write(
#         f"Hi {name}, we hope you enjoy learning Python with us! Best, Mooc.fi Team")

print("1 - add an entry, 2 - read entries, 3 - rest, 0 - quit")
while True:
    function = int(input("Function: "))

    if function == 1:
        input_content = input("Diary entry: ")
        with open("diary.txt", "a") as my_file:
            my_file.write(input_content + "\n")
            print("Diary saved")
        continue
    elif function == 2:
        with open("diary.txt") as my_file:
            print("Entries:")
            for line in my_file:
                line = line.replace("\n", "")
                print(line)
        continue
    elif function == 3:
        with open("diary.txt", "w") as my_file:
            my_file.write("")
    else:
        print("Bye now!")
        break


def filter_solutions():
    pass


filter_solutions()


def store_personal_data(person):
    pass
