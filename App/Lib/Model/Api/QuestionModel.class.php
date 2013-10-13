<?php

/**
 * 提问数据模型
 * @author user
 *
 */
class QuestionModel extends ApiBaseModel {
	
	
	//获取被人提问列表
	public function  seek_question_data ($user_id) {
		$data = $this->field('id,content,time')->where(array('status'=>0,'user_id'=>$user_id))->select();
		parent::setTime($data);
		return $data;
	}
	
	/**
	 * 获取提问信息
	 * @param Number $type		1表示未回答的问题，2表示已回答的问题
	 */
	public function seek_question_all_data($type) {	
		$data = $this->field('id,content,time,is_reply')->where(array('status'=>0,'is_reply'=>$type))->select();
		parent::setTime($data);
		return $data;
	}
	
	
	/**
	 * 修改问题为已回复
	 */
	public function update_reply ($id) {
		return $this->where(array('id'=>$id))->data(array('is_reply'=>0))->save();
	}
	
	
	
}

?>
