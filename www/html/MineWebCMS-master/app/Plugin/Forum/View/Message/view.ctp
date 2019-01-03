<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>

<div class="background-forum">
    <div class="container marge">
        <div class="row">
                <div class="col-md-12">
                    <div class="forum-bloc p10 mt20">
                        <p class="forum-forum-title inline"><i class="fa fa-flag" aria-hidden="true"></i> <?= $mps[0]['Conversation']['title']; ?></p>
                        <p class="inline pull-right forum-back"><a href="<?= $this->Html->url(array('controller' => 'message', 'action' => 'index')) ?>"><i class="fa fa-undo" aria-hidden="true"></i> <?= $Lang->get('FORUM__BACKTO__MSG'); ?></a></p>
                    </div>
                </div>
                <div class="col-md-12 mt20">
                    <?= @$this->Session->flash(); ?>
                </div>
                <div class="col-md-12">
                    <?php foreach ($mps as $mp): ?>
                        <div class="forum-bloc p10 mt20">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="forum-topic-left">
                                        <div class="forum-forum-withoutmarge">
                                            <img class="center-block topic-avatar" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $mp['Conversation']['author_user'], '120')); ?>" alt="Avatar <?= $mp['Conversation']['author_user']; ?>" />
                                            <p class="text-center"><strong><a style="color:#<?= $mp['Conversation']['author_color']; ?>" href="<?= $this->Html->url('/user/'.$mp['Conversation']['author_user'].'.'.$mp['Conversation']['author_id'].'/'); ?>"><?= $mp['Conversation']['author_user']; ?></a></strong></p>
                                            <div class="forum-rank">
                                                <?php if(!empty($mp['Conversation']['author_rank']['rank'])): ?>
                                                    <?php foreach($mp['Conversation']['author_rank']['rank'] as $key => $rank): ?>
                                                        <div style="background-color:#<?= $mp['Conversation']['author_rank']['color'][$key]['color']; ?>" class="forum-badgerank forum-topic-badgerank"><?= $rank['group_name']; ?></div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="topic-content-min">
                                        <?= $mp['Conversation']['content'] ?>
                                    </div>
                                    <div class="topic-content-footer">
                                        <div class="topic-footer-info">
                                            <?= $mp['Conversation']['msg_date']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if($perms['FORUM_MP_REPLY']): ?>
                        <form action="" method="post">
                            <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                            <div class="form-group mt20">
                                <script type="text/javascript">
                                    tinymce.init({
                                        external_plugins: {
                                            "emoticons": "/forum/js/plugins/emoticons/plugin.min.js"
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
                                <button type="submit" class="btn btn-theme"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?= $Lang->get('FORUM__REPLY'); ?></button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
    </div>
</div>