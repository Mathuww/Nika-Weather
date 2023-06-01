<?php
include_once('variables_functions/variables.php');
if (isset($_COOKIE["connected"]) and $_COOKIE["connected"] == true) {
    $cookieNavigation=true;
    $_SESSION["user"] = $_COOKIE["user"];
} elseif (isset($_SESSION["connected"]) and $_SESSION["connected"] == "true") {
    $cookieNavigation=false;
}

if(isset($cookieNavigation)) {
    $settings = getSettings($dbNW);
}


if (
    isset($cookieNavigation) 
    and isset($_GET["input-archive"])
    and isset($_GET["input-graphique"]) 
    and isset($_GET["input-sunrise"]) 
    and isset($_GET["input-sunset"]) 
    and isset($_GET["input-temp_average"]) 
    and isset($_GET["input-temp_min"]) 
    and isset($_GET["input-temp_max"])
    and isset($_GET["input-temp_feelsLike"]) 
    and isset($_GET["input-humidity"]) 
    and isset($_GET["input-pressure"]) 
    and isset($_GET["input-wind_direction"])
    and isset($_GET["input-wind_speed"]) 
    and isset($_GET["input-precipitation"]) 
    and isset($_GET["input-precipitation_speed"])
) {
    $settingsParameters = verifSettings(
        $_GET["input-archive"], 
        $_GET["input-graphique"], 
        $_GET["input-sunrise"],
        $_GET["input-sunset"], 
        $_GET["input-temp_average"], 
        $_GET["input-temp_min"], 
        $_GET["input-temp_max"], 
        $_GET["input-temp_feelsLike"],
        $_GET["input-humidity"], 
        $_GET["input-pressure"], 
        $_GET["input-wind_direction"], 
        $_GET["input-wind_speed"], 
        $_GET["input-precipitation"], 
        $_GET["input-precipitation_speed"]
    );

    transfert_setSettings($dbNW, $settings, $_SESSION["user"], $settingsParameters);

    $signalClient = "Une changement a été mise à jour dernièrement.";
    $_SESSION["settingsClient"] = $signalClient;
    header("Location: ./settings.php");
} else {
    if (isset($_SESSION["settingsClient"])) {
        $signalClient = $_SESSION["settingsClient"];
    } else {
        $signalClient = "Salut " . $_SESSION["user"] . "...<br/>Attention, tout changement peut-être décisif. ";
    }
}
?>


<!DOCTYPE html>

<head>
    <?php include_once('./header.php'); ?>
    <title>Préférences admin, Nika Wheather</title>
</head>

<body>
    <?php include_once('styleWithPHP.php'); ?>
    <?php include_once('othersMobile.php'); ?>
    <?php if (isset($cookieNavigation)) : ?>
        <main class="NW-pannelBodyPage mobile">
            <section class="NW-header startMargin">
                <div class="NW-header__titles">
                <h1 class="NW-header__titles--Primary zeroMargin title">Nika Weather project,</h1>
                <h2 class="NW-header__titles--Secondary zeroMargin subtitle">c’est quoi ?</h2>
                </div>
                <?php if ($_SESSION["DL-USER"] == "light") : ?>
                <a href="logout.php" class="NW-header__icon">
                    <img src="../resources/icons/M_deconnected(LIGHT).png" alt="Icon de déconnection" class="NW-header__icon--img" />
                </a>
                <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(LIGHT).png" alt="Icon Logo" />
                </a>
                <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                <a href="logout.php" class="NW-header__icon">
                    <img src="../resources/icons/M_deconnected(DARK).png" alt="Icon de déconnection" class="NW-header__icon--img" />
                </a>
                <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(DARK).png" alt="Icon Logo" />
                    </a>
            <?php endif; ?>
            </section>
            <section class="NW-info">
                <p class="NW-info__intro NW-info__paragraphe">
                    <?php echo $signalClient; ?>
                </p>
            </section>

            <section class="NW-settings">
                <form method="get" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" id="NW-settings__form">
                    <?php foreach ($settings as $setting) {
                        echo "<div class='NW-settings__form__list'>" ;
                        echo "<label class='NW-settings__form__list--content'>" ;
                        echo $setting["content"];
                        echo "</label>";
                        if ($setting["value"] == true) {
                            echo "<input form='NW-settings__form' type='hidden' value=0 class='NW-settings__form__list--input' size='20' name='input-" . $setting["name"] . "' />" ;
                            echo "<input form='NW-settings__form' type='checkbox' class='NW-settings__form__list--input' size='20' checked name='input-" . $setting["name"] . "' />" ;
                        } else {
                            echo "<input form='NW-settings__form' type='hidden' value=0 class='NW-settings__form__list--input' size='20' name='input-" . $setting["name"] . "' />" ;
                            echo "<input form='NW-settings__form' type='checkbox' class='NW-settings__form__list--input' size='20' name='input-" . $setting["name"] . "' />" ;
                        }
                        echo "</div>";
                    } ?>

                    <div class="connect-Space__form--submit box-connect">
                        <button type="submit" class="btn"> Sauvegarder </button>
                    </div>
                </form>
            </section>


            <footer class="NW-footer NW-footer--extra mobile">
            <div class="NW-footer__primaryInfo">
                <a href="index.php" class="NW-footer__primaryInfo--texte"><br />Revenir à l’accueil Nika Weather</a>
                <div class="NW-footer__primaryInfo--iconMode">
                    <?php include('buttonMode.php'); ?>
                </div>
            </div>
            <a href="info.php" class="NW-footer__secondaryInfo">
                Pour plus d’information sur le projet terminale concours Nika Weather, <br />veuillez accéder à cette page.</a>
            <a href="logout.php" class="NW-footer__secondaryInfo">Se déconnecter</a>
            <a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" class="NW-footer__certif">Tout droit réservé à Nika’Weather®</a>
            </footer>
    </main>


    <?php else : ?>
    <section class="error mobile">
        <a href="index.php">
            <p>Erreur 404</p>
        </a>
    </section>
    <div class="mobile">
        <?php include('buttonMode.php'); ?>
    </div>
    <?php endif; ?>
</body>