<div class="black"></div>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <div class="logo">
                <a class="none" href="/"><?php if (isset($theme_config['logo']) && $theme_config['logo']){ echo '<img src="'.$theme_config['logo'].'"></img>'; } else { echo '<div style="margin-top:7px">'.$website_name.'</div>'; } ?></a>
            </div>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li class="<?php if($this->params['controller'] == 'pages') { ?>active<?php } ?>"><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
                <?php
                if(!empty($nav)) {
                  $i = 0;
                  foreach ($nav as $key => $value) { ?>
                    <?php if(empty($value['Navbar']['submenu'])) { ?>
                      <li class="li-nav<?php if($this->params['controller'] == $value['Navbar']['name']) { ?> active<?php } ?>">
                          <a href="<?= $value['Navbar']['url'] ?>"><?= $value['Navbar']['name'] ?></a>
                      </li>
                    <?php } else { ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $value['Navbar']['name'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        <?php
                        $submenu = json_decode($value['Navbar']['submenu']);
                        foreach ($submenu as $k => $v) {
                        ?>
                          <li><a href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                        <?php } ?>
                        </ul>
                      </li>
                    <?php } ?>
                    <?php
                      $i++;
                    }
                  } ?>
                <li class="dropdown">
                    <?php if(!$isConnected) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#register" data-toggle="modal"><?= $Lang->get('USER__REGISTER') ?></a></li>
                            <li><a href="#login" data-toggle="modal"><?= $Lang->get('USER__LOGIN') ?></a></li>
                        </ul>
                    <?php } else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $user['pseudo'] ?>/16" title=""><?= $user['pseudo'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-toggle="modal"><i class="fa fa-flag"></i> <?= $Lang->get('NOTIFICATIONS__LIST') ?></a><span class="notification-indicator"></span></li>
                            <li><a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>" data-toggle="modal"><i class="fa fa-user"></i> <?= $Lang->get('USER__PROFILE') ?></a></li>
                            <li><a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><i class="fa fa-power-off"></i> <?= $Lang->get('USER__LOGOUT') ?></a></li>
                            <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                            <li><a href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i class="fa fa-cogs"></i> <?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a></li>
                        <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
              </ul>
      </div>
    </div>
</nav>
    <!-- Main body -->
    <div class="container">
      <!-- Notifications -->
            <!-- Content -->
      <div class="body">
          <!-- Slider -->
    </div>
    </div>
    <?php if(!empty($search_slider)) { ?>
        <div class="swiper-container" style="height: 350px; margin-bottom: 20px;margin-top:-95px;width:100%">
            <div class="swiper-wrapper">
                
                    <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
                    <div class="swiper-slide img-responsive" style="width:100%;background-size: cover; background-image:url('<?= $v['Slider']['url_img'] ?>');">
                        <div class="container">
                            <div class="swiper-description">
                                <div class="ip-serv"><?= $theme_config['ip']; ?></div>
                                <h1 class="title-slider"><?= before_display($v['Slider']['title']) ?></h1>
                                <p class="desc-slider"><?= before_display($v['Slider']['subtitle']) ?></p>
                            </div>
                        </div>
                      </div>
                    <?php } ?>
                
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <?php } else { ?>
    <div class="swiper-container" style="height: 80px; margin-bottom: 20px;margin-top:-95px;width:100%;float:left">
            <div class="swiper-wrapper">
              <div class="swiper-slide" style="background-image:url('<?= $theme_config['img_fond']; ?>'); background-size: cover"></div>
              <div class="swiper-pagination"></div>
        </div>
    </div>
    <?php } ?>
    <script>
    $(document).ready(function () {
      var mySwiper = new Swiper ('.swiper-container', {autoplay: 5000,})});
      jQuery(function($){$('ul#items').easyPaginate({step:3});
    });
    </script>
    <div class="container">
