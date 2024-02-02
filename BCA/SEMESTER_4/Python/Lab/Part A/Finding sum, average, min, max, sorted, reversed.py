""""
1. Perform the following operations on number list: 
    a) Sum
    b) Average
    c) Max
    d) Min
    e) Sort
    f) Reverse
"""

numList = [7,9,3,5,2, 0, 1]

sum1 = sum(numList)
print("Sum is", sum1)
print("Average is ",sum1/len(numList))

print("Maximum is ",max(numList))
print("Minimum is ",min(numList))

srt = sorted(numList)
print("Sorted List: ",srt)
reversedNum = list(reversed(srt))
# We can also use this to reverse the elements in a list.
#reversedNum = srt[::-1]
print("Reversed List: ",reversedNum)