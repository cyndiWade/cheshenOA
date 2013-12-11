<?php
/**
 * 会员记录
 */
class RecordAction extends OrderBaseAction {
	
	
	protected $MODULE = '会员用车记录';
	
	//初始化数据库连接
	protected  $db = array(
		'Order' => 'Order',
	);
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);

	}
	
	
	/**
	 * 会员用车记录
	 */
	public function use_cars_record () {
		$member_base_id = $this->_get('member_base_id');		//会员ID
		$Order = $this->db['Order'];					//车辆资源表
		
		/* 获取指定会员你下订单 */
		$map['o.member_base_id']  = $member_base_id;
		
		$html_list = $Order->seek_user_order($map);
		
		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];
				/* 订单状态状态说明 */
				$html_list[$key]['order_state_explain'] = $this->order_state[$val['order_state']]['order_explain'];
				/* 车辆归还状态说明 */
				$html_list[$key]['give_back_state_explain'] = $this->give_back_state[$val['give_back_state']]['status_explain'];
				$html_list[$key]['is_need_driver'] = $this->is_need_driver[$val['is_need_driver']]['name'];		//司机
			}
		}
		
		
		$this->assign('ACTION_NAME','用车记录');
		$this->assign('TITILE_NAME','用车记录列表');
		$this->assign('html_list',$html_list);
		$this->display();
		
		
	}
	


	
}

?>