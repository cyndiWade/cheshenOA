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
	<link rel="stylesheet" href="<?php echo (APP_PATH); ?>Public/media/css/DT_bootstrap.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">		<!-- BEGIN  头部-->
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
	<div class="page-container row-fluid">			<!-- 左侧导航 -->		<!-- BEGIN SIDEBAR -->

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

		<!-- END SIDEBAR -->				<!-- BEGIN PAGE -->  
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
						<h3 class="page-title">
							<?php echo ($MODULE_NAME); ?>
							 <small><?php echo ($ACTION_NAME); ?></small>
						</h3>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							<ul class="nav nav-tabs" id="wade_tab">								<!-- class="active" -->
								<li data-action="staff_base_look" class="active" ><a href="#tab_1" data-toggle="tab">基本信息</a></li>
								<li data-action="staff_vitae_look"><a class="" href="#tab_2" data-toggle="tab">履历</a></li>
								<li data-action="staff_contract_look"><a href="#tab_3" data-toggle="tab">合同</a></li>
								<li data-action="staff_salary_look"><a class="" href="#tab_4" data-toggle="tab">薪资</a></li>																<li data-action="staff_alteration_look"><a class="" href="#tab_5" data-toggle="tab">异动事件</a></li>							</ul>
							<div class="tab-content">								<!-- 基本信息 -->
								<div class="tab-pane active" id="tab_1">																		<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-reorder"></i></div>														<div class="tools">															<a class="collapse" href="javascript:;"></a>															<a class="reload" href="javascript:;"></a>																		</div>													</div>													<div class="portlet-body form">														<!-- BEGIN FORM-->														<form class="form-horizontal" method="post" action="?s=/Admin/Staff/staff_base_edit/act/<?php echo ($act); ?>/id/<?php echo ($id); ?>" id="form_sample_1"  novalidate="novalidate">			                     												<div class="alert alert-error hide">																<button data-dismiss="alert" class="close"></button>																请在文本框输入相应内容.															</div>															<div class="alert alert-success hide">																<button data-dismiss="alert" class="close"></button>																验证成功															</div>															<div class="control-group">																<label class="control-label">员工编号（自动生成）<span class="required" >*</span></label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1" name="serial" disabled="disabled" placeholder="自动生成" value="<?php echo ($staff_base_info["serial"]); ?>" >																</div>															</div>																								<div class="control-group">																<label class="control-label">应聘岗位<span class="required">*</span></label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"name="jobs"  value="<?php echo ($staff_base_info["jobs"]); ?>" >																</div>															</div>																								<div class="control-group">																<label class="control-label">姓名<span class="required">*</span></label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"name="name"  value="<?php echo ($staff_base_info["name"]); ?>" >																</div>															</div>																								<div class="control-group">																<label class="control-label">英文姓名<span class="required">*</span></label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"name="name_en"  value="<?php echo ($staff_base_info["name_en"]); ?>" >																</div>															</div>																								<div class="control-group">																<label class="control-label">所属区域</label>																<div class="controls">																	<select name="company_id_tmp" id="company" data-table="Department" class="small m-wrap" tabindex="1">															<option value="">--请选择区域--</option>															<?php if(is_array($company_list)): $i = 0; $__LIST__ = $company_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option>															</if><?php endforeach; endif; else: echo "" ;endif; ?>														</select>														<span>当前区域：<?php echo ($staff_base_info["company_name"]); ?></span>													</div>																									</div>																								<div class="control-group">																<label class="control-label">所属部门</label>																<div class="controls">																	<select name="department_id_tmp" id="department" data-table="Occupation" class="small m-wrap" tabindex="1">															</volist>														</select>														<span>当前部门：<?php echo ($staff_base_info["department_name"]); ?></span>													</div>																									</div>																								<div class="control-group">																<label class="control-label">所属职位</label>																<div class="controls">																	<select name="occupation_id_tmp" id="occupation"  class="small m-wrap" tabindex="1">														</select>														<span>当前职位：<?php echo ($staff_base_info["occupation_name"]); ?></span>													</div>															</div>																								<div class="control-group">																<label class="control-label">民族</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1" value="<?php echo ($staff_base_info["ethnic"]); ?>" name="ethnic">																</div>															</div>																								<div class="control-group">																<label class="control-label">身份证号码</label>																<div class="controls">																	<input type="text" class="span6 m-wrap"   name="identity" value="<?php echo ($staff_base_info["identity"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">生日</label>																<div class="controls">																	<input type="text" class="span6 m-wrap"   name="birthday" value="<?php echo ($staff_base_info["birthday"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">户口所在地</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1" value="<?php echo ($staff_base_info["identity_address"]); ?>" name="identity_address">																</div>															</div>																								<div class="control-group">																<label class="control-label">居住地址</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1" value="<?php echo ($staff_base_info["dwell_address"]); ?>" name="dwell_address">																</div>															</div>																																	<div class="control-group">													<?php if(($staff_base_info['sex'] == '男') ): $sex_man = 'checked=checked'; ?>													<?php else: ?>														<?php $sex_woman = 'checked=checked'; endif; ?>																										<label class="control-label">性别</label>																<div class="controls">																	<label class="radio">																	<div class="radio"><span><input type="radio" name="sex" value="男" <?php echo ($sex_man); ?>></span></div>																	男																	</label>																	<label class="radio">																	<div class="radio"><span class="checked"><input type="radio" name="sex" value="女"  <?php echo ($sex_woman); ?>></span></div>																女														</label>  																</div>															</div>															<div class="control-group">																<label class="control-label">血型</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="blood" value="<?php echo ($staff_base_info["blood"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">身高</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="height" value="<?php echo ($staff_base_info["height"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">学历</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="education" value="<?php echo ($staff_base_info["education"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">专业</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="major" value="<?php echo ($staff_base_info["major"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">祖籍</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="ancestral" value="<?php echo ($staff_base_info["ancestral"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">政治面貌</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="politics" value="<?php echo ($staff_base_info["politics"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">电子邮箱</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="email" value="<?php echo ($staff_base_info["email"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">社保电脑号</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="social_num" value="<?php echo ($staff_base_info["social_num"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">电话号码</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="phone" value="<?php echo ($staff_base_info["phone"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">紧急联络人</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="contact_person" value="<?php echo ($staff_base_info["contact_person"]); ?>">																</div>															</div>																							<div class="control-group">																<label class="control-label">紧急联络人电话</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="contact_phone" value="<?php echo ($staff_base_info["contact_phone"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">与联络人关系</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="contact_relation" value="<?php echo ($staff_base_info["contact_relation"]); ?>">																</div>															</div>																								<div class="control-group">																<label class="control-label">联络人单位</label>																<div class="controls">																	<input type="text" class="span6 m-wrap" data-required="1"  name="contact_company" value="<?php echo ($staff_base_info["contact_company"]); ?>">																</div>															</div>																								<div class="control-group">													<?php if(($staff_base_info['marriage'] == '已婚') ): $marriage_ok = 'checked=checked'; ?>													<?php elseif(($staff_base_info['marriage'] == '未婚')): ?>														<?php $marriage_no = 'checked=checked'; endif; ?>																										<label class="control-label">婚姻状况</label>																<div class="controls">																	<label class="radio">																	<div class="radio"><span><input type="radio" name="marriage" value="已婚" <?php echo ($marriage_ok); ?>></span></div>																	已婚																	</label>																	<label class="radio">																	<div class="radio"><span class="checked"><input type="radio" name="marriage" value="未婚" <?php echo ($marriage_no); ?>></span></div>																未婚														</label>  																</div>															</div>																									<div class="control-group">													<?php if(($staff_base_info['on_job'] == 0) ): $on_job_ok = 'checked=checked'; ?>													<?php elseif(($staff_base_info['on_job'] == 1)): ?>														<?php $on_job_no = 'checked=checked'; endif; ?>																										<label class="control-label">是否在职</label>																<div class="controls">																	<label class="radio">																	<div class="radio"><span><input type="radio" name="on_job" value="0" <?php echo ($on_job_ok); ?>></span></div>																	是																	</label>																	<label class="radio">																	<div class="radio"><span class="checked"><input type="radio" name="on_job" value="1"  <?php echo ($on_job_no); ?>></span></div>																否														</label>  																</div>															</div>																									<div class="control-group">													<label class="control-label">备注</label>																<div class="controls">																	<textarea rows="3" class="span6 m-wrap" name="remarks"><?php echo ($staff_base_info["remarks"]); ?></textarea>																</div>															</div>																								<div class="form-actions">																										<button class="btn purple" type="submit">提交</button>																<a href="?s=/Admin/Staff/index"><button class="btn" type="button">返回</button></a>															</div>														</form>														<!-- END FORM-->													</div>												</div>										</div>										<!-- 履历 -->								<div class="tab-pane" id="tab_2">																		<!-- 教育经历 -->													<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>教育经历</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_vitae_edit/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加教育经历 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >毕业院校/教育机构</th>														<th class="hidden-480">专业</th>														<th class="hidden-480">起止日期</th>														<th class="hidden-480">获取证书</th>														<th class="hidden-480">证明人以及电话</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_education_list)): $i = 0; $__LIST__ = $staff_education_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["school"]); ?></td>														<td class="hidden-480"><?php echo ($vo["major"]); ?></td>														<td class="hidden-480"><?php echo ($vo["data_time"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["certificate"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["witness"]); ?></td>														<td >															<a href="?s=/Admin/Staff/staff_vitae_edit/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_vitae_edit/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>																				<!-- 工作经历 -->														<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>工作经历</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_vitae_work/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加工作经历 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >工作单位</th>														<th class="hidden-480">起止日期</th>														<th class="hidden-480">职位</th>														<th class="hidden-480">工作职责</th>														<th class="hidden-480">薪资</th>														<th class="hidden-480">离职原因</th>														<th class="hidden-480">证明人及电话</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_work_list)): $i = 0; $__LIST__ = $staff_work_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["company"]); ?></td>														<td class="hidden-480"><?php echo ($vo["data_time"]); ?></td>														<td class="hidden-480"><?php echo ($vo["position"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["responsibility"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["salary"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["dimission"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["witness"]); ?></td>														<td >															<a href="?s=/Admin/Staff/staff_vitae_work/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_vitae_work/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>																<!--  家庭成员 -->									<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>家庭状况</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_vitae_family/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加信息 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >关系</th>														<th class="hidden-480">姓名</th>														<th class="hidden-480">工作单位</th>														<th class="hidden-480">住址及电话</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_family_list)): $i = 0; $__LIST__ = $staff_family_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["relation"]); ?></td>														<td class="hidden-480"><?php echo ($vo["name"]); ?></a></td>														<td class="hidden-480"><?php echo ($vo["company"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["address"]); ?></td>														<td>															<a href="?s=/Admin/Staff/staff_vitae_family/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_vitae_family/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>															</div>														<!-- 合同 -->								<div class="tab-pane" id="tab_3">									<!--  合同 -->									<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>合同信息</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_contract_edit/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加信息 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >入职日期</th>														<th class="hidden-480">转正日期</th>														<th class="hidden-480">离职日期</th>														<th class="hidden-480">合同起始日期</th>														<th class="hidden-480">合同结束日期</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_contract_list)): $i = 0; $__LIST__ = $staff_contract_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["entry_time"]); ?></td>														<td class="hidden-480"><?php echo ($vo["official_time"]); ?></a></td>														<td class="hidden-480"><?php echo ($vo["dimission_time"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["contract_start"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["contract_over"]); ?></td>														<td>															<a href="?s=/Admin/Staff/staff_contract_edit/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_contract_edit/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>																						</div>																<!-- 薪资 -->								<div class="tab-pane" id="tab_4">															<!--  薪资列表 -->									<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>薪资记录</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_salary_edit/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加信息 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >开户银行</th>														<th class="hidden-480">银行账号</th>														<th class="hidden-480">起始日期</th>														<th class="hidden-480">终止日期</th>														<th class="hidden-480">工资</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_salary_list)): $i = 0; $__LIST__ = $staff_salary_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["open_bank"]); ?></td>														<td class="hidden-480"><?php echo ($vo["open_account"]); ?></a></td>														<td class="hidden-480"><?php echo ($vo["start_time"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["stop_time"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["pay"]); ?></td>														<td>															<a href="?s=/Admin/Staff/staff_salary_edit/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_salary_edit/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>																		<!-- 每月绩效栏 -->									<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>绩效栏</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_achievements/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加信息 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >操作账号</th>														<th class="hidden-480">月薪资</th>														<th class="hidden-480">绩效奖金</th>														<th class="hidden-480">发放日期</th>														<th class="hidden-480">考核结果</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_achievements_list)): $i = 0; $__LIST__ = $staff_achievements_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["account"]); ?></td>														<td class="hidden-480"><?php echo ($vo["month_pay"]); ?></a></td>														<td class="hidden-480"><?php echo ($vo["achievements_pay"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["issue_time"]); ?></td>														<td class="center hidden-480"><?php echo ($vo["result"]); ?></td>														<td>															<a href="?s=/Admin/Staff/staff_achievements/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_achievements/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>																						</div>														<!-- 异动事件 -->								<div class="tab-pane" id="tab_5">															<div class="portlet box blue">													<div class="portlet-title">														<div class="caption"><i class="icon-globe"></i>异动事件</div>														<div class="tools">															<a href="javascript:;" class="collapse"></a>																								<a href="javascript:;" class="reload"></a>																	</div>													</div>													<div class="portlet-body">											<div class="clearfix">												<div class="btn-group">																					<a href="?s=/Admin/Staff/staff_alteration_edit/act/add/base_id/<?php echo ($id); ?>">														<button id="sample_editable_1_new" class="btn green">														添加记录 <i class="icon-plus"></i>														</button>													</a>																				</div>											</div>											<table class="table table-striped table-bordered table-hover sample_1">												<thead>													<tr>														<th >日期</th>														<th class="hidden-480">事件</th>														<th class="hidden-480">奖金</th>														<th >操作</th>													</tr>												</thead>												<tbody>																					<?php if(is_array($staff_alteration_list)): $i = 0; $__LIST__ = $staff_alteration_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">														<td><?php echo ($vo["data_time"]); ?></td>														<td class="hidden-480"><?php echo ($vo["incident"]); ?></a></td>														<td class="hidden-480"><?php echo ($vo["bonus"]); ?></td>														<td>															<a href="?s=/Admin/Staff/staff_alteration_edit/act/update/id/<?php echo ($vo["id"]); ?>/base_id/<?php echo ($id); ?>">提交</a>															| <a href="?s=/Admin/Staff/staff_alteration_edit/act/delete/id/<?php echo ($vo["id"]); ?>" class="check">删除</a>																													</td>													</tr><?php endforeach; endif; else: echo "" ;endif; ?>												</tbody>											</table>										</div>													</div>															</div>																																			</div>
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
	<!-- END CONTAINER -->	<!-- 页脚 -->		<!-- BEGIN FOOTER -->

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

	<!-- END FOOTER -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->	<!-- 核心插件 -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

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
	
	<!-- BEGIN PAGE LEVEL PLUGINS -->	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/additional-methods.min.js"></script>		<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/select2.min.js"></script>	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/chosen.jquery.min.js"></script>	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/jquery.dataTables.js"></script>	<script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/DT_bootstrap.js"></script>
		<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script type="text/javascript"  src="<?php echo (APP_PATH); ?>Public/media/js/app.js"></script>		<script type="text/javascript"  src="<?php echo (APP_PATH); ?>Public/media/js/form-validation-staff_edit.js"></script>		<!-- <script type="text/javascript" src="<?php echo (APP_PATH); ?>Public/media/js/table-managed.js"></script>   	-->																															
	<!-- END PAGE LEVEL SCRIPTS -->
	<script type="text/javascript">
		jQuery(document).ready(function() {    
		   // initiate layout and plugins
		   App.init();
		 //  FormSamples.init();			FormValidation.init();
		});
	</script>

<!-- END BODY -->
</html>