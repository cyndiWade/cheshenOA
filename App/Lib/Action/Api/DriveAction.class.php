<?php

/**
 * 试驾接口
 */
class DriveAction extends ApiBaseAction {
	
	/**
	 * 追加使用的数据表对象
	 * @var Array  当访问时，$this->db['Member']->query();
	 */
	protected $add_db = array(
			'Drive'=>'Drive',									//用户账号表
	);
	
	
	//需要验证的模块
	protected $aVerify = array(
		
	);
	
	
	public function __construct() {
		parent::__construct();
		
		$this->request['models'] = $this->_post('models');				//试驾车型	
	//	$this->request['appellation'] = $this->_post('appellation');
	//	$this->request['surnames'] = $this->_post('surnames');
		$this->request['name'] = $this->_post('name');				//姓名
		$this->request['phone'] = $this->_post('phone');			//手机号码
		$this->request['age'] = $this->_post('age');					//目前驾龄
		$this->request['possess_vehicle'] = $this->_post('possess_vehicle');			//拥有车型
	//	$this->request['email'] = $this->_post('email');
		$this->request['number'] = $this->_post('number');
	//	$this->request['date_time'] = $this->_post('date_time');
		
// 		$this->request['models'] = '红色奥迪 R8';						
// 		$this->request['appellation'] = '小姐';
// 		$this->request['surnames'] = 'aaa';
// 		$this->request['name'] = 'bbb';
// 		$this->request['age'] = '10';
// 		$this->request['phone'] = '123';
// 		$this->request['email'] = 'sdfs@qq.com';
// 		$this->request['number'] = 'dsfsd';
// 		$this->request['date_time'] = 'dsfsd';
		
	}
	

	/**
	 * 试驾申请接口
	 */
	public function apply () {
		
		if ($this->isPost()) {
			$key_error = array(
				'models' => array(
						'empty' =>'车型不得为空',
				),
				'appellation' =>array(
						'empty' =>'称谓不得为空',
				),
				'surnames' =>array(
						'empty' =>'姓氏不得为空',
				),
				'name' => array(
						'empty' =>'名字不得为空',
				),
				'age' => array(
						'empty' =>'年龄不得为空',
				),
				'phone' => array(
						'empty' =>'手机号码不得为空',
				),
				'email' => array(
						'empty' =>'邮箱地址不得为空',
				),
				'number' => array(
						'empty' =>'卡号不得为空',
				),
				'date_time' => array(
						'empty' =>'试驾日期不得为空',
				),
			);

			foreach ($this->request as $key=>$val) {
				if ($key == 'number') continue;
				if ($key_error[$key] == true) {
					if (empty($val)) {
						parent::callback(C('STATUS_OTHER'),$key_error[$key	]);
					}
				}
			}
			$Drive = $this->db['Drive'];
			$Drive->create();
			if ($Drive->add_one_data()) {
				parent::callback(C('STATUS_SUCCESS'),'提交试驾申请成功。');
			} else {
				parent::callback(C('STATUS_UPDATE_DATA'),'保存失败。');
			}
		}
		
	}


}

?>