<!-- 

    Nom : css-custom.ctp
    Version : 1.0.0
    Description : Cet élément sert à ajouter du code CSS personnalisé sur le site via un champs texte

-->


<?php if(isset($theme_config['css_custom']) && $theme_config['css_custom']) { ?>

<style>
    <?php echo $theme_config['css_custom'] ?>

</style>


<?php } else { ?>
<?php } ?>


<!--

    Module de configuration :


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><b>Votre code CSS<button type="button" data-toggle="tooltip" data-placement="right" title="Si vous avez du code CSS à ajouter, entrez-le ici." style="margin-left:5px;"><i class="fa fa-question-circle"></i></button></b></h3>
    </div>
    <div class="panel-body">

        <textarea class="form-control" id="css_custom" name="css_custom" cols="3" rows="10"><*?= $config['css_custom']; ?></textarea>

    </div>
</div>
-->
