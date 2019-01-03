<?php
$flash = $this->Session->flash();
if(!empty($flash)) { ?><br><br><br>
  <div class="notification">
    <?= $flash ?>
  </div>
<?php } ?>
