<br>
<div class="container">
	<div class="title"><?= $Lang->get('NEWS__LAST_TITLE') ?></div>
		<div class="col-md-8">
					
				<?php
				if(!empty($search_news)) {

				  $i = 0;
				  foreach ($search_news as $news) {

					$i++;

					if($i > 3) {
					  break;
					}
					
					echo '<div class="panel panel-default">';
						echo '<div class="panel-body i-news">';
							echo '<div class="col-md-12">';
								echo '<div class="title"><a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'">'.cut($news['News']['title'], 15).'</a></div>';
									echo '<span class="entry-author"><i class="fa fa-pencil"></i>&nbsp;';
										echo $Lang->get('GLOBAL__BY').' <a href="#">'.$news['News']['author'].'</a> '.$Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']);;
										echo '</span>';
										echo '<p>';
										echo $this->Text->truncate($news['News']['content'], 170, array('ellipsis' => '...', 'html' => true));
										echo '<div class="text-right">';
									echo '<a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'" class="btn btn-success btn-xs">'.$Lang->get('NEWS__READ_MORE').'</a>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
					}
				} else {
				  echo '<div class="alert alert-danger">'.$Lang->get('NEWS__NONE_PUBLISHED').'</div>';
				}
				?>
		</div>
		<div class="col-md-4">
		<?= $this->element('sidebar') ?>
		</div>
</div>


<?= $Module->loadModules('home') ?>
 