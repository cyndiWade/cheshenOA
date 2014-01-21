<?php

/**
 * 车辆级别表
 */

class CarsGradeModel extends ApiBaseModel {
	
	
	
	//获取所有车辆级别数据
	public function seek_all_data () {
		return $this->field('id,identifying,name')->where(array('status'=>0))->select();
	}
	
}

?>
