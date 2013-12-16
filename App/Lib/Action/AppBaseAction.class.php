<?php

/**
 * 	项目---核心类
 *	 所有此项目分组的基础类，都必须继承此类
 */
class AppBaseAction extends GlobalParameterAction {
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		//G('begin'); 							// 记录开始标记位（运行开始）
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
		
		/* 数据表配置 */
		$Combination->table_prefix =  C('DB_PREFIX');		
		$Combination->node_table = C('RBAC_NODE_TABLE');		
		$Combination->group_table = C('RBAC_GROUP_TABLE');
		$Combination->group_node_table = C('RBAC_GROUP_NODE_TABLE');
		$Combination->group_user_table = C('RBAC_GROUP_USER_TABLE');
		
		/* 方法配置 */
		$Combination->group = GROUP_NAME;					//当前分组
		$Combination->module = MODULE_NAME;				//当前模块
		$Combination->action = ACTION_NAME;					//当前方法
		$Combination->not_auth_group = C('NOT_AUTH_GROUP');			//无需认证分组
		$Combination->not_auth_module = C('NOT_AUTH_MODULE');		//无需认证模块
		$Combination->not_auth_action = C('NOT_AUTH_ACTION');			//无需认证操作

		RBAC::init($Combination);		//初始化数据
		
	}
	
	
	/**
	 * 短信发送类
	 * @param String $telephone  电话号码
	 * @param String $msg			短信内容
	 * @return Array  						$result[status]：Boole发送状态    $result[info]：ARRAY短信发送后的详细信息 	$result[msg]：String提示内容
	 */
// 	protected function send_shp ($telephone,$msg) {
// 		//执行发送短信
// 		import("@.Tool.SHP");	//SHP短信发送类
// 		$SHP = new SHP(C('SHP.NAME'),C('SHP.PWD'));			//账号信息
// 		$send = $SHP->send($telephone,$msg);		//执行发送
// 		return $send;
// 	}
	protected function send_shp ($telephone,$msg) {

		$shp_type = C('SHP.TYPE');
		$shp_name = C('SHP.NAME');
		$shp_password = C('SHP.PWD');
		switch ($shp_type) {
			case 'SHP' :
				import("@.Tool.SHP");				//SHP短信发送类
				$SHP = new SHP($shp_name,$shp_password);			//账号信息
				$send = $SHP->send($telephone,$msg);		//执行发送
				break;
			case 'RD_SHP'	 :
				import("@.Tool.RD_SHP");		//RD_SHP短信发送类
				$SHP = new RD_SHP($shp_name,$shp_password);			//账号信息
				$send = $SHP->send($telephone,$msg);		//执行发送
				break;
			default:
				exit('illegal operation！');	
		}

		return $send;
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
		exit(JSON($return));
	}
	

	
	/**
	 * 组合图片外部访问地址
	 * @param Array $arr								//要组合地址的数组
	 * @param String Or Array	 $field			//组合的字段key  如：pic 或  array('pic','head')
	 * @param String $dir_type						//目录类型  如：/images
	 */
	protected function public_file_dir (Array &$arr,$field,$dir_type) {
		$public_file_dir =  C('PUBLIC_VISIT.domain').C('PUBLIC_VISIT.dir').$dir_type;			//域名、文件目录
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