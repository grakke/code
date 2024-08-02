def create_tuple(x, y, z):
    if x > y:
        if x > z:
            greatest = x
        else:
            greatest = z
        if y < z:
            smallest = y
        else:
            smallest = z
    else:
        if x < z:
            smallest = y
        else:
            smallest = x
        if y > z:
            greatest = y
        else:
            greatest = z
    sum = x
    sum += y
    sum += z
    return (smallest, greatest, sum)


def oldest_person(peoples):
    oldest_age = peoples[0][1]
    name = peoples[0][0]
    for people in peoples:
        if people[1] < oldest_age:
            oldest_age = people[1]
            name = people[0]

    return name


def older_people(peoples, age):
    names = []
    for people in peoples:
        if people[1] < age:
            names.append(people[0])
    return names


def add_student(students, name):
    students[name] = []


def add_course(students, name, course):
    if len(students[name]) == 0:
        students[name].append(course)
        return

    if course[1] != 0:
        for include_course in students[name]:
            if include_course[0] == course[0]:
                if include_course[1] < course[1]:
                    students[name].remove(include_course)
                    students[name].append(course)
                return
            else:
                students[name].append(course)
                return


def print_student(students, name):
    if name in students:
        print(name, ":")
        if len(students[name]) == 0:
            print(" no completed courses")
        else:
            print(" ", len(students[name]), "completed courses:")
            sum = 0
            for course in students[name]:
                print("  ", course[0], course[1])
                sum += course[1]
            print(" average grade", sum/len(students[name]))
    else:
        print(name, ":no such person in the database")
        exit


def summary(students):
    print("students", len(students))
    most_course_count = 0
    most_course_count_name = ""
    most_average = 0
    most_average_name = ""
    for name, courses in students.items():
        count_course = len(courses)
        if count_course > most_course_count:
            most_course_count = count_course
            most_course_count_name = name
        sum = 0
        for course in courses:
            sum += course[1]
        average = sum/count_course
        if average > most_average:
            most_average = average
        most_average_name = name

    print("most courses completed", most_course_count, most_course_count_name)
    print("best average grade", most_average, most_average_name)


if __name__ == "__main__":
    print(create_tuple(5, 3, -1))

    p1 = ("Adam", 1977)
    p2 = ("Ellen", 1985)
    p3 = ("Mary", 1953)
    p4 = ("Ernest", 1997)
    people = [p1, p2, p3, p4]
    print(oldest_person(people))

    older = older_people(people, 1979)
    print(older)

    students = {}
    add_student(students, "Peter")
    add_student(students, "Eliza")
    print_student(students, "Peter")
    print_student(students, "Eliza")
    print_student(students, "Jack")
    add_course(students, "Peter", ("Introduction to Programming", 3))
    add_course(students, "Peter", ("Advanced Course in Programming", 2))
    add_course(students, "Peter", ("Data Structures and Algorithms", 0))
    add_course(students, "Peter", ("Introduction to Programming", 2))
    print_student(students, "Peter")

    students = {}
    add_student(students, "Peter")
    add_student(students, "Eliza")
    add_course(students, "Peter", ("Data Structures and Algorithms", 1))
    add_course(students, "Peter", ("Introduction to Programming", 1))
    add_course(students, "Peter", ("Advanced Course in Programming", 1))
    add_course(students, "Eliza", ("Introduction to Programming", 5))
    add_course(students, "Eliza", ("Introduction to Computer Science", 4))
    summary(students)

###
# # TODO
# Layers: 4

# DDDDDDD
# DCCCCCD
# DCBBBCD
# DCBABCD
# DCBBBCD
# DCCCCCD
# DDDDDDD
###

letters = ["A", "B", "C", "D", "E", "F", "G",
           "H", "I", "J", "K", "L", "M", "M",
           "O", "P", "Q", "R", "S", "T",
           "U", "V", "W", "X", "Y", "Z",
           ]
layer = int(input("Layers:"))

square = []
layer_count = 2 * layer - 1
for i in range(layer_count):
    if i >= layer:
        square[i] = square[layer_count - i]
    else:
        for j in range(layer_count):
            pass
