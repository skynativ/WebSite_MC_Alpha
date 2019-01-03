<?php if(!isset($theme_config['vote_global']) || $theme_config['vote_global'] == "true") { ?>
<div class="vote-widget wow zoomIn">
        <?php if(isset($theme_config['vote_img']) && $theme_config['vote_img']) { ?>
           <div class="image-custom">
               <img src="<?= $theme_config['vote_img'] ?>" alt="image-vote">
           </div>
        <?php } else { ?>
            <div class="coffre">
                <div class="diamant"></div>
            </div>
        <?php } ?>
    <div class="vote-infos">
        <?php if(isset($theme_config['vote_texte']) && $theme_config['vote_texte']) { ?>
            <h3 class="vote-message">
                <?= $theme_config['vote_texte'] ?>
            </h3>
        <?php } else { ?>
            <h3 class="vote-message">
                Votez pour <span class="theme-color-text"><?php echo $website_name; ?></span>
                <br>
                et gagnez des <span class="theme-color-text">récompenses</span>
            </h3>
        <?php } ?>
        <a href="<?= $this->Html->url('/') ?>vote" class="btn-vote-widget theme-color-background">Voter pour <?php echo $website_name; ?></a>
    </div>
</div>
<?php } ?>