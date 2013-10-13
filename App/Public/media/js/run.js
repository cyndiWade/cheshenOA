//动弹导航样式
	(function () {
		//82
		var menu_li = $('ul.wade_menu').children('li').slice(1);		//一级导航栏
		var menu_children_li = menu_li.children().find('li');			//二级导航
		var cookie = new Cookie();												//Cookie操作类
	
		var index = cookie.getCookie('menu_index') || 1;				//点击导航后获取的索引		
		menu_li.eq(index -1 ).addClass('active');								//为点击的导航加上样式
		
		//一级导航没有子导航时家样式
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
		
	})();