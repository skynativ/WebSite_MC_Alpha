<div class="container">
<div class="panel panel-default" style="padding:">
        
          <div class="panel-heading"><?= $Lang->get("FAQ") ?> </div>
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
                            <div class="panel-body" style="border-top: none;">
                                <?= $v['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
