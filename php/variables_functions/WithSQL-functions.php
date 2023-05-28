<?php
function connectDataBase(string $server): PDO
{
    try {
        if ($server == "uwamp") {
            $db =  new PDO('mysql:host=localhost;dbname=nwv1;charset=utf8', 'root', 'root');
        } elseif ($server == 'wamp') {
            $db =  new PDO('mysql:host=localhost;dbname=nwv1;charset=utf8', 'root', '');
        } else {
            die('Erreur : Mal configuration de la variable $typeServer');
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}

function get_newReceps(PDO $dbMySQL): array
{
    //Récupérer les données de receps qui existent déjà dans la table stats (pour éviter les doublons)
    $sql_exist = "SELECT r.date, r.localization, ST_X(r.localization), ST_Y(r.localization), r.recep_temp_average, r.recep_hum, 
    r.recep_wind_direction, r.recep_wind_speed, r.recep_precipitation, r.recep_precipitation_speed, r.recep_pressure
    FROM nw_receps r WHERE r.date NOT IN (
        SELECT s.date FROM nw_stats s 
    );";
    $existStatement = $dbMySQL->prepare($sql_exist);
    $existStatement->execute();
    return $existStatement->fetchAll();
}

function get_totalReceps(PDO $dbMySQL): array
{
    //Récupérer les données de la table receps
    $sql_receps = "SELECT * FROM NW_receps";
    $recepsStatement = $dbMySQL->prepare($sql_receps);
    $recepsStatement->execute();
    return $recepsStatement->fetchAll();
}

function get_totalStats(PDO $dbMySQL): array
{
    //Récupérer les données de la table stats
    $sql_stats = 'SELECT * FROM nw_stats';
    $statsStatement = $dbMySQL->prepare($sql_stats);
    $statsStatement->execute();
    return $statsStatement->fetchAll();
}

function delete_totalStats(PDO $dbMySQL)
{
    //Supprimer les données de la table NW_stats
    $sql_deleteStats = "DELETE FROM nw_stats;";
    $deleteStatsStatement = $dbMySQL->prepare($sql_deleteStats);
    $deleteStatsStatement->execute();
}

function transfert_recepsToStats(PDO $dbMySQL)
{
    //Récupérer les données de receps qui existent déjà dans la table stats (pour éviter les doublons)
    $receps = get_newReceps($dbMySQL);
    //// echo "<pre>";
    //// print_r($receps);
    //// echo "<pre/>";

    //Ajoute les données de la table NW_recep à NW_stats si et seulement si ils ont des dates différentes
    foreach ($receps as $recep) {
        echo $recep["date"];

        /*Requête SQL pour insérer des données dans la table NW_stats*/
        $sql_statsINSERT = 'INSERT INTO nw_stats(date, localization, recep_temp_average, recep_hum, 
        recep_wind_direction, recep_wind_speed, recep_precipitation, recep_precipitation_speed, recep_pressure, stat_sunrise, stat_sunset)
        VALUES (:date, :localization, :recep_temp_average, :recep_hum, 
        :recep_wind_direction, :recep_wind_speed, :recep_precipitation, :recep_precipitation_speed, :recep_pressure, :stat_sunrise, :stat_sunset);';
        $insertStats = $dbMySQL->prepare($sql_statsINSERT);

        /*Avec les données de la table NW_recep de l'indexation de la variable $indexRechercheReceps*/
        $insertStats->execute([
            'date' => $recep["date"],
            'localization' => $recep["localization"],
            'recep_temp_average' => $recep["recep_temp_average"],
            'recep_hum' => $recep["recep_hum"],
            'recep_wind_direction' => $recep["recep_wind_direction"],
            'recep_wind_speed' => $recep["recep_wind_speed"],
            'recep_precipitation' => $recep["recep_precipitation"],
            'recep_precipitation_speed' => $recep["recep_precipitation_speed"],
            'recep_pressure' => $recep["recep_pressure"],
            'stat_sunrise' => get_sunrise($recep["date"], $recep["ST_X(r.localization)"], $recep["ST_Y(r.localization)"]),
            'stat_sunset' => get_sunset($recep["date"], $recep["ST_X(r.localization)"], $recep["ST_Y(r.localization)"])
        ]);
    }
}

function updateData(PDO $dbMySQL): array
{
    transfert_recepsToStats($dbMySQL);
    return get_totalReceps($dbMySQL);
}

function getStatsLastRecent(PDO $dbMySQL): array
{
    //Récupérer les données de la table stats
    // $sql_statsRecent = 'SELECT sA.* FROM nw_stats sA WHERE sA.date in (
    //     SELECT MAX(sZ.date) FROM nw_stats sZ;
    // );';
    $sql_statsRecent = 'SELECT * FROM nw_stats ORDER BY date DESC LIMIT 0,1;';
    $statsRecentStatement = $dbMySQL->prepare($sql_statsRecent);
    $statsRecentStatement->execute();
    return $statsRecentStatement->fetchAll()[0];
}

function getAdmin(PDO $dbMySQL): array
{
    //Récupérer les données de la table stats
    $sql_admin = 'SELECT * FROM nw_admin';
    $adminStatement = $dbMySQL->prepare($sql_admin);
    $adminStatement->execute();
    return $adminStatement->fetchAll();
}
