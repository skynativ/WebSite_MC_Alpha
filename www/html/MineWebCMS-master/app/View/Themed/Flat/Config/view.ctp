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
			 <li><a href="#tab3" data-toggle="tab">Navbar</a></li>
             </ul>
             <form method="post" enctype="multipart/form-data" data-ajax="false">
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <br>
               <div class="form-group">
                 <label>Options principales</label>

                 <table class="table">
                   <tr>
                     <td>Couleur du background</td>
                     <td><i>Par defaut : #dc4f4f</i></td>
                     <td><input type="text" class="form-control" name="color" value="<?= $theme_config['color'] ?>"></td>
                   </tr>
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
                     <td>Favicon</td>
                     <td><i>Par defaut : #</i></td>
                     <td><input type="text" class="form-control" name="favicon_url" value="<?= $theme_config['favicon_url'] ?>"></td>
                   </tr>
                 </table>
               </div>
            </div>
		<div class="tab-pane" id="tab3">	
        <div class="col-md-7">
            <?php
            $snav = ClassRegistry::init('Navbar')->find('all', [
                'order' => 'id desc',
            ]);
            ?>
            <?php foreach ($snav as $key => $value): ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Lien de l'icone navbar #<?= $value['Navbar']['id']; ?> (<?= $value['Navbar']['name'] ?>)</label>
                        <input type="text" class="form-control" name="navi_<?= $value['Navbar']['id']; ?>" value="<?= $config['navi_'.$value['Navbar']['id']] ?>">
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Lien de l'icone navbar #0 (Acceuil)</label>
                    <input type="text" class="form-control" name="navi_home" value="<?= $config['navi_home'] ?>">
                </div>
            </div>


        </div>
		</div>
            <!-- Section 2 -->
            <div class="tab-pane" id="tab2">
              <br>

              <div class="form-group">
                <label>Sidebar</label>

                <table class="table">

                  <tr>
                    <td>Activer la sidebar</td>
                    <td>
                      <select name="sidebar_option" class="form-control">
                         <option value="true"<?= ($config['sidebar_option'] == "true") ? ' selected' : '' ?>>Oui (par defaut)</option>
                         <option value="false"<?= ($config['sidebar_option'] == "false") ? ' selected' : '' ?>>Non</option>
                       </select>
                    </td>
                  </tr>			  
				  <tr>
                    <td>Activer la sidebar</td>
                    <td>
                      <select name="sidebar_option2" class="form-control">
                         <option value="true"<?= ($config['sidebar_option2'] == "true") ? ' selected' : '' ?>>Oui (par defaut)</option>
                         <option value="false"<?= ($config['sidebar_option2'] == "false") ? ' selected' : '' ?>>Non</option>
                       </select>
                    </td>
                  </tr>
				  <tr>
                    <td>Twitter</td>
                    <td>
						<input type="text" class="form-control" name="fa-tw" placeholder="fa fa-" value="<?= $theme_config['fa-tw'] ?>">
                        <input type="text" class="form-control" name="twitter" value="<?= $theme_config['twitter'] ?>" placeholder="Nom du twitter">
                    </td>
                  </tr>
				  <tr>
                    <td>YouTube</td>
                    <td>
                        <input type="text" class="form-control" name="fa-yt" placeholder="fa fa-" value="<?= $theme_config['fa-yt'] ?>">
						<input type="text" class="form-control" name="youtube" value="<?= $theme_config['youtube'] ?>" placeholder="Nom de la chaine">
                    </td>
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
