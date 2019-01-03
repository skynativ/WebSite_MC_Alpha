<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Mon compte</div>
		<div class="panel-body">
			<div class="col-md-3">
				<center> <img class="img-responsive" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_skin', $user['pseudo'])) ?>">
					<hr> </center>
			</div>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						Informations
					</div>
					<div class="panel-body">
						<?= $Module->loadModules('user_profile_messages') ?>
                        <div class="section">
                            <p><b><?= $Lang->get('USER__USERNAME') ?> :</b>
                                <?= $user['pseudo'] ?>
                            </p>
                        </div>
                        <div class="section">
                            <p><b><?= $Lang->get('USER__EMAIL') ?> :</b> <span id="email"><?= $user['email'] ?></span></p>
                        </div>
                        <div class="section">
                            <p> <b><?= $Lang->get('USER__RANK') ?> :</b>
                                <?php foreach ($available_ranks as $key => $value) {
                                    if($user['rank'] == $key) {
                                        echo $value;
                                    }
                                } ?>
                            </p>
                        </div>
                        <?php if($EyPlugin->isInstalled('eywek.shop')) { ?>
                            <div class="section">
                                <p><b><?= $Lang->get('USER__MONEY') ?> :</b> <span class="money"><?= $user['money'] ?></span></p>
                            </div>
                        <?php } ?>
                        <div class="section">
                            <p><b><?= $Lang->get('IP') ?> :</b>
                                <?= $user['ip'] ?>
                            </p>
                        </div>
                        <div class="section">
                            <p><b><?= $Lang->get('GLOBAL__CREATED') ?> :</b>
                                <?= $Lang->date($user['created']) ?>
                            </p>
                        </div>
                        <hr>
                        <h3><?= $Lang->get('USER__UPDATE_PASSWORD') ?></h3>
                        <form method="post" class="form-inline" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM') ?>"> </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="<?= $Lang->get('USER__PASSWORD') ?>"> </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    <?= $Lang->get('GLOBAL__SUBMIT') ?>
                                </button>
                            </div>
                        </form>
                        <?php if($Permissions->can('EDIT_HIS_EMAIL')) { ?>
                            <hr>
                            <h3><?= $Lang->get('USER__UPDATE_EMAIL') ?></h3>
                            <form method="post" class="form-inline" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?>"> </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_confirmation" placeholder="<?= $Lang->get('USER__EMAIL') ?>"> </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        <?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
                        <?php if($shop_active) { ?>
                            <hr>
                            <h3><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>
                            <form method="post" class="form-inline" data-ajax="true" action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="to" placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?>"> </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="how" placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?>"> </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        <?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
                        <?php if($can_skin) { ?>
                            <hr>
                            <h3><?= $Lang->get('API__SKIN_LABEL') ?></h3>
                            <form class="form-inline" method="post" id="skin" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
                                <div class="form-group">
                                    <label>
                                        <?= $Lang->get('FORM__BROWSE') ?>
                                    </label>
                                    <input name="image" type="file"> </div>
                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                <button type="submit" class="btn btn-default">
                                    <?= $Lang->get('GLOBAL__SUBMIT') ?>
                                </button>
                                <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="form-group"> <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u>
                                    <br> -
                                    <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?>
                                        <br> -
                                        <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?>
                                            <br> -
                                            <?= str_replace('{PIXELS}', $skin_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?>
                                                <br> </div>
                            </form>
                        <?php } ?>
                        <?php if($can_cape) { ?>
                            <hr>
                            <h3><?= $Lang->get('API__CAPE_LABEL') ?></h3>
                            <form class="form-inline" method="post" id="cape" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
                                <div class="form-group">
                                    <label>
                                        <?= $Lang->get('FORM__BROWSE') ?>
                                    </label>
                                    <input name="image" type="file"> </div>
                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                <button type="submit" class="btn btn-default">
                                    <?= $Lang->get('GLOBAL__SUBMIT') ?>
                                </button>
                                <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="form-group"> <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u>
                                    <br> -
                                    <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?>
                                        <br> -
                                        <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?>
                                            <br> -
                                            <?= str_replace('{PIXELS}', $cape_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?>
                                                <br> </div>
                            </form>
                            <?php } ?>
                            <?= $Module->loadModules('user_profile') ?>
					</div>
				</div>
                <?php if($EyPlugin->isInstalled('eywek.shop')) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $Lang->get('SHOP__HISTORY_PURCHASES') ?>
                        </div>
                        <div class="panel-body">
                            <div style="margin-bottom: -1rem;">
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
                        </div>
                    </div>
                <?php } ?>
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
				$('.ajax-msg-mineguard').empty().html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><i class="icon icon-exclamation"></i> <b><?= $Lang->get('
					GLOBAL__SUCCESS ') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
			}
			else {
				$('.ajax-msg-mineguard').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('
					GLOBAL__ERROR ') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
			}
		});
	}

	function disableMineGuard() {
		var inputs = {};
		inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
		$.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'disable_mineguard')) ?>", inputs, function (data) {
			if (data.statut) {
				$('.ajax-msg-mineguard').empty().html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><i class="icon icon-exclamation"></i> <b><?= $Lang->get('
					GLOBAL__SUCCESS ') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
				$('#table-ip').empty();
			}
			else {
				$('.ajax-msg-mineguard').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('
					GLOBAL__ERROR ') ?> :</b> ' + data.msg + '</i></div>').fadeIn(500);
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
			}
			else {
				$('.ajax-msg-ip').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('
					GLOBAL__ERROR ') ?> :</b> ' + data2[0] + '</i></div>').fadeIn(500);
			}
		});
	});
	<?php } ?>
</script>