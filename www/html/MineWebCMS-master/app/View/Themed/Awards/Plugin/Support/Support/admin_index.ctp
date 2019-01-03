<?php
App::import('Controller', 'SupportController');
$Support = new SupportController();
?>
<section class="content">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title_for_layout; ?></h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?= $Lang->get('SUPPORT__SUBJECT') ?></th>
                            <th><?= $Lang->get('SUPPORT__AUTHOR') ?></th>
                            <th><?= $Lang->get('SUPPORT__CATEGORIE') ?></th>
                            <th><?= $Lang->get('SUPPORT__STATE_TITLE') ?></th>
                            <th><?= $Lang->get('SUPPORT__CREATED') ?></th>
                            <th><?= $Lang->get('SUPPORT__ACTIONS') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tickets as $ticket): ?>
                        <tr>
                            <td><?= htmlspecialchars(htmlentities(strip_tags($ticket['Ticket']['subject']))); ?></td>
                            <td><?= $Support->getUser('pseudo', $ticket['Ticket']['author']); ?></td>
                            <td><?= $Support->getCategorie($ticket['Ticket']['categorie']); ?></td>
                            <td>
                                <?php
                                switch($ticket['Ticket']['state'])
                                {
                                    case '0':
                                        echo '<div class="label label-warning">'.$Lang->get('SUPPORT__STATE_1').'</div>';
                                        break;
                                    case '1':
                                        echo '<div class="label label-info">'.$Lang->get('SUPPORT__STATE_0').'</div>';
                                        break;
                                    case '2':
                                        echo '<div class="label label-success">'.$Lang->get('SUPPORT__STATE_2').'</div>';
                                        break;
                                    case '3':
                                        echo '<div class="label label-warning">'.$Lang->get('SUPPORT__STATE_3').'</div>';
                                        break;
                                }
                                ?>
                            </td>
                            <td><?= date('d m Y', $ticket['Ticket']['created']); ?></td>
                            <td>
                                <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('VIEW_TICKETS')){ ?>
                                <div class="col-sm-2">
                                  <a style="margin-right: 10px;" class="btn btn-primary" href="<?= $this->Html->url(array('plugin' => null, 'admin' => true, 'controller' => 'support', 'action' => 'ticket', $ticket['Ticket']['id'])); ?>">
                                      <i class="fa fa-eye"></i> <?= $Lang->get('SUPPORT__SHOW') ?>
                                  </a>
                                </div>
                                <?php }?>
                                <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('CLOSE_TICKETS') && $ticket['Ticket']['state'] == 0 || $ticket['Ticket']['state'] == 1 || $ticket['Ticket']['state'] == 3){ ?>
                                    <div class="col-sm-2">
                                      <form style="margin-right: 10px;" method="post" class="form-horizontal" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_closa')) ?>">
                                          <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                                          <button type="submit" class="btn btn-success" href="#"><i class="fa fa-bookmark"></i> <?= $Lang->get('SUPPORT__CLOSE') ?></button>
                                      </form>
                                    </div>
                                <?php }?>
                                <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('UNCLOSE_TICKETS') && $ticket['Ticket']['state'] == 2){ ?>
                                    <div class="col-sm-2">
                                        <form style="margin-right: 10px;" method="post" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_unclosa')) ?>">
                                            <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                                            <button type="submit" class="btn btn-warning" href="#"><i class="fa fa-external-link-square"></i> <?= $Lang->get('SUPPORT__UNCLOSE') ?></button>
                                        </form>
                                    </div>
                                <?php }?>
                                <?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('DELETE_TICKETS')){ ?>
                                  <div class="col-sm-2">
                                    <form style="margin-right: 10px;" method="post" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'plugin' => 'Support', 'action' => 'ajax_ticket_delete')) ?>">
                                        <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                                        <button type="submit" class="btn btn-danger" href="#"><i class="fa fa-remove"></i> <?= $Lang->get('SUPPORT__DELETE') ?></button>
                                    </form>
                                  </div>
                                <?php }?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
