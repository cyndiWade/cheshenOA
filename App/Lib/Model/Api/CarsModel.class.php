<?php

/**
 * 注册用户车辆模型表
 *
 */
class CarsModel extends ApiBaseModel {
	
	
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

	/**
	 * 获取对应车辆级别下，分公司内车辆信息
	 * @param INT $cars_grade_id		车辆等级ID
	 * @param INT $company_id			分公司ID
	 */
	public function seek_cars_list ($cars_grade_id,$company_id,$car_status) {
		$map['status'] =0;
		$map['cars_grade_id'] = $cars_grade_id;
		$map['company_id'] = $company_id;
		$map['car_status'] = array('not in',$car_status);
		return $this->field('*')->where(array($map))->select();
	}
	
	
}

?>
