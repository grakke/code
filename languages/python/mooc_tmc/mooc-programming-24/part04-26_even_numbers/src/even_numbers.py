# Write your solution here
def even_numbers(my_list):
    new_list = []
    for i in my_list:
        if i % 2 == 0:
            new_list.append(i)

    return new_list
