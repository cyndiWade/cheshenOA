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
		return  $this->field('id,company_id,grade,brand,car_num,type,car_status')->where(array('company_id'=>$company_id,'status'=>0))->select();
	}
	
}

?>
