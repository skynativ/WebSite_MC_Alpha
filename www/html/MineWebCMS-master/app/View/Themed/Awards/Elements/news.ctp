<?php if(!isset($theme_config['news_global']) || $theme_config['news_global'] == "true") { ?>
<div class="news-big-title theme-color-background wow zoomIn">
        <h1>
            <i class="fa fa-newspaper-o"></i> <?= $Lang->get('NEWS__LAST_TITLE') ?>
        </h1>
    </div>
    <?php if(!empty($search_news)) { ?>
    <ul class="list-unstyled">
        <?php foreach ($search_news as $k => $v) { ?>
        <li class="wow zoomIn">
            <div class="news-home">
                <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="news-title">
                    <h2>
                        <?= cut($v['News']['title'], 70) ?>
                    </h2>
                </a>
                <?php if(isset($theme_config['news_caractere']) && $theme_config['news_caractere']) { ?>
                <div class="news-text">
                    <?= $this->Text->truncate($v['News']['content'], $theme_config['news_caractere'],array('ellipsis' => '...', 'html' => true)) ?>
                </div>
                <?php } else { ?>
                <div class="news-text">
                    <?= $this->Text->truncate($v['News']['content'], 320,array('ellipsis' => '...', 'html' => true)) ?>
                </div>
                <?php } ?>
                <span class="news-date">Le <?= $Lang->date($v['News']['created']); ?></span>
                <?php if(!isset($theme_config['news_commentaires']) || $theme_config['news_commentaires'] == "true") { ?>
                <div class="news-commentaires theme-color-border theme-color-text" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?= count($v['Comment']) ?> personne(s) a/ont commenté(s) cet article">
                    <?= count($v['Comment']) ?> <i class="fa fa-comments" aria-hidden="true"></i>
                </div>
                <?php } ?>
                <?php if(!isset($theme_config['news_likes']) || $theme_config['news_likes'] == "true") { ?>
                <div class="news-likes theme-color-border theme-color-text" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="<?= $this->Text->truncate($v['News']['count_likes']) ?> personne(s) aime(nt) cet article">
                    <?= $this->Text->truncate($v['News']['count_likes']) ?> <i class="fa fa-thumbs-up"></i>
                </div>
                <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="news-readmore theme-color-background"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
                <?php } else { ?>
                <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>" class="news-readmore theme-color-background" style="margin-top:-30px;"><?= $Lang->get('NEWS__READ_MORE') ?> »</a>
                <?php } ?>
            </div>
        </li>
        <?php } ?>
    </ul>
    <ol id="pagination"></ol>
    <?php } else { echo '<center><h3>'.$Lang->get('NEWS__NONE_PUBLISHED').'</h3></center>'; } ?>
<?php } ?>
