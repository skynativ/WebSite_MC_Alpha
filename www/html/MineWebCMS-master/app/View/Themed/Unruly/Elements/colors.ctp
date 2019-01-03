<?php if(!isset($theme_config['color']) || $theme_config['color'] == "custom") { ?>

<style>
    .pace .pace-activity{
    background: <?= $theme_config['color-custom-1'] ?>;
}
    .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    background-color: <?= $theme_config['color-custom-1'] ?>;
}
    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    background-color: <?= $theme_config['color-custom-1'] ?>;
}
    .banner ul .main{
    background: <?= $theme_config['color-custom-1'] ?>;
}
    .container .row .col-lg-8 .news_title h1 {
    background: <?= $theme_config['color-custom-1'] ?>;    
}
    .news_title_sep{
    background: <?= $theme_config['color-custom-1'] ?>;
}
    .panel-default > .panel-heading {
    background-color: <?= $theme_config['color-custom-1'] ?>;
}
    .news-page .news_title h1{
    background: <?= $theme_config['color-custom-1'] ?>;
}
    .btn-theme {
    background-color: <?= $theme_config['color-custom-1'] ?>;
}
    .container.vote h1, .container .row .col-md-6 h1 {
    border-bottom: 2px solid <?= $theme_config['color-custom-1'] ?>;
}
    .title {
    border-bottom: 2px solid <?= $theme_config['color-custom-1'] ?>;
}
    .btn-success {
    background-color: <?= $theme_config['color-custom-1'] ?>;
    border-color: <?= $theme_config['color-custom-1'] ?>;
}
    .btn-success.disabled, .btn-success[disabled], fieldset[disabled] .btn-success, .btn-success.disabled:hover, .btn-success[disabled]:hover, fieldset[disabled] .btn-success:hover, .btn-success.disabled:focus, .btn-success[disabled]:focus, fieldset[disabled] .btn-success:focus, .btn-success.disabled:active, .btn-success[disabled]:active, fieldset[disabled] .btn-success:active, .btn-success.disabled.active, .btn-success[disabled].active, fieldset[disabled] .btn-success.active {
    background-color: <?= $theme_config['color-custom-1'] ?>;
    border-color: <?= $theme_config['color-custom-1'] ?>;
}
    
    .nav-pills > li.active > a, .nav-pills > li.active > a:hover {
    background-color: <?= $theme_config['color-custom-1'] ?>;
}
    .nav-pills > li > a {
    color: <?= $theme_config['color-custom-1'] ?>;
}
    
    /* Teinte 2 : color-custom-2 */
    

    .back-nav{
    background: <?= $theme_config['color-custom-2'] ?>;
}
    .dropdown-menu {
    background-color: <?= $theme_config['color-custom-2'] ?>;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url();
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : color-custom-3 */
    .navbar-default {
    background-color: <?= $theme_config['color-custom-3'] ?>;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: <?= $theme_config['color-custom-3'] ?>;
}

    .dropdown-menu .divider {
        background-color: <?= $theme_config['color-custom-3'] ?>;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: <?= $theme_config['color-custom-3'] ?>;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: <?= $theme_config['color-custom-3'] ?>;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: <?= $theme_config['color-custom-3'] ?>;
    border-color: <?= $theme_config['color-custom-3'] ?>;
}
    .border-left-custom-color{
        height: 1px;
        width: 1px;
        box-shadow: transparent 0 0,transparent 1px 0,transparent 2px 0,transparent 3px 0,transparent 4px 0,transparent 5px 0,transparent 6px 0,transparent 7px 0,<?= $theme_config['color-custom-2'] ?> 8px 0,<?= $theme_config['color-custom-2'] ?> 9px 0,transparent 0 1px,transparent 1px 1px,transparent 2px 1px,transparent 3px 1px,transparent 4px 1px,transparent 5px 1px,transparent 6px 1px,<?= $theme_config['color-custom-2'] ?> 7px 1px,<?= $theme_config['color-custom-2'] ?> 8px 1px,<?= $theme_config['color-custom-2'] ?> 9px 1px,transparent 0 2px,transparent 1px 2px,transparent 2px 2px,transparent 3px 2px,transparent 4px 2px,<?= $theme_config['color-custom-2'] ?> 5px 2px,<?= $theme_config['color-custom-2'] ?> 6px 2px,<?= $theme_config['color-custom-2'] ?> 7px 2px,<?= $theme_config['color-custom-2'] ?> 8px 2px,<?= $theme_config['color-custom-2'] ?> 9px 2px,transparent 0 3px,transparent 1px 3px,transparent 2px 3px,<?= $theme_config['color-custom-2'] ?> 3px 3px,<?= $theme_config['color-custom-2'] ?> 4px 3px,<?= $theme_config['color-custom-2'] ?> 5px 3px,<?= $theme_config['color-custom-2'] ?> 6px 3px,<?= $theme_config['color-custom-2'] ?> 7px 3px,<?= $theme_config['color-custom-2'] ?> 8px 3px,<?= $theme_config['color-custom-2'] ?> 9px 3px,transparent 0 4px,transparent 1px 4px,<?= $theme_config['color-custom-2'] ?> 2px 4px,<?= $theme_config['color-custom-2'] ?> 3px 4px,<?= $theme_config['color-custom-2'] ?> 4px 4px,<?= $theme_config['color-custom-2'] ?> 5px 4px,<?= $theme_config['color-custom-2'] ?> 6px 4px,<?= $theme_config['color-custom-2'] ?> 7px 4px,<?= $theme_config['color-custom-2'] ?> 8px 4px,<?= $theme_config['color-custom-2'] ?> 9px 4px,transparent 0 5px,<?= $theme_config['color-custom-2'] ?> 1px 5px,<?= $theme_config['color-custom-2'] ?> 2px 5px,<?= $theme_config['color-custom-2'] ?> 3px 5px,<?= $theme_config['color-custom-2'] ?> 4px 5px,<?= $theme_config['color-custom-2'] ?> 5px 5px,<?= $theme_config['color-custom-2'] ?> 6px 5px,<?= $theme_config['color-custom-2'] ?> 7px 5px,<?= $theme_config['color-custom-2'] ?> 8px 5px,<?= $theme_config['color-custom-2'] ?> 9px 5px,transparent 0 6px,<?= $theme_config['color-custom-2'] ?> 1px 6px,<?= $theme_config['color-custom-2'] ?> 2px 6px,<?= $theme_config['color-custom-2'] ?> 3px 6px,<?= $theme_config['color-custom-2'] ?> 4px 6px,<?= $theme_config['color-custom-2'] ?> 5px 6px,<?= $theme_config['color-custom-2'] ?> 6px 6px,<?= $theme_config['color-custom-2'] ?> 7px 6px,<?= $theme_config['color-custom-2'] ?> 8px 6px,<?= $theme_config['color-custom-2'] ?> 9px 6px,transparent 0 7px,<?= $theme_config['color-custom-2'] ?> 1px 7px,<?= $theme_config['color-custom-2'] ?> 2px 7px,<?= $theme_config['color-custom-2'] ?> 3px 7px,<?= $theme_config['color-custom-2'] ?> 4px 7px,<?= $theme_config['color-custom-2'] ?> 5px 7px,<?= $theme_config['color-custom-2'] ?> 6px 7px,<?= $theme_config['color-custom-2'] ?> 7px 7px,<?= $theme_config['color-custom-2'] ?> 8px 7px,<?= $theme_config['color-custom-2'] ?> 9px 7px,transparent 0 8px,<?= $theme_config['color-custom-2'] ?> 1px 8px,<?= $theme_config['color-custom-2'] ?> 2px 8px,<?= $theme_config['color-custom-2'] ?> 3px 8px,<?= $theme_config['color-custom-2'] ?> 4px 8px,<?= $theme_config['color-custom-2'] ?> 5px 8px,<?= $theme_config['color-custom-2'] ?> 6px 8px,<?= $theme_config['color-custom-2'] ?> 7px 8px,<?= $theme_config['color-custom-2'] ?> 8px 8px,<?= $theme_config['color-custom-2'] ?> 9px 8px,transparent 0 9px,<?= $theme_config['color-custom-2'] ?> 1px 9px,<?= $theme_config['color-custom-2'] ?> 2px 9px,<?= $theme_config['color-custom-2'] ?> 3px 9px,<?= $theme_config['color-custom-2'] ?> 4px 9px,<?= $theme_config['color-custom-2'] ?> 5px 9px,<?= $theme_config['color-custom-2'] ?> 6px 9px,<?= $theme_config['color-custom-2'] ?> 7px 9px,<?= $theme_config['color-custom-2'] ?> 8px 9px,<?= $theme_config['color-custom-2'] ?> 9px 9px,transparent 0 10px,<?= $theme_config['color-custom-2'] ?> 1px 10px,<?= $theme_config['color-custom-2'] ?> 2px 10px,<?= $theme_config['color-custom-2'] ?> 3px 10px,<?= $theme_config['color-custom-2'] ?> 4px 10px,<?= $theme_config['color-custom-2'] ?> 5px 10px,<?= $theme_config['color-custom-2'] ?> 6px 10px,<?= $theme_config['color-custom-2'] ?> 7px 10px,<?= $theme_config['color-custom-2'] ?> 8px 10px,<?= $theme_config['color-custom-2'] ?> 9px 10px,transparent 0 11px,<?= $theme_config['color-custom-2'] ?> 1px 11px,<?= $theme_config['color-custom-2'] ?> 2px 11px,<?= $theme_config['color-custom-2'] ?> 3px 11px,<?= $theme_config['color-custom-2'] ?> 4px 11px,<?= $theme_config['color-custom-2'] ?> 5px 11px,<?= $theme_config['color-custom-2'] ?> 6px 11px,<?= $theme_config['color-custom-2'] ?> 7px 11px,<?= $theme_config['color-custom-2'] ?> 8px 11px,<?= $theme_config['color-custom-2'] ?> 9px 11px,transparent 0 12px,<?= $theme_config['color-custom-2'] ?> 1px 12px,<?= $theme_config['color-custom-2'] ?> 2px 12px,<?= $theme_config['color-custom-2'] ?> 3px 12px,<?= $theme_config['color-custom-2'] ?> 4px 12px,<?= $theme_config['color-custom-2'] ?> 5px 12px,<?= $theme_config['color-custom-2'] ?> 6px 12px,<?= $theme_config['color-custom-2'] ?> 7px 12px,<?= $theme_config['color-custom-2'] ?> 8px 12px,<?= $theme_config['color-custom-2'] ?> 9px 12px,transparent 0 13px,<?= $theme_config['color-custom-2'] ?> 1px 13px,<?= $theme_config['color-custom-2'] ?> 2px 13px,<?= $theme_config['color-custom-2'] ?> 3px 13px,<?= $theme_config['color-custom-2'] ?> 4px 13px,<?= $theme_config['color-custom-2'] ?> 5px 13px,<?= $theme_config['color-custom-2'] ?> 6px 13px,<?= $theme_config['color-custom-2'] ?> 7px 13px,<?= $theme_config['color-custom-2'] ?> 8px 13px,<?= $theme_config['color-custom-2'] ?> 9px 13px,transparent 0 14px,<?= $theme_config['color-custom-2'] ?> 1px 14px,<?= $theme_config['color-custom-2'] ?> 2px 14px,<?= $theme_config['color-custom-2'] ?> 3px 14px,<?= $theme_config['color-custom-2'] ?> 4px 14px,<?= $theme_config['color-custom-2'] ?> 5px 14px,<?= $theme_config['color-custom-2'] ?> 6px 14px,<?= $theme_config['color-custom-2'] ?> 7px 14px,<?= $theme_config['color-custom-2'] ?> 8px 14px,<?= $theme_config['color-custom-2'] ?> 9px 14px,transparent 0 15px,<?= $theme_config['color-custom-2'] ?> 1px 15px,<?= $theme_config['color-custom-2'] ?> 2px 15px,<?= $theme_config['color-custom-2'] ?> 3px 15px,<?= $theme_config['color-custom-2'] ?> 4px 15px,<?= $theme_config['color-custom-2'] ?> 5px 15px,<?= $theme_config['color-custom-2'] ?> 6px 15px,<?= $theme_config['color-custom-2'] ?> 7px 15px,<?= $theme_config['color-custom-2'] ?> 8px 15px,<?= $theme_config['color-custom-2'] ?> 9px 15px,transparent 0 16px,<?= $theme_config['color-custom-2'] ?> 1px 16px,<?= $theme_config['color-custom-2'] ?> 2px 16px,<?= $theme_config['color-custom-2'] ?> 3px 16px,<?= $theme_config['color-custom-2'] ?> 4px 16px,<?= $theme_config['color-custom-2'] ?> 5px 16px,<?= $theme_config['color-custom-2'] ?> 6px 16px,<?= $theme_config['color-custom-2'] ?> 7px 16px,<?= $theme_config['color-custom-2'] ?> 8px 16px,<?= $theme_config['color-custom-2'] ?> 9px 16px,transparent 0 17px,<?= $theme_config['color-custom-2'] ?> 1px 17px,<?= $theme_config['color-custom-2'] ?> 2px 17px,<?= $theme_config['color-custom-2'] ?> 3px 17px,<?= $theme_config['color-custom-2'] ?> 4px 17px,<?= $theme_config['color-custom-2'] ?> 5px 17px,<?= $theme_config['color-custom-2'] ?> 6px 17px,<?= $theme_config['color-custom-2'] ?> 7px 17px,<?= $theme_config['color-custom-2'] ?> 8px 17px,<?= $theme_config['color-custom-2'] ?> 9px 17px,transparent 0 18px,<?= $theme_config['color-custom-2'] ?> 1px 18px,<?= $theme_config['color-custom-2'] ?> 2px 18px,<?= $theme_config['color-custom-2'] ?> 3px 18px,<?= $theme_config['color-custom-2'] ?> 4px 18px,<?= $theme_config['color-custom-2'] ?> 5px 18px,<?= $theme_config['color-custom-2'] ?> 6px 18px,<?= $theme_config['color-custom-2'] ?> 7px 18px,<?= $theme_config['color-custom-2'] ?> 8px 18px,<?= $theme_config['color-custom-2'] ?> 9px 18px,transparent 0 19px,<?= $theme_config['color-custom-2'] ?> 1px 19px,<?= $theme_config['color-custom-2'] ?> 2px 19px,<?= $theme_config['color-custom-2'] ?> 3px 19px,<?= $theme_config['color-custom-2'] ?> 4px 19px,<?= $theme_config['color-custom-2'] ?> 5px 19px,<?= $theme_config['color-custom-2'] ?> 6px 19px,<?= $theme_config['color-custom-2'] ?> 7px 19px,<?= $theme_config['color-custom-2'] ?> 8px 19px,<?= $theme_config['color-custom-2'] ?> 9px 19px,transparent 0 20px,<?= $theme_config['color-custom-2'] ?> 1px 20px,<?= $theme_config['color-custom-2'] ?> 2px 20px,<?= $theme_config['color-custom-2'] ?> 3px 20px,<?= $theme_config['color-custom-2'] ?> 4px 20px,<?= $theme_config['color-custom-2'] ?> 5px 20px,<?= $theme_config['color-custom-2'] ?> 6px 20px,<?= $theme_config['color-custom-2'] ?> 7px 20px,<?= $theme_config['color-custom-2'] ?> 8px 20px,<?= $theme_config['color-custom-2'] ?> 9px 20px,transparent 0 21px,<?= $theme_config['color-custom-2'] ?> 1px 21px,<?= $theme_config['color-custom-2'] ?> 2px 21px,<?= $theme_config['color-custom-2'] ?> 3px 21px,<?= $theme_config['color-custom-2'] ?> 4px 21px,<?= $theme_config['color-custom-2'] ?> 5px 21px,<?= $theme_config['color-custom-2'] ?> 6px 21px,<?= $theme_config['color-custom-2'] ?> 7px 21px,<?= $theme_config['color-custom-2'] ?> 8px 21px,<?= $theme_config['color-custom-2'] ?> 9px 21px,transparent 0 22px,<?= $theme_config['color-custom-2'] ?> 1px 22px,<?= $theme_config['color-custom-2'] ?> 2px 22px,<?= $theme_config['color-custom-2'] ?> 3px 22px,<?= $theme_config['color-custom-2'] ?> 4px 22px,<?= $theme_config['color-custom-2'] ?> 5px 22px,<?= $theme_config['color-custom-2'] ?> 6px 22px,<?= $theme_config['color-custom-2'] ?> 7px 22px,<?= $theme_config['color-custom-2'] ?> 8px 22px,<?= $theme_config['color-custom-2'] ?> 9px 22px,transparent 0 23px,<?= $theme_config['color-custom-2'] ?> 1px 23px,<?= $theme_config['color-custom-2'] ?> 2px 23px,<?= $theme_config['color-custom-2'] ?> 3px 23px,<?= $theme_config['color-custom-2'] ?> 4px 23px,<?= $theme_config['color-custom-2'] ?> 5px 23px,<?= $theme_config['color-custom-2'] ?> 6px 23px,<?= $theme_config['color-custom-2'] ?> 7px 23px,<?= $theme_config['color-custom-2'] ?> 8px 23px,<?= $theme_config['color-custom-2'] ?> 9px 23px,transparent 0 24px,<?= $theme_config['color-custom-2'] ?> 1px 24px,<?= $theme_config['color-custom-2'] ?> 2px 24px,<?= $theme_config['color-custom-2'] ?> 3px 24px,<?= $theme_config['color-custom-2'] ?> 4px 24px,<?= $theme_config['color-custom-2'] ?> 5px 24px,<?= $theme_config['color-custom-2'] ?> 6px 24px,<?= $theme_config['color-custom-2'] ?> 7px 24px,<?= $theme_config['color-custom-2'] ?> 8px 24px,<?= $theme_config['color-custom-2'] ?> 9px 24px,transparent 0 25px,<?= $theme_config['color-custom-2'] ?> 1px 25px,<?= $theme_config['color-custom-2'] ?> 2px 25px,<?= $theme_config['color-custom-2'] ?> 3px 25px,<?= $theme_config['color-custom-2'] ?> 4px 25px,<?= $theme_config['color-custom-2'] ?> 5px 25px,<?= $theme_config['color-custom-2'] ?> 6px 25px,<?= $theme_config['color-custom-2'] ?> 7px 25px,<?= $theme_config['color-custom-2'] ?> 8px 25px,<?= $theme_config['color-custom-2'] ?> 9px 25px,transparent 0 26px,<?= $theme_config['color-custom-2'] ?> 1px 26px,<?= $theme_config['color-custom-2'] ?> 2px 26px,<?= $theme_config['color-custom-2'] ?> 3px 26px,<?= $theme_config['color-custom-2'] ?> 4px 26px,<?= $theme_config['color-custom-2'] ?> 5px 26px,<?= $theme_config['color-custom-2'] ?> 6px 26px,<?= $theme_config['color-custom-2'] ?> 7px 26px,<?= $theme_config['color-custom-2'] ?> 8px 26px,<?= $theme_config['color-custom-2'] ?> 9px 26px,transparent 0 27px,<?= $theme_config['color-custom-2'] ?> 1px 27px,<?= $theme_config['color-custom-2'] ?> 2px 27px,<?= $theme_config['color-custom-2'] ?> 3px 27px,<?= $theme_config['color-custom-2'] ?> 4px 27px,<?= $theme_config['color-custom-2'] ?> 5px 27px,<?= $theme_config['color-custom-2'] ?> 6px 27px,<?= $theme_config['color-custom-2'] ?> 7px 27px,<?= $theme_config['color-custom-2'] ?> 8px 27px,<?= $theme_config['color-custom-2'] ?> 9px 27px,transparent 0 28px,<?= $theme_config['color-custom-2'] ?> 1px 28px,<?= $theme_config['color-custom-2'] ?> 2px 28px,<?= $theme_config['color-custom-2'] ?> 3px 28px,<?= $theme_config['color-custom-2'] ?> 4px 28px,<?= $theme_config['color-custom-2'] ?> 5px 28px,<?= $theme_config['color-custom-2'] ?> 6px 28px,<?= $theme_config['color-custom-2'] ?> 7px 28px,<?= $theme_config['color-custom-2'] ?> 8px 28px,<?= $theme_config['color-custom-2'] ?> 9px 28px,transparent 0 29px,<?= $theme_config['color-custom-2'] ?> 1px 29px,<?= $theme_config['color-custom-2'] ?> 2px 29px,<?= $theme_config['color-custom-2'] ?> 3px 29px,<?= $theme_config['color-custom-2'] ?> 4px 29px,<?= $theme_config['color-custom-2'] ?> 5px 29px,<?= $theme_config['color-custom-2'] ?> 6px 29px,<?= $theme_config['color-custom-2'] ?> 7px 29px,<?= $theme_config['color-custom-2'] ?> 8px 29px,<?= $theme_config['color-custom-2'] ?> 9px 29px,transparent 0 30px,<?= $theme_config['color-custom-2'] ?> 1px 30px,<?= $theme_config['color-custom-2'] ?> 2px 30px,<?= $theme_config['color-custom-2'] ?> 3px 30px,<?= $theme_config['color-custom-2'] ?> 4px 30px,<?= $theme_config['color-custom-2'] ?> 5px 30px,<?= $theme_config['color-custom-2'] ?> 6px 30px,<?= $theme_config['color-custom-2'] ?> 7px 30px,<?= $theme_config['color-custom-2'] ?> 8px 30px,<?= $theme_config['color-custom-2'] ?> 9px 30px,transparent 0 31px,<?= $theme_config['color-custom-2'] ?> 1px 31px,<?= $theme_config['color-custom-2'] ?> 2px 31px,<?= $theme_config['color-custom-2'] ?> 3px 31px,<?= $theme_config['color-custom-2'] ?> 4px 31px,<?= $theme_config['color-custom-2'] ?> 5px 31px,<?= $theme_config['color-custom-2'] ?> 6px 31px,<?= $theme_config['color-custom-2'] ?> 7px 31px,<?= $theme_config['color-custom-2'] ?> 8px 31px,<?= $theme_config['color-custom-2'] ?> 9px 31px,transparent 0 32px,<?= $theme_config['color-custom-2'] ?> 1px 32px,<?= $theme_config['color-custom-2'] ?> 2px 32px,<?= $theme_config['color-custom-2'] ?> 3px 32px,<?= $theme_config['color-custom-2'] ?> 4px 32px,<?= $theme_config['color-custom-2'] ?> 5px 32px,<?= $theme_config['color-custom-2'] ?> 6px 32px,<?= $theme_config['color-custom-2'] ?> 7px 32px,<?= $theme_config['color-custom-2'] ?> 8px 32px,<?= $theme_config['color-custom-2'] ?> 9px 32px,transparent 0 33px,<?= $theme_config['color-custom-2'] ?> 1px 33px,<?= $theme_config['color-custom-2'] ?> 2px 33px,<?= $theme_config['color-custom-2'] ?> 3px 33px,<?= $theme_config['color-custom-2'] ?> 4px 33px,<?= $theme_config['color-custom-2'] ?> 5px 33px,<?= $theme_config['color-custom-2'] ?> 6px 33px,<?= $theme_config['color-custom-2'] ?> 7px 33px,<?= $theme_config['color-custom-2'] ?> 8px 33px,<?= $theme_config['color-custom-2'] ?> 9px 33px,transparent 0 34px,<?= $theme_config['color-custom-2'] ?> 1px 34px,<?= $theme_config['color-custom-2'] ?> 2px 34px,<?= $theme_config['color-custom-2'] ?> 3px 34px,<?= $theme_config['color-custom-2'] ?> 4px 34px,<?= $theme_config['color-custom-2'] ?> 5px 34px,<?= $theme_config['color-custom-2'] ?> 6px 34px,<?= $theme_config['color-custom-2'] ?> 7px 34px,<?= $theme_config['color-custom-2'] ?> 8px 34px,<?= $theme_config['color-custom-2'] ?> 9px 34px,transparent 0 35px,<?= $theme_config['color-custom-2'] ?> 1px 35px,<?= $theme_config['color-custom-2'] ?> 2px 35px,<?= $theme_config['color-custom-2'] ?> 3px 35px,<?= $theme_config['color-custom-2'] ?> 4px 35px,<?= $theme_config['color-custom-2'] ?> 5px 35px,<?= $theme_config['color-custom-2'] ?> 6px 35px,<?= $theme_config['color-custom-2'] ?> 7px 35px,<?= $theme_config['color-custom-2'] ?> 8px 35px,<?= $theme_config['color-custom-2'] ?> 9px 35px,transparent 0 36px,<?= $theme_config['color-custom-2'] ?> 1px 36px,<?= $theme_config['color-custom-2'] ?> 2px 36px,<?= $theme_config['color-custom-2'] ?> 3px 36px,<?= $theme_config['color-custom-2'] ?> 4px 36px,<?= $theme_config['color-custom-2'] ?> 5px 36px,<?= $theme_config['color-custom-2'] ?> 6px 36px,<?= $theme_config['color-custom-2'] ?> 7px 36px,<?= $theme_config['color-custom-2'] ?> 8px 36px,<?= $theme_config['color-custom-2'] ?> 9px 36px,transparent 0 37px,<?= $theme_config['color-custom-2'] ?> 1px 37px,<?= $theme_config['color-custom-2'] ?> 2px 37px,<?= $theme_config['color-custom-2'] ?> 3px 37px,<?= $theme_config['color-custom-2'] ?> 4px 37px,<?= $theme_config['color-custom-2'] ?> 5px 37px,<?= $theme_config['color-custom-2'] ?> 6px 37px,<?= $theme_config['color-custom-2'] ?> 7px 37px,<?= $theme_config['color-custom-2'] ?> 8px 37px,<?= $theme_config['color-custom-2'] ?> 9px 37px,transparent 0 38px,<?= $theme_config['color-custom-2'] ?> 1px 38px,<?= $theme_config['color-custom-2'] ?> 2px 38px,<?= $theme_config['color-custom-2'] ?> 3px 38px,<?= $theme_config['color-custom-2'] ?> 4px 38px,<?= $theme_config['color-custom-2'] ?> 5px 38px,<?= $theme_config['color-custom-2'] ?> 6px 38px,<?= $theme_config['color-custom-2'] ?> 7px 38px,<?= $theme_config['color-custom-2'] ?> 8px 38px,<?= $theme_config['color-custom-2'] ?> 9px 38px,transparent 0 39px,<?= $theme_config['color-custom-2'] ?> 1px 39px,<?= $theme_config['color-custom-2'] ?> 2px 39px,<?= $theme_config['color-custom-2'] ?> 3px 39px,<?= $theme_config['color-custom-2'] ?> 4px 39px,<?= $theme_config['color-custom-2'] ?> 5px 39px,<?= $theme_config['color-custom-2'] ?> 6px 39px,<?= $theme_config['color-custom-2'] ?> 7px 39px,<?= $theme_config['color-custom-2'] ?> 8px 39px,<?= $theme_config['color-custom-2'] ?> 9px 39px,transparent 0 40px,<?= $theme_config['color-custom-2'] ?> 1px 40px,<?= $theme_config['color-custom-2'] ?> 2px 40px,<?= $theme_config['color-custom-2'] ?> 3px 40px,<?= $theme_config['color-custom-2'] ?> 4px 40px,<?= $theme_config['color-custom-2'] ?> 5px 40px,<?= $theme_config['color-custom-2'] ?> 6px 40px,<?= $theme_config['color-custom-2'] ?> 7px 40px,<?= $theme_config['color-custom-2'] ?> 8px 40px,<?= $theme_config['color-custom-2'] ?> 9px 40px,transparent 0 41px,<?= $theme_config['color-custom-2'] ?> 1px 41px,<?= $theme_config['color-custom-2'] ?> 2px 41px,<?= $theme_config['color-custom-2'] ?> 3px 41px,<?= $theme_config['color-custom-2'] ?> 4px 41px,<?= $theme_config['color-custom-2'] ?> 5px 41px,<?= $theme_config['color-custom-2'] ?> 6px 41px,<?= $theme_config['color-custom-2'] ?> 7px 41px,<?= $theme_config['color-custom-2'] ?> 8px 41px,<?= $theme_config['color-custom-2'] ?> 9px 41px,transparent 0 42px,<?= $theme_config['color-custom-2'] ?> 1px 42px,<?= $theme_config['color-custom-2'] ?> 2px 42px,<?= $theme_config['color-custom-2'] ?> 3px 42px,<?= $theme_config['color-custom-2'] ?> 4px 42px,<?= $theme_config['color-custom-2'] ?> 5px 42px,<?= $theme_config['color-custom-2'] ?> 6px 42px,<?= $theme_config['color-custom-2'] ?> 7px 42px,<?= $theme_config['color-custom-2'] ?> 8px 42px,<?= $theme_config['color-custom-2'] ?> 9px 42px,transparent 0 43px,<?= $theme_config['color-custom-2'] ?> 1px 43px,<?= $theme_config['color-custom-2'] ?> 2px 43px,<?= $theme_config['color-custom-2'] ?> 3px 43px,<?= $theme_config['color-custom-2'] ?> 4px 43px,<?= $theme_config['color-custom-2'] ?> 5px 43px,<?= $theme_config['color-custom-2'] ?> 6px 43px,<?= $theme_config['color-custom-2'] ?> 7px 43px,<?= $theme_config['color-custom-2'] ?> 8px 43px,<?= $theme_config['color-custom-2'] ?> 9px 43px,transparent 0 44px,<?= $theme_config['color-custom-2'] ?> 1px 44px,<?= $theme_config['color-custom-2'] ?> 2px 44px,<?= $theme_config['color-custom-2'] ?> 3px 44px,<?= $theme_config['color-custom-2'] ?> 4px 44px,<?= $theme_config['color-custom-2'] ?> 5px 44px,<?= $theme_config['color-custom-2'] ?> 6px 44px,<?= $theme_config['color-custom-2'] ?> 7px 44px,<?= $theme_config['color-custom-2'] ?> 8px 44px,<?= $theme_config['color-custom-2'] ?> 9px 44px,transparent 0 45px,<?= $theme_config['color-custom-2'] ?> 1px 45px,<?= $theme_config['color-custom-2'] ?> 2px 45px,<?= $theme_config['color-custom-2'] ?> 3px 45px,<?= $theme_config['color-custom-2'] ?> 4px 45px,<?= $theme_config['color-custom-2'] ?> 5px 45px,<?= $theme_config['color-custom-2'] ?> 6px 45px,<?= $theme_config['color-custom-2'] ?> 7px 45px,<?= $theme_config['color-custom-2'] ?> 8px 45px,<?= $theme_config['color-custom-2'] ?> 9px 45px,transparent 0 46px,<?= $theme_config['color-custom-2'] ?> 1px 46px,<?= $theme_config['color-custom-2'] ?> 2px 46px,<?= $theme_config['color-custom-2'] ?> 3px 46px,<?= $theme_config['color-custom-2'] ?> 4px 46px,<?= $theme_config['color-custom-2'] ?> 5px 46px,<?= $theme_config['color-custom-2'] ?> 6px 46px,<?= $theme_config['color-custom-2'] ?> 7px 46px,<?= $theme_config['color-custom-2'] ?> 8px 46px,<?= $theme_config['color-custom-2'] ?> 9px 46px,transparent 0 47px,<?= $theme_config['color-custom-2'] ?> 1px 47px,<?= $theme_config['color-custom-2'] ?> 2px 47px,<?= $theme_config['color-custom-2'] ?> 3px 47px,<?= $theme_config['color-custom-2'] ?> 4px 47px,<?= $theme_config['color-custom-2'] ?> 5px 47px,<?= $theme_config['color-custom-2'] ?> 6px 47px,<?= $theme_config['color-custom-2'] ?> 7px 47px,<?= $theme_config['color-custom-2'] ?> 8px 47px,<?= $theme_config['color-custom-2'] ?> 9px 47px,transparent 0 48px,<?= $theme_config['color-custom-2'] ?> 1px 48px,<?= $theme_config['color-custom-2'] ?> 2px 48px,<?= $theme_config['color-custom-2'] ?> 3px 48px,<?= $theme_config['color-custom-2'] ?> 4px 48px,<?= $theme_config['color-custom-2'] ?> 5px 48px,<?= $theme_config['color-custom-2'] ?> 6px 48px,<?= $theme_config['color-custom-2'] ?> 7px 48px,<?= $theme_config['color-custom-2'] ?> 8px 48px,<?= $theme_config['color-custom-2'] ?> 9px 48px,transparent 0 49px,<?= $theme_config['color-custom-2'] ?> 1px 49px,<?= $theme_config['color-custom-2'] ?> 2px 49px,<?= $theme_config['color-custom-2'] ?> 3px 49px,<?= $theme_config['color-custom-2'] ?> 4px 49px,<?= $theme_config['color-custom-2'] ?> 5px 49px,<?= $theme_config['color-custom-2'] ?> 6px 49px,<?= $theme_config['color-custom-2'] ?> 7px 49px,<?= $theme_config['color-custom-2'] ?> 8px 49px,<?= $theme_config['color-custom-2'] ?> 9px 49px,transparent 0 50px,<?= $theme_config['color-custom-2'] ?> 1px 50px,<?= $theme_config['color-custom-2'] ?> 2px 50px,<?= $theme_config['color-custom-2'] ?> 3px 50px,<?= $theme_config['color-custom-2'] ?> 4px 50px,<?= $theme_config['color-custom-2'] ?> 5px 50px,<?= $theme_config['color-custom-2'] ?> 6px 50px,<?= $theme_config['color-custom-2'] ?> 7px 50px,<?= $theme_config['color-custom-2'] ?> 8px 50px,<?= $theme_config['color-custom-2'] ?> 9px 50px,transparent 0 51px,<?= $theme_config['color-custom-2'] ?> 1px 51px,<?= $theme_config['color-custom-2'] ?> 2px 51px,<?= $theme_config['color-custom-2'] ?> 3px 51px,<?= $theme_config['color-custom-2'] ?> 4px 51px,<?= $theme_config['color-custom-2'] ?> 5px 51px,<?= $theme_config['color-custom-2'] ?> 6px 51px,<?= $theme_config['color-custom-2'] ?> 7px 51px,<?= $theme_config['color-custom-2'] ?> 8px 51px,<?= $theme_config['color-custom-2'] ?> 9px 51px,transparent 0 52px,<?= $theme_config['color-custom-2'] ?> 1px 52px,<?= $theme_config['color-custom-2'] ?> 2px 52px,<?= $theme_config['color-custom-2'] ?> 3px 52px,<?= $theme_config['color-custom-2'] ?> 4px 52px,<?= $theme_config['color-custom-2'] ?> 5px 52px,<?= $theme_config['color-custom-2'] ?> 6px 52px,<?= $theme_config['color-custom-2'] ?> 7px 52px,<?= $theme_config['color-custom-2'] ?> 8px 52px,<?= $theme_config['color-custom-2'] ?> 9px 52px,transparent 0 53px,<?= $theme_config['color-custom-2'] ?> 1px 53px,<?= $theme_config['color-custom-2'] ?> 2px 53px,<?= $theme_config['color-custom-2'] ?> 3px 53px,<?= $theme_config['color-custom-2'] ?> 4px 53px,<?= $theme_config['color-custom-2'] ?> 5px 53px,<?= $theme_config['color-custom-2'] ?> 6px 53px,<?= $theme_config['color-custom-2'] ?> 7px 53px,<?= $theme_config['color-custom-2'] ?> 8px 53px,<?= $theme_config['color-custom-2'] ?> 9px 53px,transparent 0 54px,<?= $theme_config['color-custom-2'] ?> 1px 54px,<?= $theme_config['color-custom-2'] ?> 2px 54px,<?= $theme_config['color-custom-2'] ?> 3px 54px,<?= $theme_config['color-custom-2'] ?> 4px 54px,<?= $theme_config['color-custom-2'] ?> 5px 54px,<?= $theme_config['color-custom-2'] ?> 6px 54px,<?= $theme_config['color-custom-2'] ?> 7px 54px,<?= $theme_config['color-custom-2'] ?> 8px 54px,<?= $theme_config['color-custom-2'] ?> 9px 54px,transparent 0 55px,transparent 1px 55px,<?= $theme_config['color-custom-2'] ?> 2px 55px,<?= $theme_config['color-custom-2'] ?> 3px 55px,<?= $theme_config['color-custom-2'] ?> 4px 55px,<?= $theme_config['color-custom-2'] ?> 5px 55px,<?= $theme_config['color-custom-2'] ?> 6px 55px,<?= $theme_config['color-custom-2'] ?> 7px 55px,<?= $theme_config['color-custom-2'] ?> 8px 55px,<?= $theme_config['color-custom-2'] ?> 9px 55px,transparent 0 56px,transparent 1px 56px,transparent 2px 56px,<?= $theme_config['color-custom-2'] ?> 3px 56px,<?= $theme_config['color-custom-2'] ?> 4px 56px,<?= $theme_config['color-custom-2'] ?> 5px 56px,<?= $theme_config['color-custom-2'] ?> 6px 56px,<?= $theme_config['color-custom-2'] ?> 7px 56px,<?= $theme_config['color-custom-2'] ?> 8px 56px,<?= $theme_config['color-custom-2'] ?> 9px 56px,transparent 0 57px,transparent 1px 57px,transparent 2px 57px,transparent 3px 57px,transparent 4px 57px,<?= $theme_config['color-custom-2'] ?> 5px 57px,<?= $theme_config['color-custom-2'] ?> 6px 57px,<?= $theme_config['color-custom-2'] ?> 7px 57px,<?= $theme_config['color-custom-2'] ?> 8px 57px,<?= $theme_config['color-custom-2'] ?> 9px 57px,transparent 0 58px,transparent 1px 58px,transparent 2px 58px,transparent 3px 58px,transparent 4px 58px,transparent 5px 58px,transparent 6px 58px,<?= $theme_config['color-custom-2'] ?> 7px 58px,<?= $theme_config['color-custom-2'] ?> 8px 58px,<?= $theme_config['color-custom-2'] ?> 9px 58px,transparent 0 59px,transparent 1px 59px,transparent 2px 59px,transparent 3px 59px,transparent 4px 59px,transparent 5px 59px,transparent 6px 59px,transparent 7px 59px,<?= $theme_config['color-custom-2'] ?> 8px 59px,<?= $theme_config['color-custom-2'] ?> 9px 59px;
    }

    .border-right-custom-color{
        height: 1px;
        width: 1px; 
        box-shadow: <?= $theme_config['color-custom-2'] ?> 0 0,<?= $theme_config['color-custom-2'] ?> 1px 0,transparent 2px 0,transparent 3px 0,transparent 4px 0,transparent 5px 0,transparent 6px 0,transparent 7px 0,transparent 8px 0,transparent 9px 0,<?= $theme_config['color-custom-2'] ?> 0 1px,<?= $theme_config['color-custom-2'] ?> 1px 1px,<?= $theme_config['color-custom-2'] ?> 2px 1px,transparent 3px 1px,transparent 4px 1px,transparent 5px 1px,transparent 6px 1px,transparent 7px 1px,transparent 8px 1px,transparent 9px 1px,<?= $theme_config['color-custom-2'] ?> 0 2px,<?= $theme_config['color-custom-2'] ?> 1px 2px,<?= $theme_config['color-custom-2'] ?> 2px 2px,<?= $theme_config['color-custom-2'] ?> 3px 2px,<?= $theme_config['color-custom-2'] ?> 4px 2px,transparent 5px 2px,transparent 6px 2px,transparent 7px 2px,transparent 8px 2px,transparent 9px 2px,<?= $theme_config['color-custom-2'] ?> 0 3px,<?= $theme_config['color-custom-2'] ?> 1px 3px,<?= $theme_config['color-custom-2'] ?> 2px 3px,<?= $theme_config['color-custom-2'] ?> 3px 3px,<?= $theme_config['color-custom-2'] ?> 4px 3px,<?= $theme_config['color-custom-2'] ?> 5px 3px,<?= $theme_config['color-custom-2'] ?> 6px 3px,transparent 7px 3px,transparent 8px 3px,transparent 9px 3px,<?= $theme_config['color-custom-2'] ?> 0 4px,<?= $theme_config['color-custom-2'] ?> 1px 4px,<?= $theme_config['color-custom-2'] ?> 2px 4px,<?= $theme_config['color-custom-2'] ?> 3px 4px,<?= $theme_config['color-custom-2'] ?> 4px 4px,<?= $theme_config['color-custom-2'] ?> 5px 4px,<?= $theme_config['color-custom-2'] ?> 6px 4px,<?= $theme_config['color-custom-2'] ?> 7px 4px,transparent 8px 4px,transparent 9px 4px,<?= $theme_config['color-custom-2'] ?> 0 5px,<?= $theme_config['color-custom-2'] ?> 1px 5px,<?= $theme_config['color-custom-2'] ?> 2px 5px,<?= $theme_config['color-custom-2'] ?> 3px 5px,<?= $theme_config['color-custom-2'] ?> 4px 5px,<?= $theme_config['color-custom-2'] ?> 5px 5px,<?= $theme_config['color-custom-2'] ?> 6px 5px,<?= $theme_config['color-custom-2'] ?> 7px 5px,<?= $theme_config['color-custom-2'] ?> 8px 5px,transparent 9px 5px,<?= $theme_config['color-custom-2'] ?> 0 6px,<?= $theme_config['color-custom-2'] ?> 1px 6px,<?= $theme_config['color-custom-2'] ?> 2px 6px,<?= $theme_config['color-custom-2'] ?> 3px 6px,<?= $theme_config['color-custom-2'] ?> 4px 6px,<?= $theme_config['color-custom-2'] ?> 5px 6px,<?= $theme_config['color-custom-2'] ?> 6px 6px,<?= $theme_config['color-custom-2'] ?> 7px 6px,<?= $theme_config['color-custom-2'] ?> 8px 6px,transparent 9px 6px,<?= $theme_config['color-custom-2'] ?> 0 7px,<?= $theme_config['color-custom-2'] ?> 1px 7px,<?= $theme_config['color-custom-2'] ?> 2px 7px,<?= $theme_config['color-custom-2'] ?> 3px 7px,<?= $theme_config['color-custom-2'] ?> 4px 7px,<?= $theme_config['color-custom-2'] ?> 5px 7px,<?= $theme_config['color-custom-2'] ?> 6px 7px,<?= $theme_config['color-custom-2'] ?> 7px 7px,<?= $theme_config['color-custom-2'] ?> 8px 7px,transparent 9px 7px,<?= $theme_config['color-custom-2'] ?> 0 8px,<?= $theme_config['color-custom-2'] ?> 1px 8px,<?= $theme_config['color-custom-2'] ?> 2px 8px,<?= $theme_config['color-custom-2'] ?> 3px 8px,<?= $theme_config['color-custom-2'] ?> 4px 8px,<?= $theme_config['color-custom-2'] ?> 5px 8px,<?= $theme_config['color-custom-2'] ?> 6px 8px,<?= $theme_config['color-custom-2'] ?> 7px 8px,<?= $theme_config['color-custom-2'] ?> 8px 8px,transparent 9px 8px,<?= $theme_config['color-custom-2'] ?> 0 9px,<?= $theme_config['color-custom-2'] ?> 1px 9px,<?= $theme_config['color-custom-2'] ?> 2px 9px,<?= $theme_config['color-custom-2'] ?> 3px 9px,<?= $theme_config['color-custom-2'] ?> 4px 9px,<?= $theme_config['color-custom-2'] ?> 5px 9px,<?= $theme_config['color-custom-2'] ?> 6px 9px,<?= $theme_config['color-custom-2'] ?> 7px 9px,<?= $theme_config['color-custom-2'] ?> 8px 9px,transparent 9px 9px,<?= $theme_config['color-custom-2'] ?> 0 10px,<?= $theme_config['color-custom-2'] ?> 1px 10px,<?= $theme_config['color-custom-2'] ?> 2px 10px,<?= $theme_config['color-custom-2'] ?> 3px 10px,<?= $theme_config['color-custom-2'] ?> 4px 10px,<?= $theme_config['color-custom-2'] ?> 5px 10px,<?= $theme_config['color-custom-2'] ?> 6px 10px,<?= $theme_config['color-custom-2'] ?> 7px 10px,<?= $theme_config['color-custom-2'] ?> 8px 10px,transparent 9px 10px,<?= $theme_config['color-custom-2'] ?> 0 11px,<?= $theme_config['color-custom-2'] ?> 1px 11px,<?= $theme_config['color-custom-2'] ?> 2px 11px,<?= $theme_config['color-custom-2'] ?> 3px 11px,<?= $theme_config['color-custom-2'] ?> 4px 11px,<?= $theme_config['color-custom-2'] ?> 5px 11px,<?= $theme_config['color-custom-2'] ?> 6px 11px,<?= $theme_config['color-custom-2'] ?> 7px 11px,<?= $theme_config['color-custom-2'] ?> 8px 11px,transparent 9px 11px,<?= $theme_config['color-custom-2'] ?> 0 12px,<?= $theme_config['color-custom-2'] ?> 1px 12px,<?= $theme_config['color-custom-2'] ?> 2px 12px,<?= $theme_config['color-custom-2'] ?> 3px 12px,<?= $theme_config['color-custom-2'] ?> 4px 12px,<?= $theme_config['color-custom-2'] ?> 5px 12px,<?= $theme_config['color-custom-2'] ?> 6px 12px,<?= $theme_config['color-custom-2'] ?> 7px 12px,<?= $theme_config['color-custom-2'] ?> 8px 12px,transparent 9px 12px,<?= $theme_config['color-custom-2'] ?> 0 13px,<?= $theme_config['color-custom-2'] ?> 1px 13px,<?= $theme_config['color-custom-2'] ?> 2px 13px,<?= $theme_config['color-custom-2'] ?> 3px 13px,<?= $theme_config['color-custom-2'] ?> 4px 13px,<?= $theme_config['color-custom-2'] ?> 5px 13px,<?= $theme_config['color-custom-2'] ?> 6px 13px,<?= $theme_config['color-custom-2'] ?> 7px 13px,<?= $theme_config['color-custom-2'] ?> 8px 13px,transparent 9px 13px,<?= $theme_config['color-custom-2'] ?> 0 14px,<?= $theme_config['color-custom-2'] ?> 1px 14px,<?= $theme_config['color-custom-2'] ?> 2px 14px,<?= $theme_config['color-custom-2'] ?> 3px 14px,<?= $theme_config['color-custom-2'] ?> 4px 14px,<?= $theme_config['color-custom-2'] ?> 5px 14px,<?= $theme_config['color-custom-2'] ?> 6px 14px,<?= $theme_config['color-custom-2'] ?> 7px 14px,<?= $theme_config['color-custom-2'] ?> 8px 14px,transparent 9px 14px,<?= $theme_config['color-custom-2'] ?> 0 15px,<?= $theme_config['color-custom-2'] ?> 1px 15px,<?= $theme_config['color-custom-2'] ?> 2px 15px,<?= $theme_config['color-custom-2'] ?> 3px 15px,<?= $theme_config['color-custom-2'] ?> 4px 15px,<?= $theme_config['color-custom-2'] ?> 5px 15px,<?= $theme_config['color-custom-2'] ?> 6px 15px,<?= $theme_config['color-custom-2'] ?> 7px 15px,<?= $theme_config['color-custom-2'] ?> 8px 15px,transparent 9px 15px,<?= $theme_config['color-custom-2'] ?> 0 16px,<?= $theme_config['color-custom-2'] ?> 1px 16px,<?= $theme_config['color-custom-2'] ?> 2px 16px,<?= $theme_config['color-custom-2'] ?> 3px 16px,<?= $theme_config['color-custom-2'] ?> 4px 16px,<?= $theme_config['color-custom-2'] ?> 5px 16px,<?= $theme_config['color-custom-2'] ?> 6px 16px,<?= $theme_config['color-custom-2'] ?> 7px 16px,<?= $theme_config['color-custom-2'] ?> 8px 16px,transparent 9px 16px,<?= $theme_config['color-custom-2'] ?> 0 17px,<?= $theme_config['color-custom-2'] ?> 1px 17px,<?= $theme_config['color-custom-2'] ?> 2px 17px,<?= $theme_config['color-custom-2'] ?> 3px 17px,<?= $theme_config['color-custom-2'] ?> 4px 17px,<?= $theme_config['color-custom-2'] ?> 5px 17px,<?= $theme_config['color-custom-2'] ?> 6px 17px,<?= $theme_config['color-custom-2'] ?> 7px 17px,<?= $theme_config['color-custom-2'] ?> 8px 17px,transparent 9px 17px,<?= $theme_config['color-custom-2'] ?> 0 18px,<?= $theme_config['color-custom-2'] ?> 1px 18px,<?= $theme_config['color-custom-2'] ?> 2px 18px,<?= $theme_config['color-custom-2'] ?> 3px 18px,<?= $theme_config['color-custom-2'] ?> 4px 18px,<?= $theme_config['color-custom-2'] ?> 5px 18px,<?= $theme_config['color-custom-2'] ?> 6px 18px,<?= $theme_config['color-custom-2'] ?> 7px 18px,<?= $theme_config['color-custom-2'] ?> 8px 18px,transparent 9px 18px,<?= $theme_config['color-custom-2'] ?> 0 19px,<?= $theme_config['color-custom-2'] ?> 1px 19px,<?= $theme_config['color-custom-2'] ?> 2px 19px,<?= $theme_config['color-custom-2'] ?> 3px 19px,<?= $theme_config['color-custom-2'] ?> 4px 19px,<?= $theme_config['color-custom-2'] ?> 5px 19px,<?= $theme_config['color-custom-2'] ?> 6px 19px,<?= $theme_config['color-custom-2'] ?> 7px 19px,<?= $theme_config['color-custom-2'] ?> 8px 19px,transparent 9px 19px,<?= $theme_config['color-custom-2'] ?> 0 20px,<?= $theme_config['color-custom-2'] ?> 1px 20px,<?= $theme_config['color-custom-2'] ?> 2px 20px,<?= $theme_config['color-custom-2'] ?> 3px 20px,<?= $theme_config['color-custom-2'] ?> 4px 20px,<?= $theme_config['color-custom-2'] ?> 5px 20px,<?= $theme_config['color-custom-2'] ?> 6px 20px,<?= $theme_config['color-custom-2'] ?> 7px 20px,<?= $theme_config['color-custom-2'] ?> 8px 20px,transparent 9px 20px,<?= $theme_config['color-custom-2'] ?> 0 21px,<?= $theme_config['color-custom-2'] ?> 1px 21px,<?= $theme_config['color-custom-2'] ?> 2px 21px,<?= $theme_config['color-custom-2'] ?> 3px 21px,<?= $theme_config['color-custom-2'] ?> 4px 21px,<?= $theme_config['color-custom-2'] ?> 5px 21px,<?= $theme_config['color-custom-2'] ?> 6px 21px,<?= $theme_config['color-custom-2'] ?> 7px 21px,<?= $theme_config['color-custom-2'] ?> 8px 21px,transparent 9px 21px,<?= $theme_config['color-custom-2'] ?> 0 22px,<?= $theme_config['color-custom-2'] ?> 1px 22px,<?= $theme_config['color-custom-2'] ?> 2px 22px,<?= $theme_config['color-custom-2'] ?> 3px 22px,<?= $theme_config['color-custom-2'] ?> 4px 22px,<?= $theme_config['color-custom-2'] ?> 5px 22px,<?= $theme_config['color-custom-2'] ?> 6px 22px,<?= $theme_config['color-custom-2'] ?> 7px 22px,<?= $theme_config['color-custom-2'] ?> 8px 22px,transparent 9px 22px,<?= $theme_config['color-custom-2'] ?> 0 23px,<?= $theme_config['color-custom-2'] ?> 1px 23px,<?= $theme_config['color-custom-2'] ?> 2px 23px,<?= $theme_config['color-custom-2'] ?> 3px 23px,<?= $theme_config['color-custom-2'] ?> 4px 23px,<?= $theme_config['color-custom-2'] ?> 5px 23px,<?= $theme_config['color-custom-2'] ?> 6px 23px,<?= $theme_config['color-custom-2'] ?> 7px 23px,<?= $theme_config['color-custom-2'] ?> 8px 23px,transparent 9px 23px,<?= $theme_config['color-custom-2'] ?> 0 24px,<?= $theme_config['color-custom-2'] ?> 1px 24px,<?= $theme_config['color-custom-2'] ?> 2px 24px,<?= $theme_config['color-custom-2'] ?> 3px 24px,<?= $theme_config['color-custom-2'] ?> 4px 24px,<?= $theme_config['color-custom-2'] ?> 5px 24px,<?= $theme_config['color-custom-2'] ?> 6px 24px,<?= $theme_config['color-custom-2'] ?> 7px 24px,<?= $theme_config['color-custom-2'] ?> 8px 24px,transparent 9px 24px,<?= $theme_config['color-custom-2'] ?> 0 25px,<?= $theme_config['color-custom-2'] ?> 1px 25px,<?= $theme_config['color-custom-2'] ?> 2px 25px,<?= $theme_config['color-custom-2'] ?> 3px 25px,<?= $theme_config['color-custom-2'] ?> 4px 25px,<?= $theme_config['color-custom-2'] ?> 5px 25px,<?= $theme_config['color-custom-2'] ?> 6px 25px,<?= $theme_config['color-custom-2'] ?> 7px 25px,<?= $theme_config['color-custom-2'] ?> 8px 25px,transparent 9px 25px,<?= $theme_config['color-custom-2'] ?> 0 26px,<?= $theme_config['color-custom-2'] ?> 1px 26px,<?= $theme_config['color-custom-2'] ?> 2px 26px,<?= $theme_config['color-custom-2'] ?> 3px 26px,<?= $theme_config['color-custom-2'] ?> 4px 26px,<?= $theme_config['color-custom-2'] ?> 5px 26px,<?= $theme_config['color-custom-2'] ?> 6px 26px,<?= $theme_config['color-custom-2'] ?> 7px 26px,<?= $theme_config['color-custom-2'] ?> 8px 26px,transparent 9px 26px,<?= $theme_config['color-custom-2'] ?> 0 27px,<?= $theme_config['color-custom-2'] ?> 1px 27px,<?= $theme_config['color-custom-2'] ?> 2px 27px,<?= $theme_config['color-custom-2'] ?> 3px 27px,<?= $theme_config['color-custom-2'] ?> 4px 27px,<?= $theme_config['color-custom-2'] ?> 5px 27px,<?= $theme_config['color-custom-2'] ?> 6px 27px,<?= $theme_config['color-custom-2'] ?> 7px 27px,<?= $theme_config['color-custom-2'] ?> 8px 27px,transparent 9px 27px,<?= $theme_config['color-custom-2'] ?> 0 28px,<?= $theme_config['color-custom-2'] ?> 1px 28px,<?= $theme_config['color-custom-2'] ?> 2px 28px,<?= $theme_config['color-custom-2'] ?> 3px 28px,<?= $theme_config['color-custom-2'] ?> 4px 28px,<?= $theme_config['color-custom-2'] ?> 5px 28px,<?= $theme_config['color-custom-2'] ?> 6px 28px,<?= $theme_config['color-custom-2'] ?> 7px 28px,<?= $theme_config['color-custom-2'] ?> 8px 28px,transparent 9px 28px,<?= $theme_config['color-custom-2'] ?> 0 29px,<?= $theme_config['color-custom-2'] ?> 1px 29px,<?= $theme_config['color-custom-2'] ?> 2px 29px,<?= $theme_config['color-custom-2'] ?> 3px 29px,<?= $theme_config['color-custom-2'] ?> 4px 29px,<?= $theme_config['color-custom-2'] ?> 5px 29px,<?= $theme_config['color-custom-2'] ?> 6px 29px,<?= $theme_config['color-custom-2'] ?> 7px 29px,<?= $theme_config['color-custom-2'] ?> 8px 29px,transparent 9px 29px,<?= $theme_config['color-custom-2'] ?> 0 30px,<?= $theme_config['color-custom-2'] ?> 1px 30px,<?= $theme_config['color-custom-2'] ?> 2px 30px,<?= $theme_config['color-custom-2'] ?> 3px 30px,<?= $theme_config['color-custom-2'] ?> 4px 30px,<?= $theme_config['color-custom-2'] ?> 5px 30px,<?= $theme_config['color-custom-2'] ?> 6px 30px,<?= $theme_config['color-custom-2'] ?> 7px 30px,<?= $theme_config['color-custom-2'] ?> 8px 30px,transparent 9px 30px,<?= $theme_config['color-custom-2'] ?> 0 31px,<?= $theme_config['color-custom-2'] ?> 1px 31px,<?= $theme_config['color-custom-2'] ?> 2px 31px,<?= $theme_config['color-custom-2'] ?> 3px 31px,<?= $theme_config['color-custom-2'] ?> 4px 31px,<?= $theme_config['color-custom-2'] ?> 5px 31px,<?= $theme_config['color-custom-2'] ?> 6px 31px,<?= $theme_config['color-custom-2'] ?> 7px 31px,<?= $theme_config['color-custom-2'] ?> 8px 31px,transparent 9px 31px,<?= $theme_config['color-custom-2'] ?> 0 32px,<?= $theme_config['color-custom-2'] ?> 1px 32px,<?= $theme_config['color-custom-2'] ?> 2px 32px,<?= $theme_config['color-custom-2'] ?> 3px 32px,<?= $theme_config['color-custom-2'] ?> 4px 32px,<?= $theme_config['color-custom-2'] ?> 5px 32px,<?= $theme_config['color-custom-2'] ?> 6px 32px,<?= $theme_config['color-custom-2'] ?> 7px 32px,<?= $theme_config['color-custom-2'] ?> 8px 32px,transparent 9px 32px,<?= $theme_config['color-custom-2'] ?> 0 33px,<?= $theme_config['color-custom-2'] ?> 1px 33px,<?= $theme_config['color-custom-2'] ?> 2px 33px,<?= $theme_config['color-custom-2'] ?> 3px 33px,<?= $theme_config['color-custom-2'] ?> 4px 33px,<?= $theme_config['color-custom-2'] ?> 5px 33px,<?= $theme_config['color-custom-2'] ?> 6px 33px,<?= $theme_config['color-custom-2'] ?> 7px 33px,<?= $theme_config['color-custom-2'] ?> 8px 33px,transparent 9px 33px,<?= $theme_config['color-custom-2'] ?> 0 34px,<?= $theme_config['color-custom-2'] ?> 1px 34px,<?= $theme_config['color-custom-2'] ?> 2px 34px,<?= $theme_config['color-custom-2'] ?> 3px 34px,<?= $theme_config['color-custom-2'] ?> 4px 34px,<?= $theme_config['color-custom-2'] ?> 5px 34px,<?= $theme_config['color-custom-2'] ?> 6px 34px,<?= $theme_config['color-custom-2'] ?> 7px 34px,<?= $theme_config['color-custom-2'] ?> 8px 34px,transparent 9px 34px,<?= $theme_config['color-custom-2'] ?> 0 35px,<?= $theme_config['color-custom-2'] ?> 1px 35px,<?= $theme_config['color-custom-2'] ?> 2px 35px,<?= $theme_config['color-custom-2'] ?> 3px 35px,<?= $theme_config['color-custom-2'] ?> 4px 35px,<?= $theme_config['color-custom-2'] ?> 5px 35px,<?= $theme_config['color-custom-2'] ?> 6px 35px,<?= $theme_config['color-custom-2'] ?> 7px 35px,<?= $theme_config['color-custom-2'] ?> 8px 35px,transparent 9px 35px,<?= $theme_config['color-custom-2'] ?> 0 36px,<?= $theme_config['color-custom-2'] ?> 1px 36px,<?= $theme_config['color-custom-2'] ?> 2px 36px,<?= $theme_config['color-custom-2'] ?> 3px 36px,<?= $theme_config['color-custom-2'] ?> 4px 36px,<?= $theme_config['color-custom-2'] ?> 5px 36px,<?= $theme_config['color-custom-2'] ?> 6px 36px,<?= $theme_config['color-custom-2'] ?> 7px 36px,<?= $theme_config['color-custom-2'] ?> 8px 36px,transparent 9px 36px,<?= $theme_config['color-custom-2'] ?> 0 37px,<?= $theme_config['color-custom-2'] ?> 1px 37px,<?= $theme_config['color-custom-2'] ?> 2px 37px,<?= $theme_config['color-custom-2'] ?> 3px 37px,<?= $theme_config['color-custom-2'] ?> 4px 37px,<?= $theme_config['color-custom-2'] ?> 5px 37px,<?= $theme_config['color-custom-2'] ?> 6px 37px,<?= $theme_config['color-custom-2'] ?> 7px 37px,<?= $theme_config['color-custom-2'] ?> 8px 37px,transparent 9px 37px,<?= $theme_config['color-custom-2'] ?> 0 38px,<?= $theme_config['color-custom-2'] ?> 1px 38px,<?= $theme_config['color-custom-2'] ?> 2px 38px,<?= $theme_config['color-custom-2'] ?> 3px 38px,<?= $theme_config['color-custom-2'] ?> 4px 38px,<?= $theme_config['color-custom-2'] ?> 5px 38px,<?= $theme_config['color-custom-2'] ?> 6px 38px,<?= $theme_config['color-custom-2'] ?> 7px 38px,<?= $theme_config['color-custom-2'] ?> 8px 38px,transparent 9px 38px,<?= $theme_config['color-custom-2'] ?> 0 39px,<?= $theme_config['color-custom-2'] ?> 1px 39px,<?= $theme_config['color-custom-2'] ?> 2px 39px,<?= $theme_config['color-custom-2'] ?> 3px 39px,<?= $theme_config['color-custom-2'] ?> 4px 39px,<?= $theme_config['color-custom-2'] ?> 5px 39px,<?= $theme_config['color-custom-2'] ?> 6px 39px,<?= $theme_config['color-custom-2'] ?> 7px 39px,<?= $theme_config['color-custom-2'] ?> 8px 39px,transparent 9px 39px,<?= $theme_config['color-custom-2'] ?> 0 40px,<?= $theme_config['color-custom-2'] ?> 1px 40px,<?= $theme_config['color-custom-2'] ?> 2px 40px,<?= $theme_config['color-custom-2'] ?> 3px 40px,<?= $theme_config['color-custom-2'] ?> 4px 40px,<?= $theme_config['color-custom-2'] ?> 5px 40px,<?= $theme_config['color-custom-2'] ?> 6px 40px,<?= $theme_config['color-custom-2'] ?> 7px 40px,<?= $theme_config['color-custom-2'] ?> 8px 40px,transparent 9px 40px,<?= $theme_config['color-custom-2'] ?> 0 41px,<?= $theme_config['color-custom-2'] ?> 1px 41px,<?= $theme_config['color-custom-2'] ?> 2px 41px,<?= $theme_config['color-custom-2'] ?> 3px 41px,<?= $theme_config['color-custom-2'] ?> 4px 41px,<?= $theme_config['color-custom-2'] ?> 5px 41px,<?= $theme_config['color-custom-2'] ?> 6px 41px,<?= $theme_config['color-custom-2'] ?> 7px 41px,<?= $theme_config['color-custom-2'] ?> 8px 41px,transparent 9px 41px,<?= $theme_config['color-custom-2'] ?> 0 42px,<?= $theme_config['color-custom-2'] ?> 1px 42px,<?= $theme_config['color-custom-2'] ?> 2px 42px,<?= $theme_config['color-custom-2'] ?> 3px 42px,<?= $theme_config['color-custom-2'] ?> 4px 42px,<?= $theme_config['color-custom-2'] ?> 5px 42px,<?= $theme_config['color-custom-2'] ?> 6px 42px,<?= $theme_config['color-custom-2'] ?> 7px 42px,<?= $theme_config['color-custom-2'] ?> 8px 42px,transparent 9px 42px,<?= $theme_config['color-custom-2'] ?> 0 43px,<?= $theme_config['color-custom-2'] ?> 1px 43px,<?= $theme_config['color-custom-2'] ?> 2px 43px,<?= $theme_config['color-custom-2'] ?> 3px 43px,<?= $theme_config['color-custom-2'] ?> 4px 43px,<?= $theme_config['color-custom-2'] ?> 5px 43px,<?= $theme_config['color-custom-2'] ?> 6px 43px,<?= $theme_config['color-custom-2'] ?> 7px 43px,<?= $theme_config['color-custom-2'] ?> 8px 43px,transparent 9px 43px,<?= $theme_config['color-custom-2'] ?> 0 44px,<?= $theme_config['color-custom-2'] ?> 1px 44px,<?= $theme_config['color-custom-2'] ?> 2px 44px,<?= $theme_config['color-custom-2'] ?> 3px 44px,<?= $theme_config['color-custom-2'] ?> 4px 44px,<?= $theme_config['color-custom-2'] ?> 5px 44px,<?= $theme_config['color-custom-2'] ?> 6px 44px,<?= $theme_config['color-custom-2'] ?> 7px 44px,<?= $theme_config['color-custom-2'] ?> 8px 44px,transparent 9px 44px,<?= $theme_config['color-custom-2'] ?> 0 45px,<?= $theme_config['color-custom-2'] ?> 1px 45px,<?= $theme_config['color-custom-2'] ?> 2px 45px,<?= $theme_config['color-custom-2'] ?> 3px 45px,<?= $theme_config['color-custom-2'] ?> 4px 45px,<?= $theme_config['color-custom-2'] ?> 5px 45px,<?= $theme_config['color-custom-2'] ?> 6px 45px,<?= $theme_config['color-custom-2'] ?> 7px 45px,<?= $theme_config['color-custom-2'] ?> 8px 45px,transparent 9px 45px,<?= $theme_config['color-custom-2'] ?> 0 46px,<?= $theme_config['color-custom-2'] ?> 1px 46px,<?= $theme_config['color-custom-2'] ?> 2px 46px,<?= $theme_config['color-custom-2'] ?> 3px 46px,<?= $theme_config['color-custom-2'] ?> 4px 46px,<?= $theme_config['color-custom-2'] ?> 5px 46px,<?= $theme_config['color-custom-2'] ?> 6px 46px,<?= $theme_config['color-custom-2'] ?> 7px 46px,<?= $theme_config['color-custom-2'] ?> 8px 46px,transparent 9px 46px,<?= $theme_config['color-custom-2'] ?> 0 47px,<?= $theme_config['color-custom-2'] ?> 1px 47px,<?= $theme_config['color-custom-2'] ?> 2px 47px,<?= $theme_config['color-custom-2'] ?> 3px 47px,<?= $theme_config['color-custom-2'] ?> 4px 47px,<?= $theme_config['color-custom-2'] ?> 5px 47px,<?= $theme_config['color-custom-2'] ?> 6px 47px,<?= $theme_config['color-custom-2'] ?> 7px 47px,<?= $theme_config['color-custom-2'] ?> 8px 47px,transparent 9px 47px,<?= $theme_config['color-custom-2'] ?> 0 48px,<?= $theme_config['color-custom-2'] ?> 1px 48px,<?= $theme_config['color-custom-2'] ?> 2px 48px,<?= $theme_config['color-custom-2'] ?> 3px 48px,<?= $theme_config['color-custom-2'] ?> 4px 48px,<?= $theme_config['color-custom-2'] ?> 5px 48px,<?= $theme_config['color-custom-2'] ?> 6px 48px,<?= $theme_config['color-custom-2'] ?> 7px 48px,<?= $theme_config['color-custom-2'] ?> 8px 48px,transparent 9px 48px,<?= $theme_config['color-custom-2'] ?> 0 49px,<?= $theme_config['color-custom-2'] ?> 1px 49px,<?= $theme_config['color-custom-2'] ?> 2px 49px,<?= $theme_config['color-custom-2'] ?> 3px 49px,<?= $theme_config['color-custom-2'] ?> 4px 49px,<?= $theme_config['color-custom-2'] ?> 5px 49px,<?= $theme_config['color-custom-2'] ?> 6px 49px,<?= $theme_config['color-custom-2'] ?> 7px 49px,<?= $theme_config['color-custom-2'] ?> 8px 49px,transparent 9px 49px,<?= $theme_config['color-custom-2'] ?> 0 50px,<?= $theme_config['color-custom-2'] ?> 1px 50px,<?= $theme_config['color-custom-2'] ?> 2px 50px,<?= $theme_config['color-custom-2'] ?> 3px 50px,<?= $theme_config['color-custom-2'] ?> 4px 50px,<?= $theme_config['color-custom-2'] ?> 5px 50px,<?= $theme_config['color-custom-2'] ?> 6px 50px,<?= $theme_config['color-custom-2'] ?> 7px 50px,<?= $theme_config['color-custom-2'] ?> 8px 50px,transparent 9px 50px,<?= $theme_config['color-custom-2'] ?> 0 51px,<?= $theme_config['color-custom-2'] ?> 1px 51px,<?= $theme_config['color-custom-2'] ?> 2px 51px,<?= $theme_config['color-custom-2'] ?> 3px 51px,<?= $theme_config['color-custom-2'] ?> 4px 51px,<?= $theme_config['color-custom-2'] ?> 5px 51px,<?= $theme_config['color-custom-2'] ?> 6px 51px,<?= $theme_config['color-custom-2'] ?> 7px 51px,<?= $theme_config['color-custom-2'] ?> 8px 51px,transparent 9px 51px,<?= $theme_config['color-custom-2'] ?> 0 52px,<?= $theme_config['color-custom-2'] ?> 1px 52px,<?= $theme_config['color-custom-2'] ?> 2px 52px,<?= $theme_config['color-custom-2'] ?> 3px 52px,<?= $theme_config['color-custom-2'] ?> 4px 52px,<?= $theme_config['color-custom-2'] ?> 5px 52px,<?= $theme_config['color-custom-2'] ?> 6px 52px,<?= $theme_config['color-custom-2'] ?> 7px 52px,<?= $theme_config['color-custom-2'] ?> 8px 52px,transparent 9px 52px,<?= $theme_config['color-custom-2'] ?> 0 53px,<?= $theme_config['color-custom-2'] ?> 1px 53px,<?= $theme_config['color-custom-2'] ?> 2px 53px,<?= $theme_config['color-custom-2'] ?> 3px 53px,<?= $theme_config['color-custom-2'] ?> 4px 53px,<?= $theme_config['color-custom-2'] ?> 5px 53px,<?= $theme_config['color-custom-2'] ?> 6px 53px,<?= $theme_config['color-custom-2'] ?> 7px 53px,<?= $theme_config['color-custom-2'] ?> 8px 53px,transparent 9px 53px,<?= $theme_config['color-custom-2'] ?> 0 54px,<?= $theme_config['color-custom-2'] ?> 1px 54px,<?= $theme_config['color-custom-2'] ?> 2px 54px,<?= $theme_config['color-custom-2'] ?> 3px 54px,<?= $theme_config['color-custom-2'] ?> 4px 54px,<?= $theme_config['color-custom-2'] ?> 5px 54px,<?= $theme_config['color-custom-2'] ?> 6px 54px,<?= $theme_config['color-custom-2'] ?> 7px 54px,<?= $theme_config['color-custom-2'] ?> 8px 54px,transparent 9px 54px,<?= $theme_config['color-custom-2'] ?> 0 55px,<?= $theme_config['color-custom-2'] ?> 1px 55px,<?= $theme_config['color-custom-2'] ?> 2px 55px,<?= $theme_config['color-custom-2'] ?> 3px 55px,<?= $theme_config['color-custom-2'] ?> 4px 55px,<?= $theme_config['color-custom-2'] ?> 5px 55px,<?= $theme_config['color-custom-2'] ?> 6px 55px,<?= $theme_config['color-custom-2'] ?> 7px 55px,transparent 8px 55px,transparent 9px 55px,<?= $theme_config['color-custom-2'] ?> 0 56px,<?= $theme_config['color-custom-2'] ?> 1px 56px,<?= $theme_config['color-custom-2'] ?> 2px 56px,<?= $theme_config['color-custom-2'] ?> 3px 56px,<?= $theme_config['color-custom-2'] ?> 4px 56px,<?= $theme_config['color-custom-2'] ?> 5px 56px,<?= $theme_config['color-custom-2'] ?> 6px 56px,transparent 7px 56px,transparent 8px 56px,transparent 9px 56px,<?= $theme_config['color-custom-2'] ?> 0 57px,<?= $theme_config['color-custom-2'] ?> 1px 57px,<?= $theme_config['color-custom-2'] ?> 2px 57px,<?= $theme_config['color-custom-2'] ?> 3px 57px,<?= $theme_config['color-custom-2'] ?> 4px 57px,transparent 5px 57px,transparent 6px 57px,transparent 7px 57px,transparent 8px 57px,transparent 9px 57px,<?= $theme_config['color-custom-2'] ?> 0 58px,<?= $theme_config['color-custom-2'] ?> 1px 58px,<?= $theme_config['color-custom-2'] ?> 2px 58px,transparent 3px 58px,transparent 4px 58px,transparent 5px 58px,transparent 6px 58px,transparent 7px 58px,transparent 8px 58px,transparent 9px 58px,<?= $theme_config['color-custom-2'] ?> 0 59px,<?= $theme_config['color-custom-2'] ?> 1px 59px,transparent 2px 59px,transparent 3px 59px,transparent 4px 59px,transparent 5px 59px,transparent 6px 59px,transparent 7px 59px,transparent 8px 59px,transparent 9px 59px;

}
    
</style>

<?php } else { ?>
<style>

    .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    background-color: <?= $theme_config['color'] ?>;
}
    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    background-color: <?= $theme_config['color'] ?>;
}
    .banner ul .main{
    background: <?= $theme_config['color'] ?>;
}
    .container .row .col-lg-8 .news_title h1 {
    background: <?= $theme_config['color'] ?>;    
}
    .news_title_sep{
    background: <?= $theme_config['color'] ?>;
}
    .panel-default > .panel-heading {
    background-color: <?= $theme_config['color'] ?>;
}
    .nav-pills > li.active > a, .nav-pills > li.active > a:hover {
    background-color: <?= $theme_config['color'] ?>;
}
    .nav-pills > li > a {
    color: <?= $theme_config['color'] ?>;
}
    
    .news-page .news_title h1{
    background: <?= $theme_config['color'] ?>;
}
    .btn-theme {
    background-color: <?= $theme_config['color'] ?>;
}
    .container.vote h1, .container .row .col-md-6 h1 {
    border-bottom: 2px solid <?= $theme_config['color'] ?>;
}
    .title {
    border-bottom: 2px solid <?= $theme_config['color'] ?>;
}
    .btn-success {
    background-color: <?= $theme_config['color'] ?>;
    border-color: <?= $theme_config['color'] ?>;
}
    .btn-success.disabled, .btn-success[disabled], fieldset[disabled] .btn-success, .btn-success.disabled:hover, .btn-success[disabled]:hover, fieldset[disabled] .btn-success:hover, .btn-success.disabled:focus, .btn-success[disabled]:focus, fieldset[disabled] .btn-success:focus, .btn-success.disabled:active, .btn-success[disabled]:active, fieldset[disabled] .btn-success:active, .btn-success.disabled.active, .btn-success[disabled].active, fieldset[disabled] .btn-success.active {
    background-color: <?= $theme_config['color'] ?>;
    border-color: <?= $theme_config['color'] ?>;
}

    /* ROUGE */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#ba2222") { ?>
    /* Teinte 2 : #a61e1e */
    .back-nav{
    background: #a61e1e;
}
    .dropdown-menu {
    background-color: #a61e1e;
}
    .banner ul li:first-child{
    background: url(https://i.imgur.com/3xCPD2m.png);
}

    .banner ul li:last-child{
    background: url(https://i.imgur.com/3xCPD2m.png);
    background-position: bottom;
}
    /* Teinte 3 : #821818 */
    .navbar-default {
    background-color: #821818;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #821818;
}

    .dropdown-menu .divider {
        background-color: #821818;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #821818;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #821818;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #821818;
    border-color: #821818;
}
    .pace .pace-activity{
        background: #821818;
}
<?php } ?>
    
    /* BLEU FONCÉ */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#0f1bab") { ?>
    /* Teinte 2 : #0d1898 */
    .back-nav{
    background: #0d1898;
}
    .dropdown-menu {
    background-color: #0d1898;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/6jUOHQJ.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #0a1377 */
    .navbar-default {
    background-color: #0a1377;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #0a1377;
}

    .dropdown-menu .divider {
        background-color: #0a1377;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #0a1377;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #0a1377;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #0a1377;
    border-color: #0a1377;
}
    .pace .pace-activity{
        background: #0a1377;
}
    
<?php } ?>
    
    /* BLEU CYAN */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#129cc5") { ?>
    /* Teinte 2 : #108baf */
    .back-nav{
    background: #108baf;
}
    .dropdown-menu {
    background-color: #108baf;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/cLda1Yy.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #0d6d8a */
    .navbar-default {
    background-color: #0d6d8a;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #0d6d8a;
}

    .dropdown-menu .divider {
        background-color: #0d6d8a;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #0d6d8a;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #0d6d8a;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #0d6d8a;
    border-color: #0d6d8a;
}
    
.pace .pace-activity{
        background: #0d6d8a;
}
<?php } ?>
    
    /* ORANGE */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#c54c12") { ?>
    /* Teinte 2 : #af4410 */
    .back-nav{
    background: #af4410;
}
    .dropdown-menu {
    background-color: #af4410;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/6O5UTof.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #8a350d */
    .navbar-default {
    background-color: #8a350d;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #8a350d;
}

    .dropdown-menu .divider {
        background-color: #8a350d;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #8a350d;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #8a350d;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #8a350d;
    border-color: #8a350d;
}
    
.pace .pace-activity{
        background: #8a350d;
}
<?php } ?>
    
    /* JAUNE */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#c5b712") { ?>
    /* Teinte 2 : #afa310 */
    .back-nav{
    background: #afa310;
}
    .dropdown-menu {
    background-color: #afa310;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/ntM87ND.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #8a800d */
    .navbar-default {
    background-color: #8a800d;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #8a800d;
}

    .dropdown-menu .divider {
        background-color: #8a800d;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #8a800d;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #8a800d;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #8a800d;
    border-color: #8a800d;
}
    
.pace .pace-activity{
        background: #8a800d;
}
<?php } ?>
    
    /* VIOLET */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#9112c5") { ?>
    /* Teinte 2 : #8110af */
    .back-nav{
    background: #8110af;
}
    .dropdown-menu {
    background-color: #8110af;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/vCU38GX.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #650d8a */
    .navbar-default {
    background-color: #650d8a;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #650d8a;
}

    .dropdown-menu .divider {
        background-color: #650d8a;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #650d8a;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #650d8a;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #650d8a;
    border-color: #650d8a;
}
    .pace .pace-activity{
        background: #650d8a;
}
<?php } ?>
    
    /* VERT CLAIR */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#3ec512") { ?>
    /* Teinte 2 : #37af10 */
    .back-nav{
    background: #37af10;
}
    .dropdown-menu {
    background-color: #37af10;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/dGSDhnk.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #2b8a0d */
    .navbar-default {
    background-color: #2b8a0d;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #2b8a0d;
}

    .dropdown-menu .divider {
        background-color: #2b8a0d;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #2b8a0d;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #2b8a0d;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #2b8a0d;
    border-color: #2b8a0d;
}
    .pace .pace-activity{
        background: #2b8a0d;
}
<?php } ?>
    
    /* VERT FONCE */
    
<?php if(!isset($theme_config['color']) || $theme_config['color'] == "#175f00") { ?>
    /* Teinte 2 : #145500 */
    .back-nav{
    background: #145500;
}
    .dropdown-menu {
    background-color: #145500;
}
    .banner ul li:first-child,.banner ul li:last-child{
    background: url(https://i.imgur.com/srelWtB.png);
}

    .banner ul li:last-child{
    background-position: bottom;
}
    /* Teinte 3 : #104200 */
    .navbar-default {
    background-color: #104200;
}
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #104200;
}

    .dropdown-menu .divider {
        background-color: #104200;
}
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #104200;
}
        .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open > .dropdown-toggle.btn-theme {
    background-color: #104200;
}
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
    background-color: #104200;
    border-color: #104200;
}
    .pace .pace-activity{
        background: #104200;
}
<?php } ?>
    
</style>
<?php } ?>