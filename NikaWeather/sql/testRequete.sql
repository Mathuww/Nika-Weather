-- Active: 1665825635924@@127.0.0.1@3306@nwv1

SELECT date, t.duration
FROM nw_stats s
    JOIN nw_optitemps t ON s.optiTemps_id = t.id;

SELECT MAX(date) AS datePlusRecente FROM nw_stats s;