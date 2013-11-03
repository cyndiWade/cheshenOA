<?php

/**
 * 员工政绩表
 */

class StaffAchievementsModel extends AdminBaseModel {
	
	
	/**
	 * 员工政绩表，顺便找出操作者账号
	 * @param INT $base_id
	 */
	public function seek_all_data ($base_id) {
		 $data = $this
		->field('u.account,sa.*')
		->table($this->prefix.'staff_achievements AS sa')
		->join($this->prefix.'users AS u ON sa.users_id = u.id')
		->where(array('sa.base_id'=>$base_id,'sa.status'=>0))
		->select();
		 parent::set_all_time($data, array('time'));
		 return $data;
	}
	
	
	public function seek_one_data ($id) {
		return $this->where(array('id'=>$id,'status'=>0))->find();
	}
	
	
	
	
}

?>
