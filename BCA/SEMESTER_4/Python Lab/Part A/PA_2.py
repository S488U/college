""""
2. Perform the following operations on string list:
    a) Swap elements of string list
    b) Combining two list
"""

x = input("Enter the first value: ")
y = input("Enter the second value: ")

combList = list(x) + list(y)

print("Combined List is :", combList)
print("Swapped elements List is :", combList[::-1])

