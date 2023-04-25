<?php
include_once('./src/variables.php');
?>

<!DOCTYPE html>

<head>
<?php include_once(dirname(__DIR__).'/html/header.html'); ?>
    <title>Préférences admin, Nika Wheather</title>
</head>

<body>
    <?php include_once('styleWithPHP.php');?>
    <section class="error mobile">
        <a href="../index.php"><p>Erreur 404</p></a>
    </section>
    <?php include_once(dirname(__DIR__).'./html/othersMobile.html'); ?>
    <?php include_once('buttonMode.php'); ?>
</body>