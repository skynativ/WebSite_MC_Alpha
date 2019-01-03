<style media="screen">
table tr td:last-child {
  white-space: nowrap;
  width: 1px;
}
table tr td:last-child > div.btn-group {
  width: 170px;
}
</style>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('SHOP__ADMIN_MANAGE_PAYMENT') ?></h3>
        </div>
        <div class="box-body">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_starpass" data-toggle="tab" aria-expanded="true">StarPass</a></li>
              <li class=""><a href="#tab_paypal" data-toggle="tab" aria-expanded="false">PayPal</a></li>
              <li class=""><a href="#tab_psc" data-toggle="tab" aria-expanded="false">PaySafeCard</a></li>
              <li class=""><a href="#tab_dedipass" data-toggle="tab" aria-expanded="false">Dédipass</a></li>
              <li class=""><a href="#tab_points_transfer" data-toggle="tab" aria-expanded="false"><?= $Lang->get('SHOP__USER_POINTS_TRANSFER_ADMIN') ?></a></li>
              <?= $Module->loadModules('shop_payments_modal_admin_tab') ?>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <?= $Module->loadModules('shop_payments_modal_admin_tab_content') ?>
              <div class="tab-pane active" id="tab_starpass">

                <h3><?= $Lang->get('SHOP__STARPASS_OFFERS') ?> <a href="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'add_starpass', 'admin' => true)) ?>" class="btn btn-success pull-right"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>

                <br><br>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('GLOBAL__NAME') ?></th>
                      <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                      <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($offers['starpass'])) { ?>
                      <?php foreach ($offers['starpass'] as $key => $value) { ?>
                        <tr>
                          <td><?= $value['Starpass']['name'] ?></td>
                          <td><?= $value['Starpass']['money'] ?></td>
                          <td><?= $Lang->date($value['Starpass']['created']) ?></td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'edit_starpass/'.$value["Starpass"]["id"], 'admin' => true)) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                              <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'shop', 'action' => 'delete/starpass/'.$value["Starpass"]["id"], 'admin' => true)) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>

                <hr>

                <h3><?= $Lang->get('SHOP__STARPASS_HISTORIES') ?></h3>

                <table class="table table-bordered dataTable" id="histories_starpass">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('SHOP__STARPASS_CODE') ?></th>
                      <th><?= $Lang->get('USER__USERNAME') ?></th>
                      <th><?= $Lang->get('SHOP__STARPASS_OFFER') ?></th>
                      <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>

                <script type="text/javascript">
                $(document).ready(function() {
                  $('#histories_starpass').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    'searching': true,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "<?= $this->Html->url(array('action' => 'get_starpass_histories')) ?>",
                    "aoColumns": [
                        {mData:"StarpassHistory.code"},
                        {mData:"User.pseudo"},
                        {mData:"Starpass.name"},
                        {mData:"StarpassHistory.credits_gived"},
                        {mData:"StarpassHistory.created"}
                    ],
                  });
                });
                </script>

              </div>

              <div class="tab-pane" id="tab_paypal">

                <h3><?= $Lang->get('SHOP__PAYPAL_OFFERS') ?> <a href="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'add_paypal', 'admin' => true)) ?>" class="btn btn-success pull-right"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>

                <br>
                <div class="alert alert-info">
                  <b><?= $Lang->get('GLOBAL__INFO') ?></b> <?= $Lang->get('SHOP__PAYPAL_PAYMENT_DELAY') ?>
                </div>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('GLOBAL__NAME') ?></th>
                      <th><?= $Lang->get('SHOP__PAYPAL_MAIL') ?></th>
                      <th><?= $Lang->get('SHOP__ITEM_PRICE') ?></th>
                      <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                      <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($offers['paypal'])) { ?>
                      <?php foreach ($offers['paypal'] as $key => $value) { ?>
                        <tr>
                          <td><?= $value['Paypal']['name'] ?></td>
                          <td><?= $value['Paypal']['email'] ?></td>
                          <td><?= $value['Paypal']['price'] ?></td>
                          <td><?= $value['Paypal']['money'] ?></td>
                          <td><?= $Lang->date($value['Paypal']['created']) ?></td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'edit_paypal/'.$value["Paypal"]["id"], 'admin' => true)) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                              <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'shop', 'action' => 'delete/paypal/'.$value["Paypal"]["id"], 'admin' => true)) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>

                <hr>

                <h3><?= $Lang->get('SHOP__PAYPAL_HISTORIES') ?></h3>

                <table class="table table-bordered dataTable" id="histories_paypal">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('SHOP__PAYPAL_PAYMENT_ID') ?></th>
                      <th><?= $Lang->get('USER__USERNAME') ?></th>
                      <th><?= $Lang->get('SHOP__PAYPAL_OFFER') ?></th>
                      <th><?= $Lang->get('SHOP__GLOBAL_AMOUNT') ?></th>
                      <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <script type="text/javascript">
                $(document).ready(function() {
                  $('#histories_paypal').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    'searching': true,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "<?= $this->Html->url(array('action' => 'get_paypal_histories')) ?>",
                    "aoColumns": [
                        {mData:"PaypalHistory.payment_id"},
                        {mData:"User.pseudo"},
                        {mData:"Paypal.name"},
                        {mData:"PaypalHistory.payment_amount"},
                        {mData:"PaypalHistory.credits_gived"},
                        {mData:"PaypalHistory.created"}
                    ],
                  });
                });
                </script>

              </div>

              <div class="tab-pane" id="tab_psc">

                <h3><?= $Lang->get('SHOP__PAYSAFECARD_ADMIN_TITLE') ?> <a href="<?= $this->Html->url(array('action' => 'toggle_paysafecard')) ?>" class="btn btn-<?= ($paysafecardsStatus) ? 'danger' : 'success' ?> pull-right"><?= ($paysafecardsStatus) ? $Lang->get('GLOBAL__DISABLE') : $Lang->get('GLOBAL__ENABLE') ?></a></h3>

                <br><br>

                <table class="table table-bordered dataTable">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('USER__USERNAME') ?></th>
                      <th><?= $Lang->get('SHOP__GLOBAL_AMOUNT') ?></th>
                      <th><?= $Lang->get('SHOP__VOUCHER_CODE') ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                      <th class="right"><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($paysafecards)) { ?>
                      <?php foreach ($paysafecards as $key => $value) { ?>
                        <?php if($value['Paysafecard']['user_id'] != "0") { ?>
                          <tr>
                            <td><?= $usersByID[$value['Paysafecard']['user_id']] ?></td>
                            <td><?= $value['Paysafecard']['amount'] ?></td>
                            <td><?= $value['Paysafecard']['code'] ?></td>
                            <td><?= $Lang->date($value['Paysafecard']['created']) ?></td>
                            <td>
                              <a href="#" onClick="howmuch(<?= $value['Paysafecard']['id'] ?>)" class="btn btn-success"><?= $Lang->get('SHOP__PAYSAFECARD_ACCEPT') ?></a>
                              <a href="<?= $this->Html->url(array('action' => 'paysafecard_invalid/'.$value['Paysafecard']['id'])) ?>" class="btn btn-danger"><?= $Lang->get('SHOP__PAYSAFECARD_REFUSE') ?></a>
                            </td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>

                <script>
                function howmuch(id) {
                    var money = prompt("<?= $Lang->get('SHOP__PAYSAFECARD_VALID_CONFIRM') ?>");

                    if (money != null) {
                        document.location = '<?= $this->Html->url(array('controller' => 'payment', 'action' => 'paysafecard_valid/')) ?>/'+id+'/'+money;
                    } else {
                      return false;
                    }
                }
                </script>


                <hr>

                <h3><?= $Lang->get('SHOP__PAYSAFECARD_HISTORIES') ?></h3>

                <table class="table table-bordered dataTable" id="histories_paysafecard">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('SHOP__PAYSAFECARD_CODE') ?></th>
                      <th><?= $Lang->get('USER__USERNAME') ?></th>
                      <th><?= $Lang->get('SHOP__PAYSAFECARD_VALID_USER') ?></th>
                      <th><?= $Lang->get('SHOP__GLOBAL_AMOUNT') ?></th>
                      <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <script type="text/javascript">
                $(document).ready(function() {
                  $('#histories_paysafecard').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    'searching': true,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "<?= $this->Html->url(array('action' => 'get_paysafecard_histories')) ?>",
                    "aoColumns": [
                        {mData:"PaysafecardHistory.code"},
                        {mData:"User.pseudo"},
                        {mData:"Author.pseudo"},
                        {mData:"PaysafecardHistory.amount"},
                        {mData:"PaysafecardHistory.credits_gived"},
                        {mData:"PaysafecardHistory.created"}
                    ],
                  });
                });
                </script>


              </div>

              <div class="tab-pane" id="tab_dedipass">

                <h3><?= $Lang->get('SHOP__DEDIPASS_CONFIGURATION') ?> <a href="<?= $this->Html->url(array('action' => 'toggle_dedipass')) ?>" class="btn btn-<?= (isset($dedipassConfig['DedipassConfig']['status']) && $dedipassConfig['DedipassConfig']['status']) ? 'danger' : 'success' ?> pull-right"><?= (isset($dedipassConfig['DedipassConfig']['status']) && $dedipassConfig['DedipassConfig']['status']) ? $Lang->get('GLOBAL__DISABLE') : $Lang->get('GLOBAL__ENABLE') ?></a></h3>

                <div class="alert alert-info">
                  <p>
                    <?= $Lang->get('SHOP__DEDIPASS_EXPLAIN_CONFIG') ?>
                  </p>
                  <p><b><?= $Lang->get('SHOP__DEDIPASS_EXPLAIN_CONFIG_URL_1') ?> :</b> <?= $this->Html->url('/shop/payment/dedipass', true) ?></p>
                  <p><b><?= $Lang->get('SHOP__DEDIPASS_EXPLAIN_CONFIG_URL_2') ?> :</b> <?= $this->Html->url('/shop/payment/dedipass_ipn', true) ?></p>
                </div>

                <form action="<?= $this->Html->url(array('action' => 'dedipass_config')) ?>" data-ajax="true">

                  <div class="form-group">
                    <label><?= $Lang->get('SHOP__DEDIPASS_PUBLICKEY') ?></label>
                    <input type="text" class="form-control" name="publicKey" placeholder="Ex: 4e2009e88d5c5587302e996de5fe1f47"<?= (isset($dedipassConfig['DedipassConfig']['public_key'])) ? ' value="'.$dedipassConfig['DedipassConfig']['public_key'].'"' : '' ?>>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                  </div>

                </form>

                <hr>

                <h3><?= $Lang->get('SHOP__DEDIPASS_HISTORIES') ?></h3>

                <table class="table table-bordered dataTable" id="histories_dedipass">
                  <thead>
                    <tr>
                      <th><?= $Lang->get('SHOP__DEDIPASS_CODE') ?></th>
                      <th><?= $Lang->get('SHOP__DEDIPASS_RATE') ?></th>
                      <th><?= $Lang->get('USER__USERNAME') ?></th>
                      <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                      <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <script type="text/javascript">
                $(document).ready(function() {
                  $('#histories_dedipass').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    'searching': true,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "<?= $this->Html->url(array('action' => 'get_dedipass_histories')) ?>",
                    "aoColumns": [
                        {mData:"DedipassHistory.code"},
                        {mData:"DedipassHistory.rate"},
                        {mData:"User.pseudo"},
                        {mData:"DedipassHistory.credits_gived"},
                        {mData:"DedipassHistory.created"}
                    ],
                  });
                });
                </script>

              </div>

              <div class="tab-pane" id="tab_points_transfer">

                <h3>
                    <?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HISTORIES', array('{MONEY_NAME}' => $Configuration->getMoneyName())) ?>
                    <a href="<?= $this->Html->url(array('action' => 'toggle_transfer')) ?>" class="btn btn-<?= ($transferStatus) ? 'danger' : 'success' ?> pull-right"><?= ($transferStatus) ? $Lang->get('GLOBAL__DISABLE') : $Lang->get('GLOBAL__ENABLE') ?></a>
                </h3>

                <br>

                <table class="table table-bordered dataTable" id="histories_points_transfer">
                  <thead>
                  <tr>
                    <th>Pseudo</th>
                    <th><?= ucfirst($Configuration->getMoneyName()) ?></th>
                    <th><?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?></th>
                    <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <script type="text/javascript">
              $(document).ready(function() {
                $('#histories_points_transfer').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": false,
                  "info": false,
                  "autoWidth": false,
                  'searching': true,
                  "bProcessing": true,
                  "bServerSide": true,
                  "sAjaxSource": "<?= $this->Html->url(array('action' => 'get_points_transfer')) ?>",
                  "aoColumns": [
                      {mData:"Author.pseudo"},
                      {mData:"PointsTransferHistory.points"},
                      {mData:"User.pseudo"},
                      {mData:"PointsTransferHistory.created"}
                  ],
                });
              });
              </script>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>
