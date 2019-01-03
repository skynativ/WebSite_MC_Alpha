<?php
$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));
if(isset($config['logo']) && $config['logo']) {
    $form_input['img'] = $config['logo'];
    $form_input['filename'] = 'theme_logo.png';
}
echo $this->Html->script('admin/tinymce/tinymce.min.js');
?>

<section class="content">
	<div class="col-md-4">
        <div class="callout callout-danger" style="border: none;"><h4>Lien des vidéos youtube</h4>Veuillez utiliser les liens youtube comme ceci: https://www.youtube.com/embed/ITbAs0tW6yM</div>
    </div>
	<div class="col-md-4">
        <div class="callout callout-danger" style="border: none;"><h4>Lien des images youtube</h4>Veuillez utiliser ce site pour faire vos miniature de video: https://youtubethumbnail.com/</div>
    </div>
    <div class="row">
        <form method="post" enctype="multipart/form-data" data-ajax="false">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_accueil" data-toggle="tab">Accueil</a></li>
						<li><a href="#rab_infobox" data-toggle="tab">InfoBox</a></li>
                        <li><a href="#tab_footer" data-toggle="tab">Footer</a></li>
                        <li><a href="#tab_other" data-toggle="tab">Autres options</a></li>
                    </ul>
                    <div class="tab-content" style="padding: 15px;">
                        <div class="tab-pane active" id="tab_accueil">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre de news sur l'accueil</label>
                                        <select name="limit_news" class="form-control">
                                            <option value="0" <?= ($theme_config['limit_news'] == "0") ? ' selected' : '' ?>>0</option>
											<option value="1" <?= ($theme_config['limit_news'] == "1") ? ' selected' : '' ?>>1</option>
                                            <option value="2" <?= ($theme_config['limit_news'] == "2") ? ' selected' : '' ?>>2</option>
                                            <option value="3" <?= ($theme_config['limit_news'] == "3") ? ' selected' : '' ?>>3</option>
                                            <option value="4" <?= ($theme_config['limit_news'] == "4") ? ' selected' : '' ?>>4</option>
                                            <option value="5" <?= ($theme_config['limit_news'] == "5") ? ' selected' : '' ?>>5</option>
                                            <option value="6" <?= ($theme_config['limit_news'] == "6") ? ' selected' : '' ?>>6</option>
                                            <option value="7" <?= ($theme_config['limit_news'] == "7") ? ' selected' : '' ?>>7</option>
                                            <option value="8" <?= ($theme_config['limit_news'] == "8") ? ' selected' : '' ?>>8</option>
                                            <option value="9" <?= ($theme_config['limit_news'] == "9") ? ' selected' : '' ?>>9</option>
                                            <option value="10" <?= ($theme_config['limit_news'] == "10") ? ' selected' : '' ?>>10</option>
                                            <option value="999" <?= ($theme_config['limit_news'] == "999") ? ' selected' : '' ?>>Afficher toutes les news</option>
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label>Ip du serveur</label>
                                        <input type="text" class="form-control" name="ip_server" value="<?= $config['ip_server'] ?>">
                                    </div>
									<div class="form-group">
                                        <label><?= $Lang->get('THEME__FAVICON_URL') ?></label>
                                        <input type="text" class="form-control" name="favicon_url" value="<?= $config['favicon_url'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Message dans la banniere #1</label>
                                        <input type="text" class="form-control" name="header_text_1" value="<?= $config['header_text_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Message dans la banniere #2</label>
                                        <input type="text" class="form-control" name="header_text_2" value="<?= $config['header_text_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Message dans la banderole du bas</label>
                                        <input type="text" class="form-control" name="join_server" value="<?= $config['join_server'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL de la banniere</label>
                                        <input type="text" class="form-control" name="header" value="<?= $config['header'] ?>">
                                    </div>
                                </div>
								<div class="col-md-6">
									<?= $this->element('form.input.upload.img', $form_input) ?>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
						
						<div class="tab-pane" id="rab_infobox">
                            <div class="row">
                                <div class="col-md-11">
									<div class="form-group">
                                        <label>Titre</label>
										<p>Entrez le titre de la section</p>
                                        <input type="text" class="form-control" name="section_infobox" value="<?= $config['section_infobox'] ?>">
                                    </div>
                                </div>
								<div class="col-md-2">
									<div class="form-group">
                                        <label>URL de l'image infobox #1</label>
										<p>Entrez l'url de l'image infobox #1</p>
                                        <input type="text" class="form-control" name="url_logo_infobox_1" value="<?= $config['url_logo_infobox_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL de l'image infobox #2</label>
										<p>Entrez l'url de l'image infobox #2</p>
                                        <input type="text" class="form-control" name="url_logo_infobox_2" value="<?= $config['url_logo_infobox_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL de l'image infobox #3</label>
										<p>Entrez l'url de l'image infobox #3</p>
                                        <input type="text" class="form-control" name="url_logo_infobox_3" value="<?= $config['url_logo_infobox_3'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL de l'image infobox #4</label>
										<p>Entrez l'url de l'image infobox #4</p>
                                        <input type="text" class="form-control" name="url_logo_infobox_4" value="<?= $config['url_logo_infobox_4'] ?>">
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label>Titre infobox #1</label>
										<p>Ajouter votre titre</p>
                                        <input type="text" class="form-control" name="titre_infobox_1" value="<?= $config['titre_infobox_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Titre infobox #2</label>
										<p>Ajouter votre titre</p>
                                        <input type="text" class="form-control" name="titre_infobox_2" value="<?= $config['titre_infobox_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Titre infobox #3</label>
										<p>Ajouter votre titre</p>
                                        <input type="text" class="form-control" name="titre_infobox_3" value="<?= $config['titre_infobox_3'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Titre infobox #4</label>
										<p>Ajouter votre titre</p>
                                        <input type="text" class="form-control" name="titre_infobox_4" value="<?= $config['titre_infobox_4'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Contenu infobox #1</label>
										<p>Ajouter votre texte</p>
                                        <textarea class="form-control" rows="1" name="contenu_infobox_1"><?= $config['contenu_infobox_1'] ?></textarea>
                                    </div>
									<div class="form-group">
                                        <label>Contenu infobox #2</label>
										<p>Ajouter votre texte</p>
                                        <textarea class="form-control" rows="1" name="contenu_infobox_2"><?= $config['contenu_infobox_2'] ?></textarea>
                                    </div>
									<div class="form-group">
                                        <label>Contenu infobox #3</label>
										<p>Ajouter votre texte</p>
                                        <textarea class="form-control" rows="1" name="contenu_infobox_3"><?= $config['contenu_infobox_3'] ?></textarea>
                                    </div>
									<div class="form-group">
                                        <label>Contenu infobox #4</label>
										<p>Ajouter votre texte</p>
                                        <textarea class="form-control" rows="1" name="contenu_infobox_4"><?= $config['contenu_infobox_4'] ?></textarea>
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label>URL infobox #1</label>
										<p>Ajouter l'url du bouton</p>
                                        <input type="text" class="form-control" name="url_infobox_1" value="<?= $config['url_infobox_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL infobox #2</label>
										<p>Ajouter l'url du bouton</p>
                                        <input type="text" class="form-control" name="url_infobox_2" value="<?= $config['url_infobox_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL infobox #3</label>
										<p>Ajouter l'url du bouton</p>
                                        <input type="text" class="form-control" name="url_infobox_3" value="<?= $config['url_infobox_3'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>URL infobox #4</label>
										<p>Ajouter l'url du bouton</p>
                                        <input type="text" class="form-control" name="url_infobox_4" value="<?= $config['url_infobox_4'] ?>">
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label>Bouton infobox #1</label>
										<p>Ajouter le texte du bouton</p>
                                        <input type="text" class="form-control" name="bouton_infobox_1" value="<?= $config['bouton_infobox_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Bouton infobox #2</label>
										<p>Ajouter le texte du bouton</p>
                                        <input type="text" class="form-control" name="bouton_infobox_2" value="<?= $config['bouton_infobox_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Bouton infobox #3</label>
										<p>Ajouter le texte du bouton</p>
                                        <input type="text" class="form-control" name="bouton_infobox_3" value="<?= $config['bouton_infobox_3'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Bouton infobox #4</label>
										<p>Ajouter le texte du bouton</p>
                                        <input type="text" class="form-control" name="bouton_infobox_4" value="<?= $config['bouton_infobox_4'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
						
                        <div class="tab-pane" id="tab_footer">
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
                                        <label>Description</label>
										<p>Décrivez votre serveur en quelques phrases</p>
                                        <textarea class="form-control" rows="3" name="description"><?= $config['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texte du footer</label>
										<p>Ajouter votre texte dans le copyright</p>
                                        <textarea class="form-control" rows="3" name="copyright_text"><?= $config['copyright_text'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_other">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Double Authentification du Profile</label>
										<p>Ajouter l'url du topic forum de la Double Authentification</p>
                                        <input type="text" class="form-control" name="url_da" value="<?= $config['url_da'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Texte récompense top voteur #1</label>
										<p>Ajouter votre texte</p>
                                        <input type="text" class="form-control" name="top_1" value="<?= $config['top_1'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Texte récompense top voteur #3</label>
										<p>Ajouter votre texte</p>
                                        <input type="text" class="form-control" name="top_2" value="<?= $config['top_2'] ?>">
                                    </div>
									<div class="form-group">
                                        <label>Texte récompense top voteur #3</label>
										<p>Ajouter votre texte</p>
                                        <input type="text" class="form-control" name="top_3" value="<?= $config['top_3'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>