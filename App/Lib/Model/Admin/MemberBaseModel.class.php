<?php

/**
 * 会员基本信息表
 */

class MemberBaseModel extends AdminBaseModel {
	
	
	//获取指定会员数据
	public function seek_rank_data ($member_rank_id) {
		return $this->where(array('member_rank_id'=>$member_rank_id,'status'=>0))->select();
	}
	

	
}

?>
