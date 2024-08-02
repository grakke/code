def longest(strings):
    longest_len = 0
    index = 0
    longest_index = 0

    for str in strings:
        str_length = len(str)
        if str_length > longest_len:
            longest_len = str_length
            longest_index = index
        index += 1

    return strings[longest_index]


def count_matching_elements(matrix, find_umber):
    count = 0
    for row in matrix:
        for number in row:
            if number == find_umber:
                count += 1

    return count


def row_correct(arr, row):
    checked_numbers = []
    for num in arr[row]:
        if num != 0:
            for checked_number in checked_numbers:
                if checked_number == num:
                    return False
            checked_numbers.append(num)

    return True


def column_correct(arr, column_number):
    checked_numbers = []
    for nums in arr:
        num = nums[column_number]
        if num != 0:
            for checked_number in checked_numbers:
                if checked_number == num:
                    return False
            checked_numbers.append(num)

    return True

#  return True or False depending on whether the 3 by 3 block to the right and down from the given indexes is filled in correctly.


def block_correct(arr, row_no, column_no):
    checked_numbers = []
    for nums in arr[row_no: row_no + 3]:
        for num in nums[column_no: column_no + 3]:
            if num != 0:
                for checked_number in checked_numbers:
                    if checked_number == num:
                        return False
                checked_numbers.append(num)

    return True


def sudoku_grid_correct(sudoku):
    i = 0
    length = len(sudoku)
    m = 0
    n = 0
    for row in range(length):
        if row_correct(sudoku, i) is False:
            return False
        if column_correct(sudoku, i) is False:
            return False
        m = int(i / 3)
        n = i % 3

        block_correct(sudoku, m, n)
        i += 1

    return True


def double_items(numbers):
    new_list = []
    for num in numbers:
        new_list.append(num * 2)

    return new_list


def remove_smallest(numbers):
    smallest = numbers[0]
    for num in numbers:
        if num < smallest:
            smallest = num
    numbers.remove(smallest)


def print_sudoku(sudoku):
    for row in sudoku:
        i = 0
        for num in row:
            if num == 0:
                print("_", end=" ")
            else:
                print(num, end=" ")
            i += 1
            if i % 3 == 0:
                print(" ", end="")
        print()


def add_number(sudoku, row, column, val):
    sudoku[row][column] = val


def copy_and_add(sudoku, row, column, val):
    new_sudoku = sudoku[:]
    new_sudoku[row][column] = val
    return new_sudoku


def play_turn(game_board, column, row, symbol):
    if game_board[row][column] == "":
        game_board[row][column] = symbol
        return True
    else:
        return False


def transpose(matrix: list):
    i = 0
    length = len(matrix)
    while i < length:
        j = i+1
        while j < length:
            tem = matrix[i][j]
            matrix[i][j] = matrix[j][i]
            matrix[j][i] = tem
            j += 1
        i += 1


def times_ten(beg, end):
    dic = {}
    for i in range(beg, end+1):
        dic[i] = i * 10
    return dic


def factorials(n):
    res = {}
    res[1] = 1
    i = 2
    while i <= n:
        res[i] = i * res[i-1]
        i += 1
    return res


def factorials_fun(n):
    if n == 1:
        return 1
    else:
        return n * factorials(n-1)


def histogram(str):
    chars = {}
    for char in str:
        if char not in chars:
            chars[char] = 0
        chars[char] += 1

    return chars


def invert(dic):
    new_dic = {}
    for key, item in dic.items():
        new_dic[item] = key
    dic.clear()
    for key, item in new_dic.items():
        dic[key] = item


def dict_of_numbers():
    dicts = {}
    dic = {
        0: "zero",
        1: "one",
        2: "two",
        3: "three",
        4: "four",
        5: "five",
        6: "six",
        7: "seven",
        8: "eight",
        9: "nine",
        10: "ten",
        11: "eleven",
        12: "twelve",
        13: "thirteen",
        14: "fourteen",
        15: "fifteen",
        16: "sixteen",
        17: "seventeen",
        18: "eighteen",
        19: "nineteen",
        20: "twenty"
    }
    decades = {
        2: "twenty",
        3: "thirty",
        4: "forty",
        5: "fifty",
        6: "sixty",
        7: "seventy",
        8: "eighty",
        9: "ninety"
    }
    for i in range(100):
        str = ""
        if int(i / 10) != 0 and i > 20:
            str += decades[int(i / 10)]
            str += "-"
            dicts[i] = str + dic[i % 10]
        elif (i <= 20):
            dicts[i] = dic[i]

    return dicts


def add_movie(database, name, director, year, runtime):
    database.append({"name": name, "director": director,
                    "year": year, "runtime": runtime})


def find_movies(database, name):
    res = []
    for movie in database:
        if name in movie["name"].lower():
            res.append(movie)

    return res


def create_tuple(x, y, z):
    return (x, y, z)


def oldest_person(peoples):
    biggest_age = peoples[0][1]
    name = ""
    for people in peoples:
        if people[1] < biggest_age:
            biggest_age = people[1]
            name = people[0]

    return name


def older_people(peoples, age):
    names = []
    for people in peoples:
        if people[1] < age:
            names.append(people[0])

    return names


