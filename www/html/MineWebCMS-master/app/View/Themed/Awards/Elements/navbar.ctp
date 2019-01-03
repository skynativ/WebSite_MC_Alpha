<div class="menu">
    <div class="container-fluid">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid nav-content">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="<?= $this->Html->url('/') ?>">
                        <?php
                      if(isset($theme_config['logo']) && $theme_config['logo']) {
                        //echo $this->Html->image($theme_config['logo']);
                        echo '<img src="'.$theme_config['logo'].'">';
                      } else {
                        echo '<p>'.$website_name.'</p>';
                      }
                      ?>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="li-nav">
                            <a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a>
                        </li>
                        <?php
                        if(!empty($nav)) {
                          $i = 0;
                          foreach ($nav as $key => $value) { ?>
                            <?php if(empty($value['Navbar']['submenu'])) { ?>
                            <li class="li-nav<?php if($this->params['controller'] == $value['Navbar']['name']) { ?> actived<?php } ?>">
                                <a href="<?= $value['Navbar']['url'] ?>" <?=( $value[ 'Navbar'][ 'open_new_tab']) ? ' target="_blank"' : '' ?>><?= $value['Navbar']['name'] ?></a>
                            </li>
                            <?php } else { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?= $value['Navbar']['name'] ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                $submenu = json_decode($value['Navbar']['submenu']);
                                foreach ($submenu as $k => $v) {
                                ?>
                                        <li><a href="<?= rawurldecode($v) ?>" <?=( $value[ 'Navbar'][ 'open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                                        <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php
                          $i++;
                        }
                      } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
