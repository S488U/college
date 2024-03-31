"""
2. Calculate the following 
    a) Mean 
    b) Median 
    c) Mode 
    d) Standard Deviation
    e) Percentile
"""

import numpy as np
from scipy import stats

data = [1,2,3,4,5,6,7,8,9,10,11,12]
mean = np.mean(data)
median = np.median(data)
mode = stats.mode(data)
std_dev = np.std(data)
percentile = np.percentile(data, 50)

print("Mean: ", mean)
print("Median: ", median)
print("Mode: ", mode)
print("Standard Deviation: ", std_dev)
print("50th Percentile (Median): ", percentile)

"""
Output:

Mean:  6.5
Median:  6.5
Mode:  ModeResult(mode=1, count=1)    
Standard Deviation:  3.452052529534663
50th Percentile (Median):  6.5 

"""