if __name__ == "__main__":
    strings = ["hi", "hiya", "hello", "howdydoody", "hi there"]
    print("Longest string:", longest(strings))

    m = [[1, 2, 1], [0, 3, 4], [1, 0, 0]]
    print("Matching Elements Count:", count_matching_elements(m, 1))

    sudoku = [
        [9, 0, 0, 0, 8, 0, 3, 0, 0],
        [2, 0, 0, 2, 5, 0, 7, 0, 0],
        [0, 2, 0, 3, 0, 0, 0, 0, 4],
        [2, 9, 4, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 7, 3, 3, 5, 6, 0],
        [7, 0, 5, 0, 6, 0, 4, 0, 0],
        [0, 0, 7, 8, 0, 3, 9, 0, 0],
        [0, 0, 1, 0, 0, 0, 0, 0, 3],
        [3, 0, 0, 0, 0, 0, 0, 0, 2]
    ]
    print("Row Correct:")
    print(row_correct(sudoku, 0))  # True
    print(row_correct(sudoku, 1))  # False
    print(row_correct(sudoku, 4))  # False

    print("Column Correct:")
    print(column_correct(sudoku, 0))  # False
    print(column_correct(sudoku, 1))  # True

    print("Block Correct:")
    print(block_correct(sudoku, 0, 0))  # Fakse
    print(block_correct(sudoku, 1, 2))  # True

    sudoku2 = [
        [2, 6, 7, 8, 3, 9, 5, 0, 4],
        [9, 0, 3, 5, 1, 0, 6, 0, 0],
        [0, 5, 1, 6, 0, 0, 8, 3, 9],
        [5, 1, 9, 0, 4, 6, 3, 2, 8],
        [8, 0, 2, 1, 0, 5, 7, 0, 6],
        [6, 7, 4, 3, 2, 0, 0, 0, 5],
        [0, 0, 0, 4, 5, 7, 2, 6, 3],
        [3, 2, 0, 0, 8, 0, 0, 5, 7],
        [7, 4, 5, 0, 0, 3, 9, 0, 1]
    ]
    print("Grid Correct:")
    print(sudoku_grid_correct(sudoku))  # False
    print(sudoku_grid_correct(sudoku2))  # False

    numbers = [2, 4, 5, 3, 11, -4]
    numbers_doubled = double_items(numbers)
    print("original:", numbers,  id(numbers))
    print("doubled:", numbers_doubled, id(numbers_doubled))

    numbers = numbers_doubled[:]  # change reference
    print("original:", numbers,  id(numbers))
    print("doubled:", numbers_doubled, id(numbers_doubled))

    numbers[:] = numbers_doubled
    print("original:", numbers,  id(numbers))
    print("doubled:", numbers_doubled, id(numbers_doubled))

    numbers = [2, 4, 6, 1, 3, 5]
    remove_smallest(numbers)
    print(numbers)

    sudoku3 = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0]
    ]

    print_sudoku(sudoku3)
    add_number(sudoku3, 0, 0, 2)
    add_number(sudoku3, 1, 2, 7)
    add_number(sudoku3, 5, 7, 3)
    print()
    print("Three numbers added:")
    print()
    print_sudoku(sudoku3)

    grid_copy = copy_and_add(sudoku3, 4, 5, 2)
    print("Original:")
    print_sudoku(sudoku3)
    print()
    print("Copy:")
    print_sudoku(grid_copy)

    # Tic-Tac-Toe is played on a 3 by 3 grid, by two players who take turns inputting noughts and crosses. If either player succeeds in placing three of their own symbols on any row, column or diagonal, they win. If neither player manages this, it is a draw.
    game_board = [["", "", ""], ["", "", ""], ["", "", ""]]
    print(play_turn(game_board, 2, 0, "X"))
    print(game_board)

    matrix = [[1, 2, 3], [4, 5, 6], [7, 8, 9]]
    transpose(matrix)
    print(matrix)

    print(times_ten(3, 6))

    k = factorials(5)
    print(k[1])
    print(k[3])
    print(k[5])

    for key in k:
        print("key:", key, "value:", k[key])
    for key, value in k.items():
        print("key:", key, "value:", value)

    chars = histogram("statistically")
    for key, item in chars.items():
        print(key, ":", item * "*")

    s = {1: "first", 2: "second", 3: "third", 4: "fourth"}
    invert(s)
    print(s)

    numbers = dict_of_numbers()
    print(numbers[2])
    print(numbers[11])
    print(numbers[45])
    print(numbers[99])
    print(numbers[20])
    print(numbers[21])
    print(numbers[0])

    database = []
    add_movie(database, "Gone with the Python", "Victor Pything", 2017, 116)
    add_movie(database, "Pythons on a Plane", "Renny Pytholin", 2001, 94)
    print(database)
    my_movies = find_movies(database, "python")
    print(my_movies)

    print(create_tuple(5, 3, -1))

    p1 = ("Adam", 1977)
    p2 = ("Ellen", 1985)
    p3 = ("Mary", 1953)
    p4 = ("Ernest", 1997)
    people = [p1, p2, p3, p4]
    print(oldest_person(people))

    older = older_people(people, 1979)
    print(older)

data = {}
while True:
    command = int(input("command (1 search, 2 add, 3 quit): "))
    # if isinstance(command, int):
    #     raise "Input type Error"

    if command == 3:
        print("quitting...")
        break
    elif command == 1:
        name = input("name: ")
        print(name in data)
        if name in data:
            for no in data[name]:
                print(no)
        else:
            print("no number")
        continue
    elif command == 2:
        name = input("name: ")
        number = input("number:")
        if name in data:
            data[name].append(number)
        else:
            data[name] = [number]
        print("ok!")
        continue
