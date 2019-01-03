<a class="brand" href="<?= $this->Html->url('/') ?>">
    <?php
    if(isset($theme_config['logo']) && $theme_config['logo']) {                        //echo $this->Html->image($theme_config['logo']);
        echo '<img src="'.$theme_config['logo'].'">';
    } else {
        echo '<p>'.$website_name.'</p>';
    }
?>
        <a class="btn-menu-mobile"><i class="fa fa-align-justify"></i></a>
</a>
<div class="menu">
    <ul class="main-menu list-unstyled">
        <li class="li-nav">
            <a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a>
        </li>
        <?php
            if(!empty($nav)) {
            $i = 0;
            foreach ($nav as $key => $value) { ?>
            <?php if(empty($value['Navbar']['submenu'])) { ?>
            <li class="li-nav<?php if($this->params['controller'] == $value['Navbar']['name']) { ?> actived<?php } ?>">
                <a href="<?= $value['Navbar']['url'] ?>" <?=( $value[ 'Navbar'][ 'open_new_tab']) ? ' target="_blank"' : '' ?>><?= $value['Navbar']['name'] ?></a>
            </li>
            <?php } else { ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <?= $value['Navbar']['name'] ?>
                        <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <?php $submenu = json_decode($value['Navbar']['submenu']);
                        foreach ($submenu as $k => $v) { ?>
                    <li>
                        <a href="<?= rawurldecode($v) ?>" <?=( $value[ 'Navbar'][ 'open_new_tab']) ? ' target="_blank"' : '' ?>><i class="fa fa-angle-right"></i> <?= rawurldecode(str_replace('+', ' ', $k)) ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php $i++; } } ?>
            <div class="clearfix"></div>
            <div class="diviseur"></div>
            <?php if($isConnected) { ?>
            <li>
                <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>"><?= $Lang->get('USER__PROFILE') ?></a></li>
            <li style="position:relative;">
                <a href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-toggle="modal"><?= $Lang->get('NOTIFICATIONS__LIST') ?></a>
                <span class="notification-indicator"></span>
            </li>
            <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
            <li><a href="<?= $this->Html->url(array('controller' => 'admin', 'action' => 'index', 'plugin' => false, 'admin' => true)) ?>"><i class="fa fa-star"></i> <?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a></li>
            <?php } ?>

            <div class="separator"></div>

            <li><a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>"><i title="<?= $Lang->get('USER__LOGOUT') ?>" class="fa fa-sign-out deconnexion"></i> <?= $Lang->get('USER__LOGOUT') ?></a></li>

            <?php } else { ?>

            <li><a href="#" data-toggle="modal" data-target="#login"><?= $Lang->get('USER__LOGIN') ?></a></li>

            <li><a href="#" data-toggle="modal" data-target="#register"><?= $Lang->get('USER__REGISTER') ?></a></li>

            <?php } ?>
    </ul>
</div>
<script>
    $(".btn-menu-mobile").click(function() {
        $(".btn-menu-mobile").toggleClass("btn-menu-mobile-active");
        $(".header-mobile .menu").slideToggle(1000);
    });

</script>
