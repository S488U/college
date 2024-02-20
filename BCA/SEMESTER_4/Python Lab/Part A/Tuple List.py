def findTuple(tupleList, k):
	resultTuple = []
	for tpl in tupleList:
		if all(elements % k == 0 for elements in tpl):
			resultTuple.append(tpl)
			
	return resultTuple
	
tupleList = [(2,4,8),(3,6,9),(6,10,15), (7,14,21)]
k=int(input("Enter the input for k: "))

result = findTuple(tupleList, k)
print(f"Tuple with all elements divisble by {k} is {result}")