<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="titlePage theme-color-text"><?= $Lang->get("Changelogs"); ?></h1>
      

      <div class="row">

        <table class="table table-striped">
          <thead>
            <tr>
              <th><?= $Lang->get("TABLE_HEAD_LEVEL"); ?></th>
              <th><?= $Lang->get("TABLE_HEAD_DATE"); ?></th>
              <th><?= $Lang->get("TABLE_HEAD_AUTHOR"); ?></th>
              <th><?= $Lang->get("TABLE_HEAD_COMMENT"); ?></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($changelogs as $changlog){ ?>
            <tr>
              <td class="col-md-1" style="font-size:18px;">

              <?php
              $level = $changlog['Changelogs']['level'];
              if($level == 1){
                echo '<span class="label label-info" style="padding:8px;">INFORMATION</span>';
              }else if($level == 2){
                echo '<span class="label label-warning" style="padding:8px;">ATTENTION</span>';
              }else if($level == 3){
                echo '<span class="label label-danger" style="padding:8px;">IMPORTANT</span>';
              }else{
                echo '<span class="label label-success" style="padding:8px;">MISE À JOUR</span>';
              }
              ?>

              </td>
              <td class="col-md-2"><?= date("d-m-Y H:i:s", strtotime($changlog['Changelogs']['created'])); ?></td>
              <td class="col-md-1"><?= $changlog['Changelogs']['author']; ?></td>
              <td class="col-md-9"><?= $changlog['Changelogs']['description']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        </div>
    </div>
  </div>
</div>