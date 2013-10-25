<?php
/**
 * 车神会员模块
 */
class RankAction extends AdminBaseAction {
	
	private $MODULE = '会员管理';
	
	/* 会员种类 */
	private $rank = array(
		5 => '5万级别会员',
		10 => '10万级别会员',
		20 => '20万级别会员',
		40 => '40万级别会员',
		80 => '80万级别会员',
	);
	
	/* 会员来源 */
	private $source_select = array(
			1 => '文华（期）',
			2 => '推荐（推荐方账号）',
			3 => '自主报名（信息来源）',
	);
	
	/* 当前会员等级 */
	private $rank_level;	
	
	/* 会员类型 */
	private $rank_type;
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);

		$this->rank_type = C('MEMBER_TYPE');

	}
	
	
	/* 验证会员级别信息 */
	private function check_rank($rank) {
		/* 全局保持会员属性 */
		$rank_level = $this->rank[$rank];		//会员名称
		if (empty($rank_level)) $this->error('此模块开发中');
		
		$this->rank_level = $rank_level;
		$this->assign('rank',$rank);
	}
	
	
	/* 验证会员类型信息 */
	private function check_rank_type ($rank_type) {
		/* 防止会员类型误操作 */
		if(!in_array($rank_type,$this->rank_type))  {
			$this->error('非法操作！');
		}
	}
	
	
	/* AJAX查询用户数据 */
	public function ajax_search_account () {
	
		if ($this->isPost()) {
			$Member = D('Member');
			$account = $this->_post('account');
			
			/* 组合查询条件 */
			$map['account'] =  array('like',"%$account%");
			$map['status'] = 0;
			$result = $Member->get_spe_data($map,'id,account,nickname');
	
			empty($result) ? parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$result);
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}

	
	/**
	 * 会员列表
	 */
	public function rank_list () {
		$rank = $this->_get('rank');				//会员等级
		$this->check_rank($rank);					//验证会员等级信息
		
		$MemberBase = D('MemberBase');	//会员基本信息表

		/* 获取相应会员数据 */
		$member_base_list = $MemberBase->seek_rank_data($rank);
		if ($member_base_list) {
			foreach ($member_base_list AS $key=>$val) {
				if ($val['rank_type'] == 0) $member_base_list[$key]['rank_type_name'] = '会员';
				if ($val['rank_type'] == 1) $member_base_list[$key]['rank_type_name'] = '股东会员';
			}
		}
		
		$this->assign('ACTION_NAME','会员列表');
		$this->assign('rank_level',$this->rank_level);				//会员等级名称
		$this->assign('rank_type',$this->rank_type);				//会员类型
		$this->assign('member_base_list',$member_base_list);
		$this->display();
	}
	
	
	/**
	 * 添加会员指定级别的会员
	 */
	public function member_base_add () {
		$rank = $this->_get('rank');						//会员等级
		$rank_type = $this->_get('rank_type');		//会员类型
		$this->check_rank($rank);							//验证会员等级信息
		$this->check_rank_type($rank_type);		//验证会员类型信息
		
		if ($this->isPost()) {
			$MemberBase = D('MemberBase');			//会员基本信息表
			$MemberBase->create();
			$MemberBase->property = implode(',',$MemberBase->property);
			$MemberBase->add_one_data($rank_type) ? $this->success('添加成功！') : $this->error('添加失败！');
			exit;
		}

		$this->assign('rank_select',$this->rank);						//会员等级列表
		$this->assign('source_select',$this->source_select);		//会员来源列表

		/* 区别会员类型 */
		if ($rank_type == $this->rank_type['member']) {		//普通会员
			$this->assign('ACTION_NAME','添加会员基本信息');
			$this->assign('TITILE_NAME','添加会员基本信息');
			$this->display('member_base_add');
		} elseif ($rank_type == $this->rank_type['shareholder']) {		//股东会员
			$this->assign('ACTION_NAME','添加股东会员基本信息');
			$this->assign('TITILE_NAME','添加股东会员基本信息');
			$this->display('member_base_add_shareholder');
		}	
	}

	
	/**
	 * 会员基本信息编辑
	 */
	public function member_base_edit () {
		$id = $this->_get('id');								//基本信息id
		$rank_type = $this->_get('rank_type');		//会员类型	
		$this->check_rank_type($rank_type);		//验证会员类型信息	
		$MemberBase = D('MemberBase');			//会员基本信息表
		$Member = D('Member');							//账户信息表
		
		if ($this->isPost()) {
			$MemberBase->create();
			$MemberBase->property = implode(',',$MemberBase->property);
			$MemberBase->save_one_data(array('id'=>$id)) ? $this->success('更新成功！') : $this->error('没有数据被修改！');
			exit;
		}
			
		/* 获取基本数据 */
		$base_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$id));
		if (empty($base_info)) $this->error('此会员不存在！');
		
		/* 获取用户账号数据 */
		$base_info['member_info'] = $Member->get_one_data(array('id'=>$base_info['member_id']),'account,nickname');
	
		$this->assign('rank',$base_info['rank']);				//当前数据会员等级
		$this->assign('source_select',$this->source_select);
		$this->assign('rank_select',$this->rank);
		$this->assign('base_info',$base_info);
		
		/* 区别会员类型 */
		if ($rank_type == $this->rank_type['member']) {				//普通会员
			$this->assign('ACTION_NAME','编辑会员基本信息');
			$this->assign('TITILE_NAME','编辑会员基本信息');
			$this->display('member_base_edit');
		} elseif ($rank_type == $this->rank_type['shareholder']) {		//股东会员
			$this->assign('ACTION_NAME','编辑股东基本信息');
			$this->assign('TITILE_NAME','编辑股东基本信息');
			$this->display('member_base_edit_shareholder');
		}

	}
	
	
	
	

	
}