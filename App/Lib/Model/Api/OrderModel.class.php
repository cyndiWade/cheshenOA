<?php

/**
 * 订单模型
 *
 */
class OrderModel extends ApiBaseModel {
	
	
	public function __construct() {
		parent::__construct();
	}

	//添加订单
	public function add_order_data () {
		$this->time = time();
		return $this->add();
	}

	//获取可用车辆列表
	public function seek_all_cars ($car_status) {
		$con['status'] = 0;
		$con['car_status'] = array('not in',$car_status);
//		$con['cp.type'] = 1;
		$data = $this->field('id,brand,car_num,type,model,color,consumption,seat_num')
		->where($con)
		->select();
		return $data;
	}

	
	//获取用户订单列表
	public function seek_user_order($parameter) {
		$condition = array('o.status'=>0);
		array_add_to($condition,$parameter);
	
		$data = $this
		->field('o.id,o.order_num,o.start,o.estimate_over,o.over,o.length,o.exceed_date,o.is_need_driver,o.auth_code,o.order_state,o.give_back_state,o.time,c.brand')
		->table($this->prefix.'order AS o')
		->join($this->prefix.'member_base AS m
				ON o.member_base_id=m.id')
				->join($this->prefix.'cars AS c
						ON o.cars_id = c.id')
						->where($condition)
						->order('o.time DESC')
						->select();
		parent::set_all_time($data, array('time','start','estimate_over','over'),'Y-m-d H:i');
		parent::set_str_len($data, array('remarks'), 10);
		return $data;
	}
	
	
	
}

?>
