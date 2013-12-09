<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<!-- 全局样式 -->		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>管理系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo (APP_PATH); ?>Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="<?php echo (APP_PATH); ?>Public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo (APP_PATH); ?>Public/media/css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo (APP_PATH); ?>Public/media/css/datetimepicker.css" rel="stylesheet" type="text/css" />

	<!-- END GLOBAL MANDATORY STYLES -->

	<link rel="shortcut icon" href="<?php echo (APP_PATH); ?>Public/media/image/favicon.ico" />
	
	<style type="text/css">
		.required {
			color:red;
		}
	</style>
	

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo (APP_PATH); ?>Public/media/css/select2_metro.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo (APP_PATH); ?>Public/media/css/chosen.css" />		
	<!-- END PAGE LEVEL STYLES -->	<style type="text/css">		.residue {			color:red;		}	</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
		<!-- BEGIN  头部-->
	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="javascript:;">

				<img src="<?php echo (APP_PATH); ?>Public/media/image/logo.png" alt="logo"/>

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo (APP_PATH); ?>Public/media/image/menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					<!-- BEGIN NOTIFICATION DROPDOWN -->   
					<!-- 
					<li class="dropdown" id="header_notification_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-warning-sign"></i>

						<span class="badge">6</span>

						</a>

						<ul class="dropdown-menu extended notification">

							<li>

								<p>You have 14 new notifications</p>

							</li>

							<li>

								<a href="#">

								<span class="label label-success"><i class="icon-plus"></i></span>

								New user registered. 

								<span class="time">Just now</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Server #12 overloaded. 

								<span class="time">15 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-warning"><i class="icon-bell"></i></span>

								Server #2 not respoding.

								<span class="time">22 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-info"><i class="icon-bullhorn"></i></span>

								Application error.

								<span class="time">40 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Database overloaded 68%. 

								<span class="time">2 hrs</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								2 user IP blocked.

								<span class="time">5 hrs</span>

								</a>

							</li>

							<li class="external">

								<a href="#">See all notifications <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
					-->
					<!-- END NOTIFICATION DROPDOWN -->
					
					
					<!-- BEGIN INBOX DROPDOWN -->
<!-- 
					<li class="dropdown" id="header_inbox_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-envelope"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>你有12条新的系统消息</p>

							</li>

							<li>

								<a href="#inbox.html?a=view">

								<span class="photo"><img src="<?php echo (APP_PATH); ?>Public/media/image/avatar2.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Lisa Wong</span>

								<span class="time">Just Now</span>

								</span>

								<span class="message">

								Vivamus sed auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="#inbox.html?a=view">

								<span class="photo"><img src="<?php echo (APP_PATH); ?>Public/media/image/avatar3.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Richard Doe</span>

								<span class="time">16 mins</span>

								</span>

								<span class="message">

								Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="#inbox.html?a=view">

								<span class="photo"><img src="<?php echo (APP_PATH); ?>Public/media/image/avatar1.jpg" alt="" /></span>

								<span class="subject">

								<span class="from">Bob Nilson</span>

								<span class="time">2 hrs</span>

								</span>

								<span class="message">

								Vivamus sed nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li class="external">

								<a href="#inbox.html">See all messages <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
-->
					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN TODO DROPDOWN -->
<!--
					<li class="dropdown" id="header_task_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-tasks"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended tasks">

							<li>

								<p>You have 12 pending tasks</p>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">New release v1.2</span>

								<span class="percent">30%</span>

								</span>

								<span class="progress progress-success ">

								<span style="width: 30%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Application deployment</span>

								<span class="percent">65%</span>

								</span>

								<span class="progress progress-danger progress-striped active">

								<span style="width: 65%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Mobile app release</span>

								<span class="percent">98%</span>

								</span>

								<span class="progress progress-success">

								<span style="width: 98%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Database migration</span>

								<span class="percent">10%</span>

								</span>

								<span class="progress progress-warning progress-striped">

								<span style="width: 10%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Web server upgrade</span>

								<span class="percent">58%</span>

								</span>

								<span class="progress progress-info">

								<span style="width: 58%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="task">

								<span class="desc">Mobile development</span>

								<span class="percent">85%</span>

								</span>

								<span class="progress progress-success">

								<span style="width: 85%;" class="bar"></span>

								</span>

								</a>

							</li>

							<li class="external">

								<a href="#">See all tasks <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
