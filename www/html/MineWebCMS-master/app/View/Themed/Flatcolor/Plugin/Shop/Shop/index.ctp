<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading"><?= $Lang->get('SHOP__TITLE'); ?></div>
    <div class="panel-body">
      <!-- Catégories -->
      <?php
      $i = 0;
      foreach ($search_categories as $k => $v) {
        $i++;
      ?>
          <a href="<?= $this->Html->url(array('controller' => 'c/'.$v['Category']['id'], 'plugin' => 'shop')) ?>" class="btn btn-primary <?= (isset($category) AND $v['Category']['id'] == $category OR !isset($category) AND $i == 1) ? ' active' : ''; ?>"><?= before_display($v['Category']['name']) ?></a>
      <?php } ?>
      <hr>
      <?= $vouchers->get_vouchers() ?>
      <div class="row">
        <?php
        if (empty($search_items))
          echo "<center>Aucun article disponible.</center><br><br>";
        $col = 6;
        $i = 0;
        foreach ($search_items as $k => $v) {
          if(!isset($category) AND $v['Item']['category'] == $search_first_category OR isset($category) AND $v['Item']['category'] == $category) {
            $i++;
        ?>
              <div class="col-sm-<?= $col ?> col-lg-<?= $col ?> col-md-<?= $col ?>">
                  <div class="thumbnail">
                      <center><h4><?= before_display($v['Item']['name']) ?></h4></center>
                      <?php if(isset($v['Item']['img_url'])) { ?><img src="<?= $v['Item']['img_url'] ?>" alt=""><?php } ?>
                      <div class="caption" style="height:auto;">
                          <center><h4><?= $v['Item']['price'] ?><?php if($v['Item']['price'] == 1) { echo  ' '.$singular_money; } else { echo  ' '.$plural_money; } ?></h4></center>
                          <?php if($isConnected AND $Permissions->can('CAN_BUY')) { ?><button class="display-item btn btn-success btn-block" data-item-id="<?= $v['Item']['id'] ?>"><?= $Lang->get('SHOP__BUY') ?></button> <?php } ?>
                      </div>
                  </div>
              </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- Sidebar -->
<div class="col-md-4">

</div>
<?= $this->element('sidebar') ?>
<script type="text/javascript">
    function affich_item(id) {
      $('#buy').modal();
      $("#content_buy").hide().html('<div class="modal-body"><div class="alert alert-info"><?= $Lang->get('GLOBAL__LOADING') ?>...</div></div>').fadeIn('250');
      $.ajax({
        url: '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/'+id,
        type : 'GET',
        dataType : 'html',
        success: function(response) {
            $("#content_buy").hide().html(response).fadeIn('250');

            $('input[id="code-voucher"]').unbind('keyup');

            $('input[id="code-voucher"]').keyup(function(e) {

              var code = $(this).val();

              $.get('<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/'+code+'/'+id, function(data) {
                if(data.price !== undefined) {
                  $("#content_buy").find('#total-price').html(data.price);
                }
              });

            });
        },
        error: function(xhr) {
            alert('ERROR');
        }
      });
    }
    function buy(id) {
      $('#buy').modal();
      var code = $('#code-voucher').val();
      $('#btn-buy').attr('disabled', true);
      $('#btn-buy').addClass('disabled');
      $.ajax({
        url: '<?= $this->Html->url(array('action' => 'buy_ajax')); ?>/'+id,
        data : { code : code },
        type : 'GET',
        dataType : 'html',
        success: function(response) {
          $('#btn-buy').attr('disabled', false);
          $('#btn-buy').removeClass('disabled');
          $("#msg_buy").hide().html(response).fadeIn('1500');
        },
        error: function(xhr) {
          $('#btn-buy').attr('disabled', false);
          $('#btn-buy').removeClass('disabled');
          alert('ERROR');
        }
      });
    }

</script>

<script type="text/javascript">
  var LOADING_MSG = '<?= $Lang->get('GLOBAL__LOADING') ?>';
  var ADDED_TO_CART_MSG = '<?= $Lang->get('SHOP__BUY_ADDED_TO_CART') ?> <i class="fa fa-check"></i>';
  var CART_EMPTY_MSG = '<?= $Lang->get('SHOP__BUY_CART_EMPTY') ?>';
  var ITEM_GET_URL = '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/';
  var VOUCHER_CHECK_URL = '<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/';
  var BUY_URL = '<?= $this->Html->url(array('action' => 'buy_ajax')) ?>';

  var CART_ITEM_NAME_MSG = '<?= $Lang->get('SHOP__ITEM_NAME') ?>';
  var CART_ITEM_PRICE_MSG = '<?= $Lang->get('SHOP__ITEM_PRICE') ?>';
  var CART_ITEM_QUANTITY_MSG = '<?= $Lang->get('SHOP__ITEM_QUANTITY') ?>';
  var CART_ACTIONS_MSG = '<?= $Lang->get('GLOBAL__ACTIONS') ?>';

  var CSRF_TOKEN = '<?= $csrfToken ?>';
</script>

<?= $this->Html->script('Shop.jquery.cookie') ?>
<?= $this->Html->script('Shop.shop') ?>
<?= $this->Html->script('Shop.jquery.bootstrap-touchspin.js') ?>

<!-- Version classique -->
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
        <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CONFIRM') ?></h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
        <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CART') ?></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <div class="pull-left">
          <input name="cart-voucher" type="text" class="form-control" autocomplete="off" id="cart-voucher" style="width:245px;" placeholder="<?= $Lang->get('SHOP__BUY_VOUCHER_ASK') ?>">
        </div>
        <button class="btn btn-success disabled"><?= $Lang->get('SHOP__ITEM_TOTAL') ?> : <b><span id="cart-total-price">0</span></b>  <?= $Configuration->getMoneyName() ?></button>
        <button type="button" class="btn btn-primary" id="buy-cart"><?= $Lang->get('SHOP__BUY') ?></button>
      </div>
    </div>
  </div>
</div>
<?= $this->element('payments_modal') ?>
