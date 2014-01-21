<?php

/**
 * 会员类型表阿
 */

class MemberRankModel extends ApiBaseModel {
	
	//获取所有会员级别信息
	public function seek_all_data () {
		return $this->field('id,identifying,name,content,is_start')->where(array('status'=>0))->order('sort ASC')->select();
	}
	
	//获取启用的会员信息
	public function seek_start_data () {
		return $this->field('id,identifying,name,content')->where(array('status'=>0,'is_start'=>0))->select();
	}
	
}

?>
