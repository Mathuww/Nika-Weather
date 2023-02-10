<?php
include_once('connexionDataBase.php');
$sqlQuery = 'SELECT * FROM nw_stats';
$statsStatement = $mysqlClient->prepare($sqlQuery);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();

echo '<pre>';
print_r($stats);
echo '</pre>';
