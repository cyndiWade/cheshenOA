<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1
Version: 1.3
Author: KeenThemes
Website: http://www.keenthemes.com/preview/?theme=metronic
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
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
	<link href="<?php echo (APP_PATH); ?>Public/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo (APP_PATH); ?>Public/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo (APP_PATH); ?>Public/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo (APP_PATH); ?>Public/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo (APP_PATH); ?>Public/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">	<!-- 页头 -->			<!-- BEGIN  头部-->
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
	<div class="page-container">		<!-- 左侧导航 -->		<!-- BEGIN SIDEBAR -->

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

		<!-- END SIDEBAR -->	<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					Widget settings form goes here
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER -->
						<div class="color-panel hidden-phone">
							<div class="color-mode-icons icon-color"></div>
							<div class="color-mode-icons icon-color-close"></div>
							<div class="color-mode">
								<p>THEME COLOR</p>
								<ul class="inline">
									<li class="color-black current color-default" data-style="default"></li>
									<li class="color-blue" data-style="blue"></li>
									<li class="color-brown" data-style="brown"></li>
									<li class="color-purple" data-style="purple"></li>
									<li class="color-grey" data-style="grey"></li>
									<li class="color-white color-light" data-style="light"></li>
								</ul>
								<label>
									<span>Layout</span>
									<select class="layout-option m-wrap small">
										<option value="fluid" selected>Fluid</option>
										<option value="boxed">Boxed</option>
									</select>
								</label>
								<label>
									<span>Header</span>
									<select class="header-option m-wrap small">
										<option value="fixed" selected>Fixed</option>
										<option value="default">Default</option>
									</select>
								</label>
								<label>
									<span>Sidebar</span>
									<select class="sidebar-option m-wrap small">
										<option value="fixed">Fixed</option>
										<option value="default" selected>Default</option>
									</select>
								</label>
								<label>
									<span>Footer</span>
									<select class="footer-option m-wrap small">
										<option value="fixed">Fixed</option>
										<option value="default" selected>Default</option>
									</select>
								</label>
							</div>
						</div>
						<!-- END BEGIN STYLE CUSTOMIZER -->    
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Dashboard <small>statistics and more</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Dashboard</a></li>
							<li class="pull-right no-text-shadow">
								<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
									<i class="icon-calendar"></i>
									<span></span>
									<i class="icon-angle-down"></i>
								</div>
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<div id="dashboard">
					<!-- BEGIN DASHBOARD STATS -->
					<div class="row-fluid">
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat blue">
								<div class="visual">
									<i class="icon-comments"></i>
								</div>
								<div class="details">
									<div class="number">
										1349
									</div>
									<div class="desc">                           
										New Feedbacks
									</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat green">
								<div class="visual">
									<i class="icon-shopping-cart"></i>
								</div>
								<div class="details">
									<div class="number">549</div>
									<div class="desc">New Orders</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
							<div class="dashboard-stat purple">
								<div class="visual">
									<i class="icon-globe"></i>
								</div>
								<div class="details">
									<div class="number">+89%</div>
									<div class="desc">Brand Popularity</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat yellow">
								<div class="visual">
									<i class="icon-bar-chart"></i>
								</div>
								<div class="details">
									<div class="number">12,5M$</div>
									<div class="desc">Total Profit</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
					</div>
					<!-- END DASHBOARD STATS -->
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet solid bordered light-grey">
								<div class="portlet-title">
									<div class="caption"><i class="icon-bar-chart"></i>Site Visits</div>
									<div class="tools">
										<div class="btn-group pull-right" data-toggle="buttons-radio">
											<a href="" class="btn mini">Users</a>
											<a href="" class="btn mini active">Feedbacks</a>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div id="site_statistics_loading">
										<img src="media/image/loading.gif" alt="loading" />
									</div>
									<div id="site_statistics_content" class="hide">
										<div id="site_statistics" class="chart"></div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet solid light-grey bordered">
								<div class="portlet-title">
									<div class="caption"><i class="icon-bullhorn"></i>Activities</div>
									<div class="tools">
										<div class="btn-group pull-right" data-toggle="buttons-radio">
											<a href="" class="btn blue mini active">Users</a>
											<a href="" class="btn blue mini">Orders</a>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div id="site_activities_loading">
										<img src="media/image/loading.gif" alt="loading" />
									</div>
									<div id="site_activities_content" class="hide">
										<div id="site_activities" style="height:100px;"></div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
							<!-- BEGIN PORTLET-->
							<div class="portlet solid bordered light-grey">
								<div class="portlet-title">
									<div class="caption"><i class="icon-signal"></i>Server Load</div>
									<div class="tools">
										<div class="btn-group pull-right" data-toggle="buttons-radio">
											<a href="" class="btn red mini active">
											<span class="hidden-phone">Database</span>
											<span class="visible-phone">DB</span></a>
											<a href="" class="btn red mini">Web</a>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div id="load_statistics_loading">
										<img src="media/image/loading.gif" alt="loading" />
									</div>
									<div id="load_statistics_content" class="hide">
										<div id="load_statistics" style="height:108px;"></div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<div class="portlet box purple">
								<div class="portlet-title">
									<div class="caption"><i class="icon-calendar"></i>General Stats</div>
									<div class="actions">
										<a href="javascript:;" class="btn yellow easy-pie-chart-reload"><i class="icon-repeat"></i> Reload</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="row-fluid">
										<div class="span4">
											<div class="easy-pie-chart">
												<div class="number transactions"  data-percent="55"><span>+55</span>%</div>
												<a class="title" href="#">Transactions <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="easy-pie-chart">
												<div class="number visits"  data-percent="85"><span>+85</span>%</div>
												<a class="title" href="#">New Visits <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="easy-pie-chart">
												<div class="number bounce"  data-percent="46"><span>-46</span>%</div>
												<a class="title" href="#">Bounce <i class="m-icon-swapright"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="span6">
							<div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption"><i class="icon-calendar"></i>Server Stats</div>
									<div class="tools">
										<a href="" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="" class="reload"></a>
										<a href="" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="row-fluid">
										<div class="span4">
											<div class="sparkline-chart">
												<div class="number" id="sparkline_bar"></div>
												<a class="title" href="#">Network <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="sparkline-chart">
												<div class="number" id="sparkline_bar2"></div>
												<a class="title" href="#">CPU Load <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="sparkline-chart">
												<div class="number" id="sparkline_line"></div>
												<a class="title" href="#">Load Rate <i class="m-icon-swapright"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN REGIONAL STATS PORTLET-->
							<div class="portlet">
								<div class="portlet-title">
									<div class="caption"><i class="icon-globe"></i>Regional Stats</div>
									<div class="tools">
										<a href="" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="" class="reload"></a>
										<a href="" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="region_statistics_loading">
										<img src="media/image/loading.gif" alt="loading" />
									</div>
									<div id="region_statistics_content" class="hide">
										<div class="btn-toolbar">
											<div class="btn-group " data-toggle="buttons-radio">
												<a href="" class="btn mini active">Users</a>
												<a href="" class="btn mini">Orders</a> 
											</div>
											<div class="btn-group pull-right">
												<a href="" class="btn mini dropdown-toggle" data-toggle="dropdown">
												Select Region <span class="icon-angle-down"></span>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;" id="regional_stat_world">World</a></li>
													<li><a href="javascript:;" id="regional_stat_usa">USA</a></li>
													<li><a href="javascript:;" id="regional_stat_europe">Europe</a></li>
													<li><a href="javascript:;" id="regional_stat_russia">Russia</a></li>
													<li><a href="javascript:;" id="regional_stat_germany">Germany</a></li>
												</ul>
											</div>
										</div>
										<div id="vmap_world" class="vmaps chart hide"></div>
										<div id="vmap_usa" class="vmaps chart hide"></div>
										<div id="vmap_europe" class="vmaps chart hide"></div>
										<div id="vmap_russia" class="vmaps chart hide"></div>
										<div id="vmap_germany" class="vmaps chart hide"></div>
									</div>
								</div>
							</div>
							<!-- END REGIONAL STATS PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet paddingless">
								<div class="portlet-title line">
									<div class="caption"><i class="icon-bell"></i>Feeds</div>
									<div class="tools">
										<a href="" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="" class="reload"></a>
										<a href="" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body">
									<!--BEGIN TABS-->
									<div class="tabbable tabbable-custom">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1_1" data-toggle="tab">System</a></li>
											<li><a href="#tab_1_2" data-toggle="tab">Activities</a></li>
											<li><a href="#tab_1_3" data-toggle="tab">Recent Users</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible="0">
													<ul class="feeds">
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-success">                        
																			<i class="icon-bell"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			You have 4 pending tasks.
																			<span class="label label-important label-mini">
																			Take action 
																			<i class="icon-share-alt"></i>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	Just now
																</div>
															</div>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New version v1.4 just lunched!   
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		20 mins
																	</div>
																</div>
															</a>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-important">                      
																			<i class="icon-bolt"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			Database server #12 overloaded. Please fix the issue.                      
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	24 mins
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	30 mins
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-success">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	40 mins
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-warning">                        
																			<i class="icon-plus"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New user registered.                
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	1.5 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-success">                        
																			<i class="icon-bell-alt"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			Web server hardware needs to be upgraded. 
																			<span class="label label-inverse label-mini">Overdue</span>             
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	2 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">                       
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	3 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-warning">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	5 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	18 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">                       
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">                       
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">                       
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">                       
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21 hours
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">                        
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			New order received. Please take care of it.                 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22 hours
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-pane" id="tab_1_2">
												<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
													<ul class="feeds">
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New order received 
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		10 mins
																	</div>
																</div>
															</a>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-important">                      
																			<i class="icon-bolt"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			Order #24DOP4 has been rejected.    
																			<span class="label label-important label-mini">Take action <i class="icon-share-alt"></i></span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	24 mins
																</div>
															</div>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">                        
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				New user registered
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		Just now
																	</div>
																</div>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-pane" id="tab_1_3">
												<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Robert Nilson</a> 
																	<span class="label label-success">Approved</span>
																</div>
																<div>29 Jan 2013 10:45AM</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Lisa Miller</a> 
																	<span class="label label-info">Pending</span>
																</div>
																<div>19 Jan 2013 10:45AM</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Eric Kim</a> 
																	<span class="label label-info">Pending</span>
																</div>
																<div>19 Jan 2013 12:45PM</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Lisa Miller</a> 
																	<span class="label label-important">In progress</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Eric Kim</a> 
																	<span class="label label-info">Pending</span>
																</div>
																<div>19 Jan 2013 12:45PM</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Lisa Miller</a> 
																	<span class="label label-important">In progress</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div><a href="#">Eric Kim</a> <span class="label label-info">Pending</span>
																</div>
																<div>19 Jan 2013 12:45PM</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Lisa Miller</a> 
																	<span class="label label-important">In progress</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div><a href="#">Eric Kim</a> <span class="label label-info">Pending</span>
																</div>
																<div>19 Jan 2013 12:45PM</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Lisa Miller</a> 
																	<span class="label label-important">In progress</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Eric Kim</a> 
																	<span class="label label-info">Pending</span>
																</div>
																<div>19 Jan 2013 12:45PM</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="media/image/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">Lisa Miller</a> 
																	<span class="label label-important">In progress</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--END TABS-->
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet box blue calendar">
								<div class="portlet-title">
									<div class="caption"><i class="icon-calendar"></i>Calendar</div>
								</div>
								<div class="portlet-body light-grey">
									<div id="calendar">
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet">
								<div class="portlet-title line">
									<div class="caption"><i class="icon-comments"></i>Chats</div>
									<div class="tools">
										<a href="" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="" class="reload"></a>
										<a href="" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body" id="chats">
									<div class="scroller" data-height="435px" data-always-visible="1" data-rail-visible1="1">
										<ul class="chats">
											<li class="in">
												<img class="avatar" alt="" src="media/image/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Bob Nilson</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="media/image/avatar2.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Lisa Wong</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="media/image/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Bob Nilson</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="media/image/avatar3.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Richard Doe</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="media/image/avatar3.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Richard Doe</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="media/image/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Bob Nilson</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="media/image/avatar3.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Richard Doe</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
													sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="media/image/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">Bob Nilson</a>
													<span class="datetime">at Jul 25, 2012 11:09</span>
													<span class="body">
													Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet.
													</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="chat-form">
										<div class="input-cont">   
											<input class="m-wrap" type="text" placeholder="Type a message here..." />
										</div>
										<div class="btn-cont"> 
											<span class="arrow"></span>
											<a href="" class="btn blue icn-only"><i class="icon-ok icon-white"></i></a>
										</div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTAINER-->    
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->	<!-- 页脚 -->		<!-- BEGIN FOOTER -->

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

	<!-- END FOOTER -->	<!-- 核心插件 -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

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
	<!-- BEGIN PAGE LEVEL PLUGINS -->	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.js" type="text/javascript"></script>   	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.russia.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.world.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.europe.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.germany.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.usa.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>  	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.flot.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.flot.resize.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.pulsate.min.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/date.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/daterangepicker.js" type="text/javascript"></script>     	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.gritter.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/fullcalendar.min.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/jquery.sparkline.min.js" type="text/javascript"></script>  	<!-- END PAGE LEVEL PLUGINS -->	<!-- BEGIN PAGE LEVEL SCRIPTS -->	<script src="<?php echo (APP_PATH); ?>Public/media/js/app.js" type="text/javascript"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/index.js" type="text/javascript"></script>        		<!-- END PAGE LEVEL SCRIPTS -->  	<script type="text/javascript">		jQuery(document).ready(function() {    		   App.init(); // initlayout and core plugins		   Index.init();		   Index.initJQVMAP(); // init index page's custom scripts		   Index.initCalendar(); // init index page's custom scripts		   Index.initCharts(); // init index page's custom scripts		   Index.initChat();		   Index.initMiniCharts();		   Index.initDashboardDaterange();		   Index.initIntro();		});	</script>
	<!-- END JAVASCRIPTS -->

<!-- END BODY -->
</html>