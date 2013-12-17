<?php

/**
 * 	全局参数类
 */
class GlobalParameterAction extends Action {
	
	/* 保存用户信息，供全局调用 */
	protected $global_system;			//全局系统变量
	
	protected $oUser;						//全局身份标示
	
	protected $db = array();				//数据库对象
	
	
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
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
	}

	

	
}


?>