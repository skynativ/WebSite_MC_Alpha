<!-- Slider -->
<?php if(isset($theme_config['slider']) && $theme_config['slider'] == "true") { ?>
    <div class="col-lg-12">
        <div class="swiper-container" style="height: 350px; margin-bottom: 20px;">
            <div class="swiper-wrapper">
                <?php if(!empty($search_slider)) { ?>
                    <?php $i = 0; foreach ($search_slider as $k => $v) { ?>
                        <div class="swiper-slide img-responsive" style="background-size: cover; background-image:url('<?= $v['Slider']['url_img'] ?>');">
                            <div class="swiper-description">
                                <h1><?= before_display($v['Slider']['title']) ?></h1>
                                <p><?= before_display($v['Slider']['subtitle']) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                <div class="swiper-slide" style="background-image:url('http://placehold.it/1905x420&text=1905x420'); background-size: contain"></div>
                <div class="swiper-slide" style="background-image:url('http://placehold.it/1905x420&text=1905x420'); background-size: contain"></div>
                <div class="swiper-slide" style="background-image:url('http://placehold.it/1905x420&text=1905x420'); background-size: contain"></div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <script>
    $(document).ready(function () {
      var mySwiper = new Swiper ('.swiper-container', {autoplay: 5000,})});
      jQuery(function($){$('ul#items').easyPaginate({step:3});
    });
    </script>
<?php } ?>
