<?php
function get_sunrise (string $date, float $latitude, float $longitude) :string
{
    // $jetlag = (int)($jtTimezone);

    //Je n'arrive pas à faire un décallage horraire (UTC) bien précis selon où tu es. 
    //À force, j'applique l'UTC de Paris (+02:00) sur toutes les données et le site.
    
    $dsi = date_sun_info(strtotime($date), $latitude, $longitude);
    $sunrise = new DateTime("@" . $dsi['sunrise']);

	$heure = /*$jetlag*/ 0;
	$minute = 1; //pour arrondir à la minute supérieur
	$seconde = 0;

    //Avec des timestamps du lever du soleil, arrondir la minute supérieur (pour la précision)
    $sunrise = strtotime("+$heure hours $minute minutes $seconde seconds", date_timestamp_get($sunrise));
    $sunrise = date('H:i',$sunrise) . ":00";
    
    return $sunrise;
}

function get_sunset (string $date, float $latitude, float $longitude) :string
{
    // $jetlag = (int)($jtTimezone);

    $dsi = date_sun_info(strtotime($date), $latitude, $longitude);
    $sunset = new DateTime("@" . $dsi['sunset']);

	$heure = /*$jetlag*/ 0;
	$minute = 0; //pour arrondir à la minute inférieur
	$seconde = 0;

    //Avec des timestamps du lever du soleil, arrondir la minute inférieur (pour la précision)
    $sunset = strtotime("+$heure hours $minute minutes $seconde seconds", date_timestamp_get($sunset));
    $sunset = date('H:i',$sunset) . ":00";
    
    return $sunset;
}

function get_feelsLike()
{
    return NULL;
}