
<?php
App::import('Controller', 'SupportController');
$TicketSupport = new SupportController();
?>
<section class="content">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title_for_layout; ?></h3>
            </div>
            <div class="box-body">
                <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('ADD_CATEGORIE')){ ?>
                  <a onclick="$('#add_categorie').modal();" class="btn btn-block btn-primary"><?= $Lang->get('SUPPORT__CATEGORIE_CREATE_BUTTON'); ?></a>
                <?php }?>
                <table class="table">
                    <thead>
                      <tr>
                        <th><?= $Lang->get('SUPPORT__CATEGORIE_NAME_OF_CATEGORIE'); ?></th>
                        <th><?= $Lang->get('SUPPORT__ACTIONS'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($categories as $categorie): ?>
                        <tr class="todo">
                          <td class="#nameId">
                            <?= $categorie['CategoriesSupport']['name']; ?>
                          </td>
                          <td>
                            <?php if($Permissions->can('MANAGE_CATEGORIES') && $Permissions->can('EDIT_CATEGORIE')){ ?>
                            <div class="col-sm-2">
                              <a class="btn btn-primary editCategorie" data-id-categorie="<?= $categorie['CategoriesSupport']['id']; ?>" data-name-categorie="<?= $categorie['CategoriesSupport']['name']; ?>"><i class="fa fa-edit"></i> <?= $Lang->get('SUPPORT__EDIT'); ?></a>
                            </div>
                            <?php }?>
                            <?php if($Permissions->can('MANAGE_CATEGORIES') && $Permissions->can('DELETE_CATEGORIE')){ ?>
                              <div class="col-sm-2">
                                <form style="margin-right: 10px;" method="post" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_delete_categorie')) ?>">
                                    <input type="hidden" name="idCategorie" value="<?= $categorie['CategoriesSupport']['id']; ?>">
                                    <button type="submit" class="btn btn-danger" href="#"><i class="fa fa-remove"></i> <?= $Lang->get('SUPPORT__DELETE') ?></button>
                                </form>
                              </div>
                            <?php }?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<div class="modal fade" id="add_categorie">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= $Lang->get('SUPPORT__CATEGORIE_CREATE_TITLE'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_create_categorie')) ?>">
        <label><?= $Lang->get('SUPPORT__CATEGORIE_NAME_OF_CATEGORIE'); ?></label>
        <input type="text" class="form-control" name="name_categorie" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><?= $Lang->get('SUPPORT__CATEGORIE_CREATE_BUTTON'); ?></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $Lang->get('SUPPORT__CLOSED'); ?></button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_categorie">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= $Lang->get('SUPPORT__CATEGORIE_EDIT_TITLE'); ?> <span id="setNameCategorieModal"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_edit_categorie')) ?>">
        <input type="hidden" id="setValueIdCategorieModal" value="" name="idCategorie">
        <label><?= $Lang->get('SUPPORT__CATEGORIE_NAME_OF_CATEGORIE'); ?></label>
        <input type="text" id="setValueNameCategorieModal" class="form-control" name="name_categorie" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><?= $Lang->get('SUPPORT__MODIFY'); ?></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $Lang->get('SUPPORT__CLOSED'); ?></button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('.editCategorie').click(function() {
    $('#setNameCategorieModal').html($(this).attr('data-name-categorie'));
    $('#setValueIdCategorieModal').attr('value', $(this).attr('data-id-categorie'));
    $('#setValueNameCategorieModal').attr('value', $(this).attr('data-name-categorie'));
    $('#edit_categorie').modal();
  });
</script>
