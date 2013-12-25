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
		'CarsPhoto' => 'CarsPhoto',
		'CarsGrade' => 'CarsGrade'
	);
	
	/* 需要身份验证的方法名 */
	protected $Verify = array();
		
	
	private $car_grade = array();
	
	public function __construct() {
		
		parent:: __construct();			//重写父类构造方法
		
		$this->init_car_grade();
	}
	
	
	/**
	 * 初始化车辆级别数据
	 */
	private function init_car_grade() {
		/* 组合车辆级别 */
		$CarsGradeInfo = $this->db['CarsGrade']->seek_all_data(); 	//获取车辆级别数据
		
		foreach ($CarsGradeInfo AS $key=>$val) {
			$this->car_grade[$val['id']] = $val['identifying'];
		}
	}
	
	
	
	//获取车辆列表
	public function cars_list () {
		
		if ($this->isPost() == false) {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
		
		//可用车辆数据
		$cars_list = $this->db['Cars']->seek_all_cars($this->cars_disabled);

		if ($cars_list) {
			//车辆照片
			$cars_ids = getArrayByField($cars_list,'id');
			$cars_ids = implode(',',$cars_ids);
			$cars_photo = $this->db['CarsPhoto']->seek_car_photos($cars_ids);			//查询车辆照片
			
			if ($cars_photo) {
				parent::public_file_dir($cars_photo, 'url', 'images/');			//组合URL地址
				$cars_cars_photo = regroupKey($cars_photo,cars_id) ;	//按照车辆ID，重组数组
				
				foreach ($cars_list AS $key=>$val) {
					if (empty($cars_cars_photo[$val['id']])) {
						$cars_list[$key]['cars_photos'] = array();
					} else {
						$cars_list[$key]['cars_photos'] = $cars_cars_photo[$val['id']];	
					}			
				}
			}
			
			//按照车辆级别重新组合车辆
			foreach ($cars_list AS $key=>$val) {
				$cars_list[$key]['cars_grade'] = $this->car_grade[$val['cars_grade_id']];
				unset($cars_list[$key]['cars_grade_id']);
			}
			$new_cars_list = regroupKey($cars_list,'cars_grade');

			parent::callback(C('STATUS_SUCCESS'),'获取成功！',$new_cars_list);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'没有数据！');
		}
 		
	}
	

	
}

?>