<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css') ?>

<div class="background-forum">
    <div class="container">
    <div class="mt10">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <a href="<?= $this->Html->url('/message/new'); ?>" class="btn btn-theme mt30"><i class="fa fa-plus" aria-hidden="true"></i> <?= $Lang->get('FORUM__WRITE__MSG'); ?></a>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-md-12">
                <?php if(!empty($mps)): ?>
                    <?php foreach ($mps as $key => $mp): ?>
                        <div class="forum-bloc p10">
                            <div class="row">
                                <div class="forum-category-icone col-xs-2 col-md-1 text-center">
                                    <?php if(!$mp['Conversation']['read']): ?>
                                        <i class="fa fa-envelope-open forum-category-fa" aria-hidden="true"></i>
                                    <?php else: ?>
                                        <i class="fa fa-envelope forum-category-fa" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-7 col-md-7 col-sm-6">
                                    <div class="pull-right">
                                        <a href="<?= $this->Html->url('/message/delete/'.$mp['Conversation']['id_conversation']); ?>" title="Supprimer le message">
                                            <i class="fa fa-times" style="color:#9f191f" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <h3 class="forum-category-title"><a href="<?= $mp['Conversation']['href']; ?>"><?= h($mp['Conversation']['title']); ?></a></h3>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-3 hidden-mob forum-category-last">
                                    <?= $Lang->get('FORUM__AUTHOR'); ?> : <a style="color:#<?= $mp['Conversation']['user_color']; ?>" href="<?= $this->Html->url('/user/'.$mp['Conversation']['user'].'.'.$mp['Conversation']['author_id'].'/'); ?>"><?= $mp['Conversation']['user']; ?></a><br />
                                    <?= $Lang->get('FORUM__LASTMSG'); ?> : <?= $mp['Conversation']['last_msg_date']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>