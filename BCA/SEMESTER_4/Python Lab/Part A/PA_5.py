"""
5. Write a python program for removing duplicates from tuples
"""

x = input("Enter the value: ")
xtuples = tuple(x)
print("Original Tuple:", xtuples)
print("Duplicates removed:", tuple(set(xtuples)))

