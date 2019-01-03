<?php if(!isset($theme_config['slider']) || $theme_config['slider'] == "true") { ?>
<div id="myCarousel" class="carousel slide hidden-sm hidden-xs" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php if(!empty($search_slider)) { ?>
        <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
        <div class="item<?php if($i == 0) { echo ' active'; } ?>">
            <img src="<?= $v['Slider']['url_img'] ?>" alt="slide">
            <div class="carousel-caption theme-color-border wow bounceIn">
                <h3>
                    <?= before_display($v['Slider']['title']) ?>
                </h3>
                <p>
                    <?= before_display($v['Slider']['subtitle']) ?>
                </p>
                <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?>
                <?php if(!isset($theme_config['launcher_slider']) || $theme_config['launcher_slider'] == "true") { ?>
                <a class="theme-color-btn" href="<?php echo $theme_config['launcher_url']; ?>">
                    <?php echo $theme_config['launcher_texte']; ?>
                </a>
                <?php } ?>
                <?php } else { ?>
                <?php if(!isset($theme_config['slider_ip']) || $theme_config['slider_ip'] == "true") { ?>
                <a class="theme-color-btn" href="#" data-clipboard-text="<?php echo $theme_config['ip']; ?>" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Copié !">Cliquez-ici pour copier l'IP</a>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php $i++; } ?>
        <?php } else { ?>
        <div class="item active">
            <img src="<?= $this->Html->url('/') ?>theme/Darker/img/slider-default.png" alt="slide_1">
            <div class="carousel-caption theme-color-border wow bounceIn">
                <h3>Bienvenue sur <span class="theme-color-text"><?php echo $website_name ?></span></h3>
                <p>Vous pouvez modifier cette emplacement depuis le Panel Administrateur dans l'onglet Général puis Slider. Le bouton ci-dessous est modifiable depuis l'onglet Autres > Thèmes > Personnalisation</p>
                <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?>
                <?php if(!isset($theme_config['launcher_slider']) || $theme_config['launcher_slider'] == "true") { ?>
                <a class="theme-color-btn" href="<?php echo $theme_config['launcher_url']; ?>">
                    <?php echo $theme_config['launcher_texte']; ?>
                </a>
                <?php } ?>
                <?php } else { ?>
                <?php if(!isset($theme_config['slider_ip']) || $theme_config['slider_ip'] == "true") { ?>
                <a class="theme-color-btn" href="#" data-clipboard-text="<?php echo $theme_config['ip']; ?>" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Copié !">Cliquez-ici pour copier l'IP</a>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="item">
            <img src="<?= $this->Html->url('/') ?>theme/Darker/img/slider-default.png" alt="slide_1">
            <div class="carousel-caption theme-color-border wow bounceIn">
                <h3>Bienvenue sur <span class="theme-color-text"><?php echo $website_name ?></span></h3>
                <p>Vous pouvez modifier cette emplacement depuis le Panel Administrateur dans l'onglet Général puis Slider. Le bouton ci-dessous est modifiable depuis l'onglet Autres > Thèmes > Personnalisation</p>
                <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?>
                <?php if(!isset($theme_config['launcher_slider']) || $theme_config['launcher_slider'] == "true") { ?>
                <a class="theme-color-btn" href="<?php echo $theme_config['launcher_url']; ?>">
                    <?php echo $theme_config['launcher_texte']; ?>
                </a>
                <?php } ?>
                <?php } else { ?>
                <?php if(!isset($theme_config['slider_ip']) || $theme_config['slider_ip'] == "true") { ?>
                <a class="theme-color-btn" href="#" data-clipboard-text="<?php echo $theme_config['ip']; ?>" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Copié !">Cliquez-ici pour copier l'IP</a>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Précédent</span>
  </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Suivant</span>
  </a>
</div>
<?php } ?>

<div class="bandeau">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if(!isset($theme_config['youtube_global']) || $theme_config['youtube_global'] == "true") { ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $theme_config['youtube-id']; ?>"></iframe>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <?php if(!isset($theme_config['vote_global']) || $theme_config['vote_global'] == "true") { ?>
                <div class="vote">
                    <div class="vote-title theme-color-border">
                        <h3>Votez pour <span class="theme-color-text"><?php echo $website_name ?></span></h3>
                        <h5>Et obtenez des récompenses</h5>
                    </div>
                    <div class="vote-bottom">
                        <?php if(isset($theme_config['vote_img']) && $theme_config['vote_img']) { ?>
                        <div class="img-custom">
                            <img src="<?php echo $theme_config['vote_img']; ?>">
                        </div>
                        <?php } else { ?>
                        <img class="coffre" src="<?= $this->Html->url('/') ?>theme/Darker/img/coffre.png" alt="coffre">
                        <img class="diamant" src="<?= $this->Html->url('/') ?>theme/Darker/img/diamant.png">
                        <?php } ?>
                        <p>
                            <?php echo $theme_config['vote_texte']; ?>
                        </p>
                        <a href="<?= $this->Html->url('/') ?>vote" class="theme-color-btn btn-voter">Voter pour <?php echo $website_name ?></a>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php if(!isset($theme_config['news_global']) || $theme_config['news_global'] == "true") { ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="article_title theme-color-background">
                <h1>
                    <?= $Lang->get('NEWS__LAST_TITLE') ?>
                </h1>
            </div>
            <?php if(!empty($search_news)) { ?>
            <ul class="list-unstyled">
                <?php foreach ($search_news as $k => $v) { ?>
                <li class="wow zoomIn">
                    <div class="news-all" style="width:100%;">
                        <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>">
                            <h2>
                                <?= cut($v['News']['title'], 70) ?>
                            </h2>
                        </a>
                        <span class="date theme-color-text">Le <?= $Lang->date($v['News']['created']); ?></span>
                        <?php if(isset($theme_config['news_caractere']) && $theme_config['news_caractere']) { ?>
                        <div class="texte">
                            <?= $this->Text->truncate($v['News']['content'], $theme_config['news_caractere'],array('ellipsis' => '...', 'html' => true)) ?>
                        </div>
                        <?php } else { ?>
                        <div class="texte">
                            <?= $this->Text->truncate($v['News']['content'], 900,array('ellipsis' => '...', 'html' => true)) ?>
                        </div>
                        <?php } ?>
                        <?php if(!isset($theme_config['news_commentaires']) || $theme_config['news_commentaires'] == "true") { ?>
                        <div class="commentaires" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?= count($v['Comment']) ?> personne(s) a/ont commenté(s) cet article">
                            <?= count($v['Comment']) ?> <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                        <?php } ?>
                        <?php if(!isset($theme_config['news_likes']) || $theme_config['news_likes'] == "true") { ?>
                        <div class="likes" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?= $this->Text->truncate($v['News']['count_likes']) ?> personne(s) aime(nt) cet article">
                            <?= $this->Text->truncate($v['News']['count_likes']) ?> <i class="fa fa-thumbs-up"></i>
                        </div>
                        <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="theme-color-btn pull-right"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
                        <?php } else { ?>
                        <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="theme-color-btn pull-right" style="margin-top:-30px;"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
                        <?php } ?>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <ol id="pagination"></ol>
            <?php } else { echo '<center><h3>'.$Lang->get('NEWS__NONE_PUBLISHED').'</h3></center>'; } ?>
        </div>
    </div>
</div>
<?php } ?>

<?= $Module->loadModules('home') ?>
