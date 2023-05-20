<?php
function modeCookie(string $mode, string $server)
{
    //Enfin, en tatonnant, le cookie marche avec les trois sécurité (surtout pour Firefox avec le SameSite)
    if ($server == 'uwamp') {
        setcookie(
            'MODE_USER',
            $mode,
            getDurationSchool(time()), //test, une durée au pif
            "/; SameSite=Strict; Secure; HttpOnly"
        );
    } elseif ($server == 'wamp') {
        setcookie(
            'MODE_USER',
            $mode,
            [
                'expires' => getDurationSchool(time()),
                'domain' => '',
                'path' => '/NikaWeather/sources/php/',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict',
            ]
        );
    }
}

function getDurationSchool(string $now)
{
    //Récupérer le 1er juillet prochain pour supprimer le cookie (année scolaire terminé)
    $year = date('Y', $now);
    $month = date('m', $now);
    if ($month < 01 || $month > 12) {
        echo "Vous êtes tombé sur le mauvais mois. Erreur 40mois";
    } elseif ($month >= 7 && $month <= 12) {
        return strtotime(($year + 1) . "-07-01 00:00:00");
    } else {
        return strtotime("$year-07-01 00:00:00");
    }
}

function allCookieNW(string $nameCookie, string $valueCookie, int $timestampCookie, string $server)
{
    //au cas où, je crée cette fonction
    if ($server == 'wamp') {
        setcookie(
            $nameCookie,
            $valueCookie,
            [
                'expires' => $timestampCookie,
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
                //"/; SameSite=Strict; Secure; HttpOnly"
            ]
        );
    } elseif ($server == 'uwamp') {
        setcookie(
            $nameCookie,
            $valueCookie,
            $timestampCookie,
            "/; SameSite=Strict; Secure; HttpOnly"
        );
    }
}
