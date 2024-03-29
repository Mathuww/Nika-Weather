-- Active: 1683009167113@@127.0.0.1@3306@nwv1

DROP TABLE IF EXISTS nwv1;

CREATE DATABASE IF NOT EXISTS nwv1;

/*Au cas où pour tout rénitialiser*/

DROP TABLE IF EXISTS NW_recep;

DROP TABLE IF EXISTS NW_stat;

/*Effacer les deux tables*/

DROP TABLE IF EXISTS NW_receps;

DROP TABLE IF EXISTS NW_stats;

DROP TABLE IF EXISTS NW_optiTemps;

DROP TABLE IF EXISTS NW_admin;

CREATE TEMPORARY
TABLE
    NW_receps (
        date DATETIME PRIMARY KEY NOT NULL,
        localization POINT,
        recep_temp_average DECIMAL(4, 2),
        recep_hum DECIMAL(3, 1),
        recep_wind_direction DECIMAL(4, 1),
        recep_wind_speed DECIMAL(4, 1),
        recep_precipitation DECIMAL(3, 1),
        recep_precipitation_speed DECIMAL(4, 1),
        recep_pressure DECIMAL (5, 1)
    );

/*J'ai choisi d'ajouter les données de lever/coucher du soleil parce que la précision du résultat est meilleur le jour même.*/

CREATE TEMPORARY
TABLE
    NW_stats (
        date DATETIME PRIMARY KEY NOT NULL,
        localization POINT,
        recep_temp_average DECIMAL(4, 2),
        recep_hum DECIMAL(3, 1),
        recep_wind_direction DECIMAL(4, 1),
        recep_wind_speed DECIMAL(4, 1),
        recep_precipitation DECIMAL(3, 1),
        recep_precipitation_speed DECIMAL(4, 1),
        recep_pressure DECIMAL(5, 1),
        stat_temp_feelsLike DECIMAL(4, 2),
        stat_temp_min DECIMAL(4, 2),
        stat_temp_max DECIMAL(4, 2),
        stat_sunrise TIME,
        stat_sunset TIME,
        optiTemps_id DECIMAL(2, 0),
        FOREIGN KEY (optiTemps_id) REFERENCES NW_optiTemps (id)
    );

CREATE TEMPORARY
TABLE
    NW_optiTemps (
        id DECIMAL(2, 0) PRIMARY KEY,
        duration VARCHAR(12)
    );

CREATE TEMPORARY
TABLE
    NW_admin (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(32),
        password VARCHAR(128),
        cookies BOOLEAN
    );