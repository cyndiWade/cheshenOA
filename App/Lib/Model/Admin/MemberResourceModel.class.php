<?php

/**
 * 会员等级对应可用资源表
 */

class MemberResourceModel extends AdminBaseModel {
	
	/**
	 * 会员与资源类型映射
	 */
	private $resource_type = array();
	

	public function __construct() {
		parent::__construct();

		/* 资源类型映射 */
		$all_resource = $this->field('*')->where(array('status'=>0))->select();
		foreach ($all_resource AS $key=>$val) {
			//资源类型=资源表
			$this->resource_type[$val['resource_type']] = $val['resource_table'];
		}

	}

	
	/**
	 * 获取不同会员等级下可用的资源
	 * @param INT $member_rank_id					//会员级别ID
	 * @param INT $resource_type						//资源类型
	 */
	public function seek_member_resource($member_rank_id,$resource_type) {
		
		$data = $this->field('zyb.*')
		->table($this->prefix.'member_resource AS mr')
		->join('RIGHT JOIN '.$this->prefix.$this->resource_type[$resource_type].' AS zyb ON mr.resource_id=zyb.id')
		->where(array('mr.member_rank_id'=>$member_rank_id,'zyb.status'=>0))
		->select();
		
		return $data;
	}
	
	
}

?>
