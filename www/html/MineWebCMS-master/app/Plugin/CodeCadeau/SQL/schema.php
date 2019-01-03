<?php
class CodecadeauAppSchema extends CakeSchema {

	public $file = 'schema.php';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {}

		public $codecadeau__code = array(
			'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
			'code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'use' => array('type' => 'string', 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
			'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 11, 'unsigned' => false)
		);
}
