<?php
App::import('Controller', 'TicketController');
$TicketSupport = new TicketController();
?>
<?= $this->Html->css('Support.jquery.cleditor.css'); ?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><?= $Lang->get('SUPPORT') ?></h1>
            </div>
            <div class="col-md-4">
                <?php if($ticket['Ticket']['state'] == 0 || $ticket['Ticket']['state'] == 1){ ?>
                    <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="../" action="<?= $this->Html->url(array('controller' => 'Ticket', 'action' => 'ajax_clos')) ?>">
                        <a class="btn btn-primary" href="<?= $this->Html->url(array('controller' => 'Ticket', 'admin' => false, 'action' => 'index')) ?>"><i class="fa fa-arrow-left"></i> <?= $Lang->get('SUPPORT_BACK_TO_LIST'); ?></a>
                        <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                        <button class="btn btn-success" type="submit"><i class="fa fa-close"></i> <?= $Lang->get('SUPPORT__CLOSE'); ?></button>
                    </form>
                <?php }else{ ?>
                    <a class="btn btn-primary" href="<?= $this->Html->url(array('controller' => 'Ticket', 'admin' => false, 'action' => 'index')) ?>"><i class="fa fa-arrow-left"></i> <?= $Lang->get('SUPPORT_BACK_TO_LIST'); ?></a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2><?= $Lang->get('SUPPORT__PROBLEMQUESTION') ?> <?= $TicketSupport->getUser('pseudo', $ticket['Ticket']['author']); ?></h2>
            <hr>
            <div class="panel panel-default">
                <div style="word-wrap: break-word;" class="panel-body">
                    <?= $ticket['Ticket']['reponse_text']; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-12"><h2><?= $Lang->get('SUPPORT__ANSWER'); ?></h2><hr></div>
        <?php foreach($answers as $answer): ?>
            <div class="col-sm-8 <?php if($answer['ReplyTicket']['type'] == 1){ ?>pull-right<?php }?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            <?= $Lang->get('SUPPORT__ANSWERTO') ?> <?= $TicketSupport->getUser('pseudo', $answer['ReplyTicket']['author']); ?>
                        </h3>
                    </div>
                    <div style="word-wrap: break-word;" class="panel-body">
                        <?= $answer['ReplyTicket']['reply']; ?>
                    </div>
                    <div class="panel-footer">
                        <?= $Lang->get('SUPPORT__CREATEDATE') ?> <?= date('d m Y', $answer['ReplyTicket']['created']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?= $Lang->get('SUPPORT__REPLYTICKET') ?>
                    </h3>
                </div>
                <div class="box-body">
                    <?php if(!$ticket['Ticket']['state'] == 2){ ?>
                        <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="../" action="<?= $this->Html->url(array('controller' => 'Ticket', 'action' => 'ajax_reply')) ?>">
                            <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                            <textarea id="input" name="reponse_text"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('SUPPORT__REPLY') ?></button>
                        </form>
                    <?php }else{ ?>
                        <div class="alert alert-warning"><?= $Lang->get('SUPPORT__CLOSTICKETWARNING') ?></div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('Support.jquery.cleditor.min.js'); ?>
<script>$(document).ready(function() {  $("#input").cleditor();  });  </script>