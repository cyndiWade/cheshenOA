<?php

/**
 * 员工基本信息模型表
 */

class StaffBaseModel extends AdminBaseModel {
	
	
	//获取职位数据列表
	public function seek_data_list () {
		$PREFIX = C('DB_PREFIX');
		$data = $this->field('s.id,s.name,s.sex,d.name AS name1,o.name AS name2')
		->table($PREFIX.'staff_base AS s')
		->join($PREFIX.'department AS d ON s.department_id=d.id')
		->join($PREFIX.'occupation AS o ON s.occupation_id=o.id')
		->where(array('s.status'=>0))
		->select();
		return $data;
	}
	
	//获取详细数据
	public function seek_detail_data ($id,$field) {
		return $this->field($field)->where(array('id'=>$id))->find();
	}
	
	
	
	
	//插入数据
	public function add_one_data () {
		$this->create_time = time();
		return $this->add();
	}
	
	
}

?>
