USE KnowEmUP;
SELECT COUNT(*) FROM teachers; # 23 teachers

SELECT COUNT(*) FROM users; # 10 users

SELECT COUNT(*) FROM teacher_grades; # 220 grades

SELECT * FROM teacher_grades
WHERE teacherID = 'David Tovar'; # 10 grades SAME AS BELOW

SELECT COUNT(*) FROM teacher_grades
WHERE teacherID = 'David Tovar'; # 10 grades

SELECT AVG(grade_profesor) FROM teacher_grades
WHERE teacherID = 'David Tovar'; # 75 TODO VERIFICAR A MANO

SELECT AVG(grade_alumno) FROM teacher_grades
WHERE teacherID = 'David Tovar'; # 63 TODO VERIFICAR A MANO

SELECT COUNT(grade_profesor) FROM teacher_grades
WHERE teacherID = 'David Tovar' AND grade_profesor > 80;

SELECT * FROM teacher_grades
WHERE teacherID = 'David Tovar' AND grade_profesor > 80;


SELECT COUNT(*) FROM teacher_grades
WHERE grade_alumno = 100; # 5

SELECT * FROM teacher_grades
WHERE grade_alumno = 100; # CONFIRMA QUE SON 5

SELECT studentID FROM teacher_grades
WHERE grade_alumno = 100; # 5

SELECT teacherID FROM teacher_grades
WHERE grade_profesor = 100;

SELECT * FROM teacher_grades
WHERE grade_profesor = 100;
