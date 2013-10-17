<?php

//用户数据模型
class UsersModel extends ApiBaseModel {
	
	private $user_type;
	
	//添加账号
	public function add_account($type) {
		//写入数据库
		$this->password = md5($this->password);
		$time = time();
		$this->last_login_time = $time;
		$this->last_login_ip = get_client_ip();
		$this->create_time = $time;
		$this->update_time = $time;
		$this->type = $type;				//用户类型
		return $this->add();
	}
	
	
	//通过账号验证账号是否存在
	public function account_is_have ($account) {

		return $this->where(array('account'=>$account))->getField('id');
	}
	
	//获取账号数据
	public function get_user_info ($condition) {
		return $this->where($condition)->find();
	}
	
	
	//更新登录信息
	public function up_login_info ($uid) {
		$time = time();
		$this->last_login_time = $time;
		$this->last_login_ip = get_client_ip();
		$this->login_count = $this->login_count + 1; 
			
		$this->where(array('id'=>$uid))->save();
	
	}
	
	
	//获取用户详细信息
	public function seek_user_data($condition) {
		$data = $this->field('u.id,u.account,f.file_address,u.last_login_time,u.last_login_ip,u.login_count,u.type,i.age,i.sex,i.email,i.province,i.city,i.street,i.interest,i.purchase,i.remarks')
		->table($this->tablePrefix.'users AS u')
		->join($this->tablePrefix.'user_info AS i ON u.id = i.user_id')
		->join($this->tablePrefix.'file AS f ON f.id = i.file_id')
		->where($condition)
		->select();
		
		if (!empty($data)) {
			
			//用户身份
			$conf = C('ACCOUNT_TYPE');
			$this->user_type = array(
				$conf['ADMIN'] => '管理员',
				$conf['USER'] => '普通用户',
				$conf['Director'] => '客户经理',
			);
			
			foreach ($data AS $key=>$val) {
				$data[$key]['last_login_time'] = date('Y-m-d H:i:s',$val['last_login_time']);
				$data[$key]['type'] = $this->user_type[$data[$key]['type']];
			}
		}
		
		return $data;
	}
	
	
	
	
	
}

?>
