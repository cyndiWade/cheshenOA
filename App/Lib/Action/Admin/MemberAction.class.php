<?php
/**
 * 车神用户管理模块
 */
class MemberAction extends RankAction {
	
	
//	private $MODULE = '会员管理';
	
	/* 初始化数据库连接 */
	protected $db = array(
		'MemberBase' => 'MemberBase',
		'MemberRank' => 'MemberRank'
	);
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
	//	$this->assign('MODULE_NAME',$this->MODULE);

	}
	
	//验证提交数据
	private function check_data($act) {
		import("@.Tool.Validate");							//验证类
	
		if ($act == 'add') {
			/* 账号验证 */
			if (Validate::checkNull($_POST['account'])) $this->error('账号不得为空');
			//if (!Validate::checkAccount($_POST['account'])) $this->error('账号必须以字母开头,只能是字符与数字组成,不得超过30位');
				
			if (Validate::checkNull($_POST['password'])) $this->error('昵称不得为空');
			if (!Validate::checkEquals($_POST['password'],$_POST['password_affirm'])) $this->error('二次输入的密码不相同');
		} elseif ($act == 'update') {
			if (!Validate::checkNull($_POST['password_old'])) {
				if (!Validate::checkEquals($_POST['password_old'],$_POST['password_affirm'])) $this->error('二次输入的密码不相同');
			}
				
		}
	
	}
	

	/* 注册用户列表 */
	public function member_list () {
		
		$Member = D('Member');	//注册用户表
		$member_list = $Member->seek_all_list();
				
		$this->assign('member_list',$member_list);
		$this->assign('ACTION_NAME','注册用户');
		$this->display();
	}
	
	
	
	/* 注册用户编辑 */
	public function member_edit () {
		$id = $this->_get('id');				//id
		$act = $this->_get('act');			//动作
		$Member = D('Member');			//注册用户表

		switch ($act) {
			case 'add' :
				if ($this->isPost()) {
					$this->check_data($act);		//验证提交数据
					
					/* 验证账号是否存在 */
					$account_is_have = $Member->account_is_have($_POST['account']);
					if ($account_is_have) $this->error('此账号已存在');
					
					$Member->create();
					$Member->add_account() ? $this->success('添加成功！') : $this->error('添加失败，请重新尝试！');
					exit;
				}
				$tpl = 'member_add';	//模板名称
				break;
				
			case 'update' :
				if ($this->isPost()) {
					$this->check_data($act);		//验证提交数据
					
					$Member->create();
					if (!Validate::checkNull($_POST['password_old'])) {
						$Member->password = md5($_POST['password_old']);
					}	
					$Member->update_user_info($id) ? $this->success('修改成功！') : $this->error('没有做出修改');
					exit;
				}
				//获取用户数据
				$member_info = $Member->seek_account_info($id);
				if (empty($member_info)) $this->error('此用户不存在');
				
				$this->assign('member_info',$member_info);
				$tpl = 'member_update';	//模板名称
				break;
				
			case 'delete' :
				$Member->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;
				
			default:
				$this->error('非法操作');
				exit;
		}
		
		$this->assign('ACTION_NAME','编辑用户');
		$this->display($tpl);
	}
	
	
	
	/**
	 * 所有会员信息--用于客服查看
	 */
	public function all_user_info () {
		
		$MemberBase = D('MemberBase');	//会员基本信息表
		
		/* 获取相应会员数据 */
		$member_base_list = $MemberBase->get_spe_data(array('status'=>0));

		$tmp_rank_leve = regroupKey($this->global_system['member_rank'],'id',true);

		if ($member_base_list) {
			foreach ($member_base_list AS $key=>$val) {
				$tmp_content = $tmp_rank_leve[$val['member_rank_id']]['content'];
				empty($tmp_content) ? $tmp_content = '' : $tmp_content = '-('.$tmp_content.')';
				$member_base_list[$key]['rank_name'] = $tmp_rank_leve[$val['member_rank_id']]['name'].$tmp_content;		//会员类型
			}
		}

		$this->assign('ACTION_NAME','查询所有会员');
		$this->assign('TITLE_NAME','查询所有会员');
		$this->assign('member_base_list',$member_base_list);				//会员等级名称
		$this->display();
	}
	
     
	
	
	//获取推荐会员列表
	public function recommend_member () {
		
		$source = array_search($this->source_select[2], $this->source_select);		//推荐标识
		$account = $this->_get('account');	//推荐账号
		
		//获取推荐用户数据
		$member_base_list = $this->db['MemberBase']->seek_recommend_member($source,$account);
		
		/* 组合会员类型 */
		$MemberRankInfo =  $this->db['MemberRank']->seek_all_data(); 	//获取所有会员级别信息
	
		foreach ($MemberRankInfo AS $key=>$val) {
			$this->member_rank[$val['id']] = $val['name'];
			if ($val['is_start'] == 0) $this->member_content[$val['identifying']] = $val['content'];
		}
		
		if ($member_base_list) {
			foreach ($member_base_list AS $key=>$val) {
				$member_base_list[$key]['rank_name'] = $this->member_rank[$val['member_rank_id']];		//会员类型
			}
		}

		$this->assign('member_base_list',$member_base_list);
		$this->display();
	}
	
	
	
	

	
	
	
	
	
	
	
	

	
}

?>