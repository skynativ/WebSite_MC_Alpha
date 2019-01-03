<?php App::import('Controller', 'CodeCadeauController'); ?>
<?= $this->Html->css('CodeCadeau.plugin.css'); ?>
<section class="content">
    <div class="col-md-12">
        <?php if($isUpdateAvaible){ ?>
          <div class="alert alert-warning">
            <div class="row">
              <div class="col-sm-1 col-icon-maj">
                <i class="fa fa-spin fa-refresh fa-maj"></i>
              </div>
              <div class="col-sm-10 col-text-maj">
                <span class="title-info-maj">INFORMATION</span><br />
                Une mise à jour du plugin "Code Cadeau" est disponible ! <br /> Pensez à la télécharger ;)
              </div>
            </div>
          </div>
        <?php }?>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $Lang->get("CCADEAU__LIST_TITLE"); ?></h3>
            </div>
            <div class="box-body">
                <div id="error_msg"></div>
                <div class="ajax-msg"></div>
                <table class="table">
                    <tr>
                        <th><?= $Lang->get("CCADEAU__TH_CODE"); ?></th>
                        <th><?= $Lang->get("CCADEAU__TH_ETAT"); ?></th>
                    </tr>
                    <?php $i = 0; ?>
                    <?php foreach ($codes as $code) { ?>
                    <?php $i++; ?>
                    <tr>
                        <td><?php echo $code['Code']['code']; ?></td>
                        <td>
                            <?php switch ($code['Code']['use']) {
                                case '0':
                                    echo '<span class="label label-danger">Non utilisé</span>';
                                    break;
                                case '1':
                                    echo '<span class="label label-success">Utilisé</span>';
                                    break;
                                default:
                                    echo 'Erreur';
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <td>
                            <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'Code', 'action' => 'delete_code')) ?>" data-redirect-url="?">
                                <input type="hidden" name="id_cadeau_delete" value="<?= $code['Code']['id']; ?>">
                                <button class="btn btn-danger"><?= $Lang->get("CCADEAU__DELETE_BTN"); ?></button>
                            </form>
                            </td>
                        </td>
                    </tr>
                    <?php }?>
                    <?php if($i < 1){ ?>
                     <tr>
                        <div class="alert alert-danger"><?= $Lang->get("CCADEAU__NO_EXIST"); ?></div>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $Lang->get("CCADEAU__CREATE_TITLE"); ?></h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'Code', 'action' => 'add_code')) ?>" data-redirect-url="?">
                    <div class="ajax-msg"></div>
                    <label><?= $Lang->get("CCADEAU__EXEMPLE_CODE"); ?></label>
                    <input class="form-control" type="text" name="code_cadeau"><br />
                    <label><?= $Lang->get("CCADEAU__NUMBER_CODE"); ?></label>
                    <input class="form-control" onkeyup="this.value=this.value.replace(/\D/g,'')" type="text" name="point_cadeau"><br />
                    <button class="btn btn-primary"><?= $Lang->get("CCADEAU__CREATE_BTN"); ?></button>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<script  type="text/javascript">

function chiffres(event) {
// Compatibilité IE / Firefox
    if(!event&&window.event) {
        event=window.event;
    }
    // IE
    if(event.keyCode < 48 || event.keyCode > 57 || event.keyCode  == 8 || event.keyCode == 127) {
        event.returnValue = false;
        event.cancelBubble = true;
    }
    // DOM
    if(event.which < 48 || event.which > 57 || event.keyCode == 8 || event.keyCode == 127) {
        event.preventDefault();
        event.stopPropagation();
    }
}

</script>
