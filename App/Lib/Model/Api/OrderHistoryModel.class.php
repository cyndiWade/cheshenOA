<?php

/**
 * 订单操作表
 */

class OrderHistoryModel extends ApiBaseModel {
	
	/**
	 * 记录订单操作历史
	 * @param INT $order_id   
	 * @param INT $users_id 
	 * @param STRING $content
	 */
	public function add_order_history ($order_id,$users_id,$content) {
		$this->order_id = $order_id;
		$this->users_id = $users_id;
		$this->content = $content;
		$this->time = time();
		return $this->add();
	}
	
	
	/*
	 * 获取指定订单下，用户的操作记录
	 */
	public function get_order_history ($order_id) {
		$data = $this->field('u.account,h.users_id,h.content,h.time')
		->table($this->prefix.'order_history AS h')
		->join($this->prefix.'users AS u 
				ON h.users_id = u.id')
		->where(array('h.order_id'=>$order_id))
		->select();
		parent::set_all_time($data, array('time'));
		return $data;
	}
	
	
	
}

?>
