<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" />
<?= $this->Html->css('Staff.style.css') ?>
<br>
<div class="container">
    <div class="row">
		<?php foreach ($staffs as $staff): ?>
            <div class="col-md-4">
                <div class="thumbnailstaff text-center" style="padding:15px">
                    <img class="img-circle responsive-img" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false, $staff['Staff']['username'], 64)) ?>" alt="">
                
                    <p class="staff-username"><?= $staff['Staff']['username'] ?></p>
                    <p class="staff-rank" style="color:<?= $staff['Staff']['color'] ?>"><?= $staff['Staff']['rank'] ?></p>
                    
                    <div class="">
                        <?php if(!empty($staff['Staff']['facebook_url'])): ?>
                            <a target="_blank" class="staff-i staff-facebook" href="<?= $staff['Staff']['facebook_url']; ?>"><i class="fab fa-facebook fa-border fa-2x" aria-hidden="true"></i></a>
                        <?php endif; ?>
						<?php if(!empty($staff['Staff']['reddit_url'])): ?>
                            <a target="_blank" class="staff-i staff-reddit" href="<?= $staff['Staff']['reddit_url']; ?>"><i class="fab fa-reddit fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(!empty($staff['Staff']['twitter_url'])): ?>
                            <a target="_blank" class="staff-i staff-twitter" href="<?= $staff['Staff']['twitter_url']; ?>"><i class="fab fa-twitter fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(!empty($staff['Staff']['googleplus_url'])): ?>
                            <a target="_blank" class="staff-i staff-googleplus" href="<?= $staff['Staff']['googleplus_url']; ?>"><i class="fab fa-google-plus-g fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(!empty($staff['Staff']['youtube_url'])): ?>
                            <a target="_blank" class="staff-i staff-youtube" href="<?= $staff['Staff']['youtube_url']; ?>"><i class="fab fa-youtube fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(!empty($staff['Staff']['weibo_url'])): ?>
                            <a target="_blank" class="staff-i staff-weibo" href="<?= $staff['Staff']['weibo_url']; ?>"><i class="fab fa-weibo fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(!empty($staff['Staff']['github_url'])): ?>
                            <a target="_blank" class="staff-i staff-github" href="<?= $staff['Staff']['github_url']; ?>"><i class="fab fa-github fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
						<?php if(!empty($staff['Staff']['instagram_url'])): ?>
                            <a target="_blank" class="staff-i staff-instagram" href="<?= $staff['Staff']['instagram_url']; ?>"><i class="fab fa-instagram fa-border fa-2x" aria-hidden="true"></i></a>
						<?php endif; ?>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>