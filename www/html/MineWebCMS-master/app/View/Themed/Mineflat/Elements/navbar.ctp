<nav class="navbar navbar-default menu navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <div class="nav-shape hidden-sm hidden-xs">
                    <div class="shape-left"></div>
                    <div class="shape-right"></div>
                    <div class="shape-down"></div>
					<?php if (isset($theme_config['logo']) && $theme_config['logo']) { ?>
                        <span class="logo"><img src="<?= $theme_config['logo'] ?>" alt=""/></span>
					<?php } else { ?>
                        <span class="logo"><?= $website_name ?></span>
					<?php } ?>
                </div>
                <li class="li-nav pull-left<?php if ($this->params['controller'] == 'pages') { ?> actived<?php } ?>">
                    <a href="<?= $this->Html->url('/') ?>">Accueil</a>
                </li>
                <li class="li-nav pull-right">
                    <div class="btn-group">
						<?php if ($isConnected) { ?>
                            <a style="padding-top:6px;"
                               href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"
                               class="btn btn-primary"><?= $user['pseudo'] ?></a>
						<?php } else { ?>
                            <a style="padding-top:6px;" href="#login" href="#" data-toggle="modal" data-target="#login"
                               class="btn btn-primary"><i class="fa fa-user"></i></a>
						<?php } ?>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
							<?php if ($isConnected) { ?>

                                <img class="img-rounded"
                                     src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $user['pseudo'] ?>/60"
                                     title="<?= $user['pseudo'] ?>">

                                <span class="info pull-right">
                              <?php
								  echo $user['money'] . ' ';
								  if ($user['money'] == 1 OR $user['money'] == 0) {
									  echo $Configuration->getMoneyName(false);
								  } else {
									  echo $Configuration->getMoneyName();
								  } ?>
                            </span>
                                <div class="clearfix"></div>

                                <li class="divider"></li>

                                <a class="btn btn-primary btn-block"
                                   href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"><?= $Lang->get('USER__PROFILE') ?></a>

                                <div style="position:relative;">
                                    <a class="btn btn-primary btn-block" href="#notifications_modal"
                                       onclick="notification.markAllAsSeen(2)"
                                       data-toggle="modal"><?= $Lang->get('NOTIFICATIONS__LIST') ?></a>
                                    <span class="notification-indicator"></span>
                                </div>
								
								<?php if ($Permissions->can('ACCESS_DASHBOARD')) { ?>
                                    <a style="color:red;" class="btn btn-primary btn-block"
                                       href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a>
								<?php } elseif ($EyPlugin->isInstalled('eywek.shop')) { ?>
                                    <a class="btn btn-primary btn-block"
                                       href="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index', 'plugin' => 'shop')) ?>"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
								<?php } ?>

                                <a class="btn btn-primary btn-block"
                                   href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><?= $Lang->get('USER__LOGOUT') ?></a>
							<?php } else { ?>
                                <a class="btn btn-primary btn-block" href="#" data-toggle="modal"
                                   data-target="#login"><?= $Lang->get('USER__LOGIN') ?></a>
                                <a class="btn btn-primary btn-block" href="#" data-toggle="modal"
                                   data-target="#register"><?= $Lang->get('USER__REGISTER') ?></a>
							<?php } ?>
                        </ul>
                    </div>
                </li>
				<?php
					if (!empty($nav)) {
						$i = 0;
						$count = count($nav);
						$count2 = $count / 2;
						foreach ($nav as $key => $value) { ?>
							<?php if (empty($value['Navbar']['submenu'])) { ?>
                                <li class="li-nav<?php if ($i < $count2) {
									echo ' pull-left';
								} elseif ($i >= $count2) {
									echo ' pull-right';
								} ?><?php if ($this->params['controller'] == $value['Navbar']['name']) { ?> actived<?php } ?>">
                                    <a href="<?= $value['Navbar']['url'] ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= $value['Navbar']['name'] ?></a>
                                </li>
							<?php } else { ?>
                                <li class="dropdown<?php if ($i < $count2) {
									echo ' pull-left';
								} elseif ($i >= $count2) {
									echo ' pull-right';
								} ?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><?= $value['Navbar']['name'] ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
										<?php
											$submenu = json_decode($value['Navbar']['submenu']);
											foreach ($submenu as $k => $v) {
												?>
                                                <li>
                                                    <a href="<?= rawurldecode($v) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a>
                                                </li>
											<?php } ?>
                                    </ul>
                                </li>
							<?php } ?>
							<?php
							$i++;
						}
					} ?>
            </ul>
        </div>
    </div>
</nav>
