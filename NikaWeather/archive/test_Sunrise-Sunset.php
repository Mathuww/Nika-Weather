<p>Voici mes nombreux tests pour obtenir l'heure de la fin de l'aurore (lever du soleil) et du début du crépuscule (coucher du soleil)</p>
<?php

echo "||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||" . "<br>";
echo "<br>";

echo "Voici la méthode la plus efficace, sauf qu'elle est obsolète pour php ;)." . "<br/>";

$timestampTest = strtotime("2022-04-05");
echo $timestampTest . "<br/>";
echo date_sunrise($timestampTest, SUNFUNCS_RET_STRING, 43.6535, 6.94082, $zenithTocquevilleSunrise, 2) . "<br/>";
echo date_sunset($timestampTest, SUNFUNCS_RET_STRING, 43.6535, 6.94082, $zenithTocquevilleSunset, 2) . "<br/>";
echo date("h:i:s", (date_sun_info($timestampTest, 43.65367413712164, 6.94149661740865)["sunrise"])) . "<br/>";
echo date("h:i:s", (date_sun_info($timestampTest, 43.65367413712164, 6.94149661740865)["sunset"])) . "<br/>";



echo "<br>";
echo "||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||" . "<br>";
echo "<br>";



echo "Assez efficace, ce serait bien d'ajouter une minute pour la précision." . "<br/>";

$latitude = 43.65367413712164;
$longitude = 6.94149661740865;
$timezone = "Europe/Paris";

// push $timezoneDataBase
$timezoneDataBase = date_default_timezone_get();
date_default_timezone_set($timezone);
$dsi = date_sun_info($timestampTest, $latitude, $longitude);
// pop $timezoneDataBase
date_default_timezone_set($timezoneDataBase);

$dsi_timezoneDataBase = new DateTimeZone($timezone);
$sunrise = new DateTime("@" . $dsi['sunrise']);
$sunrise->setTimezone($dsi_timezoneDataBase);
echo $sunrise->format('Y-m-d H:i e') . "<br>";
$sunset = new DateTime("@" . $dsi['sunset']);
$sunset->setTimezone($dsi_timezoneDataBase);
echo $sunset->format('Y-m-d H:i e') . "<br>";



echo "<br>";
echo "||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||" . "<br>";
echo "<br>";

echo "Il faut bien passer par des tests !" . "<br/>";

$suninfo = date_sun_info($timestampTest, $latitude, $longitude);

$sunriseF = (int) date('H', $suninfo['sunrise']);

$sunriseF += ($suninfo['sunrise'] % 3600) / 60 / 60;

$sunriseS = date('H:i', $suninfo['sunrise']);

echo $sunriseF . "<br/>" . $sunriseS . "<br>";



echo "<br>";
echo "||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||" . "<br>";
echo "<br>";



echo "Ah, ba voilà une bonne méthode !!" . "<br/>";
// echo ($jtTimezone) . " => " . (int)($jtTimezone) . "<br/>";
$jetlag = (int)("+02:00");
$date = "2023-04-24";

$dsi = date_sun_info(strtotime($date), $latitude, $longitude);
$sunrise = new DateTime("@" . $dsi['sunrise']);

$heure = $jetlag; //time zone "Europe/Paris" additionné
$minute = 1; //pour arrondir à la minute supérieur
$seconde = 0;
$sunrise = date('H:i:s',strtotime("+$heure hours $minute minutes $seconde seconds", date_timestamp_get($sunrise))) . '<br>';
// echo date_timestamp_get($sunrise)  . " // " . strtotime('0-0-0 00:01:00') . "<br>";
// $sunrise = date_timestamp_get($sunrise) + strtotime('0-0-0 00:01:00');
echo "2023-04-24" . " => " . $sunrise;



echo "<br>";
echo "||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||" . "<br>";
echo "<br>";



echo "<br>";
echo "____________________________________" . "<br>";
echo "<br>";