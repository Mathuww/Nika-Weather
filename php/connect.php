<?php
include_once('variables_functions/variables.php');
?>

<!DOCTYPE html>

<head>
    <?php include_once('header.php'); ?>
    <title>Se connecter, Nika Wheather</title>
</head>

<body>
    <?php include_once('styleWithPHP.php'); ?>
    <?php include_once('othersMobile.php'); ?>
    <main class="NW-pannelBodyPage mobile">
        <section class="NW-header startMargin">
            <div class="NW-header__titles">
                <h1 class="NW-header__titles--Primary zeroMargin title">Se connecter<br />en administrateurs</h1>
            </div>
            <!-- <div class="NW-header__icons"> -->
            <?php if ($_SESSION["DL-USER"] == "light") : ?>
                <a href="index.php" class="NW-header__logo">
                    <img src="../resources/icons/logo(LIGHT).png" alt="Icon Logo" />
                </a>
                <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                <a href="index.php" class="NW-header__logo">
                    <img src="../resources/icons/logo(DARK).png" alt="Icon Logo" />
                </a>
            <?php endif; ?>
            <!-- </div> -->
        </section>

        <div class="mobile">
            <?php include('buttonMode.php'); ?>
        </div>
    </main>
</body>