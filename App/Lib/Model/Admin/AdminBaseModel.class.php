<?php 

/**
 * 后台管理模型类
 */

class AdminBaseModel extends AppBaseModel {
	
	protected $prefix;		//表前缀
	
	public function __construct() {
		parent::__construct();
		
		$this->admin_base_init();
	}
	
	
	
	private function admin_base_init () {
		$this->prefix = C('DB_PREFIX');
	}
	
}
?>