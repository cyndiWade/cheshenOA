<?php

/**
 * 会员基本信息表
 */

class MemberBaseModel extends AdminBaseModel {
	
	
	//获取指定会员数据
	public function seek_rank_data ($member_rank_id) {
		return $this->where(array('member_rank_id'=>$member_rank_id,'status'=>0))->select();
	}
	
	//获取所有会员数据
	public function seek_all_data() {
		return $this->field('b.*,c.card_number')
		->table($this->prefix.'member_base AS b')
		->join($this->prefix.'card AS c ON b.id = c.member_base_id')
		->where(array('b.status'=>0))
		->select();
	}
	
}

?>
