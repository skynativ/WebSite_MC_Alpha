<div class="footer-wrap">
		<footer class="footer">
			<div class="container">
				<!-- Widgets -->
				<section class="footer-widgets">
					<div class="row">
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="widget widget__footer">
								<h4 class="widget-title"><?= $website_name ?></h4>
								<div class="widget-body">
									<ul class="info-list">
										<li><?= $theme_config['description'] ?></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="widget widget__footer">
								<h4 class="widget-title">Statistiques</h4>
								<div class="widget-body">
									<ul class="info-list">
										<li><i class="fa fa-angle-double-right"></i> Inscrits aujourd'hui : <b><?= $users_count_today ?></b></li>
										<li><i class="fa fa-angle-double-right"></i> Visites du jour : <b><?= $visits_count_today ?></b></li>
										<li><i class="fa fa-angle-double-right"></i> Achats en boutique : <b><?php if($EyPlugin->isInstalled('eywek.shop')) { ?><?= ClassRegistry::init('Shop.ItemsBuyHistories')->find('count') ?><?php } ?></b></li>
										<li><i class="fa fa-angle-double-right"></i> Dernier inscrit : <b><?= $users_last['pseudo'] ?></b></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="clearfix visible-xs"></div>
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="widget widget__footer">
								<h4 class="widget-title">Meilleur Voteurs</h4>
								<div class="widget-body">
									<ul class="info-list">
										<li>
											<div class="top-voteur">
												<?php if($EyPlugin->isInstalled('eywek.vote')) { ?>
												<?php
													$users_vote = ClassRegistry::init('Vote.Vote')->find('all', [
													'fields' => ['username', 'COUNT(id) AS count'],
													'conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%'],
													'order' => 'count DESC',
													'group' => 'username',
													'limit' => 3
													]);
												?>
												<?php } else { ?>
													<div class="alert alert-danger"><b>Erreur :</b> Le plugin vote n'est pas installé.</div>
												<?php } ?>
													<?php $i_cl = 0;foreach($users_vote as $userv): $i_cl++; ?>
													<div class="player-info">
														<div class="title-votes">
															<img src='<?= $this->Html->url(['controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $userv['Vote']['username'], 32]); ?>' class='img-rounded' alt=''>
														</div>
														
														<strong class="player-name" style="text-transform: uppercase"><?= $userv['Vote']['username']; ?></strong>
														<div class="votes"><?= $userv[0]['count']; ?> vote<?php if($userv[0]['count'] == 1){ ?> <?php }else{ ?>s<?php }?></div>
													</div>
												<?php endforeach; ?>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="widget widget__footer">
								<h4 class="widget-title">Social</h4>
								<div class="widget-body">
									<ul class="social-list social-list__footer list-unstyled">
										<?php if (!empty($findSocialButtons)): foreach ($findSocialButtons as $key => $value): ?>
										<?php endforeach; endif; ?>
										<?php if(!empty($facebook_link)): ?>
											<li><a href="<?= $facebook_link ?>"><i class="fa fa-facebook"></i></a></li>
										<?php endif; if(!empty($twitter_link)): ?>
											<li><a href="<?= $twitter_link ?>"><i class="fa fa-twitter"></i></a></li>
										<?php endif; if(!empty($youtube_link)): ?>
											<li><a href="<?= $youtube_link ?>"><i class="fa fa-youtube"></i></a></li>
										<?php endif; if(!empty($skype_link)): ?>
											<li><a href="<?= $skype_link ?>"><i class="fa fa-skype"></i></a></li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</footer>

		<div class="copyright">
			<div class="container">
				<a href="#" target="_blank"><b><?= $website_name ?></b></a> - <?php echo date("Y");?> | <?= $theme_config['copyright_text']; ?><br/>
				<span class="copy-txt">Thème <b>MineBox</b> par <b>Kuro</b> | Propulsé par <a href="http://www.mineweb.org" target="_blank"><b>Mineweb</b></a></span>
				
			</div>
		</div>
	</div>