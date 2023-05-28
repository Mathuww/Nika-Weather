<?php include_once("variables_functions/variables.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once('./header.php'); ?>
    <title>Accueil, Nika Wheather</title>
</head>


<body>
    <?php include_once('styleWithPHP.php'); ?>
    <?php include_once('othersMobile.php'); ?>
    <header class="NW-header startMargin mobile">
        <div class="NW-header__titles">
            <h1 class="NW-header__titles--Primary zeroMargin title">Votre lycée Tocqueville</h1>
            <h2 class="NW-header__titles--Secondary zeroMargin subtitle">Maintenant</h2>
        </div>
        <?php if ($_SESSION["DL-USER"] == "light") : ?>
            <a href="connect.php" class="NW-header__icon"><img src="../resources/icons/M_settings(LIGHT).png" alt="Icon Paramètres" class="NW-header__icon--img" /></a>
            <img src="../resources/icons/logo(LIGHT).png" alt="Icon Logo" class="NW-header__logo" />
            <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
            <a href="connect.php" class="NW-header__icon"><img src="../resources/icons/M_settings(DARK).png" alt="Icon Paramètres" class="NW-header__icon--img" /></a>
            <img src="../resources/icons/logo(DARK).png" alt="Icon Logo" class="NW-header__logo" />
        <?php endif; ?>
        <!-- </div> -->
    </header>

<body>
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
            <div class="NW-pannel-header">
                <div class="NW-pannel-header_text">
                    <span class="NW-pannel-header_text-title title">Notre Bulletin Météo</span>
                    <a href="./dataTempAverage.php"><span class="NW-pannel-header_text-subtitle subtitle">Maintenant, le
                            <?php
                            echo date('d/m/Y à H:i', strtotime($LastStats["date"]));
                            ?>
                        </span></a>
                </div>
                <div class="NW-pannel-header_icon">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/direction-page(LIGHT).png" alt="Icon directive" />
                        <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/direction-page(DARK).png" alt="Icon directive" />
                    <?php endif; ?>
                </div>
            </div>
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

            <a href="./dataTempAverage.php" class="NW-pannel-infoArchive subtitle">
                <p>Accéder aux archives météorologiques illustrées avec des graphiques</p>
            </a>
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
        <a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" class="NW-footer__certif">Tout droit réservé à Nika’Weather®</a>
    </footer>
</body>

</html>