<?php
include_once('connexionDataBase.php');
$sql_recepId = 'SELECT id FROM nw_recep';


$statsStatement = $mysqlClient->prepare($sqlQuery);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();

echo '<pre>';
print_r($stats);
echo '</pre>';
