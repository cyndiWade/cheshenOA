<?php

/**
 * 人才储备模型
 */

class ReserveTalentsModel extends AdminBaseModel {
	
	
	public function seek_data_list () {
		return $this->where(array('status'=>0))->select();
	}
	
	
	
	
}

?>
