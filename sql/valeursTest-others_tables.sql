-- Active: 1683757039173@@127.0.0.1@3306@nwv1

DELETE FROM nw_optitemps;

DELETE FROM NW_admin;

DELETE FROM NW_settings;

INSERT INTO
    NW_optiTemps (id, duration)
VALUES (1, "quarter hour"), (2, "half hour"), (3, "hour"), (4, "moment"), (5, "day"), (6, "week"), (7, "month"), (8, "year");

INSERT INTO
    NW_admin (username, password, cookies)
VALUES ("Mathuww", "Gr@nd 0r@l", true), ("Chouard", "NSI2023_NW", true), (
        "MarineLeStylo",
        "MathéoStop",
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
        "archive",
        "Accès public aux archives de données météorologiques",
        true,
        now(),
        "Mathuww"
    ), (
        "graphique",
        "Accès public aux graphiques",
        true,
        now(),
        "Mathuww"
    ), (
        "sunrise",
        "Accès public aux archives de données des heures du lever du soleil (fin de l'aurore)",
        true,
        now(),
        "Mathuww"
    ), (
        "sunset",
        "Accès public aux archives de données des heures du coucher du soleil (début du crépuscule)",
        true,
        now(),
        "Mathuww"
    ), (
        "temp_average",
        "Accès public aux données de température",
        true,
        now(),
        "Mathuww"
    ), (
        "temp_min",
        "Accès public aux archives de données de températures minimum",
        true,
        now(),
        "Mathuww"
    ), (
        "temp_max",
        "Accès public aux archives de données de températures maximum",
        true,
        now(),
        "Mathuww"
    ), (
        "temp_feelsLike",
        "Accès public aux données de ressenti",
        true,
        now(),
        "Mathuww"
    ), (
        "humidity",
        "Accès public aux données d’humidité",
        true,
        now(),
        "Mathuww"
    ), (
        "pressure",
        "Accès public aux données de pression atmosphérique",
        true,
        now(),
        "Mathuww"
    ), (
        "wind_direction",
        "Accès public aux données de direction du vent",
        true,
        now(),
        "Mathuww"
    ), (
        "wind_speed",
        "Accès public aux données de la vitesse du vent",
        true,
        now(),
        "Mathuww"
    ), (
        "precipitation",
        "Accès public aux données des quantités des précipitations",
        true,
        now(),
        "Mathuww"
    ), (
        "precipitation_speed",
        "Accès public aux données de la vitesse des précipitations",
        true,
        now(),
        "Mathuww"
    ), (
        "cookieMode",
        "Accepter l’utilisation d’un cookie de préférence graphique (dark // light mode)",
        true,
        now(),
        "Mathuww"
    ), (
        "siteNewtwork",
        "Confirmer que ce site est mis en ligne",
        true,
        now(),
        "Mathuww"
    );