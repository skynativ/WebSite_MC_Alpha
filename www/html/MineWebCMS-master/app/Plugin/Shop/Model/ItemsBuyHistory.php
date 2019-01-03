<?php
class ItemsBuyHistory extends ShopAppModel {
  public $belongsTo = array('Item', 'User');
}
