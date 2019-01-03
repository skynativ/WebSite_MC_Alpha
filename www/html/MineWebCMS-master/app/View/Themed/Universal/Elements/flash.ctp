<?php
$flash_messages = $this->Session->flash();
if(!empty($flash_messages)) {
  echo '<div class="container">'.$flash_messages.'</div>';
}
?>
