<?php
date_default_timezone_set("Europe/Paris");
include_once("/functionCookie.php");

//ça marche pas mes cookies avec mon bouton, je suis extrêmement déçu
//Je voulais ajouter des cookies tout en utilisant mon bouton, 
//et puis je voulais détruire le cookies tous les ans à partir de juillet (année scolaire terminé)

// if (isset($_COOKIE["MODE_USER"]) && isset($_GET["input_mode"])) {
//     modeCookie("light");
// } elseif (isset($_COOKIE["MODE_USER"])) {
//     modeCookie($_COOKIE["MODE_USER"]);
// } elseif (!isset($_COOKIE["MODE_USER"])) {
//     modeCookie("dark");
//     header("Refresh:0");
// }


// $now = date("d/m/Y H:i:s", time());
// echo $now;

if (isset($_GET['input_mode'])) {
    $back_mode = "light";
} else {
    $back_mode = "dark";
}