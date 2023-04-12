<?php
//Récupérer les données de receps qui existent déjà dans la table stats (pour éviter les doublons)
$sql_exist = "SELECT nw_stats.date FROM nw_receps JOIN nw_stats ON nw_receps.date = nw_stats.date;";
$existStatement = $mysqlClient->prepare($sql_exist);
$existStatement->execute();
$existDates = $existStatement->fetchAll();

// echo "<pre>";
// print_r($existsDates);
// echo "</pre>";
