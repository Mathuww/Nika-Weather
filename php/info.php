<?php
include_once('variables_functions/variables.php');
echo strtotime(time());
?>

<!DOCTYPE html>

<head>
    <?php include_once('./header.php'); ?>
    <title>Information sur Nika Wheather</title>
</head>

<body>
    <?php include_once('styleWithPHP.php'); ?>
    <?php include_once('othersMobile.php'); ?>
    <section class="error mobile">
        <a href="index.php">
            <p>Erreur 404</p>
        </a>
    </section>
    <div class="mobile">
        <?php include('buttonMode.php'); ?>
    </div>
</body>