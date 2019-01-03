<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Narty, Eywek">

    <title><?= $title_for_layout; ?> - <?= $website_name ?></title>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('minestorm.css') ?>
    <?= $this->Html->css('swiper.min.css') ?>
    <?= $this->Html->css('/css/font-awesome.min.css') ?>
    
    <!-- CSS Config -->
    <?php if (isset($theme_config['theme']) && $theme_config['theme'] != "")
        echo $this->Html->css('flatcolor-'.$theme_config['theme'].'.css')
    ?>
    <?= $this->Html->script('jquery-1.11.0.js') ?>
    <?= $this->element('custom-css') ?>
    <?= $this->Html->script('easy_paginate.js') ?>
    <link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navbar -->
    <?= $this->element('navbar') ?>

    <!-- Main body -->
    <div class="container">
      <!-- Notifications -->
      <?= $this->element('notifications') ?>
      <!-- Content -->
      <div class="body">
          <?= $this->fetch('content') ?>
      </div>
    </div>
    <!-- Footer -->
    <?= $this->element('footer') ?>
    <!-- Modals -->
    <?= $this->element('modals') ?>

    <!-- Scripts -->
    <?= $this->Html->script('jquery-1.11.0.js') ?>
    <?= $this->Html->script('bootstrap.js') ?>
    <?= $this->Html->script('app.js') ?>
    <?= $this->Html->script('form.js') ?>
    <?= $this->Html->script('swiper.js') ?>
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
<!-- MineStorm by Narty -->
</html>
