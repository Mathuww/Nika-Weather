-- Active: 1684319228248@@127.0.0.1@3306@nwv1

DELETE FROM nw_optitemps;

DELETE FROM nw_admin;

INSERT INTO
    NW_optiTemps (id, duration)
VALUES (1, "quarter hour"), (2, "half hour"), (3, "hour"), (4, "moment"), (5, "day"), (6, "week"), (7, "month"), (8, "year");

INSERT INTO
    NW_admin (username, password, cookies)
VALUES (
        "Mathuww",
        "tune sauras jamais monmotdepasse",
        true
    );

INSERT INTO
    NW_settings (
        name,
        content,
        value,
        lastDate_Modification,
        lastUser_Modification
    )
VALUES (
        "activ_archive",
        "Accès public aux archives de données météorologiques",
        False,
        '2023-05-11 20:02:02',
        "Mathuww"
    );