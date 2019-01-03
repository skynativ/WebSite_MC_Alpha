<?php
	$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));
	
	if (isset($config['logo']) && $config['logo']) {
		$logo = explode('/', $config['logo']);
		$form_input['img'] = 'uploads/' . end($logo);
		$form_input['filename'] = 'theme_logo';
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
                            <div class="form-group">
                                <div class="checkbox">
                                    <input type="checkbox" name="slider" id="slider"<?= (isset($config['slider']) && $config['slider'] == 'true') ? ' checked' : '' ?>>
                                    <label for="slider"><?= $Lang->get('SLIDER__TITLE') ?></label>
                                </div>
                            </div>

                            <script>
                                $('#slider').change(function () {
                                    if ($('#slider').is(':checked')) {
                                        $('#slider').attr('value', 'true');
                                    } else {
                                        $('#slider').attr('value', 'false');
                                    }
                                });
                                if ($('#slider').is(':checked')) {
                                    $('#slider').attr('value', 'true');
                                } else {
                                    $('#slider').attr('value', 'false');
                                }
                            </script>

                            <div class="form-group">
                                <label><?= $Lang->get('THEME__FAVICON_URL') ?></label>
                                <input type="text" class="form-control" name="favicon_url" value="<?= $config['favicon_url'] ?>" />
                            </div>

                        </div>

                        <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                            <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>