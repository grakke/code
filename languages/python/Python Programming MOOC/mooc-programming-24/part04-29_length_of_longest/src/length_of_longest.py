# Write your solution here
def length_of_longest(my_list):
    long_length = 0
    for i in my_list:
        length = len(i)
        if len(i) > long_length:
            long_length = length

    return long_length
