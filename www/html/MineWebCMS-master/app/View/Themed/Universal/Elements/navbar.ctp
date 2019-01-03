<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
  <div class="navbar navbar-default yamm" role="navigation" id="navbar">

    <div class="container">
      <div class="navbar-header">

        <a class="navbar-brand home" href="<?= $this->Html->url('/') ?>">
          <?php
          if(isset($theme_config['logo']) && $theme_config['logo']) {
            //echo $this->Html->image($theme_config['logo']);
            echo '<img src="'.$theme_config['logo'].'">';
          } else {
            echo '<p>'.$website_name.'</p>';
          }
          ?>
        </a>
        <div class="navbar-buttons">
          <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-align-justify"></i>
          </button>
        </div>

      </div>
      <!--/.navbar-header -->

      <div class="navbar-collapse collapse" id="navigation">

        <ul class="nav navbar-nav navbar-right">


          <li class="li-nav">
              <a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a>
          </li>
          <?php
          if(!empty($nav)) {

            $i = 0;
            foreach ($nav as $key => $value) {

              if(empty($value['Navbar']['submenu'])) {

                echo '<li class="li-nav';
                echo ($this->params['controller'] == $value['Navbar']['name']) ? ' actived' : '';
                echo '">';
                  echo '<a href="'.$value['Navbar']['url'].'"';
                  echo ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '';
                  echo '>';
                    echo $value['Navbar']['name'];
                  echo '</a>';
                echo '</li>';

              } else {

                echo '<li class="dropdown">';
                  echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">';
                    echo $value['Navbar']['name'].' <span class="caret"></span>';
                  echo '</a>';

                  echo '<ul class="dropdown-menu" role="menu">';
                    $submenu = json_decode($value['Navbar']['submenu']);
                    foreach ($submenu as $k => $v) {

                      echo '<li>';
                        echo '<a href="'.rawurldecode(rawurldecode($v)).'"';
                        echo ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '';
                        echo '>';
                          echo rawurldecode(str_replace('+', ' ', $k));
                        echo '</a>';
                      echo '</li>';

                    }
                  echo '</ul>';
                echo '</li>';

              }
              $i++;
            }
          }
          ?>

        </ul>

      </div>
      <!--/.nav-collapse -->

    </div>


  </div>
  <!-- /#navbar -->

</div>
