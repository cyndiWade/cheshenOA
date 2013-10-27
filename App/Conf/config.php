<?php
if (!defined('THINK_PATH'))exit();

//其他系统配置
$system  = array(
		
		/* 数据库设置 */
	    'DB_TYPE'               => 'mysql',     // 数据库类型
	    'DB_HOST'               => 'localhost', // 服务器地址
	    'DB_NAME'               => 'cheshenoa',          // 数据库名
	    'DB_USER'               => 'root',      // 用户名
	    'DB_PWD'                => '514591',          // 密码
	    'DB_PORT'               => '3306',        // 端口
	    'DB_PREFIX'             => 'app_',    // 数据库表前缀
	    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
	    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
	    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
	    'DB_DEPLOY_TYPE'        => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
	    'DB_RW_SEPARATE'        => false,       // 数据库读写是否分离 主从式有效
	    'DB_MASTER_NUM'         => 1, // 读写分离后 主服务器数量
	    'DB_SLAVE_NO'           => '', // 指定从服务器序号
	    'DB_SQL_BUILD_CACHE'    => false, // 数据库查询的SQL创建缓存
	    'DB_SQL_BUILD_QUEUE'    => 'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
	    'DB_SQL_BUILD_LENGTH'   => 20, // SQL缓存的队列长度
	    'DB_SQL_LOG'            => false, // SQL执行日志记录
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
		//'TOKEN_ON'=>true,  							// 是否开启令牌验证
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
		'DEFAULT_AJAX_RETURN' => '',		//默认AJAX返回值
		
);


/* 自定设置 */
$custom= array (
			
		//用户类型
		'ACCOUNT_TYPE' => array (
				'ADMIN' => 0,			//管理员
				'USER' => 1,			//普通用户
		),
		'ACCOUNT_STATUS' => array (
				-2 => '删除',
				0 => '正常',
				1 => '禁用',
		),
		
		/* 会员类型 */
		'MEMBER_TYPE' => array(
				'member'=>0	,		//会员
				'shareholder' =>1,	//股东
		),
		
		//上传文件目录
		'UPLOAD_DIR' => array(
				'web_dir' => $_SERVER['DOCUMENT_ROOT'],
				'image' => 'files/cheshenOA/images/',		//图片地址
		),
		
		//外部文件访问地址(用来填写专用的文件服务器)
		'PUBLIC_VISIT' => array(
				'domain' =>	'http://'.$_SERVER['SERVER_NAME'].'/',
				'dir' => 'files/cheshenOA/',							//项目文件目录
		),

		//短信平台账号
		'SHP' => array(
				'NAME'=>'kevin_shp',
				'PWD'=>'kevin818'
		),
		/* 错误类型 */
		'STATUS_SUCCESS' => '0',					//没有错误
		'STATUS_NOT_LOGIN'	=> '1002',			//未登录
		'STATUS_UPDATE_DATA'	=> '2001',		//没有成功修改数据
		'STATUS_NOT_DATA'	=> '2004',			//没有没有数据
		'STATUS_RBAC' => '3001',					//RBAC权限
		'STATUS_ACCESS' => '4001',				//非法访问
		'STATUS_OTHER' => '9999',					//其他错误
		
);

return array_merge($system,$custom);


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