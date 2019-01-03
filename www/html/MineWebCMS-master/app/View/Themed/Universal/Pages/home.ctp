<?= $this->Html->css('owl.carousel') ?>
<?= $this->Html->css('owl.theme') ?>
<?= $this->Html->script('owl.carousel.min') ?>

<?php if(!empty($search_slider)) { ?>
  <section class="no-mb">
    <!-- *** HOMEPAGE CAROUSEL ***  -->
    <div class="home-carousel">

      <div class="homepage owl-carousel">

        <?php
          foreach ($search_slider as $k => $v) {

            echo '<div class="item" style="background-image:url('.$v['Slider']['url_img'].');">';
              echo '<div class="container">';
                echo '<div class="row">';
                  echo '<div class="col-sm-5" style="margin-top: 10%;">';
                    echo '<h1>'.before_display($v['Slider']['title']).'</h1>';
                    echo '<p>'.before_display($v['Slider']['subtitle']).'</p>';
                  echo '</div>';
                  echo '<div class="col-sm-7"><div style="height:385px;"></div></div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';

          }
        ?>

      </div>
      <!-- /.project owl-slider -->
    </div>
    <!-- *** HOMEPAGE CAROUSEL END *** -->
  </section>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.homepage').owlCarousel({
  	    navigation: true, // Show next and prev buttons
  	    navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
  	    slideSpeed: 2000,
  	    paginationSpeed: 1000,
  	    autoPlay: true,
  	    stopOnHover: true,
  	    singleItem: true,
  	    lazyLoad: false,
  	    addClassActive: true,
        pagination: false,
  	    afterInit: function () {
  		//animationsSlider();
  	    },
  	    afterMove: function () {
  		//animationsSlider();
  	    }
  	});
  });
  </script>
<?php } ?>
<section class="bar background-gray no-mb" style="margin-top:-10px;">
    <div class="container">
        <div class="col-md-12">
          <?php
          $features = $theme_config['homepage_features'];
          if(!empty($features)) {

            $featuresChunked = array_chunk($features, 3);

            foreach ($featuresChunked as $features) {

              echo '<div class="row">';

                foreach ($features as $feature) {

                  echo '<div class="col-md-4">';
                    echo '<div class="box-simple">';
                      echo '<div class="icon"><i class="fa fa-'.$feature->icon.'"></i></div>';
                      echo '<h3>'.$feature->title.'</h3>';
                      echo '<p>'.$feature->message.'</p>';
                    echo '</div>';
                  echo '</div>';

                }

              echo '</div>';

            }

          }
          ?>
        </div>
    </div>
</section>
<section class="bar background-white">
  <div class="container">
    <div class="col-md-12">

      <div class="heading text-center">
        <h2><?= $Lang->get('NEWS__LAST_TITLE') ?></h2>
      </div>

      <div class="row">

        <?php
        if(!empty($search_news)) {

          $i = 0;
          foreach ($search_news as $news) {

            $i++;

            if($i > 4) {
              break;
            }

            echo '<div class="col-md-3 col-sm-6">';
              echo '<div class="box-image-text blog">';
                echo '<div class="content">';
                  echo '<h4><a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'">'.cut($news['News']['title'], 15).'</a></h4>';
                    echo '<p class="author-category">';
                      echo $Lang->get('GLOBAL__BY').' <a href="#">'.$news['News']['author'].'</a> '.$Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']);;
                    echo '</p>';
                    echo '<p class="intro">';
                      echo $this->Text->truncate($news['News']['content'], 170, array('ellipsis' => '...', 'html' => true));
                    echo '</p>';
                    echo '<p class="read-more">';
                      echo '<a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'" class="btn btn-template-main">'.$Lang->get('NEWS__READ_MORE').'</a>';
                    echo '</p>';
                echo '</div>';
              echo '</div>';
            echo '</div>';

          }

        } else {
          echo '<div class="alert alert-danger">'.$Lang->get('NEWS__NONE_PUBLISHED').'</div>';
        }
        ?>

      </div>
    </div>
  </div>
</section>
<?= $Module->loadModules('home') ?>
