<?php if (!isset($theme_config['slider']) || $theme_config['slider'] == "true") { ?>
    <header id="myCarousel" class="carousel slide transition-timer-carousel">
        <div class="carousel-inner">
			<?php if (!empty($search_slider)) { ?>
				<?php $i = 0;
				foreach ($search_slider as $k => $v) { ?>
                    <div class="item<?php if ($i == 0) {
						echo ' active';
					} ?>">
                        <div class="fill" style="background-image:url('<?= $v['Slider']['url_img'] ?>');"></div>
                        <div class="carousel-caption">
                            <h2><?= before_display($v['Slider']['title']) ?></h2>
                            <p><?= before_display($v['Slider']['subtitle']) ?></p>
                        </div>
                    </div>
					<?php $i++;
				} ?>
			<?php } else { ?>
                <div class="item active">
                    <div class="fill" style="background-image:url('http://placehold.it/1905x420&text=1905x420');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 1</h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('http://placehold.it/1905x420&text=1905x420');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 2</h2>
                    </div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('http://placehold.it/1905x420&text=1905x420');"></div>
                    <div class="carousel-caption">
                        <h2>Caption 3</h2>
                    </div>
                </div>
			<?php } ?>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
        <!-- Timer "progress bar" -->
        <hr class="transition-timer-carousel-progress-bar animate">
    </header>
<?php } ?>
<div class="gray hidden-sm hidden-xs">
    <div class="container">
        <div class="text-center">
            <div class="desc-info">
				<?php if (!$banner_server):
					echo '<i class="fa fa-server icon-info"></i> Le serveur est éteint';
				else:
					echo '<i class="fa fa-users icon-info"></i> ' . $server_infos['GET_PLAYER_COUNT'] . ' joueur';
					if ($server_infos['GET_PLAYER_COUNT'] > 1) echo 's';
					echo ' connecté';
					if ($server_infos['GET_PLAYER_COUNT'] > 1) echo 's';
				endif;
				?>
            </div>
        </div>

    </div>
</div>
<div class="container bg">
    <div class="row">
		<?php if (!empty($search_news)) { ?>
            <ul id="items">
				<?php foreach ($search_news as $k => $v) { ?>
                    <li class="col-md-4 animated fadeInUp">
                        <div class="box">
                            <h2><?= cut($v['News']['title'], 22) ?></h2>
							<?php if (!empty($v['News']['img'])): ?>
                                <img src="<?= $v['News']['img']; ?>" class="img-responsive"/>
							<?php endif; ?>
                            <div>
                                <p><?= $this->Text->truncate($v['News']['content'], 177, array('ellipsis' => '...', 'html' => true)) ?></p>
                            </div>
                            <div class="border"></div>
                            <div class="btn-like">
                                <p><?= $v['News']['count_likes'] ?> <i class="fa fa-heart red"></i></p>
                            </div>
                            <div class="a-like pull-right">
                                <p>
                                    <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"><?= $Lang->get('NEWS__READ_MORE') ?>
                                        »</a></p>
                            </div>
                        </div>
                    </li>
				<?php } ?>
            </ul>
            <ol id="pagination"></ol>
		<?php } else {
			echo '<center><h3>' . $Lang->get('NEWS__NONE_PUBLISHED') . '</h3></center>';
		} ?>
    </div>
</div>
<div class="big-gray">
    <div class="container">
        <div class="row">
			<?php
				echo '<div class="title-network text-center">' . $Lang->get('GLOBAL__JOIN_US') . '</div>';
				if (!empty($skype_link)) {
					echo '<div class="col-md-3 center-icon"><a href="' . $skype_link . '" target="_blank" class="btn btn-lg btn-skype"><img src="' . $this->Html->url('/theme/mineflat/img/skype.png') . '"></a></div>';
				}
				if (!empty($youtube_link)) {
					echo '<div class="col-md-3 center-icon"><a href="' . $youtube_link . '" target="_blank" class="btn btn-lg btn-youtube"><img src="' . $this->Html->url('/theme/mineflat/img/yt.png') . '"></a></div>';
				}
				if (!empty($twitter_link)) {
					echo '<div class="col-md-3 center-icon"><a href="' . $twitter_link . '" target="_blank" class="btn btn-lg btn-twitter"><img src="' . $this->Html->url('/theme/mineflat/img/twitter.png') . '"></a></div>';
				}
				if (!empty($facebook_link)) {
					echo '<div class="col-md-3 center-icon"><a href="' . $facebook_link . '" target="_blank" class="btn btn-lg btn-facebook"><img src="' . $this->Html->url('/theme/mineflat/img/fb.png') . '"></a></div>';
				}
			?>
			<?php
				foreach ($findSocialButtons as $key => $value) {
					echo '<div class="col-md-3 center-icon"><a target="_blank" class="btn btn-primary" style="background-color:' . $value['SocialButton']['color'] . '!important;color:white;font-size:18px;margin: 0 5px;" href="' . $value['SocialButton']['url'] . '">';
					if (!empty($value['SocialButton']['img'])) {
						echo '<img src="' . $value['SocialButton']['img'] . '">';
					}
					if (!empty($value['SocialButton']['title'])) {
						echo (!empty($value['SocialButton']['img'])) ? '<br>' . $value['SocialButton']['title'] : $value['SocialButton']['title'];
					}
					echo '</a></div>';
				}
			?>
        </div>
    </div>
</div>
<div class="m-b--50"></div>
<?= $Module->loadModules('home') ?>
