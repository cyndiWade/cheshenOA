<?php

/**
 * 车辆照片模型表
 *
 */
class CarsPhotoModel extends ApiBaseModel {
	
	
	public function __construct() {
		parent::__construct();
	}

	
	//获取车辆下的照片数据
	public function seek_car_photos ($cars_id_s) {
		return $this->field('cars_id,url')
		->where(array('cars_id'=>array('in',$cars_id_s),'type'=>1,'status'=>0))
		->select();
	}

	
	
	
}

?>
