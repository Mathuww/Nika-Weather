-- Active: 1665825635924@@127.0.0.1@3306@nwv1

DELETE FROM nw_optitemps;

DELETE FROM nw_admin;

INSERT INTO
    NW_optiTemps (id, duration)
VALUES (1, "quarter hour"), (2, "half hour"), (3, "hour"), (4, "moment"), (5, "day"), (6, "week"), (7, "month"), (8, "year");

INSERT INTO
    NW_admin (id, username, password, cookies)
VALUES (
        1,
        "Mathuww",
        "tune sauras jamais monmotdepasse",
        true
    );