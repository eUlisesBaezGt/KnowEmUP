# ESTABLECER BASE DE DATOS PARA USAR
USE KnowEmUP;
# CUANTOS PROFESORES HAY
SELECT COUNT(*) FROM teachers; # 24 teachers

SELECT COUNT(*) FROM users; # 10 users

SELECT COUNT(*) FROM teacher_grades; # 6000 grades

SELECT * FROM teacher_grades
WHERE teacherID = 'David Tovar'; # 256 grades SAME AS BELOW

SELECT COUNT(*) FROM teacher_grades
WHERE teacherID = 'David Tovar'; # 256 grades

# Las grades de profesor, se usan para sacar las estrellas
SELECT AVG(grade_profesor) FROM teacher_grades
WHERE teacherID = 'David Tovar'; # Los alumnos le dan 81

# Las grades del alumno, es cuanto sacas al cursar su materia
SELECT AVG(grade_alumno) FROM teacher_grades
WHERE teacherID = 'David Tovar'; # Los alumnos sacan 78

# Te filtra el promedio de las califs del profesor cuando es mayor a 80
SELECT COUNT(grade_profesor) FROM teacher_grades
WHERE teacherID = 'David Tovar' AND grade_profesor > 80;

SELECT * FROM teacher_grades
WHERE teacherID = 'David Tovar' AND grade_profesor > 80;

# Conteo de alumnos que han obtenido 100 en alguna materia
SELECT COUNT(DISTINCT studentID) FROM teacher_grades
WHERE grade_alumno = 100; # 156 grades // PERO solo 10 alumnos

SELECT * FROM teacher_grades
WHERE grade_alumno = 100;

# Filtrar el ID de los alumnos que han obtenido 100 en alguna materia
SELECT studentID FROM teacher_grades
WHERE grade_alumno = 100;

# Filtrar el ID de los profesores que han obtenido 100 en alguna materia
SELECT DISTINCT teacherID FROM teacher_grades
WHERE grade_profesor = 100;

SELECT COUNT(DISTINCT teacherID) FROM teacher_grades
WHERE grade_profesor = 100; # Solo 22 profesores

# SELECT teacherID IF 'FIS' IN ONE OF THE SUBJECT FIELDS
# Saber los profesores de cierta asignatura
SELECT teacherID FROM teachers
WHERE  Subject1 = 'FIS' OR
       Subject2 = 'FIS' OR
         Subject3 = 'FIS';

# Saber cuantos profesores de cierta asignatura
SELECT COUNT(teacherID) FROM teachers
WHERE  Subject1 = 'FIS' OR
       Subject2 = 'FIS' OR
         Subject3 = 'FIS';