<div class="push-nav"></div>
<div class="container bg">
    <div class="row">

        <div class="col-md-12">
            <div class="ribbon">
                <div class="ribbon-stitches-top"></div>
                <div class="ribbon-content"><p>
						<?php if ($EyPlugin->isInstalled('eywek.shop')) { ?>
                            <span class="pull-left hidden-xs"><span class="info"><span class="money"><?= $user['money'] ?></span><?= ($user['money'] == 1) ? ' ' . $Configuration->getMoneyName(false) : ' ' . $Configuration->getMoneyName(); ?></span></span>
						<?php } ?>
                        <span class="text-center pseudo-user"><?= $user['pseudo'] ?></span>
						<?php if ($EyPlugin->isInstalled('eywek.vote')) { ?>
                            <span class="pull-right hidden-xs"><span
                                        class="info"><?= $user['vote'] ?> <?= $Lang->get('VOTE__TITLE_ACTION') ?></span></span>
						<?php } elseif ($EyPlugin->isInstalled('eywek.shop')) { ?>
                            <a href="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index')) ?>"
                               class="btn btn-primary pull-right"><?= $Lang->get('SHOP__TITLE') ?></a>
						<?php } ?>
                    </p></div>
                <div class="ribbon-stitches-bottom"></div>
            </div>
            <div class="profile-content">
				<?= $Module->loadModules('user_profile_messages') ?>
				
				<?= $Module->loadModules('user_profile') ?>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-spec" style="margin-top:0;">
                <div class="col-md-4">
                    <div class="title-spec"><?= $Lang->get('USER__UPDATE_PASSWORD') ?></div>

                    <form method="post" data-ajax="true"
                          action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">
                        <div class="section_form password input">
                            <input type="password" class="form-control" name="password"
                                   placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM') ?>">
                        </div>
                        <div class="section_form password input">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="<?= $Lang->get('USER__PASSWORD') ?>">
                        </div>

                        <div class="clearfix"></div>

                        <button class="btn btn-primary" style="font-size:14px;"
                                type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                    </form>
                </div>
				<?php if ($Permissions->can('EDIT_HIS_EMAIL')) { ?>
                    <div class="col-md-4">
                        <div class="title-spec"><?= $Lang->get('USER__UPDATE_EMAIL') ?></div>
                        <form method="post" data-ajax="true"
                              action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">
                            <div class="section_form password input">
                                <input type="email" class="form-control" name="email"
                                       placeholder="<?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?>">
                            </div>
                            <div class="section_form password input">
                                <input type="email" class="form-control" name="email_confirmation"
                                       placeholder="<?= $Lang->get('USER__EMAIL') ?>">
                            </div>

                            <div class="clearfix"></div>

                            <button class="btn btn-primary" style="font-size:14px;"
                                    type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        </form>
                    </div>
				<?php }
					if ($shop_active) { ?>
                        <div class="col-md-4">
                            <div class="title-spec"><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></div>

                            <form method="post" data-ajax="true"
                                  action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">
                                <div class="section_form password input">
                                    <input type="text" class="form-control" name="to"
                                           placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?>">
                                </div>
                                <div class="section_form password input">
                                    <input type="text" class="form-control" name="how"
                                           placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?>">
                                </div>

                                <div class="clearfix"></div>

                                <button class="btn btn-primary" style="font-size:14px;"
                                        type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                            </form>
                        </div>
					<?php }
					if ($can_skin) { ?>
            </div>
            <div class="box-spec">
                <div class="col-md-4">
                    <div class="title-spec"><?= $Lang->get('API__SKIN_LABEL') ?></div>

                    <form class="form-inline" id="skin" method="post" data-ajax="true" data-upload-image="true"
                          action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
                        <div class="form-group">
                            <label><?= $Lang->get('FORM__BROWSE') ?></label>
                            <input name="image" type="file">
                        </div>
                        <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                        <button type="submit" class="btn btn-default"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="form-group" style="margin-top:10px;">
                            <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

                            - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
                            - <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?>
                            <br>
                            - <?= str_replace('{PIXELS}', $skin_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?>
                            <br>
                        </div>
                    </form>
                </div>
				<?php } ?>
				
				<?php if ($can_cape) { ?>
                    <div class="col-md-4">
                        <div class="title-spec"><?= $Lang->get('API__CAPE_LABEL') ?></div>

                        <form class="form-inline" method="post" id="cape" method="post" data-ajax="true"
                              data-upload-image="true"
                              action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
                            <div class="form-group">
                                <label><?= $Lang->get('FORM__BROWSE') ?></label>
                                <input name="image" type="file">
                            </div>
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                            <button type="submit" class="btn btn-default"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                            <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="form-group" style="margin-top:10px;">
                                <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

                                - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
                                - <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?>
                                <br>
                                - <?= str_replace('{PIXELS}', $cape_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?>
                                <br>
                            </div>
                        </form>
                    </div>
				<?php } ?>
                <div class="col-md-4">
                    <div class="title-spec">
                        Informations
                    </div>
                    <div class="section">
                        <b><?= $Lang->get('USER__USERNAME') ?> :</b> <?= $user['pseudo'] ?>
                    </div>
                    <div class="section">
                        <b><?= $Lang->get('USER__EMAIL') ?> :</b> <span id="email"><?= $user['email'] ?></span>
                    </div>
                    <div class="section">

                        <b><?= $Lang->get('USER__RANK') ?> :</b>
						<?php foreach ($available_ranks as $key => $value) {
							if ($user['rank'] == $key) {
								echo $value;
							}
						} ?>

                    </div>
					<?php if ($EyPlugin->isInstalled('eywek.shop.1')) { ?>
                        <div class="section">
                            <b><?= $Lang->get('USER__MONEY') ?> :</b> <span class="money"><?= $user['money'] ?></span>
                        </div>
					<?php } ?>

                    <div class="section">
                        <b><?= $Lang->get('IP') ?> :</b> <?= $user['ip'] ?>
                    </div>

                    <div class="section">
                        <b><?= $Lang->get('GLOBAL__CREATED') ?> :</b> <?= $Lang->date($user['created']) ?>
                    </div>
                </div>
            </div>
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
