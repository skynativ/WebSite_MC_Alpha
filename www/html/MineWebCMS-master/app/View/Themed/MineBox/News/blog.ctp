<div class="container">
    <div class="row">
	<br>
		<div class="title-bordered animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0">
			<h2><span class="line line__left"></span>Nouvelles<span class="line line__right"></span></h2>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
		<?php foreach ($search_news as $news) {?>
			<div class="well">
				<a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])) ?>"><h3><b><?= $news['News']['title'] ?></b></h3></a>
				<p><b><?= $Lang->get('GLOBAL__UPDATED') ?> : </b><?= $Lang->date($news['News']['updated']) ?></p>
				<p><b><?= $Lang->get('NEWS__COMMENTS_NBR') ?> : </b><?= $news['News']['count_comments'] ?></p>
				<p><b><?= $Lang->get('NEWS__LIKES_NBR') ?> : </b><?= $news['News']['count_likes'] ?></p>
					<hr>
				<p><?php $nmsg = substr($news['News']['content'], 0, 500); echo $nmsg; ?> ...</p>
				<a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])) ?>" class="btn btn-info">Lire plus</a>
			</div>
		<?php } ?>
	</div>
</div>
