<div id="content">
  <div class="container">

    <div class="col-sm-6 col-sm-offset-3" id="error-page">

      <div class="box">

        <h3><?= $Lang->get('ERROR__403_LABEL') ?></h3>
        <h4 class="text-muted"><?= $Lang->get('ERROR__403_CONTENT', array('{URL}' => $url)) ?></h4>

        <p class="buttons"><a href="<?= $this->Html->url('/') ?>" class="btn btn-template-main"><i class="fa fa-home"></i> <?= $Lang->get('GLOBAL__HOME') ?></a></p>

      </div>

    </div>
  </div>
</div>
