<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1><?= $Lang->get('SUPPORT') ?></h1>
      </div>
      <div class="col-md-4">
        <?php if($isConnected AND $Permissions->can('POST_TICKET')) { ?>
          <a href="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'support', 'action' => 'create')); ?>" style="margin-top:15px;" class="btn btn-template-main transparent btn-block"><icon class="fa fa-pencil-square-o"></icon> <?= $Lang->get('SUPPORT__CREATE') ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th><?= $Lang->get('SUPPORT__SUBJECT') ?></th>
                    <th><?= $Lang->get('SUPPORT__STATE_TITLE') ?></th>
                    <th><?= $Lang->get('SUPPORT__CREATED') ?></th>
                    <th><?= $Lang->get('SUPPORT__ACTIONS') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket['Ticket']['subject']; ?></td>
                        <td>
                            <?php
                            switch($ticket['Ticket']['state'])
                            {
                                case '0':
                                    echo '<div class="label label-warning">'.$Lang->get('SUPPORT__STATE_0').'</div>';
                                    break;
                                case '1':
                                    echo '<div class="label label-info">'.$Lang->get('SUPPORT__STATE_1').'</div>';
                                    break;
                                case '2':
                                    echo '<div class="label label-success">'.$Lang->get('SUPPORT__STATE_2').'</div>';
                                    break;
                            }
                            ?>
                        </td>
                        <td><?= date('d-m-Y', $ticket['Ticket']['created']); ?></td>
                        <td>
                            <?php if($ticket['Ticket']['state'] == 0 || $ticket['Ticket']['state'] == 1){ ?>
                                <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Ticket', 'action' => 'ajax_clos')) ?>">
                                    <a class="btn btn-primary" href="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'support', 'action' => 'ticket', $ticket['Ticket']['id'])); ?>"><?= $Lang->get('SUPPORT__SHOW'); ?></a>
                                    <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                                    <button type="submit" class="btn btn-success" href="#"><?= $Lang->get('SUPPORT__CLOSE') ?></button>
                                </form>
                            <?php }else{ ?>
                                <a class="btn btn-primary" href="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'support', 'action' => 'ticket', $ticket['Ticket']['id'])); ?>">Voir</a>
                            <?php }?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>