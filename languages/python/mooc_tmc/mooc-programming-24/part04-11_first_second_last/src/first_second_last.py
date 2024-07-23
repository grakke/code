# Write your solution here
def first_word(text):
    index = text.find(' ')
    return text[:index]


def second_word(text):
    index = text.find(' ')
    text = text[index + 1:]
    index1 = text.find(' ')
    if index1 == -1:
        return text
    else:
        return text[:index1]


def last_word(text):
    index = 0
    while index >= 0:
        index = text.find(' ')
        text = text[index + 1:]
    return text[index + 1:]


# You can test your function by calling it within the following block
if __name__ == "__main__":
    sentence = "first second"
    print(first_word(sentence))
    print(second_word(sentence))
    print(last_word(sentence))
