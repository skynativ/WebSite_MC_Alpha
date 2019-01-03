<?= $this->element('header'); ?>

<?php if(!isset($theme_config['header-only']) || $theme_config['header-only'] == "true") { ?>

<script>
    var headerOnly = true;
</script>

<?php } else { ?>
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?= $this->element('vote-widget'); ?>
                <?= $this->element('news'); ?>
            </div>
            <div class="col-md-5">
                <?= $this->element('sidebar'); ?>
            </div>
        </div>
    </div>
</section>

<script>
    var headerOnly = false;
</script>
<?php } ?>

<?php if(!isset($theme_config['header_global']) || $theme_config['header_global'] == "true") { ?>
<script>
    var eyweklapute = 0;
</script>
<?php } ?>
<?= $Module->loadModules('home') ?>