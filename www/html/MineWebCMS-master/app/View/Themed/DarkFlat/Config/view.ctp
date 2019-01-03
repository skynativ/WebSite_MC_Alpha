<section class="content">
    <!-- Admin -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get('THEME__CUSTOMIZATION') ?></h3><span class="pull-right">Thème par Qually86</span>
                </div>
                <div class="box-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Options principales</a></li>
                            <li><a href="#tab2" data-toggle="tab">Sidebar</a></li>
                        </ul>
                        <form method="post" enctype="multipart/form-data" data-ajax="false">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <br>
                                    <div class="form-group">
                                        <label>Options principales</label>
                                        <table class="table">
                                            <tr>
                                                <td>Nom du site</td>
                                                <td><i>Par defaut : #</i></td>
                                                <td><input type="text" class="form-control" name="name_site" value="<?= $theme_config['name_site'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Description du site</td>
                                                <td><i>Par defaut : #</i></td>
                                                <td><input type="text" class="form-control" name="desc_site" value="<?= $theme_config['desc_site'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Lien image du site</td>
                                                <td><i>Par defaut : #</i></td>
                                                <td><input type="text" class="form-control" name="image_site" value="<?= $theme_config['image_site'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Bannière</td>
                                                <td><i>Par defaut : #</i></td>
                                                <td><input type="text" class="form-control" name="banner" value="<?= $theme_config['banner'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Logo</td>
                                                <td><i>Par defaut : #</i></td>
                                                <td><input type="text" class="form-control" name="logo_site" value="<?= $theme_config['logo_site'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Twitter (pour le référencement)</td>
                                                <td><i>Par defaut : @username</i></td>
                                                <td><input type="text" class="form-control" name="twitter" value="<?= $theme_config['twitter'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Favicon</td>
                                                <td><i>Par defaut : #</i></td>
                                                <td><input type="text" class="form-control" name="favicon_url" value="<?= $theme_config['favicon_url'] ?>"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <!-- Section 2 -->
                                <div class="tab-pane" id="tab2">
                                    <br>

                                    <div class="form-group">
                                        <label>Sidebar</label>

                                        <table class="table">

                                            <tr>
                                                <td>Personnalisation Widget 1</td>
                                                <td><input type="text" class="form-control" placeholder="titre" name="modif_title1" value="<?= $theme_config['modif_title1'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="fa fa-" name="modif_fa1" value="<?= $theme_config['modif_fa1'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="description" name="modif_desc1" value="<?= $theme_config['modif_desc1'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Personnalisation Widget 2</td>
                                                <td><input type="text" class="form-control" placeholder="titre" name="modif_title2" value="<?= $theme_config['modif_title2'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="fa fa-" name="modif_fa2" value="<?= $theme_config['modif_fa2'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="description" name="modif_desc2" value="<?= $theme_config['modif_desc2'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Personnalisation Widget 3</td>
                                                <td><input type="text" class="form-control" placeholder="titre" name="modif_title3" value="<?= $theme_config['modif_title3'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="fa fa-" name="modif_fa3" value="<?= $theme_config['modif_fa3'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="description" name="modif_desc3" value="<?= $theme_config['modif_desc3'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Personnalisation Widget 4</td>
                                                <td><input type="text" class="form-control" placeholder="titre" name="modif_title4" value="<?= $theme_config['modif_title4'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="fa fa-" name="modif_fa4" value="<?= $theme_config['modif_fa4'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="description" name="modif_desc4" value="<?= $theme_config['modif_desc4'] ?>"></td>
                                            </tr>

                                            <tr>
                                                <td>IP du serveur</td>
                                                <td>
                                                    <input type="text" class="form-control" name="config_ip" value="<?= $theme_config['config_ip'] ?>">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden"> <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button> <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-defaut"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>