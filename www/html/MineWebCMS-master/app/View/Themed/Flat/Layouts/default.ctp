<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $theme_config['desc_site'] ?>">
    <meta name="author" content="Antoine / Qually86">
	
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image" content="<?= $theme_config['image_site'] ?>"/>
    <meta name="twitter:image:alt" content="<?= $theme_config['name_site'] ?>"/>
    <meta name="twitter:site" content="<?= $theme_config['twitter'] ?>"/>
    <meta name="twitter:title" content="<?= $theme_config['name_site'] ?>"/>
    <meta name="twitter:description" content="<?= $theme_config['desc_site'] ?>"/>
    <link rel="icon" type="image/png" href="<?= (isset($theme_config) && isset($theme_config['favicon_url'])) ? $theme_config['favicon_url'] : '' ?>" />
    <title><?= $title_for_layout ?> - <?= $theme_config['name_site'] ?></title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>

      <?= $this->Html->script('jquery-1.11.0.js') ?>

    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

</head>
<body>

    <header>
      <?= $this->element('navbar') ?>
    </header>
	<?= $this->element('notifications') ?>

		<div class="banner" style="background-image: url('<?= $theme_config['banner'] ?>');">
			<img src="<?= $theme_config['logo'] ?>" class="img-responsive center-block"></img>
		</div>
		<div class="alert" role="alert">ACTUELLEMENT <span class="label label-nbr"><?php $get = $Server->call(array('GET_PLAYER_COUNT' => array(), 'GET_MAX_PLAYERS' => array()), $value['Server']['id']); echo $get['GET_PLAYER_COUNT']; ?></span> JOUEURS EN LIGNE SUR NOTRE PLATEFORME AINSI QUE <span class="label label-nbr"><?= ClassRegistry::init('User')->find('count') ?></span> JOUEURS INSCRITS !</div>
    <?= $this->fetch('content'); ?>

<br>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2 class="text-uppercase"><?= $theme_config['name_site'] ?></h2>
				<p><?= $theme_config['desc_site'] ?></p>
			</div>
			<div class="col-md-4">
            <?php if(!$EyPlugin->isInstalled('eywek.shop')) { ?>
                <h2 class="text-uppercase">Meilleurs Votants</h2>
				<div class="voters-all">
                    <?php $users_vote = ClassRegistry::init('Vote.Vote')->find('all', [
                        'fields' => ['username', 'COUNT(id) AS count'],
                        'conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%'],
                        'order' => 'count DESC',
                        'group' => 'username',
                        'limit' => 3
                    ]);
                    ?>
                    <?php $i_cl = 0;foreach($users_vote as $userv): $i_cl++; ?>
                    <div class="voter-u">
                        <div class="voter-avatar">
							<img src="https://minotar.net/helm/<?= $userv['Vote']['username']; ?>/40.png" alt="avatar" class="avatar">
                        </div>
                        <div class="voter-u-infos">
                            <h5 class="pseudo"><?= $userv['Vote']['username']; ?></h5>
                            <br>
                            <span class="position"><?php if($i_cl == 1){ ?><img height="16" width="16" src="/../theme/Flat/img/1.png"><?php }else{ ?><img height="16" width="16" src="/../theme/Flat/img/2.png"><?php }?> - <?= $i_cl; ?></span>
							<span class="position"><?= $userv[0]['count']; ?> <?php if($userv[0]['count'] > 1){ ?>votes<?php }else{ ?>vote<?php }?></span>
                        </div>                                                
					</div>
                <?php endforeach; ?> 
                </div>
            <?php } ?>
            </div>
			<div class="col-md-4">
				<h2 class="text-uppercase">Réseaux sociaux</h2>
				<a href="" target="_blank"><img src="/../theme/Flat/img/twitter.png"></a>
				<a href="" target="_blank"><img src="/../theme/Flat/img/youtube.png"></a>
			</div>
		</div>
	</div>
	<div class="foo">
		<div class="container">
		tous droits réservés - Propulsé par <a href="https://www.mineweb.org">MineWeb</a><br>
		Développé par Qually86
		</div>
	</div>
</footer>

  <?= $this->element('modals') ?>

  <?= $this->Html->script('bootstrap.js') ?>
  <?= $this->Html->script('app.js') ?>
  <?= $this->Html->script('form.js') ?>
  <?= $this->Html->script('notification.js') ?>
  <script>
  <?php if($isConnected) { ?>
      // Notifications
        var notification = new $.Notification({
          'url': {
            'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
            'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
            'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
            'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
            'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
          },
          'messages': {
            'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
            'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
          }
        });
    <?php } ?>
  // Config FORM/APP.JS

  var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
  var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

  var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
  var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
  var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
  var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
  var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

  var CSRF_TOKEN = "<?= $csrfToken ?>";
  </script>

  <?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?= $google_analytics ?>', 'auto');
      ga('send', 'pageview');
    </script>
  <?php } ?>
  <?= $configuration_end_code ?>

</body>

</html>
