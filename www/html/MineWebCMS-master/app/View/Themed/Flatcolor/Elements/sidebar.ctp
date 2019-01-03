<!-- Sidebar -->
<div class="col-md-4">
	<?php if($title_for_layout == $Lang->get('SHOP__TITLE')){ ?>
	  <?php if($isConnected) { ?>
			<div class="panel panel-default">
				<div class="panel-heading">Mon compte</div>
				<div class="panel-body">
					<?= $Lang->get('SHOP__MONEY_CURRENTLY') ?>: <?= $money ?> <?= $Configuration->getMoneyName(); ?>
					<?php if($Permissions->can('CREDIT_ACCOUNT')){ ?>
						<hr>
						<a href="#" data-toggle="modal" data-target="#addmoney" class="btn btn-block btn-primary"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
						<a href="#" data-toggle="modal" data-target="#cart-modal" class="btn btn-block btn-success"><?= $Lang->get('SHOP__BUY_CART') ?></a>
					<?php } ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="alert alert-danger"><?= $Lang->get('SHOP__BUY_ERROR_NEED_LOGIN') ?></div>
		<?php } ?>
	<?php } ?>
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
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $server_infos['GET_PLAYER_COUNT'] / $server_infos['GET_MAX_PLAYERS'] * 100 ?>%;">
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
    <?php if(isset($theme_config['sidebar-vote']) && $theme_config['sidebar-vote'] && $EyPlugin->isInstalled('eywek.vote.3')){ ?>
      <div class="panel panel-default">
        <div class="panel-heading"><?= $Lang->get('VOTE__TITLE') ?></div>
        <div class="panel-body">
            <p class="text-center">Votez pour le serveur et gagnez des récompenses !</p><hr>
            <a href="/vote" class="btn btn-success btn-lg btn-block">Je veux voter !</a>
        </div>
      </div>
    <?php } ?>

    <!-- Social -->
    <?php if (!empty($skype_link) || !empty($youtube_link) || !empty($twitter_link) || !empty($facebook_link) || !empty($findSocialButtons)){ ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= $Lang->get('GLOBAL__JOIN_US') ?>
        </div>
        <div class="panel-body">
          <center>
            <?php
            if(!empty($skype_link)) {
              echo '<a href="'.$skype_link.'" target="_blank" class="btn btn-lg btn-skype"><img src="'.$this->Html->url('/').'theme/flatcolor/img/skype.png"></a>';
            }
            if(!empty($youtube_link)) {
              echo '<a href="'.$youtube_link.'" target="_blank" class="btn btn-lg btn-youtube"><img src="'.$this->Html->url('/').'theme/flatcolor/img/youtube.png"></a>';
            }
            if(!empty($twitter_link)) {
              echo '<a href="'.$twitter_link.'" target="_blank" class="btn btn-lg btn-twitter"><img src="'.$this->Html->url('/').'theme/flatcolor/img/twitter.png"></a>';
            }
            if(!empty($facebook_link)) {
              echo '<a href="'.$facebook_link.'" target="_blank" class="btn btn-lg btn-facebook"><img src="'.$this->Html->url('/').'theme/flatcolor/img/facebook.png"></a>';
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
