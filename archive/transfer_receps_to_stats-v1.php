<?php
//Se connecter à la base de donnée nwv1
include_once('connexionDataBase.php');

//Récupérer les données de la table receps
$sql_receps = 'SELECT * FROM NW_receps';
$recepsStatement = $mysqlClient->prepare($sql_receps);
$recepsStatement->execute();
$receps = $recepsStatement->fetchAll();

//Afficher les données de la table receps
foreach ($receps as $recep) {
?>
    <p><?php
        echo "C'était le " . $recep["date"] . " avec une température s'approchant des " . $recep["recep_temp_average"] . "°C." ?></p>
<?php
}


echo "<br>";
echo "___________________________________________________________________________________________" . "<br>";
echo "<br>";


//Récupérer les données de la table stats
$sql_stats = 'SELECT * FROM nw_stats';
$statsStatement = $mysqlClient->prepare($sql_stats);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();

//Afficher les données de la table stats
foreach ($stats as $stat) {
?>
    <p><?php
        echo "C'était le " . $stat["date"] . " avec une température s'approchant des " . $stat["recep_temp_average"] . "°C." ?></p>
<?php
}


echo "<br>";
echo "___________________________________________________________________________________________" . "<br>";
echo "<br>";


//Ajoute les données de la table NW_recep à NW_stats si et seulement si ils ont des dates différentes
foreach ($receps as $recep) {
    $date = array_column($stats, 'date');
    if (!array_search($recep['date'], $date)) {
        /*Requête SQL pour insérer des données dans la table NW_stats*/
        $sql_statsINSERT = 'INSERT INTO nw_stats(date, time_zone, recep_temp_average) VALUES (:date, :time_zone, :recep_temp_average);';
        $insertStats = $mysqlClient->prepare($sql_statsINSERT);

        /*Avec les données de la table NW_recep de l'indexation de la variable $indexRechercheReceps*/
        $insertStats->execute([
            'date' => $recep["date"],
            'time_zone' => $recep["time_zone"],
            'recep_temp_average' => $recep["recep_temp_average"]
        ]);
    }
}
echo "Le transfert de données a bien fonctionné (si aucun message d'erreur est affiché).";


echo "<br>";
echo "___________________________________________________________________________________________" . "<br>";
echo "<br>";


//Récupérer les données de la table stats
$sql_stats = 'SELECT * FROM nw_stats';
$statsStatement = $mysqlClient->prepare($sql_stats);
$statsStatement->execute();
$stats = $statsStatement->fetchAll();

//Afficher les données de la table stats
foreach ($stats as $stat) {
?>
    <p><?php
        echo "C'était le " . $stat["date"] . " avec une température s'approchant des " . $stat["recep_temp_average"] . "°C." ?></p>
<?php
}
?>