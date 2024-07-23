# Write your solution here
def all_the_longest(my_list):

    short_item = []
    short_length = 0
    for i in my_list:
        length = len(i)
        if length > short_length:
            short_length = length

    for i in my_list:
        length = len(i)
        if length == short_length:
            short_item.append(i)

    return short_item
