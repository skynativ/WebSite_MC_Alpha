	<div class="top-wrapper" style="background-image: url('<?php if(empty($theme_config['header'])) { echo "/theme/MineBox/images/header.png"; } else { echo $theme_config['header']; } ?>')">
		<div class="tp-banner-holder">
			<div class="tp-banner-holder-inner">
				<div class="tp-banner-container">
					<div class="tp-banner" >
						<ul>
							<li data-transition="fadetobottomfadefromtop" data-slotamount="7" data-masterspeed="1500" >
								<img src="/theme/MineBox/images/transparent.png" alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
								<div class="tp-caption eco-large eco-color-primary customin customout fadeout"
									data-x="415"
									data-y="190"
									data-speed="500"
									data-start="400"
									data-easing="Power4.easeOut"
									data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
									data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
									data-endeasing="Power1.easeIn"><?= $theme_config['header_text_1']; ?>
								</div>
								<div class="tp-caption eco-lg-light customin customout fadeout"
									data-x="455"
									data-y="230"
									data-speed="800"
									data-start="1200"
									data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
									data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
									data-easing="Power4.easeOut"><?= $theme_config['header_text_2']; ?>
								</div>
								
							</li>		
						</ul>
					</div>
				</div>

				<div class="slider-infobar">
					<i class="fa infobar-trigger"></i>
					<ul>
						<li>
							<span class="highlight">Il y a <?= $server_infos['GET_PLAYER_COUNT'] ?> Joueur en ligne</span>
						</li>
						<li>
							<span class="highlight"><?= $theme_config['ip_server']; ?></span>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>