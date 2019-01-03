<?php
$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));

if(isset($config['logo']) && $config['logo']) {
  //$logo = explode('/', $config['logo']);
  //$form_input['img'] = '/img/uploads/theme_logo.png';
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

            <div class="row">
              <div class="col-md-4">
                <?= $this->element('form.input.upload.img', $form_input) ?>
              </div>
              <div class="col-md-8">

                <div class="form-group">
                  <label>Couleur du thème</label>
                  <select name="theme" class="form-control">
                    <option value="blue"<?= ($theme_config['theme'] == "blue") ? ' selected' : '' ?>>Bleu</option>
                    <option value="default"<?= ($theme_config['theme'] == "default") ? ' selected' : '' ?>>Bleu clair</option>
                    <option value="green"<?= ($theme_config['theme'] == "green") ? ' selected' : '' ?>>Vert</option>
                    <option value="marsala"<?= ($theme_config['theme'] == "marsala") ? ' selected' : '' ?>>Maron</option>
                    <option value="pink"<?= ($theme_config['theme'] == "pink") ? ' selected' : '' ?>>Violet</option>
                    <option value="red"<?= ($theme_config['theme'] == "red") ? ' selected' : '' ?>>Rouge</option>
                    <option value="turquoise"<?= ($theme_config['theme'] == "turquoise") ? ' selected' : '' ?>>Turquoise</option>
                    <option value="violet"<?= ($theme_config['theme'] == "violet") ? ' selected' : '' ?>>Violet</option>
                  </select>
                </div>

                <div class="form-group">
                  <label><?= $Lang->get('THEME__FAVICON_URL') ?></label>
                  <input type="text" class="form-control" name="favicon_url" value="<?= $config['favicon_url'] ?>">
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12">

                <h3>Fonctionnalités sur la page d'accueil</h3>

                <div id="features">
                  <?php
                  $i = 0;
                  $count = count($theme_config['homepage_features']);
                  foreach ($theme_config['homepage_features'] as $feature) {

                    echo '<div id="feature-'.$i.'">';

                      echo '<button style="color:#a94442;" type="button" class="btn btn-link pull-right delete-feature" data-id="'.$i.'">Supprimer</button>';

                      echo '<div class="form-group">';
                        echo '<label>Titre</label>';
                        echo '<input type="text" class="form-control" name="homepage_features['.$i.'][title]" value="'.$feature->title.'">';
                      echo '</div>';

                      echo '<div class="form-group">';
                        echo '<label>Icône <small><a href="http://fontawesome.io/icons/">Liste des icônes disponibles</a></small></label>';
                        echo '<div class="input-group">';
                          echo '<span class="input-group-addon">fa fa-</span>';
                          echo '<input type="text" class="form-control" name="homepage_features['.$i.'][icon]" value="'.$feature->icon.'">';
                        echo '</div>';
                      echo '</div>';

                      echo '<div class="form-group">';
                        echo '<label>Message</label>';
                        echo '<input type="text" class="form-control" name="homepage_features['.$i.'][message]" value="'.$feature->message.'">';
                      echo '</div>';

                    echo '</div>';

                    if($i+1 != $count) {
                      echo '<hr>';
                    }

                    $i++;

                  }
                  ?>
                </div>

                <button type="button" data-i="<?= $count-1 ?>" id="addFeature" class="btn btn-success">Ajouter une fonctionnalitée</button>

                <hr>

                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">

                <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>

              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $('#addFeature').on('click', function(e) {
    e.preventDefault();

    var i = $(this).attr('data-i');
    i = parseInt(i) + 1;

    var append = '<hr>';

    append += '<div id="feature-'+i+'">';

      append += '<button style="color:#a94442;" type="button" class="btn btn-link pull-right delete-feature" data-id="'+i+'">Supprimer</button>';

      append += '<div class="form-group">';
        append += '<label>Titre</label>';
        append += '<input type="text" class="form-control" name="homepage_features['+i+'][title]">';
      append += '</div>';

      append += '<div class="form-group">';
        append += '<label>Icône <small><a href="http://fontawesome.io/icons/">Liste des icônes disponibles</a></small></label>';
        append += '<div class="input-group">';
          append += '<span class="input-group-addon">fa fa-</span>';
          append += '<input type="text" class="form-control" name="homepage_features['+i+'][icon]">';
        append += '</div>';
      append += '</div>';

      append += '<div class="form-group">';
        append += '<label>Message</label>';
        append += '<input type="text" class="form-control" name="homepage_features['+i+'][message]">';
      append += '</div>';

    append += '</div>';

    $('#features').append(append);
    $(this).attr('data-i', i);

    deleteFeature();

  });

  function deleteFeature() {
    $('.delete-feature').unbind('click');
    $('.delete-feature').on('click', function(e) {
      e.preventDefault();

      var id = $(this).attr('data-id');
      var el = $('#feature-'+id);

      $(el).slideUp(150, function() {
        $(this).remove();
      });
    })
  }

  deleteFeature();
</script>
