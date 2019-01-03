	<main class="main-content">
		<div class="container">

			<section class="section">
				<div class="title-bordered" data-animation="fadeInUp" data-animation-delay="0">
					<h2><?= $theme_config['section_infobox']; ?></h2>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<div class="icobox icobox__primary" data-animation="fadeInUp" data-animation-delay="200">
							<div class="icobox-holder">
								<div class="triangle-top"></div>
								<i><img src="<?php if(empty($theme_config['url_logo_infobox_1'])) { echo "theme/MineBox/images/mobs.png"; } else { echo $theme_config['url_logo_infobox_1']; } ?>" style="width:100%"></i>
								
								<div class="triangle-bottom"></div>
							</div>
							<div class="icobox-desc">
								<div class="icobox-desc-inner1">
									<div class="icobox-desc-inner2">
										<h3><?= $theme_config['titre_infobox_1']; ?></h3>
										<p><?= $theme_config['contenu_infobox_1']; ?></p>
										<a href="<?= $theme_config['url_infobox_1']; ?>" class="btn btn-primary" rel="shadowbox;height=140;width=120"><?= $theme_config['bouton_infobox_1']; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="icobox icobox__secondary" data-animation="fadeInUp" data-animation-delay="400">
							<div class="icobox-holder">
								<div class="triangle-top"></div>
								<i><img src="<?php if(empty($theme_config['url_logo_infobox_2'])) { echo "theme/MineBox/images/money.png"; } else { echo $theme_config['url_logo_infobox_2']; } ?>" style="width:100%"></i>
								<div class="triangle-bottom"></div>
							</div>
							<div class="icobox-desc">
								<div class="icobox-desc-inner1">
									<div class="icobox-desc-inner2">
										<h3><?= $theme_config['titre_infobox_2']; ?></h3>
										<p><?= $theme_config['contenu_infobox_2']; ?></p>
										<a href="<?= $theme_config['url_infobox_2']; ?>" class="btn btn-secondary" rel="shadowbox;height=140;width=120"><?= $theme_config['bouton_infobox_2']; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="icobox icobox__tertiary" data-animation="fadeInUp" data-animation-delay="600">
							<div class="icobox-holder">
								<div class="triangle-top"></div>
								<i><img src="<?php if(empty($theme_config['url_logo_infobox_3'])) { echo "theme/MineBox/images/banhammer.png"; } else { echo $theme_config['url_logo_infobox_3']; } ?>" style="width:100%"></i>
								<div class="triangle-bottom"></div>
							</div>
							<div class="icobox-desc">
								<div class="icobox-desc-inner1">
									<div class="icobox-desc-inner2">
										<h3><?= $theme_config['titre_infobox_3']; ?></h3>
										<p><?= $theme_config['contenu_infobox_3']; ?></p>
										<a href="<?= $theme_config['url_infobox_3']; ?>" class="btn btn-tertiary" target="_blank"><?= $theme_config['bouton_infobox_3']; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="icobox icobox__info" data-animation="fadeInUp" data-animation-delay="800">
							<div class="icobox-holder">
								<div class="triangle-top"></div>
								<i><img src="<?php if(empty($theme_config['url_logo_infobox_4'])) { echo "theme/MineBox/images/random-items.png"; } else { echo $theme_config['url_logo_infobox_4']; } ?>" style="width:100%"></i>
								<div class="triangle-bottom"></div>
							</div>
							<div class="icobox-desc">
								<div class="icobox-desc-inner1">
									<div class="icobox-desc-inner2">
										<h3><?= $theme_config['titre_infobox_4']; ?></h3>
										<p><?= $theme_config['contenu_infobox_4']; ?></p>
										<a href="<?= $theme_config['url_infobox_4']; ?>" class="btn btn-info" target="_blank"><?= $theme_config['bouton_infobox_4']; ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<div class="spacer-lg"></div>


			<div class="title-bordered" data-animation="fadeInUp" data-animation-delay="0">
				<h2>Nouvelles</h2>
			</div>
			<div class="container">
				<div class="blog-page">
					<div class="row">
						<div class="col-lg-12 col-md-12 padding-right-30">
						<br>
							<?php if(empty($theme_config['limit_news'])) { $theme_config['limit_news'] = "1"; } ?>
							<?php $i = 0; foreach($search_news as $news) { $i++; if($i > $theme_config['limit_news']) { break; } ?>
							<div class="blog-post">
								<div class="post-content">
								<h3><a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])); ?>"><?= $news['News']['title']; ?></a></h3>
									<ul class="post-meta">
										<li>Publié le <?= $Lang->date($news['News']['created']); ?></li>
										<li><?= $news['News']['count_likes'] ?> <i class="fa fa-thumbs-up"></i></li>
										<li><?= $news['News']['count_comments'] ?> <i class="fa fa-comments" aria-hidden="true"></i></li>
									</ul>
									<p><?= $this->Text->truncate($news['News']['content'], 400, array('ellipsis' => '...', 'html' => true)); ?></p>
									<a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])); ?>" class="read-more"><?= $Lang->get('NEWS__READ_MORE'); ?> <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="spacer-lg"></div>

			<div class="cta cta__fullw">
				<?= $theme_config['join_server']; ?>
				<strong><?= $theme_config['ip_server']; ?></strong>
			</div>

		</div>
	</main>