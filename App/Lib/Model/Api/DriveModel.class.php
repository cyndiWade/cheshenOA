<?php

/**
 * 试驾会员模型表
 *
 */
class DriveModel extends ApiBaseModel {
	
	
	public function __construct() {
		parent::__construct();
	}

	/* 添加一条数据 */
	public function add_one_data () {
		$this->time = time();
		return $this->add();
	}
	
	
}

?>
