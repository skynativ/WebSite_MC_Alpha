<?php
class PaypalHistory extends ShopAppModel {
  public $belongsTo = array(
    'User',
    'Paypal' => array(
      'foreignKey' => 'offer_id'
    )
  );
}
