<?php
if (!defined('THINK_PATH'))exit();

$DB = require("config.inc.php");	//数据库配置

//其他系统配置
$system  = array(

		'SESSION_AUTO_START'    => true,

		/* URL配置 */
		'URL_MODEL'             => 3,
		'URL_ROUTER_ON'   => true, 	//开启路由
		'URL_ROUTE_RULES' => array(
				'join' => array('/Public/register'),    		 	 //注册
				'index'=>array('?s=/Index/index'),			//功能介绍
				'articles/:id'=>'home/Index/show',            //新闻详细页面
		),
		'PREV_URL' => $_SERVER["HTTP_REFERER"],
		

		/* 模板引擎设置 */
		//'DEFAULT_THEME' => 'default',
		//'TMPL_ACTION_SUCCESS' => 'public:success',
		//'TMPL_ACTION_ERROR' => 'public:error',
		'TMPL_EXCEPTION_FILE'   => THINK_PATH.'Tpl/think_exception.tpl',// 异常页面的模板文件
		'TMPL_DETECT_THEME'     => false,       // 自动侦测模板主题
		'OUTPUT_ENCODE'         =>  false, 			// 页面压缩输出


		//项目分组
		'APP_GROUP_LIST'        => 'Home,Admin,Api',  	// 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
		'DEFAULT_GROUP'         => 'Admin',  					// 默认分组
		'DEFAULT_ACTION'        => 'index', 						// 默认操作名称
		'APP_GROUP_MODE'        =>  0, 							 // 分组模式 0 普通分组 1 独立分组
		'APP_SUB_DOMAIN_DEPLOY' => false,  			 // 是否开启子域名部署
		'APP_SUB_DOMAIN_RULES'  => array(), 			// 子域名部署规则
		'APP_SUB_DOMAIN_DENY'   => array(), 			//  子域名禁用列表
		

		//语言包
		'LANG_SWITCH_ON'=> false,				//开启语言包功能
		'LANG_AUTO_DETECT'=> false,			//是否自动检测语言
		'DEFAULT_LANG'=>'zh-cn',						//默认语言的文件夹是zh-cn
		'LANG_LIST'        => 'zh-cn,en-us',			 //允许切换的语言列表 用逗号分隔
		'VAR_LANGUAGE'     => '1',					 // 默认语言切换变量
		
		
		//表单安全配置
		//'TOKEN_ON'=>true,  						// 是否开启令牌验证
		//'TOKEN_NAME'=>'__hash__',    		// 令牌验证的表单隐藏字段名称		
		//'TOKEN_TYPE'=>'md5',  					//令牌哈希验证规则 默认为MD5	
		//'TOKEN_RESET'=>true,  					//令牌验证出错后是否重置令牌 默认为true
		
		
		//缓存配置
		'DATA_CACHE_TYPE' =>'File',										//缓存类型
		'DATA_CACHE_PATH' =>'Home/Runtime/Temp/',		//缓存文件目录
		'DATA_CACHE_TIME'=>'60'	,										//缓存有效秒数	
		
		/** 静态缓存
		'HTML_CACHE_ON'=>true, // 开启静态缓存
		'HTML_FILE_SUFFIX'  =>  '.shtml', // 设置静态缓存后缀为.shtml
		//缓存规则
		'HTML_CACHE_RULES'=> array(
				//定义模块下的所有方法都缓存
				'Index:'            => array('{:module}/{$_SERVER.REQUEST_URI|md5}',5),
				//定义模块下某个方法缓存
				'Public:login'            => array('{:module}/{$_SERVER.REQUEST_URI|md5}', 2),
		)
		*/
		
		/* 时区设置 */
		'DEFAULT_TIMEZONE'=>'Asia/Shanghai', 	// 设置默认时区
		
		
		/* 自定设置 */
		
		//上传文件目录
		'UPLOAD_DIR' => array(
			'IMAGES' => '/files/lehuo/images/',		//图片地址
		),
		
		//外部文件访问地址(用来填写专用的文件服务器)
		'PUBLIC_VISIT' => array(
			'DOMAIN' =>	$_SERVER['SERVER_NAME'],
			'DIR' => '/files/xingtuo/',							//项目文件目录
		),
		
		//用户类型
		'ACCOUNT_TYPE' => array (
				'ADMIN' => 0,			//管理员
				'USER' => 1,			//普通用户
				'Director' => 2,		//经理
		),
		
		//短信平台账号
		'SHP' => array(
				'NAME'=>'kevin_shp',
				'PWD'=>'kevin818'
		),
		
		
		/* 错误类型 */
		'STATUS_SUCCESS' => '0',					//没有错误
		'STATUS_NOT_LOGIN'	=> '1002',		//未登录
		'STATUS_UPDATE_DATA'	=> '2001',	//没有成功修改数据
		'STATUS_NOT_DATA'	=> '2004',			//没有没有数据
		'STATUS_OTHER' => '9999',					//其他错误
		'STATUS_RBAC' => '3001',					//RBAC权限
);

return array_merge($DB,$system);


/*		系统常量 (手册附录)
 echo __SELF__  . '<br />';					//当前URL所有参数
echo __URL__  . '<br />';						//当前模块地址(控制器地址)
echo __APP__	. '<br />';						//当前项目入口文件
echo __ACTION__  . '<br />';				//当前模块控制器地址 (当前模块控制器地址)
echo ACTION_NAME . '<br />'; 			//当前方法名称

echo '<br />';

echo APP_PATH . '<br />'; 					//当前项目目录
echo APP_NAME . '<br />'; 					//当前项目名称
echo APP_TMPL_PATH . '<br />'; 		//当前项目模板路径
echo APP_PUBLIC_PATH . '<br />'; 	//项目公共文件目录
echo CACHE_PATH . '<br />'; 				//当前项目编译缓存文件

*/
?>