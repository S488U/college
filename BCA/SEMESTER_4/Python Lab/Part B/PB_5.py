# Create a database using pymongo.
# Insert the records and display the records.


import pymongo
myclient = pymongo.MongoClient('mongodb://localhost:27017/')

mydb = myclient['mydatabase']
mycol = mydb["customers"]

mylist = [
  { "name": "Amy", "address": "Apple st 652"},
  { "name": "Hannah", "address": "Mountain 21"},
  { "name": "Michael", "address": "Valley 345"}
]

x = mycol.insert_many(mylist)

print("Printing all the records: ")
for x in mycol.find():
  print(x)

print("Printing only the name and address of all the records: ")
for y in mycol.find({},{ "_id": 0, "name": 1, "address": 1 }):
  print(y)


print("Printing single record: ")
z=mycol.find_one()
print(z)