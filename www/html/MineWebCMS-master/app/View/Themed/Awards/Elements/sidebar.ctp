<?php if(!isset($theme_config['slider']) || $theme_config['slider'] == "true") { ?>
<div class="carousel-widget wow zoomIn">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php if(!empty($search_slider)) { ?>
            <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
            <div class="item<?php if($i == 0) { echo ' active'; } ?>">
                <img src="<?= $v['Slider']['url_img'] ?>" alt="slide">
                <div class="carousel-caption">
                    <h3>
                        <?= before_display($v['Slider']['title']) ?>
                    </h3>
                </div>
            </div>
            <?php $i++; } ?>
            <?php } else { ?>
            <div class="item active">
                <img src="theme/Awards/img/carousel-widget/slider1.jpg" alt="slide_1">
                <div class="carousel-caption">
                    <h3>Rejoignez-nous dès maintenant sur <?php echo $website_name ?></h3>
                </div>
            </div>
            <div class="item">
                <img src="theme/Awards/img/carousel-widget/slider2.jpg" alt="slide_2">
                <div class="carousel-caption">
                    <h3>Insérez le texte que vous souhaitez ici</h3>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Précédent</span>
  </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Suivant</span>
  </a>
    </div>
</div>
<?php } ?>

<?php if(!isset($theme_config['social_global']) || $theme_config['social_global'] == "true") { ?>
<div class="socials-widget wow zoomIn">
   <h3 class="socials-title theme-color-text">Nos réseaux sociaux</h3>
   <div class="separation"></div>
   <div class="socials-flex">
       <?php
        $howManyBtns = 0;
        $howManyBtns += (!empty($facebook_link));
        $howManyBtns += (!empty($twitter_link));
        $howManyBtns += (!empty($youtube_link));
        $howManyBtns += (!empty($skype_link));
        $howManyBtns += count($findSocialButtons);

        $maxBtnsByLine = 4;
        $howManyBtnsDivided = ceil( $howManyBtns / ceil( $howManyBtns / $maxBtnsByLine ) );
        $col = 12 / $howManyBtnsDivided;

        if(!empty($facebook_link)) {
          echo '<a href="'.$facebook_link.'" class="social-badge facebook">              
                <div class="icon"><i class="fa fa-facebook"></i></div>
            </a>';
        }
        if(!empty($twitter_link)) {
          echo '<a href="'.$twitter_link.'" class="social-badge twitter">              
                <div class="icon"><i class="fa fa-twitter"></i></div>
            </a>';
        }
        if(!empty($youtube_link)) {
          echo '<a href="'.$youtube_link.'" class="social-badge youtube">              
                <div class="icon"><i class="fa fa-youtube-play"></i></div>
            </a>';
        }
        if(!empty($skype_link)) {
          echo '<a href="'.$skype_link.'" class="social-badge skype">              
                <div class="icon"><i class="fa fa-skype"></i></div>
            </a>';
        }
        foreach ($findSocialButtons as $key => $value) {
          echo '<a href="'.$value['SocialButton']['url'].'" class="social-badge" style="background-color:'.$value['SocialButton']['color'].';">';
          if(!empty($value['SocialButton']['img'])) {
            echo '<div class="icon" onmouseover="iconSocialIn();" onmouseout="iconSocialOut();"><img id="icon-social" src="'.$value['SocialButton']['img'].'"></div></a>';
          }
        }
      ?>
   </div>
</div>
<?php } ?>

<?php if(!isset($theme_config['discord_global']) || $theme_config['discord_global'] == "true") { ?>
<div class="discord-widget wow zoomIn">
   <h3 class="discord-title theme-color-text">Rejoignez-nous sur Discord</h3>
   <div class="separation"></div>
    <iframe src="https://discordapp.com/widget?id=<?= $theme_config['discord_id'] ?>&theme=dark" allowtransparency="true" frameborder="0"></iframe>
</div>
<?php } ?>
