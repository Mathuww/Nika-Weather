<?php
//Supprimer les données de la table NW_stats
$sql_deleteStats = 'DELETE FROM nw_stats;';
$deleteStatsStatement = $mysqlClient->prepare($sql_deleteStats);
$deleteStatsStatement->execute();


//Ajoute les données tests de la table NW_stats
$sql_insertTestStats = "INSERT INTO NW_stats (date, time_zone, recep_temp_average, recep_hum, recep_wind_direction, recep_wind_speed, recep_UV, recep_pluviometer)
VALUES 
('2023-04-08 00:00:00', '+01:00', 16, 50, 215, 2.5, 0.78, 0),
('2023-04-09 00:00:00', '+01:00', 12, 50, 215, 2.5, 0.78, 0), 
('2023-04-14 00:00:00', '+01:00', 15, 50, 215, 2.5, 0.78, 0);";
$insertTestStatsStatement = $mysqlClient->prepare($sql_insertTestStats);
$insertTestStatsStatement->execute();
