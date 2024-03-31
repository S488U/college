"""
5. Create a database using pymysql.
Insert the records and display the records
"""

### Program Is ERROR!!

import mysql.connector
mydb = mysql.connector.connect(
    host = 'localhost',
    user = 'root',
    password = 'root'
)

mycursor = mydb.cursor()
mycursor.excecute("create database if not exist college")
mycursor.excecute("use college")
mycursor.excecute("create table students(name varchar(255), address varchar(255))")
sql = "insert into students (name, address) values (%s, %s)"
val = [
    ('Peter', 'Lowstreet 4'),
    ('Jhons', 'St.peters 23'),
    ('Rahul', 'Mountain 21'),
]

mycursor.executemany(sql, val)
mydb.commit()
mycursor.execute("select * from students")
myresult=mycursor.fetchall()
print("Inserted Records are: ")
for x in myresult:
    print(x)