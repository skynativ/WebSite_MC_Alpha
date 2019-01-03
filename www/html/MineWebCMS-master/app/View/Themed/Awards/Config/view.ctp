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
           
            <div class="jumbotron">
                <h1>Awards</h1>
                <p>Thème conçu par <a href="https://twitter.com/orphevs" target="_blank">Orphevs</a></p>
                <br><br>
                <p>
                    <a class="btn btn-success" href="http://awards.orph.fr/" target="_blank" role="button">Version Live</a>
                    <a class="btn btn-primary" href="https://mineweb.org/market/theme/Awards" target="_blank" role="button">Page boutique</a>
                </p>
            </div>
            
            <form method="post" enctype="multipart/form-data" data-ajax="false">
            
                <div class="col-md-12">
                    <div class="buttons-final" style="display: inline-block; float: right; margin: 15px 50px;">
                        <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                        <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                    </div>
                </div>

            <ul class="nav nav-tabs" style="margin-bottom: 30px;">
                <li class="nav-item nav-link-1 active">
                    <a class="nav-link" style="cursor: pointer;">General</a>
                </li>
                <li class="nav-item nav-link-2">
                    <a class="nav-link" style="cursor: pointer;">Accueil</a>
                </li>
                <li class="nav-item nav-link-3">
                    <a class="nav-link" style="cursor: pointer;">Footer</a>
                </li>
                <li class="nav-item nav-link-4">
                    <a class="nav-link" style="cursor: pointer;">Options avancées</a>
                </li>
                <li class="nav-item nav-link-5">
                    <a class="nav-link" style="cursor: pointer;">Support</a>
                </li>
            </ul>
            
            <div class="opt-general">
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
                                <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?> 
                                <!-- l'utilisateur a un launcher -->

                                <?php } else { ?> 
                                <!-- Si l'utilisateur n'a pas de launcher -->
                                <p style="margin-top:20px;">IP du serveur</p>
                                <input type="text" value="<?= $config['ip_global']; ?>" name="ip_global" class="form-control">
        

                                <?php } ?>


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
                                        <label>Couleur principale :</label>
                                        <input type="text" value="<?= $theme_config['theme-color'] ?>" name="theme-color" class="form-control theme-color" id="theme-color">
                                    </div>


                                    <script type="text/javascript" src="jqColorPicker.min.js"></script>
                                    <script type="text/javascript">
                                        $('.theme-color, .video-color').colorPicker();
                                    </script>


                                </div>
                            </div>
                        </div>
                    </div> 

            </div>            
            </div>
            <div class="opt-accueil">
                <!-- Header -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Header <button type="button" data-toggle="tooltip" data-placement="right" title="Modifie le header de la page d'accueil" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">
                        <label style="margin-top:20px;">Activer le Header</label>
                        <select name="header_global" class="form-control">
                            <option value="true"<?= ($config['header_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['header_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                        <?php if(!isset($theme_config['header_global']) || $theme_config['header_global'] == "true") { ?>
                            <div class="page-header"></div>
                            
                            <p style="margin-top:20px;">Texte d'accueil</p>
                            <input type="text" value="<?= $config['header-welcome']; ?>" name="header-welcome" class="form-control">
                            
                            <p style="margin-top:20px;">ID de la vidéo Youtube (dans l'URL après le : watch?v=)</p>
                            <textarea class="form-control" id="video-id" name="video-id" cols="1" rows="1"><?= $config['video-id']; ?></textarea>
                            
                            <p style="margin-top:20px;">Couleur du header</p>
                            <input type="text" value="<?= $theme_config['video-color'] ?>" name="video-color" class="form-control video-color" id="video-color">
                            
                            <p style="margin-top:20px;">Texte du bouton dans le Header</p>
                            <input type="text" value="<?= $config['header-text']; ?>" name="header-text" class="form-control header-text" id="header-text">
                            
                            <?php if(!isset($theme_config['launcher_global']) || $theme_config['launcher_global'] == "true") { ?> 
                            <!-- l'utilisateur a un launcher -->

                            <p style="margin-top:20px;">Lien du bouton dans le Header</p>
                            <input type="text" value="<?= $config['header-link']; ?>" name="header-link" class="form-control header-link" id="header-link">



                            <?php } else { ?> 
                            <!-- Si l'utilisateur n'a pas de launcher -->


                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- Only Header ? -->
                <?php if(!isset($theme_config['header_global']) || $theme_config['header_global'] == "true") { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Afficher seulement le Header ?<button type="button" data-toggle="tooltip" data-placement="right" title="Souhaitez-vous afficher uniquement le Header sur la page d'accueil ?" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">
                        <select name="header-only" class="form-control">
                            <option value="true"<?= ($config['header-only'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['header-only'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                    </div>
                </div>
                <?php } else { ?>
                <?php } ?>
                
                <?php if(!isset($theme_config['header-only']) || $theme_config['header-only'] == "true") { ?>
                <?php } else { ?>
                <!-- News -->
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
                        <h3 class="panel-title"><b>Panneau Slider <button type="button" data-toggle="tooltip" data-placement="right" title="Affiche les images qui défilent sur l'accueil" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">
                        <label style="margin-top:20px;">Activer le Slider</label>
                        <select name="slider" class="form-control">
                            <option value="true"<?= ($config['slider'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['slider'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                    
                    <?php if(!isset($theme_config['slider']) || $theme_config['slider'] == "true") { ?>
                        <div class="page-header"></div>
                        <p style="margin-top:20px;">
                            <b>Pour modifier le Slider rendez-vous dans :</b> Général > Slider
                        </p>
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
                        <h3 class="panel-title"><b>Panneau Réseaux sociaux <button type="button" data-toggle="tooltip" data-placement="right" title="Affiche les boutons pour rejoindre vos réseaux sociaux" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">
                        <label style="margin-top:20px;">Activer les réseaux sociaux</label>
                        <select name="social_global" class="form-control">                            
                            <option value="true"<?= ($config['social_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['social_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>                
                        <?php if(!isset($theme_config['social_global']) || $theme_config['social_global'] == "true") { ?>
                        <div class="page-header"></div>

                        <p style="margin-top:20px;">
                            <b>Pour modifier les boutons rendez-vous dans :</b> Général > Préférences Générales > Préférences sociales
                        </p>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Panneau Discord <button type="button" data-toggle="tooltip" data-placement="right" title="Affiche votre Discord dans la sidebar" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">
                        <label style="margin-top:20px;">Afficher le Discord</label>
                        <select name="discord_global" class="form-control">                            
                            <option value="true"<?= ($config['discord_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['discord_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>                
                        <?php if(!isset($theme_config['discord_global']) || $theme_config['discord_global'] == "true") { ?>
                        <div class="page-header"></div>

                        <p style="margin-top:20px;">ID du serveur Discord</p>
                        <input type="text" value="<?= $config['discord_id']; ?>" name="discord_id" class="form-control">
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>  
            </div>
            <div class="opt-footer">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Afficher le Footer<button type="button" data-toggle="tooltip" data-placement="right" title="Afficher le Footer sur votre site" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">
                        <select name="footer_global" class="form-control">
                            <option value="true"<?= ($config['footer_global'] == "true") ? ' selected' : '' ?>>Oui</option>
                            <option value="false"<?= ($config['footer_global'] == "false") ? ' selected' : '' ?>>Non</option>
                        </select>
                    </div>
                </div>
                <?php if(!isset($theme_config['footer_global']) || $theme_config['footer_global'] == "true") { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Panneau Informations<button type="button" data-toggle="tooltip" data-placement="right" title="Modifier le panneau Informations" style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                        </div>
                        <div class="panel-body">
                            <p style="margin-top:20px;">Texte du panneau</p>
                            <textarea class="form-control" id="footer_texte" name="footer_texte" cols="3" rows="3"><?= $config['footer_texte']; ?></textarea>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="opt-optionsavancees">
                <!-- Modifier CSS -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Votre code CSS<button type="button" data-toggle="tooltip" data-placement="right" title="Si vous avez du code CSS à ajouter, entrez-le ici." style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
                    </div>
                    <div class="panel-body">

                        <textarea class="form-control" id="css_custom" name="css_custom" cols="3" rows="10"><?= $config['css_custom']; ?></textarea>

                    </div>
                </div>
            </div>
            <div class="opt-support">
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Support</b></h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                <b>Si vous avez un problème avec le thème n'hésitez pas à me contacter sur ce Discord :</b>
                                
                                <div>
                                    <a href="https://discord.gg/kGxTGP6" target="_blank" class="btn btn-success btn-lg" style="display: inline-block; margin: 20px 0px;">Rejoindre mon Discord</a>
                                </div>
                                
                                <b>ATTENTION :</b> Si vous rencontrez un problème avec MineWeb et non pas avec mon thème merci de ne pas me contacter, rendez-vous sur le Discord officiel de Mineweb et dirigez-vous vers le salon Support
                                
                                <div>
                                <a href="https://discord.gg/6NAVWGH" target="_blank" class="btn btn-primary btn-lg" style="display: inline-block; margin: 20px 0px;">Rejoindre le Discord de MineWeb</a>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <iframe src="https://discordapp.com/widget?id=316532971903385601&theme=dark" width="100%" height="800" allowtransparency="true" frameborder="0"></iframe>
                </div>           
            </div>
            
            <div class="buttons-final" style="display: inline-block; float: right; margin: 50px;">
                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                <button class="btn btn-primary btn-lg" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default btn-lg"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
            </div>         
            </form>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
    var onglet1 = document.querySelector('.nav-link-1');
    var onglet2 = document.querySelector('.nav-link-2');
    var onglet3 = document.querySelector('.nav-link-3');
    var onglet4 = document.querySelector('.nav-link-4');
    var onglet5 = document.querySelector('.nav-link-5');
    
    var optGeneral = document.querySelector('.opt-general');
    var optAccueil = document.querySelector('.opt-accueil');
    var optFooter = document.querySelector('.opt-footer');
    var optOptionsavancees = document.querySelector('.opt-optionsavancees');
    var optSupport = document.querySelector('.opt-support');

    var ongletIndex = 1;
    
    ongletChange();    
    containChange();

    onglet1.addEventListener('click', function(){
        ongletIndex = 1;
        ongletChange();
        containChange();
    });
    onglet2.addEventListener('click', function(){
        ongletIndex = 2;
        ongletChange();
        containChange();
    });
    onglet3.addEventListener('click', function(){
        ongletIndex = 3;
        ongletChange();
        containChange();
    });
    onglet4.addEventListener('click', function(){
        ongletIndex = 4;
        ongletChange();
        containChange();
    });
    onglet5.addEventListener('click', function(){
        ongletIndex = 5;
        ongletChange();
        containChange();
    });


    function ongletChange(){
        if(ongletIndex == 1){
            onglet1.classList.add('active');
            onglet2.classList.remove('active');
            onglet3.classList.remove('active');
            onglet4.classList.remove('active');
            onglet5.classList.remove('active');
        }
        else if(ongletIndex == 2){
            onglet1.classList.remove('active');
            onglet2.classList.add('active');
            onglet3.classList.remove('active');
            onglet4.classList.remove('active');
            onglet5.classList.remove('active');
        }
        else if(ongletIndex == 3){
            onglet1.classList.remove('active');
            onglet2.classList.remove('active');
            onglet3.classList.add('active');
            onglet4.classList.remove('active');
            onglet5.classList.remove('active');
        }
        else if(ongletIndex == 4){
            onglet1.classList.remove('active');
            onglet2.classList.remove('active');
            onglet3.classList.remove('active');
            onglet4.classList.add('active');
            onglet5.classList.remove('active');
        }
        else if(ongletIndex == 5){
            onglet1.classList.remove('active');
            onglet2.classList.remove('active');
            onglet3.classList.remove('active');
            onglet4.classList.remove('active');
            onglet5.classList.add('active');
        }
    }
    
    function containChange(){
        if(ongletIndex == 1){
            optGeneral.style.display = 'block';
            optAccueil.style.display = 'none';
            optFooter.style.display = 'none';
            optOptionsavancees.style.display = 'none';
            optSupport.style.display = 'none';
        }
        else if(ongletIndex == 2){
            optGeneral.style.display = 'none';
            optAccueil.style.display = 'block';
            optFooter.style.display = 'none';
            optOptionsavancees.style.display = 'none';
            optSupport.style.display = 'none';
        }
        else if(ongletIndex == 3){
            optGeneral.style.display = 'none';
            optAccueil.style.display = 'none';
            optFooter.style.display = 'block';
            optOptionsavancees.style.display = 'none';
            optSupport.style.display = 'none';
        }
        else if(ongletIndex == 4){
            optGeneral.style.display = 'none';
            optAccueil.style.display = 'none';
            optFooter.style.display = 'none';
            optOptionsavancees.style.display = 'block';
            optSupport.style.display = 'none';
        }
        else if(ongletIndex == 5){
            optGeneral.style.display = 'none';
            optAccueil.style.display = 'none';
            optFooter.style.display = 'none';
            optOptionsavancees.style.display = 'none';
            optSupport.style.display = 'block';
        }
    }
</script>


<?= $this->Html->script('admin/tinymce/tinymce.min.js'); ?>
 <script type="text/javascript">
        $(".spoiler-trigger").click(function() {
            $(this).parent().next().collapse('toggle');
        });
    </script>

