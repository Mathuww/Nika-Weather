<?php
//Supprimer les données de la table NW_stats
$sql_deleteStats = 'DELETE FROM nw_stats;';
$deleteStatsStatement = $mysqlClient->prepare($sql_deleteStats);
$deleteStatsStatement->execute();


//Ajoute les données tests de la table NW_stats
$sql_insertTestStats = "INSERT INTO NW_stats (id, date, time_zone, recep_temp_average)
VALUES 
(1, '2023-04-08 00:00:00', '+01:00', 16), 
(2, '2023-04-09 00:00:00', '+01:00', 12), 
(3, '2023-04-14 00:00:00', '+01:00', 15);";
$insertTestStatsStatement = $mysqlClient->prepare($sql_insertTestStats);
$insertTestStatsStatement->execute();
