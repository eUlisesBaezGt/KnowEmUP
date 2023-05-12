-- COUNT HOW MANY users ARE FROM EACH SEMESTER
USE `KnowEmUP`;
-- 1st semester
SELECT COUNT(*) as PrimerSemestre FROM users WHERE semester = 1;
-- 2nd semester
SELECT COUNT(*) as SegundoSemestre FROM users WHERE semester = 2;
-- 3rd semester
SELECT COUNT(*) as TercerSemestre FROM users WHERE semester = 3;
-- 4th semester
SELECT COUNT(*) as CuartoSemestre FROM users WHERE semester = 4;
-- 5th semester
SELECT COUNT(*) as QuintoSemestre FROM users WHERE semester = 5;
-- 6th semester
SELECT COUNT(*) as SextoSemestre FROM users WHERE semester = 6;
-- 7th semester
SELECT COUNT(*) as SeptimoSemestre FROM users WHERE semester = 7;
-- 8th semester
SELECT COUNT(*) as OctavoSemestre FROM users WHERE semester = 8;
