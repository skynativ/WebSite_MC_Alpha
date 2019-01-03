<?= $test; ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php if($disabled == 'true'){ ?>
        <div class="alert alert-danger">
          <?= $Lang->get('LISTMEMBERS__ERROR_PROFILE'); ?>
        </div>
      <?php }else{ ?>
      <div class="box">
        <div class="box-body">
          <img style="display:none;" class="profil-presentation-img img-circle" id="img-prf" src="<?= $this->Html->url('/API/get_head_skin//80') ?>" class="img-circle">
          <span class="profil-presentation-span"><?= $Lang->get('LISTMEMBERS__PROFILE'); ?> <?= $userFound['User']['pseudo']; ?></span>
          <br>
          <div class="panel panel-default">
            <div class="panel-body">
              <br><br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">          
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><?= $Lang->get('LISTMEMBERS__RANK'); ?> :</td>
                          <td>
                            <?php
                            if($userFound['User']['rank'] == 0)
                            {
                              echo $Lang->get('LISTMEMBERS__RANK_MEMBER');
                            }elseif($userFound['User']['rank'] == 2){
                              echo $Lang->get('LISTMEMBERS__RANK_MODERATOR');
                            }elseif($userFound['User']['rank'] == 3){
                              echo $Lang->get('LISTMEMBERS__RANK_ADMINISTRATOR');
                            }elseif($userFound['User']['rank'] == 4){
                              echo $Lang->get('LISTMEMBERS__RANK_ADMINISTRATOR');
                            }elseif($userFound['User']['rank'] == 5){
                              echo $Lang->get('LISTMEMBERS__RANK_BANNED');
                            }else{
                              echo $Lang->get('LISTMEMBERS__ERREUR');
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td><?= $Lang->get('LISTMEMBERS__CREATE_DATE'); ?></td>
                          <td><b><?= $Lang->date($userFound['User']['created']); ?></b></td>
                        </tr>
                        <tr>
                          <td><?= $Lang->get('LISTMEMBERS__VOTE'); ?></td>
                          <td><b><?= $userFound['User']['vote']; ?> <?= $Lang->get('LISTMEMBERS__FS'); ?></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</div>

<script>
  setTimeout(function(){ 
   $("#img-prf").fadeIn(1000);
    document.getElementById('img-prf').src = '/API/get_head_skin/<?= $userFound['User']['pseudo']; ?>/80';
  }, 3000);
</script>

<style>
.profil-presentation-img
{
    box-shadow: 0px 0px 5px 0px black;
    width: 80px;
    position: relative;
    top: 10px;
    left: 30px;
    margin-bottom: -35px;
}
.profil-presentation-span
{
    position: relative;
    left: 30px;
    top: 10px;
    font-size: 20px;
}
</style>