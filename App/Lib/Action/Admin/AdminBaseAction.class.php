<?php

/**
 * 后台核心类--所有后台方法必须继承此类aAA
 */
class AdminBaseAction extends AppBaseAction {
	
	/* 保存用户信息，供全局调用 */
	protected $global_system;			//全局系统变量
	
	protected $oUser;						//全局身份数据
	
	protected $global_tpl_view;			//全局模板变量
	
	
	/* 订单提交状态 */
	protected $order_state = array(
			0 => array(
					'order_status'	=>0,
					'order_explain' => '用车申请'
			),
			1 => array(
					'order_status'	=>1,
					'order_explain' => '派车申请'
			),
			2 => array(
					'order_status'	=>2,
					'order_explain' => '派车申请通过'
			),
			3 => array(
					'order_status'	=>3,
					'order_explain' => '派车申请拒绝'
			)
	);
	
	/* 订单车辆归还状态 */
	protected $give_back_state = array(
			0 => array(
					'status_num'	=>0,
					'status_explain' => '未归还'
			),
			1 => array(
					'status_num'	=>1,
					'status_explain' => '已归还'
			),
			2 => array(
					'status_num'	=>2,
					'status_explain' => '已归还,超出'
			),
	);
	

	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		
		//初始化
		$this->admin_base_init();
		
		//全局系统变量
		$this->global_system();
		
		//全局模板变量
		$this->global_tpl_view();
	}
	
	
	
	//初始化用户数据
	private function admin_base_init() {

		/* SESSION信息验证保存 */
		$session_userinfo = $_SESSION['user_info'];				//保存用户信息

		if (!empty($session_userinfo)) {
			$this->oUser = (object) $session_userinfo;					//转换成对象
		}  		

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
				if ($check_result['status'] == false) $this->error($check_result['message']);
			}
		}

	}
	

	/**
	 * 手动验证当前用户权限
	 * @param String $module		//验证模块名
	 * @param String $action			//验证分组名
	 */
	protected function chenk_user_rbac ($module,$action,$group = GROUP_NAME) {
		$assign = new stdClass();
		$assign->group = $group;									//当前分组
		$assign->module = $module;							//当前模块
		$assign->action = $action;								//当前方法
		$assign->table_prefix =  C('DB_PREFIX');			//表前缀
	
		$assign->not_auth_group = C('NOT_AUTH_GROUP');			//无需认证分组
		$assign->not_auth_module = C('NOT_AUTH_MODULE');		//无需认证模块
		$assign->not_auth_action = C('NOT_AUTH_ACTION');			//无需认证操作
		RBAC::init($assign);		//初始化数据
		
		/* RBAC权限系统开启 */
		if (C('USER_AUTH_ON') == true) {
		
			/* 对于不是管理员的用户进行权限验证 */
			if (!in_array($this->oUser->account,explode(',',C('ADMIN_AUTH_KEY')))) {
					
				/* RBAC权限验证 */
				$check_result = RBAC::check($this->oUser->id);
				return array('status'=>$check_result['status'],'message'=>$check_result['message']);
				
			} else {
				return array('status'=>true,'message'=>'放行，管理员账号无需验证。');
			}
			
		} else {
			return array('status'=>true,'message'=>'放行，权限验证已关闭。');
		}

	}
	
	
	/**
	 * 全局系统用到的数据
	 */
	private function global_system () {
		$this->global_system['member_rank'] = D('MemberRank')->seek_all_data();
	}
	

	/**
	 * 全局模板变量
	 */
	private function global_tpl_view () {

		/*用户信息global_tpl_view['user_info'] */
		$this->global_tpl_view['user_info']['nickname'] = $this->oUser->nickname;		
		
		/* 车辆导航$this->global_tpl_view['sidebar']['cars'] */
		$this->global_tpl_view['sidebar']['cars'] =  $this->global_system['member_rank']; 	//获取所有会员级别信息
		
		/**
		$first['status'] = 0;
		$first['_logic'] = 'AND';
		$first['order_state'] = array('in',array(0,1));
 		$second['_complex'] = $first;
		$second['_logic'] = 'OR';
		$second['give_back_state'] = array('eq',0);
		*/

		/* 获取订单条数 */
		$Order = D('Order');
		//用车申请
		$this->global_tpl_view['sidebar']['order_count']['apply'] = $Order->seek_order_count(array('order_state'=>$this->order_state[0]['order_status']));
		//派车申请
		$this->global_tpl_view['sidebar']['order_count']['cars_arrange'] = $Order->seek_order_count(array('order_state'=>$this->order_state[1]['order_status']));
		//还车
		$this->global_tpl_view['sidebar']['order_count']['give_back'] = $Order->seek_order_count(array('order_state'=>$this->order_state[2]['order_status']));
		
		//上一页地址
		$this->global_tpl_view['button']['prve'] = C('PREV_URL');

		//写入模板
		$this->assign('global_tpl_view',$this->global_tpl_view);
	}
	

	/**
	 * 上传文件
	 * @param Array    $file  $_FILES['pic']	  上传的数组
	 * @param String   $type   上传文件类型    pic为图片
	 * @return Array	  上传成功返回文件保存信息，失败返回错误信息
	 */
	protected function upload_file($file,$dir,$size= 3145728,$type=array('jpg', 'gif', 'png', 'jpeg')) {
		import('@.ORG.Util.UploadFile');				//引入上传类
	
		$upload = new UploadFile();
		$upload->maxSize  =  $size;					// 设置附件上传大小
		$upload->allowExts  = $type;				// 上传文件的(后缀)（留空为不限制），，
		//上传保存
		$upload->savePath =  $dir;					// 设置附件上传目录
		$upload->autoSub = true;					// 是否使用子目录保存上传文件
		$upload->subType = 'date';					// 子目录创建方式，默认为hash，可以设置为hash或者date日期格式的文件夹名
		$upload->saveRule =  'uniqid';				// 上传文件的保存规则，必须是一个无需任何参数的函数名

		//执行上传
		$execute = $upload->uploadOne($file);
		//执行上传操作
		if(!$execute) {						// 上传错误提示错误信息
			return array('status'=>false,'info'=>$upload->getErrorMsg());
		}else{	//上传成功 获取上传文件信息
			return array('status'=>true,'info'=>$execute);
		}
	}

	
	
	
}


?>