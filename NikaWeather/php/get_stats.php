<?php
//Récupérer les données de la table stats
$sql_stats = 'SELECT * FROM nw_stats';
$statsStatement = $mysqlClient->prepare($sql_stats);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();
