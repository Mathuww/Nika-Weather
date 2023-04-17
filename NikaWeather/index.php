<?php include_once('./php/variables.php'); ?>

<!DOCTYPE html>

<head>
    <?php include_once('./html/header.html'); ?>
    <title>Home, Nika Wheather</title>
</head>

<body>
    <section>
        <h1>Bienvenue dans le nouveau site métérologique du lycée</h1>
        <h3>et merci de nous avoir fait confiance</h3>
    </section>
    <br />
    <br />
    <section>
        <h2>Test de transfer de données</h2>
        <?php
        //Incluire le test
        include_once('./php/testAffichage.php');
        ?>
    </section>
    <?php include_once('./php/mode-back.php'); ?>
</body>

</html>