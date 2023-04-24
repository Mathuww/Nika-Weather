<?php
function get_sunrise (string $date, float $latitude, float $longitude, string $jtTimezone) :string
{
    $jetlag = (int)($jtTimezone);

    $dsi = date_sun_info(strtotime($date), $latitude, $longitude);
    $sunrise = new DateTime("@" . $dsi['sunrise']);

	$heure = $jetlag; //time zone "Europe/Paris" additionné
	$minute = 1; //pour arrondir à la minute supérieur
	$seconde = 0;

    //Avec des timestamps du lever du soleil, addition du décalage horraire, arrondir à la minute supérieur (pour la précision)
    $sunrise = strtotime("+$heure hours $minute minutes $seconde seconds", date_timestamp_get($sunrise));
    $sunrise = date('H:i',$sunrise) . ":00";
    
    return $sunrise;
}

function get_sunset (string $date, float $latitude, float $longitude, string $jtTimezone) :string
{
    $jetlag = (int)($jtTimezone);

    $dsi = date_sun_info(strtotime($date), $latitude, $longitude);
    $sunset = new DateTime("@" . $dsi['sunset']);

	$heure = $jetlag; //time zone "Europe/Paris" additionné
	$minute = 0; //pour arrondir à la minute inférieur
	$seconde = 0;

    //Avec des timestamps du lever du soleil, addition du décalage horraire, arrondir à la minute inférieur (pour la précision)
    $sunset = strtotime("+$heure hours $minute minutes $seconde seconds", date_timestamp_get($sunset));
    $sunset = date('H:i',$sunset) . ":00";
    
    return $sunset;
}