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
	
	<?= $this->Html->css('main.css') ?> 
	<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <?= $this->Html->script('jquery-1.11.0.js') ?>

</head>
<body>

<div id="page-container">
    <?= $this->element('navbar') ?>
	  
	<?= $this->element('notifications') ?>

    <?= $this->fetch('content'); ?>

<div class="stats">
    <div class="container">
        <h1>STATS</h1>	
			<div class="row">
					<div class="col-md-6">
						<div class="box">
							<h2><i class="fa fa-hdd-o"></i><br>SERVEUR</h2>
							<p class="content">	
								IP : <?= $theme_config['config_ip'] ?>
								<br>
								<?= ($banner_server) ? $banner_server : $Lang->get('SERVER__STATUS_OFF') ?>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box">
							<h2><i class="fa fa-user"></i><br>VISITEURS</h2>
							<p class="content"><?= ClassRegistry::init('Visit')->find('count') ?></p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box">
							<h2><i class="fa fa-users"></i><br>MEMBRES INSCRITS</h2>
							<p class="content"><?= ClassRegistry::init('User')->find('count') ?></p>
						</div>
					</div>
				</div>
			</div>		
</div>
<br><br><br>
<footer>
    <div class="container">
        <p>Copyright &copy; 2017 Qually86 - Tous droits réservés.<br>Propulsé par <a href="https://www.mineweb.org" class="mineweb">MineWeb</a></p>
        <p><a href="mailto:mail@gmail.com">CONTACTEZ-NOUS</a></p>
    </div>
</footer>

  <?= $this->element('modals') ?>

  <?= $this->Html->script('bootstrap.js') ?>
  <?= $this->Html->script('app.js') ?>
  <?= $this->Html->script('form.js') ?>
  <?= $this->Html->script('notification.js') ?>
  <?= $this->Html->script('animatescroll.js') ?>
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
