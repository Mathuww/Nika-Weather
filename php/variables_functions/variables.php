<?php
session_start();

// $zenithTocquevilleSunrise = 90.25;
// $zenithTocquevilleSunset = 90.6;

date_default_timezone_set("Europe/Paris");
include_once("functionCookie.php");

//ça marche pas mes cookies avec mon bouton, je suis extrêmement déçu
//Je voulais ajouter des cookies tout en utilisant mon bouton, 
//et puis je voulais détruire le cookies tous les ans à partir de juillet (année scolaire terminé)

// $now = date("d/m/Y H:i:s", time());
// echo $now;

if (isset($_GET['input_mode'])) {
    if ($_GET['input_mode'] == True) {
        $_SESSION["DL-USER"] = "light";
        modeCookie("light");
    } elseif ($_SESSION["DL-USER"] == "light" && $_GET['input_mode'] == False) {
        $_SESSION["DL-USER"] = "dark";
        modeCookie("dark");
    }
} elseif (isset($_COOKIE["MODE_USER"])) {
    $_SESSION["DL-USER"] = $_COOKIE["MODE_USER"];
} elseif (!isset($_SESSION["DL-USER"])) {
    $_SESSION["DL-USER"] = "dark";
    modeCookie("dark");
}

include_once('functionsTest.php');
include_once('Calculs-functions.php');
include_once('WithSQL-functions.php');
$dbNW = connectDataBase();
$allStats = get_totalStats($dbNW);

//Initialisation des premières valeurs de stats
$LastStats = getStatsLastRecent($dbNW);
