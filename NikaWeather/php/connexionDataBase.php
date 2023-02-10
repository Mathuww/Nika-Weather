<?php
//connexion à la database mysql 'nwv1'
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=nwv1;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
