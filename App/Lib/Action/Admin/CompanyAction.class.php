<?php
/**
 * 公司区域管理
 */
class CompanyAction extends AdminBaseAction {
	
	private $MODULE = '人事管理';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);
	}
	
	public function index() {
		$Company = D('Company');		//公司区域表
		
		$company_list = $Company->company_region_view();

		$this->assign('ACTION_NAME','区域管理');
		$this->assign('company_list',$company_list);
		$this->display();
	}
    
	
	public function edit() {
		$id = $this->_get('id');				//id
		$act = $this->_get('act');			//动作
		$Region = D('Region');				//地理表
		$Company = D('Company');		//公司区域表

		switch ($act) {
			case 'update' :
				if ($this->isPost()) {
					$Company->create();
					$Company->where(array('id'=>$id))->save() ? $this->success('修改成功！') : $this->error('没有做出修改');
					exit;
				}
				//获取职位详细数据
				$company_info = $Company->seek_one_data($id);//region_id

				$this->assign('company_info',$company_info);
				break;
			case 'add' :
				if ($this->isPost()) {
					$Company->create();
					$Company->add() ? $this->success('添加成功！','?s=/Admin/Company/index') : $this->error('添加失败，请重新尝试！');
					exit;
				}
				break;
			case 'delete' :
				$Company->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;
			default:
				$this->error('非法操作');
		}
		
		
	
		
		
		$city_list = $Region->seek_level_data('1');

		$this->assign('ACTION_NAME','编辑区域');
		$this->assign('city_list',$city_list);
		$this->display();
	}
    
}