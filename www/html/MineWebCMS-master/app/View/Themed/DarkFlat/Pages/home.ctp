<div class="jumbotron">
    <div class="container">
        <img src="<?= $theme_config['logo_site'] ?>" style="width: 200px" alt="Logo"><br>
        <a onclick="$('#alink').animatescroll();">OUVRIR LE SITE</a>
		<div class="row">
                <div class="col-md-3">
                    <div class="box">
                        <h2><i class="fa fa-<?= $theme_config['modif_fa1'] ?>"></i><br><?= $theme_config['modif_title1'] ?></h2>
                        <p class="content"><?= $theme_config['modif_desc1'] ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <h2><i class="fa fa-<?= $theme_config['modif_fa2'] ?>"></i><br><?= $theme_config['modif_title2'] ?></h2>
                        <p class="content"><?= $theme_config['modif_desc2'] ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <h2><i class="fa fa-<?= $theme_config['modif_fa3'] ?>"></i><br><?= $theme_config['modif_title3'] ?></h2>
                        <p class="content"><?= $theme_config['modif_desc3'] ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <h2><i class="fa fa-<?= $theme_config['modif_fa4'] ?>"></i><br><?= $theme_config['modif_title4'] ?></h2>
                        <p class="content"><?= $theme_config['modif_desc4'] ?></p>
                    </div>
                </div>
        </div>
	</div>
</div>
<div id="alink"></div>
<div class="content">
        <div class="container">
		<h1>DERNIERES NEWS</h1>
			<div class="row">
				<?php
				if(!empty($search_news)) {

				  $i = 0;
				  foreach ($search_news as $news) {

					$i++;

					if($i > 3) {
					  break;
					}
							echo '<div class="col-md-4">';
							echo '<div class="product">';
								echo '<h3><a style="color:#c0392b;" href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'">'.cut($news['News']['title'], 15).'</a></h3>';
										echo '<span class="entry-author"><i class="fa fa-pencil"></i>&nbsp;';
										echo $Lang->get('GLOBAL__BY').' <a style="color:#c0392b;" href="#">'.$news['News']['author'].'</a> '.$Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']);;
										echo '</span>';
										echo '<p>';
										echo $this->Text->truncate($news['News']['content'], 170, array('ellipsis' => '...', 'html' => true));
										echo '<ul>';
									echo '<li><a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'" class="link">'.$Lang->get('NEWS__READ_MORE').'</a></li>';
									echo '</ul>';
								echo '</div>';
							echo '</div>';
					}
				} else {
				  echo '<div class="product">';
				  echo '<div class="btn btn-success btn-block">'.$Lang->get('NEWS__NONE_PUBLISHED').'</div>';
				  echo '</div>';
				}
				?>
			</div>
		</div>
</div>		

<?= $Module->loadModules('home') ?>
 