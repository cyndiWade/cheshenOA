<?php
/**
 * 部门管理控制器
 */
class PersonnelAction extends AdminBaseAction {
	
	private $MODULE = '人事管理';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);
	}
	
	

	/**
	 * 部门管理-数据列表
	 */
	public function department(){		
		
		$Department = D('Department');		//部门模型表
		$Company = D('Company');				//区域模型表
		$get_company_id =  $this->_get('company_id');	//区域id
		
		$map['status'] = 0;		//数据存在时
		if ($get_company_id == '') {	//为空时
			$map['company_id'] = $this->oUser->company_id;
		} else {									//通过区域连接过来的
			$map['company_id'] = $get_company_id;
		}

		//获取部门所在区域数据
		$company_info = $Company->get_one_data(array('id'=>$map['company_id']),'name');

		//部门数据
		$department_list = $Department->seek_child_data($map);

		$this->assign('company_name',$company_info['name']);
		$this->assign('company_id',$map['company_id']);
		$this->assign('department_list',$department_list);
		$this->assign('ACTION_NAME','部门管理');
		$this->display();
	
    }
    
    /**
     *	部门管理-部门编辑
     */
    public function department_edit () {
    	$act = $this->_get('act');									//动作
    	$id = $this->_get('id');										//id
    	$company_id = $this->_get('company_id');		//区域ID
    	
    	if ($company_id == '') {	//为空时
    		$company_id = $this->oUser->company_id;
    	}
    	
    	$Department = D('Department');						//部门模型表
    	
    	switch ($act) {
    		case 'update' :
    			if ($this->isPost()) {
    				$Department->create();
    				$Department->where(array('id'=>$id))->save() ? $this->success('修改成功！') : $this->error('没有做出修改');
    				exit;			
    			}
    			//获取职位详细数据
    			$department_info = $Department->seek_one_data(array('status'=>0,'id'=>$id));
    			$this->assign('department_info',$department_info);
    			break;  		
    		case 'add' :
    			 if ($this->isPost()) {
    			 	$Department->create();
    			 	$Department->company_id = $company_id;
    			 	$Department->add_one_data() ? $this->success('添加成功！','?s=/Admin/Personnel/department/company_id/'.$company_id) : $this->error('添加失败，请重新尝试！');
					exit;
    			 }
    			break;
    		case 'delete' :
    			$Department->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
    			exit;
    			break;
    		default:
    			$this->error('非法操作');					
    	}	
    	
 
    	$this->assign('company_id',$company_id);
    	$this->assign('ACTION_NAME','编辑部门');
    	$this->display();
 
    }
    

    
    /**
     * 职位管理-数据列表
     */
    public function occupation () {
    	$department_id = $this->_get('department_id');	//部门id
    	$Department = D('Department');		//部门模型表
    	$Occupation = D('Occupation');		//职位模型表
    	$StaffBase = D('StaffBase');				//人员基本信息表
		
    	//当前部门
    	$Department_info = $Department->seek_one_data(array('status'=>0,'id'=>$department_id));
    	if (empty($Department_info)) $this->error('此部门不存在！');
  
    	//当前部门下职位数据列表
    	$occupation_list = $Occupation->seek_child_data($department_id);
		//查看职位下的人数
		foreach ($occupation_list AS $key=>$val) {
			$occupation_list[$key]['num'] = $StaffBase->where(array('occupation_id'=>$val['id'],'status'=>0))->count();
		}

    	
    	$this->assign('Department_info',$Department_info);
    	$this->assign('occupation_list',$occupation_list);
    	$this->assign('ACTION_NAME','职位管理');
    	$this->display();
    }
    
    
    /**
     * 职位管理-编辑职位
     */
    public function occupation_edit() {
    	$id = $this->_get('id');			//部门ID
    	$act = $this->_get('act');			//动作
    	$Occupation = D('Occupation');		//部门模型表
    	switch ($act) {
    		case 'update' :
    			if ($this->isPost()) {
    				$Occupation->create();
    				$Occupation->where(array('id'=>$id))->save() ? $this->success('修改成功！') : $this->error('没有做出修改');
    				exit;
    			}
    			$occupation_info = $Occupation->seek_one_data(array('status'=>0,'id'=>$id));
    			
    			$this->assign('department_id',$occupation_info['department_id']);
    			$this->assign('occupation_info',$occupation_info);
    			break;
    		case 'add' :
    			if ($this->isPost()) {
    				$Occupation->create();
    				$Occupation->department_id = $id;
    				$Occupation->add_one_data() ? $this->success('添加成功！','?s=/Admin/Personnel/occupation/department_id/'.$id) : $this->error('添加失败，请重新尝试！');
    				exit;
    			}
    			$this->assign('department_id',$id);
    			break;
    		case 'delete' :
    			$Occupation->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
    			exit;
    			break;
    		default:
    			$this->error('非法操作');
    	}
    	$this->assign('ACTION_NAME','编辑职位');
    	$this->display();
    }
    
    
    
    
}