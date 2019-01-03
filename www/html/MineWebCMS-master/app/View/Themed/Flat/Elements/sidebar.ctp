		
		<div class="col-md-12">
		<?php if(!$isConnected) { ?>
			<?php } else { ?>
			<div class="panel panel-default">
				<div class="panel-heading">MON COMPTE : </div>
				<div class="panel-body">
					<i class="fa fa-user-circle" aria-hidden="true"></i> <b><?= $user['pseudo'] ?></b>
					<br>
					<i class="fa fa-money" aria-hidden="true"></i> <b><?= $user['money'] ?></b> Points
					<br>
					<i class="fa fa-gift" aria-hidden="true"></i> <b>SOON</b> Votes
					<br>
					<a class="btn btn-default btn-sm btn-block" href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-toggle="modal"><i class="fa fa-flag"></i> <?= $Lang->get('NOTIFICATIONS__LIST') ?><span class="notification-indicator"></span></a>
					<a class="btn btn-default btn-sm btn-block" href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"><i class="fa fa-user"></i> <?= $Lang->get('USER__PROFILE') ?></a>
					<a class="btn btn-default btn-sm btn-block" href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><i class="fa fa-power-off"></i> <?= $Lang->get('USER__LOGOUT') ?></a>
                    <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                    <a class="btn btn-warning btn-sm btn-block" href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i class="fa fa-cogs"></i> <?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a>
                    <?php } ?>					
				</div>
			</div>
			<?php } ?>
		</div>	
		
		<?php if($theme_config['sidebar_option'] == "true") { ?>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">SERVEUR : </div>
				<div class="panel-body">
				    <div class="mc_server_status">
						<input readonly class="form-control" value="<?= $theme_config['config_ip'] ?>" onclick="select()" />
						<div class="btn btn-success btn-block"><?= ($banner_server) ? $banner_server : $Lang->get('SERVER__STATUS_OFF') ?></div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($theme_config['sidebar_option2'] == "true") { ?>
		<?php $v = ClassRegistry::init('Visit'); ?>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">STATISTIQUES : </div>
				<div class="panel-body">
					VISITES AUJOURD'HUI : <?= $v->getVisitsByDay(date('Y-m-d'))['count']; ?>
					<br>
					VISITES TOTALES : <?= ClassRegistry::init('Visit')->find('count') ?>
					<br>
					MEMBRES INSCRITS : <?= ClassRegistry::init('User')->find('count') ?>
				</div>
			</div>
		</div>
		<?php } ?>