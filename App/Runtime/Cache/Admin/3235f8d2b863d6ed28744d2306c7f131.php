<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD --><style type="text/css">	#event_box_hidden {		display:none;	}	.schedule_container span {		line-height:35px;	}</style>
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
	<link href="<?php echo (APP_PATH); ?>Public/media/css/fullcalendar.css" rel="stylesheet" />	
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
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<?php echo ($MODULE_NAME); ?><small> <?php echo ($ACTION_NAME); ?></small>
						</h3>
			
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="portlet box blue calendar">
						<div class="portlet-title">
							<div class="caption"><i class="icon-reorder"></i><?php echo ($TITILE_NAME); ?></div>
						</div>
						<div class="portlet-body light-grey">
							<div class="row-fluid">
								<div class="span3 responsive" data-tablet="span12 fix-margin" data-desktop="span8">
									<!-- BEGIN DRAGGABLE EVENTS PORTLET-->    
									<!-- <h3 class="event-form-title">编辑日程</h3>-->
									<div id="external-events">
										<form class="inline-form">																						<div class="schedule_container">												<span>开始时间：</span>												<input type="hidden" name="cars_id" value="<?php echo ($html_info['cars_id']); ?>" readonly />												<input type="text" name="start_schedule_time" value="" class="m-wrap span7 bootstrap_date" readonly />											</div>																						<div class="schedule_container">												<span>结束时间：</span>												<input type="text" name="over_schedule_time" value="" class="m-wrap span7 bootstrap_date" readonly />											</div>											<div class="schedule_container">
												<span>日程内容：</span>												<input type="text" name="title" value="" class="m-wrap span7" placeholder="日程内容" id="event_title" />											</div>																						<a href="javascript:;" id="event_add" class="btn green">添加</a>
										</form>
										<hr />													<div id="event_box_hidden">
										<div id="event_box">
										</div>
										<label for="drop-remove">
										<input type="checkbox" id="drop-remove" />remove after drop                         
										</label>										</div>
										<hr class="visible-phone" />
									</div>
									<!-- END DRAGGABLE EVENTS PORTLET-->            
								</div>
								<div class="span9">
									<div id="calendar" class="has-toolbar"></div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
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
	<script src="<?php echo (APP_PATH); ?>Public/media/js/fullcalendar.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo (APP_PATH); ?>Public/media/js/app.js"></script>
<!--	<script src="<?php echo (APP_PATH); ?>Public/media/js/calendar.js"></script>     -->
	<script type="text/jscript">
