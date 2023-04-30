
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="get" id="form_mode">
    <div class='toggle-switch'>
        <label>
            <?php if ($_SESSION["DL-USER"] == "light") : ?>
                <input type="hidden" value='0' name="input_mode"></input>
                <input type='checkbox' value='1' onchange="submit();" name="input_mode" checked class="input_mode"></input>
                <span class='slider'></span>
            <?php endif; ?>
            <?php if ($_SESSION["DL-USER"] == "dark") : ?>
                <input type="hidden" value='0' name="input_mode"></input>
                <input type='checkbox' onchange="submit();" name="input_mode" class="input_mode" class="input_mode"></input>
                <span class='slider'></span>
            <?php endif; ?>
        </label>
    </div>
</form>
