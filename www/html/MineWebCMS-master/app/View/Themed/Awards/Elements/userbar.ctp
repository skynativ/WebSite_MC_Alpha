<div class="user-bar">
        <div class="user-infos">
            <?php if($isConnected) { ?>
                <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>"><img src="https://minotar.net/avatar/<?= $user['pseudo'] ?>/24.png" alt="avatar"></a>
            <span>Bienvenue sur <span><?= $website_name ?></span>, <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>" class="pseudo"><?= $user['pseudo'] ?></a></span>
            <?php } else { ?>
                <img src="https://minotar.net/helm/char/24.png" alt="avatar">
                <span>Bienvenue sur <span><?= $website_name ?></span>, Visiteur</span>
            <?php } ?>
        </div>
        <div class="separator"></div>
        <div class="user-links">
            <ul class="list-inline list-unstyled">
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
                
                    <li><a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>"><i title="<?= $Lang->get('USER__LOGOUT') ?>" class="fa fa-sign-out deconnexion"></i></a></li>
                
                <?php } else { ?>
                    
                    <li><a href="#" data-toggle="modal" data-target="#login"><?= $Lang->get('USER__LOGIN') ?></a></li>
                    
                    <li><a href="#" data-toggle="modal" data-target="#register"><?= $Lang->get('USER__REGISTER') ?></a></li>
                            
                <?php } ?>
            </ul>
        </div>
    </div>