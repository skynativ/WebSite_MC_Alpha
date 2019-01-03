<div class="col-md-12">
	<div class="panel panel-default">
	<div class="panel-heading"> <img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $user['pseudo'] ?>/16" title="<?= $user['pseudo'] ?>">
</div>
		<div class="panel-body">
			<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<?= $Module->loadModules('user_profile_messages') ?>
							<div class="section">
								<p><b><?= $Lang->get('USER__EMAIL') ?> :</b> <span id="email"><?= $user['email'] ?></span></p>
							</div>
							<div class="section">
								<p>
									<b><?= $Lang->get('USER__RANK') ?> :</b>
									<?php foreach ($available_ranks as $key => $value) {
										if($user['rank'] == $key) {
											echo $value;
										}
									} ?>
								</p>
							</div>
							<div class="section">
								<p><b><?= $Lang->get('IP') ?> :</b> <?= $user['ip'] ?></p>
							</div>
							<div class="section">
								<p><b><?= $Lang->get('GLOBAL__CREATED') ?> :</b> <?= $Lang->date($user['created']) ?></p>
							</div>
					  </div>
						<div class="col-md-6">
							<!-- Boutique -->
							<?php if($EyPlugin->isInstalled('eywek.shop')) { ?>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Boutique</div>
									<div class="panel-body"><?= $user['money'] ?><?= ($user['money'] == 1) ?  ' '.$Configuration->getMoneyName(false) : ' '.$Configuration->getMoneyName(); ?></div>
								</div>
							</div>
							<?php } ?>
							<!-- Vote -->
							<?php if($EyPlugin->isInstalled('eywek.vote')) { ?>
							<div class="col-md-6">
								<div class="panel panel-default">
								<div class="panel-heading">Votes</div>
								<div class="panel-body"><?= $user['vote'] ?> <?= $Lang->get('VOTE__TITLE_ACTION') ?></div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-md-12">
						<h3 class="title-profile"><?= $Lang->get('USER__UPDATE_PASSWORD') ?></h3>

						<form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">
							<div class="section password input" style="margin-bottom:15px;">
								<input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM') ?>">
							</div>
							<div class="section password input" style="margin-bottom:15px;">
								<input type="password" class="form-control" name="password_confirmation" placeholder="<?= $Lang->get('USER__PASSWORD') ?>">
							</div>

							<div class="clearfix"></div>

							<center><button class="btn-green button" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button></center>
						</form>

						<?php if($Permissions->can('EDIT_HIS_EMAIL')) { ?>
							<hr>

							<h3 class="title-profile"><?= $Lang->get('USER__UPDATE_EMAIL') ?></h3>

							<form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">
								<div class="section password input" style="margin-bottom:15px;">
									<input type="email" class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?>">
								</div>
								<div class="section password input" style="margin-bottom:15px;">
									<input type="email" class="form-control" name="email_confirmation" placeholder="<?= $Lang->get('USER__EMAIL') ?>">
								</div>

								<div class="clearfix"></div>

								<center><button class="btn-green button" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button></center>
							</form>
						<?php } ?>

						<?php if($shop_active) { ?>

							<hr>

							<h3 class="title-profile"><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>

							<form method="post" data-ajax="true" action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">
								<div class="section password input" style="margin-bottom:15px;">
									<input type="text" class="form-control" name="to" placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?>">
								</div>
								<div class="section password input" style="margin-bottom:15px;">
									<input type="text" class="form-control" name="how" placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?>">
								</div>

								<div class="clearfix"></div>

								<center><button class="btn-blue button" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button></center>
							</form>

						<?php } ?>

						<?php if($Configuration->getKey('mineguard') == "true") { ?>

							<hr>

							<h3 class="title-profile"><?= $Lang->get('API__MINEGUARD_LABEL') ?></h3>

							<p><?= $Lang->get('API__MINEGUARD_EXPLAIN') ?></p>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-8">
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
														<th><button data-ip-id="<?= $key ?>" class="btn-blue-small button"><?= $Lang->get('GLOBAL__DELETE') ?></button></th>
													</tr>
												<?php } ?>
											</tbody>

										</table>
									</div>

									<div class="col-md-4">
										<form method="post" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'api', 'action' => 'add_ip')) ?>" data-callback-function="addIP">
											<div class="form-group">
												<input type="text" class="form-control" name="ip" placeholder="<?= $Lang->get('IP') ?>">
											</div>

											<div class="form-group">
												<button class="btn-green-small button"><?= $Lang->get('GLOBAL__ADD') ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="ajax-msg-mineguard"></div>
								<?php if($user['allowed_ip'] == '0') { ?>
									<button onClick="enableMineGuard();" class="btn-green button"><?= $Lang->get('GLOBAL__ENABLE') ?></button>
								<?php } else { ?>
									<button onClick="disableMineGuard();" class="btn-blue button"><?= $Lang->get('GLOBAL__DISABLE') ?></button>
								<?php } ?>
							</div>
						<?php } ?>

						<?php if($can_skin) { ?>
							<hr>

							<h3 class="title-profile"><?= $Lang->get('API__SKIN_LABEL') ?></h3>

							<form class="form-inline" id="skin" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
								<div class="form-group">
									<label><?= $Lang->get('FORM__BROWSE') ?></label>
									<input name="image" type="file">
								</div>
								<input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
								<button type="submit" class="btn-blue-small button"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
								<div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="form-group">
									<u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

												- <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
												- <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?><br>
												- <?= str_replace('{PIXELS}', $skin_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
								</div>
							</form>
						<?php } ?>

						<?php if($can_cape) { ?>
							<hr>

							<h3 class="title-profile"><?= $Lang->get('API__CAPE_LABEL') ?></h3>

							<form class="form-inline" method="post" id="cape" method="post" data-ajax="true" data-upload-image="true" action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
								<div class="form-group">
									<label><?= $Lang->get('FORM__BROWSE') ?></label>
									<input name="image" type="file">
								</div>
								<input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
								<button type="submit" class="btn-blue-small button"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
								<div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="form-group">
									<u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

												- <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
												- <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX')) ?><br>
												- <?= str_replace('{PIXELS}', $cape_height_max, $Lang->get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
								</div>
							</form>
						<?php } ?>
						<?= $Module->loadModules('user_profile') ?>
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
			$.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'enable_mineguard')) ?>", inputs, function(data) {
				if(data.statut) {
					$('.ajax-msg-mineguard').empty().html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><i class="icon icon-exclamation"></i> <b><?= $Lang->get('GLOBAL__SUCCESS') ?> :</b> '+data.msg+'</i></div>').fadeIn(500);
				} else  {
					$('.ajax-msg-mineguard').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('GLOBAL__ERROR') ?> :</b> '+data.msg+'</i></div>').fadeIn(500);
				}
			});
		}

		function disableMineGuard() {
			var inputs = {};
			inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
			$.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'disable_mineguard')) ?>", inputs, function(data) {
				if(data.statut) {
					$('.ajax-msg-mineguard').empty().html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><i class="icon icon-exclamation"></i> <b><?= $Lang->get('GLOBAL__SUCCESS') ?> :</b> '+data.msg+'</i></div>').fadeIn(500);
					$('#table-ip').empty();
				} else {
					$('.ajax-msg-mineguard').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('GLOBAL__ERROR') ?> :</b> '+data.msg+'</i></div>').fadeIn(500);
				}
			});
		}

		function addIP(data, response) {
			$('#table-ip').append('<tr><th>'+data['ip']+'</th></tr>');
		}

		$(".delete_ip").click(function( event ) {
			event.preventDefault();
			var inputs = {};
			inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
			inputs['ip'] = $(this).attr('data-ip-id');
			$.post("<?= $this->Html->url(array('controller' => 'api', 'action' => 'delete_ip')) ?>", inputs, function(data) {
				if(data.statut) {
					$('#'+inputs['ip']).fadeOut(500);
				} else {
					$('.ajax-msg-ip').empty().html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><i class="icon icon-warning-sign"></i> <b><?= $Lang->get('GLOBAL__ERROR') ?> :</b> '+data2[0]+'</i></div>').fadeIn(500);
				}
			});
		});

	<?php } ?>
</script>
