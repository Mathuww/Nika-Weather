<?php include_once("variables_functions/variables.php"); ?>
<!DOCTYPE html>

<head>
    <?php include_once('./header.php'); ?>
    <title>Accueil, Nika Wheather</title>

    <!-- Intégration de la police "Epilogue" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
</head>


<body>
    <?php include_once('styleWithPHP.php'); ?>
    <?php include_once('othersMobile.php'); ?>
    <header class="NW-header startMargin mobile">
        <div class="NW-header__titles">
            <h1 class="NW-header__titles--Primary zeroMargin">Votre lycée Tocqueville</h1>
            <h2 class="NW-header__titles--Secondary zeroMargin">Maintenant</h2>
        </div>
        <span class="NW-header__space"></span>
        <!-- <div class="NW-header__icons"> -->
        <?php if ($_SESSION["DL-USER"] == "light") : ?>
            <a href="connect.php" class="NW-header__icon"><img src="../resources/icons/M_settings(LIGHT).png" alt="Paramètres" class="NW-header__icon--img" /></a>
            <img src="../resources/icons/logo(LIGHT).png" alt="Logo" class="NW-header__logo" />
            <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
            <a href="connect.php" class="NW-header__icon"><img src="../resources/icons/M_settings(DARK).png" alt="Paramètres" class="NW-header__icon--img" /></a>
            <img src="../resources/icons/logo(DARK).png" alt="Logo" class="NW-header__logo" />
        <?php endif; ?>
        <!-- </div> -->
    </header>
    <main>

        <section class="NW-interface3D startMargin mobile">
            <div class="NW-interface3D__interaction">
                <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.304/build/spline-viewer.js"></script>
                <spline-viewer url="https://prod.spline.design/QlzNR6kt0IfdMUcV/scene.splinecode"></spline-viewer>
            </div>
        </section>

        <section class="NW-meta startMargin mobile">
            <span class="NW-meta__temp">
                <?php echo round($LastStats["recep_temp_average"], 1, PHP_ROUND_HALF_UP) ?>°C
            </span>
            <p class="NW-meta__quote">Citation envisagée (conseil ou 2nd degré selon les données)</p>
        </section>

        <section class="NW-pannel mobile">
            <p>Le <?php echo $LastStats["date"]; ?>,</p>
            <!-- <?php
                    //Incluire le test
                    //include_once('../archive/testAffichage.php'); 
                    ?> -->
            <p>Ressenti : <?php
                            if (isset($LastStats["stat_temp_feelsLike"])) {
                                echo $LastStats["stat_temp_feelsLike"];
                            } else {
                                echo "NULL";
                            } ?></p>
            <p>Température : <?php echo $LastStats["recep_temp_average"]; ?>°C</p>
            <p>Humidité : <?php echo $LastStats["recep_hum"]; ?>%</p>
            <p>Direction du vent : <?php echo $LastStats["recep_wind_direction"]; ?>°</p>
            <p>Vitesse du vent : <?php echo $LastStats["recep_wind_speed"]; ?> km/h</p>
            <p>Précipitation : <?php echo $LastStats["recep_precipitation"]; ?> mm</p>
            <p>Vitesse de précipitation : <?php echo $LastStats["recep_precipitation_speed"]; ?> km/h</p>
            <p>Pression atmosphérique : <?php echo $LastStats["recep_pressure"]; ?> hPa</p>
            <p>Aurore (la fin) : <?php echo $LastStats["stat_sunrise"]; ?> h</p>
            <p>Crépuscule (la début) : <?php echo $LastStats["stat_sunset"]; ?> h</p>
        </section>
    </main>

    <footer class="NW-footer mobile">
        <div class="NW-footer__primaryInfo">
            <a href="connect.php" class="NW-footer__primaryInfo--texte">Connexion pour les administrateurs <br />(bénéficiant de leurs préférences d’affichages)</a>
            <div class="NW-footer__primaryInfo--iconMode">
                <?php include('buttonMode.php'); ?>
            </div>
        </div>
        <a href="info.php" class="NW-footer__secondaryInfo">
            Pour plus d’information sur le projet terminale concours Nika Weather, <br />veuillez accéder à cette page.</a>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="NW-footer__certif">Tout droit réservé à Nika’Weather®</a>
    </footer>
</body>

</html>