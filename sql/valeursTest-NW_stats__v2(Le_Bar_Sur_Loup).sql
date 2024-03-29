-- Active: 1683757039173@@127.0.0.1@3306@nwv1

DELETE FROM nw_stats;

/*Les moyennes de températures sont arrondis à l'unité (!info : le 0.5 est arrondie à l'inférieur)*/

INSERT INTO
    NW_stats (
        date,
        localization,
        recep_temp_average,
        recep_hum,
        recep_wind_direction,
        recep_wind_speed,
        recep_precipitation,
        recep_precipitation_speed,
        recep_pressure,
        stat_sunrise,
        stat_sunset,
        optiTemps_id
    )
VALUES (
        '2022-04-05 00:00:00',
        POINT(43.6535, 6.94082),
        9.53,
        62.23,
        202.60,
        1.6,
        0,
        0,
        1015,
        '07:09:00',
        '20:03:00',
        5
    ), (
        '2022-04-06 00:00:00',
        POINT(43.6535, 6.94082),
        9.40,
        72.02,
        175.78,
        1.2,
        0,
        0,
        1015,
        '07:05:00',
        '20:05:00',
        5
    ), (
        '2022-04-07 00:00:00',
        POINT(43.6535, 6.94082),
        13.32,
        64.28,
        215.45,
        1.3,
        0,
        0,
        1015,
        '07:04:00',
        '20:06:00',
        5
    ), (
        '2022-04-10 00:00:00',
        POINT(43.6535, 6.94082),
        10.96,
        36.27,
        207.5,
        2.2,
        0,
        0,
        1015,
        '06:58:00',
        '20:10:00',
        5
    );