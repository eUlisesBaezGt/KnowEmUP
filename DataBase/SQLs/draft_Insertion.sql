USE KnowEmUP;

-- Insertar datos
INSERT INTO users (studentID, progress_id, username, fname, lname, email, password, faculty, carreer, semester, gender)
VALUES ('0241823', '', '', 'Enrique Ulises', 'Baez Gomez Tagle', '0241823@up.edu.mx', '123456', 'Ingenieria',
        'Inteligencia de Datos y Ciberseguridad', 3, 'MALE');

-- Insertar datos
INSERT INTO teachers (teacherID, fname, lname, email)
VALUES (0, 'David', 'Casillas Tovar', 'dcasillast@up.edu.mx');

-- Insertar datos
INSERT INTO subjects (id, name, semester, teacherID, teacherName)
VALUES (1, 'Desarrollo de Aplicaciones Web', 5, 0, 'David Casillas Tovar');

-- Insertar datos
INSERT INTO user_subjects (studentID, progress_id, subjectID, subjectName, semester, teacherID, teacherName,
                           final_grade, review_grade)
VALUES ('0241823', '', 1, 'Desarrollo de Aplicaciones Web', 5, 0, 'David Casillas Tovar', 9.8, 5);

-- Insertar datos
INSERT INTO teacher_grades(teacherID, studentID, grade)
VALUES (0, '0241823', 5);

-- Insertar datos
INSERT INTO subject_grades(subjectID, studentID, grade)
VALUES (1, '0241823', 5);