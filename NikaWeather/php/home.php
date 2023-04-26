<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_input-Mode.css">
    <?php if ($back_mode == "light") : ?>
        <link rel="icon" type="image/png" href="resources/icons/favicon(LIGHT).png">
    <?php endif; ?>
    <?php if ($back_mode == "dark") : ?>
        <link rel="icon" type="image/png" href="resources/icons/favicon(DARK).png">
    <?php endif; ?>
    <title>Accueil, Nika Wheather</title>

    <!-- Intégration de la police "Epilogue" -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,900&display=swap" rel="stylesheet">
</head>


<body>
    <?php include_once('./php/styleWithPHP.php');?>
    <?php include_once('./php/othersMobile.php'); ?>
    <header class="NW-header startMargin mobile">
        <div class="NW-header__titles">
            <h1 class="NW-header__titles--Primary zeroMargin">Votre lycée Tocqueville</h1>
            <h2 class="NW-header__titles--Secondary zeroMargin">Maintenant</h2>
        </div>
        <span class="NW-header__space"></span>
        <!-- <div class="NW-header__icons"> -->
            <?php if ($back_mode == "light") : ?>
                <a href="php/connect.php" class="NW-header__icon"><img src="resources/icons/M_settings(LIGHT).png"  alt="Paramètres" class="NW-header__icon--img"/></a>
                <img src="resources/icons/logo(LIGHT).png"  alt="Logo" class="NW-header__logo"/>
            <?php endif; ?><?php if ($back_mode == "dark") : ?>
                <a href="php/connect.php" class="NW-header__icon"><img src="resources/icons/M_settings(DARK).png"  alt="Paramètres" class="NW-header__icon--img"/></a>
                <img src="resources/icons/logo(DARK).png"  alt="Logo" class="NW-header__logo"/>
            <?php endif; ?>
        <!-- </div> -->
    </header>

    <section class="NW-interface3D startMargin mobile">
        <div class="NW-interface3D__interaction">
            <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.304/build/spline-viewer.js"></script>
            <spline-viewer url="https://prod.spline.design/QlzNR6kt0IfdMUcV/scene.splinecode"></spline-viewer>
        </div>
    </section>

    <section class="NW-meta startMargin mobile">
        <span class="NW-meta__temp">55°C</span>
        <p class="NW-meta__quote">Citation envisagée (conseil ou 2nd degré selon les données)</p>
    </section>

    <section class="NW-pannel mobile">
        <?php include('./php/buttonMode.php'); ?>
    </section>

    <!-- <section class="test">
        <?php
        //Incluire le test
        include_once('./php/testAffichage.php');
        ?>
    </section> -->
</body>

</html>