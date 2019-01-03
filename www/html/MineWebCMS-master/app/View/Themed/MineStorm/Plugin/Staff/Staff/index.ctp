<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
    </div>
  </div>
</div>
<div id="content">
  <section class="bar background-white">
    <div class="container vote">
  	  <div class="row">
  		    <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12"><h2 class="border-blue"><?= $Lang->get("STAFF") ?></h2></div>
                  </div>
                  <div class="row">
                        <?= (empty($staffs)) ? "<p>Aucun Staff pour le moment</p>" : ""?>
                        <?php foreach($staffs as $k=>$v): $v = current($v); ?>
                          <div class="col-md-4 col-sm-4">
                              <div class="box-image-text blog">
                                  <div class="box-staff">
                                      
                                      <img src="https://visage.surgeplay.com/face/144/<?= $v["user"] ?>" alt="" class="img-staff" />
                                      <div class="username-staff"><?= $v["user"] ?></div>
                                      <div class="desc-staff"><?= $v['rank'] ?></div>
                                  </div>
                              </div>
                          </div>
                        <?php endforeach; ?>
  		            </div>
  		    </div>
  		</div>
    </div>
  </section>
</div>