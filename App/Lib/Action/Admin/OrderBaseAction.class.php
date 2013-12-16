<?php
/**
 * 订单处理基础类
 */
class OrderBaseAction extends CarsBaseAction {
	
	protected $MODULE = '订单管理';

	/* 职位司机ID */
	protected $occupation_driver_id = 8;
	
	/* 车辆管理部门职位ID */
	protected $occupation_cars_id = 10;		
		
	
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
	
	/* 司机列表--数据库读取 */
	protected $driver_id = array();	

	/* 司机价格 */
	protected $driver_price = array(
		0 => array(
			'price' => 0,
		),
		200 => array(
			'price' => 200,
		),
		400 => array(
			'price' => 400,
		),
		600 => array(
			'price' => 600,
		),
		800 => array(
			'price' => 800,
		),
		1000 => array(
			'price' => 1000,
		),
	);
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();

		$this->get_driver_list();
		
		$this->assign('MODULE_NAME',$this->MODULE);

	}
	
	
	//获取可用司机列表
	protected function get_driver_list () {
		
		$this->driver_id = D('StaffBase')->seek_usable_driver_list($this->occupation_driver_id);
	}
	
	
	//司机价格
// 	protected function init_driver_price () {
// 		$this->driver_price = array();
// 	}
	
		
	/**
	 * 生成订单号
	 * @param String $from  W，A		(订单来源，W网站，A：app客户端)
	 * @return string
	 */
	protected  function create_order_num($from) {
		if (!array_key_exists($from,$this->order_from)) {
			return array('status'=>false,'info'=>'订单来源错误！'); 
		} 
		return array('status'=>true,'info'=>$from.date('YmdHis').mt_rand(10000,99999));
	}
	
	
	/**
	 * 记录订单操作历史
	 * @param INT $order_id
	 * @param STRING $content
	 */
	protected function order_history ($order_id,$content) {
		return D('OrderHistory')->add_order_history($order_id,$this->oUser->id,$content);
	}
	
	
	
}


?>