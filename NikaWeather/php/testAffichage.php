<?php
//Se connecter à la base de donnée nwv1
include_once('connexionDataBase.php');

//Nettoyer les données tests de la table NW_stats
include_once('clean_table_test.php');


//Récupérer les données receps et stats sans y modifier
include_once('get_receps_stats.php');


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


//Transferer les données qui diffèrent de receps à stats
include_once('transfer_receps_to_stats-v2.php');


//Afficher les données de la table stats
foreach ($stats as $stat) {
?>
    <p><?php
        echo "C'était le " . $stat["date"] . " avec une température s'approchant des " . $stat["recep_temp_average"] . "°C." ?></p>
<?php
}
