<?php
App::import('Controller', 'SupportController');
$Support = new SupportController();
?>
<section class="content">
	<div class="row">
		<?php $isUpdateImportant; ?>
		<?php if($isUpdateImportant == true): ?>
		<div class="col-sm-12">
			<div class="alert alert-warning">
				<b><?= $Lang->get('SUPPORT__WARNING_ALERT'); ?></b>
				<br /> <?= $Lang->get('SUPPORT__WARNING_ALERT_MAJ'); ?>
				<br /> <?= $Lang->get('SUPPORT__WARNING_ALERT_MAJ_MORE'); ?>
			</div>
		</div>
		<?php endif; ?>
        <div class="col-md-3">
			<div class="box box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title"><?= $Lang->get('SUPPORT__TICKET_ETAT_LIST'); ?></h3>
				  <div class="box-tools">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				  </div>
				</div>
				<div class="box-body no-padding">
					<ul class="nav nav-pills nav-stacked">
						<?php foreach($state_ticket as $st): ?>
							<li class="<?php if($st['isActive']):echo"active";endif;?>">
								<a href="support?state=<?= $st['id']; ?>"><?= $st['name']; ?> <span class="label label-<?= $st['customClass']; ?> pull-right"><?= $st['count']; ?></span></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
        </div>
        <div class="col-md-9">
			<div class="box box-<?= $stateCurrentData['customClass']; ?>">
				<div class="box-header with-border">
					<h3 class="box-title"><?= $Lang->get('SUPPORT__TICKET_TITLE'); ?></h3>
				</div>
				<?php if(empty($tickets)): ?>
					<div class="box-body">
						<?= $Lang->get('SUPPORT__TICKET_NOTHING_ETAT'); ?> <span class="label label-<?= $stateCurrentData['customClass']; ?>"><?= $stateCurrentData['name']; ?></span>
					</div>
				<?php else: ?>
				<div class="box-body no-padding">
					<div class="table-responsive mailbox-messages">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th><?= $Lang->get('SUPPORT__SUBJECT'); ?></th>
									<th><?= $Lang->get('SUPPORT__AUTHOR'); ?></th>
									<th><?= $Lang->get('SUPPORT__CATEGORIE'); ?></th>
									<th><?= $Lang->get('SUPPORT__STATE_TITLE'); ?></th>
									<th><?= $Lang->get('SUPPORT__CREATED'); ?></th>
									<th><?= $Lang->get('SUPPORT__ACTIONS'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($tickets as $ticket): ?>
								<tr>
									<td><?= htmlspecialchars(htmlentities(strip_tags($ticket['Ticket']['subject']))); ?></td>
									<td><?= $Support->getUser('pseudo', $ticket['Ticket']['author']); ?></td>
									<td><?= $Support->getCategorie($ticket['Ticket']['categorie']); ?></td>
									<td>
										<div class="label label-<?= $stateCurrentData['customClass']; ?>"><?= $stateCurrentData['name']; ?></div>
									</td>
									<td><?= date('d/m/Y', strtotime($ticket['Ticket']['created'])); ?></td>
									<td>
										<div class="btn-group">
											<?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('VIEW_TICKETS')){ ?>
												<a class="btn btn-primary" href="<?= $this->Html->url(array('plugin' => null, 'admin' => true, 'controller' => 'support', 'action' => 'ticket', $ticket['Ticket']['id'])); ?>"><i class="fa fa-eye"></i> <?= $Lang->get('SUPPORT__SHOW') ?></a>
											<?php }?>
											<button type="button" class="btn btn-<?= $stateCurrentData['customClass']; ?>"><i class="fa fa-cog"></i> <?= $Lang->get('SUPPORT__ACTIONS'); ?></button>
											<button type="button" class="btn btn-<?= $stateCurrentData['customClass']; ?> dropdown-toggle" data-toggle="dropdown">
												<span class="caret"></span>
												<span class="sr-only"><?= $Lang->get('SUPPORT__ACTIONS_DROPDOWN'); ?></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('CLOSE_TICKETS') && $ticket['Ticket']['state'] == 0 || $ticket['Ticket']['state'] == 1 || $ticket['Ticket']['state'] == 3){ ?>
													<li>
														<a href="<?= $this->Html->url(array('plugin' => null, 'admin' => true, 'controller' => 'support', 'action' => 'closa_adm', ''.$ticket['Ticket']['id'].'')) ?>"><i class="fa fa-bookmark"></i> <?= $Lang->get('SUPPORT__CLOSE') ?></a>
													</li>
												<?php }?>
												<?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('UNCLOSE_TICKETS') && $ticket['Ticket']['state'] == 2){ ?>
													<li>
														<a href="<?= $this->Html->url(array('plugin' => null, 'admin' => true, 'controller' => 'support', 'action' => 'unclosa_adm', ''.$ticket['Ticket']['id'].'')) ?>"><i class="fa fa-external-link-square"></i> <?= $Lang->get('SUPPORT__UNCLOSE') ?></a>
													</li>
												<?php }?>
												<?php if($Permissions->can('MANAGE_TICKETS') && $Permissions->can('DELETE_TICKETS')){ ?>
													<li>
														<a href="<?= $this->Html->url(array('plugin' => null, 'admin' => true, 'controller' => 'support', 'action' => 'delete_adm', ''.$ticket['Ticket']['id'].'')) ?>"><i class="fa fa-remove"></i> <?= $Lang->get('SUPPORT__DELETE') ?></a>
													</li>
												<?php }?>
											</ul>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					 </div>
				</div>
			</div>
			<?php endif; ?>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
