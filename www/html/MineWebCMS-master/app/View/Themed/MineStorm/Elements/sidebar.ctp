<!-- Sidebar -->
<div class="col-md-4">
    <!-- Server status -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <?= $Lang->get('GLOBAL__STATUS') ?>
      </div>
      <div class="panel-body">
        <?php if(isset($theme_config['status']) && $theme_config['status']){ ?>
          <?php if(is_array($server_infos)){ ?>
            <center>
            <?php if(isset($theme_config['ip']) && $theme_config['ip'] != "") echo $theme_config['ip']; ?><hr>
            <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $server_infos['GET_PLAYER_COUNT'] / ($server_infos['GET_MAX_PLAYERS']+1) * 100 ?>%;">
              </div>
            </div>
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
    <!-- Vote -->
    <?php if(isset($theme_config['sidebar-vote']) && $theme_config['sidebar-vote'] && $EyPlugin->isInstalled('eywek.vote')){ ?>
      <div class="panel panel-default">
        <div class="panel-heading"><?= $Lang->get('VOTE__TITLE') ?></div>
        <div class="panel-body">
            <p class="text-center">Votez pour le serveur et gagnez des récompenses !</p><hr>
            <a href="/vote" class="read button-lg">Je veux voter !</a>
        </div>
      </div>
    <?php } ?>

    <!-- Social -->
    <?php if (!empty($youtube_link) || !empty($twitter_link) || !empty($facebook_link) || !empty($findSocialButtons)){ ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= $Lang->get('GLOBAL__JOIN_US') ?>
        </div>
        <div class="panel-body">
          <center>
            <?php
            if(!empty($youtube_link)) {
            ?>

            <div class="youtube">
              <a href="<?= $youtube_link; ?>" class="none" target="_blank">
                <div class="social__yt"><i class="fa fa-youtube" id="logo__social"></i></div>
                <div class="title__social">Youtube</div>
                <div class="desc__social">Retrouvez nous sur youtube</div>
              </a>
            </div>

            <?php
            }
            if(!empty($twitter_link)) {
              ?>
              <div class="twitter">
                <a href="<?= $twitter_link; ?>" class="none" target="_blank">
                  <div class="social__twt"><i class="fa fa-twitter" id="logo__social"></i></div>
                  <div class="title__social">Twitter</div>
                  <div class="desc__social">Retrouvez nous sur twitter</div>
                </a>
              </div>
              <?php
            }
            if(!empty($facebook_link)) {
              ?>
              <div class="fb">
                <a href="<?= $facebook_link; ?>" class="none" target="_blank">
                  <div class="social__fb"><i class="fa fa-facebook" id="logo__social"></i></div>
                  <div class="title__social">Facebook</div>
                  <div class="desc__social">Retrouvez nous sur facebook</div>
                </a>
              </div>
              <?php
            }
            ?>
          </center>
          <center>
            <?php
            foreach ($findSocialButtons as $key => $value) {
              echo '<a target="_blank" class="btn btn-default" style="background-color:'.$value['SocialButton']['color'].'!important;color:white;font-size:18px;margin: 0 5px;" href="'.$value['SocialButton']['url'].'">';
              if(!empty($value['SocialButton']['img'])) {
                echo '<img src="'.$value['SocialButton']['img'].'">';
              }
              if(!empty($value['SocialButton']['title'])) {
                echo (!empty($value['SocialButton']['img'])) ? '<br>'.$value['SocialButton']['title'] : $value['SocialButton']['title'];
              }
              echo '</a>';
            }
            ?>
          </center>
        </div>
    </div>
    <?php } ?>
</div>
