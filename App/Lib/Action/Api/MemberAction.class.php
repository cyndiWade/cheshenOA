<?php

/**
 * 获取会员信息模块
 */
class MemberAction extends ApiBaseAction {
	
	/**
	 * 追加使用的数据表对象
	 * @var Array  当访问时，$this->db['Member']->query();
	 */
	protected $add_db = array(
		'Member' => 'Member',
		'Verify'=>'Verify',
		'MemberBase' => 'MemberBase',
		'MemberResource' => 'MemberResource',
	);

	
	/* 需要身份验证的方法名 */
	protected $Verify = array(
			'get_member_info'
			);
	
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法
	}
	
	
	public function get_member_info () {
		$MemberBase = $this->db['MemberBase'];		//会员模型表
		$MemberResource = $this->db['MemberResource'];		//资源关系表
		
		//查找会员信息
		$member_base_info = $MemberBase->seek_member_one_data($this->oUser->id);
	
		//会员登录时
		if ($member_base_info) {
			$resource_detail = $MemberResource->seek_member_resource($member_base_info['member_rank_id'],$this->resource_type[1]);
			$resource_detail = $resource_detail[0];
			$car_number = $resource_detail['car_number'];			//车辆资源总天数
		
			$member_data = array(
					'name'=>$member_base_info['name'],
					'date' =>$member_base_info['date'],
					'over_date' =>$member_base_info['over_date'],
					'member_rank'	=> $this->member_rank[$member_base_info['member_rank_id']],
					'use_car_number' => $member_base_info['use_car_number'],
					'car_number' => $car_number
			);
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$member_data);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'会员不存在！');
		}
		
	}
	
	
	
}
?>