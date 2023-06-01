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

function verifSettings (
    bool $archive = false, 
    bool $graphique = false, 
    bool $sunrise = false, 
    bool $sunset = false, 
    bool $temp_average = false, 
    bool $temp_min = false, 
    bool $temp_max = false, 
    bool $temp_feelsLike = false, 
    bool $humidity = false, 
    bool $pressure = false, 
    bool $wind_direction = false, 
    bool $wind_speed = false,
    bool $precipitation = false, 
    bool $precipitation_speed = false
) :array
{ 
    if ($archive != "on") {
        $archive = 0; 
    } if ($graphique != "on") {
        $graphique = 0;
    } if ($sunrise != "on") {
        $sunrise = 0;
    } if ($sunset != "on") {
        $sunset = 0;
    } if ($temp_average != "on") {
        $temp_average = 0;
    } if ($temp_min != "on") {
        $temp_min = 0;
    } if ($temp_max != "on") {
        $temp_max = 0;
    } if ($temp_feelsLike != "on") {
        $temp_feelsLike = 0;
    } if ($humidity != "on") {
        $humidity = 0;
    } if ($pressure != "on") {
        $pressure = 0;
    } if ($wind_direction != "on") {
        $wind_direction = 0;
    } if ($wind_speed != "on") {
        $wind_speed = 0;
    } if ($precipitation != "on") {
        $precipitation = 0;
    } if ($precipitation_speed != "on") {
        $precipitation_speed = 0;
    }

    $settingsParameters = [
        "archive" => $archive,
        "graphique" => $graphique,
        "sunrise" => $sunrise,
        "sunset" => $sunset,
        "temp_average" => $temp_average,
        "temp_min" => $temp_min,
        "temp_max" => $temp_max,
        "temp_feelsLike" => $temp_feelsLike,
        "humidity" => $humidity,
        "pressure" => $pressure,
        "wind_direction" => $wind_direction,
        "wind_speed" => $wind_speed,
        "precipitation" => $precipitation,
        "precipitation_speed" => $precipitation_speed
    ];
    return $settingsParameters;
}