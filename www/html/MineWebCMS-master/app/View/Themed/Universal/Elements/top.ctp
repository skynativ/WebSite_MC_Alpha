<div id="top">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-4 hidden-xs">
        <p><?= ($banner_server) ? $banner_server : $Lang->get('SERVER__STATUS_OFF') ?></p>
      </div>
      <div class="col-md-7 col-sm-8">

        <div class="login">
          <?php
          if(isset($isConnected) && $isConnected) {

            echo '<a href="'.$this->Html->url(array('controller' => 'user', 'action' => 'profile', 'plugin' => false)).'">';
              echo '<i class="fa fa-user"></i> '.$user['pseudo'];
            echo '</a>';

            echo '<a href="#" onclick="notification.markAllAsSeen(1)" class="dropdown-toggle hidden-xs" data-toggle="dropdown" aria-expanded="true" id="notification-indicator">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu" style="padding-right: 20px;padding-left: 20px;width: 350px;left: auto;right: 80px;margin-top: 10px;">
                <div id="notification-container"></div>
              </ul>';

            if($Permissions->can('ACCESS_DASHBOARD')) {
              echo '<a style="color:#f3625f;" href="'.$this->Html->url(array('controller' => 'admin', 'action' => 'index', 'admin' => true, 'plugin' => false)).'">';
                echo '<i class="fa fa-cog"></i> '.$Lang->get('GLOBAL__ADMIN_PANEL');
              echo '</a>';
            }

            echo '<a href="'.$this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)).'">';
              echo '<i class="fa fa-sign-out"></i> '.$Lang->get('USER__LOGOUT');
            echo '</a>';

          } else {
            echo '<a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">'.$Lang->get('USER__LOGIN').'</span></a>';
            echo '<a href="#" data-toggle="modal" data-target="#register"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">'.$Lang->get('USER__REGISTER').'</span></a>';
          }
          ?>
        </div>

      </div>
    </div>
  </div>
</div>
