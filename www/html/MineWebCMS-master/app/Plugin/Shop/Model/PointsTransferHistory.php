<?php
class PointsTransferHistory extends ShopAppModel {
  public $belongsTo = array(
    'User',
    'Author' => array(
      'className' => 'User',
      'foreignKey' => 'author_id'
    )
  );
}
