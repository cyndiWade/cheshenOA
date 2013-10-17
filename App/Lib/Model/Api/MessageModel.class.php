<?php

/**
 * 用户消息表
 * @author user
 *
 */
class MessageModel extends ApiBaseModel {
	
	
	//获取被人提问列表
	public function  seek_message_data ($user_id) {
		$data = $this->field('id,content')->where(array('user_id'=>$user_id,'status'=>0))->order('id DESC')->select();
		parent::setTime($data);
		return $data;
	}
	
	
	//验证消息是否存在
	public function seek_is_have($id) {
		return $this->where(array('qid'=>$id))->getField('id');
	}
	
	//
	
}

?>
