import mysql.connector
import random

db = mysql.connector.connect(
    host="localhost",
    port=8889,
    user="root",
    passwd="root",
)

cursor = db.cursor()

cursor.execute("USE KnowEmUP")

# SELECT * teacherID from teachers and store in a list
cursor.execute("SELECT teacherID FROM teachers")
teacherID = [x[0] for x in cursor.fetchall()]

# SELECT * studentID from students and store in a list
cursor.execute("SELECT studentID FROM users")
studentID = [x[0] for x in cursor.fetchall()]

# COUNT THE NUMBER OF ROWS IN THE TABLE
cursor.execute("SELECT COUNT(*) FROM teacher_grades")
row_count = cursor.fetchone()[0]
print(row_count, "rows in the table")

# CONTINUE UNTIL THERE ARE 10000 ROWS IN THE TABLE
while row_count < 10000:
    # SELECT A RANDOM STUDENT AND TEACHER
    randomTeacher = random.choice(teacherID)
    randomStudent = random.choice(studentID)

    # SELECT A RANDOM GRADE FROM 60-100
    randomGradeStudent = random.randint(60, 100)
    randomGradeTeacher = random.randint(60, 100)

    # SELECT A RANDOM SUBJECT FROM THE SUBJECTS OF THE TEACHER
    cursor.execute("SELECT id FROM subjects WHERE teacherID = %s", (randomTeacher,))
    subject_ids = [x[0] for x in cursor.fetchall()]
    randomSubject = random.choice(subject_ids)

    # INSERT INTO GRADES TABLE
    sql = "INSERT INTO teacher_grades (teacherID, studentID, grade_alumno, grade_profesor, subject) VALUES (%s, %s, %s, %s, %s)"
    val = (randomTeacher, randomStudent, randomGradeStudent, randomGradeTeacher, randomSubject)
    cursor.execute(sql, val)

    db.commit()

    # COUNT THE NUMBER OF ROWS IN THE TABLE
    cursor.execute("SELECT COUNT(*) FROM teacher_grades")
    row_count = cursor.fetchone()[0]

# COUNT THE NUMBER OF ROWS IN THE TABLE
cursor.execute("SELECT COUNT(*) FROM teacher_grades")
final_row_count = cursor.fetchone()[0]
print("FINAL: ", final_row_count, "rows in the table")

# CLOSE THE CONNECTION
db.close()
