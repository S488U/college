""""
1. Perform the following operations on number list: 
    a) Sum
    b) Average
    c) Max
    d) Min
    e) Sort
    f) Reverse
"""

num_list = []
n = int(input("Enter the number :"))
for i in range(0,n):
    ele = int(input())
    num_list.append(ele)
print("Sum is ",sum(num_list))
print("Average is",sum(num_list)/len(num_list))
print("Maximum is",max(num_list))
print("Minimum is",min(num_list))
num_list.sort()
print("sorted order is",num_list)
num_list.reverse()
print("Reversed order is ",num_list)