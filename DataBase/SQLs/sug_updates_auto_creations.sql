-- Crear username para cada usuario con las mayusculas que haya usado en su nombre y Apellido
USE KnowEmUP;
UPDATE users
SET username = CONCAT(LOWER(LEFT(fname, 3)), LOWER(LEFT(lname, 3)), studentID)
WHERE username = '';

-- CONVERT PREVIOUS QUERY TO TRIGGER WHEN INSERTING NEW USER
DELIMITER $$
CREATE TRIGGER username_trigger
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    SET NEW.username = CONCAT(LOWER(LEFT(NEW.fname, 3)), LOWER(LEFT(NEW.lname, 3)), NEW.studentID);
END$$
DELIMITER ;


-- Crear progress_id para cada usuario
UPDATE users
SET progress_id = CONCAT('progr_', studentID)
WHERE progress_id = '';

-- CONVERT PREVIOUS QUERY TO TRIGGER WHEN INSERTING NEW USER
DELIMITER $$
CREATE TRIGGER progress_id_trigger
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    SET NEW.progress_id = CONCAT('progr_', NEW.studentID);
END$$
DELIMITER ;

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

-- VIEW TRIGGERS
SHOW TRIGGERS;