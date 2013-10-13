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
    		$Users = D('Users');									//用户表模型
    		import("@.Tool.Validate");							//验证类
    			
    		$account = $_POST['account'];					//用户账号
    		$password = $_POST['password'];	//用户密码
    			
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
    			if (md5($password) != $user_info['password']) {
    				$this->error('密码错误！');
    			} else {
    				$tmp_arr = array(
    						'id' =>$user_info['id'],
    						'account' => $user_info['account'],
    						'nickname' => $user_info['nickname'],
    						'type'=>$user_info['type'],
    				);
    				
   				
    				$_SESSION['user_info'] = (object) $tmp_arr;		//保存用户信息
    
    				//更新用户信息
    				$Users->up_login_info($user_info['id']);
    				$this->redirect('/Admin/Index/index');
    			}
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