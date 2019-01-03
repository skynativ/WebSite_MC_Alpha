<?php
	$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));
	
	if (isset($config['logo']) && $config['logo']) {
		$form_input['img'] = $config['logo'];
		$form_input['filename'] = 'theme_logo.png';
	}
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get('THEME__CUSTOMIZATION') ?></h3>
                </div>
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" data-ajax="false">
                        <div class="col-md-4">
							<?= $this->element('form.input.upload.img', $form_input) ?>
                        </div>
                        <div class="col-md-8">
							
							<?php if ($EyPlugin->isInstalled('eywek.vote')) { ?>
                                <!-- Panel Vote sidebar -->
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input type="checkbox" name="sidebar-vote"
                                               id="sidebar-vote"<?= (isset($config['sidebar-vote']) && $config['sidebar-vote'] == 'true') ? ' checked' : '' ?>>
                                        <label>Panneau "Vote" dans la Sidebar</label>
                                    </div>
                                </div>

                                <script>
                                    $('#sidebar-vote').change(function () {
                                        if ($('#sidebar-vote').is(':checked')) {
                                            $('#sidebar-vote').attr('value', 'true');
                                        } else {
                                            $('#sidebar-vote').attr('value', 'false');
                                        }
                                    });
                                    if ($('#sidebar-vote').is(':checked')) {
                                        $('#sidebar-vote').attr('value', 'true');
                                    } else {
                                        $('#sidebar-vote').attr('value', 'false');
                                    }
                                </script>
							<?php } ?>


                            <div class="form-group">
                                <div class="checkbox">
                                    <input type="checkbox" name="status" id="status" <?= (isset($config['status']) && $config['status'] == 'true') ? ' checked' : '' ?>>
                                    <label for="status">Statut du serveur amélioré</label>
                                </div>
                            </div>
                            
                            <div class="form-group" id="ip" <?= ($config['status'] != 'true' ? '' : 'style="display:none"') ?>>
                                <label for="ip">IP affichée</label>
                                <input id="ip" type="text" class="form-control" name="ip" value="<?= $config['ip'] ?>">
                            </div>
                            
                            <div class="form-group" id="img_fond">
                                <label for="background">URL de l'image du menu hors index</label>
                                <input id="background" type="text" class="form-control" name="img_fond" value="<?= $config['img_fond'] ?>">
                            </div>
                            
                            <script>
                                $(document).ready(function () {
                                    if ($('#status').is(':checked')) {
                                        $('#status').attr('value', 'true');
                                        $('#ip').show();
                                    } else {
                                        $('#status').attr('value', 'false');
                                        $('#ip').hide();
                                    }
                                    $('#status').change(function () {
                                        if ($('#status').is(':checked')) {
                                            $('#status').attr('value', 'true');
                                            $('#ip').slideDown();
                                        } else {
                                            $('#status').attr('value', 'false');
                                            $('#ip').slideUp();
                                        }
                                    });
                                });
                            </script>

                            <div class="form-group">
                                <label for="favicon"><?= $Lang->get('THEME__FAVICON_URL') ?></label>
                                <input id="favicon" type="text" class="form-control" name="favicon_url" value="<?= $config['favicon_url'] ?>" />
                            </div>
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                            
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                            <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>