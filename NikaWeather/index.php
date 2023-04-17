<?php
include('./php/variables.php');
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php if ($back_mode == "Light Mode") : ?>
        <link rel="icon" type="image/png" href="src/favicon_light.png">
    <?php endif; ?>
    <?php if ($back_mode == "Dark Mode") : ?>
        <link rel="icon" type="image/png" href="src/favicon_dark.png">
    <?php endif; ?>
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
    <footer>
        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="get" id="form_mode">
            <label>Dans quelle mode de lecture voulez-vous être ?</label>
            <label class="switch">
                <select form="form_mode" name="input_mode" onchange="submit();">
                    <?php if ($back_mode == "Light Mode") : ?>
                        <option selected>Light Mode</option>
                        <option>Dark Mode</option>
                    <?php endif; ?>
                    <?php if ($back_mode == "Dark Mode") : ?>
                        <option>Light Mode</option>
                        <option selected>Dark Mode</option>
                    <?php endif; ?>
                </select>
            </label>
        </form>
    </footer>
</body>

</html>