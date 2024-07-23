# Write your solution here
def same_chars(text, index1, index2):
    length = len(text)
    if index1 >= length or index2 >= length:
        return False

    return text[index1] == text[index2]


# You can test your function by calling it within the following block
if __name__ == "__main__":
    print(same_chars("coder", 1, 2))
