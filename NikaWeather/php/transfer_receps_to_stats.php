<?php
include_once('connexionDataBase.php');
$sql_receps = 'SELECT * FROM NW_receps';


$recepsStatement = $mysqlClient->prepare($sql_receps);
$recepsStatement->execute();
$receps = $recepsStatement->fetchAll();

foreach ($receps as $recep) {
?>
    <p><?php
        echo "C'était le " . $recep["date"] . " avec une température s'approchant des " . $recep["recep_temp_average"] . "°C." ?></p>
<?php
}


$sql_statsINSERT = 'INSERT INTO nw_stats(date, recep_temp, recep_hum, recep_wind_direction, recep_wind_speed, recep_UV, recep_precipitation, recep_precipition_speed)
VALUES (:date, :recep_temp, :recep_hum, :recep_wind_direction, :recep_wind_speed, :recep_UV, :recep_precipitation, :recep_precipition_speed)';

$insertStats = $mysqlClient->prepare($sql_statsINSERT);

$insertStats->execute([
    'date' => $recep[0]["date"],
    'recep_temp' => $recep[0]["recep_temp"],
    'recep_hum' => $recep[0]["recep_hum"],
    'recep_wind_direction' => $recep[0]["recep_wind_direction"],
    'recep_wind_speed' => $recep[0]["recep_wind_speed"],
    'recep_UV' => $recep[0]["recep_UV"],
    'recep_precipitation' => $recep[0]["recep_precipitation"],
    'recep_precipition_speed' => $recep[0]["recep_precipition_speed"]
]);
// $receps = $recepStatement->fetchAll();

echo "";
echo "___________________________________________________________________________________________";
echo "";

$sql_stats = 'SELECT * FROM nw_stats';


$statsStatement = $mysqlClient->prepare($sql_stats);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();

foreach ($stats as $stat) {
?>
    <p><?php
        echo "C'était le " . $stat["date"] . " avec une température s'approchant des " . $stat["recep_temp_average"] . "°C." ?></p>
<?php
}
?>