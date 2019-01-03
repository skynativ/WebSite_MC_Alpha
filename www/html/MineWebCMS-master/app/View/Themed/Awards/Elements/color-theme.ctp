 <!-- 

    Nom : color-theme.ctp
    Version : 1.0.0
    Description : Cet élément sert à choisir une couleur dominante pour le thème, il changera la couleur des textes, des backgrounds, des borders, des btn, etc...

    Pris en charge :

        - Les textes : .theme-color-text
        - Les Backgrounds : .theme-color-background
        - Les Borders : .theme-color-border
        - Les Boutons : .theme-color-btn
        - Les Decorations : .theme-color-decoration

        Bootstrap :  
            - Les panel-heading
            - Les nav-pills (catégories shop, menu user-profil)

-->


<?php if(isset($theme_config['theme-color']) && $theme_config['theme-color']) { ?>

<style>

/* Theme Color */

.theme-color-text{
    color: <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-background{
    background: <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-border{
    border-color: <?php echo $theme_config['theme-color']; ?> !important;
}
.theme-color-border-bottom{
    border-bottom: solid 5px <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-btn{
    background: <?php echo $theme_config['theme-color']; ?> !important;
}

.theme-color-decoration{
    text-decoration-color: <?php echo $theme_config['theme-color']; ?> !important;
}

.panel-default > .panel-heading {
    background-color: <?php echo $theme_config['theme-color']; ?> !important;
}

.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    background-color: <?php echo $theme_config['theme-color']; ?> !important;
}

.nav-pills > li > a {
    color: <?php echo $theme_config['theme-color']; ?>;
}

</style>

<?php } ?>

<?php if(isset($theme_config['video-color']) && $theme_config['video-color']) { ?>
<style>
    .video-color-background{
        background: <?= $theme_config['video-color'] ?> !important;
    }
</style>
<?php } ?>

<!--

    Module de configuration :

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



-->