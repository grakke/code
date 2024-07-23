if __name__ == '__main__':
    first = [1, 3, 4, 5]
    secong = [4, 5, 6, 7]
    print(first + secong)

second = [5, 6, 7, 8]
print(second)

list = [9, 8, 7, 6, 5, 4, 3, 2, 1]
len = len(list)
count = 0
for i in range(len):
    # for j in range(i + 1, len):
    for j in range(len):
        if list[i] < list[j]:
            list[i], list[j] = list[j], list[i]
            count = count + 1

print(list, count)
