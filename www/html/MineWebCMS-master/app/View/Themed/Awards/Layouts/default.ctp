<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Serveur Minecraft">
    <meta name="author" content="Eywek,Orphevs">

    <!-- Titre de la page -->
    <title><?= (isset($title_for_layout)) ? $title_for_layout : 'Error' ?> - <?= (isset($website_name)) ? $website_name : 'MineWeb' ?></title>

    <!-- <head> MineWeb -->
        <!-- CSS -->
            <?= $this->Html->css('bootstrap.css') ?>
            <?= $this->Html->css('modern-business.css') ?>
            <?= $this->Html->css('animate.css') ?>
            <?= $this->Html->css('flat.css') ?>
        <!-- Fonts -->
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
        <!-- Scripts -->
            <?= $this->Html->script('jquery-1.11.0.js') ?>
            <?= $this->Html->script('easy_paginate.js') ?>
        <!-- Favicon -->
            <link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>" />

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <head> Thème -->
    
        <!-- CSS -->
           <?= $this->Html->css('Reset.css'); ?>
            <?= $this->Html->css('font-awesome.min.css'); ?>
            <?= $this->Html->css('Main.css'); ?>
            <?= $this->Html->css('Mobile.css'); ?>
            <!-- Elements -->
                <?= $this->Html->css('Navbar.css'); ?>
                <?= $this->Html->css('Userbar.css'); ?>
                <?= $this->Html->css('Socials.css'); ?>
                <?= $this->element('color-theme'); ?>
                <?= $this->element('css-custom'); ?>
        <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet">
        
</head>
<body>
    <script>
        var eyweklapute = 1;
    </script>
  <?php if(isset($Lang)) { ?>
    <div class="header-desktop">
        
        <?= $this->element('navbar'); ?>
        <?= $this->element('userbar'); ?>
    </div>
    <div class="header-mobile theme-color-background">
        <?= $this->element('header-mobile'); ?>
    </div>

    
    
  <?php } ?>
    <?= $this->fetch('content'); ?>
    
    <?php if(isset($Lang)) { ?>

    <?= $this->element('footer'); ?>
    
    <?= $this->element('modals') ?>

    <?= $this->Html->script('jquery-1.11.0.js') ?>
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
    <?= (isset($configuration_end_code)) ? $configuration_end_code : '' ?>
  <?php } ?>
  
   <!-- Script thème -->
        <?= $this->Html->script('clipboard.min.js') ?>
        <?= $this->Html->script('wow.min.js') ?>
        <?= $this->Html->script('scripts.js') ?>
</body>
</html>
