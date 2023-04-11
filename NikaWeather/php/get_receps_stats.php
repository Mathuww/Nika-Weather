<?php
//Récupérer les données de la table receps
$sql_receps = "SELECT * FROM NW_receps";
$recepsStatement = $mysqlClient->prepare($sql_receps);
$recepsStatement->execute();
$receps = $recepsStatement->fetchAll();


//Récupérer les données de la table stats
$sql_stats = 'SELECT * FROM nw_stats';
$statsStatement = $mysqlClient->prepare($sql_stats);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();
