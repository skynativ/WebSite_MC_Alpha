<?php if(!isset($theme_config['slider']) || $theme_config['slider'] == "true") { ?>
<div id="myCarousel" class="carousel slide hidden-sm hidden-xs" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php if(!empty($search_slider)) { ?>
        <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
        <div class="item<?php if($i == 0) { echo ' active'; } ?>">
            <img src="<?= $v['Slider']['url_img'] ?>" alt="slide">
            <div class="carousel-caption theme-color-border wow bounceIn">
                <h3>
                    <?= before_display($v['Slider']['title']) ?>
                </h3>
                <p>
                    <?= before_display($v['Slider']['subtitle']) ?>
                </p>
            </div>
        </div>
        <?php $i++; } ?>
        <?php } else { ?>
        <div class="item active">
            <img src="http://lorempixel.com/1920/500/city" alt="slide_1">
            <div class="carousel-caption theme-color-border wow bounceIn">
                <h3>Bienvenue sur <span class="theme-color-text"><?php echo $website_name ?></span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus pariatur quibusdam, provident ea quia nemo ipsum nam, voluptate, est aliquam neque vitae accusantium accusamus rem ipsam! Quibusdam quis, voluptatum vel.</p>
            </div>
        </div>
        <div class="item">
            <img src="http://lorempixel.com/1920/500/cats" alt="slide_1">
            <div class="carousel-caption theme-color-border wow bounceIn">
                <h3>Bienvenue sur <span class="theme-color-text"><?php echo $website_name ?></span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, fugiat ea pariatur beatae inventore praesentium architecto maiores ad obcaecati eaque cumque, voluptas ut sunt veritatis assumenda consequatur magnam iste vero.</p>
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
<?php } ?>