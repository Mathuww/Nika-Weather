<?php
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

header("Location: ./php/home.php");
exit();