<?php
class Code extends AppModel{

    public $useTable = "codecadeau__code";

    public function __makeCondition($search) {
		if((string)(int)$search == $search) {
			return array(
				'code' => intval($search)
			);
		}
	}

	public function getCodeByCode($code, $key) {
		$conditions = array("Code.code" => $code);
	  	$search_user = $this->find('first', array(
	  		'conditions' => $conditions
	  	));
	  	return (!empty($search_user)) ? $search_user['Code'][$key] : NULL;
  	}

}
