<style>
        <?php if ($back_mode == "light") : ?>
            :root{
                --colorText : black;
                --color:#4ABDF2;
                --colorSoft: #1BACEF;
                --colorDegrade : linear-gradient(4.82deg, #4ABDF2 -17.48%, #FFFFFF 118.09%);
                --colorPannel : #F6FCFF;
                --colorPannelText : #005982;
            }
            body {
                background-color: #FBFFB1;
            }
        <?php endif; ?><?php if ($back_mode == "dark") : ?>
            :root{
                --colorText : white;
                --color:#FEC601;
                --colorSoft: #FFE380;
                --colorDegrade : linear-gradient(4.82deg, #FFC700 -17.48%, #FFFFFF 118.09%);
                --colorPannel : #121212;
                --colorPannelText : white;
            }

            body {
                background-color: #130F2E;
            }
        <?php endif; ?>
</style>