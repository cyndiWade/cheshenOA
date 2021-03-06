<?php

/**
 * 订单表
 */

class OrderModel extends AdminBaseModel {
	
	public function add_order_data () {
		$this->time = time();
		return $this->add();
	}
	
	//获取用户订单列表
	public function seek_user_order($parameter) {
		$condition = array('o.status'=>0);
		array_add_to($condition,$parameter);

		$data = $this
		->field('m.id AS member_base_id,m.name,m.driving_years,o.*,c.brand')
		->table($this->prefix.'order AS o')
		->join($this->prefix.'member_base AS m
					 ON o.member_base_id=m.id')
		->join($this->prefix.'cars AS c 
					ON o.cars_id = c.id')			 
		->where($condition)
		->order('o.time DESC')
		->select();
		parent::set_all_time($data, array('time','start','estimate_over','over'),'Y-m-d H:i');
		//parent::set_str_len($data, array('remarks'), 10);
		return $data;
	}
	
	
	public function seek_one_data($id) {
		$data = parent::get_one_data(array('id'=>$id,'status'=>0));
		parent::set_all_time($data, array('time','start','estimate_over','over'),'Y-m-d H:i');
		return $data;
	}
	
	
	/**
	 * 获取指定订单状态的记录条数
	 * @param Array $parameter
	 */
	public function seek_order_count ($parameter) {
		$condition = array('status'=>0);
		array_add_to($condition,$parameter);
		$count = $this->where($condition)->count();
		return $count;
	}
	
}

?>
