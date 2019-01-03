<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>

<div class="background-forum">
    <div class="<?= $theme; ?> marge">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?= $this->Html->url('/'.$this->request->url); ?>">
                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                    <?php if($params['isEdit']['title']): ?>
                        <div class="form-group">
                            <input name="title" class="form-control" value="<?= $params['title']; ?>" placeholder="<?= $Lang->get('FORUM__TITLE__TOPIC'); ?>" />
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
                                                    <span style="background-color: #<?= $tag['Tag']['color']; ?>" class="labeltag"><input <?php if(in_array($tag['Tag']['id'], explode(',', $content['tags'])))echo 'checked'; ?> type="checkbox" class="middle" value="<?= $tag['Tag']['id']; ?>" name="tag-<?= $tag['Tag']['id']; ?>" />
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
                                                            <span style="background-color: #<?= $tag['Tag']['color']; ?>" class="labeltag"><input <?php if(in_array($tag['Tag']['id'], explode(',', $content['tags'])))echo 'checked'; ?> type="checkbox" class="middle" value="<?= $tag['Tag']['id']; ?>" name="tag-<?= $tag['Tag']['id']; ?>" />
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
                    <?php endif; ?>
                    <div class="form-group mt20">
                        <script type="text/javascript">
                            tinymce.init({
                                external_plugins: {
                                    "emoticons": "<?= $this->Html->url('/forum/js/plugins/emoticons/plugin.min.js'); ?>"
                                },
                                selector: "textarea",
                                height : 400,
                                width : '100%',
                                menubar: false,
                                plugins: "textcolor table code image link contextmenu emoticons",
                                toolbar: "fontselect fontsizeselect | styleselect | insert | bold italic underline strikethrough | forecolor backcolort | alignleft aligncenter alignright alignjustifyt | cut copy paste | bullist numlist outdent | emoticons indent blockquote code table"
                            });
                        </script>
                        <textarea id="editor" name="content" cols="30" rows="7"><?= $content['content']; ?></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn-theme btn-themehover"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?= $Lang->get('FORUM__EDIT__MYMSG'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>