<?php

/**
 * 	项目--核心类
 */
class AppBaseAction extends Action {
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法

		$this->loading();
	}

	/**
	 * 加载类各种类库
	 */
	private function loading() {
		
		/**
		 *  权限控制
		 */
		import("@.Tool.RBAC"); 	//权限控制类库
		/* 初始化数据 */
		$Combination = new stdClass();
		$Combination->group = GROUP_NAME;					//当前分组
		$Combination->module = MODULE_NAME;				//当前模块
		$Combination->action = ACTION_NAME;					//当前方法
		$Combination->table_prefix =  C('DB_PREFIX');		//表前缀
		
		$Combination->not_auth_group = C('NOT_AUTH_GROUP');			//无需认证分组
		$Combination->not_auth_module = C('NOT_AUTH_MODULE');		//无需认证模块
		$Combination->not_auth_action = C('NOT_AUTH_ACTION');			//无需认证操作
		
		RBAC::init($Combination);		//初始化数据
		
	}
	
	
	/**
	 * 统一数据返回
	 * @param unknown_type $status
	 * @param unknown_type $msg
	 * @param unknown_type $data
	 */
	protected function callback($status, $msg = 'Yes!',$data = array()) {
		$return = array(
				'status' => $status,
				'msg' => $msg,
				'data' => $data,
				'num' => count($data),
		);
	
		header('Content-Type:text/html;charset=utf-8');
	
		//die(json_encode($return));
		die(JSON($return));
	}
	

	
	/**
	 * 组合图片外部访问地址
	 * @param Array $arr								//要组合地址的数组
	 * @param String Or Array	 $field			//组合的字段key  如：pic 或  array('pic','head')
	 * @param String $dir_type						//目录类型  如：/images
	 */
	protected function public_file_dir (Array &$arr,$field,$dir_type) {
		$public_file_dir =  C('PUBLIC_VISIT.DOMAIN').C('PUBLIC_VISIT.DIR').$dir_type;			//域名、文件目录
	
		//递归
		if (is_array($field)) {
			for ($i=0;$i<count($field);$i++) {
				self::public_file_dir($arr,$field[$i],$dir_type);
			}
		} else {
			foreach ($arr AS $key=>$val) {
				if (empty($arr[$key][$field])) continue;
				$arr[$key][$field] = $public_file_dir.$val[$field];
			}
		}
	}
	
	
}


?>