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
		
		$StaffBase = D('StaffBase');	//员工模型表
		
		$staff_list = $StaffBase->seek_data_list();

		$this->assign('staff_list',$staff_list);
		$this->assign('ACTION_NAME','员工管理');
		$this->display();
	}
     
	
	/**
	 * 编辑员工信息页面
	 */
	public function staff_edit() {
		$id = $this->_get('id');								//员工基本信息表id
		$act = $this->_get('act');							//当前动作
		$Company= D('Company');						//公司区域模型表
		$Department = D('Department');				//部门模型表
		$Occupation = D('Occupation');				//职位模型表
		$StaffBase = D('StaffBase');						//员工模型表
		$StaffEducation = D('StaffEducation');		//员工教育经历表
		$StaffWork = D('StaffWork');					//员工工作经历表
		$StaffFamily = D('StaffFamily');				//员工家庭成员表
		$StaffContract = D('StaffContract');			//员工合同信息表
		$StaffSalary = D('StaffSalary');					//员工薪资数据
		$StaffAlteration = D('StaffAlteration');		//异动事件表
		
		//区域列表
		$company_list =  $Company->get_spe_data(array('status'=>0),'id,name');
		
		//员工基本数据
		$staff_base_info = $StaffBase->where(array('id'=>$id))->find();
		$staff_base_info['company_name'] = $Company->where(array('id'=>$staff_base_info['company_id']))->getField('name');
		$staff_base_info['department_name'] = $Department->where(array('id'=>$staff_base_info['department_id']))->getField('name');
		$staff_base_info['occupation_name'] = $Occupation->where(array('id'=>$staff_base_info['occupation_id']))->getField('name');

		//教育经历数据
		$staff_education_list = 	$StaffEducation->seek_all_data($id);
	
		//工作经历数据
		$staff_work_list = 	$StaffWork->seek_all_data($id);
	
		//家庭成员数据
		$staff_family_list = $StaffFamily->seek_all_data($id);
		
		//员工合同信息数据
		$staff_contract_list = $StaffContract->seek_all_data($id);
		
		//薪资数据
		$staff_salary_list = $StaffSalary->seek_all_data($id);
		
		//异动事件数据
		$staff_alteration_list = $StaffAlteration->seek_all_data($id);
		
		$this->assign('id',$id);
		$this->assign('act',$act);
		$this->assign('ACTION_NAME','编辑员工信息');
		$this->assign('staff_base_info',$staff_base_info);
		$this->assign('company_list',$company_list);
		$this->assign('staff_education_list',$staff_education_list);
		$this->assign('staff_work_list',$staff_work_list);
		$this->assign('staff_family_list',$staff_family_list);
		$this->assign('staff_contract_list',$staff_contract_list);
		$this->assign('staff_salary_list',$staff_salary_list);
		$this->assign('staff_alteration_list',$staff_alteration_list);
		
		if ($act == 'add') {
			$this->display('staff_add');		//添加的模板
		} elseif ($act == 'update') {	
			$this->display('staff_edit');		//完善信息的模板
		}
		
	}
	
    
	/**
	 * 获取部门信息-AJAX
	 */
	public function ajax_get_info () {

		if ($this->isPost()) {
			$fiels = array(
				'Department' => 'company_id',
				'Occupation' => 'department_id',	
			);
			
			/* 初始化请求参数 */

			$table = $this->_post('table');				//请求的数据表名
			$id = $this->_post('id');							//请求的id
			$DB = D($table);									//实例请求的模型表
			
			//获取数据
			$data_list = $DB->get_spe_data(array($fiels[$table]=>$id),'id,name');
			empty($data_list) ? parent::callback(C('STATUS_NOT_DATA'),'无数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$data_list);
		} else {
			parent::callback(C('STATUS_OTHER'),'非法访问');
		}
		 
	}
	
	
	/**
	 * 员工信息模（每个部门的职位都有不同的权限）
	 */
	
	/* 一、员工基本信息查看 */
	public function staff_base_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工基本信息编辑 */
	public function staff_base_edit () {
		$StaffBase = D('StaffBase');			//员工模型表
		$Users = D('Users');						//用户表
		$act = $this->_get('act');				//动作
		$id = $this->_get('id');					//员工id
		
		if ($act == 'add') {
			if ($this->isPost()) {
				$StaffBase->create();
				$add_id = $StaffBase->add();
				if ($add_id) {
					$serial = $add_id + 10000;		//生成员工编号
					$StaffBase->serial = $serial;
					$StaffBase->where(array('id'=>$add_id))->save();
					
					//生成一条待审核，系统用户数据
					$Users->base_id = $add_id;
					$Users->account = $serial;
					$Users->password = 123456;
					$Users->status = 1;
					$Users->add_account(1);
					$this->success('添加成功');
				} else {
					$this->error('添加失败，请重新尝试');
				}
				exit;
			}
			
		} elseif ($act == 'update') {
			if ($this->isPost()) {
				$StaffBase->create();
				
				/* 区域数据处理，不选择，则不修改 */
				$company_id_tmp = $this->_post('company_id_tmp');
				$department_id_tmp = $this->_post('department_id_tmp');
				$occupation_id_tmp = $this->_post('occupation_id_tmp');
 				if (!empty($company_id_tmp)) $StaffBase->company_id = $company_id_tmp;
				if (!empty($department_id_tmp)) $StaffBase->department_id = $department_id_tmp;
				if (!empty($occupation_id_tmp)) $StaffBase->occupation_id = $occupation_id_tmp;
				
				/* 修改数据 */
				$StaffBase->where(array('id'=>$id))->save() ? $this->success('修改成功') : $this->error('没有数据被修改');
				exit;  
			}
			
		} elseif ($act == 'delete') {
			$StaffBase->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败！');
		}

	}
 	
	
	
	/*二、 员工履历信息查看 */
	public function staff_vitae_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工教育信息编辑 */
	public function staff_vitae_edit () {
		$act = $this->_get('act');							//动作
		$base_id = $this->_get('base_id');			//员工id
		$id = $this->_get('id');								//教育经历id
		$StaffEducation = D('StaffEducation');		//员工教育经历表
		
		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$StaffEducation->create();
					$StaffEducation->base_id = $base_id;
					$StaffEducation->add ()  ? $this->success('添加成功') : $this->error('添加失败，请重新尝试');
					exit;
				}
				break;
			case 'update':	
				if ($this->isPost()) {
					$StaffEducation->create();			
					$StaffEducation->where(array('id'=>$id))->save ()  ? $this->success('修改成功') : $this->error('没有数据被修改');
					exit;
				}
				$staff_education_info = $StaffEducation->seek_one_data($id);
				$this->assign('staff_education_info',$staff_education_info);
				break;
			case 'delete':
				$StaffEducation->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
				exit;
			default :
				$this->error('非法操作');	
		}
		
		$this->assign('base_id',$base_id);
		$this->assign('ACTION_NAME','编辑教育经历');
		$this->display();
	}
	
	
	/* 工作经历编辑 */
	public function staff_vitae_work () {
		$act = $this->_get('act');							//动作
		$base_id = $this->_get('base_id');			//员工id
		$id = $this->_get('id');								//工作经历id
		$StaffWork = D('StaffWork');					//员工工作经历表
		
		
		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$StaffWork->create();
					$StaffWork->base_id = $base_id;
					$StaffWork->add ()  ? $this->success('添加成功') : $this->error('添加失败，请重新尝试');
					exit;
				}
				break;
			case 'update':
				if ($this->isPost()) {
					$StaffWork->create();
					$StaffWork->where(array('id'=>$id))->save ()  ? $this->success('修改成功') : $this->error('没有数据被修改');
					exit;
				}
				$staff_work_info = $StaffWork->seek_one_data($id);
				$this->assign('staff_work_info',$staff_work_info);
				break;
			case 'delete':
				$StaffWork->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
				exit;
			default :
				$this->error('非法操作');
		}
		
		$this->assign('base_id',$base_id);
		$this->assign('ACTION_NAME','编辑工作经历');
		$this->display();
	}
	
	
	/* 家庭状态编辑 */
	public function staff_vitae_family () {
		$act = $this->_get('act');							//动作
		$base_id = $this->_get('base_id');			//员工id
		$id = $this->_get('id');								//工作经历id
		$StaffFamily = D('StaffFamily');				//员工家庭状态表
	
		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$StaffFamily->create();
					$StaffFamily->base_id = $base_id;
					$StaffFamily->add ()  ? $this->success('添加成功') : $this->error('添加失败，请重新尝试');
					exit;
				}
				break;
			case 'update':
				if ($this->isPost()) {
					$StaffFamily->create();
					$StaffFamily->where(array('id'=>$id))->save ()  ? $this->success('修改成功') : $this->error('没有数据被修改');
					exit;
				}
				$staff_family_info = $StaffFamily->seek_one_data($id);
				$this->assign('staff_family_info',$staff_family_info);
				break;
			case 'delete':
				$StaffFamily->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
				exit;
			default :
				$this->error('非法操作');
		}
	
		$this->assign('base_id',$base_id);
		$this->assign('ACTION_NAME','编辑家庭状态');
		$this->display();
	}
	
	
	
	/* 三、员工合同信息查看 */
	public function staff_contract_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工合同信息编辑 */
	public function staff_contract_edit () {
		$act = $this->_get('act');							//动作
		$base_id = $this->_get('base_id');			//员工id
		$id = $this->_get('id');								//工作经历id
		$StaffContract = D('StaffContract');			//员工合同表
		
		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$StaffContract->create();
					$StaffContract->base_id = $base_id;
					$StaffContract->add ()  ? $this->success('添加成功') : $this->error('添加失败，请重新尝试');
					exit;
				}
				break;
			case 'update':
				if ($this->isPost()) {
					$StaffContract->create();
					$StaffContract->where(array('id'=>$id))->save ()  ? $this->success('修改成功') : $this->error('没有数据被修改');
					exit;
				}
				$staff_family_info = $StaffContract->seek_one_data($id);
				$this->assign('staff_family_info',$staff_family_info);
				break;
			case 'delete':
				$StaffContract->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
				exit;
			default :
				$this->error('非法操作');
		}
		
		$this->assign('base_id',$base_id);
		$this->assign('ACTION_NAME','编辑合同信息');
		$this->display();
	
	}
	
	
	/* 四、员工薪资信息查看 */
	public function staff_salary_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 员工薪资信息编辑 */
	public function staff_salary_edit () {
		
		$act = $this->_get('act');							//动作
		$base_id = $this->_get('base_id');			//员工id
		$id = $this->_get('id');								//工作经历id
		$StaffSalary = D('StaffSalary');					//薪资表
		
		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$StaffSalary->create();
					$StaffSalary->base_id = $base_id;
					$StaffSalary->add ()  ? $this->success('添加成功') : $this->error('添加失败，请重新尝试');
					exit;
				}
				break;
			case 'update':
				if ($this->isPost()) {
					$StaffSalary->create();
					$StaffSalary->where(array('id'=>$id))->save ()  ? $this->success('修改成功') : $this->error('没有数据被修改');
					exit;
				}
				$staff_salary_info = $StaffSalary->seek_one_data($id);
				$this->assign('staff_salary_info',$staff_salary_info);
				break;
			case 'delete':
				$StaffSalary->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
				exit;
			default :
				$this->error('非法操作');
		}
		
		$this->assign('base_id',$base_id);
		$this->assign('ACTION_NAME','编辑合同信息');
		$this->display();
		
		
	}
	
	
	/* 五、员工异动事件查看 */
	public function staff_alteration_look () {
		parent::callback(C('STATUS_RBAC'),'获取成功');
	}
	/* 异动事件编辑 */
	public function staff_alteration_edit() {
		$act = $this->_get('act');							//动作
		$base_id = $this->_get('base_id');			//员工id
		$id = $this->_get('id');								//工作经历id
		$StaffAlteration = D('StaffAlteration');		// 异动事件表
		
		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$StaffAlteration->create();
					$StaffAlteration->base_id = $base_id;
					$StaffAlteration->add ()  ? $this->success('添加成功') : $this->error('添加失败，请重新尝试');
					exit;
				}
				break;
			case 'update':
				if ($this->isPost()) {
					$StaffAlteration->create();
					$StaffAlteration->where(array('id'=>$id))->save ()  ? $this->success('修改成功') : $this->error('没有数据被修改');
					exit;
				}
				$staff_alteration_info = $StaffAlteration->seek_one_data($id);
				$this->assign('staff_alteration_info',$staff_alteration_info);
				break;
			case 'delete':
				$StaffAlteration->del(array('id'=>$id)) ? $this->success('删除成功') : $this->error('删除失败');
				exit;
			default :
				$this->error('非法操作');
		}
		
		$this->assign('base_id',$base_id);
		$this->assign('ACTION_NAME','编辑合同信息');
		$this->display();
	}
	
	
	
	
}