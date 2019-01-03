<div class="stats">
    <div class="container">
        <img src="<?= $theme_config['logo_site'] ?>" style="width: 200px" alt="Logo"><br>
	</div>
</div>
<div class="content">
	<div class="container">
	<h1>FAQ</h1>
		<div class="row">
				<?= (empty($faqs)) ? "<p>Aucune FAQ pour le moment</p>" : "" ?>
				<?php foreach ($faqs as $k => $v): $v = current($v); ?>
				<div class="product" style="margin-bottom:25px">
				<h4><?= $v['question'] ?></h4>
				<p>
					<?= $v['answer'] ?>
				</p>
			</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>	
	
