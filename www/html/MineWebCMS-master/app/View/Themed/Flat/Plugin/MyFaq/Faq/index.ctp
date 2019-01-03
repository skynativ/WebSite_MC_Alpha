<br>
<div class="container">
    <div class="title"><?= $Lang->get('FAQ') ?></div>
        <div class="col-md-9">
            <?= (empty($faqs)) ? "<p>Aucune FAQ pour le moment</p>" : "" ?>
            <?php foreach ($faqs as $k => $v): $v = current($v); ?>
                <div class="panel panel-default">
                    <div class="panel-body i-news">
                        <div class="col-md-12">
                            <div class="title"><?= $v['question'] ?></div>
                        <p>
                            <?= $v['answer'] ?>
                        </p>
						</div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
				<?php if($theme_config['sidebar_option'] == "true") { ?>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body i-news">
				   <div class="col-md-13">
					   <a><button class="btn btn-primary btn-block"><?= $theme_config['config_ip'] ?></button></a>
					   <a><button class="btn btn-primary btn-block"><?= ($banner_server) ? $banner_server : $Lang->get('SERVER__STATUS_OFF') ?></button></a>
					   <br>
					   <a href="https://www.youtube.com/<?= $theme_config['youtube'] ?>"><button class="btn btn-danger btn-block"><i class="fa fa-<?= $theme_config['fa-yt'] ?>"></i>  <?= $theme_config['youtube'] ?></button></a>
					   <a href="https://www.twitter.com/<?= $theme_config['twitter'] ?>"><button class="btn btn-info btn-block"><i class="fa fa-<?= $theme_config['fa-tw'] ?>"></i>  <?= $theme_config['twitter'] ?></button></a>
				   </div>
				</div>
			</div>
		</div>
		<?php } ?>
    </div>
