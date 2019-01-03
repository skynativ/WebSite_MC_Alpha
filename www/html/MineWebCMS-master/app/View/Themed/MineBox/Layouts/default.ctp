<!DOCTYPE html>
<html lang="fr">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title><?= $title_for_layout; ?> - <?= $website_name ?></title>
	<meta name="description" content="">
	<meta name="author" content="Kuro">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>" />

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=1">
	
	<!-- CSS
	================================================== -->
   <link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
   <?= $this->Html->css('bootstrap.css') ?>
   <?= $this->Html->css('main.css') ?>
   <?= $this->Html->css('animate.min.css') ?>
   <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
   
   <!-- JavaScript
   =================================================== -->
   <?= $this->Html->script('jquery-1.11.0.js') ?>
   <?= $this->Html->script('easy_paginate.js') ?>
	
</head>
<body>
	<!-- JavaScript
	================================================== -->
	
	<?= $this->element('modals') ?>
	<?= $this->element('navbar') ?>
	<?= $this->element('header') ?>
	<?= $this->fetch('content'); ?>
	
	<?= $this->element('footer') ?>
	
	<?= $this->Html->script('jquery-1.11.0.js'); ?>
	<?= $this->Html->script('jquery-migrate-1.2.1.min.js'); ?>
	<?= $this->Html->script('bootstrap.js'); ?>
	<?= $this->Html->script('jquery.hoverIntent.minified.js'); ?>
	<?= $this->Html->script('jquery.flexnav.min.js'); ?>
	<?= $this->Html->script('jquery.isotope.min.js'); ?>
	<?= $this->Html->script('jquery.imagesloaded.min.js'); ?>
	<?= $this->Html->script('jquery.flickrfeed.js'); ?>
	<?= $this->Html->script('jquery.fitvids.js'); ?>
	<?= $this->Html->script('owl.carousel.js'); ?>
	<?= $this->Html->script('jquery.magnific-popup.min.js'); ?>
	<?= $this->Html->script('jquery.appear.js'); ?>
	<?= $this->Html->script('custom.js'); ?>
	<?= $this->Html->script('jquery.themepunch.plugins.min.js'); ?>
	<?= $this->Html->script('jquery.themepunch.revolution.min.js'); ?>
	<?= $this->Html->script('app.js') ?>
	<?= $this->Html->script('form.js') ?>
	<?= $this->Html->script('notification.js') ?>
	
<script>
		jQuery(document).ready(function() {
			jQuery('.tp-banner').revolution({
				delay:6000,
				startwidth:1140,
				startheight:480,
				hideThumbs:10,
				fullWidth:"on",
				forceFullWidth:"on",
				hideCaptionAtLimit:480,
				//navigationType: "none",
				soloArrowLeftHOffset:20,
				soloArrowRightHOffset:20,
				soloArrowLeftVOffset:20,
				soloArrowRightVOffset:20
			});
	   });
</script>
<script>
    <?php if($isConnected) { ?>
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
<?php if (isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', '<?= $google_analytics ?>', 'auto');
        ga('send', 'pageview');
    </script>
<?php } ?>
<?= (isset($configuration_end_code)) ? $configuration_end_code : '' ?>
</body>
</html>
