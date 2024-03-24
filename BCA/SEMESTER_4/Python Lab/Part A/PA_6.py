"""
6.	Perform the following operations using NumPy:
    a)	Joining two arrays 
    b)	Splitting arrays 
    c)	Searching element 
    d)	Sorting 
    e)	Filtering 

"""

import numpy as np

# Joining two arrays
array1 = np.array([1, 2, 3])
array2 = np.array([4, 5, 6])
joined_array = np.concatenate((array1, array2))
print("Joined Array:", joined_array)

# Splitting arrays
array = np.array([1, 2, 3, 4, 5, 6])
split_arrays = np.array_split(array, 3)
print("Split Arrays:", split_arrays)

# Searching element
array = np.array([1, 2, 3, 4, 5])
index = np.where(array == 3)
print("Index of Element 3:", index)

# Sorting
array = np.array([3, 1, 2, 5, 4])
sorted_array = np.sort(array)
print("Sorted Array:", sorted_array)

# Filtering
array = np.array([1, 2, 3, 4, 5])
filtered_array = array[array > 3]
print("Filtered Array:", filtered_array)
