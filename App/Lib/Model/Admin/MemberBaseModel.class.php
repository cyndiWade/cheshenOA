<?php

/**
 * 会员基本信息表
 */

class MemberBaseModel extends AdminBaseModel {
	
	
	//获取指定会员数据
	public function seek_rank_data ($rank) {
		return $this->where(array('rank'=>$rank,'status'=>0))->select();
	}
	
	public function add_one_data ($type) {
		$this->type = $type;
		return $this->add();
	}
	
}

?>
