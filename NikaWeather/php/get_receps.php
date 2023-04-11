<?php
//Récupérer les données de la table receps
$sql_receps = "SELECT * FROM NW_receps";
$recepsStatement = $mysqlClient->prepare($sql_receps);
$recepsStatement->execute();
$receps = $recepsStatement->fetchAll();
