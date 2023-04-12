<?php
//Récupérer les données de receps qui existent déjà dans la table stats (pour éviter les doublons)
include('get_stats!.php');


//Ajoute les données de la table NW_recep à NW_stats si et seulement si ils ont des dates différentes
foreach ($receps as $recep) {
    $dateDoublon = array_column($existDates, 'date');
    if (!array_search($recep['date'], $dateDoublon)) {
        /*Requête SQL pour insérer des données dans la table NW_stats*/
        $sql_statsINSERT = 'INSERT INTO nw_stats(date, time_zone, recep_temp_average, recep_hum, recep_wind_direction, recep_wind_speed, 
        recep_UV, recep_pluviometer)
        VALUES (:date, :time_zone, :recep_temp_average, :recep_hum, :recep_wind_direction, :recep_wind_speed, 
        :recep_UV, :recep_pluviometer);';
        $insertStats = $mysqlClient->prepare($sql_statsINSERT);

        /*Avec les données de la table NW_recep de l'indexation de la variable $indexRechercheReceps*/
        $insertStats->execute([
            'date' => $recep["date"],
            'time_zone' => $recep["time_zone"],
            'recep_temp_average' => $recep["recep_temp_average"],
            'recep_hum' => /*$recep["recep_hum"]*/ 50,
            'recep_wind_direction' => /*$recep["recep_wind_direction"]*/ 215,
            'recep_wind_speed' => /*$recep["recep_wind_speed"]*/ 2.5,
            'recep_UV' => /*$recep["recep_UV"]*/ 0.78,
            'recep_pluviometer' => /*$recep["recep_pluviometer"]*/ 0
        ]);
    }
}


//Récupérer les données de la table stats
include('get_stats.php');