jQuery(document).ready(function() {       
// initiate layout and pluginsApp.init();var Calendar = function () {    return {        //main function to initiate the module        init: function () {            App.addResponsiveHandler(function () {                Calendar.initCalendar();            });            $('.page-sidebar .sidebar-toggler').click(function () {                Calendar.initCalendar();            });            Calendar.initCalendar();        },        initCalendar: function () {            if (!jQuery().fullCalendar) {                return;            }			var calendar = $('#calendar');            var date = new Date();            var d = date.getDate();            var m = date.getMonth();            var y = date.getFullYear();            var h = {};						/* 导航样式 */            if (App.isRTL()) {                 if (calendar.parents(".portlet").width() <= 720) {                    calendar.addClass("mobile");                    h = {                        right: 'title, prev, next',                        center: '',                        right: 'prev,next,today,agendaDay,agendaWeek,month'                    };                } else {                    calendar.removeClass("mobile");                    h = {                        right: 'title',                        center: '',                        left: 'prev,next,today,agendaDay,agendaWeek,month'                    };                }                            } else {                 if (calendar.parents(".portlet").width() <= 720) {                    calendar.addClass("mobile");                    h = {                        left: 'title, prev, next',                        center: '',                        right: 'prev,next,today,agendaDay,agendaWeek,month'                    };                } else {                    calendar.removeClass("mobile");                    h = {                        left: 'title',                        center: '',                        right: 'prev,next,today,agendaDay,agendaWeek,month'                    };                }            }           			            var initDrag = function (el) {                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)                // it doesn't need to have a start or end                var eventObject = {                    title: $.trim(el.text()) // use the element's text as the event title                };                // store the Event Object in the DOM element so we can get to it later                el.data('eventObject', eventObject);                // make the event draggable using jQuery UI                el.draggable({                    zIndex: 999,                    revert: true, // will cause the event to go back to its                    revertDuration: 0 //  original position after the drag                });            }						/* 添加日程执行的函数  */            var addEvent = function (title) {                title = title.length == 0 ? "Untitled Event" : title;                var html = $('<div class="external-event label">' + title + '</div>');                jQuery('#event_box').append(html);                initDrag(html);            }            $('#external-events div.external-event').each(function () {                initDrag($(this))            });			/* wade -- 自定义新日程到日历中 */			var add_schedule = function (title) {									/* 数据采集与验证 */					var arr_input = $('.schedule_container').find('input');					var check_result = true;					var post_data = {};					arr_input.each(function () {						var _this = $(this);						if (_this.val() == '') {							alert('不得为空！');							_this.focus();							check_result = false;							return false;						} else {							post_data[_this.attr('name')] = _this.val();						}					});						if (fomat_date(post_data.start_schedule_time) > fomat_date(post_data.over_schedule_time) ) {						alert('开始日期不得大于结束日期');						check_result = false;					}					if (check_result == false)  return false;					/* 添加数据 */									var result = ajax_post_setup('?s=/Admin/CarsSchedule/AJAX_Schedule_Api',post_data);					if (result == false) {						alert('服务器连接超时');						return false;					} else if (result.status == 0) {						alert(result.msg);					} else {						alert(result.msg);						return false;					}					//console.log(result);					/* 日程写入到日历中 */                    var copiedEventObject =  {};					copiedEventObject.id = result.data.id;					copiedEventObject.title = post_data.title;					copiedEventObject.start = post_data.start_schedule_time;					copiedEventObject.end = post_data.over_schedule_time;					copiedEventObject.backgroundColor = App.getLayoutColorCode('red');                    copiedEventObject.allDay = false;                    //添加到日历中                    calendar.fullCalendar('renderEvent', copiedEventObject, true);			};						/* 点击添加新的日程 */            $('#event_add').unbind('click').click(function () {                var title = $('#event_title').val();				add_schedule(title);				              //  addEvent(title);            });            //predefined events        //    $('#event_box').html("");           // addEvent("My Event 1");		            calendar.fullCalendar('destroy'); // destroy the calendar            calendar.fullCalendar({ //re-initialize the calendar           	//	 contentHeight: 1024,	        	    monthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],  	       	 	monthNamesShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],  	         	dayNames: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],  	         	dayNamesShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],  	        	today: ["今天"],  	       		buttonText: {  	        		today: '今天',  	     			month: '月',  	  			    week: '周',  	   				day: '日'				},				defaultView:'month',		//默认显示的视图				titleFormat:{				    month: 'yyyy-MM',                            				    week: "{yyyy}-MM", // Sep 7 - 13 2009				    day: 'yyyy-MM-dd dddd'               				},				header: h,				firstDay:1,	//Sunday=0, Monday=1, Tuesday=2, etc. 设置每个星期第一天是				axisFormat:'HH(:mm)',	//week的左边事件		axisFormat:'h(:mm)tt',				timeFormat :'HH:mm{ - HH:mm}',		//日程时间格式	timeFormat :''h:mm{ - h:mm}',                slotMinutes: 5,												/* 加载以后日程数据 */				events : function (start, end, callback) {					var cars_id = $('input[name=cars_id]').val();					var result = ajax_post_setup('?s=/Admin/CarsSchedule/AJAX_Get_Schedule',{'cars_id':cars_id});					var event_data = [];					if (result.status == 0) {						for (var obj in result.data) {							event_data.push({								id : result.data[obj].id,			                	title : result.data[obj].title,			                	start: result.data[obj].start_schedule_time,								end : result.data[obj].over_schedule_time,							//	backgroundColor:App.getLayoutColorCode('red'),								allDay: false,			                });						}							//日程写入到日历中	                	callback(event_data);					}					 				},				/* 删除日程 */				eventClick:function( event, jsEvent, view ) { 									if (confirm('确定要删除吗？') == true) {						var id = event.id;						var result = ajax_post_setup('?s=/Admin/CarsSchedule/AJAX_DEL_Schedule',{'id':id});						if (result == false) {							alert('服务器连接超时');							return false;						} else if (result.status == 0) {							alert(result.msg);							calendar.fullCalendar('removeEvents', [id]);						} else {							alert(result.msg);							return false;						}					};									},											/*                editable: false,                droppable: false, // this allows things to be dropped onto the calendar !!!                drop: function (date, allDay) { // this function is called when something is dropped                    // retrieve the dropped element's stored Event Object                    var originalEventObject = $(this).data('eventObject');					                    // we need to copy it, so that multiple events don't have a reference to the same object                    var copiedEventObject = $.extend({}, originalEventObject);                    // assign it the date that was reported	                    copiedEventObject.start = date;                    copiedEventObject.allDay = allDay;                    copiedEventObject.className = $(this).attr("data-class");                    // render the event on the calendar                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)                    calendar.fullCalendar('renderEvent', copiedEventObject, true);                    // is the "remove after drop" checkbox checked?                    if ($('#drop-remove').is(':checked')) {                        // if so, remove the element from the "Draggable Events" list                        $(this).remove();                    }                },				                 events: [{                        title: 'All Day Event',                                                start: new Date(y, m, 1),                        backgroundColor: App.getLayoutColorCode('yellow')                    }, {                        title: 'Long Event',                        start: new Date(y, m, d - 5),                        end: new Date(y, m, d - 2),                        backgroundColor: App.getLayoutColorCode('green')                    }, {                        title: 'Repeating Event',                        start: new Date(y, m, d - 3, 16, 0),                        allDay: false,                        backgroundColor: App.getLayoutColorCode('red')                    }, {                        title: 'Repeating Event',                        start: new Date(y, m, d + 4, 16, 0),                        allDay: false,                        backgroundColor: App.getLayoutColorCode('green')                    }, {                        title: 'Meeting',                        start: new Date(y, m, d, 10, 30),                        allDay: false,                    }, {                        title: 'Lunch',                        start: new Date(y, m, d, 12, 0),                        end: new Date(y, m, d, 14, 0),                        backgroundColor: App.getLayoutColorCode('grey'),                        allDay: false,                    }, {                        title: 'Birthday Party',                        start: new Date(y, m, d + 1, 19, 0),                        end: new Date(y, m, d + 1, 22, 30),                        backgroundColor: App.getLayoutColorCode('purple'),                        allDay: false,                    }, {                        title: 'Click for Google',                        start: new Date(y, m, 28),                        end: new Date(y, m, 29),                        backgroundColor: App.getLayoutColorCode('yellow'),                        url: 'http://google.com/',                    }                ]               */            });        }    };}();
		  Calendar.init();
});
</script>


<!-- END BODY -->
</html>