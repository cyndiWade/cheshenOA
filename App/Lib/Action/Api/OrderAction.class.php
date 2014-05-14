<?php

/**
 * 订单控制器
 */
class OrderAction extends ApiBaseAction {
	
	/**
	 * 追加使用的数据表对象
	 * @var Array  当访问时，$this->db['Member']->query();
	 */
	protected $add_db = array(
		'Member'=>'Member',									//用户账号表
		'MemberResource' => 'MemberResource',		//会员享有资源表
		'MemberBase' => 'MemberBase',					//会员基本信息表
		'CarsSchedule' => 'CarsSchedule',				//车辆日程表
		'Cars' => 'Cars',											//车辆资源表
		'Order' => 'Order',											//订单表
		'OrderHistory' => 'OrderHistory'
	);
	
	/* 需要身份验证的方法名 */
	protected $Verify = array(
			'apply',
			'get_user_orders',
			'cancel_order'
	);
	
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法
		
		$this->request['start_schedule_time'] = $this->_post('start_schedule_time');					//开始用车日期
		$this->request['over_schedule_time'] = $this->_post('over_schedule_time');					//预计还车日期
		$this->request['cars_id'] = $this->_post('cars_id');															//车辆ID		
		$this->request['is_need_driver'] = $this->_post('is_need_driver');									//是否需要司机
		$this->request['order_id'] = $this->_post('order_id');														//订单ID
		//$this->request['order_id'] = $this->_get('order_id');													
		$this->request['give_car'] = $this->_post('give_car');														//知否需要送车
		$this->request['remarks'] = $this->_post('remarks');														//备注
	
	}
	
	
	//车辆预定接口	
	public function apply () {
		
		if ($this->isPost() == false) {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
		
		$MemberResource = $this->db['MemberResource'];				//会员等级对应可用资源表（会员）
		$Member = $this->db['Member'];											//会员用户表
		$MemberBase = $this->db['MemberBase'];							//会员基本信息表
		$Cars = $this->db['Cars'];														//车辆资源表
		$CarsSchedule = $this->db['CarsSchedule'];						//车辆日程表
		$Order = $this->db['Order'];													//订单表

		//请求参数
		$start = strtotime($this->request['start_schedule_time']);					//开始用车日期
		$estimate_over = strtotime($this->request['over_schedule_time']);		//预计还车日期
		$cars_id = $this->request['cars_id'];													//车辆ID
		$is_need_driver = $this->request['is_need_driver'];							//是否需要司机
		$give_car = $this->request['give_car'];												//是否需要送车
		$remarks = $this->request['remarks'];												//备注
		
// 		$start = strtotime($this->_post('start_schedule_time'));					//开始用车日期
// 		$estimate_over = strtotime($this->_post('over_schedule_time'));	//预计还车日期
// 		$cars_id = $this->_post('cars_id');													//车辆ID		
// 		$is_need_driver = $this->_post('is_need_driver');							//是否需要司机
		
		//$start = strtotime('2013-12-27 00:10');
		//$estimate_over = strtotime('2014-1-20 21:00');		//1385902800		
		//$cars_id = 10010;
		//$is_need_driver = 1;
		
		//通过用户账号，获取会员ID
		$ids = $MemberBase->seek_base_info($this->oUser->account);		
		$member_id = $ids['use_id'];					//账号ID
		$member_base_id = $ids['id'];				//会员ID	

 		/* 参数验证 */
		if (empty($cars_id)) parent::callback(C('STATUS_NOT_DATA'),'申请车辆不得为空！');
		if (empty($member_id)) parent::callback(C('STATUS_NOT_DATA'),'用户不存在！');
 		if (empty($member_base_id)) parent::callback(C('STATUS_NOT_DATA'),'车辆只对车神会员开放');
 		if (empty($start)) parent::callback(C('STATUS_NOT_DATA'),'用车开始时间不得为空');
 		if (empty($estimate_over)) parent::callback(C('STATUS_NOT_DATA'),'预计还车时间还车时间不得为空');
		if ($start > $estimate_over) parent::callback(C('STATUS_OTHER'),'开始日期不得大于结束日期');
		if ($start < time()) parent::callback(C('STATUS_OTHER'),'开始日期不得小于当前日期');
		
		/* 通过会员ID，找到会员对应的会员信息，以及会员级别 */
		$member_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$member_base_id),'member_rank_id,use_car_number,name,over_date,mobile_phone');
		if (empty($member_info)) parent::callback(C('STATUS_NOT_DATA'),'此会员不存在或已被删除！');
		$mobile_phone = $member_info['mobile_phone'];		//电话号码
		
		/* 按照会员级别，获取会员享有资源类型(如车辆资源) */
		$resource_detail = $MemberResource->seek_member_resource($member_info['member_rank_id'],$this->resource_type[1]);
		$resource_detail = $resource_detail[0];
		
		if ($resource_detail == true) {
			$cars_grade_id = $resource_detail['id'];					//车辆资源级别ID
			$car_number = $resource_detail['car_number'];		//车辆资源可使用天数
			$company_id = $this->company_id['shenzhen'];		//车辆所属区域，目前业务暂时只在深圳

			//获取会员等级，对应的车辆级别下的车辆数据。
			$cars_list = $Cars->seek_cars_list($cars_grade_id,$company_id,$this->cars_disabled);			
			if (empty($cars_list)) parent::callback(C('STATUS_NOT_DATA'),'您的会员级别，暂无分配车辆资源');
			
			//当请求的车辆不在此会员享有的车辆下，提示错误
			//$cars_ids = getArrayByField($cars_list,'id');		//可用车辆ID集
			//if (in_array($cars_id,$cars_ids) == false) parent::callback(C('STATUS_NOT_DATA'),'您的会员级别不适用与此车辆');
	
/*  以下是车辆的日程查看处理  */		
			//车辆日程内可用信息
			$available_cars_list = $CarsSchedule->Seek_Usable_Cars($cars_ids,$start,$estimate_over);						
			$usable_cars = array();		//保存可以用的车辆	
	
			//日程存在时
			if ($available_cars_list) {
				//筛选出与日程不冲突的车辆
				foreach ($cars_list AS $key=>$val) {
					
					/* 对木有日程安排的车辆排除， */
					if (array_key_exists($val['id'],$available_cars_list)) {
						if ($available_cars_list[$val['id']]['available'] == true) {	//查看预订日期与预计还车日期  是否 跟已有日程冲突
							array_push($usable_cars,$cars_list[$key]);		//把不冲突的车辆加入到usable_cars中
						}
					} else {
						array_push($usable_cars,$cars_list[$key]);			//没有日程安排的车辆加入可以车辆中。
					}		
				}	
			
			//日程不存在时默认所有车辆都可用	
			} else {
				$usable_cars = $cars_list;
			}

			//返回可用的车辆
			if ($usable_cars == true) {
				$usable_cars_ids = getArrayByField($usable_cars,'id');		//通过日程筛选后，还可用的车辆
				//租用车辆在可用车辆内时，表示可以下单。
				if (in_array($cars_id, $usable_cars_ids)) {
					
					//生成订单号
					$create_order =  parent::create_order_num('W');
					if ($create_order['status'] == false) parent::callback(C('STATUS_OTHER'),$create_order['info']); 
					$order_num = $create_order['info'];	

					//订单信息写入数据库
					$Order->order_num = $order_num;
					$Order->member_base_id = $member_base_id;
					$Order->start = $start;
					$Order->estimate_over = $estimate_over;
					$Order->cars_id = $cars_id;
					$Order->order_state	= $this->order_state[0]['order_status'];		//状态：申请订单	
					//当需要司机时，每天200元
					if ($is_need_driver == 1) {
						$Order->is_need_driver = 1;
						$Order->driver_price = 200;
					}
					$Order->give_car = $give_car;		//是否需要送车
					$Order->remarks = $remarks;		//备注
					
					$order_id = $Order->add_order_data();		//写入数据库
					
					if ($order_id) {
						parent::order_history($order_id,'申请订单！');	
						$send_result = parent::send_shp($mobile_phone, '亲爱的会员，您的订单已生成完毕，订单号为：'.$order_num.'。');
						parent::callback(C('STATUS_SUCCESS'),'订单提交成功！',array('order_num'=>$order_num));
					} else {
						parent::callback(C('STATUS_UPDATE_DATA'),'订单提交失败，请重新尝试！');
					}
					
				} else {
					parent::callback(C('STATUS_NOT_DATA'),'车辆已被预订');
				}

			} else {
				parent::callback(C('STATUS_NOT_DATA'),'此时间段无可用车辆');
				
			}
			
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'此级别的会员没有可分配的车辆资源！');
		}

	}
	

	
	/**
	 * 获取用户订单
	 */
	public function get_user_orders() {
		$MemberBase = $this->db['MemberBase'];
		$Order = $this->db['Order'];
	
		$user_info = $MemberBase->seek_base_info($this->oUser->account);
		$member_id = $user_info['use_id'];					//账号ID
		$member_base_id = $user_info['id'];					//会员ID
		
		/* 参数验证 */
		if (empty($member_id)) parent::callback(C('STATUS_NOT_DATA'),'用户不存在！');
		if (empty($member_base_id)) parent::callback(C('STATUS_NOT_DATA'),'你还不是会员，请联系我们加入会员');
		
		//查找会员订单
		$con['o.member_base_id'] = $member_base_id;
		$order_list = $Order->seek_user_order($con);
		
		if ($order_list == true) {
			foreach ($order_list AS $key=>$val) {
				//	$order_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];		//获取订单来源
				$order_list[$key]['is_need_driver'] = $this->is_need_driver[$val['is_need_driver']]['name'];		//司机
				$order_list[$key]['order_state_name'] = $this->order_state[$val['order_state']]['order_explain'];		//订单状态
				$order_list[$key]['give_back_state_name'] = $this->give_back_state[$val['give_back_state']]['status_explain'];		//司机
			}
			parent::callback(C('STATUS_SUCCESS'),'获取成功！',$order_list);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'暂无订单数据！');
		}

	}
	
	
	
	/**
	 * 订单取消
	 */
	public function cancel_order() {
		$Order = $this->db['Order'];
		$order_id = $this->request['order_id'];		//订单ID

		//获取订单数据
		$order_status = $Order->get_one_data(array('id'=>$order_id),'order_state');
		if ($order_status == false) parent::callback(C('STATUS_NOT_DATA'),'无此订单信息！'); 
		$order_status = $order_status['order_state'];
		
		//可以取消的订单状态
		$cannot_cancel_status = array(
				$this->order_state[-2]['order_status'],
				$this->order_state[0]['order_status'],
				$this->order_state[1]['order_status'],
		);
		if (in_array($order_status,$cannot_cancel_status) == true) {
			$Order->order_state = $this->order_state[-2]['order_status'];		//修改订单状态为取消
			$Order->save_one_data(array('id'=>$order_id));		//执行修改
			parent::order_history($order_id, '取消订单！');				//写入日志
			parent::callback(C('STATUS_SUCCESS'),'取消成功！');
		} else {
			parent::callback(C('STATUS_UPDATE_DATA'),'您的订单已通过审核，无法取消！');
		}
		
		
	}
	
	
	
	
}

?>