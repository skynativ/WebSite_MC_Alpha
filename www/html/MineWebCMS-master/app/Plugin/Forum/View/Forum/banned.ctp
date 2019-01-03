<?= $this->Html->css('Forum.forum-style.css?'.rand(1, 1000000)) ?>
<?= $this->Html->css('Forum.custom.css') ?>

<div class="background-forum">
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center banned"><?= $Lang->get('FORUM__PHRASE__PAGE__BANNED'); ?></h1>
                <p class="text-center"><?= $Lang->get('FORUM__PHRASE__PAGE__BANNED_1'); ?><?= $infos['date']; ?><?= $Lang->get('FORUM__PHRASE__PAGE__BANNED_2'); ?> <b><?= $infos['user']; ?></b> <?= $Lang->get('FORUM__PHRASE__PAGE__BANNED_3'); ?></p>
                <p class="text-center">
                    <i class="fa fa-quote-left fa-2x" aria-hidden="true"></i> <span class="padding-banned"><?= $infos['reason']; ?></span> <i class="fa fa-quote-right fa-2x" aria-hidden="true"></i>
                </p>
            </div>
        </div>
    </div>
</div>
