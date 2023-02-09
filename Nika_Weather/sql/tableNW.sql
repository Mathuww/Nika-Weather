-- Active: 1665825635924@@127.0.0.1@3306@nwv1

DROP TABLE NW_recep;

DROP TABLE NW_stats;

CREATE TABLE
    NW_recep (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        date DATETIME,
        recep_temp DECIMAL(4, 2),
        recep_hum DECIMAL(3, 1),
        recep_wind_direction DECIMAL(4, 1),
        recep_wind_speed DECIMAL(3, 1),
        recep_UV DECIMAL(4, 1),
        recep_precipitation DECIMAL(3, 1),
        recep_precipition_speed DECIMAL(3, 1)
    );

CREATE TABLE
    NW_stats (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        date DATETIME,
        recep_temp DECIMAL(4, 2),
        recep_hum DECIMAL(3, 1),
        recep_wind_direction DECIMAL(4, 1),
        recep_wind_speed DECIMAL(3, 1),
        recep_UV DECIMAL(4, 1),
        recep_precipitation DECIMAL(3, 1),
        recep_precipition_speed DECIMAL(3, 1),
        preview_temp_felt DECIMAL(4, 2),
        opti_temp VARCHAR(10)
    );