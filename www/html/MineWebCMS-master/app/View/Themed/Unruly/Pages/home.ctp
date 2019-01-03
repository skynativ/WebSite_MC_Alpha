<?php if(!isset($theme_config['slider']) || $theme_config['slider'] == "true") { ?>
<div id="myCarousel" class="carousel slide hidden-sm hidden-xs" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php if(!empty($search_slider)) { ?>
                <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
                <div class="item<?php if($i == 0) { echo ' active'; } ?>">
                    <img src="<?= $v['Slider']['url_img'] ?>" alt="slide">
                </div>
                <?php $i++; } ?>
    <?php } else { ?>
        <div class="item active">
          <img src="https://placeholdit.imgix.net/~text?txtsize=125&txt=1920%C3%97500&w=1920&h=500" alt="Los Angeles">
        </div>

        <div class="item">
          <img src="https://placeholdit.imgix.net/~text?txtsize=125&txt=1920%C3%97500&w=1920&h=500" alt="Chicago">
        </div>

        <div class="item">
          <img src="https://placeholdit.imgix.net/~text?txtsize=125&txt=1920%C3%97500&w=1920&h=500" alt="New York">
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


<div class="container">
    
    <?php if(!isset($theme_config['banniere']) || $theme_config['banniere'] == "true") { ?>
        <?php if(!isset($theme_config['epee']) || $theme_config['epee'] == "true") { ?>
            <div class="sword animated flipInY"></div>
        <?php } ?>
    <div class="banner hidden-xs">
        <ul class="list-inline list-unstyled"> 
            <?php if(!isset($theme_config['color']) || $theme_config['color'] == "custom") { ?>
            <li><div class="border-left-custom-color"></div></li>
            <?php } else { ?>
            <li></li>
            <?php } ?>
            <?php if(isset($theme_config['Banner']) && $theme_config['Banner']) { ?>
                <li class="main" id="Banner"><?= $theme_config['Banner'] ?></li>
            <?php } else { ?>
                <li class="main" id="Banner"><p><br></p></li>
            <?php } ?>
            <?php if(!isset($theme_config['color']) || $theme_config['color'] == "custom") { ?>
            <li><div class="border-right-custom-color"></div></li>
            <?php } else { ?>
            <li></li>
            <?php } ?>
        </ul>
    </div>
    <?php } else { ?>
    <?php } ?>
    
    
    <div class="row hidden-xs">
        <?php if(!isset($theme_config['vitrines']) || $theme_config['vitrines'] == "true") { ?>
        <div class="col-lg-4">
            <?php if(isset($theme_config['vitrine_url_1']) && $theme_config['vitrine_url_1']) { ?>
                    <a href="<?= $theme_config['vitrine_url_1'] ?>">
                <?php } else { ?>
                    <a href="#">
                <?php } ?>
            <div class="vitrine animated fadeIn">
                <?php if(isset($theme_config['vitrine_img_1']) && $theme_config['vitrine_img_1']) { ?>
                <img class="no-copy" src="<?= $theme_config['vitrine_img_1'] ?>" alt="vitrine">
                <?php } else { ?>
                <img class="no-copy" src="http://image.noelshack.com/fichiers/2017/20/1495387079-360400.png" alt="vitrine">
                <?php } ?>
                <?php if(isset($theme_config['vitrine_title_1']) && $theme_config['vitrine_title_1']) { ?>
                    <h3><?= $theme_config['vitrine_title_1'] ?></h3>
                <?php } else { ?>
                <?php } ?>
                <?php if(isset($theme_config['vitrine_text_1']) && $theme_config['vitrine_text_1']) { ?>
                    <p><?= $theme_config['vitrine_text_1'] ?></p>
                <?php } else { ?>
                <?php } ?>
            </div>
            </a>
        </div>
        <div class="col-lg-4">
            <?php if(isset($theme_config['vitrine_url_2']) && $theme_config['vitrine_url_2']) { ?>
                    <a href="<?= $theme_config['vitrine_url_2'] ?>">
                <?php } else { ?>
                    <a href="#">
                <?php } ?>
            <div class="vitrine animated fadeIn">
                <?php if(isset($theme_config['vitrine_img_2']) && $theme_config['vitrine_img_2']) { ?>
                <img class="no-copy" src="<?= $theme_config['vitrine_img_2'] ?>" alt="vitrine">
                <?php } else { ?>
                <img class="no-copy" src="http://image.noelshack.com/fichiers/2017/20/1495387079-360400.png" alt="vitrine">
                <?php } ?>
                <?php if(isset($theme_config['vitrine_title_2']) && $theme_config['vitrine_title_2']) { ?>
                    <h3><?= $theme_config['vitrine_title_2'] ?></h3>
                <?php } else { ?>
                <?php } ?>
                <?php if(isset($theme_config['vitrine_text_2']) && $theme_config['vitrine_text_2']) { ?>
                    <p><?= $theme_config['vitrine_text_2'] ?></p>
                <?php } else { ?>
                <?php } ?>
            </div>
            </a>
        </div>
        <div class="col-lg-4">
            <?php if(isset($theme_config['vitrine_url_3']) && $theme_config['vitrine_url_3']) { ?>
                    <a href="<?= $theme_config['vitrine_url_3'] ?>">
                <?php } else { ?>
                    <a href="#">
                <?php } ?>
            <div class="vitrine animated fadeIn">
                <?php if(isset($theme_config['vitrine_img_3']) && $theme_config['vitrine_img_3']) { ?>
                <img class="no-copy" src="<?= $theme_config['vitrine_img_3'] ?>" alt="vitrine">
                <?php } else { ?>
                <img class="no-copy" src="http://image.noelshack.com/fichiers/2017/20/1495387079-360400.png" alt="vitrine">
                <?php } ?>
                <?php if(isset($theme_config['vitrine_title_3']) && $theme_config['vitrine_title_3']) { ?>
                    <h3><?= $theme_config['vitrine_title_3'] ?></h3>
                <?php } else { ?>
                <?php } ?>
                <?php if(isset($theme_config['vitrine_text_3']) && $theme_config['vitrine_text_3']) { ?>
                    <p><?= $theme_config['vitrine_text_3'] ?></p>
                <?php } else { ?>
                <?php } ?>
            </div>
            </a>
        </div>
        <?php } ?>

    </div>
    
    <div class="row">
        <div class="col-lg-8" style="margin-top:30px">
            <div class="news_title">
                <h1>
                    <?= $Lang->get('NEWS__LAST_TITLE') ?>
                </h1>
                <div class="news_title_sep"></div>
            </div>
        <?php if(!empty($search_news)) { ?>
        <ul class="list-unstyled">
        <?php foreach ($search_news as $k => $v) { ?>
            <li class="animated fadeInUp">
                <div class="bloc" style="width:100%;">
                    <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"><h2><?= cut($v['News']['title'], 70) ?></h2></a>
                    <div><?= $this->Text->truncate($v['News']['content'], 320, array('ellipsis' => '...', 'html' => true)) ?></div>
                    <span class="date">Le <?= $Lang->date($v['News']['created']); ?></span>
                    <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="btn btn-theme pull-right"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
                </div>
            </li>
        <?php } ?>
        </ul>
        <ol id="pagination"></ol>
        <?php } else { echo '<center><h3>'.$Lang->get('NEWS__NONE_PUBLISHED').'</h3></center>'; } ?>
    </div>
    <div class="col-lg-4 text-center" style="margin-top:30px">
        <!-- Launcher -->
        <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?>
        <div class="panel panel-default">
          <div class="panel-heading">
              <?php if(isset($theme_config['launcher_title']) && $theme_config['launcher_title']) { ?>
                <?= $theme_config['launcher_title'] ?>
              <?php } else { ?>
                Rejoignez-nous
              <?php } ?>
          </div>
          <div class="panel-body">
                <?php if(isset($theme_config['launcher_text']) && $theme_config['launcher_text']) { ?>
                <p style="margin-bottom: 30px;"><?= $theme_config['launcher_text'] ?></p>
              <?php } else { ?>
                <p style="margin-bottom: 30px;">Pour nous rejoindre vous devez télécharger notre launcher</p>
              <?php } ?>
              <?php if(isset($theme_config['launcher_dl']) && $theme_config['launcher_dl']) { ?>
                <a href="<?= $theme_config['launcher_dl'] ?>" class="btn btn-theme">
                    <?php if(isset($theme_config['launcher_btn']) && $theme_config['launcher_btn']) { ?>
                    <?= $theme_config['launcher_btn'] ?>
                      <?php } else { ?>
                    Téléchargez le launcher
                      <?php } ?>
                </a>
              <?php } else { ?>
                <a href="#" class="btn btn-theme">
                    <?php if(isset($theme_config['launcher_btn']) && $theme_config['launcher_btn']) { ?>
                    <?= $theme_config['launcher_btn'] ?>
                      <?php } else { ?>
                    Téléchargez le launcher
                      <?php } ?>
                </a>
              <?php } ?>
          </div>
        </div>
        <?php } ?>
        <!-- Server status -->
        <?php if(!isset($theme_config['status_global']) || $theme_config['status_global'] == "true") { ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <?= $Lang->get('GLOBAL__STATUS') ?>
              </div>
              <div class="panel-body">
                <?php if(isset($theme_config['status']) && $theme_config['status']){ ?>
                  <?php if(is_array($server_infos)){ ?>
                    <center>
                    <?php if(isset($theme_config['ip']) && $theme_config['ip'] != "") echo $theme_config['ip']; ?><hr>
                    <div id="progress" class="progress">
                      <div id="progress-bar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?= $server_infos['GET_PLAYER_COUNT'] / $server_infos['GET_MAX_PLAYERS'] * 100 ?>%;">
                      </div>
                    </div>
                        <script>
                            var str = document.getElementById("progress").innerHTML; 
                            var res = str.replace(",", ".");
                            document.getElementById("progress").innerHTML = res;
                        </script>
                      <i class="fa fa-signal" aria-hidden="true"></i> <?= $server_infos['GET_PLAYER_COUNT'] ?> / <?= $server_infos['GET_MAX_PLAYERS'] ?> joueurs connectés
                    </center>
                  <?php } else { ?>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                      </div>
                    </div>
                    <center><i class="fa fa-ban" aria-hidden="true"></i> <?= $Lang->get('SERVER__STATUS_OFF') ?></center>
                  <?php } ?>
                <?php } else { ?>
                <?= ($banner_server) ? '<p class="text-center">'.$banner_server.'</p>' : '<p class="text-center">'.$Lang->get('SERVER__STATUS_OFF').'</p>' ?>
                <?php } ?>
              </div>
            </div>
        <?php } ?>
    <!-- Vote -->
    <?php if($EyPlugin->isInstalled('eywek.vote')){ ?>
        <?php if(isset($theme_config['vote_global']) && $theme_config['vote_global'] == "true") { ?>
          <div class="panel panel-default">
            <div class="panel-heading"><?= $Lang->get('VOTE__TITLE') ?></div>
            <div class="panel-body">
                <p class="text-center">Votez pour le serveur et gagnez des récompenses !</p><hr>
                <?php if(isset($theme_config['vote_url']) && $theme_config['vote_url']){ ?>
                    <a href="<?= $theme_config['vote_url'] ?>" class="btn btn-theme btn-lg">Je veux voter !</a>
                <?php } else { ?>
                    <a href="/vote" class="btn btn-theme btn-lg">Je veux voter !</a>
                <?php } ?>
            </div>
          </div>
        <?php } ?>
    <?php } ?>
    
    <?php if(!isset($theme_config['discord']) || $theme_config['discord'] == "true") { ?>
        <?php if(isset($theme_config['discord_id']) && $theme_config['discord_id']) { ?>
            <iframe style="margin-bottom:10px;" src="https://discordapp.com/widget?id=<?= $theme_config['discord_id'] ?>&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
        <?php } ?>
    <?php } ?>
    
    <?php if(isset($theme_config['HTML_sidebar']) && $theme_config['HTML_sidebar']) { ?>
                <?= $theme_config['HTML_sidebar'] ?>
    <?php } ?>
        
    <?php if(!isset($theme_config['social_global']) || $theme_config['social_global'] == "true") { ?>
        <div class="social">
      <?php
        $howManyBtns = 0;
        $howManyBtns += (!empty($facebook_link));
        $howManyBtns += (!empty($twitter_link));
        $howManyBtns += (!empty($youtube_link));
        $howManyBtns += (!empty($skype_link));
        $howManyBtns += count($findSocialButtons);

        $maxBtnsByLine = 4;
        $howManyBtnsDivided = ceil( $howManyBtns / ceil( $howManyBtns / $maxBtnsByLine ) );
        $col = 12 / $howManyBtnsDivided;

        if(!empty($facebook_link)) {
          echo '<a href="'.$facebook_link.'" class="social-badge facebook">              
                <div class="icon"><i class="fa fa-facebook"></i></div>
                <p>'.$Lang->get('GLOBAL__JOIN_US_SOCIAL').' Facebook</p>
            </a>';
        }
        if(!empty($twitter_link)) {
          echo '<a href="'.$twitter_link.'" class="social-badge twitter">              
                <div class="icon"><i class="fa fa-twitter"></i></div>
                <p>'.$Lang->get('GLOBAL__JOIN_US_SOCIAL').' Twitter</p>
            </a>';
        }
        if(!empty($youtube_link)) {
          echo '<a href="'.$youtube_link.'" class="social-badge youtube">              
                <div class="icon"><i class="fa fa-youtube-play"></i></div>
                <p>'.$Lang->get('GLOBAL__JOIN_US_SOCIAL').' Youtube</p>
            </a>';
        }
        if(!empty($skype_link)) {
          echo '<a href="'.$skype_link.'" class="social-badge skype">              
                <div class="icon"><i class="fa fa-skype"></i></div>
                <p>'.$Lang->get('GLOBAL__JOIN_US_SOCIAL').' Skype</p>
            </a>';
        }
        foreach ($findSocialButtons as $key => $value) {
          echo '<a href="'.$value['SocialButton']['url'].'" class="social-badge" style="background-color:'.$value['SocialButton']['color'].';">';
          if(!empty($value['SocialButton']['img'])) {
            echo '<div class="icon"><img src="'.$value['SocialButton']['img'].'"></div><p>';
          }
          if(!empty($value['SocialButton']['title'])) {
            echo (!empty($value['SocialButton']['img'])) ? ''.$Lang->get('GLOBAL__JOIN_US_SOCIAL').'' .$value['SocialButton']['title'] : $value['SocialButton']['title'];
          }
          echo '</p></a>';
        }
      ?>
            
    </div>
        <?php } ?>
        
    </div>
    </div>

    <?= $Module->loadModules('home') ?>
</div>
