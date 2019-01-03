<br>
<?= $this->Html->css('Shop.jquery.bootstrap-touchspin.css') ?>

	<div class="container">
	  <div class="row">
		<div class="col-md-3">
			<div class="list-group-shop">
				<?php
				$i = 0;
				foreach ($search_categories as $k => $v) {
				  $i++;
				?>
					<a href="<?= $this->Html->url(array('controller' => 'c/'.$v['Category']['id'], 'plugin' => 'shop')) ?>" class="list-group-item<?= (isset($category) AND $v['Category']['id'] == $category OR !isset($category) AND $i == 1) ? ' active' : ''; ?>"><?= before_display($v['Category']['name']) ?></a>
				<?php } ?>
			</div>
			<div class="list-group-shop">
				<?php if($isConnected) { ?>
				<?php if (!empty($vagoal)) {?>
					<div class="list-group-item">
					<center><b><?= $Lang->get('SHOP__CONFIG_GOAL_TITLE') ?></b></center>
					  <div class="progress-bar-info text-center" role="progressbar" style="width:<?= $vawidth ?>%">
						<b><?= $vawidth ?>%</b>
					  </div>
					</div>
				<?php } ?>
					<a href="#" class="list-group-item">Vous avez <?= ($isConnected) ? $money.' '.$Configuration->getMoneyName() : $Lang->get('SHOP__TITLE'); ?></a>
				<?php } else { ?>
					<a href="#" class="list-group-item">Vous n'êtes pas connecté.</a>
				<?php } ?>
				<?php if($isConnected AND $Permissions->can('CREDIT_ACCOUNT')) { ?>
					<a href="#" data-toggle="modal" data-target="#addmoney" class="list-group-item"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
				<?php } ?>
				<?php if($isConnected) { ?>
					<a href="#" data-toggle="modal" data-target="#cart-modal" class="list-group-item"><?= $Lang->get('SHOP__BUY_CART') ?></a>
				<?php } ?>
			</div>
		  </div>
		  <div class="col-md-9">
			<div class="row">
			  <?= $vouchers->get_vouchers() // Les promotions en cours ?>
			</div>

			<div class="row">
				<?php
				  $col = 4;
				  $i = 0;
				  foreach ($search_items as $k => $v) {
					if(!isset($category) AND $v['Item']['category'] == $search_first_category OR isset($category) AND $v['Item']['category'] == $category) {
					  $i++;
					  $newRow = ( ( $i % ( (12 / $col) ) ) == 0); ?>
					<div class="col-sm-<?= $col ?> col-lg-<?= $col ?> col-md-<?= $col ?>">
						<div class="well" style="" >
							<center><?php if(isset($v['Item']['img_url'])) { ?><img class="img-responsive" style="max-height: 200px; min-height: 200px; margin-right: auto; max-width: 100%; display: block; margin-left: auto;" src="<?= $v['Item']['img_url'] ?>" alt=""><?php } ?></center>
							<div class="caption" style="height:auto;">
								<center><h4><b><?= before_display($v['Item']['name']) ?><br>
								<font color="red"><strike><?= $v['Item']['price_old'] ?></font></strike> 
								<font color="green"><?= $v['Item']['price'] ?></font><?php if($v['Item']['price'] == 1) { echo  ' '.$singular_money; } else { echo  ' '.$plural_money; } ?></a></b></h4></center>
								<a class="btn btn-success btn-block display-item" data-item-id="<?= $v['Item']['id'] ?>"><?= $Lang->get('SHOP__BUY') ?></a> 
							</div>
						</div>
					</div>
				  <?= ($newRow) ? '</div>' : '' ?>
				  <?= ($newRow) ? '<div class="row">' : '' ?>
				<?php } ?>
			  <?php } ?>
			</div>
		</div>
	  </div>
	</div>


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
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CART') ?></h4>
      </div>
      <div class="modal-body">
      </div>
        <div class="col-md-12">
            <br>
            <input name="cart-voucher" type="text" class="form-control" autocomplete="off" id="cart-voucher" placeholder="<?= $Lang->get('SHOP__BUY_VOUCHER_ASK') ?>">
        </div>
      <div class="modal-footer">
        <a class="btn btn-success disabled"><?= $Lang->get('SHOP__ITEM_TOTAL') ?> : <span id="cart-total-price">0</span>  <?= $Configuration->getMoneyName() ?></a>
        <a type="button" class="btn btn-success" id="buy-cart"><?= $Lang->get('SHOP__BUY') ?></a>
      </div>
    </div>
  </div>
</div>
<?= $this->element('payments_modal') ?>
