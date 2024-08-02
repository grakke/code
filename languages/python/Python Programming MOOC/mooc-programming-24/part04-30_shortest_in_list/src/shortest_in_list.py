# Write your solution here
def shortest(my_list):
    short_item = my_list[0]
    short_length = len(short_item)
    for i in my_list:
        length = len(i)
        if length < short_length:
            short_length = length
            short_item = i

    return short_item
