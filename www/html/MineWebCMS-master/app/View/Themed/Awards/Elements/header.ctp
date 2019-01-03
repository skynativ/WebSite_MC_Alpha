<?php if(!isset($theme_config['header_global']) || $theme_config['header_global'] == "true") { ?>
   <section class="header">
    <div class="container">
        <h1 class="welcome-text disable-select"><?= $theme_config['header-welcome']; ?></h1>
        <h2 class="website-name">
            <?php
            if(isset($theme_config['logo']) && $theme_config['logo']) {
                //echo $this->Html->image($theme_config['logo']);
                echo '<img src="'.$theme_config['logo'].'">';
            } else {
                echo '<p>'.$website_name.'</p>';
            }
            ?>
        </h2>
        <div class="separation"></div>
        <h3 class="counter-players">
            <?php if($banner_server): ?>
                <?= $banner_server; ?>
            <?php else: ?>
                <?= $Lang->get('SERVER__STATUS_OFF'); ?>
            <?php endif; ?>
        </h3>
        <div class="separation"></div>
        <div class="center">
            <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?>              
            <?php // Si l'utilisateur utilise un launcher ?>
               
            <a href="<?= $theme_config['header-link']; ?>" id="btn-rejoinus" class="btn-rejoin-us" onmouseover="btnRejoinusIn();" onmouseout="btnRejoinusOut();">
                <?= $theme_config['header-text']; ?>
            </a>
                
            <?php } else { ?>                
            <?php // Si l'utilisateur n'utilise pas de launcher ?>
                
            <a href="#" id="btn-rejoinus" class="btn-rejoin-us" onmouseover="btnRejoinusIn();" onmouseout="btnRejoinusOut();" data-clipboard-text="<?= $theme_config['ip_global']; ?>" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Copié !" data-original-title="" title="">
                <?= $theme_config['header-text']; ?>
            </a>
                    
            <?php } ?>
        </div>
        <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?>              
        <?php // Si l'utilisateur utilise un launcher ?>

        <?php } else { ?>                
        <?php // Si l'utilisateur n'utilise pas de launcher ?>

        <span class="ip-text">» <?= $theme_config['ip_global']; ?> «</span>

        <?php } ?>
        
        <?php if(!isset($theme_config['header-only']) || $theme_config['header-only'] == "true") { ?>
        <?php } else { ?>
        <div class="center">
           <div class="mouse-scroll">
            <div class="mouse-scroll-roll"></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="header-background theme-color-background video-color-background">
        <iframe src="https://www.youtube.com/embed/<?= $theme_config['video-id']; ?>?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1&playlist=<?= $theme_config['video-id']; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</section>
<?php } ?>