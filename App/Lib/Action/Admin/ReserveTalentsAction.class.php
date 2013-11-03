<?php
/**
 * 人才储备
 */
class ReserveTalentsAction extends AdminBaseAction {
	
	private $MODULE = '人才储备';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);

	}
	
	

	/* 数据列表 */
	public function index () {
		
		
		$ReserveTalents = D('ReserveTalents');	//员工模型表
		$html_list = $ReserveTalents->seek_data_list();

		$this->assign('ACTION_NAME','人才储备');
		$this->assign('TITLE_NAME','人才储备列表');
		$this->assign('html_list',$html_list);
		$this->display();
	}
     
	
	public function edit () {
		$id = $this->_get('id');								//员工基本信息表id
		$act = $this->_get('act');							//当前动作
		$ReserveTalents= D('ReserveTalents');						//公司区域模型表
		
		switch ($act) {
			case  'add':
				if ($this->isPost()) {
					$ReserveTalents->create();
					$ReserveTalents->add() ? $this->success('添加成功！') : $this->error('添加失败，请重新尝试！');
					exit;
				}
				break;
		
			case 'update' :
				if ($this->isPost()) {
					$ReserveTalents->create();
					$ReserveTalents->save_one_data(array('id'=>$id)) ? $this->success('修改成功！') : $this->error('没有做出修改');
					exit;
				}
				//获取修改数据
				$html_info = $ReserveTalents->get_one_data(array('id'=>$id,'status'=>0));
				if (empty($html_info)) $this->error('数据不存在');
		
				$this->assign('html_info',$html_info);
				break;
		
			case 'delete':
				$ReserveTalents->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;
		
			default:
				$this->error('非法操作！');
		}
		
		$this->assign('ACTION_NAME','人才储备');
		$this->assign('TITLE_NAME','人才储备列表');
		$this->display();		//完善信息的模板
	}

	
	
	
}