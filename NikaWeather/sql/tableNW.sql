/*Au cas où pour tout rénitialiser*/

DROP TABLE NW_recep;

DROP TABLE NW_stat;

/*Effacer les deux tables*/

DROP TABLE NW_receps;

DROP TABLE NW_stats;

CREATE TABLE
    NW_receps (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        date DATETIME,
        time_zone VARCHAR(6),
        recep_temp_average DECIMAL(4, 2),
        recep_hum DECIMAL(3, 1),
        recep_wind_direction DECIMAL(4, 1),
        recep_wind_speed DECIMAL(4, 1),
        recep_UV DECIMAL(4, 1),
        recep_precipitation DECIMAL(3, 1),
        recep_precipition_speed DECIMAL(3, 1)
    );

CREATE TABLE
    NW_stats (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        date DATETIME,
        time_zone VARCHAR(6),
        recep_temp_average DECIMAL(4, 2),
        recep_temp_min DECIMAL(4, 2),
        recep_temp_max DECIMAL(4, 2),
        recep_hum DECIMAL(3, 1),
        recep_wind_direction DECIMAL(4, 1),
        recep_wind_speed DECIMAL(3, 1),
        recep_UV DECIMAL(4, 1),
        recep_precipitation DECIMAL(3, 1),
        recep_precipition_speed DECIMAL(3, 1),
        preview_temp_felt DECIMAL(4, 2),
        opti_temp VARCHAR(10)
    );