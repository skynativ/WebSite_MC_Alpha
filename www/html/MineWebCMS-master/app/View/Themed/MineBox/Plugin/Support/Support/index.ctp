<?php
App::import('Controller', 'SupportController');
$Support = new SupportController();
?>
</br>
<div class="container">
  <div class="row">
	<div class="col-md-8">
    </div>
	</div>
	<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'support', 'action' => 'create')); ?>">
            <span class="icon is-small"><i class="fa fa-plus"></i></span> <span><?= $Lang->get('SUPPORT__CREATE'); ?></span>
        </a>
		<hr>
        <div>
          <table class="table">
            <thead>
              <tr>
                <th><?= $Lang->get('SUPPORT__SUBJECT') ?></th>
                <th><?= $Lang->get('SUPPORT__CATEGORIE') ?></th>
                <th><?= $Lang->get('SUPPORT__STATE_TITLE') ?></th>
                <th><?= $Lang->get('SUPPORT__CREATED') ?></th>
                <th><?= $Lang->get('SUPPORT__ACTIONS') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($tickets as $ticket): ?>
              <tr>
                <td><?=  htmlspecialchars(htmlentities(strip_tags($ticket['Ticket']['subject']))); ?></td>
                <td><?= $Support->getCategorie($ticket['Ticket']['categorie']); ?></td>
                <td>
                  <?php
                  switch($ticket['Ticket']['state'])
                  {
                    case '0':
                        echo '<div class="label label-warning"><i class="fa fa-warning"></i>'.$Lang->get('SUPPORT__STATE_0').'</div>';
                        break;
                    case '1':
                        echo '<div class="label label-info"><i class="fa fa-info-circle"></i>'.$Lang->get('SUPPORT__STATE_1').'</div>';
                        break;
                    case '2':
                        echo '<div class="label label-success"><i class="fa fa-check-circle-o"></i>'.$Lang->get('SUPPORT__STATE_2').'</div>';
                        break;
                    case '3':
                        echo '<div class="label label-warning"><i class=" fa fa-warning"></i>'.$Lang->get('SUPPORT__STATE_3').'</div>';
                        break;
                  }
                  ?>
                </td>
                <td><?= date('d/m/Y à H:m:s', strtotime($ticket['Ticket']['created'])); ?></td>
                <td>
                    <?php if($ticket['Ticket']['state'] == 0 || $ticket['Ticket']['state'] == 1){ ?>
                    <form method="post" class="form-horizontal" data-ajax="true" data-redirect-url="?" action="<?= $this->Html->url(array('controller' => 'Support', 'action' => 'ajax_clos')) ?>">
                        <a class="btn btn-info" href="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'support', 'action' => 'ticket', $ticket['Ticket']['id'])); ?>"><?= $Lang->get('SUPPORT__SHOW'); ?></a>
                        <input type="hidden" name="idTicket" value="<?= $ticket['Ticket']['id']; ?>">
                        <button type="submit" class="btn btn-success" href="#"><?= $Lang->get('SUPPORT__CLOSE') ?></button>
                    </form>
                    <?php }else{ ?>
                        <a class="btn btn-info" href="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'support', 'action' => 'ticket', $ticket['Ticket']['id'])); ?>"><?=$Lang->get('SUPPORT__SHOW') ?></a>
                    <?php }?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
