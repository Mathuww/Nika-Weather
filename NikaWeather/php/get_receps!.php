<?php
//Récupérer les données de la table receps
$sql_receps = "SELECT * FROM NW_receps RIGHT JOIN nw_stats ON nw_receps.date = nw_stats.date;";
$recepsStatement = $mysqlClient->prepare($sql_receps);
$recepsStatement->execute();
$receps = $recepsStatement->fetchAll();
