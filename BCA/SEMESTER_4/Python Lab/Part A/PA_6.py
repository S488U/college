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
split_arrays = np.array_split(joined_array, 2)
print("Split Arrays:", split_arrays)

# Searching element
index = np.where(joined_array == 3)
print("Index of Element 3:", index)

# Sorting
sorted_array = np.sort(joined_array)
print("Sorted Array:", sorted_array)

# Filtering
filtered_array = joined_array[joined_array > 3]
print("Filtered Array:", filtered_array)
