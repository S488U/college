"""
    a) Linear Regression
"""

import sys
import matplotlib
matplotlib.use('TkAgg')

import matplotlib.pyplot as plt
from scipy import stats

x= [5,7,8,7,2,17,2,9,4,11,12,9,6]
y= [99,86,87,88,111,86,103,87,94,78,77,85,86]

slope, intercept, r, p, std_err = stats.linregress(x, y)

def myfun(x):
    return slope * x + intercept

mymodel = list(map(myfun, x))

plt.scatter(x, y)
plt.plot(x, mymodel)
plt.show()

plt.savefig(sys.stdout.buffer)
sys.stdout.flush()

