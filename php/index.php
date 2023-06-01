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
                    <span class="NW-pannel-header_text--title title">Notre Bulletin Météo</span>
                    <a href="./dataTempAverage.php"><span class="NW-pannel-header_text--subtitle subtitle">Maintenant, le
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

            <div class="NW-pannel-data">
                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_tempAverage(LIGHT).png" alt="Icon Température" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_tempAverage(DARK).png" alt="Icon Température"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Ressenti</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["stat_temp_feelsLike"]; ?>°C</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_humidity(LIGHT).png" alt="Icon Humiditée" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_humidity(DARK).png" alt="Icon Humiditée"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Humiditée</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["recep_temp_average"]; ?>%</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_windDirection(LIGHT).png" alt="Icon Vent (direction)" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_windDirection(DARK).png" alt="Icon Vent (direction)"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Direction du vent</span>
                        <span class="NW-pannel-data__box__text--value">~Nowt (<?php echo $LastStats["recep_wind_direction"]; ?>°)</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_windSpeed(LIGHT).png" alt="Icon Vent (vitesse)" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_windSpeed(DARK).png" alt="Icon Vent (vitesse)"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Vitesse du vent</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["recep_wind_speed"]; ?> km/h</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_precipitation(LIGHT).png" alt="Icon Précipitation (quantité)" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_precipitation(DARK).png" alt="Icon Précipitation (quantité)"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Précipitations</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["recep_precipitation"]; ?> mm</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_precipitationSpeed(LIGHT).png" alt="Icon Précipitation (vitesse)" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_precipitationSpeed(DARK).png" alt="Icon Précipitation (vitesse)"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Vitesse de précipitations</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["recep_precipitation_speed"]; ?> km/h</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_feelsLike(LIGHT).png" alt="Icon Ressentie" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_feelsLike(DARK).png" alt="Icon Ressentie"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Ressenti</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["stat_temp_feelsLike"]; ?>°C</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_feelsLike(LIGHT).png" alt="Icon Pression Atmosphérique" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_feelsLike(DARK).png" alt="Icon Pression Atmosphérique"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Pression atmosphérique</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["recep_pressure"]; ?>hPa</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_leverSoleil(LIGHT).png" alt="Icon Aurore" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_leverSoleil(DARK).png" alt="Icon Aurore"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Aurore (la fin)</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["stat_sunrise"]; ?>hPa</span>
                    </div>
                </div>

                <div class="NW-pannel-data__box">
                    <?php if ($_SESSION["DL-USER"] == "light") : ?>
                        <img src="../resources/icons/M_coucherSoleil(LIGHT).png" alt="Icon Crépuscule" />
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                        <img src="../resources/icons/M_coucherSoleil(DARK).png" alt="Icon Crépuscule"/>
                    <?php endif; ?>
                    <div class="NW-pannel-data__box__text">
                        <span class="NW-pannel-data__box__text--title">Crépuscule (le début)</span>
                        <span class="NW-pannel-data__box__text--value"><?php echo $LastStats["stat_sunset"]; ?>hPa</span>
                    </div>
                </div>
            </div>

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