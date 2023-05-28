<?php
include_once('variables_functions/variables.php');
if (isset($_COOKIE["connected"]) or isset($_SESSION["connected"])) {
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
        <script src="../js/NW.js" defer></script>
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
                    <div class="connect-Space_form--id box-connect">
                        <label>IDENTIFIANT</label><br />
                        <input for="connect-Space_form" name="input-adminID" type="text" autofocus required maxlength=32 minlength=4 tabindex=1 placeholder="ici, votre pseudo" autocomplete="username" />
                    </div>
                    <div class="connect-Space_form--password box-connect">
                        <label>MOT DE PASSE</label><br />
                        <input for="connect-Space_form" name="input-adminPassword" type="password" required minlength=8 maxlength=72 tabindex=2 autocomplete="current-password" />
                        
                        <div class="connect-Space_form--password--eyeOpenSVG" onclick="showPassword(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <div class="connect-Space_form--password--eyeCloseSVG" onclick="hidePassword(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>

                    </div>
                    <div class="connect-Space_form--submit box-connect">
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