var FormValidation = function () {


    return {
        //main function to initiate the module
        init: function () {

            // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                	
                	cars_id: {
                        required: true
                    },
                    start : {
                        required: true,
                         dateISO:true
                     },	
                     
                     over : {
                         required: true,
                          dateISO:true
                      },	
                      
                      length : {
                          required: true,
                          digits:true
                       },	
                    
                    
					year_audit_date : {
                       required: true,
                        dateISO:true
                    },	
					year_audit_item : {
                        required: true,
						minlength: 1,
                        maxlength:30
                    },	
					year_audit_state : {
                        required: true,
						minlength: 1,
                        maxlength:30
                    },
					year_audit_next : {
                        required: true,
                        dateISO:true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                    $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                    
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.submit();		//提交表单
                },
                
                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "education") { // for chosen elements, need to insert the error after the chosen container
                        error.insertAfter("#form_2_education_chzn");
                    } else if (element.attr("name") == "cars_id") { // for uniform radio buttons, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_membership_error");
                    } else if (element.attr("name") == "service") { // for uniform checkboxes, insert the after the given container
                        error.addClass("no-left-padding").insertAfter("#form_2_service_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavoir
                    }
                },
            });

            //Sample 2
            $('#form_2_select2').select2({
                placeholder: "Select an Option",
                allowClear: true
            });

            var form2 = $('#form_sample_2');
            var error2 = $('.alert-error', form2);
            var success2 = $('.alert-success', form2);

           
            //apply validation on chosen dropdown value change, this only needed for chosen dropdown integration.
            $('.chosen, .chosen-with-diselect', form2).change(function () {
                form2.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2', form2).change(function () {
                form2.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
            
            
            (function () {
				/* 日期选择 */
				var arr_date = $('.wade_date_custom');
				var start = arr_date.eq(0);
				var over = arr_date.eq(1);
				
				/* 日期天数 */
				var arr_ipt = $('.length');
				var ipt_length = arr_ipt.eq(0);
				var ipt_length_disabled = arr_ipt.eq(1);
				
				/* 剩余天数 */
				var span_residue = $('.residue');
				
				/* 计算函数 */
				var count = function (start,over) {
					days = daysBetween(start.val(),over.val());	//计算相差 天数
				
					var empty_val = function (message) {
						alert(message);
						start.val('');	
						over.val('');	
						ipt_length.val('');
						ipt_length_disabled.val('');
					}
						
					//天数容错处理
					if (days == 0 || days < 0) {
						empty_val('选择的日期出错')
						return false;	
					} else if (days > span_residue.text()){
						empty_val('你剩余的天数不足');
						start.val('');	
						over.val('');	
						ipt_length.val('');
						ipt_length_disabled.val('');
					} else {
						ipt_length.val(days);
						ipt_length_disabled.val(days);
					}
					
				}
				
				var options = {
						//attr 属性 ，更多格式参加书本
					//	altField:'#otherField',			//同步元素日期到其他元素上
						dateFormat:'yy-mm-dd',		//日期格式设置
						minDate: new Date(),		//最小选择日期为今天
						showButtonPanel:true,		//开启今天标示
						changeYear:true,				//显示年份
						changeMonth:true,				//显示月份
						showMonthAfterYear:true,	//互换位置
						
						
						//fn 执行函数
						onSelect : function () {			//选择日期执行函数
						},
						onClose : function () {			//关闭窗口执行函数
							count(start,over);
						},
				};	
				arr_date.datepicker(options);
			})();

        }

    };

}();