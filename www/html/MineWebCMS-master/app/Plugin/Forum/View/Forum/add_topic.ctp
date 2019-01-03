<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css?') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>

<div class="background-forum">
    <div class="<?= $theme; ?> marge">
    <?php if(!empty($alertforum['update'])) echo $alertforum['update']; ?>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12 mt20">
            <?= @$this->Session->flash(); ?>
            <form method="post" action="<?= $this->here ?>">
                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />

                <div class="forum-forum">
                    <div class="forum-other-header">
                        <p class="forum-forum-title"><i class="fa fa-font" aria-hidden="true"></i> <?= $Lang->get('FORUM__TITLE__TOPIC'); ?></p>
                    </div>
                    <div class="forum-category">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="collapse mt20" id="collapseInfo">
                                    <div class="alert alert-warning" role="alert"><strong><?= $Lang->get('FORUM__WARNING!'); ?></strong> <?= $Lang->get('FORUM__PHRASE__PAGE__ADDTOPIC_1'); ?></div>
                                </div>
                                <div class="input-group">
                                    <input name="title" class="form-control" placeholder="<?= $Lang->get('FORUM__TITLE__TOPIC'); ?>" />
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default" aria-label="Help" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo"><span class="glyphicon glyphicon-question-sign"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="forum-forum">
                    <div class="forum-other-header">
                        <p class="forum-forum-title"><i class="fa fa-cog" aria-hidden="true"></i> <?= $Lang->get('FORUM__SETTINGS'); ?></p>
                    </div>
                    <div class="forum-category">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if($perms['FORUM_TOPIC_STICK']): ?>
                                    <div class="checkbox">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="stick" value="stick" /> <?= $Lang->get('FORUM__TOPIC__STICK__ALT'); ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php if($perms['FORUM_TOPIC_LOCK']): ?>
                                    <div class="checkbox">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="lock" value="lock" /> <?= $Lang->get('FORUM__TOPIC__LOCK__ALT'); ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="forum-forum">
                    <div class="forum-other-header">
                        <p class="forum-forum-title"><i class="fa fa-cog" aria-hidden="true"></i> <?= $Lang->get('FORUM__TAGS'); ?></p>
                    </div>
                    <div class="forum-category">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(!empty($tags)): ?>
                                    <?php if($params['isEdit']['tag']): ?>
                                        <?php foreach($tags as $key => $tag): ?>
                                            <span style="background-color: #<?= $tag['Tag']['color']; ?>" class="labeltag"><input type="checkbox" class="middle" value="<?= $tag['Tag']['id']; ?>" name="tag-<?= $tag['Tag']['id']; ?>" />
                                                <?php if(!empty($tag['Tag']['icon'])): ?>
                                                    <i class="fa fa-<?= $tag['Tag']['icon']; ?>" aria-hidden="true"></i>
                                                <?php endif; ?>
                                                <?= $tag['Tag']['name']; ?>
                                                    </span>
                                        <?php endforeach; ?>
                                    <?php elseif($params['isEdit']['tagPublic']): ?>
                                        <?php foreach($tags as $tag): $active = unserialize($tag['Tag']['used']); ?>
                                            <?php foreach($ranks as $key => $rank): ?>
                                                <?php if($active[$rank['Group']['id']]): ?>
                                                    <span style="background-color: #<?= $tag['Tag']['color']; ?>" class="labeltag"><input type="checkbox" class="middle" value="<?= $tag['Tag']['id']; ?>" name="tag-<?= $tag['Tag']['id']; ?>" />
                                                        <?php if(!empty($tag['Tag']['icon'])): ?>
                                                            <i class="fa fa-<?= $tag['Tag']['icon']; ?>" aria-hidden="true"></i>
                                                        <?php endif; ?>
                                                        <?= $tag['Tag']['name']; ?>
                                                            </span>
                                                    <?php break; endif; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt20">
                    <script type="text/javascript">
                        tinymce.init({
                            external_plugins: {
                                "emoticons": "<?= $this->Html->url('/forum/js/plugins/emoticons/plugin.min.js'); ?>"
                            },
                            selector: "textarea",
                            height : 500,
                            width : '100%',
                            menubar: true,
                            plugins: "textcolor table code image link contextmenu emoticons wordcount autosave",
                            toolbar: "fontselect fontsizeselect | styleselect | insert | bold italic underline strikethrough | forecolor backcolort | alignleft aligncenter alignright alignjustifyt | cut copy paste | bullist numlist outdent | emoticons indent blockquote code table restoredraft"
                        });
                    </script>
                    <textarea id="editor_insert" name="content_insert" cols="30" rows="20"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" id="submit_update" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> <?= $Lang->get('FORUM__SEND__MYTOPIC'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>