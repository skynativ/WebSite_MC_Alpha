<?= $this->Html->css('Support.jquery.cleditor.css'); ?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><?= $Lang->get('SUPPORT__CREATE') ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="./" action="<?= $this->Html->url(array('controller' => 'Ticket', 'action' => 'ajax_create')) ?>">
            <label><?= $Lang->get('SUPPORT__SUBJECT') ?></label>
            <input type="text" name="subject" class="form-control">
            <label><?= $Lang->get('SUPPORT__YOURPROBLEM') ?></label>
            <textarea id="input" name="reponse_text"></textarea>
            <hr>
            <button class="btn btn-primary" type="submit"><?= $Lang->get('SUPPORT__CREATETICKET') ?></button>
        </form>
    </div>
</div>
<?= $this->Html->script('Support.jquery.cleditor.min.js'); ?>
<script>$(document).ready(function() {  $("#input").cleditor();  });  </script>