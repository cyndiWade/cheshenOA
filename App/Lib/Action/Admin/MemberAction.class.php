<?php
/**
 * 车神用户管理模块
 */
class MemberAction extends AdminBaseAction {
	
	
	private $MODULE = '会员管理';
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);

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
	
	
	//验证提交数据
	private function check_data($act) {
		import("@.Tool.Validate");							//验证类
		
		if ($act == 'add') {
			/* 账号验证 */
			if (Validate::checkNull($_POST['account'])) $this->error('账号不得为空');
			if (!Validate::checkAccount($_POST['account'])) $this->error('账号必须以字母开头,只能是字符与数字组成,不得超过30位');
			
			if (Validate::checkNull($_POST['password'])) $this->error('昵称不得为空');
			if (!Validate::checkEquals($_POST['password'],$_POST['password_affirm'])) $this->error('二次输入的密码不相同');
		} elseif ($act == 'update') {
			if (!Validate::checkNull($_POST['password_old'])) {
				if (!Validate::checkEquals($_POST['password_old'],$_POST['password_affirm'])) $this->error('二次输入的密码不相同');
			}
			
		}

	}
     
	
	


	
	
	

	
	
	
	
	
	
	
	

	
}