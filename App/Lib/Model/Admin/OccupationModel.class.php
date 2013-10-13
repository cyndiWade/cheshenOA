<?php

/**
 * 部门模型表
 */

class OccupationModel extends AdminBaseModel {
	
	
	//获取职位数据
	public function seek_child_data ($department_id) {
		$data = $this->where(array('status'=>0,'department_id'=>$department_id))->select();
		parent::set_all_time($data, array('create_time'));
		parent::set_str_len($data, array('remarks'),10);
		return $data;
	}
	
	
	public function seek_one_data ($where) {
		$data = $this->where($where)->find();
		parent::set_all_time($data, array('create_time'));
	
		return $data;
	}
	
	
	//插入数据
	public function add_one_data () {
		$this->create_time = time();
		return $this->add();
	}
	
	//插入数据
	
}

?>
