<?php

/**
 * 注册用户表模型
 *
 */
class MemberModel extends AdminBaseModel {
	
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
		$this->last_login_time = $time;
		$this->last_login_ip = get_client_ip();
		$this->login_count = $this->login_count + 1; 
			
		$this->where(array('id'=>$uid))->save();
	
	}
	
	
	//获取所有用户数据
	public function seek_all_list () {
		$data = $this->where(array('status'=>0))->select();
		parent::set_all_time($data, array('last_login_time','create_time','update_time'));
		return $data;
	}
	
	
	/**
	 *	通过用户账号，获取相应的会员ID信息
	 * @param String $account
	 */
	public function seek_base_info ($account) {
		return $this->field('m.id AS use_id,mb.id')
		->table($this->prefix.'member AS m')
		->join($this->prefix.'member_base AS mb ON m.id=mb.member_id')
		->where(array('m.account'=>$account,'m.status'=>0,'mb.status'=>0))
		->find();
	}
	
	
	
	
}

?>
