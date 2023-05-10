-- Crear username para cada usuario con las mayusculas que haya usado en su nombre y Apellido
USE KnowEmUP;
UPDATE users
SET username = CONCAT(UPPER(LEFT(fname, 3)), UPPER(LEFT(lname, 3)), studentID)
WHERE username = '';

-- Crear progress_id para cada usuario
UPDATE users
SET progress_id = CONCAT('progr_', studentID)
WHERE progress_id = '';

-- Insertar el progress_id en la tabla user_subjects de acuerdo al studentID
UPDATE user_subjects
SET progress_id = CONCAT('progr_', studentID)
WHERE progress_id = '';

-- DELETE CONTENT FROM USERNAME FIELD WITHOUT DELETING ROW
-- UPDATE users
-- SET username = ''
-- WHERE username != '';

-- DELETE CONTENT FROM PROGRESS_ID FIELD WITHOUT DELETING ROW
-- UPDATE users
-- SET progress_id = ''
-- WHERE progress_id != '';