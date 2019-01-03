<?= $this->Html->css('Support.jquery.cleditor.css'); ?>
<div class="push-nav"></div>
<div class="container">
    <div class="row page">
        <div class="page-content">
            <div class="col-md-12">
                <h1 style="display: inline-block;"><?= $Lang->get('SUPPORT__CREATE') ?> - <?= $Lang->get('SUPPORT__SUPPORT') ?></h1>
                <hr>
                <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="./" action="<?= $this->Html->url(array('controller' => 'Ticket', 'action' => 'ajax_create')) ?>">
                    <label><?= $Lang->get('SUPPORT__SUBJECT') ?></label>
                    <input type="text" name="subject" class="form-control">
                    <label><?= $Lang->get('SUPPORT__YOURPROBLEM') ?></label>
                    <textarea id="input" name="reponse_text"></textarea>
                    <hr>
                    <button class="btn btn-primary" type="submit"><?= $Lang->get('SUPPORT__CREATETICKET') ?></button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?= $this->Html->script('Support.jquery.cleditor.min.js'); ?>
<script>$(document).ready(function() {  $("#input").cleditor();  });  </script>
<style>
    .page-content {
        max-width: none!important;
    }
</style>