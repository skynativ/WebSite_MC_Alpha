<?= $this->element('slider') ?>

<!-- Main -->
<div class="col-md-8">
  <?php if(!empty($search_news)) { ?>
    <?php foreach ($search_news as $k => $v) { ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $v['News']['title']; ?><span class="pull-right"><small>Le <?= $Lang->date($v['News']['created']); ?></small></span></div>
        <div class="panel-body">
            <?php
                $msg = strip_tags($v['News']['content']);
                $msg = substr($msg, 0, 250);
            ?>
            <?= $msg ?>
            <?php if(strlen($v['News']['content']) > "170") { echo '...'; } ?>
            <br><br>
            <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>">
                <?= $Lang->get('NEWS__READ_MORE') ?>
            </a>
            <span class="pull-right"><?= $v['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i> <?= $v['News']['count_comments'] ?> <i class="fa fa-comment"></i></span>
        </div>
    </div>
    <?php } ?>
    <ol id="pagination"></ol>
  <?php } else { echo '<center><h3>'.$Lang->get('NEWS__NONE_PUBLISHED').'</h3></center>'; } ?>
</div>
<?= $this->element('sidebar') ?>
<?= $Module->loadModules('home') ?>
