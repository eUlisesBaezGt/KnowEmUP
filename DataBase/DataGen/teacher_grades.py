import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="root",
)

cursor = db.cursor()

cursor.execute("USE KnowEmUP")

# SELECT * teacherID from teachers and store in a list
cursor.execute("SELECT teacherID FROM teachers")
myresult = cursor.fetchall()
teacherID = []
for x in myresult:
    teacherID.append(x[0])

# SELECT * studentID from students and store in a list
cursor.execute("SELECT studentID FROM users")
myresult = cursor.fetchall()
studentID = []
for x in myresult:
    studentID.append(x[0])

# for x in range(0, 500):
#     # SELECT A RANDOM STUDENT AND TEACHER
#     import random
#
#     randomTeacher = random.choice(teacherID)
#     randomStudent = random.choice(studentID)
#
#     # SELECT A RANDOM GRADE FROM 60-100
#     randomGradeStudent = random.randint(60, 100)
#     randomGradeTeacher = random.randint(60, 100)
#
#     # INSERT INTO GRADES TABLE
#     sql = "INSERT INTO teacher_grades (teacherID, studentID, grade_alumno, grade_profesor) VALUES (%s, %s, %s, %s)"
#     val = (randomTeacher, randomStudent, randomGradeStudent, randomGradeTeacher)
#     cursor.execute(sql, val)
#
#     db.commit()
#     # print(Record inserted.")

# COUNT THE NUMBER OF ROWS IN THE TABLE
cursor.execute("SELECT COUNT(*) FROM teacher_grades")
myresult = cursor.fetchall()
for x in myresult:
    print(x[0], "rows in the table")

# CONTINUE UNTIL THERE ARE 2500 ROWS IN THE TABLE
while x[0] < 3000:
    # SELECT A RANDOM STUDENT AND TEACHER
    import random

    randomTeacher = random.choice(teacherID)
    randomStudent = random.choice(studentID)

    # SELECT A RANDOM GRADE FROM 60-100
    randomGradeStudent = random.randint(60, 100)
    randomGradeTeacher = random.randint(60, 100)

    # INSERT INTO GRADES TABLE
    sql = "INSERT INTO teacher_grades (teacherID, studentID, grade_alumno, grade_profesor) VALUES (%s, %s, %s, %s)"
    val = (randomTeacher, randomStudent, randomGradeStudent, randomGradeTeacher)
    cursor.execute(sql, val)

    db.commit()
    # print(Record inserted.")

    # # COUNT THE NUMBER OF ROWS IN THE TABLE
    # cursor.execute("SELECT COUNT(*) FROM teacher_grades")
    # myresult = cursor.fetchall()
    # for x in myresult:
    #     print(x[0], "rows in the table")

# COUNT THE NUMBER OF ROWS IN THE TABLE
cursor.execute("SELECT COUNT(*) FROM teacher_grades")
myresult = cursor.fetchall()
for x in myresult:
    print("FINAL: ", x[0], "rows in the table")

# CLOSE THE CONNECTION
db.close()




