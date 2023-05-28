<?php
include_once('variables_functions/variables.php');
if ($_COOKIE["connected"] or $_SESSION["connected"]) {
    header("Location: ./settings.php");
}
$admins = getAdmin($dbNW);
$adminsID = array_column($admins, 'username');
$adminsPassword = array_column($admins, 'password');

if (isset($_POST["input-adminID"]) and isset($_POST["input-adminPassword"])) {
    if (!in_array($_POST["input-adminID"], $adminsID)) {
        $signalClient = "L'identifiant fourni ne permet pas d'accéder aux paramètres administrateurs.";
    } elseif (!in_array($_POST["input-adminPassword"], $adminsPassword)) {
        $signalClient = "Votre mot de passe (faux!) ne correspond pas à nos données.";
    } else {
        $_SESSION["connected"] = true;
        $signalClient = "Bienvenue " . $_POST["input-adminID"] . " chez Nika Weather";
        foreach ($admins as $admin) {
            if ($admin["username"] == $_POST["input-adminID"]) {
                if ($admin["cookies"] == true) {
                    allCookieNW("connected", true, getDurationSchool(time()), $_SESSION["typeServer"]);
                } elseif ($admin["cookies"] == false) {
                    unset($_COOKIE["connected"]);
                }
            }
        }
        header("Location: ./settings.php");
    }
} else {
    $signalClient = "Espace réservé aux administrateurs du projet";
}
?>

<!DOCTYPE html>
<html>

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
                <?php if ($_SESSION["DL-USER"] == "light") : ?>
                    <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(LIGHT).png" alt="Icon Logo" />
                    </a>
                    <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                    <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(DARK).png" alt="Icon Logo" />
                    </a>
                <?php endif; ?>
            </section>
            <section class="connect-Space">
                <p class="connect-Space_advert subtitle"><?php
                                                            echo $signalClient;
                                                            ?></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" id="connect-Space_form">
                    <div class="connect-Space_form-id box-connect">
                        <label>IDENTIFIANT</label><br />
                        <input for="connect-Space_form" name="input-adminID" type="text" autofocus required maxlength=32 minlength=4 tabindex=1 placeholder="ici, votre pseudo" autocomplete="username" />
                    </div>
                    <div class="connect-Space_form-password box-connect">
                        <label>MOT DE PASSE</label><br />
                        <input for="connect-Space_form" name="input-adminPassword" type="password" required minlength=8 maxlength=72 tabindex=2 autocomplete="current-password" />
                    </div>
                    <div class="connect-Space_form-submit box-connect">
                        <button type="submit" class="btn"> Se connecter </button>
                    </div>
                </form>
                <p class="connect-Space_aide subtitle">Tout identifiant et mot de passe oublié sont à négocier ou à récupérer auprès des responsables du projet Nika Weather.</p>
            </section>

            <footer class="NW-footer mobile">
                <div class="NW-footer__primaryInfo">
                    <a href="index.php" class="NW-footer__primaryInfo--texte"><br />Revenir à l’accueil Nika Weather</a>
                    <div class="NW-footer__primaryInfo--iconMode">
                        <?php include('buttonMode.php'); ?>
                    </div>
                </div>
                <a href="info.php" class="NW-footer__secondaryInfo">
                    Pour plus d’information sur le projet terminale concours Nika Weather, <br />veuillez accéder à cette page.</a>
                <a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" class="NW-footer__certif">Tout droit réservé à Nika’Weather®</a>
            </footer>
        </main>
    </body>
</html>