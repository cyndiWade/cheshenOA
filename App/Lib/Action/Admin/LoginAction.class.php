<?php
/**
 * 后台登陆控制器
 */
class LoginAction extends AdminBaseAction {
    
	//获取首页信息
	public function login(){
	
		if (!empty($this->oUser)) $this->redirect('/Admin/Index/index');
	
		$this->display();
    }
    
    
    /**
     * 登陆验证
     */
    public function check_login() {
    	
    	if ($this->isPost()) {
    		$Users = D('Users');									//系统用户表模型
    		$StaffBase = D('StaffBase');						//员工基本信息模型表
    		
    		import("@.Tool.Validate");							//验证类
    			
    		$account = $_POST['account'];					//用户账号
    		$password = $_POST['password'];				//用户密码
    			
    		//数据过滤
    		if (Validate::checkNull($account)) $this->error('账号不得为空');
    		if (Validate::checkNull($password)) $this->error('密码不得为空');
    		if (!Validate::check_string_num($account)) $this->error('账号密码只能输入英文或数字');
    	
    		//读取用户数据
    		$user_info = $Users->get_user_info(array('account'=>$account,'status'=>0));
    	
    		//验证用户数据
    		if (empty($user_info)) {
    			$this->error('此用户不存在！');
    		} else {
    			//验证密码
    			if (md5($password) != $user_info['password']) {
    				$this->error('密码错误！');
    			} else {
		
    				//查找对应的员工信息
    				$user_base = $StaffBase->seek_detail_data($user_info['base_id'],'serial,jobs,name,name_en,company_id,department_id,occupation_id');	
					if (empty($user_base)) $this->error('对不起，找不到此员工信息，请联系人事部是否已删除此用户');
    					
    				$tmp_arr = array(
    						'id' =>$user_info['id'],
    						'account' => $user_info['account'],
    						'type'=>$user_info['type'],
    						
    						//员工属性
    						'nickname' => $user_base['name'],							//用户名称
    						'serial' => $user_base['serial'],									//员工编号
    						'jobs' => $user_base['jobs'],										//职位
    						'company_id' => $user_base['company_id'],			//区域ID
    						'department_id' => $user_base['department_id'],	//部门ID
    						'occupation_id' => $user_base['occupation_id'],	//职位ID
    				);
    			}
    				
    			$_SESSION['user_info'] = $tmp_arr;		//写入session
    			//更新用户信息
    			$Users->up_login_info($user_info['id']);
    			$this->redirect('/Admin/Index/index');
    		}
    	} else {
    		$this->redirect('/Admin/Login/login');
    	}
    }
    
    
    //退出登陆
    public function logout () {
    	if (session_start()) {
    		session_destroy();
    		$this->success('退出成功',U('Admin/Login/login'));
    	} 
    }
    
    
    public function get_ip () {
		echo get_client_ip();
	}
	
	
    
}