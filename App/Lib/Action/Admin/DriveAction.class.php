<?php
/**
 * 试驾管理控制器
 */
class DriveAction extends AdminBaseAction {
	
	private $MODULE = '试驾管理';
	
	protected  $db = array(
		'Drive' => 'Drive',
	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);

	}
	
	

	/* 数据列表 */
	public function index () {
		
		$Drive = $this->db['Drive'];	
		$list = $Drive->seek_all_data();
		$html['list'] = $list;
		$this->assign('ACTION_NAME','试驾列表');
		$this->assign('TITLE_NAME','试驾列表');
		$this->assign('html',$html);
		$this->display();
	}
     
	


	
	
	
}