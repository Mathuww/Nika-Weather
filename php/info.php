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
    <main class="NW-pannelBodyPage mobile">
            <section class="NW-header startMargin">
                <div class="NW-header__titles">
                <h1 class="NW-header__titles--Primary zeroMargin title">Nika Weather project,</h1>
                <h2 class="NW-header__titles--Secondary zeroMargin subtitle">c’est quoi ?</h2>
                </div>
                <?php if ($_SESSION["DL-USER"] == "light") : ?>
                <a href="connect.php" class="NW-header__icon">
                    <img src="../resources/icons/M_settings(LIGHT).png" alt="Icon Paramètres" class="NW-header__icon--img" />
                </a>
                <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(LIGHT).png" alt="Icon Logo" />
                </a>
                <?php endif; ?><?php if ($_SESSION["DL-USER"] == "dark") : ?>
                <a href="connect.php" class="NW-header__icon">
                    <img src="../resources/icons/M_settings(DARK).png" alt="Icon Paramètres" class="NW-header__icon--img" />
                </a>
                <a href="index.php" class="NW-header__logo">
                        <img src="../resources/icons/logo(DARK).png" alt="Icon Logo" />
                    </a>
            <?php endif; ?>
            </section>
            <section class="NW-info">
                <p class="NW-info__intro NW-info__paragraphe">Nika Weather est un projet de  groupe, proposé en Terminale dans un but d’informer les lycéens
                d’ Alexis de Tocqueville, à Grasse, sur la météo où ils travaillent et de même, 
                de fournir un support pédagogique pour la matière de S.V.T.</p>
            </section>

            <section class="NW-info">
                <h3 class="NW-info__title">Comment récupère-t-on les données ?</h3>
                <p class="NW-info__paragraphe">Les données proviennent de la station météorologique du lycée (au-dessus de la cantine). 
                    On capte jusqu’à 7 données différentes, toutes les 2 secondes. 
                    Sinon, les 5 autres données affichées proviennent soit de calcul 
                    ou soit de récupération de donnée.</p>
            </section>

            <section class="NW-info">
                <h3 class="NW-info__title">Pourquoi le nom Nika Weather ?</h3>
                <p class="NW-info__paragraphe">Nika Weather est fondé du  nom “Nika”, le dieu du soleil dans la série de manga One Piece. 
                Puis pour la lisibilité et une meilleur compréhension de notre projet (au premier regard), 
                on a complété par le nom  “Weather”.</p>
            </section>

            <section class="NW-info">
                <h3 class="NW-info__title">À quel concours ce projet participe-t-il ?</h3>
                <p class="NW-info__paragraphe"> C’est au concours “Les trophées de N.S.I.” édition 2023,
                réservé à la spécialité N.S.I. (Numérique et Sciences de l’Informatique). 
                Vous pouvez accéder à notre dossier de candidature dès que possible.</p>
            </section>

            <section class="NW-info">
                <h3 class="NW-info__title">Comment ce site se présente-t-il ?</h3>
                <p class="NW-info__paragraphe NW-info__paragraphe--multiligne">Pour commencer, l’accueil est la vitrine du site permettant 
                    d’introduire le projet et la météo actuelle avec un design recherché (dark/light mode, 3D).</p>
                <p class="NW-info__paragraphe NW-info__paragraphe--multiligne"> Puis, il est suivi par un accès numérique et graphique 
                    aux archives météorologiques actuelles et passées (complétés grâce à 7 données capturées et 5 calculées).</p>
                <p class="NW-info__paragraphe NW-info__paragraphe--multiligne">Ensuite, nous avons la possibilité de nous connecter, une action exclusive 
                    aux administrateurs, (avantage de pouvoir  choisir les parametres d’affichages pour tous les visiteurs).</p>
                <p class="NW-info__paragraphe">Pour finir, la dernière page est bien sûr celle informatif sur laquelle vous êtes maintenant.
                    Ainsi, je vous propose de finir par la vidéo : la meilleure description convaincante qu’on peut vous faire.</p>
            </section>

            <section class="NW-info">
                <h3 class="NW-info__title">Si tu as encore du temps, <br/>on peut mieux te convaincre en 2min :)</h3>
                <div class="NW-info__video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/S-pz9zdhvFw" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </section>


            <footer class="NW-footer mobile">
                <div class="NW-footer__primaryInfo">
                    <a href="index.php" class="NW-footer__primaryInfo--texte"><br />Revenir à l’accueil Nika Weather</a>
                    <div class="NW-footer__primaryInfo--iconMode">
                        <?php include('buttonMode.php'); ?>
                    </div>
                </div>
                <a href="connect.php" class="NW-footer__secondaryInfo">
                Connexion pour les administrateurs, <br />(bénéficiant de leurs préférences d’affichages).</a>
                <a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" class="NW-footer__certif">Tout droit réservé à Nika’Weather®</a>
            </footer>
        </main>
</body>