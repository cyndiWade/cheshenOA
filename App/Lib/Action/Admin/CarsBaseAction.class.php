<?php
/**
 * 车辆管理基础类
 */
class CarsBaseAction extends MemberResourceAction {
	
	protected $MODULE = '车辆管理';
	
	protected  $company;						//分公司区域数据列表
	
	protected $company_name;				//当前区域名
	
	protected $company_id;					//当前区域ID
	
	//车辆级别
	protected $car_grade= array();		
	
	//车辆状态
	protected $car_status = array(			
		0 => '正常',
		1 => '维修中',
		2 => '报废',
		3 => '租用中',		
	);	
	//不可使用车辆状态与$car_status对应关系
	protected $cars_disabled = array(
		//1,2,3		
		1,2
	);		
	

	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->init_car_grade();	//初始化车辆级别数据
		
		$this->assign('MODULE_NAME',$this->MODULE);
	}
	
	
	/**
	 * 初始化车辆级别数据
	 */
	private function init_car_grade() {
		/* 组合车辆级别 */
		$CarsGradeInfo = D('CarsGrade')->seek_all_data(); 	//获取车辆级别数据
		foreach ($CarsGradeInfo AS $key=>$val) {
			$this->car_grade[$val['id']] = $val['name'];
		}
	}
	
	
	/**
	 * 验证公司区域
	 * @param int $company_id		//区域ID
	 */
	protected function check_company ($company_id) {
		$Company = D('Company');		//公司区域数据
		$company_list = $Company->get_spe_data(array('status'=>0),'id,name');
		$this->company = regroupKey($company_list,'id',true);		//按照ID值组合数组
		if (empty($this->company[$company_id])) $this->error('非法操作！');
	
		/* 设置当前区域ID */
		$this->company_name = $this->company[$company_id]['name'];
		$this->company_id = $this->company[$company_id]['id'];
	}
	
	
	/**
	 * 验证用户是否有权限放问，所有区域的数据区域车辆的数据
	 * @param Int $company_id
	 */
	protected function check_rbac ($company_id,$module,$action) {
		/* 如果当前用户的区域ID与，操作的区域ID不同 */
		if ($this->oUser->company_id != $company_id) {
			/* 去权限管理验证，当前用户有没有权限访问跨区域管理车辆数据的功能 */
			$rbac_result = parent::chenk_user_rbac($module,$action);
			if ($rbac_result['status'] == false) $this->error($rbac_result['message']);	//如果没有访问权限，则提示错误。
		}
	}
	
	
	
}