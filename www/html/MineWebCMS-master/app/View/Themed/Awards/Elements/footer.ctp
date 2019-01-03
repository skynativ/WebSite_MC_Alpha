<!-- Footer -->
  <div class="pre-footer-margin"></div>
<?php if(!isset($theme_config['footer_global']) || $theme_config['footer_global'] == "true") { ?>
   <div class="pre-footer">
       <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <h3 class="logo-footer"><?php echo $website_name ?></h3>
              <div class="separation"></div>
              <div class="col-md-4 footer-infos">
                  <h3 class="title">Informations</h3>
                  <div class="under-title"></div>
                  <p class="infos-text">
                      <?= $theme_config['footer_texte']; ?>
                  </p>
              </div>
              <?php if($EyPlugin->isInstalled('eywek.vote')){ ?>
              <div class="col-md-8 footer-vote">
                  <h3 class="title">Nos meilleurs votants</h3>
                  <div class="under-title"></div>
                  <div class="voters-all">
                    <?php $users_vote = ClassRegistry::init('Vote.Vote')->find('all', [
                        'fields' => ['username', 'COUNT(id) AS count'],
                        'conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%'],
                        'order' => 'count DESC',
                        'group' => 'username',
                        'limit' => 6
                    ]);
                    ?>
                    <?php $i_cl = 0;foreach($users_vote as $userv): $i_cl++; ?>
                      <div class="voter-u col-md-4">
                         <div class="voter-avatar">
                             <img src="https://minotar.net/helm/<?= $userv['Vote']['username']; ?>/40.png" alt="avatar" class="avatar">
                         </div>
                          <div class="voter-u-infos">
                              <h5 class="pseudo"><?= $userv['Vote']['username']; ?></h5>
                              <br>
                              <span class="position"><?= $i_cl; ?><?php if($i_cl == 1){ ?>er<?php }else{ ?>ème<?php }?></span>
                              <span class="vote-number"><?= $userv[0]['count']; ?> <?php if($userv[0]['count'] > 1){ ?>votes<?php }else{ ?>vote<?php }?></span>
                          </div>                                                
                      </div>
                    <?php endforeach; ?> 
                  </div>
              </div>
              <?php } ?>
          </div>
        </div>
      </div>
   </div>
   <?php } ?>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p><?php echo $website_name; ?> - <?= $Lang->get('GLOBAL__FOOTER') ?></p>            
          </div>
        </div>
      </div>
    </div>