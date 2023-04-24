<?php
function connectDataBase() :PDO
{
    try {
        $db =  new PDO('mysql:host=localhost;dbname=nwv1;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}

function get_newReceps(PDO $dbMySQL) :array
{
    //Récupérer les données de receps qui existent déjà dans la table stats (pour éviter les doublons)
    $sql_exist = "SELECT r.date, r.time_zone, r.localization, ST_X(r.localization), ST_Y(r.localization), r.recep_temp_average, r.recep_hum, 
    r.recep_wind_direction, r.recep_wind_speed, r.recep_precipitation, r.recep_precipitation_speed, r.recep_pressure
    FROM nw_receps r WHERE r.date NOT IN (
        SELECT s.date FROM nw_stats s 
    );";
    $existStatement = $dbMySQL->prepare($sql_exist);
    $existStatement->execute();
    return $existStatement->fetchAll();
}

function get_totalReceps (PDO $dbMySQL) :array
{
    //Récupérer les données de la table receps
    $sql_receps = "SELECT * FROM NW_receps";
    $recepsStatement = $dbMySQL->prepare($sql_receps);
    $recepsStatement->execute();
    return $recepsStatement->fetchAll();
}

function get_totalStats (PDO $dbMySQL) :array
{
    //Récupérer les données de la table stats
    $sql_stats = 'SELECT * FROM nw_stats';
    $statsStatement = $dbMySQL->prepare($sql_stats);
    $statsStatement->execute();
    return $statsStatement->fetchAll();

}

function delete_totalStats (PDO $dbMySQL)
{
    //Supprimer les données de la table NW_stats
    $sql_deleteStats = "DELETE FROM nw_stats;";
    $deleteStatsStatement = $dbMySQL->prepare($sql_deleteStats);
    $deleteStatsStatement->execute();
}

function transfert_recepsToStats (PDO $dbMySQL)
{

    //Récupérer les données de receps qui existent déjà dans la table stats (pour éviter les doublons)
    $receps = get_newReceps($dbMySQL);
    //// echo "<pre>";
    //// print_r($receps);
    //// echo "<pre/>";
    //// echo "2023-04-24" . " => " . get_sunrise("2023-04-24", 43.6535, 6.94082, "+02:00") . " // " . get_sunset("2023-04-24", 43.6535, 6.94082, "+02:00") . "<br/>";

    //Ajoute les données de la table NW_recep à NW_stats si et seulement si ils ont des dates différentes
    foreach ($receps as $recep) {
        /*Requête SQL pour insérer des données dans la table NW_stats*/
        $sql_statsINSERT = 'INSERT INTO nw_stats(date, time_zone, localization, recep_temp_average, recep_hum, 
        recep_wind_direction, recep_wind_speed, recep_precipitation, recep_precipitation_speed, recep_pressure, stat_temp_feelsLike, stat_sunrise, stat_sunset)
        VALUES (:date, :time_zone, :localization, :recep_temp_average, :recep_hum, 
        :recep_wind_direction, :recep_wind_speed, :recep_precipitation, :recep_precipitation_speed, :recep_pressure, :stat_temp_feelsLike :stat_sunrise, :stat_sunset);';
        $insertStats = $dbMySQL->prepare($sql_statsINSERT);

        /*Avec les données de la table NW_recep de l'indexation de la variable $indexRechercheReceps*/
        $insertStats->execute([
            'date' => $recep["date"],
            'time_zone' => $recep["time_zone"],
            'localization' => $recep["localization"],
            'recep_temp_average' => $recep["recep_temp_average"],
            'recep_hum' => $recep["recep_hum"],
            'recep_wind_direction' => $recep["recep_wind_direction"],
            'recep_wind_speed' => $recep["recep_wind_speed"],
            'recep_precipitation' => $recep["recep_precipitation"],
            'recep_precipitation_speed' => $recep["recep_precipitation_speed"],
            'recep_pressure' => $recep["recep_pressure"],
            'stat_temp_feelsLike' => get_feelsLike(),
            'stat_sunrise' => get_sunrise($recep["date"], $recep["ST_X(r.localization)"], $recep["ST_Y(r.localization)"], $recep["time_zone"]),
            'stat_sunset' => get_sunset($recep["date"], $recep["ST_X(r.localization)"], $recep["ST_Y(r.localization)"], $recep["time_zone"])
        ]);
    }
}