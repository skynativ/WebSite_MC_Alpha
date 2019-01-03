<?php
class StarpassHistory extends ShopAppModel {
  public $belongsTo = array(
    'User',
    'Starpass' => array(
      'foreignKey' => 'offer_id'
    )
  );
}
