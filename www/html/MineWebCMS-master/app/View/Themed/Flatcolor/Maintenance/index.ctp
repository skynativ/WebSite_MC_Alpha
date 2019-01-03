<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <?= $Lang->get('MAINTENANCE__TITLE') ?>
    </div>
    <div class="panel-body">
      <?php if ($msg != "0") echo $msg; else echo "Le site n'est pas en maintenance." ?>
    </div>
  </div>
</div>
<?= $this->element('sidebar') ?>
