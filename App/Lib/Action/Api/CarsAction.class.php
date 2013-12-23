<?php

/**
 * 车辆管理模块
 */
class CarsAction extends ApiBaseAction {
	
	/**
	 * 追加使用的数据表对象
	 * @var Array  当访问时，$this->db['Member']->query();
	 */
	protected $add_db = array(
		'Cars' => 'Cars',
		'CarsPhoto' => 'CarsPhoto'
	);
	
	/* 需要身份验证的方法名 */
	protected $Verify = array();
		
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法

	}
	
	
	
	//获取车辆列表
	public function cars_list () {
		//可用车辆数据
		$cars_list = $this->db['Cars']->seek_all_cars($this->cars_disabled);

		if ($cars_list) {
			//车辆照片
			$cars_ids = getArrayByField($cars_list,'id');
			$cars_ids = implode(',',$cars_ids);
			$cars_photo = $this->db['CarsPhoto']->seek_car_photos($cars_ids);		//查询车辆照片
			if ($cars_photo) {
				parent::public_file_dir($cars_photo, 'url', 'images/');		//组合URL地址
				$cars_cars_photo = regroupKey($cars_photo,cars_id) ;	//按照车辆ID，重组数组
				
				foreach ($cars_list AS $key=>$val) {
					if (empty($cars_cars_photo[$val['id']])) {
						$cars_list[$key]['cars_photos'] = array();
					} else {
						$cars_list[$key]['cars_photos'] = $cars_cars_photo[$val['id']];	
					}			
				}
			}
			parent::callback(C('STATUS_SUCCESS'),'获取成功！',$cars_list);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'没有数据！');
		}
 		
	}
	
	


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