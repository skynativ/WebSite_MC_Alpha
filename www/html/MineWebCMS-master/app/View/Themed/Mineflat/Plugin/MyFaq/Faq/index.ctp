<div class="container">
    <div class="spacer" style="height: 80px;"></div>

    <div class="box-news">
        <div class="container">
            <h1 class="faq"><?= $Lang->get("FAQ") ?></h1>
        </div>
        <div class="panel-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?= (empty($faqs)) ? "<p>Aucune FAQ pour le moment</p>" : ""?>
                <?php foreach($faqs as $k=>$v): $v = current($v); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-<?= $v['id'] ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $v['id'] ?>" aria-expanded="true" aria-controls="collapse-<?= $v['id'] ?>">
                                    <?= $v['question'] ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-<?= $v['id'] ?>" class="panel-collapse collapse<?= ($k == 0) ? " in" : "" ?>" role="tabpanel" aria-labelledby="heading-<?= $v['id'] ?>">
                            <div class="panel-body">
                                <?= $v['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
