DELETE FROM nw_stats;

/*Les moyennes de températures sont arrondis à l'unité (!info : le 0.5 est arrondie à l'inférieur)*/

INSERT INTO
    NW_stats (
        id,
        date,
        time_zone,
        recep_temp_average
    )
VALUES (
        1,
        '2023-04-08 00:00:00',
        '+01:00',
        16
        /*(minimum : 11°, maximum : 22°)*/
    ), (
        2,
        '2023-04-09 00:00:00',
        '+01:00',
        12
        /*(minimum : 7°, maximum : 17°)*/
    ), (
        3,
        '2023-04-14 00:00:00',
        '+01:00',
        15
        /*(minimum : 10°, maximum : 20°)*/
    );