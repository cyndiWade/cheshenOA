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
		'Member'=>'Member',
		'MemberResource' => 'MemberResource',		//会员享有资源表
		'MemberBase' => 'MemberBase',					//会员基本信息表
		'CarsSchedule' => 'CarsSchedule',					//车辆日程表
		'Cars' => 'Cars'													//车辆资源表
	);
	
	/* 需要身份验证的方法名 */
	protected $Verify = array(
			'apply'
	);
	
	
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法

	}
	
	
	//车辆预定接口	
	public function apply () {
		$MemberResource = $this->db['MemberResource'];		// 会员等级对应可用资源表（会员）
		$MemberBase = $this->db['MemberBase'];						//会员基本信息表
		$Cars = $this->db['Cars'];														//车辆资源表
		$CarsSchedule = $this->db['CarsSchedule'];						//车辆日程表
		echo 123;

		exit;
		
		$member_base_id = $this->_get('member_base_id');
		$start = strtotime('2013-11-26 00:10');
		$estimate_over = strtotime('2013-12-1 21:00');		//1385902800		
 
		
 		$member_base_id = $this->_post('member_base_id');		//会员ID
 		$start = strtotime($this->_post('start_schedule_time'));			//开始用车日期
 		$estimate_over = strtotime($this->_post('over_schedule_time'));		//预计还车日期

 		/* 参数验证 */
 		if (empty($member_base_id)) parent::callback(C('STATUS_NOT_DATA'),'会员标识不存在');
 		if (empty($start)) parent::callback(C('STATUS_NOT_DATA'),'用车开始时间不得为空');
 		if (empty($estimate_over)) parent::callback(C('STATUS_NOT_DATA'),'预计还车时间还车时间不得为空');
		if ($start > $estimate_over) parent::callback(C('STATUS_OTHER'),'开始日期不得大于结束日期');
		if ($start < time()) parent::callback(C('STATUS_OTHER'),'开始日期不得小于当前日期');
		
		
		/* 通过会员ID，找到会员对应的会员信息，以及会员级别 */
		$member_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$member_base_id),'member_rank_id,use_car_number,name,over_date');
		if (empty($member_info)) parent::callback(C('STATUS_NOT_DATA'),'此会员不存在！');

		/* 按照会员级别，获取会员享有资源类型(如车辆资源) */
		$resource_detail = $MemberResource->seek_member_resource($member_info['member_rank_id'],$this->resource_type[1]);
		$resource_detail = $resource_detail[0];
		
		if ($resource_detail) {
			$cars_grade_id = $resource_detail['id'];					//车辆资源级别ID
			$car_number = $resource_detail['car_number'];		//车辆资源可使用天数
			$company_id = 1;														//车辆所属区域，目前业务暂时只在深圳
				
			//获取当前类型下，会员可享受的车辆资源列表
			$cars_list = $Cars->seek_cars_list($cars_grade_id,$company_id,$this->cars_disabled);
			if (empty($cars_list)) parent::callback(C('STATUS_NOT_DATA'),'暂无可用车辆资源！');
			
			//获取可用车辆日程信息
			$cars_ids = getArrayByField($cars_list,'id');		//可用车辆ID集
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

			//返回处理
			if (empty($usable_cars)) {
				parent::callback(C('STATUS_NOT_DATA'),'此时间段无可用车辆');
			} else {
				parent::callback(C('STATUS_SUCCESS'),'获取完毕',$usable_cars);
			}
			
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'此级别的会员没有可分配的车辆资源！');
		}

	}
	
	//parent::callback(C('STATUS_SUCCESS'),'获取成功！',$cars_list);
	//parent::callback(C('STATUS_NOT_DATA'),'没有数据！');
	


	//验证提交数据
	private function check_me() {
		import("@.Tool.Validate");							//验证类
		//数据验证
		if (Validate::checkNull($this->request['account'])) parent::callback(C('STATUS_OTHER'),'账号为空');
		if ($this->request['account'] != 'admin') {
			if (!Validate::checkPhone($this->request['account'])) parent::callback(C('STATUS_OTHER'),'账号必须为11位的手机号码');
		}
		if (Validate::checkNull($this->request['password'])) parent::callback(C('STATUS_OTHER'),'密码为空');		
	}
	
	


	
}

?>