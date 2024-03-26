"""
3. Perform matrix operations using NumPy
"""

import numpy as np
mat1 = np.array([[5,8],[2,9]])
mat2 = np.array([[4,3],[6,1]])


print("The resultant of matrix after addition is:\n", np.add(mat1, mat2))

print("The resultant of matrix after subtraction is:\n", np.subtract(mat1, mat2))

print("The resultant of matrix after division is:\n", np.divide(mat1, mat2))

print("The resultant of matrix after Multiplication is:\n", np.multiply(mat1, mat2))

print("The product of matrices is:\n", np.dot(mat1, mat2))

