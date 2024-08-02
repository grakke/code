# Write your solution here
def distinct_numbers(my_list):
    new_list = []
    for i in my_list:
        if i in new_list:
            continue
        else:
            new_list.append(i)

    return sorted(new_list)


if __name__ == "__main__":
    my_list = [3, 2, 2, 1, 3, 3, 1]
    print(distinct_numbers(my_list))
