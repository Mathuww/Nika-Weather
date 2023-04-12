-- Active: 1665825635924@@127.0.0.1@3306@nwv1

DELETE FROM nw_receps;

/*Les moyennes de températures à Le Bar Sur Loup sont arrondis à l'unité (!info : le 0.5 est arrondie à l'inférieur)*/

/* IL FAUT ABSOLUMENT PRENDRE LE TEMPS À METTRE BONNES LES DONNÉES*/

INSERT INTO
    NW_receps (
        date,
        time_zone,
        recep_temp_average,
        recep_hum,
        recep_wind_direction,
        recep_wind_speed,
        recep_UV,
        recep_pluviometer
    )
VALUES (
        '2023-04-10 00:00:00',
        '+01:00',
        9,
        /*(minimum : 4°, maximum : 14°)*/
        50,
        215,
        2.5,
        0.78,
        0
    ), (
        '2023-04-11 00:00:00',
        '+01:00',
        9,
        /*(minimum : 3°, maximum : 16°)*/
        50,
        215,
        2.5,
        0.78,
        0
    ), (
        '2023-04-12 00:00:00',
        '+01:00',
        10,
        /*(minimum : 5°, maximum : 16°)*/
        50,
        215,
        2.5,
        0.78,
        0
    ), (
        '2023-04-13 00:00:00',
        '+01:00',
        12,
        /*(minimum : 8°, maximum : 17°)*/
        50,
        215,
        2.5,
        0.78,
        0
    ), (
        '2023-04-14 00:00:00',
        '+01:00',
        000000,
        /*(minimum : 10°, maximum : 20°)*/
        50,
        215,
        2.5,
        0.78,
        0
    );