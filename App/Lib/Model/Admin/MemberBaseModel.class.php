<?php

/**
 * 会员基本信息表
 */

class MemberBaseModel extends AdminBaseModel {
	
	
	//获取指定会员数据
	public function seek_rank_data ($member_rank_id) {
		$data = $this->field('mb.*,m.account')
		->table($this->prefix.'member_base AS mb')
		->join($this->prefix.'member AS m ON mb.member_id = m.id')
		->where(array('mb.member_rank_id'=>$member_rank_id,'mb.status'=>0))
		->select();
		return $data;
	//	return $this->where(array('member_rank_id'=>$member_rank_id,'status'=>0))->select();
	}
	
	//获取所有会员数据
	public function seek_all_data() {
		return $this->field('b.*,c.card_number')
		->table($this->prefix.'member_base AS b')
		->join($this->prefix.'card AS c ON b.id = c.member_base_id')
		->where(array('b.status'=>0))
		->select();
	}
	
	
	
	/**
	 * 获取推荐用户
	 * @param INT $source
	 * @param string $account
	 */
	public function seek_recommend_member ($source,$account) {
		$data = $this->field('mb.*,m.account')
		->table($this->prefix.'member_base AS mb')
		->join($this->prefix.'member AS m ON mb.member_id = m.id')
		->where(array('source'=>$source,'mb.source_content'=>$account,'mb.status'=>0))
		->select();
		return $data;
	}
	
}

?>
