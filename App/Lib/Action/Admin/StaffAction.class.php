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
		$StaffBase = D('StaffBase');			//员工模型表
		
		//部门数据
		$department_list = $Department->seek_child_data(0);

		//员工基本数据
		$staff_base_info = $StaffBase->where(array('id'=>$id))->find();
	
		
		$this->assign('staff_base_info',$staff_base_info);
		$this->assign('department_list',$department_list);
		$this->assign('id',$id);
		$this->assign('act',$act);
		$this->assign('ACTION_NAME','编辑员工信息');
		
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
	 * 员工信息模（每个组的员工有不同的权限）
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
					$serial = $id + 1000;
					$StaffBase->serial = $serial;
					$StaffBase->where(array('id'=>$id))->save();
					$this->success('添加成功');
				} else {
					$this->error('添加失败，请重新尝试');
				}
				exit;
			}
			
		} elseif (act == 'update') {
			if ($this->isPost()) {
				$StaffBase->create();
				$StaffBase->where(array('id'=>$id))->save() ? $this->success('修改成功') : $this->error('修改失败');
				exit;
			}
			
		}
		
		

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