<div class="form-group">
  <label>Image de fond du Header</label><br>
  <div id="image_preview">
      <div class="thumbnail">
          <span class="file-input btn btn-primary btn-block btn-file"><span class="browse"><?= $Lang->get('FORM__BROWSE') ?>&hellip;</span> <input name="image" type="file" multiple></span>
          <button id="choose_from_uploaded_files" class="btn btn-default btn-block" title="Soon..." disabled><?= $Lang->get('FORM__CHOOSE_FROM_UPLOADED_FILES') ?>&hellip;</button>
          <button id="delete_upload_file" class="btn btn-block btn-danger"><?= $Lang->get('FORM__DELETE_UPLOADED_FILE') ?></button>
          <?= (isset($img)) ? '<img src="'.$img.'" class="pull-left" width="150" style="margin-top:10px;">' : $this->Html->image('bg.png', array('class' => 'pull-left', 'width' => '150', 'style' => 'margin-top:10px;')) ?>
          <div class="caption pull-right">
              <h5><?= (isset($filename)) ? $filename.'<input name="img_edit" value="1" type="hidden">' : '' ?></h5>
              <p></p>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
</div>
<input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
<div class="clearfix"></div>
