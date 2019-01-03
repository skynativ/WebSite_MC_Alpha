<header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->Html->url('/') ?>">
          <?php
          if(isset($theme_config['logo']) && $theme_config['logo']) {
            //echo $this->Html->image($theme_config['logo']);
            echo '<img src="'.$theme_config['logo'].'">';
          } else {
            echo ''.$website_name.'';
          }
          ?>
        </a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                <li class="<?php if($this->here == "/") { ?> active<?php } ?>"><a href="/">
                        <img style="width: 20px; margin-top: -6px; margin-right: 6px;" src="<?= $theme_config['navi_home'] ?>">
                        Accueil
                    </a>
                </li>
                <?php if(!empty($nav)): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($nav as $key => $value): ?>
                        <?php if(empty($value['Navbar']['submenu'])): ?>
                            <li class="<?php if($this->here == $value['Navbar']['url']) { ?> active<?php } ?>"><a href="<?= $value['Navbar']['url'] ?>">
                                    <img style="width: 20px; margin-top: -6px; margin-right: 6px;" src="<?= $theme_config['navi_'.$value['Navbar']['id']] ?>">
                                    <?= $value['Navbar']['name'] ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img style="width: 20px; margin-top: -6px; margin-right: 6px;" src="<?= $theme_config['navi_'.$value['Navbar']['id']] ?>">
                                    <?= $value['Navbar']['name'] ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    $submenu = json_decode($value['Navbar']['submenu']);
                                    foreach ($submenu as $k => $v) {
                                        ?>
                                        <li><a href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
						
                <li class="dropdown">
                    <?php if(!$isConnected) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="dropdown" aria-expanded="false">Espace Membre <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if($EyPlugin->isInstalled('phpierre.signinup')) { ?>
                                <li><a href="/login"><?= $Lang->get('USER__LOGIN') ?></a></li>
                                <li><a href="/register"><?= $Lang->get('USER__REGISTER') ?></a></li>
                            <?php } else { ?>
                                <li><a href="#login" data-toggle="modal"><?= $Lang->get('USER__LOGIN') ?></a></li>
                                <li><a href="#register" data-toggle="modal"><?= $Lang->get('USER__REGISTER') ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
				
				
              </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
