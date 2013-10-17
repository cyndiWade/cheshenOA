<?php

/**
 * 公司区域表
 */

class CompanyModel extends AdminBaseModel {
	
	public function seek_one_data ($id) {
		return $this->where(array('id'=>$id,'status'=>0))->find();
	}
	
	
	public function company_region_view () {
		$DB_PREFIX  = C('DB_PREFIX');
		$data = $this->field('c.*,r.region_name')
		->table($DB_PREFIX.'company AS c')
		->join($DB_PREFIX.'region AS r ON c.region_id = r.region_id')
		->where(array('c.status'=>0))
		->select();
		return $data;
	}
}

?>
