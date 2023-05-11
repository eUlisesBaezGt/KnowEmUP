# READ teacher_gradesComp_CSV and add a last column acoording to the teachedID to select a subject from the ones registered in DB

import csv
import os
import sys
import random
import pandas as pd
import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="root",
    database="KnowEmUP"
)
cursor = db.cursor()
cursor.execute("USE KnowEmUP")

# CREATE A DICTIONARY WITH EACH ONE OF SUBJECTS FOR EACH ONE OF THE TEACHERS
# for each one of the teachers, generate a lists of the subjects they teach
cursor.execute("SELECT teacherID FROM KnowEmUP.teachers")
myresult = cursor.fetchall()
teacherID = []
for x in myresult:
    teacherID.append(x[0])

# CREATE A DICTIONARY
teachersMap = {}
for teacher in teacherID:
    cursor.execute("SELECT Subject1, Subject2, Subject3 FROM KnowEmUP.teachers WHERE teacherID = '" + teacher + "'")
    myresult = cursor.fetchall()
    for x in myresult:
        teachersMap[teacher] = x
# print(teachersMap)

# READ teacher_gradesComp_CSV and add a last column acoording to the teachedID to select a subject from the ones registered in DB

# READ CSV FILE located one folder up and in csv folder
df = pd.read_csv('../CSVs/teacher_gradesComp.csv', sep=',', header=None)
# print(df)


db.commit()
db.close()