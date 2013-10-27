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
		$this->admin_base_init();
		
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
		$upload->autoSub = true;						// 是否使用子目录保存上传文件
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