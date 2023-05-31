<?php
include_once('variables_functions/variables.php');
if (isset($_COOKIE["connected"]) and $_COOKIE["connected"] == true) {
    $cookieNavigation=true;
    $_SESSION["user"] = $_COOKIE["user"];
} elseif (isset($_SESSION["connected"]) and $_SESSION["connected"] == "true") {
    $cookieNavigation=false;
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
                    <img src="../resources/icons/M_deconnected(LIGHT).png" alt="Icon Paramètres" class="NW-header__icon--img" />
                </a>
                <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(LIGHT).png" alt="Icon Logo" />
                </a>
                <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                <a href="logout.php" class="NW-header__icon">
                    <img src="../resources/icons/M_deconnected(DARK).png" alt="Icon Paramètres" class="NW-header__icon--img" />
                </a>
                <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(DARK).png" alt="Icon Logo" />
                    </a>
            <?php endif; ?>
            </section>
            <section class="NW-info">
                <p class="NW-info__intro NW-info__paragraphe">
                    Salut <?php echo $_SESSION["user"]; ?>... 
                    <br/>Attention, tout changement peut-être décisif.
                </p>
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