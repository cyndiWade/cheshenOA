<?php
/**
 * 车辆保险控制器
 */
class CarsInsuranceAction extends CarsBaseAction {
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();

	}
	

	/**
	 * 年审列表
	 */
	public function index() {
		/* 初始化数据 */
		$cars_id =  $this->_get('cars_id');				//区域id
		if (empty($cars_id)) $this->error('非法操作！');

		$CarsInsurance = D('CarsInsurance');		//车辆年审表
		$html_list = $CarsInsurance->get_spe_data(array('cars_id'=>$cars_id,'status'=>0));

		$this->assign('ACTION_NAME','车辆保险');
		$this->assign('TITILE_NAME','车辆保险列表');
		$this->assign('cars_id',$cars_id);
		$this->assign('html_list',$html_list);
		$this->display();
	}
	
	/**
	 * 车辆管理列表
	 */
	public function edit() {
		/* 初始化数据 */
		$act = $this->_get('act');								//操作动作
		$id = $this->_get('id');									//id
		$cars_id = $this->_get('cars_id');					//车辆ID
		
		$CarsInsurance = D('CarsInsurance');		//车辆数据表

		switch ($act) {
			case  'add':
				if ($this->isPost()) {
					$CarsInsurance->create();
					$CarsInsurance->cars_id = $cars_id;
					$CarsInsurance->add() ? $this->success('添加成功！') : $this->error('添加失败，请重新尝试！');
					exit;
				}
				break;
				
			case 'update' :
				if ($this->isPost()) {		
					$CarsInsurance->create();
					$CarsInsurance->save_one_data(array('id'=>$id)) ? $this->success('修改成功！') : $this->error('没有做出修改');
					exit;
				}
				//获取修改数据
				$html_info = $CarsInsurance->get_one_data(array('id'=>$id,'cars_id'=>$cars_id, 'status'=>0));
				if (empty($html_info)) $this->error('此记录不存在！');

				$this->assign('html_info',$html_info);
				break;

			case 'delete':
				$CarsInsurance->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;

			default:
				$this->error('非法操作！');
		}
		
		$this->assign('ACTION_NAME','车辆保险');
		$this->assign('TITILE_NAME','编辑车辆保险');
		$this->assign('cars_id',$cars_id);
		$this->display();
	}
	
	/**
	 *
	 */
	

	
	
}