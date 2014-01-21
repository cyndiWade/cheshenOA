<?php

/**
 * 试驾会员模型表
 *
 */
class DriveModel extends AdminBaseModel {
	
	
	public function __construct() {
		parent::__construct();
	}

	/* 添加一条数据 */
	public function add_one_data () {
		$this->time = time();
		return $this->add();
	}
	
	/**
	 * 获取所有数据
	 */
	public function seek_all_data() {
		$data = $this->where(array('status'=>0))->select();
		parent::set_all_time($data, array('time'));
		return $data;
	}
	
	
}

?>
