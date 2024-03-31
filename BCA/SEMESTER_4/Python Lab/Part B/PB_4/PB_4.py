# 4. Draw following diagram using Matplotlib
#     a) Line
#     b) Grid
#     c) Bars
#     d) Pie Chart

import matplotlib.pyplot as plt
import numpy as np

y = np.array(["15","20","30","35"])
x = np.array(["red", "blue", "green", "purple"])
mycolors = (["red", "blue", "green", "purple"])
plt.bar(x,y, color=mycolors) #bars
plt.show()

plt.pie(y, labels=x, colors=mycolors) #pie chart
plt.show()

plt.title("Favourite Colors")
plt.xlabel("Color")
plt.ylabel("Number of Students")
plt.plot(x,y) #Line
plt.grid() #Grid
plt.show()