<style>
        <?php if ($back_mode == "light") : ?>
            :root{
                --color:#4ABDF2;
                --colorSoft: #1BACEF;
            }
            body {
                background-color: #FBFFB1;
                color: black;
            }
        <?php endif; ?><?php if ($back_mode == "dark") : ?>
            :root{
                --color:#FEC601;
                --colorSoft: #FFE380;
            }

            body {
                background-color: #130F2E;
                color: white;
            }
        <?php endif; ?>
</style>