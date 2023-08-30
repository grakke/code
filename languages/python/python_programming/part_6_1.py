import math
with open("example.txt") as new_file:
    # contents = new_file.read()
    # print(contents)

    count = 0
    total_length = 0

    for line in new_file:
        line = line.replace("\n", "")
        count += 1
        print("Line", count, line)
        length = len(line)
        total_length += length

print("Total length of lines:", total_length)


def largest(file):
    largest = 0
    with open(file) as new_file:
        for num in new_file:
            number = int(num)
            if number > largest:
                largest = number

    return largest


print(largest("numbers.txt"))

with open("grades.csv") as new_file:
    for line in new_file:
        line = line.replace("\n", "")
        parts = line.split(";")
        name = parts[0]
        grades = parts[1:]
        print("Name:", name)
        print("Grades:", grades)


def read_fruits():
    prices = {}
    with open("fruits.csv") as new_file:
        for line in new_file:
            line = line.replace("\n", "")
            parts = line.split(";")
            prices[parts[0]] = parts[1]

    return prices


print(read_fruits())


def matrix_sum():
    total = 0
    with open("matrix.txt") as new_file:
        for line in new_file:
            line = line.replace("\n", "")
            parts = line.split(",")
            parts = map(int, parts)
            total += sum(parts)
    return total


def matrix_max():
    maxium = 0
    with open("matrix.txt") as new_file:
        for line in new_file:
            line = line.replace("\n", "")
            parts = line.split(",")
            parts = list(map(int, parts))
            if maxium < max(parts):
                maxium = max(parts)
    return maxium


def row_sums():
    row_sums = []
    with open("matrix.txt") as new_file:
        for line in new_file:
            line = line.replace("\n", "")
            parts = line.split(",")
            parts = map(int, parts)
            row_sums.append(sum(parts))
    return row_sums


print(max([1, 3, 5, 7]))
print(matrix_sum(), matrix_max(), row_sums())

if False:
    # this is never executed
    student_info = input("Student information: ")
    exercise_data = input("Exercises completed: ")
    exam_points = input("Exam points")
else:
    # hard-coded input
    student_info = "students.csv"
    exercise_data = "exercises.csv"
    exam_points = "exam_points.csv"

students = {}

with open(student_info) as new_file:
    for line in new_file:
        parts = line.split(';')
        if parts[0] == "id":
            continue
        students[parts[0]] = parts[1] + " " + parts[2]

exercises = {}

with open(exercise_data) as new_file:
    for line in new_file:
        parts = line.split(';')
        if parts[0] == "id":
            continue
        exercises[parts[0]] = sum(map(int, parts[1:]))

scores = {}
with open(exam_points) as new_file:
    for line in new_file:
        parts = line.split(';')
        if parts[0] == "id":
            continue
        scores[parts[0]] = sum(map(int, parts[1:]))

for id, name in students.items():
    exercise = 0
    score = 0
    if id in exercises:
        exercise = exercises[id]
    if id in scores:
        score = scores[id]

    print(f"{name:16} {exercise} {score}")

number = 42
print(f"{number:10}continues")
print(f"{number:<10}continues")


def search_by_name(file, name):
    pass


def search_by_time(file, time):
    pass


def search_by_ingredient(file, ingredient):
    pass


found_recipes = search_by_name("recipes.txt", "cake")

found_recipes = search_by_time("recipes.txt", 20)


found_recipes = search_by_ingredient("recipes.txt", "eggs")


print("am" in "name")


def get_station_data(file):
    pass


def distance(data, station1, station2):
    x_km = (station1.longitude - station2.longitude) * 55.26
    y_km = (station1.latitude - station2.latitude) * 111.2
    return math.sqrt(x_km**2 + y_km**2)


def greatest_distance(data):
    pass


stations = get_station_data('stations.csv')
d = distance(stations, "Designmuseo", "Hietalahdentori")
print(d)
d = distance(stations, "Viiskulma", "Kaivopuisto")
print(d)

station1, station2, greatest = greatest_distance(stations)
