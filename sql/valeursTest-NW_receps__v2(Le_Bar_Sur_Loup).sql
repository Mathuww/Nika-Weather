-- Active: 1683009167113@@127.0.0.1@3306@nwv1

DELETE FROM nw_receps;

/*Les moyennes de températures à Le Bar Sur Loup sont arrondis à l'unité (!info : le 0.5 est arrondie à l'inférieur)*/

/* IL FAUT ABSOLUMENT PRENDRE LE TEMPS À METTRE BONNES LES DONNÉES*/

INSERT INTO
    NW_receps (
        date,
        localization,
        recep_temp_average,
        recep_hum,
        recep_wind_direction,
        recep_wind_speed,
        recep_precipitation,
        recep_precipitation_speed,
        recep_pressure
    )
VALUES (
        '2022-04-08 00:00:00',
        POINT(43.6535, 6.94082),
        19.08,
        47.12,
        214.4,
        2.5,
        0,
        0,
        1015
    ), (
        '2022-04-09 00:00:00',
        POINT(43.6535, 6.94082),
        16.11,
        26.15,
        254.5,
        2.9,
        0,
        0,
        1015
    ), (
        '2022-04-10 00:00:00',
        POINT(43.6535, 6.94082),
        10.96,
        36.27,
        207.5,
        2.2,
        0,
        0,
        1015
    ), (
        '2022-04-11 00:00:00',
        POINT(43.6535, 6.94082),
        10.59,
        53.73,
        194.99,
        0.6,
        0,
        0,
        1015
    );