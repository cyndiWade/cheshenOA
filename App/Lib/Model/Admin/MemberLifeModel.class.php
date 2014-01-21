<?php

/**
 * 会员生活信息表
 */

class MemberLifeModel extends AdminBaseModel {
	
	
	public function seek_one_data ($where) {
		$data = $this->where($where)->find();
		$data['taste'] = json_decode($data['taste']);
		return $data;
	}
	
}

?>
