<?php
/**
 * 公司所有区域车辆管理
 */
class CarsAllAction extends CarsBaseAction {
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
	}
	
	public function index () {
		
		$Company = D('Company');		//公司区域表
		$company_list = $Company->company_region_view();
		
		$this->assign('ACTION_NAME','车辆分布区域管理');
		$this->assign('TITILE_NAME','车辆分布区域管理');
		$this->assign('company_list',$company_list);
		$this->display();
	}
	
}