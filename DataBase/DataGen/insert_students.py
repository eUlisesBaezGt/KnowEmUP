import mysql.connector
import random
from faker import Faker

fake = Faker()

db = mysql.connector.connect(
    host="localhost",
    port=3306,
    user="root",
    passwd="root",
)

cursor = db.cursor()

cursor.execute("USE KnowEmUP")

# CREATE AND INSERT STUDENTS UNTIL WE HAVE 1,250
# SELECT * studentID from students and store in a list
cursor.execute("SELECT COUNT(*) FROM users")
row_count = cursor.fetchone()[0]
print(row_count, "rows in the table")

# LIST WITH DIFFERENT NAMES
names = [fake.name() for _ in range(650)]
lastNames = [name.split()[1] for name in names]

carreras = ["Ingenieria en Inteligencia de Datos y Ciberseguridad", "Ingenieria Mecatronica", "Ingenieria Mecanica", "Ingenieria en Animacion y Videojuegos",
            'Ingenieria en Innovacion y Diseño', "Ingenieria Industrial", "Matematicas Aplicadas"]

# CONTINUE UNTIL THERE ARE 1,250 ROWS IN THE TABLE
while row_count < 6250:
    # SELECT A RANDOM STUDENT ID, it is conformed by 7 digits starting with 0
    id = "0"
    for i in range(6):
        id += str(random.randint(0, 9))
    # print("Student ID: ", id)

    progID = 'Prog_' + id
    # print("Program ID: ", progID)

    name = random.choice(names)
    last = random.choice(lastNames)

    # EMAIL
    email = id + "@up.edu.mx"

    # USERNAME
    username = name + str(random.randint(0, 9))

    # PASSWORD
    passw = name + id

    # FACULTY
    faculty = "ING"

    # CARRERA
    carrera = random.choice(carreras)

    # SEMESTERS
    semesters = random.randint(1, 8)

    # CHECK IF STUDENT ID ALREADY EXISTS
    cursor.execute("SELECT COUNT(*) FROM users WHERE studentID = %s", (id,))
    exists = cursor.fetchone()[0]

    if exists == 0:
        # INSERT INTO USERS TABLE
        sql = "INSERT INTO users (studentID, progress_id, username, fname, lname, email, password, faculty, " \
              "carreer, semester) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
        val = (id, progID, username, name, last, email, passw, faculty, carrera, semesters)

        cursor.execute(sql, val)
        db.commit()

        row_count += 1

# COUNT THE NUMBER OF ROWS IN THE TABLE
cursor.execute("SELECT COUNT(*) FROM users")
row_count = cursor.fetchone()[0]
print(row_count, "rows in the table")

db.close()
