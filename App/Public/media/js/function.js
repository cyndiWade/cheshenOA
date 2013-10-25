//cookie操作
//两个参数，一个是cookie的名子，一个是值
function Cookie() {
	//this.name = name;
	//this.val = val;
}
Cookie.prototype.setCookie = function (name,value) {//添加方法
	var Days = 1; 				//此 cookie 将被保存 30 天
	var exp = new Date();    //new Date("December 31, 9998");
	exp.setTime(exp.getTime() + Days*24*60*60*1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
//取cookies函数qwe
Cookie.prototype.getCookie = function (name)  {
	var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
	if(arr != null) return unescape(arr[2]); return null;
}
//取cookies函数
Cookie.prototype.delCookie = function(name) {//删除cookie
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=this.getCookie(name);
	if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}


function getTypeof(obj) {
		var type =null;
		if (obj instanceof Array) {
			type =  'Array';
		} else if (obj instanceof Function) {
			type = 	'Function';
		} else if (obj instanceof Object) {
			type = 'Object';
		} else if (obj instanceof RegExp) {
			type = 'RegExp';
		} else {
			switch (typeof obj) {
				case 'string' :
					type = 'string';
					break;
				case 'number':
					type = 'number'	;
					break;
			}
		} 
		return type;
	}
	
	function in_array(value,arr) {
		for (var i in arr) {
			if (value == arr[i]) {
				return true;
			}
		}
		return false;
	}	