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
		'Card' => 'Card'
	);

	
	/* 需要身份验证的方法名 */
	protected $Verify = array(
		'get_member_info'
	);
	
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法
		
		$this->request['member_id'] = $this->_post('member_id');			//会员ID
		$this->request['card_number'] = $this->_post('card_number');	//会员卡号
	}
	
	
	/**
	 * 获取会员详细信息
	 */
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
	
	
	
	/**
	 * 会员注册接口
	 */
	public function member_register() {
		$MemberBase = $this->db['MemberBase'];		//会员基本信息表
		$Card = $this->db['Card'];									//会员卡片
		$Member = $this->db['Member'];						//注册账号表

		if ($this->isPost()) {	
			/* 数据验证 */
			$check_result = $this->check_post_data();
			if (!empty($check_result)) {
				foreach ($check_result AS $key=>$val) {
					if ($val['status'] == false) {
						$this->error($val['info']);
						break;
					}	
				}
			}
			//注册账号ID
			$member_id = $this->request['member_id'];
			$card_number = $this->request['card_number'];
			
			/* 验证会员卡是否存在 */
			if ($this->member_rank_id == 9) {	//股东会员处理
				$Card->type = 'G';
			} else {
				$Card->type = 'H';
			}
			$is_have=$Card->seek_card_one($card_number);
			if ($is_have) $this->error('此会员卡已存在！');
			
			/* 会员来源数据处理 */
			$check_source_result =$this->check_recommend_people();
			if ($check_source_result != false) {
				if ($check_source_result['status'] == false) {
					$this->error($check_source_result['info']);
				} 
			}
	
			/* 写入数据库 */			
			$MemberBase->create();
			$MemberBase->property = implode(',',$MemberBase->property);
			$member_base_id = $MemberBase->add();
			
			if ($member_base_id) {
				//添加卡号
				$Card->member_base_id = $member_base_id;
				$Card->card_number = $card_number;	
				$Card->add();
				
				//修改注册账号为会员
				$Member->is_rank = 1;		//账号变成会员
				$Member->update_user_info($member_id);

				 $this->success('添加成功！') ;
			} else {
				$this->error('添加失败！');
			}
			
		}
	}
	
	
	
}
?>