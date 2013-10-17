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
		$id = $this->_get('id');	
		$act = $this->_get('act');
		$Department = D('Department');		//部门模型表
		$Occupation = D('Occupation');		//职位模型表
		$StaffBase = D('StaffBase');			//员工模型表
		$StaffEducation = D('StaffEducation');		//员工教育经历表
		$StaffWork = D('StaffWork');					//员工工作经历表
		$StaffFamily = D('StaffFamily');				//员工家庭成员表
		$StaffContract = D('StaffContract');			//员工合同信息表
		$StaffSalary = D('StaffSalary');					//员工薪资数据
		$StaffAlteration = D('StaffAlteration');		//异动事件表
		
		//部门数据
		$department_list = $Department->seek_child_data(0);

		//员工基本数据
		$staff_base_info = $StaffBase->where(array('id'=>$id))->find();
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
		$this->assign('department_list',$department_list);
		$this->assign('staff_education_list',$staff_education_list);
		$this->assign('staff_work_list',$staff_work_list);
		$this->assign('staff_family_list',$staff_family_list);
		$this->assign('staff_contract_list',$staff_contract_list);
		$this->assign('staff_salary_list',$staff_salary_list);
		$this->assign('staff_alteration_list',$staff_alteration_list);
		
		if ($act == 'add') {
			$this->display('staff_add');
		} elseif ($act == 'update') {
			$this->display('staff_edit');
		}
		
	}
	
    
	/**
	 * 获取部门信息-AJAX
	 */
	public function ajax_get_occupation () {
		if ($this->isPost()) {
			$department_id = $this->_post('department_id');
			$Occupation = D('Occupation');		//职位模型表
			$occupation_list = $Occupation->seek_child_data($department_id);
			empty($occupation_list) ? parent::callback(C('STATUS_NOT_DATA'),'此部门没有添加相应职位') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$occupation_list);
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
		$act = $this->_get('act');				//动作
		$id = $this->_get('id');					//员工id
		
		if ($act == 'add') {
			if ($this->isPost()) {
				$StaffBase->create();
				$id = $StaffBase->add();
				if ($id) {
					$serial = $id + 1000;		//生成员工编号
					$StaffBase->serial = $serial;
					$StaffBase->where(array('id'=>$id))->save();
					$this->success('添加成功');
				} else {
					$this->error('添加失败，请重新尝试');
				}
				exit;
			}
			
		} elseif ($act == 'update') {
			if ($this->isPost()) {
				$StaffBase->create();
				if ($_POST['department_id_one'] != -1) {
					$StaffBase->department_id = $_POST['department_id_one'];
				} 
				if ($_POST['occupation_id_two'] != -1) {
					$StaffBase->occupation_id = $_POST['occupation_id_two'];
				}
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
		$StaffFamily = D('StaffFamily');					//员工工作经历表
	
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
		$StaffContract = D('StaffContract');					//员工工作经历表
		
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
		$StaffSalary = D('StaffSalary');				//薪资表
		
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
		$StaffAlteration = D('StaffAlteration');				//薪资表
		
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