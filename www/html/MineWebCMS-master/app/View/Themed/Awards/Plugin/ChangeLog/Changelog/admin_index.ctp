<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get("CL_ADMIN_MAIN_TITLE"); ?></h3> <span style="float:right;"><?= $Lang->get("PLUGIN_DEVELOPED_BY"); ?></span>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5">
                            <p style="text-align:justify;font-style:italic;"><?= $Lang->get("CL_PRESENTATION_TITLE"); ?></p>
                        </div>
                    </div>
                    
                    <h4 style="margin-top:30px;"><span class="fa fa-file-text"></span> <?= $Lang->get("CL_CONFIGURATION_TITLE"); ?></h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="row">
                                    <form method="post" action="<?= $this->Html->url(["controller" => "Changelog", "action" => "index", "admin" => true]); ?>" style="margin-left: -15px;">

                                        <div class="form-group col-md-6">
                                            <label class="control-label" id="level">
                                                <?= $Lang->get("CL_LBL_LEVEL"); ?>
                                                (
                                                <span class="label label-success">MISE À JOUR</span>
                                                <span class="label label-info">INFORMATION</span>
                                                <span class="label label-warning">ATTENTION</span>
                                                <span class="label label-danger">IMPORTANT</span>
                                                )
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-exclamation-circle"></span></span>
                                                <select class="form-control" id="level" name="level" required>
                                                    <option value="0">MISE À JOUR</option>
                                                    <option value="1">INFORMATION</option>
                                                    <option value="2">ATTENTION</option>
                                                    <option value="3">IMPORTANT</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label" id="author"><?= $Lang->get("CL_LBL_AUTHOR"); ?></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" class="form-control" id="author" name="author" placeholder="<?= $Lang->get("CL_PLACEHOLDER_AUTHOR"); ?>" minlength="2" maxlength="50" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label" id="description"><?= $Lang->get("CL_LBL_COMMENT"); ?></label>
                                            <?= $this->Html->script('admin/tinymce/tinymce.min.js') ?>
                                            <script>
                                            tinymce.init({
                                                selector: "textarea",
                                                height : 300,
                                                width : '100%',
                                                language : 'fr_FR',
                                                plugins: "textcolor code image link",
                                                toolbar: "fontselect fontsizeselect bold italic underline strikethrough link image forecolor backcolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist outdent indent blockquote code"
                                            });
                                            </script>
                                            <textarea name="description"></textarea>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <span class="input-group-btn">
                                                <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>">
                                                <button type="submit" class="btn btn-primary"><?= $Lang->get("CL_TXT_SUBMIT"); ?></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 style="margin-top:30px;"><span class="fa fa-pencil"></span> <?= $Lang->get("CL_DELETE_TITLE"); ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="row">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><?= $Lang->get("TABLE_HEAD_LEVEL"); ?></th>
                                                <th><?= $Lang->get("TABLE_HEAD_DATE"); ?></th>
                                                <th><?= $Lang->get("TABLE_HEAD_AUTHOR"); ?></th>
                                                <th><?= $Lang->get("TABLE_HEAD_COMMENT"); ?></th>
                                                <th><?= $Lang->get("TABLE_HEAD_DELETE"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($changelogs as $changlog){ ?>
                                            <tr>
                                                <td class="col-md-1" style="font-size:18px;">

                                                <?php
                                                $level = $changlog['Changelogs']['level'];
                                                if($level == 1){
                                                    echo '<span class="label label-info" style="padding:8px;">INFORMATION</span>';
                                                }else if($level == 2){
                                                    echo '<span class="label label-warning" style="padding:8px;">ATTENTION</span>';
                                                }else if($level == 3){
                                                    echo '<span class="label label-danger" style="padding:8px;">IMPORTANT</span>';
                                                }else{
                                                    echo '<span class="label label-success" style="padding:8px;">MISE À JOUR</span>';
                                                }
                                                ?>

                                                </td>
                                                <td class="col-md-2"><?= date("d-m-Y H:i:s", strtotime($changlog['Changelogs']['created'])); ?></td>
                                                <td class="col-md-1"><?= $changlog['Changelogs']['author']; ?></td>
                                                <td class="col-md-9"><?= $changlog['Changelogs']['description']; ?></td>
                                                <td>
                                                    <a href="<?= $this->Html->url(["controller" => null, "action" => "delete", $changlog['Changelogs']['id']]); ?>" class="btn btn-danger" role="button">
                                                        <span class="fa fa-trash"></span>
                                                        <?= $Lang->get("CL_DELETE_LOG"); ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
</section>