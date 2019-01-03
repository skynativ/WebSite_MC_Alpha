<br>
<div id="heading-breadcrumbs">
    <?= $this->element('flash') ?>
    <div id="content" class="clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12 clearfix" id="customer-account">
				
					<?= $Module->loadModules('user_profile_messages') ?>
					
                    <div class="well" style="background-color: #fff;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Détails personnels</h3>
                        </div>
                        <div class="panel-body">
                            <div class="box no-mb">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?= $Lang->get('USER__USERNAME') ?></label>
                                                <input type="text" class="form-control" value="<?= $user['pseudo'] ?>"
                                                       disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?= $Lang->get('USER__EMAIL') ?></label>
                                            <input type="text" class="form-control" value="<?= $user['email'] ?>"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?= $Lang->get('USER__RANK') ?></label>
                                                <?php foreach ($available_ranks as $key => $value) {
                                                    if ($user['rank'] == $key) {
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
                                            <label><?= $Lang->get('GLOBAL__CREATED') ?></label>
                                                <input type="text" class="form-control"
                                                       value="<?= $Lang->date($user['created']) ?>" disabled>
                                        </div>
                                    </div>
                                    <?php if ($EyPlugin->isInstalled('eywek.shop')) { ?>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><?= ($isConnected) ? $money.' '.$Configuration->getMoneyName() : $Lang->get('SHOP__TITLE'); ?></label>
                                                <input type="text" class="form-control" value="<?= $user['money'] ?>"
                                                       disabled>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="well" style="background-color: #fff;">
						<?= $Module->loadModules('user_profile') ?>
					</div>
					
					<?php if($EyPlugin->isInstalled('empiredev.codecadeau')) { ?>
						<div class="well" style="background-color: #fff;">
							<div class="panel-heading">
								<h3 class="panel-title"><?= $Lang->get('CCADEAU__TITLE') ?></h3>
							</div>
							<div class="panel-body">
								<h4><?= $Lang->get('CCADEAU__HELP'); ?></h4>
								<form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => 'CodeCadeau', 'controller' => 'Code', 'action' => 'claim_code')) ?>">
									<div class="ajax-msg"></div>
									<label><?= $Lang->get("CCADEAU__EXEMPLE_CODE"); ?></label>
									<input class="form-control" type="text" name="code_cadeau"><br />
									<button class="btn btn-primary"><?= $Lang->get("CCADEAU__CLAIM_BTN"); ?></button>
								</form>
							</div>
						</div>
					<?php } ?>

					<?php if($EyPlugin->isInstalled('eywek.twofactorauth')) { ?>
						<div class="well" style="background-color: #fff;">
							<div class="panel-heading">
								<h3 class="panel-title">Double Authentification</h3>
							</div>
							<div class="panel-body">
								<div class="box no-mb">
										<div class="row">
											<div class="col-md-8 col-sm-8"><!-- left text -->
												<h4>Voulez-vous <span id="twoFactorAuthStatusInfos"><?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? 'désactiver' : 'activer' ?></span> la <strong>double authentification</strong> ?</h4>
												<p>
												  Cette fonctionnalité vous permet plus de sécurité sur votre compte site.
												  <br><a href="<?= $theme_config['url_da']; ?>">En savoir plus</a>.
												</p>
											</div><!-- /left text -->
											<div class="col-md-4 col-sm-4 text-right"><!-- right btn -->
												<a id="toggleTwoFactorAuth" data-status="<?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? '1' : '0' ?>" class="btn btn-<?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? 'danger' : 'success' ?> btn-lg"><?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? 'Désactiver' : 'Activer' ?></a>
											</div><!-- /right btn -->
										</div>
									<div id="twoFactorAuthValid" class="text-center" style="display: none;">
										<img src="" id="two-factor-auth-qrcode" alt="" />
										  <p>
											<small class="text-muted">Secret: <em id="two-factor-auth-secret"></em></small>
										  </p>

										<form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => 'TwoFactorAuth', 'admin' => false, 'controller' => 'UserLogin', 'action' => 'validEnable')) ?>" data-callback-function="afterValidQrCode">
											<div class="ajax-msg"></div>
											<div class="form-group text-center">
												<label><?= $Lang->get('TWOFACTORAUTH__LOGIN_CODE') ?></label>
												<div class="col-md-6" style="margin: 0 auto;float: none;">
												  <input type="text" class="form-control" name="code" placeholder="<?= $Lang->get('TWOFACTORAUTH__LOGIN_CODE_PLACEHOLDER') ?>">
												</div>
											</div>
											<button type="submit" class="btn btn-success"><?= $Lang->get('TWOFACTORAUTH__VALID_CODE') ?></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

                    <div class="well" style="background-color: #fff;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $Lang->get('USER__UPDATE_PASSWORD') ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="box no-mb">
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
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php if ($Permissions->can('EDIT_HIS_EMAIL')) { ?>
                        <div class="well" style="background-color: #fff;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $Lang->get('USER__UPDATE_EMAIL') ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="box no-mb">
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
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($EyPlugin->isInstalled('eywek.shop')) { ?>
                        <div class="well" style="background-color: #fff;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="box no-mb">
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
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($Configuration->getKey('mineguard') == "true") { ?>
                        <div class="well" style="background-color: #fff;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $Lang->get('API__MINEGUARD_LABEL') ?></h3>
                            </div>
                            <div class="panel-body">
                                <p class="lead" style="font-size:14px;">
                                    Qu'est-ce que c'est ? C'est une protection qui permet une connexion au serveur minecraft depuis votre compte seulement avec les IPs affichés ci-dessous.
                                    Vous pouvez ajouter une ip ou en retirer une pour que celle-ci accède à votre compte.
                                </p>
                                <div class="row">
                                    <form method="post" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'api', 'action' => 'add_ip')) ?>" data-callback-function="addIP">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="ip" placeholder="<?= $Lang->get('IP') ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button style="float: right" type="submit" class="btn btn-block btn-success"><?= $Lang->get('GLOBAL__ADD') ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th><?= $Lang->get('IP') ?></th>
                                                <th><?= $Lang->get('GLOBAL__ACTIONS') ?></th>
                                            </tr>
                                            </thead>
                                            <tbody id="table-ip">
                                            <?php
                                            foreach ($api as $key => $value) { ?>
                                                <tr id="<?= $key ?>">
                                                    <th><?= $value ?></th>
                                                    <th>
                                                        <button data-ip-id="<?= $key ?>"
                                                                class="btn btn-danger delete_ip"><?= $Lang->get('GLOBAL__DELETE') ?></button>
                                                    </th>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="row">
                    <div class="col-md-6">
                        <?php if ($can_skin) { ?>
                            <div class="well" style="background-color: #fff;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= $Lang->get('API__SKIN_LABEL') ?></h3>
                                </div>
                                <div class="panel-upload">
                                    <div class="row">
                                        <form class="form-inline" method="post" id="skin" method="post" data-ajax="true"
                                              data-upload-image="true"
                                              action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-success" onclick="$('#choose').click();"
                                                           value="Séléctionner votre skin"/>
                                                    <input name="image" id="choose" class="btn btn-success" type="file"
                                                           style="visibility:hidden">
                                                </div>
                                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row-panel">
                                                <div class="form-group">
                                                    <button style="float: right" type="submit"
                                                            class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                        <?php if ($can_cape) { ?>
                            <div class="well" style="background-color: #fff;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= $Lang->get('API__CAPE_LABEL') ?></h3>
                                </div>
                                <div class="panel-upload">
                                    <div class="row">
                                        <form class="form-inline" method="post" id="cape" method="post" data-ajax="true"
                                              data-upload-image="true"
                                              action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <input type="button" class="btn btn-success" onclick="$('#choose').click();"
                                                           value="Séléctionner votre cape"/>
                                                    <input name="image" id="choose" class="btn btn-success" type="file"
                                                           style="visibility:hidden">
                                                </div>
                                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row-panel">
                                                <div class="form-group">
                                                    <button style="float: right" type="submit"
                                                            class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
					
					<?php if($shop_active) { ?>
						<div class="well" style="background-color: #fff;">
							<h3 class="text-center"><?= $Lang->get('SHOP__HISTORY_PURCHASES') ?></h3>
							<table class="table table-bordered" id="users">
								<thead>
									<tr>
										<th><?= $Lang->get('DASHBOARD__PURCHASES') ?> ID</th>
										<th><?= $Lang->get('GLOBAL__CREATED') ?></th>
										<th><?= $Lang->get('SHOP__ITEM_PRICE') ?></th>
										<th class="right"><?= $Lang->get('SHOP__ITEMS') ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
								foreach ($histories as $value) { ?>
									<tr>
										<td><?= $value["ItemsBuyHistory"]["id"] ?></td>
										<td><?= $value["ItemsBuyHistory"]["created"] ?></td>
										<td><?= $value["Item"]["price"] ?></td>
										<td><?= $value["Item"]["name"] ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					<?php } ?>
					</br>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        <?php if($Configuration->getKey('mineguard') == "true") { ?>

        function enableMineGuard() {
            var inputs = {};
            inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
            $.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'enable_mineguard')) ?>", inputs, function (data) {
                if (data.statut) {
                    $('.ajax-msg-mineguard').empty().html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><i class="icon icon-exclamation"></i> <b><?= $Lang->get('GLOBAL__SUCCESS') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
                } else {
                    $('.ajax-msg-mineguard').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('GLOBAL__ERROR') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
                }
            });
        }

        function disableMineGuard() {
            var inputs = {};
            inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
            $.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'disable_mineguard')) ?>", inputs, function (data) {
                if (data.statut) {
                    $('.ajax-msg-mineguard').empty().html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><i class="icon icon-exclamation"></i> <b><?= $Lang->get('GLOBAL__SUCCESS') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
                    $('#table-ip').empty();
                } else {
                    $('.ajax-msg-mineguard').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('GLOBAL__ERROR') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
                }
            });
        }

        function addIP(data, response) {
            $('#table-ip').append('<tr><th>' + data['ip'] + '</th></tr>');
        }

        $(".delete_ip").click(function (event) {
            event.preventDefault();
            var inputs = {};
            inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
            inputs['ip'] = $(this).attr('data-ip-id');
            $.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'delete_ip')) ?>", inputs, function (data) {
                if (data.statut) {
                    $('#' + inputs['ip']).fadeOut(500);
                } else {
                    $('.ajax-msg-ip').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('GLOBAL__ERROR') ?> :</b> ' + data2[0] + '</i></div>').fadeIn(500);
                }
            });
        });
        <?php } ?>
    </script>

	<script type="text/javascript">
          $('#toggleTwoFactorAuth').on('click', function (e) {
            e.preventDefault()
            var btn = $(this)
            var status = parseInt(btn.attr('data-status'))

            // disable
            btn.html('<i class="fa fa-refresh fa-spin"></i>').addClass('disabled')

            // request to server
            if (!status) { // enable
              $.get('<?= $this->Html->url(array('controller' => 'UserLogin', 'action' => 'generateSecret', 'plugin' => 'TwoFactorAuth')) ?>', function (data) {
                // add qrcode
                $('#two-factor-auth-qrcode').attr('src', data.qrcode_url)
                $('#two-factor-auth-secret').html(data.secret)
                // edit display
                $('#twoFactorAuthStatus').slideUp(150)
                $('#twoFactorAuthValid').slideDown(150)
              })
            } else { // disable
              $.get('<?= $this->Html->url(array('controller' => 'UserLogin', 'action' => 'disable', 'plugin' => 'TwoFactorAuth')) ?>', function (data) {
                // edit display
                $('#toggleTwoFactorAuth').html('Activer').removeClass('disabled').removeClass('btn-danger').addClass('btn-success').attr('data-status', 0)
                $('#twoFactorAuthStatusInfos').html('activer')
              })
            }
          })
          function afterValidQrCode(req, res) {
            // edit display
            $('#toggleTwoFactorAuth').html('Désactiver').removeClass('disabled').removeClass('btn-success').addClass('btn-danger').attr('data-status', 1)
            $('#twoFactorAuthStatusInfos').html('désactiver')
            $('#twoFactorAuthValid').slideUp(150)
            $('#twoFactorAuthStatus').slideDown(150)
          }
    </script>
	