<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js"></script>

<div class="background-forum">
    <div class="container">
        <div class="mt10">
            <div class="row mt20">
                <div class="col-md-12">
                    <p class="inline pull-right forum-back"><a class="btn btn-theme" href="<?= $this->Html->url(array('controller' => 'message', 'action' => 'index')) ?>"><i class="fa fa-undo" aria-hidden="true"></i> <?= $Lang->get('FORUM__BACKTO__MSG'); ?></a></p>
                </div>
                <div class="col-md-12">
                    <form action="" method="post">
                        <div class="row mt20">
                            <div class="col-md-12">
                                <?= @$this->Session->flash(); ?>
                            </div>
                        </div>
                        <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                        <div class="form-group mt20">
                            <input type="text" name="recipient" value="<?php if($to) echo $to; ?>" class="form-control" placeholder="<?= $Lang->get('FORUM__PHRASE__RECIPIENT'); ?>" />
                        </div>
                        <div class="form-group mt20">
                            <input type="text" name="title" class="form-control" placeholder="Sujet" />
                        </div>
                        <div class="form-group mt20">
                            <script type="text/javascript">
                                tinymce.init({
                                    external_plugins: {
                                        "emoticons": "<?= $this->Html->url('/') ?>forum/js/plugins/emoticons/plugin.min.js"
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
                            <button type="submit" class="btn-theme"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?= $Lang->get('FORUM__PHRASE__SENDMYMSG'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>