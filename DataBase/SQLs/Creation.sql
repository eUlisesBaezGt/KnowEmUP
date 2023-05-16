-- Crear base de datos
DROP DATABASE IF EXISTS KnowEmUP;
CREATE DATABASE IF NOT EXISTS KnowEmUP;
USE KnowEmUP;
-- Crear tabla de materias
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` varchar(5) NOT NULL,
  `teacherID` VARCHAR(250),
  `semester` INT(1) NOT NULL,
  PRIMARY KEY (`id`, `teacherID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- Crear tabla
CREATE TABLE IF NOT EXISTS `users` (
  `studentID` varchar(7) NOT NULL,
  `progress_id` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `carreer` varchar(250) NOT NULL,
  `semester` INT(2) NOT NULL,
  PRIMARY KEY (`studentID`, `progress_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- Crear tabla profesores
CREATE TABLE `teachers` (
  `teacherID` varchar(250) NOT NULL,
  `Subject1` varchar(45) DEFAULT 'NO',
  `Subject2` varchar(45) DEFAULT 'NO',
  `Subject3` varchar(45) DEFAULT 'NO',
  PRIMARY KEY (`teacherID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- Crear una tabla que guarde las calificaciones de los estudiantes a cada maestro
CREATE TABLE `teacher_grades` (
  `teacherID` varchar(250) NOT NULL DEFAULT 'EMPTY',
  `studentID` varchar(7) NOT NULL DEFAULT 'EMPTY',
  `grade_alumno` double NOT NULL DEFAULT '0',
  `grade_profesor` double NOT NULL DEFAULT '0',
  `subject` varchar(5) NOT NULL DEFAULT 'EMPTY',
  KEY `teacher_grades_ibfk_1` (`teacherID`),
  KEY `teacher_grades_ibfk_2` (`studentID`),
  CONSTRAINT `teacher_grades_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`),
  CONSTRAINT `teacher_grades_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `users` (`studentID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- Crear una tabla que guarde el significado de cada una de las materias
CREATE TABLE `subject_legend` (
  `subject_code` VARCHAR(5),
  `subject_meaning` VARCHAR(50),
  PRIMARY KEY (`subject_code`,`subject_meaning`),
  FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`id`)
)
