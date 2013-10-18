<?php

/**
 * 部门模型表
 */

class DepartmentModel extends AdminBaseModel {
	
	
	//获取部门数据
	public function seek_child_data ($where) {
		$data = $this->where($where)->select();
		parent::set_all_time($data, array('create_time'));
		parent::set_str_len($data, array('remarks'), 10);
		return $data;
	}
	
	//查找一条数据
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
}

?>
