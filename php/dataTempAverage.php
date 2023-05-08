<?php
include_once('variables_functions/variables.php');
?>


<!DOCTYPE html>

<head>
    <?php include_once('./header.php'); ?>
    <title>Température, Nika Wheather</title>
</head>

<body>
    <?php include_once('styleWithPHP.php'); ?>
    <?php include_once('othersMobile.php'); ?>
    <section class="error mobile">
        <a href="../index.php">
            <p>Erreur 404</p>
        </a>
    </section>
    <div class="mobile">
        <?php include('buttonMode.php'); ?>
    </div>
</body>