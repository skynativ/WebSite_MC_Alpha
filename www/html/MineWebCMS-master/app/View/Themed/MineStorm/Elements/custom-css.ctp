<style>
    <?php if (isset($theme_config['header_url']) && $theme_config['header_url'] != ""){ ?>
    .header {
      background: url('<?= $theme_config['header_url'] ?>') 0px 0px no-repeat;
      background-size: cover;
    }
    <?php } ?>
</style>
