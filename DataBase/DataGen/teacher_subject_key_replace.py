import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="root",
)

mycursor = db.cursor()

mycursor.execute("USE KnowEmUP")

# GENERATE LIST WITH ALL SUBJECTS FROM 3 COLUMNS IN TEACHERS TABLE
mycursor.execute("SELECT Subject1, Subject2, Subject3 FROM teachers")
myresult = mycursor.fetchall()
subjects = []
for x in myresult:
    for y in x:
        if y not in subjects:
            subjects.append(y)
# print(subjects)

# CREATE DICTIONARY OF SUBJECTS AND THEIR KEYS
subjectsTrio = ["Subject1", "Subject2", "Subject3"]
# REPLACE ALL SUBJECTS WITH THEIR KEYS
subjectsMap = {"Análisis y Diseño de Algoritmos": "ADA", "Física": "FIS",
               "Cálculo Vectorial": "CV", "Cálculo Diferencial": "CD",
               "Cálculo Integral": "CI", "Álgebra Lineal": "AL",
               "Teoría de Juegos": "GT", "Teoría de Gráficas": "TG",
               "Programación Avanzada": "PA", "Programación Orientada a Objetos": "POO",
               "Desarrollo de Aplicaciones Web": "DAW", "Desarrollo de Aplicaciones Móviles": "DAM",
               "Sistemas Operativos": "SO", "Ciberseguridad": "CS", "Inteligencia Artificial": "IA",
               "Teorías de Lenguajes y Programación": "TLP", "Programación y Estructura de Datos": "PED",
               "Bases de Datos Avanzadas": "BDA", "Base de Datos": "BD", "Mecánica": "MEC",
               "Termodinámica": "TER", "Electricidad y Magnetismo": "EM", "Circuitos Eléctricos": "CE",
               "Procesamiento de Imágenes": "DIP", "Álgebra": "ALG", "Ecuaciones Diferenciales": "ED"
               }
for subject in subjectsMap:
    for subjectIndex in subjectsTrio:
        mycursor.execute("UPDATE teachers SET " + subjectIndex + " = '" + subjectsMap[
            subject] + "' WHERE " + subjectIndex + " = '" + subject + "'")
        #  print("Replaced " + subject + " with " + subjectsMap[subject] + " in " + subjectIndex)
    # print("REPLACED " + subject + " WITH " + subjectsMap[subject])

# CLOSE THE CONNECTION
db.commit()
db.close()
