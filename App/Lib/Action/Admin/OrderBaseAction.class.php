<?php
/**
 * 订单处理基础类
 */
class OrderBaseAction extends CarsBaseAction {
	
	protected $MODULE = '订单管理';

	/**
	 * 订单来源
	 */
	protected $order_from = array(
		'N' => '电话预定',
		'W' => '网站预定',
		'A' => 'APP客户端'		
	);		

	/* 司机 */
	protected $driver = array(
		0 => array(		//
				'id'	=>0,
				'name' => '不需要'
		),
		1 => array(
				'id'	=>1,
				'name' => '需要'
		)
	);
	
	/* 订单提交状态 */
	protected $order_state = array(
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
	
	

	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();

		$this->assign('MODULE_NAME',$this->MODULE);

	}
		
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