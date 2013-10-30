<?php

/**
 * 会员卡表
 */

class CardModel extends AdminBaseModel {
	
	
	/**
	 * 根据会员卡号查找数据
	 * @param String $card_number
	 */
	public function seek_card_one ($card_number) {
		return $this->where(array('card_number'=>$card_number,'status'=>0))->find();
	}
	

	
	
}

?>
