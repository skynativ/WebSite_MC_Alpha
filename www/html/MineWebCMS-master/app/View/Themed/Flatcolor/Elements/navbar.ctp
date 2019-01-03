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
            <li class="<?php if($this->params['controller'] == 'pages') { ?>active<?php } ?>"><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
                <?php
                if(!empty($nav)) {
                  $i = 0;
                  foreach ($nav as $key => $value) { ?>
                    <?php if(empty($value['Navbar']['submenu'])) { ?>
                      <li class="li-nav<?php if($this->params['controller'] == $value['Navbar']['name']) { ?> active<?php } ?>">
                          <a href="<?= $value['Navbar']['url'] ?>">
                          <?php if(!empty($value['Navbar']['icon'])): ?>
							<i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
                          <?php endif; ?>
                          <?= $value['Navbar']['name'] ?>
                          </a>
                      </li>
                    <?php } else { ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php if(!empty($value['Navbar']['icon'])): ?>
                            <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
                        <?php endif; ?>
                        <?= $value['Navbar']['name'] ?> 
                        <span class="caret"></span></a>
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
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <?php if(!$isConnected) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if($EyPlugin->isInstalled('phpierre.signinup')) { ?>
                                <li><a href="/register"><?= $Lang->get('USER__REGISTER') ?></a></li>
                                <li><a href="/login"><?= $Lang->get('USER__LOGIN') ?></a></li>
                            <?php } else { ?>
                                <li><a href="#register" data-toggle="modal"><?= $Lang->get('USER__REGISTER') ?></a></li>
                                <li><a href="#login" data-toggle="modal"><?= $Lang->get('USER__LOGIN') ?></a></li>
                            <?php } ?>
                            
                        </ul>
                    <?php } else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $user['pseudo'] ?> <img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $user['pseudo'], 16)) ?>" title="<?= $user['pseudo'] ?>"> <span class="caret"></span></a>
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
</nav>
