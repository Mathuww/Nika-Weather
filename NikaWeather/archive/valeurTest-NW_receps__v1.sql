DELETE FROM nw_receps;

/*Les moyennes de températures sont arrondis à l'unité (!info : le 0.5 est arrondie à l'inférieur)*/

INSERT INTO
    NW_receps (
        id,
        date,
        time_zone,
        recep_temp_average
    )
VALUES (
        1,
        '2023-04-10 00:00:00',
        '+01:00',
        9
        /*(minimum : 4°, maximum : 14°)*/
    ), (
        2,
        '2023-04-11 00:00:00',
        '+01:00',
        9
        /*(minimum : 3°, maximum : 16°)*/
    ), (
        3,
        '2023-04-12 00:00:00',
        '+01:00',
        10
        /*(minimum : 5°, maximum : 16°)*/
    ), (
        4,
        '2023-04-13 00:00:00',
        '+01:00',
        12
        /*(minimum : 8°, maximum : 17°)*/
    ), (
        5,
        '2023-04-14 00:00:00',
        '+01:00',
        15
        /*(minimum : 10°, maximum : 20°)*/
    );