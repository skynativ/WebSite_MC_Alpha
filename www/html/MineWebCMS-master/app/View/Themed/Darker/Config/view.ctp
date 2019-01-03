<?php
$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));

if(isset($config['logo']) && $config['logo']) {
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
              <div class="col-md-12" style="margin-top:10px;">
                  <div class="col-md-2" style="background: #BA2323;padding: 10px 20px 20px 20px;color:#fff;min-height:125px;text-align:center;border-radius: 3px 0px 0px 3px;">
                      <h3><b>Darker</b></h3>
                      <h5 style="color:#fff;"><a href="http://orphevs.fr" style="color:#fff;"><i class="fa fa-code"></i> Développé par Orphevs</a></h5>
                  </div>
                  <div class="col-md-10" style="background: #8d1b1b;padding: 10px 10px 20px 20px;color: #fff;margin-bottom:30px;min-height:125px;border-radius: 0px 3px 3px 0px;">
                  </div>
                </div>
              
              
              
              

            <div class="col-md-4">
              <?= $this->element('form.input.upload.img', $form_input) ?>
                
                <div class="form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title"><b><?= $Lang->get('THEME__FAVICON_URL') ?>
                              <button type="button" data-toggle="tooltip" data-placement="right" title="Le favicon est l'icône situé dans l'onglet du navigateur"><i class="fa fa-question-circle"></i></button></b></h3>
                      </div>
                      <div class="panel-body">
                        <input type="text" class="form-control" name="favicon_url" value="<?= $config['favicon_url'] ?>">
                      </div>
                    </div>
                    <label></label>
                </div>
                
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title"><b>Support<button type="button" data-toggle="tooltip" data-placement="right" title="Si vous avez besoin d'aide avec ce thème alors contactez-moi sur Discord" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                    <iframe src="https://discordapp.com/widget?id=316532971903385601&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
                  </div>
                </div>
                                
            </div>

            <div class="col-md-8">                          
                
                <div class="form-group">
                    
                <!-- IP du serveur -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b>IP du serveur <button type="button" data-toggle="tooltip" data-placement="right" title="Modifie l'IP qui sera affichée sur le thème" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                            
                            <label style="margin-top:20px;">Utilisez-vous un launcher ?</label>
                            <select name="launcher_global" class="form-control">
                            <option value="true"<?= ($config['launcher_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['launcher_global'] == "false") ? ' selected' : '' ?>>Non</option>
                            </select>
                            <div class="page-header"></div>
                            <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?> <!-- l'utilisateur a un launcher -->
                      
                                <p style="margin-top:20px;">Texte sur la barre d'utilisateur</p>
                                <textarea class="form-control" id="launcher_texte" name="launcher_texte" cols="1" rows="1"><?= $config['launcher_texte']; ?></textarea>
                      
                                <p style="margin-top:20px;">Lien de téléchargement du launcher</p>
                                <textarea class="form-control" id="launcher_url" name="launcher_url" cols="1" rows="1"><?= $config['launcher_url']; ?></textarea>
                      
                                <label style="margin-top:20px;">Afficher le launcher dans la barre d'utilisateur</label>
                                <select name="launcher_userbar" class="form-control">
                                <option value="true"<?= ($config['launcher_userbar'] == "true") ? ' selected' : '' ?>>Oui</option>
                                <option value="false"<?= ($config['launcher_userbar'] == "false") ? ' selected' : '' ?>>Non</option>
                                </select>

                                <label style="margin-top:20px;">Afficher le bouton du launcher sur le Slider</label>
                                <select name="launcher_slider" class="form-control">
                                <option value="true"<?= ($config['launcher_slider'] == "true") ? ' selected' : '' ?>>Oui</option>
                                <option value="false"<?= ($config['launcher_slider'] == "false") ? ' selected' : '' ?>>Non</option>
                                </select>    
                                
                      
                            <?php } else { ?> <!-- Si l'utilisateur n'a pas de launcher -->
                      
                                <p style="margin-top:20px;">IP du serveur</p>
                                <textarea class="form-control" id="ip" name="ip" cols="1" rows="1"><?= $config['ip']; ?></textarea>

                                <label style="margin-top:20px;">Afficher l'IP dans la barre d'utilisateur</label>
                                <select name="userbar_ip" class="form-control">
                                <option value="true"<?= ($config['userbar_ip'] == "true") ? ' selected' : '' ?>>Oui</option>
                                <option value="false"<?= ($config['userbar_ip'] == "false") ? ' selected' : '' ?>>Non</option>
                                </select>

                                <label style="margin-top:20px;">Afficher le bouton "Copier l'IP" sur le Slider</label>
                                <select name="slider_ip" class="form-control">
                                <option value="true"<?= ($config['slider_ip'] == "true") ? ' selected' : '' ?>>Oui</option>
                                <option value="false"<?= ($config['slider_ip'] == "false") ? ' selected' : '' ?>>Non</option>
                                </select>          
                      
                            <?php } ?>
                      
                           
                  </div>
                </div>
                    
                <!-- Video Youtube -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b>Panneau Youtube <button type="button" data-toggle="tooltip" data-placement="right" title="Modifie la vidéo Youtube affichée sur l'accueil" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                        <label style="margin-top:20px;">Activer le panneau Youtube</label>
                        <select name="youtube_global" class="form-control">
                            <option value="true"<?= ($config['youtube_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['youtube_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                        <?php if(!isset($theme_config['youtube_global']) || $theme_config['youtube_global'] == "true") { ?>
                            <p style="margin-top:20px;">ID de la vidéo Youtube (dans l'URL après le : watch?v=)</p>
                            <textarea class="form-control" id="youtube-id" name="youtube-id" cols="1" rows="1"><?= $config['youtube-id']; ?></textarea>
                      <?php } ?>
                  </div>
                </div>
                
                <?php if($EyPlugin->isInstalled('eywek.vote')){ ?>
              <!-- Panneau Vote -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b>Panneau Voter<button type="button" data-toggle="tooltip" data-placement="right" title="Affiche un panneau sur l'accueil qui permet aux visiteurs de voter pour votre serveur et d'être récompensé" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                    <label style="margin-top:20px;">Activer le panneau Vote</label>
                        <select name="vote_global" class="form-control">
                            <option value="true"<?= ($config['vote_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['vote_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                      <?php if(!isset($theme_config['vote_global']) || $theme_config['vote_global'] == "true") { ?>
                            <p style="margin-top:20px;">Texte du panneau</p>
                            <textarea class="form-control" id="vote_texte" name="vote_texte" cols="3" rows="3"><?= $config['vote_texte']; ?></textarea>
                      
                            <p style="margin-top:20px;">URL de l'image d'illustration (200x200)</p>
                            <textarea class="form-control" id="vote_img" name="vote_img" cols="1" rows="1"><?= $config['vote_img']; ?></textarea>
                      <?php } ?>
                  </div>
                </div>
              <?php } ?>
                
                    
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b>Dernières Nouveautées<button type="button" data-toggle="tooltip" data-placement="right" title="Permet de modifier l'affichage des actualitées sur l'accueil du site" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                    <label style="margin-top:20px;">Activer les News</label>
                        <select name="news_global" class="form-control">
                            <option value="true"<?= ($config['news_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['news_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                      <div class="page-header"></div>
                      <?php if(!isset($theme_config['news_global']) || $theme_config['news_global'] == "true") { ?>
                            <p style="margin-top:20px;">Nombres de caractères des News</p>
                            <textarea class="form-control" id="news_caractere" name="news_caractere" cols="1" rows="1"><?= $config['news_caractere']; ?></textarea>
                      
                            <p style="margin-top:20px;">Afficher les commentaires sur la page d'accueil ?</p>
                            <select name="news_commentaires" class="form-control">
                            <option value="true"<?= ($config['news_commentaires'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['news_commentaires'] == "false") ? ' selected' : '' ?>>Non</option>
                            </select>
                            
                            <p style="margin-top:20px;">Afficher les likes sur la page d'accueil ?</p>
                            <select name="news_likes" class="form-control">
                            <option value="true"<?= ($config['news_likes'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['news_likes'] == "false") ? ' selected' : '' ?>>Non</option>
                            </select>
                      <?php } ?>
                  </div>
                </div>
            
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title"><b>Réseaux sociaux <button type="button" data-toggle="tooltip" data-placement="right" title="Affiche les boutons pour rejoindre vos réseaux sociaux" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                    <label style="margin-top:20px;">Activer les réseaux sociaux</label>
                        <select name="social_global" class="form-control">                            
                            <option value="true"<?= ($config['social_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['social_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                      <div class="page-header"></div>
                      <?php if(!isset($theme_config['social_global']) || $theme_config['social_global'] == "true") { ?>
                            <p style="margin-top:20px;">Afficher les réseaux sociaux dans le Footer ?</p>
                            <select name="social_footer" class="form-control">
                            <option value="true"<?= ($config['social_footer'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['social_footer'] == "false") ? ' selected' : '' ?>>Non</option>
                            </select>
                        
                            <div class="page-header"></div>
                      
                            <p style="margin-top:20px;">
                                Laissez le champ texte vide si vous voulez cacher le bouton.
                            </p>
                            <div class="page-header"></div>
                            <p style="margin-top:20px;">
                                Discord
                            </p>
                            <textarea class="form-control" id="social_discord" name="social_discord" cols="1" rows="1"><?= $config['social_discord']; ?></textarea>
                            <p style="margin-top:20px;">
                                Facebook
                            </p>
                            <textarea class="form-control" id="social_facebook" name="social_facebook" cols="1" rows="1"><?= $config['social_facebook']; ?></textarea>
                            <p style="margin-top:20px;">
                                Twitter
                            </p>
                            <textarea class="form-control" id="social_twitter" name="social_twitter" cols="1" rows="1"><?= $config['social_twitter']; ?></textarea>
                            <p style="margin-top:20px;">
                                Youtube
                            </p>
                            <textarea class="form-control" id="social_youtube" name="social_youtube" cols="1" rows="1"><?= $config['social_youtube']; ?></textarea>
                            <p style="margin-top:20px;">
                                Google+
                            </p>
                            <textarea class="form-control" id="social_googleplus" name="social_googleplus" cols="1" rows="1"><?= $config['social_googleplus']; ?></textarea>
                            <p style="margin-top:20px;">
                                Pinterest
                            </p>
                            <textarea class="form-control" id="social_pinterest" name="social_pinterest" cols="1" rows="1"><?= $config['social_pinterest']; ?></textarea>
                            <p style="margin-top:20px;">
                                Snapchat
                            </p>
                            <textarea class="form-control" id="social_snapchat" name="social_snapchat" cols="1" rows="1"><?= $config['social_snapchat']; ?></textarea>
                            <p style="margin-top:20px;">
                                Instagram
                            </p>
                            <textarea class="form-control" id="social_instagram" name="social_instagram" cols="1" rows="1"><?= $config['social_instagram']; ?></textarea>
                            <p style="margin-top:20px;">
                                Twitch
                            </p>
                            <textarea class="form-control" id="social_twitch" name="social_twitch" cols="1" rows="1"><?= $config['social_twitch']; ?></textarea>
                            <p style="margin-top:20px;">
                                Steam
                            </p>
                            <textarea class="form-control" id="social_steam" name="social_steam" cols="1" rows="1"><?= $config['social_steam']; ?></textarea>
                        <?php } ?>
                  </div>
                </div>
            
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title"><b>Slider <button type="button" data-toggle="tooltip" data-placement="right" title="Affiche les images qui défilent sur l'accueil" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                    <label style="margin-top:20px;">Activer le Slider</label>
                        <select name="slider" class="form-control">
                            <option value="true"<?= ($config['slider'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['slider'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                  </div>
                </div>
                    
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title"><b>
                          <?php if(isset($theme_config['theme-color']) && $theme_config['theme-color']) { ?>
                          <i class="fa fa-square" style="color: <?= $theme_config['theme-color'] ?>;margin-right:5px;"></i>
                          <?php } else { ?>
                          <i class="fa fa-square" style="color: #BA2323;margin-right:5px;"></i>
                          <?php } ?>
                          Couleur du thème <button type="button" data-toggle="tooltip" data-placement="right" title="Permet de modifier la couleur dominante du thème" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">                    
                     
                        <?= $this->Html->script('admin/colorpicker') ?>
                      

                      <div class="col-md-12">
                          <label>Couleur secondaire :</label>
                          <input type="text" value="<?= $theme_config['theme-color'] ?>" name="theme-color" class="form-control theme-color" id="theme-color">
                      </div>
                            
                                                
                            <script type="text/javascript" src="jqColorPicker.min.js"></script>
                            <script type="text/javascript">
                                $('.theme-color').colorPicker();
                            </script>
                      
                      
                      </div>
                  </div>
                </div>
                    
                <!-- Modifier CSS -->
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><b>Votre code CSS<button type="button" data-toggle="tooltip" data-placement="right" title="Si vous avez du code CSS à ajouter, entrez-le ici." style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                  </div>
                  <div class="panel-body">
                      
                    <textarea class="form-control" id="css_custom" name="css_custom" cols="3" rows="10"><?= $config['css_custom']; ?></textarea>

                  </div>
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

<?= $this->Html->script('admin/tinymce/tinymce.min.js'); ?>
 <script type="text/javascript">
        $(".spoiler-trigger").click(function() {
            $(this).parent().next().collapse('toggle');
        });
    </script>


