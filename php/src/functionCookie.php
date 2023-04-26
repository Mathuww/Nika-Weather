<?php
function modeCookie (string $mode)
{
    //Enfin, en tatonnant, le cookie marche avec les trois sécurité (surtout pour Firefox avec le SameSite)
    setcookie(
        'MODE_USER',
        $mode,
        time() + 600, //test, une durée au pif
        "/; SameSite=Strict; Secure; HttpOnly"
    );
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