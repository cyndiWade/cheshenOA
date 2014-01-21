<?php

/**
 * 员工异动事件模型表
 */

class StaffAlterationModel extends AdminBaseModel {
	
	
	public function seek_all_data ($base_id) {
		return $this->where(array('base_id'=>$base_id,'status'=>0))->select();
	}
	
	public function seek_one_data ($id) {
		return $this->where(array('id'=>$id,'status'=>0))->find();
	}
	
	
}

?>
