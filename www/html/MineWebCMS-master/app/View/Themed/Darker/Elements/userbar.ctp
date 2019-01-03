<div class="user-bar">
        <div class="user-infos">
            <?php if($isConnected) { ?>
                <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>"><img src="https://minotar.net/avatar/<?= $user['pseudo'] ?>/24.png" alt="avatar"></a>
                <span>Bienvenue sur <span class="theme-color-text"><?= $website_name ?></span>, <?= $user['pseudo'] ?></span>
            <?php } else { ?>
                <img src="https://minotar.net/helm/char/24.png" alt="avatar">
                <span>Bienvenue sur <span class="theme-color-text"><?= $website_name ?></span>, Visiteur</span>
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
        
        <div class="socials">
            <ul class="list-inline list-unstyled">
                <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?> <!-- Si l'admin a choisi Launcher -->
                    <?php if(!isset($theme_config['launcher_userbar']) || $theme_config['launcher_userbar'] == "true") { ?>
                    <li><a href="<?php echo $theme_config['launcher_url']; ?>" class="ip"><?php echo $theme_config['launcher_texte']; ?></a></li>
                    <?php } ?>
                <?php } else { ?> <!-- Si l'admin a choisi IP -->
                    <?php if(!isset($theme_config['userbar_ip']) || $theme_config['userbar_ip'] == "true") { ?>
                    <li><a href="#" class="ip" data-clipboard-text="<?php echo $theme_config['ip']; ?>" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Copié !">IP : <?php echo $theme_config['ip']; ?></a></li>
                    <?php } ?>
                <?php } ?>                
                <li><div class="separator"></div></li>
                <?php if(!isset($theme_config['social_global']) || $theme_config['social_global'] == "true") { ?>
                    <?php if(isset($theme_config['social_discord']) && $theme_config['social_discord']) { ?>
                        <li><a href="<?php echo $theme_config['social_discord']; ?>" class="discord"></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_facebook']) && $theme_config['social_facebook']) { ?>
                        <li><a href="<?php echo $theme_config['social_facebook']; ?>" class="facebook"><i class="fa fa-facebook-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_twitter']) && $theme_config['social_twitter']) { ?>
                        <li><a href="<?php echo $theme_config['social_twitter']; ?>" class="twitter"><i class="fa fa-twitter-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_youtube']) && $theme_config['social_youtube']) { ?>
                        <li><a href="<?php echo $theme_config['social_youtube']; ?>" class="youtube"><i class="fa fa-youtube-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_googleplus']) && $theme_config['social_googleplus']) { ?>
                        <li><a href="<?php echo $theme_config['social_googleplus']; ?>" class="google-plus"><i class="fa fa-google-plus-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_pinterest']) && $theme_config['social_pinterest']) { ?>
                        <li><a href="<?php echo $theme_config['social_pinterest']; ?>" class="pinterest"><i class="fa fa-pinterest-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_snapchat']) && $theme_config['social_snapchat']) { ?>
                        <li><a href="<?php echo $theme_config['social_snapchat']; ?>" class="snapchat"><i class="fa fa-snapchat-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_instagram']) && $theme_config['social_instagram']) { ?>
                        <li><a href="<?php echo $theme_config['social_instagram']; ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_twitch']) && $theme_config['social_twitch']) { ?>
                        <li><a href="<?php echo $theme_config['social_twitch']; ?>" class="twitch"><i class="fa fa-twitch"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                    <?php if(isset($theme_config['social_steam']) && $theme_config['social_steam']) { ?>
                        <li><a href="<?php echo $theme_config['social_steam']; ?>" class="steam"><i class="fa fa-steam-square"></i></a></li>
                    <?php } else { ?>
                    <?php } ?>
                <?php } else { ?>
                <?php } ?>
            </ul>
        </div>
    </div>