<?php
// function insertTest_newStats (PDO $dbMySQL)
// {
//     delete_totalStats($dbMySQL);

//     //Ajoute les données tests de la table NW_stats
//     $sql_insertTestStats = "INSERT INTO NW_stats (
//     date, localization, recep_temp_average, recep_hum, recep_wind_direction, recep_wind_speed, recep_precipitation, recep_precipitation_speed, recep_pressure, stat_sunrise, stat_sunset, optiTemps_id)
//     VALUES
//     ('2022-04-05 00:00:00', POINT(43.6535, 6.94082), 9.53, 62.23, 202.60, 1.6, 0, 0, 1015, '07:09:00', '20:03:00', 5), 
//     ('2022-04-06 00:00:00', POINT(43.6535, 6.94082), 9.40, 72.02, 175.78, 1.2, 0, 0, 1015, '07:05:00', '20:05:00', 5), 
//     ('2022-04-07 00:00:00', POINT(43.6535, 6.94082), 13.32, 64.28, 215.45, 1.3, 0, 0, 1015, '07:04:00', '20:06:00', 5),
//     ('2022-04-10 00:00:00', POINT(43.6535, 6.94082), 10.96, 36.27, 207.5, 2.2, 0, 0, 1015, '06:58:00', '20:10:00', 5);";
//     $insertTestStatsStatement = $dbMySQL->prepare($sql_insertTestStats);
//     $insertTestStatsStatement->execute();
// }

// function verifSettings (
//     bool $archive = false, 
//     bool $graphique = false, 
//     bool $sunrise = false, 
//     bool $sunset = false, 
//     bool $temp_average = false, 
//     bool $temp_min = false, 
//     bool $temp_max = false, 
//     bool $temp_feelsLike = false, 
//     bool $humidity = false, 
//     bool $pressure = false, 
//     bool $wind_direction = false, 
//     bool $wind_speed = false,
//     bool $precipitation = false, 
//     bool $precipitation_speed = false
// ) :array
// { 
//     if ($archive != "on") {
//         $archive = 0; 
//     } if ($graphique != "on") {
//         $graphique = 0;
//     } if ($sunrise != "on") {
//         $sunrise = 0;
//     } if ($sunset != "on") {
//         $sunset = 0;
//     } if ($temp_average != "on") {
//         $temp_average = 0;
//     } if ($temp_min != "on") {
//         $temp_min = 0;
//     } if ($temp_max != "on") {
//         $temp_max = 0;
//     } if ($temp_feelsLike != "on") {
//         $temp_feelsLike = 0;
//     } if ($humidity != "on") {
//         $humidity = 0;
//     } if ($pressure != "on") {
//         $pressure = 0;
//     } if ($wind_direction != "on") {
//         $wind_direction = 0;
//     } if ($wind_speed != "on") {
//         $wind_speed = 0;
//     } if ($precipitation != "on") {
//         $precipitation = 0;
//     } if ($precipitation_speed != "on") {
//         $precipitation_speed = 0;
//     }

//     $settingsParameters = [
//         "archive" => $archive,
//         "graphique" => $graphique,
//         "sunrise" => $sunrise,
//         "sunset" => $sunset,
//         "temp_average" => $temp_average,
//         "temp_min" => $temp_min,
//         "temp_max" => $temp_max,
//         "temp_feelsLike" => $temp_feelsLike,
//         "humidity" => $humidity,
//         "pressure" => $pressure,
//         "wind_direction" => $wind_direction,
//         "wind_speed" => $wind_speed,
//         "precipitation" => $precipitation,
//         "precipitation_speed" => $precipitation_speed
//     ];
//     return $settingsParameters;
// }