<div class="navbar-wrapper">
			<header class="navbar navbar-default navbar-top" id="navbar">
				<div class="container">
					
				<a href="<?= $this->Html->url('/') ?>" class="navbar-brand no-txt">
					<?php
						if(isset($theme_config['logo']) && $theme_config['logo']) {
						echo '<img src="'.$theme_config['logo'].'">';
						} else {
						echo '<img src="/theme/MineBox/images/Logo.png">';
						}
					?>
				</a>

				<div class="navbar-collapse-holder">

						<div class="clearfix">
							<button type="button" class="navbar-toggle">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							<ul data-breakpoint="992" class="flexnav">
								<li><a href="<?= $this->Html->url('/') ?>"><i class="fa fa-home"></i> <?= $Lang->get('GLOBAL__HOME') ?></a></li>
								<?php
									if(!empty($nav)) {
									  $i = 0;
									  foreach ($nav as $key => $value) { ?>
										<?php if(empty($value['Navbar']['submenu'])) { ?>
										  <li class="li-nav">
											  <a href="<?= $value['Navbar']['url'] ?>"><span class="white hcolor" style="transition: 0.3s linear;">
											  <?php if(!empty($value['Navbar']['icon'])): ?>
												<i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
											  <?php endif; ?>
											  <?= $value['Navbar']['name'] ?>
											  </span></a>
										  </li>
										<?php } else { ?>
										  <li class="dropdown">
											<a id="menu-dropdown" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="white hcolor">
											<?php if(!empty($value['Navbar']['icon'])): ?>
												<i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
											<?php endif; ?>
											<?= $value['Navbar']['name'] ?> 
											<span class="caret"></span></span></a>
											<ul class="dropdown-menu" role="menu">
											<?php
											$submenu = json_decode($value['Navbar']['submenu']);
											foreach ($submenu as $k => $v) {
											?>
											  <li><a style="transition: 0.3s linear;" href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
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
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="dropdown" aria-expanded="false"> Espace membre<span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<?php if($EyPlugin->isInstalled('phpierre.signinup')) { ?>
													<li><a href="/login"><i class="fa fa-sign-in"></i> <?= $Lang->get('USER__LOGIN')?></a></li>
													<li><a href="/register"><i class="fa fa-user-plus"></i> <?= $Lang->get('USER__REGISTER')?></a></li>
												<?php } else { ?>
													<li><a href="#login" data-toggle="modal"><i class="fa fa-sign-in"></i> <?= $Lang->get('USER__LOGIN')?></a></li>
													<li><a href="#register" data-toggle="modal"><i class="fa fa-user-plus"></i> <?= $Lang->get('USER__REGISTER')?></a></li>
												<?php } ?>
												
											</ul>
										<?php } else { ?>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $user['pseudo'] ?> <img src="<?= $this->Html->url(['controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $user['pseudo'], 16]) ?>"/> <span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-toggle="modal"><i class="fa fa-flag"></i> <?= $Lang->get('NOTIFICATIONS__LIST') ?></a><span class="notification-indicator"></span></li>
												<li><a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"><i class="fa fa-user"></i> <?= $Lang->get('USER__PROFILE') ?></a></li>
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
				</div>
			</header>
		</div>