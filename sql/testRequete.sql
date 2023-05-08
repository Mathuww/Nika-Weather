-- Active: 1683009167113@@127.0.0.1@3306@nwv1

SELECT date, t.duration
FROM nw_stats s
    JOIN nw_optitemps t ON s.optiTemps_id = t.id;

SELECT MAX(date) AS datePlusRecente FROM nw_stats s;

SELECT *
FROM nw_receps r
WHERE r.date NOT IN (
        SELECT s.date
        FROM nw_stats s
    );

SELECT ST_Y(localization) FROM nw_receps;

SELECT
    TIMEDIFF(
        NOW(),
        CONVERT_TZ(
            NOW(),
            @@session.time_zone,
            '+00:00'
        )
    );

SET time_zone = "+02:00";