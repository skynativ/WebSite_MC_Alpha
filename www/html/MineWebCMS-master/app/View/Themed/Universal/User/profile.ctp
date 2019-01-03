<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1><?= $user['pseudo'] ?></h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb">
          <li><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
          <li><?= $user['pseudo'] ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?= $this->element('flash') ?>
<div id="content" class="clearfix">
  <div class="container">
    <div class="row">

      <div class="col-md-9 clearfix" id="customer-account">

        <div class="box no-mb">
          <div class="heading">
            <h3 class="text-uppercase">Détails personnels</h3>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <labe><?= $Lang->get('USER__USERNAME') ?></label>
                <input type="text" class="form-control" value="<?= $user['pseudo'] ?>" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><?= $Lang->get('USER__EMAIL') ?></label>
                <input type="text" class="form-control" value="<?= $user['email'] ?>" disabled>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <labe><?= $Lang->get('USER__RANK') ?></label>
                  <?php foreach ($available_ranks as $key => $value) {
      							if($user['rank'] == $key) {
      								$rank = $value;
                      break;
      							}
      						} ?>
                <input type="text" class="form-control" value="<?= $rank ?>" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><?= $Lang->get('IP') ?></label>
                <input type="text" class="form-control" value="<?= $user['ip'] ?>" disabled>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <labe><?= $Lang->get('GLOBAL__CREATED') ?></label>
                <input type="text" class="form-control" value="<?= $Lang->date($user['created']) ?>" disabled>
              </div>
            </div>
            <?php if($EyPlugin->isInstalled('eywek.shop.1')) { ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $Lang->get('USER__MONEY') ?></label>
                  <input type="text" class="form-control" value="<?= $user['money'] ?>" disabled>
                </div>
              </div>
            <?php } ?>
          </div>

        </div>

        <div class="box clearfix no-mb">

          <div class="heading">
            <h3 class="text-uppercase"><?= $Lang->get('USER__UPDATE_PASSWORD') ?></h3>
          </div>

          <form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $Lang->get('USER__PASSWORD') ?></label>
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $Lang->get('USER__PASSWORD_CONFIRM') ?></label>
                  <input type="password" class="form-control" name="password_confirmation">
                </div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </div>

          </form>

        </div>

        <?php if($Permissions->can('EDIT_HIS_EMAIL')) { ?>
          <div class="box clearfix no-mb">

            <div class="heading">
              <h3 class="text-uppercase"><?= $Lang->get('USER__UPDATE_EMAIL') ?></h3>
            </div>

            <form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= $Lang->get('USER__EMAIL') ?></label>
                    <input type="email" class="form-control" name="email">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?></label>
                    <input type="email" class="form-control" name="email_confirmation">
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
              </div>

            </form>

          </div>
        <?php } ?>

        <?php if($EyPlugin->isInstalled('eywek.shop.1')) { ?>
          <div class="box clearfix no-mb">

            <div class="heading">
              <h3 class="text-uppercase"><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>
            </div>

            <form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?></label>
                    <input type="text" class="form-control" name="to">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?></label>
                    <input type="text" class="form-control" name="how">
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-template-main"><i class="fa fa-share"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
              </div>

            </form>

          </div>
        <?php } ?>

        <?php if($can_skin) { ?>
          <div class="box clearfix no-mb">

            <div class="heading">
              <h3 class="text-uppercase"><?= $Lang->get('API__SKIN_LABEL') ?></h3>
            </div>

            <p class="lead" style="font-size:16px;">
              <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>
          		- <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
							- <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?><br>
          		- <?= str_replace('{PIXELS}', $skin_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
            </p>

            <form class="form-inline" method="post" id="skin" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
  					  <div class="form-group">
  					    <input name="image" type="file">
  					  </div>
  						<input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
  					  <button type="submit" class="btn btn-template-main"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </form>

          </div>
        <?php } ?>

        <?php if($can_cape) { ?>
          <div class="box clearfix no-mb">

            <div class="heading">
              <h3 class="text-uppercase"><?= $Lang->get('API__CAPE_LABEL') ?></h3>
            </div>

            <p class="lead" style="font-size:16px;">
              <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>
              - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
              - <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?><br>
              - <?= str_replace('{PIXELS}', $cape_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
            </p>

            <form class="form-inline" method="post" id="cape" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
              <div class="form-group">
                <input name="image" type="file">
              </div>
              <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
              <button type="submit" class="btn btn-template-main"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </form>

          </div>
        <?php } ?>


        <?= $Module->loadModules('user_profile') ?>

      </div>
      <!-- /.col-md-9 -->

      <!-- *** LEFT COLUMN END *** -->

      <!-- *** RIGHT COLUMN ***-->

      <div class="col-md-3">

        <div class="panel panel-default sidebar-menu">

          <div class="panel-heading">
              <h3 class="panel-title">Actions</h3>
          </div>

          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li class="active">
                <a href="#"><i class="fa fa-list"></i> <?= $Lang->get('USER__PROFILE') ?></a>
              </li>
              <?php if($EyPlugin->isInstalled('eywek.shop.1')) { ?>
                <li><a href="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index', 'plugin' => 'shop')) ?>"><i class="fa fa-money"></i> <?= $Lang->get('SHOP__ADD_MONEY') ?></a></li>
              <?php } ?>
              <li>
                <a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>"><i class="fa fa-sign-out"></i> <?= $Lang->get('USER__LOGOUT') ?></a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>