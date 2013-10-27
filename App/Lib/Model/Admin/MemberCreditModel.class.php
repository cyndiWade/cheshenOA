<?php

/**
 * 会员信用信息表
 */

class MemberCreditModel extends AdminBaseModel {
	
	
	public function seek_one_data ($where) {
		$data = $this->where($where)->find();
		$data['car'] = json_decode($data['car']);
		$data['house'] = json_decode($data['house']);
		return $data;
	}
	
}

?>
