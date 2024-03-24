"""
7.	Pandas with experiment
    Create excel table of students using pandas having 
        1)	USN   
        2)	Name 
        3)	M1
        4)	M2 
        5)	M3 
    Calculate total and average and display result in table format 

"""

import pandas as pd

data = pd.read_excel(r"C:\Desktop\User\Workspace.xlsx")

mark1 = data['M1']
mark2 = data['M2']
mark3 = data['M3']

sum = mark1+mark2+mark3
avg = sum/3

data['Total'] = sum
data['Average'] = avg

print(data)