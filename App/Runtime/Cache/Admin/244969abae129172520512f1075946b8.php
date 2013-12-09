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
	<!-- END PAGE LEVEL STYLES -->
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
								<form action="" id="form_sample_1" method="post" class="form-horizontal">                     
									<div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										请在文本框输入相应内容.
									</div>
									<div class="alert alert-success hide">
										<button class="close" data-dismiss="alert"></button>
										验证成功
									</div>
									<div class="control-group">
										<label class="control-label">会员编号(自动生成)</label>
										<div class="controls">
											<input type="text" disabled="disabled" value="<?php echo ($base_info["id"]); ?>" data-required="1" class="span6 m-wrap"/>
										</div>
									</div>																		<div class="control-group">										<label class="control-label">会员级别<span class="required">*（慎重操作！）</span></label>											<div class="controls">												<select class="small m-wrap" tabindex="1" name="member_rank_id">																																			<?php if(is_array($rank_select)): foreach($rank_select as $key=>$vo): if(($member_rank_id == $key)): ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($vo); ?></option>													<?php else: ?>														<option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>												</select>											</div>									</div>																		<div class="control-group">										<label class="control-label">注册账号<span class="required">（慎重操作！）*</span></label>										<div class="controls">											<input type="text" placeholder="输入用户账号，搜索用户" class="m-wrap" id="ipt_content"><button class="btn blue" id="btn_search" type="button">搜索!</button>											当前所属账号：											<select tabindex="1" class="medium m-wrap" name="member_id" id="select_member">												<option value="<?php echo ($base_info["member_id"]); ?>"><?php echo ($base_info["member_info"]["account"]); ?>--<?php echo ($base_info["member_info"]["nickname"]); ?></option>											</select>										</div>									</div>																		<div class="control-group">										<label class="control-label"><?php echo ($Lang["card_number"]); ?><span class="required">*</span></label>										<div class="controls">											<input type="text" name="card_number" value="<?php echo ($base_info["card_number"]); ?>" data-required="1" class="span6 m-wrap"/>											<input type="hidden" name="card_number_db" value="<?php echo ($base_info["card_number"]); ?>" class="span6 m-wrap"/>										</div>									</div>											<div class="control-group">										<label class="control-label"><?php echo ($Lang["area"]); ?><span class="required">*</span></label>										<div class="controls">											<input type="text" name="area" value="<?php echo ($base_info["area"]); ?>" data-required="1" class="span6 m-wrap"/>										</div>									</div>									<div class="control-group">										<label class="control-label"><?php echo ($Lang["source"]); ?><span class="required">*</span></label>											<div class="controls">												<select name="source" tabindex="1" class="medium m-wrap">																									<?php if(is_array($source_select)): foreach($source_select as $key=>$vo): if(($base_info['source'] == $key)): ?><option value="<?php echo ($key); ?>" selected="selected"><?php echo ($vo); ?></option>														<?php else: ?>															<option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endif; endforeach; endif; ?>												</select>：												<input type="text" name="source_content" value="<?php echo ($base_info["source_content"]); ?>">											</div>									</div>																		<div class="control-group">										<label class="control-label"><?php echo ($Lang["name"]); ?><span class="required">*</span></label>										<div class="controls">											<input type="text" name="name" value="<?php echo ($base_info["name"]); ?>" class="span6 m-wrap"/>										</div>									</div>																							<div class="control-group">										<label class="control-label"><?php echo ($Lang["sex"]); ?><span class="required">*</span></label>										<div class="controls">											<input type="hidden" id="ipt_check_sex" value="<?php echo ($base_info["sex"]); ?>" />											<label class="radio">												<input type="radio" name="sex" value="男" class="ipt_sex" >													男											</label>											<label class="radio">												<input type="radio" name="sex" value="女"  class="ipt_sex"/>													女											</label>  										</div>									</div>																		<div class="control-group">										<label class="control-label">手机号码<span class="required">*</span></label>										<div class="controls">											<input type="text" name="mobile_phone" value="<?php echo ($base_info["mobile_phone"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">电    话<span class="required">*</span></label>										<div class="controls">											<input type="text" name="phone" value="<?php echo ($base_info["phone"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">传真号码<span class="required">*</span></label>										<div class="controls">											<input type="text" name="fax" value="<?php echo ($base_info["fax"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">联系QQ<span class="required">*</span></label>										<div class="controls">											<input type="text" name="qq" value="<?php echo ($base_info["qq"]); ?>" class="span6 m-wrap"/>										</div>									</div>										<div class="control-group">										<label class="control-label">身份证号码<span class="required">*</span></label>										<div class="controls">											<input type="text" name="identity_number" value="<?php echo ($base_info["identity_number"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">护照号码</label>										<div class="controls">											<input type="text" name="passport_number" value="<?php echo ($base_info["passport_number"]); ?>" class="span6 m-wrap"/>										</div>									</div>																	<div class="control-group">										<label class="control-label">驾驶证号码<span class="required">*</span></label>										<div class="controls">											<input type="text" name="driving_number" value="<?php echo ($base_info["driving_number"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">行车证号码<span class="required">*</span></label>										<div class="controls">											<input type="text" name="travel_number" value="<?php echo ($base_info["travel_number"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">驾龄<span class="required">*</span></label>										<div class="controls">											<input type="text" name="driving_years" value="<?php echo ($base_info["driving_years"]); ?>" class="span1 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">入会日期<span class="required">（慎重操作！）*</span></label>										<div class="controls">											<input type="text" name="date" value="<?php echo ($base_info["date"]); ?>"  readonly="" class="span2 wade_date">											<span class="add-on">												<i class="icon-calendar"></i>											</span>										</div>									</div>																		<div class="control-group">										<label class="control-label">到期日期<span class="required">（慎重操作！）*</span></label>										<div class="controls">											<input type="text" name="over_date" value="<?php echo ($base_info["over_date"]); ?>"  readonly="" class="span2 wade_date">											<span class="add-on">												<i class="icon-calendar"></i>											</span>										</div>									</div>																		<div class="control-group">										<label class="control-label">电子邮箱</label>										<div class="controls">											<div class="input-icon left">												<i class="icon-envelope"></i>												<input type="text" name="email" value="<?php echo ($base_info["email"]); ?>" placeholder="电子邮箱" class="m-wrap ">    											</div>										</div>									</div>																		<div class="control-group">										<label class="control-label">企业名称</label>										<div class="controls">											<input type="text" name="enterprise_name" value="<?php echo ($base_info["enterprise_name"]); ?>" class="span6 m-wrap"/>										</div>									</div>										<div class="control-group">										<label class="control-label">经营组织/在职公司类型</label>										<div class="controls">											<input type="hidden" value="<?php echo ($base_info["property"]); ?>" id="ipt_check_have" />											<label class="checkbox">												<input type="checkbox" name="property[1]" value="股份公司" class="ipt_check" /> 股份公司											</label>											<label class="checkbox">												<input type="checkbox" name="property[2]" value="个人经营" class="ipt_check"/> 个人经营											</label>											<label class="checkbox">												<input type="checkbox" name="property[3]" value="有限公司" class="ipt_check"/> 有限公司											</label>											<label class="checkbox">												<input type="checkbox" name="property[4]" value="有限责任公司" class="ipt_check"/> 有限责任公司											</label>											<label class="checkbox">												<input type="checkbox" name="property[5]" value="合资公司" class="ipt_check"/> 合资公司											</label>										</div>									</div>																				<div class="control-group">										<label class="control-label">注册资金</label>										<div class="controls">											<div class="input-prepend input-append">												<span class="add-on">￥</span>												<input type="text" class="m-wrap" name="registered_fund" value="<?php echo ($base_info["registered_fund"]); ?>">												<span class="add-on">万</span>											</div>										</div>									</div>																		<div class="control-group">										<label class="control-label">法人</label>										<div class="controls">											<input type="text" name="legal_person" value="<?php echo ($base_info["legal_person"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">会员组成成员</label>										<div class="controls">											<input type="text" name="member_group" value="<?php echo ($base_info["member_group"]); ?>" class="span6 m-wrap"/>										</div>									</div>										<div class="control-group">										<label class="control-label">近三年营业额</label>										<div class="controls">											<div class="input-prepend input-append">												<span class="add-on">￥</span>												<input type="text" class="m-wrap" name="turnover" value="<?php echo ($base_info["turnover"]); ?>">												<span class="add-on">万</span>											</div>										</div>									</div>																		<div class="control-group">										<label class="control-label">企业网址</label>										<div class="controls">											<input type="text" name="website" value="<?php echo ($base_info["website"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">通讯地址</label>										<div class="controls">											<input type="text" name="address" value="<?php echo ($base_info["address"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">企业所处行业位置</label>										<div class="controls">											<input type="text" name="enterprise_address" value="<?php echo ($base_info["enterprise_address"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">个人介绍及社会身份</label>										<div class="controls">											<textarea rows="3" name="introduce" class="span6 m-wrap"><?php echo ($base_info["introduce"]); ?></textarea>										</div>									</div>																		<div class="control-group">										<label class="control-label">企业主要合作方</label>										<div class="controls">											<textarea rows="3" name="collaborate" class="span6 m-wrap"><?php echo ($base_info["collaborate"]); ?></textarea>										</div>									</div>																		<div class="control-group">										<label class="control-label">主要经营产品</label>										<div class="controls">											<input type="text" name="product" value="<?php echo ($base_info["product"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">产品产地分布</label>										<div class="controls">											<input type="text" name="distribution" value="<?php echo ($base_info["distribution"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">市场占有率</label>										<div class="controls">											<input type="text" name="occupancy" value="<?php echo ($base_info["occupancy"]); ?>" class="span6 m-wrap"/>										</div>									</div>											<div class="control-group">										<label class="control-label">业务发展规划</label>										<div class="controls">											<textarea rows="3" name="direction" class="span6 m-wrap"><?php echo ($base_info["direction"]); ?></textarea>										</div>									</div>																		<div class="control-group">										<label class="control-label">紧急联系人</label>										<div class="controls">											<input type="text" name="contacts" value="<?php echo ($base_info["contacts"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">关   系</label>										<div class="controls">											<input type="text" name="relation" value="<?php echo ($base_info["relation"]); ?>" class="span6 m-wrap"/>										</div>									</div>																		<div class="control-group">										<label class="control-label">手机号码</span></label>										<div class="controls">											<input type="text" name="contacts_phone" value="<?php echo ($base_info["contacts_phone"]); ?>" class="span6 m-wrap"/>										</div>									</div>
									<div class="form-actions">										
										<button type="submit" class="btn purple">修改</button>
										<a href="?s=/Admin/Rank/rank_list/member_rank_id/<?php echo ($member_rank_id); ?>"><button type="button" class="btn">返回</button></a>
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
	<script src="<?php echo (APP_PATH); ?>Public/media/js/app.js"></script>	<script src="<?php echo (APP_PATH); ?>Public/media/js/form-validation_member_base_edit.js"></script> 
	<!-- END PAGE LEVEL STYLES -->    
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