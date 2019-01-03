<?php
App::import('Controller', 'SupportController');
$Support = new SupportController();
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php if($ticket['Ticket']['state'] == 0 || $ticket['Ticket']['state'] == 1){ ?>
                <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="../" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_closa')) ?>">
                    <a class="btn btn-primary" href="<?= $this->Html->url(array('controller' => 'Support', 'admin' => true, 'action' => 'index')) ?>"><i class="fa fa-arrow-left"></i> <?= $Lang->get('SUPPORT_BACK_TO_LIST'); ?></a>
                    <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                    <button class="btn btn-success" type="submit"><i class="fa fa-close"></i> <?= $Lang->get('SUPPORT__CLOSE'); ?></button>
                </form>
                <?php }else{ ?>
                    <a class="btn btn-primary" href="<?= $this->Html->url(array('controller' => 'Support', 'admin' => true, 'action' => 'index')) ?>"><i class="fa fa-arrow-left"></i> <?= $Lang->get('SUPPORT_BACK_TO_LIST'); ?></a>
                <?php }?>
                <h2><?= $Lang->get('SUPPORT__PROBLEMQUESTION') ?> <?= $Support->getUser('pseudo', $ticket['Ticket']['author']); ?></h2>
                <h4><?= $Lang->get('SUPPORT__IN_A_CATEGORIE', ['{NAME}' => $Support->getCategorie($ticket['Ticket']['categorie'])]); ?></h4>
                <hr>
                <hr style="border-top: 1px solid #dedede;">
                <div class="box">
                    <div style="word-wrap: break-word;" class="box-body">
                        <?= $ticket['Ticket']['reponse_text']; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"><h2><?= $Lang->get('SUPPORT__ANSWER'); ?></h2><hr style="border-top: 1px solid #dedede;"></div>
            <?php foreach($answers as $answer): ?>
                <div class="col-sm-8 <?php if($answer['ReplyTicket']['type'] == 1){ ?>pull-right<?php }?>">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <?= $Lang->get('SUPPORT__ANSWERTO') ?> <?= $Support->getUser('pseudo', $answer['ReplyTicket']['author']); ?>
                            </h3>
                        </div>
                        <div style="word-wrap: break-word;" class="box-body">
                            <?= $answer['ReplyTicket']['reply']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-sm-12">
              <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('ANSWER_TICKETS')){ ?>
                <h2><?= $Lang->get('SUPPORT__REPLYTICKET') ?></h2>
                <hr style="border-top: 1px solid #dedede;">
                <div class="box">
                    <div class="box-body">
                        <?php if($ticket['Ticket']['state'] != 2){ ?>
                        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="../" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_replya')) ?>">
                            <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                            <?= $this->Html->script('admin/tinymce/tinymce.min.js') ?>
                            <script type="text/javascript">
                            tinymce.init({
                                selector: "textarea",
                                height : 300,
                                width : '100%',
                                language : 'fr_FR',
                                plugins: "textcolor code image link",
                                toolbar: "fontselect fontsizeselect bold italic underline strikethrough link image forecolor backcolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist outdent indent blockquote code"
                             });
                            </script>
                            <textarea id="editor" name="reponse_text" cols="30" rows="10"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('SUPPORT__REPLY') ?></button>
                        </form>
                        <?php }else{ ?>
                            <div class="alert alert-warning"><?= $Lang->get('SUPPORT__CLOSTICKETWARNING') ?></div>
                        <?php }?>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="alert alert-danger"><?= $Lang->get('SUPPORT__ERROR_PERMISSION_ANSWER'); ?></div>
                <?php }?>
              </div>
        </div>
    </div>
</section>
