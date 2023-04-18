<footer>
        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="get" id="form_mode">
            <div class='toggle-switch'>
                <label>
                    <?php if ($back_mode == "light") : ?>
                        <input type='checkbox' onchange="submit();" name="input_mode" checked>
                        <span class='slider'></span>
                    <?php endif; ?>
                    <?php if ($back_mode == "dark") : ?>
                        <input type='checkbox' onchange="submit();" name="input_mode">
                        <span class='slider'></span>
                    <?php endif; ?>
                </label>
            </div>
        </form>
</footer>
<style>
        <?php if ($back_mode == "light") : ?>
        body {
            background-color: white;
            color : black;
            }
        <?php endif; ?><?php if ($back_mode == "dark") : ?>
            body {
                background-color: #28292c;
                color: white;
            }
        <?php endif; ?>
</style>

<br/><br/>