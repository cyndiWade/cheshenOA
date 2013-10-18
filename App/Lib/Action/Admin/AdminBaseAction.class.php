<?php

/**
 * 后台核心类
 */
class AdminBaseAction extends AppBaseAction {
	/**
	 * 保存用户信息，供全局调用
	 */
	protected $oUser;						//用户数据
	

	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		
		//初始化
		$this->_init();
		
		//全局模板变量
		$this->global_tpl_view();
	}
	
	
	//初始化用户数据
	private function _init() {
		
		/* SESSION信息验证 */
		$this->oUser = $_SESSION['user_info'];			//保存用户信息
		
		if (empty($this->oUser) && !in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))) {
			
			$this->error('请先登录','?s=/Admin/Login/login');
			exit;
		}
	
		/* RBAC权限系统开启 */
		if (C('USER_AUTH_ON') == true) {

			/* 对于不是管理员的用户进行权限验证 */
			if (!in_array($this->oUser->account,explode(',',C('ADMIN_AUTH_KEY')))) {
			
				/* RBAC权限验证 */
				$check_result = RBAC::check($this->oUser->id);			
				if ($check_result['status'] == false) $this->error($check_result['message'] );
			}
		}


	}
	
	
	/**
	 * 全局模板变量
	 */
	private function global_tpl_view () {
		$this->assign('nickname',$this->oUser->nickname);
	}
	



	
}


?>