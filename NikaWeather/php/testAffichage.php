<?php
//Nettoyer les données tests de la table NW_stats
insert_newStats($dbNW);


//Récupérer les données receps sans y modifier (tentative de tri)
$receps = get_totalReceps($dbNW);


//Afficher les données de la table receps
foreach ($receps as $recep) {
?>
    <p><?php
        echo "C'était le " . $recep["date"] . " avec une température s'approchant des " . $recep["recep_temp_average"] . "°C." ?></p>
<?php
}


echo "<br>";
echo "____________________________________" . "<br>";
echo "<br>";


//Récupérer les données stats sans y modifier
$stats = get_totalStats($dbNW);

//Afficher les données de la table stats
foreach ($stats as $stat) {
?>
    <p><?php
        echo "C'était le " . $stat["date"] . " avec une température s'approchant des " . $stat["recep_temp_average"] . "°C." ?></p>
<?php
}


echo "<br>";
echo "____________________________________" . "<br>";
echo "<br>";


//Transferer les données qui diffèrent de receps à stats
transfert_recepsToStats($dbNW);
$stats = get_totalStats($dbNW);


//Afficher les données de la table stats
foreach ($stats as $stat) {
?>
    <p><?php
        echo "C'était le " . $stat["date"] . " avec une température s'approchant des " . $stat["recep_temp_average"] . "°C." ?></p>
<?php
}


echo "<br>";
echo "____________________________________" . "<br>";
echo "<br>";
