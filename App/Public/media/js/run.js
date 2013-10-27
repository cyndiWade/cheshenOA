//动弹导航样式
	(function ($) {
		//82
		var menu_li = $('ul.wade_menu').children('li').slice(1);		//一级导航栏
		var menu_children_li = menu_li.children().find('li');			//二级导航
		var cookie = new Cookie();												//Cookie操作类
	
		var index = cookie.getCookie('menu_index') || 1;				//点击导航后获取的索引		
		menu_li.eq(index -1 ).addClass('active');								//为点击的导航加上样式
		
		//一级导航没有子导航时加样式
		menu_li.click(function () {
			var _this = $(this);
			if (_this.children().is('ul') == false) {
				cookie.setCookie('menu_index',_this.index());				//保存导航名索引到Cookie
			}
		});
		
		//二级导航选中后加样式
		menu_children_li.click(function () {
			var _this = $(this);
			cookie.setCookie('menu_index',_this.parent().parent().index());		//保存导航名到Cookie
		});
		
	})(jQuery);
	
	
	(function ($) {

		$('.check').click(function () {
			return confirm('确定操作？') ? true : false;
		});

	})(jQuery);
	
	
	/* 日期控件 */
	var wade_jquery_date = function () {
			
		var options = {
				//attr 属性 ，更多格式参加书本
			//	altField:'#otherField',			//同步元素日期到其他元素上
				dateFormat:'yy-mm-dd',		//日期格式设置
			//	minDate: new Date(),		//最小选择日期为今天
				showButtonPanel:true,		//开启今天标示
				changeYear:true,				//显示年份
				changeMonth:true,				//显示月份
				showMonthAfterYear:true,	//互换位置
				
				
				//fn 执行函数
				onSelect : function () {			//选择日期执行函数
				},
				onClose : function () {			//关闭窗口执行函数
					
				},
				
		};	
		
		return  {
			init : function () {
				$('.wade_date').datepicker(options);
			}
		};

	};
	
	
	
	
	
	
	
	