-- Crear base de datos
DROP DATABASE IF EXISTS KnowEmUP;
CREATE DATABASE IF NOT EXISTS KnowEmUP;
USE KnowEmUP;

-- Crear tabla
CREATE TABLE IF NOT EXISTS `users`
(
    `studentID`   varchar(7)  NOT NULL,
    `progress_id` varchar(25) NOT NULL,
    `username`    varchar(25) NOT NULL,
    `fname`       varchar(50) NOT NULL,
    `lname`       varchar(50) NOT NULL,
    `email`       varchar(50) NOT NULL,
    `password`    varchar(50) NOT NULL,
    `faculty`     varchar(10) NOT NULL,
    `carreer`     varchar(250) NOT NULL,
    `semester`    INT(2)      NOT NULL,
    PRIMARY KEY (`studentID`, `progress_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- Crear tabla profesores
CREATE TABLE `teachers` (
  `teacherID` varchar(250) NOT NULL,
  `Subject1` varchar(45) DEFAULT NULL,
  `Subject2` varchar(45) DEFAULT NULL,
  `Subject3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO teachers (teacherID) 
VALUES ('Daniel Contreras'),
		('David Tovar'),
        ('Nelly Flores'),
        ('Ivonne Dominguez'),
        ('Liliana Osnaya'),
        ('Rodolfo Cobos'),('Mauricio Pardo'),('Jorge Ramirez'),('Hector Garrido'),('Felipe Zetina'),('Sebas Montes'), ('Raul Lima'),
        ('Francisco Javier'),('Gerardo Barcena'),('Felix Martinez'),('Vicky Carreras'),('Giancarlo Xavier'),('Karina Perez'),('David Escobar'),('Erendira Garcia'),('Oscar Amador'),('Antonieta Martinez'),('Pavel Real');


-- Crear tabla de materias
CREATE TABLE IF NOT EXISTS `subjects`
(
    `id`          int(7)      NOT NULL,
    `name`        varchar(50) NOT NULL,
    `semester`    INT(2)      NOT NULL,
    `teacherID`   VARCHAR(7)      NOT NULL,
    `teacherName` varchar(50) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`teacherID`) REFERENCES teachers (`teacherID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- Crear tabla de que guarde las materias que ha tomado ese usuario
CREATE TABLE IF NOT EXISTS `user_subjects`
(
    `studentID`    varchar(7)  NOT NULL,
    `progress_id`  varchar(25) NOT NULL,
    `subjectID`    int(7)      NOT NULL,
    `subjectName`  varchar(50) NOT NULL,
    `semester`     INT(2)      NOT NULL,
    `teacherID`    VARCHAR(7)      NOT NULL,
    `teacherName`  varchar(50) NOT NULL,
    `final_grade`  DOUBLE      NOT NULL,
    `review_grade` DOUBLE      NOT NULL,
    FOREIGN KEY (`studentID`) REFERENCES users (`studentID`),
    FOREIGN KEY (`subjectID`) REFERENCES subjects (`id`),
    FOREIGN KEY (`teacherID`) REFERENCES teachers (`teacherID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- Crear una tabla que guarde las calificaciones de los estudiantes a cada maestro
CREATE TABLE IF NOT EXISTS `teacher_grades`
(
    `teacherID` VARCHAR(250)     NOT NULL,
    `studentID` varchar(7) NOT NULL,
    `grade_alumno`     DOUBLE     NOT NULL,
    `grade_profesor`     DOUBLE     NOT NULL,
    FOREIGN KEY (`teacherID`) REFERENCES teachers (`teacherID`),
    FOREIGN KEY (`studentID`) REFERENCES users (`studentID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


-- Crear una tabla que guarde las calificaciones de los estudiantes de cada materia
CREATE TABLE IF NOT EXISTS `subject_grades`
(
    `subjectID` int(7)     NOT NULL,
    `studentID` varchar(7) NOT NULL,
    `grade`     DOUBLE     NOT NULL,
    FOREIGN KEY (`subjectID`) REFERENCES subjects (`id`),
    FOREIGN KEY (`studentID`) REFERENCES users (`studentID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;