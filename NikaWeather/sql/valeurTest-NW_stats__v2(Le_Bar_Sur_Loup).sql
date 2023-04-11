DELETE FROM nw_stats;

/*Les moyennes de températures sont arrondis à l'unité (!info : le 0.5 est arrondie à l'inférieur)*/

/* IL FAUT ABSOLUMENT PRENDRE LE TEMPS À METTRE BONNES LES DONNÉES*/

INSERT INTO
    NW_stats (
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
        '2023-04-08 00:00:00',
        '+01:00',
        16,
        /*(minimum : 11°, maximum : 22°)*/
        50,
        215,
        2.5,
        0.78,
        0
    ), (
        '2023-04-09 00:00:00',
        '+01:00',
        12,
        /*(minimum : 7°, maximum : 17°)*/
        50,
        215,
        2.5,
        0.78,
        0
    ), (
        '2023-04-14 00:00:00',
        '+01:00',
        15,
        /*(minimum : 10°, maximum : 20°)*/
        50,
        215,
        2.5,
        0.78,
        0
    );