<?php
include_once('./php/src/functionsTest.php');
include_once('./php/src/variables.php');
include_once('./php/src/Calculs-functions.php');
include_once('./php/src/WithSQL-functions.php');
$dbNW = connectDataBase();
?>

<!DOCTYPE html>

<head>
    <?php include_once('./html/header.html'); ?>
    <title>Home, Nika Wheather</title>
</head>


<body>
    <section class="test">
        <h1>Bienvenue dans le nouveau site métérologique du lycée</h1>
        <h3>et merci de nous avoir fait confiance</h3>
        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="get" id="form_date">
            <input type="date" value="2023-04-18">
            <input type="time" >
        </form> </br>
    </section>
    <section id="weather-3D" class="test">
        <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.297/build/spline-viewer.js"></script>
        <spline-viewer hint loading-anim url="https://prod.spline.design/qx8QwirUOYRwWWVx/scene.splinecode"></spline-viewer>
    </section>
    <!-- <section>
        <br />
        <br />
        <h2>Test de transfert de données</h2>
        <?php
        //Incluire le test
        include_once('./php/testAffichage.php');
        ?>
    </section> -->
    <?php include_once('./html/othersMobile.html'); ?>
    <?php include_once('./php/mode-back.php'); ?>
</body>

</html>