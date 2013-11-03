<?php

/**
 * 车辆信息表
 */

class CarsModel extends AdminBaseModel {
	
	/**
	 * 获取当前区域下的车辆数据
	 * @param INT	 $company_id		//区域ID
	 */
	public function seek_car_info ($company_id) {
		return  $this->field('id,company_id,cars_grade_id,brand,car_num,type,car_status')->where(array('company_id'=>$company_id,'status'=>0))->select();
	}
	

	/**
	 * 获取对应车辆级别下，分公司内车辆信息
	 * @param INT $cars_grade_id		车辆等级ID
	 * @param INT $company_id			分公司ID
	 */
	public function seek_cars_list ($cars_grade_id,$company_id) {
		return $this->field('*')->where(array('status'=>0,'cars_grade_id'=>$cars_grade_id,'company_id'=>$company_id))->select();
	}
	
	
}

?>
