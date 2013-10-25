<?php
/**
 * 车神会员模块
 */
class RankAction extends AdminBaseAction {
	
	/* 会员种类 */
	private $rank = array(
		5 => '5万级别会员',
		10 => '10万级别会员',
		20 => '20万级别会员',
		40 => '40万级别会员',
		80 => '80万级别会员',
	);
	
	private $MODULE = '会员管理';
	
	private $rank_level;
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);

		
		
	}
	
	/* 验证会员级别信息 */
	private function check_rank() {
		/* 全局保持会员属性 */
		$rank = $this->_get('rank');				//会员等级
		$rank_level = $this->rank[$rank];		//会员名称
		if (empty($rank_level)) $this->error('此模块开发中');
		$this->rank_level = $rank_level;
		$this->assign('rank',$rank);
	}
	

	/**
	 * 会员数据
	 */
	public function rank_list () {
		$this->check_rank();
		
		$rank = $this->_get('rank');				//会员等级
		$MemberBase = D('MemberBase');	//会员信息表
		
	
		/* 获取相应会员数据 */
		$member_base_list = $MemberBase->seek_rank_data($rank);
		
		
		$this->assign('ACTION_NAME','会员列表');
		$this->assign('rank_level',$this->rank_level);
		$this->assign('member_base_list',$member_base_list);
		$this->display();
	}
	
	
	
	/**
	 * 添加会员
	 */
	public function member_base_add () {
		$this->check_rank();
		
		$rank = $this->_get('rank');				//会员等级

		if ($this->isPost()) {
			
			$MemberBase = D('MemberBase');			//会员基本信息表
			$MemberBase->create();
			$MemberBase->property = JSON($MemberBase->property);
			$type = C('MEMBER_TYPE.member');		//0会员，1股东
			$MemberBase->add_one_data($type) ? $this->success('添加成功！') : $this->error('添加失败！');
			exit;
		}

		$this->assign('ACTION_NAME','添加会员基本信息');
		$this->assign('TITILE_NAME','添加会员基本信息');
		$this->assign('rank_select',$this->rank);
		$this->display();
	}
	
	/* AJAX查询用户数据 */
	public function ajax_search_account () {

		if ($this->isPost()) {
			$Member = D('Member');
			$account = $this->_post('account');

			$map['account'] =  array('like',"%$account%");
			$map['status'] = 0;
			$result = $Member->get_spe_data($map,'id,account,nickname');

			empty($result) ? parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$result);
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
		
	}
	
	/**
	 * 客户编辑
	 */
	public function member_base_edit () {
		
	}
	
	
	
	

	
}