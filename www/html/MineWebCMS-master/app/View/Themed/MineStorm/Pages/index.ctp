<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading"><?= before_display($page['title']) ?><span class="pull-right"><?= $Lang->get('GLOBAL__AUTHOR') ?> : <?= $page['author'] ?> <img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $page['author'] ?>/16" title="<?= $page['author']['User']['pseudo'] ?>"></span></div>
    <div class="panel-body">
      <?= $page['content'] ?>
      <hr>
      <?= $Lang->get('GLOBAL__UPDATED') ?> : <?= $Lang->date($page['updated']) ?>
    </div>
  </div>
</div>
<?= $this->element('sidebar') ?>
