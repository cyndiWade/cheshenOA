<?php

/**
 * 订单模型
 *
 */
class OrderModel extends ApiBaseModel {
	
	
	public function __construct() {
		parent::__construct();
	}

	
	//获取账号数据
	public function seek_all_cars ($car_status) {
		$con['status'] = 0;
		$con['car_status'] = array('not in',$car_status);
//		$con['cp.type'] = 1;
		$data = $this->field('id,brand,car_num,type,model,color,consumption,seat_num')
		->where($con)
		->select();

		return $data;
	}

	
	
	
}

?>
