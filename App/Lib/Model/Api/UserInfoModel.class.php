<?php

/**
 * 用户详细信息
 * @author Administrator
 *
 */
class UserInfoModel extends ApiBaseModel {
	

	//自动创建与修改用户数据
	public function save_user_data ($user_id) {
		$user_info = $this->where(array('user_id'=>$user_id))->getField('id');
		if (empty($user_info)) {		//不存在就创建
			$this->create();
			$this->id = null;
			$this->user_id = $user_id;
			return $this->add();
		} else {								//存在就修改
			$this->create();
			return $this->where(array('user_id'=>$user_id))->save();
		}
	}
	
	
}

?>
