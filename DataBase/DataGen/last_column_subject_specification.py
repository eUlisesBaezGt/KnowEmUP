# READ teacher_gradesComp_CSV and add a last column acoording to the teachedID to select a subject from the ones registered in DB

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
df = pd.read_csv('../CSVs/teacher_grades.csv', sep=',', header=None)
# print(df)
for index, row in df.iterrows():
    if index == 0:
        continue
    # row = row[0]
    # print(row)
    teacherID = row[0].split(';')[0]
    # print(teacherID)
    # print(teachersMap[teacherID])
    subject = ""
    while subject == "":
        subject = random.choice(teachersMap[teacherID])
    # print(subject)

    # SEPARATE THE ROW IN COLUMNS WITH ; TO ADD THEM INTO DB
    row = row[0].split(';')
    row.append(subject)
    # Delete quite marks from the string
    for i in range(len(row)):
        row[i] = row[i].replace('"', '')

    # ADD THE ROW TO THE DB
    cursor.execute("INSERT INTO KnowEmUP.teacher_grades (teacherID, studentID, grade_alumno, grade_profesor, subject) "
                   "VALUES (%s, %s, %s, %s, %s)", row)
    VALUES = (row[0], row[1], row[2], row[3], row[4])

db.commit()
db.close()
