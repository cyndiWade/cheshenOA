<?php

/**
 * 区域模型表
 */

class RegionModel extends AdminBaseModel {
	
	//获取所有区域数据
	public function seek_level_data ($parent_id) {
		return $this->where(array('parent_id'=>$parent_id))->select();
	}
	
}

?>
