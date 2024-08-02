# Write your solution here

while True:
    editor = input("Editor: ").lower()

    if editor != 'visual studio code':
        if editor in ('emacs', 'vim', 'atom'):
            print('not good')
        if editor in ('word', 'notepad'):
            print('awful')
        continue
    else:
        print("an excellent choice!")
        break
