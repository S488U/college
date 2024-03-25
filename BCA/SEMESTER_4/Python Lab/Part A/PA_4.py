"""
4. Write a python program to find tuples which have all elements divisible by k from a list of tuples.
"""

def findTuple(tupleList, k):
	resultTuple = []
	for tpl in tupleList:
		if all(elements % k == 0 for elements in tpl):
			resultTuple.append(tpl)
			
	return resultTuple
	
tupleList = [(2,4,8),(3,6,9),(6,10,15), (7,14,21)]
k = 2

result = findTuple(tupleList, k)
print(f"Tuple with all elements divisible by {k} is {result}")