-->
					<!-- END TODO DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="<?php echo (APP_PATH); ?>Public/media/image/avatar1_small.jpg" />

						<span class="username"><?php echo ($global_tpl_view["user_info"]["nickname"]); ?></span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">
							<!-- 
							<li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>

							<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

							<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>

							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

							<li class="divider"></li>

							<li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
							-->
							<li><a href="<?php echo U('Admin/Login/logout');?>"><i class="icon-key"></i>退出登陆</a></li>
							

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>
	<!-- END 头部 -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- 左侧导航 -->		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu wade_menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>
  
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>
				<!--
				<li class="start">
					<a href="?s=/Admin/Index/index">
					<i class="icon-home"></i> 
					<span class="title">公司公告</span>
					<span class="selected"></span>
					</a>
				</li>
				 -->
				 <!-- 
				<li class="">

					<a href="javascript:;">

					<i class="icon-home"></i> 

					<span class="title">公告通知</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="?s=/Admin/Index/index">

							公司通知</a>

						</li>
						<li >

							<a href="#layout_horizontal_sidebar_menu.html">

							部门通知</a>

						</li>

					</ul>

				</li>
				
				
				<li class="">

					<a href="javascript:;">

					<i class="icon-comments"></i> 

					<span class="title">企业论坛</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="#layout_horizontal_sidebar_menu.html">

							公司论坛</a>

						</li>
						<li >

							<a href="#layout_horizontal_sidebar_menu.html">

							部门论坛</a>

						</li>

					</ul>

				</li>
				
				
				<li class="">

					<a href="javascript:;">

					<i class="icon-file-text"></i> 
					

					<span class="title">文档下载</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="#form_layout.html">

							员工手册</a>

						</li>
						<li >

							<a href="#form_layout.html">

							财务表单</a>

						</li>
						
						<li >

							<a href="#form_layout.html">

							车神VI</a>

						</li>
						
						<li >

							<a href="#form_layout.html">

							技术资料</a>

						</li>
						<li >

							<a href="#form_layout.html">

							我的文档</a>

						</li>
					
					</ul>

				</li>
				-->
				<li class="">

					<a href="javascript:;">

					<i class="icon-user"></i> 

					<span class="title">个人中心</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">
						<li >
							<a href="<?php echo U('Admin/User/personal');?>">

							</i>

							个人信息</a>

						</li>

					</ul>
				</li>
				
				
				<li class="">

					<a href="javascript:;">

					<i class="icon-user"></i> 

					<span class="title">人事管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">
						<!-- 
						<li >
							<a href="?s=/Admin/Company/index">

							</i>

							区域管理</a>

						</li>
						-->
						<li >
							<a href="?s=/Admin/Personnel/department">
							</i>

							部门管理</a>

						</li>
						
						<li >
							<a href="?s=/Admin/Staff/index">

							</i>

							员工管理</a>

						</li>
						<!-- 
						<li >
							<a href="<?php echo U('Admin/ReserveTalents/index');?>">

							</i>

							人才储备</a>

						</li>
						-->
					</ul>
				</li>
				 
				 
				 <!-- 
				<li class="">

					<a href="javascript:;">

					<i class="icon-calendar"></i> 

					<span class="title">工作日志</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="#extra_profile.html">

							公司日志</a>

						</li>
						
						<li >

							<a href="#extra_profile.html">

							我的日志</a>

						</li>

					</ul>

				</li>
				-->	
				
				<li class="">

					<a href="javascript:;">

					<i class="icon-group"></i> 

					<span class="title">会员管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">	
						<li >
							<a href="<?php echo U('Admin/Member/member_list');?>">
							新注册用户</a>
						</li>
						<?php if(is_array($global_tpl_view['sidebar']['cars'])): $i = 0; $__LIST__ = $global_tpl_view['sidebar']['cars'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li >
							<a href="?s=/Admin/Rank/rank_list/member_rank_id/<?php echo ($vo["id"]); ?>.html">
							<?php echo ($vo["name"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
					</ul>

				</li>
				

				<li class="">

					<a href="javascript:;">

					<i class="icon-map-marker"></i> 

					<span class="title">车辆管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >
							<a href="<?php echo U('Admin/CarsAll/index');?>">
							车辆分布</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/CarsCompany/car_index');?>">
							地区车辆</a>
						</li>
						<li >

							<a href="<?php echo U('Admin/Staff/index',array('occupation_id'=>8));?>">
							司机数据</a>
						</li>

					</ul>

				</li>
				
				
				<li class="">

					<a href="javascript:;">

					<i class="icon-hospital"></i> 

					<span class="title">订单管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">
						<li >
							<a href="<?php echo U('Admin/Member/all_user_info');?>">
							查询所有会员</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Order/apply');?>">
							用车申请(<?php echo ($global_tpl_view["sidebar"]["order_count"]["apply"]); ?>)</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Order/cars_arrange_list');?>">
							派车申请(<?php echo ($global_tpl_view["sidebar"]["order_count"]["cars_arrange"]); ?>)</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Order/give_back_car_list');?>">
							还车管理(<?php echo ($global_tpl_view["sidebar"]["order_count"]["give_back"]); ?>)</a>
						</li>
					
					</ul>

				</li>
				
				<!-- 
				<li class="">

					<a href="javascript:;">

					<i class="icon-table"></i> 

					<span class="title">车神生发</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="#portlet_general.html">

							金点子</a>

						</li>
						<li >

							<a href="#portlet_general.html">

							合作伙伴资源</a>

						</li>
						<li >

							<a href="#portlet_general.html">

							供应商资源</a>

						</li>
						<li >

							<a href="#portlet_general.html">

							其他资源</a>

						</li>

					</ul>

				</li>
				
				<li class="">

					<a href="javascript:;">

					<i class="icon-sitemap"></i> 

					<span class="title">企业相册</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="#portlet_general.html">

							集体活动</a>

						</li>
						<li >

							<a href="#portlet_general.html">

							车神大家庭</a>

						</li>

					</ul>

				</li>
				-->
					
				<li class="">
					<a href="javascript:;">
					<i class="icon-cogs"></i>
					<span class="title">系统管理</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo U('Admin/User/index');?>">
							用户管理</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Rbac/rbac_node',array('pid'=>0));?>">
							节点管理</a>
						</li>
						<li >
							<a href="<?php echo U('Admin/Rbac/group');?>">
							分配管理</a>
						</li>
						<!--
						<li >
							<a href="<?php echo U('Admin/Rbac/group_node');?>">
							组权限</a>
						</li>
						 -->
					</ul>
				</li>
				
				<!--
				<li class="">

					<a href="javascript:;">

					<i class="icon-th"></i> 

					<span class="title">数据表</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="?s=/Admin/Table/table_basic.html">

							基本表</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_responsive.html">

							响应表</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_managed.html">

							管理表</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_editable.html">

							可编辑表格</a>

						</li>

						<li >

							<a href="?s=/Admin/Table/table_advanced.html">

							高级表</a>

						</li>

					</ul>
		
				</li>
				 -->

			</ul>

			
		<!-- END SIDEBAR MENU -->
		</div>

		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->  
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER -->						<!-- END BEGIN STYLE CUSTOMIZER -->     
						<h3 class="page-title">
							<?php echo ($MODULE_NAME); ?>
							 <small><?php echo ($ACTION_NAME); ?></small>
						</h3>		
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i><?php echo ($TITILE_NAME); ?></div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>				
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form action="" id="form_sample_1" method="post" class="form-horizontal">					 				<input type="hidden" name="id" value="<?php echo ($html_info["id"]); ?>" />									
									<div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										请在文本框输入相应内容.
									</div>
									<div class="alert alert-success hide">
										<button class="close" data-dismiss="alert"></button>
										验证成功
									</div>																		<div class="control-group">										<label class="control-label">订单号：</label>										<div class="controls">											<input type="text"  class="span3" value="<?php echo ($html_info["order_num"]); ?>" disabled="disabled" placeholder="自动生成">										</div>									</div>																		<div class="control-group">										<label class="control-label">开始用车日期：</label>										<div class="controls">											<input type="text" value="<?php echo ($html_info["start"]); ?>"  readonly="" class="span2" disabled="disabled">											<span class="add-on">												<i class="icon-calendar"></i>											</span>										</div>									</div>																		<div class="control-group">										<label class="control-label">预计还车日期：</label>										<div class="controls">											<input type="text" value="<?php echo ($html_info["estimate_over"]); ?>"  readonly="" class="span2" disabled="disabled">											<span class="add-on">												<i class="icon-calendar"></i>											</span>										</div>									</div>																		<div class="control-group">										<label class="control-label">归还日期：<span class="required">（慎重操作！）</span></label>										<div class="controls">											<input type="text" name="over" value="<?php echo ($html_info["over"]); ?>"  readonly="" class="span2 bootstrap_date">											<span class="add-on">												<i class="icon-calendar"></i>											</span>										</div>									</div>																		<div class="control-group">										<label class="control-label">会员信息<span class="required">*</span></label>										<div class="controls">											会员记录：											（剩余：<span class="residue"><?php echo ($count_day["residue"]); ?></span>天 ）|											（已使用：<span class="residue"><?php echo ($count_day["use"]); ?></span>天） | 											（总：<span class="residue"><?php echo ($count_day["sum"]); ?></span>天） | 											（会员到期时间：<span class="residue" id="over_date"><?php echo ($over_date); ?></span>）										</div>									</div>										<div class="control-group">										<label class="control-label">备注：</label>										<div class="controls">											<textarea rows="3" name="remarks" class="span6 m-wrap"><?php echo ($html_info["remarks"]); ?></textarea>										</div>									</div>									
									<div class="form-actions">										
										<button type="submit" class="btn purple">提交</button>
										<a href="?s=/Admin/Order/give_back_car_list.html"><button type="button" class="btn">返回</button></a>																				
									</div>
								</form>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END VALIDATION STATES-->
					</div>
				</div>				<!-- END PAGE CONTENT-->         
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->
	<!-- 页脚 -->		<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">
<!-- 
			2013 车神OA管理系统
-->
		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- 核心插件 -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN 核心级别插件 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/dc.js" type="text/javascript"></script>  
	<!-- 
	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	-->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-1.9.1.js" type="text/javascript"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/excanvas.min.js"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- 日期插件 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap-datetimepicker.js" type="text/javascript" ></script>
	<script src="<?php echo (APP_PATH); ?>Public/media/js/bootstrap-datetimepicker.zh-CN.js" type="text/javascript" ></script>
	
	<!-- 扩展函数库 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/function.js" type="text/javascript" ></script>
	<script src="<?php echo (APP_PATH); ?>Public/media/js/wade_Date.js" type="text/javascript" ></script>
	
	
	<!-- 扩展jQuery插件 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery-ui-1.0.0.wade.js" type="text/javascript" ></script>
	
	<!-- 扩展运行 -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/run.js" type="text/javascript" ></script>
	
	<!-- END 核心级别插件 -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/chosen.jquery.min.js"></script>
		<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/app.js"></script>
	<script src="<?php echo (APP_PATH); ?>Public/media/js/form-validation-Order-give_back_car_edit.js"></script> 	<!-- END PAGE LEVEL STYLES -->    
	<script>
		jQuery(document).ready(function() {   
		   // initiate layout and plugins
		   App.init();
		   FormValidation.init();		   				
		});
	</script>
	<!-- END JAVASCRIPTS -->   

<!-- END BODY -->
</html>