<?php
/**
 *	后台用户管理
 *
 */
class UserAction extends AdminBaseAction {
   
	private $MODULE = '权限管理';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);
	}
	
	public function index () {
		$Users = D('Users');
		$user_status = C('ACCOUNT_STATUS');		//状态
		$user_list = $Users->seek_all_data();
		
		foreach ($user_list AS $key=>$val) {
			$user_list[$key]['status'] = $user_status[$val['status']];
		}
		
		$this->assign('user_list',$user_list);
		$this->assign('ACTION_NAME','用户管理');
		$this->display();
	}
	
	/**
	 * 修改用户账号状态
	 */
	public function user_status () {
		$Users = D('Users');
		$id = $this->_get('id');
		$status = $this->_get('status');
		$Users->status = $status;
		$Users->save_one_data(array('id'=>$id)) ? $this->success('已修改') : $this->error('没有做出修改');
	}
	
	
	
	/**
	 * 个人中心模块
	 */
	public function personal () {
		$this->display();
	}

	

}