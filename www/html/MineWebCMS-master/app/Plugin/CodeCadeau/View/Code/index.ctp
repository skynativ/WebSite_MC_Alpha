<div class="container">
    <div class="spacer" style="height: 80px;"></div>

    <div class="panel">
        <div class="container">
            <div class="page-header">
                <h1><?= $Lang->get('CCADEAU__TITLE'); ?></h1>
            </div>
        </div>
        <div class="panel-body">
            <h4><?= $Lang->get('CCADEAU__HELP'); ?></h4>
            <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'Code', 'action' => 'claim_code')) ?>" data-redirect-url="?">
                <div class="ajax-msg"></div>
                <label><?= $Lang->get("CCADEAU__EXEMPLE_CODE"); ?></label>
                <input class="form-control" type="text" name="code_cadeau"><br />
                <button class="btn btn-primary"><?= $Lang->get("CCADEAU__CLAIM_BTN"); ?></button>
            </form>
        </div>
    </div>
</div>
