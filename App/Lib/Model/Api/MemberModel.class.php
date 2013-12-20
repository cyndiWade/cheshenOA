<?php

/**
 * 注册用户表模型
 *
 */
class MemberModel extends ApiBaseModel {
	
	
	public function __construct() {
		parent::__construct();
	}

	
	//获取账号数据
	public function get_user_info ($account) {
		$data =  $this->field('id,account,nickname,password,last_login_time,last_login_ip')
		->where(array('account'=>$account,'status'=>0))
		->find();
		parent::set_all_time($data, array('last_login_time'));
		return $data;
	}
	

	//添加账号
	public function add_account() {
		//写入数据库
		$this->password = md5($this->password);
		$time = time();
		$this->last_login_time = $time;
		$this->last_login_ip = get_client_ip();
		$this->create_time = $time;
		$this->update_time = $time;
		return $this->add();
	}
	
	//通过账号验证账号是否存在
	public function account_is_have ($account) {
		return $this->where(array('account'=>$account))->getField('id');
	}

	
	//修改用户数据
	public function update_user_info ($id) {
		$this->update_time = time();
		return $this->where(array('id'=>$id))->save();
	}
	
	//获取用户账号详细数据
	public function seek_account_info ($id) {
		$data = $this->where(array('id'=>$id))->find();
		parent::set_all_time($data, array('last_login_time','create_time','update_time'));
		return $data;
	} 
	
	
	//更新登录信息
	public function up_login_info ($uid) {
		$time = time();
		$con['last_login_time'] = $time;
		$con['last_login_ip'] = get_client_ip();
		$con['login_count'] = array('exp','login_count+1');	
		return $this->where(array('id'=>$uid))->save($con);
	}
	
	
	//获取所有用户数据
	public function seek_all_list () {
		$data = $this->where(array('status'=>0))->select();
		parent::set_all_time($data, array('last_login_time','create_time','update_time'));
		return $data;
	}
	
	
	
	
	
	
	
}

?>
