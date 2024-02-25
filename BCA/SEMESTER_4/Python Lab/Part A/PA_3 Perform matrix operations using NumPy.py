"""
3. Perform matrix operations using NumPy
"""

import numpy as np
mat1 = np.array([[1,2,3],[4,5,6],[7,8,9]])
mat2 = np.array([[1,2,3],[4,5,6],[7,8,9]])

sumMatrix = np.add(mat1, mat2)

print("The resultant of matrix after addition is:\n", sumMatrix)

diffMatrix = np.subtract(mat1, mat2)
print("The resultant of matrix after subtraction is:\n", diffMatrix)

multMatrix = np.dot(mat1, mat2)
print("The resultant of matrix after Multiplication is:\n", multMatrix)