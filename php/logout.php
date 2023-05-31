<?php
include_once("./variables_functions/functionCookie.php");

session_start(); 

//destruction du cookie de connection
allCookieNW("connected", false, time()-3600, $_SESSION["typeServer"]);
allCookieNW("user", "", time()-3600, $_SESSION["typeServer"]);

//destruction de la session de connection
session_destroy();
header("Location: ./index.php");