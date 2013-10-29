<?php

/**
 * 会员级别表
 */

class MemberRankModel extends AdminBaseModel {
	
	//获取所有车辆级别数据
	public function seek_all_data () {
		return $this->field('id,identifying,name')->where(array('status'=>0))->select();
	}
	
}

?>
