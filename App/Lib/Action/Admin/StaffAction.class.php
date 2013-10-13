<?php
/**
 * 人事管理下的---员工管理
 */
class StaffAction extends AdminBaseAction {
	
	private $MODULE = '人事管理';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);
	}
	
	

	/* 员工列表 */
	public function index () {
		
		$Staff = D('Staff');	//员工模型表
		$staff_list = $Staff->seek_data_list();
	
		
		$this->assign('staff_list',$staff_list);
		$this->assign('ACTION_NAME','员工管理');
		$this->display();
	}
     
	/**
	 * 编辑员工信息页面
	 */
	public function staff_edit() {
		
		$this->assign('ACTION_NAME','编辑员工信息');
		$this->display();
	}
	
    
	
	
	
	/**
	 * 员工信息模（每个组的员工有不同的权限）
	 */
	
	/* 一、员工基本信息查看 */
	public function staff_base_look () {
		
		
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工基本信息编辑 */
	public function staff_base_edit () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
 	
	
	
	/*二、 员工履历信息查看 */
	public function staff_vitae_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工履历信息编辑 */
	public function staff_vitae_edit () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	
	
	/* 三、员工合同信息查看 */
	public function staff_contract_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工合同信息编辑 */
	public function staff_contract_edit () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	
	
	/* 四、员工薪资信息查看 */
	public function staff_salary_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工薪资信息编辑 */
	public function staff_salary_edit () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	
	
	
	
	
	
	
}