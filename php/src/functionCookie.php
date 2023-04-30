<?php
function modeCookie (string $mode)
{
    //Enfin, en tatonnant, le cookie marche avec les trois sécurité (surtout pour Firefox avec le SameSite)
    setcookie(
        'MODE_USER',
        $mode,
        getDurationSchool(time()), //test, une durée au pif
        "/; SameSite=Strict; Secure; HttpOnly"
    );
}

function getDurationSchool (string $now) {
    //Récupérer le 1er juillet prochain pour supprimer le cookie (année scolaire terminé)
    $year = date('Y',$now);
    $month = date('m',$now);
    if ($month < 01 || $month > 12) {
        echo "Vous êtes tombé sur le mauvais mois. Erreur 40mois";
    } elseif ($month >= 7 && $month <= 12) {
        return strtotime(($year+1) . "-07-01 00:00:00");
    } else {
        return strtotime("$year-07-01 00:00:00");
    }

}

function allCookie (string $nameCookie, string $valueCookie, int $timestampCookie)
{
    //au cas où, je crée cette fonction
    setcookie(
        $nameCookie,
        $valueCookie,
        $timestampCookie,
        "/; SameSite=Strict; Secure; HttpOnly"
    );
}