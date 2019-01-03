<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>

<div class="background-forum">
    <div class="<?= $theme; ?> marge">
        <?php if(!empty($alertforum['update'])) echo $alertforum['update']; ?>
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <ol class="forum-breadcrumb">
                    <li class="forum-breadcrumb-home">
                        <a href="<?= $this->Html->url('/forum') ?>" class="forum-breadcrumb-fahome"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <?php foreach ($breadcrumb as $key => $b): ?>
                        <li class="forum-breadcrumb-href">
                            <a href="<?= $this->Html->url('/forum/'.$b['url'].'/') ?>">
                                <?= $b['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="forum-breadcrumb-child">
                        <?= $this->Text->truncate(h($title), 70); ?>
                    </li>
                </ol>
            </div>
            <?php if($perms['FORUM_TOPIC_LOCK'] || $perms['FORUM_TOPIC_STICK'] || $perms['FORUM_MSGMY_EDIT'] || $perms['FORUM_MSG_EDIT']): ?>
                <div class="col-md-2 col-xs-12 text-center">
                    <?php if($perms['FORUM_TOPIC_LOCK']): ?>
                        <form style="width: 46px" class="inline" action="" method="post">
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                            <button style="margin-left:0px" type="submit" data-toggle="tooltip" data-placement="bottom" name="lock" value="<?= $id; ?>" title="<?php if($lock): ?><?= $Lang->get('FORUM__UNLOCK'); ?><?php else: ?><?= $Lang->get('FORUM__LOCK'); ?><?php endif; ?>" class="btn btn-theme mt30"><?php if(!$lock): ?><i class="fa fa-lock" aria-hidden="true"></i><?php else: ?><i class="fa fa-unlock" aria-hidden="true"></i><?php endif; ?></button>
                        </form>
                    <?php endif; ?>
                    <?php if($perms['FORUM_TOPIC_STICK']): ?>
                        <form style="width: 46px" class="inline" action="" method="post">
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                            <button style="margin-left:0px" type="submit" data-toggle="tooltip" data-placement="bottom" title="<?php if($stick): ?><?= $Lang->get('FORUM__UNSTICK'); ?><?php else: ?><?= $Lang->get('FORUM__STICK'); ?><?php endif; ?>" name="stick" value="<?= $id; ?>" class="btn btn-theme mt30"><i class="fa fa-paperclip" aria-hidden="true"></i></button>
                        </form>
                    <?php endif; ?>
                    <?php if(($perms['FORUM_TOPICMY_DELETE'] &&  $_SESSION['user'] == $msgs[0]['Topic']['id_user'])|| $perms['FORUM_TOPIC_DELETE']): ?>
                        <form style="width: 46px" class="inline" action="" method="post">
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                            <button style="margin-left:0px" type="submit" data-toggle="tooltip" data-placement="bottom" title="Supprimer" name="deleteall" value="<?= $id; ?>" class="btn btn-theme mt30"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?= @$this->Session->flash(); ?>
        <div class="forum-forum">
            <div class="forum-forum-header">
                <p class="forum-forum-title">
                    <i class="fa fa-flag" aria-hidden="true"></i>

                    <?php foreach($tags as $key => $tag): ?>
                        <?php if(!empty($topic)):
                            $explode = explode(',', $topic);
                            foreach ($explode as $key => $e):
                                if($e == $tag['Tag']['id']): ?>
                                    <span style="background-color: #<?= $tag['Tag']['color']; ?>" class="labeltag">
                                   <?php if(!empty($tag['Tag']['icon'])): ?>
                                       <i class="fa fa-<?= $tag['Tag']['icon']; ?>" aria-hidden="true"></i>
                                   <?php endif; ?>
                                        <?= $tag['Tag']['name']; ?>
                               </span>
                                <?php endif;
                            endforeach;
                        endif;
                    endforeach; ?>

                    <?= $this->Text->truncate(h($title), 144); ?>
                </p>
            </div>
        </div>
        <?php foreach ($msgs as $msg): ?>
            <div id="<?= $msg['Topic']['id']; ?>" class="forum-forum-withoutmarge">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="forum-topic-left">
                                    <div class="forum-forum-withoutmarge">
                                        <img class="center-block topic-avatar" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $msg['Topic']['author'], '120', '42')); ?>" alt="Avatar <?= $msg['Topic']['author']; ?>" />
                                        <p class="text-center"><strong><a style="color:#<?= $msg['Topic']['author_color']; ?>" href="<?= $this->Html->url('/user/'.$msg['Topic']['author'].'.'.$msg['Topic']['id_user'].'/'); ?>"><?= $msg['Topic']['author']; ?></a></strong></p>
                                        <div class="forum-rank">
                                            <?php if(!empty($msg['Topic']['author_info']['rank'])): ?>
                                                <?php foreach($msg['Topic']['author_info']['rank'] as $key => $rank): ?>
                                                    <div style="background-color:#<?= $msg['Topic']['author_info']['color'][$key]['color']; ?>" class="forum-badgerank forum-topic-badgerank"><?= $rank['group_name']; ?></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="forum-extrainfo">
                                            <dl>
                                                <dt><?= $Lang->get('FORUM__MSG'); ?><?php if($msg['Topic']['author_info']['nb_message'] > 1) echo 's'; ?> :</dt>
                                                <dd><?= $msg['Topic']['author_info']['nb_message']; ?></dd>
                                            </dl>
                                            <dl>
                                                <dt><?= $Lang->get('USER__REGISTER_DATE'); ?> :</dt>
                                                <dd><?= $msg['Topic']['author_info']['inscription']; ?></dd>
                                            </dl>
                                            <dl>
                                                <dt><?= $Lang->get('FORUM__GREENTHUMB'); ?> :</dt>
                                                <dd><?= $msg['Topic']['author_info']['thumb']['green']; ?></dd>
                                            </dl>
                                            <dl>
                                                <dt><?= $Lang->get('FORUM__REDTHUMB'); ?> :</dt>
                                                <dd><?= $msg['Topic']['author_info']['thumb']['red']; ?></dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="topic-content">
                                    <?= $msg['Topic']['content']; ?>

                                    <?php if(!empty($msg['Topic']['author_info']['sign'])): ?>
                                        <hr />
                                        <?= h($msg['Topic']['author_info']['sign']); ?>
                                    <?php endif; ?>

                                </div>
                                <div class="topic-content-footer">
                                    <div class="topic-footer-info">
                                        <a href="<?= $this->Html->url('/user/'.$msg['Topic']['author'].'.'.$msg['Topic']['id_user'].'/'); ?>"><?= $msg['Topic']['author']; ?></a>, <?= $msg['Topic']['date']; ?>
                                        <div class="topic-footer-rate">
                                            <?php if(isset($_SESSION['user']) && $_SESSION['user'] == $msg['Topic']['id_user'] && $perms['FORUM_MSGMY_EDIT'] || $perms['FORUM_MSG_EDIT']): ?>
                                                <a href="#" onclick="getMessage(<?= $msg['Topic']['id']; ?>)" data-toggle="modal" data-target="#ModalEdit" class="btn-theme"><?= $Lang->get('GLOBAL__EDIT'); ?></a>
                                            <?php endif; ?>
                                            <?php if(isset($_SESSION['user']) && $_SESSION['user'] == $msg['Topic']['id_user'] && $perms['FORUM_MSGMY_DELETE'] || $perms['FORUM_MSG_DELETE']): ?>
                                                <form action="" method="post">
                                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                                                    <button type="submit" name="delete" value="<?= $msg['Topic']['id']; ?>" class="btn-theme"><?= $Lang->get('GLOBAL__DELETE'); ?></button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if(isset($_SESSION['user']) && $_SESSION['user'] != $msg['Topic']['id_user'] AND isset($_SESSION['user'])): ?>
                                                <?php if($perms['FORUM_MSG_REPORT']): ?>
                                                    <a onclick="report(<?= $msg['Topic']['id']; ?>)" data-toggle="modal" data-target="#ModalReport" class="btn-theme"><?= $Lang->get('FORUM__REPORT'); ?></a>
                                                <?php endif; ?>
                                                <?php if($active['notemsg']): ?>
                                                    <a id="<?= $msg['Topic']['id']; ?>-1" onclick="forumThumb(1, <?= $msg['Topic']['id']; ?>, <?= $msg['Topic']['id_user']; ?>)" data-toggle="tooltip" data-placement="top" title="<?= $msg['Topic']['thumb']['green']; ?>" class="btn-theme thumb-green <?php if($msg['Topic']['thumb_info']['green'] > 0) echo 'active'; ?>" name="voteup" value=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                                    <a id="<?= $msg['Topic']['id']; ?>-2" onclick="forumThumb(2, <?= $msg['Topic']['id']; ?>, <?= $msg['Topic']['id_user']; ?>)" data-toggle="tooltip" data-placement="top" title="<?= $msg['Topic']['thumb']['red']; ?>" class="btn-theme thumb-red <?php if($msg['Topic']['thumb_info']['red'] > 0) echo 'active'; ?>" name="votedown" value=""><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?= $pagination['html']; ?>
        <?php if(isset($_SESSION['user'])): ?>
            <?php if(!$lock || $perms['FORUM_TOPIC_LOCK']): ?>
                <form method="post" action="<?= $this->Html->url('/'.$this->request->url); ?>">
                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                    <div class="form-group mt20">
                        <script type="text/javascript">
                            tinymce.init({
                                external_plugins: {
                                    "emoticons": "<?= $this->Html->url('/forum/js/plugins/emoticons/plugin.min.js'); ?>"
                                },
                                selector: "textarea",
                                height : 200,
                                width : '100%',
                                menubar: false,
                                plugins: "textcolor table code image link contextmenu emoticons",
                                toolbar: "fontselect fontsizeselect | styleselect | insert | bold italic underline strikethrough | forecolor backcolort | alignleft aligncenter alignright alignjustifyt | cut copy paste | bullist numlist outdent | emoticons indent blockquote code table"
                            });
                        </script>
                        <textarea id="editor" name="content" cols="30" rows="7"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn-theme btn-themehover"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?= $Lang->get('FORUM__SEND__MYMSG'); ?></button>
                    </div>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php if(isset($_SESSION['user'])): ?>
    <!-- Modal -->
    <?php if($perms['FORUM_MSGMY_EDIT'] OR $perms['FORUM_MSG_EDIT']): ?>
    <!-- Edit -->
        <div class="modal fade bs-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('FORUM__EDIT__MYMSG'); ?></h4>
                    </div>
                    <form method="post" action="<?= $this->Html->url('/'.$this->request->url); ?>">
                        <div class="modal-body">
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                            <input id="update_id" name="id" value="" type="hidden" />
                            <div class="form-group mt20 div-edit">
                                <script type="text/javascript">
                                    tinymce.init({
                                        external_plugins: {
                                            "emoticons": "<?= $this->Html->url('/forum/js/plugins/emoticons/plugin.min.js'); ?>"
                                        },
                                        selector: "textarea",
                                        height : 300,
                                        width : '100%',
                                        menubar: false,
                                        plugins: "textcolor table code image link contextmenu emoticons",
                                        toolbar: "fontselect fontsizeselect | styleselect | insert | bold italic underline strikethrough | forecolor backcolort | alignleft aligncenter alignright alignjustifyt | cut copy paste | bullist numlist outdent | emoticons indent blockquote code table"
                                    });
                                </script>
                                <textarea id="editor_update" name="content_update" cols="30" rows="14"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a id="urlEdit" class="btn btn-info pull-left" href=""><i class="fa fa-pencil" aria-hidden="true"></i> <?= $Lang->get('FORUM__ADVANCED__EDITOR'); ?></a>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> <?= $Lang->get('GLOBAL__CLOSE'); ?></button>
                            <button type="submit" id="submit_update" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> <?= $Lang->get('FORUM__EDIT__MYMSG'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($perms['FORUM_MSG_REPORT'] && $active['reportmsg']): ?>
        <!-- Report -->
        <div class="modal fade bs-example-modal-lg" id="ModalReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('FORUM__REPORT__THISMSG'); ?></h4>
                    </div>
                    <form method="post" action="<?= $this->Html->url('/'.$this->request->url); ?>">
                        <div class="modal-body">
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                            <input id="report_id" name="id" value="" type="hidden" />
                            <input type="text" placeholder="Raison" name="reason" class="form-control" />
                            <div class="form-group mt20">
                                <script type="text/javascript">
                                    tinymce.init({
                                        external_plugins: {
                                            "emoticons": "<?= $this->Html->url('/forum/js/plugins/emoticons/plugin.min.js'); ?>"
                                        },
                                        selector: "textarea",
                                        height : 200,
                                        width : '100%',
                                        menubar: false,
                                        plugins: "textcolor table code image link contextmenu emoticons",
                                        toolbar: "fontselect fontsizeselect | styleselect | insert | bold italic underline strikethrough | forecolor backcolort | alignleft aligncenter alignright alignjustifyt | cut copy paste | bullist numlist outdent | emoticons indent blockquote code table"
                                    });
                                </script>
                                <textarea id="editor_report" name="content_report" cols="30" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> <?= $Lang->get('GLOBAL__CLOSE'); ?></button>
                            <button type="submit" id="submit_report" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?= $Lang->get('FORUM__SEND__REPORT'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script type="text/javascript">
        <?php if($active['notemsg']): ?>
            function forumThumb(type, id, toUser){
                var json = JSON.stringify({ type: type, id:id, toUser: toUser});
                var url = window.location.href;
                console.log(url);
                $.ajax({
                    type : 'post',
                    url : url,
                    data : {json : json, 'data[_Token][key]' : '<?= $csrfToken ?>'},
                    success : function(json){
                        var anchor = $('#' + id + '-' + type).attr('data-original-title');
                        if(json == "normal"){
                            anchor++;
                            $('#' + id + '-' + type).addClass('active');
                            $('#' + id + '-' + type).attr('data-original-title', anchor);
                        }else if(json == "reset"){
                            /* When a msg is always noted */
                            if(type == 1){
                                var anchor = $('#' + id + '-2').attr('data-original-title');
                                anchor--;
                                $('#' + id + '-2').removeClass('active');
                                $('#' + id + '-2').attr('data-original-title', anchor);
                            }else{
                                var anchor = $('#' + id + '-1').attr('data-original-title');
                                anchor--;
                                $('#' + id + '-1').removeClass('active');
                                $('#' + id + '-1').attr('data-original-title', anchor);
                            }
                        }
                        else{
                            anchor--;
                            $('#' + id + '-' + type).removeClass('active');
                            $('#' + id + '-' + type).attr('data-original-title', anchor);
                        }
                    }
                });
            }
            <?php endif; ?>
            function getMessage(id) {
                var url = '<?= $this->Html->url("/"); ?>forum/action/topic/message/'.id;
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {idUpdate: id, 'data[_Token][key]': '<?= $csrfToken ?>'},
                    success: function (message) {
                        $('#update_id').val(id);
                        tinymce.get("editor_update").setContent('');
                        tinymce.get("editor_update").execCommand('mceInsertContent', false, message);
                    }
                });

                var urlEdit = "<?= $this->Html->url('/topic/edit/'); ?>" + id;
                $('#urlEdit').attr("href", urlEdit);
            }
            <?php if($perms['FORUM_MSG_REPORT'] && $active['reportmsg']): ?>
            function report(id) {
                $('#report_id').val(id);
            }
        <?php endif; ?>
    </script>
<?php endif; ?>
<!-- Js for tooltip -->
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $(document).on('focusin', function(e) {
        if ($(event.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });
</script>