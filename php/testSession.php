<?php
session_start();

if (isset($_SESSION["ok"])) {
    $_SESSION["ok"] = 5;
} else {
    $_SESSION["ok"] = 2;
}
echo $_SESSION["ok"];