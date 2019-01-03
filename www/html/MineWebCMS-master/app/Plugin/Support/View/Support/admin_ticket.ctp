<?php App::import( 'Controller', 'SupportController'); $Support=new SupportController(); ?>
<style>
    .direct-chat-text:after,
    .direct-chat-text:before {
        position: absolute;
        right: 100%;
        top: 15px;
        border: solid #e21c1c00;
        border-right-color: #f39c12;
        content: ' ';
        height: 0;
        width: 0;
        pointer-events: none;
    }
    .direct-chat-text:before {
        border-width: 6px;
        margin-top: -6px;
        border-right-color: #f39c12;
    }
</style>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="<?= $this->Html->url(array('controller' => 'Support', 'admin' => true, 'action' => 'index')) ?>"><i class="fa fa-arrow-left"></i> <?= $Lang->get('SUPPORT_BACK_TO_LIST'); ?></a>
                <?php if($ticket['Ticket']['state']==0 || $ticket['Ticket']['state']==1 ){ ?>
                <a class="btn btn-danger" href="<?= $this->Html->url(array('plugin' => null, 'admin' => true, 'controller' => 'support', 'action' => 'closa_adm', ''.$ticket['Ticket']['id'].'')) ?>"><i class="fa fa-close"></i> <?= $Lang->get('SUPPORT__CLOSE'); ?></a>
                <?php }?>
                <br />
                <br />
                <div class="box">
                    <div class="box-body">
                        <h3 style="margin-top: 6px;"><?= $Lang->get('SUPPORT__PROBLEMQUESTION', ['{ID_TICKET}' => $ticket['Ticket']['id']]); ?> <?= $Support->getUser('pseudo', $ticket['Ticket']['author']); ?></h3>
                        <h4><?= $Lang->get('SUPPORT__IN_A_CATEGORIE', ['{NAME}' => $Support->getCategorie($ticket['Ticket']['categorie'])]); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <h3 style="margin-top: 0.1em;"><?= $Lang->get('SUPPORT__ANSWER'); ?></h3>
                <hr style="border-top: 1px solid #dedede;">
            </div>
            <div style="height: 450px;" class="direct-chat-messages">
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?= $Support->getUser('pseudo', $ticket['Ticket']['author']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?= date('d/m/Y à H:m:s', strtotime($ticket['Ticket']['created'])); ?></span>
                    </div>
                    <img class="direct-chat-img avatar-client" data-pseudo="<?= $Support->getUser('pseudo', $ticket['Ticket']['author']); ?>" src="<?= $this->Html->url(array('controller' => 'support', 'action' => 'img', 'admin' => false, 'plugin' => null, 'steve.png')); ?>" alt="message user image">
                    <div style="word-wrap: break-word;background-color: #f39c12;border-color: #f39c12;color: white;" class="direct-chat-text">
                        <?= $ticket[ 'Ticket'][ 'reponse_text']; ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php foreach($answers as $answer): ?>
                <div class="direct-chat-msg <?php if($answer['ReplyTicket']['type'] == 1){ ?>direct-chat-warning right<?php }?>">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?= $Support->getUser('pseudo', $answer['ReplyTicket']['author']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?= date('d/m/Y à H:m:s', strtotime($answer['ReplyTicket']['created'])); ?></span>
                    </div>
                    <img class="direct-chat-img avatar-client" data-pseudo="<?= $Support->getUser('pseudo', $answer['ReplyTicket']['author']); ?>" src="<?= $this->Html->url(array('controller' => 'support', 'action' => 'img', 'admin' => false, 'plugin' => null, 'steve.png')); ?>" alt="message user image">
                    <div style="word-wrap: break-word;<?php if($answer['ReplyTicket']['type'] != 1){ ?>background-color: #f39c12;border-color: #f39c12;color: white;<?php }?>" class="direct-chat-text">
                        <?= $answer['ReplyTicket']['reply']; ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php endforeach; ?>
            </div>
            <div class="col-sm-12">
                <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('ANSWER_TICKETS')){ ?>
                <h3><?= $Lang->get('SUPPORT__REPLYTICKET') ?></h3>
                <hr style="border-top: 1px solid #dedede;">
                <div class="box">
                    <div class="box-body">
                        <?php if($ticket[ 'Ticket'][ 'state'] !=2 ){ ?>
                        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="../" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_replya')) ?>">
                            <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                            <?= $this->Html->script('admin/tinymce/tinymce.min.js') ?>
                                <script type="text/javascript">
                                    tinymce.init({
                                        selector: "textarea",
                                        height: 300,
                                        width: '100%',
                                        language: 'fr_FR',
                                        plugins: "textcolor code image link",
                                        toolbar: "fontselect fontsizeselect bold italic underline strikethrough link image forecolor backcolor alignleft aligncenter alignright alignjustify cut copy paste bullist numlist outdent indent blockquote code"
                                    });
                                </script>
                                <textarea id="editor" name="reponse_text" cols="30" rows="10"></textarea>
                                <br>
                                <button class="btn btn-primary" type="submit">
                                    <?= $Lang->get('SUPPORT__REPLY') ?>
                                </button>
                        </form>
                        <?php }else{ ?>
                        <div class="alert alert-warning">
                            <?= $Lang->get('SUPPORT__CLOSTICKETWARNING') ?>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="alert alert-danger">
                    <?= $Lang->get('SUPPORT__ERROR_PERMISSION_ANSWER'); ?>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.avatar-client').one("load", function() {
            var pseudo = $(this).attr("data-pseudo");
            var src = "<?= $this->Html->url('/'); ?>API/get_head_skin/" + pseudo + "/32";
            $(this).attr("src", src);
        }).each(function() {
            if (this.complete) $(this).load();
        });
        AddTags("editor", "", "<br /><br /><hr>Cordialement,<br /><?= $user['pseudo']; ?>");
    });

    function AddTags(name, prefix, suffix) {
        try {
            var textArea = document.getElementById(name).value;
            var i = 0;
            var textArray = textArea.split("\n");
            if (textArray === null) {
                document.getElementById(name).value += prefix + suffix;
            } else {
                for (i = 0; i < textArray.length; i++) {
                    textArray[i] = prefix + textArray[i] + suffix;
                }
                document.getElementById(name).value = textArray.join("\n");
            }
        } catch (err) {}
    }
</script>