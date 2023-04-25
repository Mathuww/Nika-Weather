<?php
include_once('./php/src/functionsTest.php');
include_once('./php/src/variables.php');
include_once('./php/src/Calculs-functions.php');
include_once('./php/src/WithSQL-functions.php');
$dbNW = connectDataBase();
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_input-Mode.css">
    <?php if ($back_mode == "light") : ?>
        <link rel="icon" type="image/png" href="ressources/icons/favicon+(LIGHT).png">
    <?php endif; ?>
    <?php if ($back_mode == "dark") : ?>
        <link rel="icon" type="image/png" href="ressources/icons/favicon+(DARK).png">
    <?php endif; ?>
    <title>Accueil, Nika Wheather</title>

    <!-- Intégration de la police "Epilogue" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
</head>


<body>
    <?php include_once('./php/styleWithPHP.php');?>
    <header class="NW-header mobile">
        <div class="NW-header__titles">
            <span class="NW-header__titles--Place">Votre lycée Tocqueville</span>
            <span class="NW-header__titles--Now">Maintenant</span>
        </div>
        <span class="NW-header__space"></span>
        <!-- <div class="NW-header__icons"> -->
            <?php if ($back_mode == "light") : ?>
                <a href="php/connect.php" class="settingsLink"><img src="ressources/icons/M_settings(LIGHT).png"  alt="Paramètres" class="settingsIcon"/></a>
                <img src="ressources/icons/logo(LIGHT).png"  alt="Logo" class="logoIcon"/>
            <?php endif; ?><?php if ($back_mode == "dark") : ?>
                <a href="php/connect.php" class="settingsLink"><img src="ressources/icons/M_settings(DARK).png"  alt="Paramètres" class="settingsIcon"/></a>
                <img src="ressources/icons/logo(DARK).png"  alt="Logo" class="logoIcon"/>
            <?php endif; ?>
        <!-- </div> -->
    </header>

    <section class="weather-3D mobile">
        <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.297/build/spline-viewer.js"></script>
        <spline-viewer hint loading-anim url="https://prod.spline.design/qx8QwirUOYRwWWVx/scene.splinecode"></spline-viewer>
    </section>
    <section class="test">
        <?php
        //Incluire le test
        include_once('./php/testAffichage.php');
        ?>
    </section>
    <?php include_once('./html/othersMobile.html'); ?>
    <?php include_once('./php/buttonMode.php'); ?>
</body>

</html>