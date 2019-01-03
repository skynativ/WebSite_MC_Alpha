<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1><?= $Lang->get('SHOP__DEDIPASS_PAYMENT') ?></h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb">
          <li><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
          <li><a href="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index')) ?>"><?= $Lang->get('SHOP__TITLE') ?></a></li>
          <li>Dédipass</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?= $this->element('flash') ?>
        <div data-dedipass="<?= $dedipassPublicKey ?>">
          <div class="alert alert-info"><?= $Lang->get('GLOBAL__LOADING') ?>...</div>
        </div>
        <script src="//api.dedipass.com/v1/pay.js"></script>
      </div>
    </div>
  </div>
</div>
