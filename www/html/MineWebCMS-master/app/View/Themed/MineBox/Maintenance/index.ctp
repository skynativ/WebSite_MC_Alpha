<br><br><br>
<div class="container">
    <div class="row">
    	<div class="panel panel-default">
		  <div class="panel-body">
			<img class="logo" src="<?php if(empty($theme_config['logo'])) { echo "/theme/MineBox/images/Logo.png"; } else { echo $theme_config['logo']; } ?>" />
			<h1 class="title">Maintenance<span class="points">...</span></h1>
			<div class="text">
				<?= $msg ?>
			</div>
		  </div>
		</div>
    </div>
</div>