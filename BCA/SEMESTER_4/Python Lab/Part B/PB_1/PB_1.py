"""
1. Write program for following:
    a) Normal distribution 
    b) Binomial distribution 
    c) Poisson distribution
    d) Uniform distribution 
    e) Logistic distribution 
"""


import numpy as np
import matplotlib.pyplot as plt
from scipy.stats import norm, binom, poisson, uniform, logistic

def plot_dist(dist, title):
    plt.hist(dist, bins=30, density=True)
    plt.title(title)
    plt.show()

plot_dist(np.random.normal(0, 0.1, 1000), 'Normal Distribution')
plot_dist(np.random.binomial(10, 0.5, 1000), 'Binomial Distribution')
plot_dist(np.random.poisson(5, 1000), 'Poisson Distribution')
plot_dist(np.random.uniform(0, 1, 1000), 'Uniform Distribution')
plot_dist(np.random.logistic(0, 1, 1000), 'Logistic Distribution')