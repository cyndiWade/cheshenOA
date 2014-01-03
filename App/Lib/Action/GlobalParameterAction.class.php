<?php

/**
 * 	全局参数类
 */
class GlobalParameterAction extends Action {
	
	protected $add_db = array();		//追加的DB对象
	
	protected $db = array();				//数据库对象
	
	/* 保存用户信息，供全局调用 */
	protected $global_system;			//全局系统变量
	
	protected $oUser;						//全局身份标示
	
	protected $shareholder_id = 9;	//股东ID
	
	/* 会员来源 */
	public $source_select = array(
			1 => '文华（期）',
			2 => '推荐（推荐方账号）',
			3 => '自主报名（信息来源）',
			4 => '其他',
	);
	   
	/* 资源类型 */
	protected $resource_type = array(
			1 => 1 ,		//表示车辆资源
			//	 '2' => 2,
	);

	protected $car_grade = array();
	
	/* 订单提交状态 */
	protected $order_state = array(
			-2 => array(
					'order_status'	=>-2,
					'order_explain' => '取消订单'
			),
				
			0 => array(
					'order_status'	=>0,
					'order_explain' => '用车申请'
			),
			1 => array(
					'order_status'	=>1,
					'order_explain' => '派车申请'
			),
			2 => array(
					'order_status'	=>2,
					'order_explain' => '派车申请通过'
			),
			3 => array(
					'order_status'	=>3,
					'order_explain' => '派车申请拒绝'
			)
	);
	
	/* 订单车辆归还状态 */
	protected $give_back_state = array(
			0 => array(
					'status_num'	=>0,
					'status_explain' => '未归还'
			),
			1 => array(
					'status_num'	=>1,
					'status_explain' => '已归还'
			),
			2 => array(
					'status_num'	=>2,
					'status_explain' => '已归还,超出'
			),
	);
	
	
	/* 取消订单状态 */
	protected $is_cancel = array(
			0 => array(
					'status_num'	=>0,
					'status_explain' => '正常'
			),
			1 => array(
					'status_num'	=>1,
					'status_explain' => '取消'
			)
	);
	
	
	/**
	 * 订单来源
	 */
	protected $order_from = array(
			'N' => '电话预定',
			'W' => '网站预定',
			'A' => 'APP客户端',
			'S' => '往期订单(手补)'
	);
	
	/* 是否需要司机 */
	protected $is_need_driver = array(
			0 => array(		//
					'id'	=>0,
					'name' => '不需要'
			),
			1 => array(
					'id'	=>1,
					'name' => '需要'
			)
	);
	
	
	//不可使用车辆状态与$car_status对应关系
	protected $cars_disabled = array(
			//1,2,3
			1,2
	);
	
	//车辆所属区域，目前业务暂时只在深圳(暂时用到的地方为：CarsSchedule)
	protected  $company_id = array(
		'shenzhen' => 1,	
			
	);	
	

	//车辆状态
	protected $car_status = array(
			0 => '正常',
			1 => '维修中',
			2 => '报废',
			3 => '租用中',
	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
	}

	

	
}


?>