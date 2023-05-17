-- SELECT COUNT(*) as Total
-- FROM (
--     SELECT DISTINCT Subject1 AS Subject
--     FROM teachers
--     WHERE Subject1 IS NOT NULL
--         AND Subject1 != ''
--     UNION
--     SELECT DISTINCT Subject2
--     FROM teachers
--     WHERE Subject2 IS NOT NULL
--         AND Subject2 != ''
--     UNION
--     SELECT DISTINCT Subject3
--     FROM teachers
--     WHERE Subject3 IS NOT NULL
--         AND Subject3 != ''
-- ) as Subquery;

SELECT * FROM users;
