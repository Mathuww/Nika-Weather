<img src="./resources/miniatureGitHub.jpeg"  alt="miniature du projet" witdh=80%></img>
<br/>
Nika Weather est un projet de groupe, 
proposé en Terminale dans un but d’informer les lycéens d’ Alexis de Tocqueville, 
à Grasse, sur la météo où ils travaillent et de même, 
de fournir un support pédagogique pour la matière de S.V.T.

<h3>Comment récupère-t-on les données ?</h3>
Les données proviennent de la station météorologique
du lycée (au-dessus de la cantine). On capte
jusqu’à 7 données différentes, toutes les 2 secondes. Sinon, les 5 autres données affichées proviennent 
soit de calcul ou soit de récupération de donnée.

<h3>Pourquoi le nom Nika Weather ?</h3>
Nika Weather est fondé du  nom “Nika”, le dieu du soleil dans la série de manga One Piece. 
Puis pour la lisibilité et une meilleur compréhension de notre projet (au premier regard),
on a complété par le nom  “Weather”.

<h3>A quel concours ce projet participe-t-il  ?</h3>
C’est au concours “Les trophées de N.S.I.” édition 2023,
réservé à la spécialité N.S.I. (Numérique et Sciences de l’Informatique).
Vous pouvez accéder à notre dossier de candidature dès que possible.

<h3>Comment ce site se présente-t-il ?</h3>
Pour commencer, l’accueil est la vitrine du site permettant d’introduire le projet 
et la météo actuelle 
avec un design recherché (dark/light mode, 3D). 

Puis, il est suivi par un accès numérique et graphique aux archives météorologiques actuelles et passées.

Ensuite, nous avons la possibilité de nous connecter, 
une action exclusive aux administrateurs, 
( avantage de pouvoir  choisir les parametres d’affichages pour tous les visiteurs).

Pour finir, la dernière page est bien sûr celle informatif sur laquelle vous êtes maintenant.
Ainsi, je vous propose de finir par la vidéo : la meilleure description convaincante qu’on peut vous faire.

<h3>Si tu as encore du temps, on peut mieux te convaincre en 2min :)</h3>
<a href="https://www.youtube-nocookie.com/embed/S-pz9zdhvFw">Avec la vidéo de présentation</a>

<br/><br/><br/><br/>
<h2>Documentation technique</h2>

<h3>Les dossiers et leurs utilités</h3>
<ul>
    <li>"ancienne archive" ==> les dossiers qu'on nous as donnée (et qui ne marchent pas aussi).</li>
    <li>"archive" ==> Tous nos anciens fichiers importants qu'on garde au cas où.</li>
    <li>"css" ==> l'ensemble des styles CSS qu'on a effectué, testé (ceux de Valentin sont dans un dossier spécialisé).</li>
    <li>"html" ==> l'ensemble des tests et tentatives HTML effectué et bien sûr, ceux de Valentin sont dans un dossier spécialisé.</li>
    <li>"js" ==> l'ensemble des tests JavaScript pour faire fonctionner le FrameWork "Chart.js"</li>
    <li>"php" ==> Le plus important, tous les fichiers PHP de transferts/récupération/gestion de MySQL, de variables et de fonctions utilisées dans le projet. ENSUITE, nous avons aussi toutes les pages fonctionnelles du projet.</li>
    <li>"sql" ==> Tous les requêtes effectuées pour tester la base de donnée MySQL.</li>
    <li>"ressources" ==> Les fichiers extras, nos shémas relationnels (MCD et MLD), nos icons (dark et light mode) et autres.</li>
    <li>"index.php" ==> les variables (et normalement les cookies) a absolument établir au début.</li>
</ul><br/>

<h3>Les fonctionnalités disponibles pour le concours</h3>
<ul>
    <li>Vous avez la possibilité de voir à l'accueil, mes travaux de backends commencés sur les transferts de deux tables relationnelles.
    L'une (NW_receps) sert à récolter les données brutes de la station météorologique et l'autre (NW_stats) sert à faire le tri, de l'optimisation, et d'ajouter des fonctionnalitées telles que le lever/coucher du soleil, la température min/max ou encore le ressenti (température).</li>
    <li>Vous avez la possibilité de changer le mode de lecture (light/dark mode).</li>
    <li>Vous pourrez admirer le modèle graphique (à l'aide de l'intégration "spline.design") non adapté pour l'instant à la page d'accueil</li>
</ul>
<em>Pour rappel, l'optimisation sera faite pour une raison simple, il y a eu énormément de données qui ont seront récoltées.
Pour y remédier, nous trierons à la minute le transfert ; puis après 24h, nous trierons les données sur chaque heure ; enfin, après un week-end, nous trierons les données à trois moments précis (matin/aprem/soir) 
avec l'attribut "stat_optiTemp" de la table "NW_stats" relié à la table "NW_optiTemps".</em><br/><br/>

<h3>Les fonctionnalités futures (proches) sur le device mobile</h3>
<ul>
    <li>Finir et adapter au front-ends les pages de la maquette mobile (accueil, info, archive, connection, paramètres).</li>
    <li>Finir le back-end avec les cookies de compte administrateur et de mode de lecture (déjà tenté,
    mais c'est tentative est pour l'instant un échec).</li>
    <li>Intégrer un système adaptif de conseils au 2nd degré selon nos données</li>
    <li>Bien intégrer les graphiques avec Chart.js</li>
    <li>Adapter chaque valeur, et modélisation 3D [cartoon et animé modélisé avec Blender (que Mathéo maîtrise) et adapté avec spline.design] sur chaque pages, en réussissant à connecter notre station météorologique avec le logiciel MQTT.</li>
</ul>
<em>Toutes les données ajoutées dans le site sont soit des données test/statique ou soit des données d'avril 2022 prises 
sur le site http://edumed.unice.fr/data-center/meteo/archives_meteo.php.</em><br/><br/>