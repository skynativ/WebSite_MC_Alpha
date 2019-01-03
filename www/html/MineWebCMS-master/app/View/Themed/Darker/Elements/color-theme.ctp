<?php if(isset($theme_config['theme-color']) && $theme_config['theme-color']) { ?>

<style>

/* Theme Color */

.theme-color-text{
    color: <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-background{
    background: <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-border{
    border-left: solid 5px <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-btn{
    background: <?php echo $theme_config['theme-color']; ?> !important;
    padding: 8px 20px;
    font-size: 14px;
    text-align: center;
    border-radius: 3px;
    color: #fff !important;
    border: 0;
    border-bottom: solid 2px rgba(0, 0, 0, 0.5);
    transition: 0.15s;
    cursor: pointer;
}

.theme-color-btn:hover, .theme-color-btn:active, .theme-color-btn:focus{
    color: #fff !important;
    border: 0;
    border-bottom: solid 2px rgba(0, 0, 0, 0.5);
    -webkit-box-shadow: inset 0px 0px 5px 200px rgba(0,0,0,0.25);
    -moz-box-shadow: inset 0px 0px 5px 200px rgba(0,0,0,0.25);
    box-shadow: inset 0px 0px 5px 200px rgba(0,0,0,0.25);
}

.theme-color-underline{
    text-decoration: underline <?php echo $theme_config['theme-color']; ?> !important;
}

.panel-default > .panel-heading {
    background-color: <?php echo $theme_config['theme-color']; ?> !important;
}

.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    background-color: <?php echo $theme_config['theme-color']; ?> !important;
}

</style>

<?php } else { ?>
<?php } ?>