<?php

/**
 * 用户登录注册模块
 */
class LoginAction extends ApiBaseAction {
	
	/**
	 * 追加使用的数据表对象
	 * @var Array  当访问时，$this->db['Member']->query();
	 */
	protected $add_db = array(
		'Member' => 'Member',
		'Verify'=>'Verify',
		'MemberBase' => 'MemberBase'
	);

	
	/* 需要身份验证的方法名 */
	protected $Verify = array();
	
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法
		
		$this->request['account'] = $_POST['account'];							//用户账号
		$this->request['password'] = $_POST['password'];					//用户密码
		$this->request['password_confirm'] = $_POST['password_confirm'];		//确认密码
	}
	
	
	
	//登录验证
	public function login () {
	//	dump($this->request);

		if ($this->isPost()) {
			$Member = $this->db['Member'];						//用户模型表
			$MemberBase = $this->db['MemberBase'];		//会员模型表
			
			$account = $this->request['account'];					//用户账号
			$password = md5($this->request['password']);	//用户密码
			
			$this->check_me();									//验证提交数据
			
			//数据库验证用户信息
			$user_info = $Member->get_user_info($account);

			if (empty($user_info)) {
				parent::callback(C('STATUS_NOT_DATA'),'此用户不存在，或已被禁用');
			} else {
				if ($password != $user_info['password']) {
					parent::callback(C('STATUS_OTHER'),'密码错误');
				} else {
					
					//生成秘钥
					$encryption = $user_info['id'].':'.$user_info['account'].':'.date('Y-m-d');					//生成解密后的数据
					$identity_encryption = passport_encrypt($encryption,C('UNLOCAKING_KEY'));	//生成加密字符串,给客户端
					
					//更新用户登录信息
					$Member->up_login_info($user_info['id']);
					
					//会员信息
					$member_base_info = $MemberBase->seek_member_one_data($user_info['id']);

					dump($member_base_info);
					exit;
					//返回给客户端数据
					parent::callback(C('STATUS_SUCCESS'),'登录成功',
						array(
							'user_key'=>$identity_encryption,
							'account'=>$user_info['account'],
							'nickname'=>$user_info['nickname'],
							
						)
					);
				}	
			}
		}
		$this->display('register');
	}
	
	
	
	//用户注册	
	public function register () {	

		if ($this->isPost()) {		
			//初始化数据
			//验证提交数据
			$this->check_me();		
			$account = $this->request['account'];										//注册账号	
			$password = $this->request['password'];								//密码
			$password_confirm = $this->request['password_confirm'];		//密码确认
			//密码确认验证
			if ($password != $password_confirm) {
				parent::callback(C('STATUS_OTHER'),'二次密码输入不一致');
			}
			
			//短信验证模块
			parent::check_verify($account,1);			//验证类型1为注册验证
			
			//数据库验证
			$Member = $this->db['Member'];						//用户表模型	
			
			//账号验证、数据写入模块
			$is_have = $Member->account_is_have($account);		//查看账号是否存在
			if ($is_have) {
				parent::callback(C('STATUS_OTHER'),'此账号已存在');
			} else {		//添加注册用户
				$Member->create();
				$Member->add_account(C('ACCOUNT_TYPE.USER')) ? parent::callback(C('STATUS_SUCCESS'),'注册成功') : parent::callback(C('STATUS_UPDATE_DATA'),'注册失败');
			}
		} 
			
		$this->display('Login:register');
	}
	

	//验证提交数据
	private function check_me() {
		import("@.Tool.Validate");							//验证类
		//数据验证
		if (Validate::checkNull($this->request['account'])) parent::callback(C('STATUS_OTHER'),'账号为空');
		if ($this->request['account'] != 'admin') {
			if (!Validate::checkPhone($this->request['account'])) parent::callback(C('STATUS_OTHER'),'账号必须为11位的手机号码');
		}
		if (Validate::checkNull($this->request['password'])) parent::callback(C('STATUS_OTHER'),'密码为空');		
	}
	
	


	
}

?>