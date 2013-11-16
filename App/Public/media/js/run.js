/**
 * 验证浏览器版本
 */
(function ($) {
	var userAgent = window.navigator.userAgent.toLowerCase();
	 
	$.browser.msie10 = $.browser.msie && /msie 10\.0/i.test(userAgent);
	$.browser.msie9 = $.browser.msie && /msie 9\.0/i.test(userAgent); 
	$.browser.msie8 = $.browser.msie && /msie 8\.0/i.test(userAgent);
	$.browser.msie7 = $.browser.msie && /msie 7\.0/i.test(userAgent);
	$.browser.msie6 = !$.browser.msie8 && !$.browser.msie7 && $.browser.msie && /msie 6\.0/i.test(userAgent);

	$.browser.mozilla = /firefox/.test(navigator.userAgent.toLowerCase());	//火狐
	$.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());		//google
	$.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());		//苹果浏览器
	//$.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());		//IE
	var check_browser = false;
	var arr_browser = [
			$.browser.msie10,
			$.browser.msie9,
			$.browser.mozilla,
			$.browser.webkit,
			$.browser.opera
	]
	for (var i in arr_browser) {
		if (arr_browser[i] == true) {
			check_browser = true;
			break;
		}
	}
	
	if (check_browser == false) {
		alert('亲爱的用户，您的浏览器版本太低，为了更好用户体验，请下载最新的浏览器');
		window.location.href='http://www.google.com/intl/zh-CN/chrome/'	;
	}
	
})(jQuery);


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
	

	wade_jquery_date().init();
	
	wade_bootstrap_date('.bootstrap_date').bootstrap_date();
	
	

	
	
	
	
	
	
	