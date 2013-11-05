<?php
/**
 * 用车申请处理类
 */
class OrderAction extends OrderBaseAction {
	
	/* 资源类型 */
	private $resource_type = array(
		'1' => 1 ,		//表示车辆资源
	//	 '2' => 2,		
	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
	}
	
	private function data_check() {
		import("@.Tool.Validate");							//验证类
		//数据过滤
		if (Validate::checkNull($_POST['cars_id'])) $this->error('车辆资源为空');
		if (Validate::checkNull($_POST['start'])) $this->error('用车开始时间为空');
		
	}
	
	
	
	/* 申请订单列表 */
	public function apply () {
		$Order = D('Order');													//车辆资源表
		$html_list = $Order->seek_user_order();

		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];		//获取订单来源
				$html_list[$key]['order_explain'] = $this->order_state[$val['order_state']]['order_explain'];		//订单状态
				$html_list[$key]['driver'] = $this->driver[$val['driver']]['name'];		//司机
			}
		}
		//dump($html_list);

		$this->assign('ACTION_NAME','用车申请');
		$this->assign('TITILE_NAME','用车申请列表');
		$this->assign('html_list',$html_list);
		$this->assign('order_state',$this->order_state);
		$this->display();
	}
	
	
	/**
	 * 添加用车申请
	 */
	public function edit_apply () {
		$act = $this->_get('act');														//用户动作
		$member_base_id = $this->_get('member_base_id');		//会员基础信息ID
		$id = $this->_get('id');															//订单ID
		if (empty($member_base_id)) $this->error('非法操作！');
		
		$MemberResource = D('MemberResource');			// 会员等级对应可用资源表（会员）
		$MemberBase = D('MemberBase');						//会员基本信息表
		$Cars = D('Cars');													//车辆资源表
		$Order = D('Order');												//订单模型表
		
		/* 通过会员ID，找到会员对应的会员信息，以及会员级别 */
		$member_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$member_base_id),'member_rank_id,use_car_number,name,over_date');
		if (empty($member_info)) $this->error('此会员不存在！');
		
		$member_rank_id = $member_info['member_rank_id'];			//会员级别ID
		$use_car_number = $member_info['use_car_number'];			//会员已使用天数
		$member_name = $member_info['name'];								//会员姓名
		$over_date  = $member_info['over_date'];								//会员到期日期
		

		switch ($act) {
			case  'add':
				/* 保存提交订单 */
				if ($this->isPost()) {
					$this->data_check();
		
					if(Validate::check_date_differ($this->_post('start'),$over_date)) {
						$this->error('用车日期不得大于会员的截止日期');
					}
					//创建订单号
					$create_order =  parent::create_order_num('N');
					if ($create_order['status'] == false) $this->error($create_order['info']);
					$order_num = $create_order['info'];
					//订单信息写入数据
					$Order->create();
					$Order->order_num = $order_num;
					$Order->member_base_id = $member_base_id;
					$Order->order_state	= $this->order_state[0]['order_status'];	//申请订单
					$order_id = $Order->add_order_data ();
					if ($order_id) {
						parent::order_history($order_id,'提交申请订单');
						$this->success('生成订单成功！');
					} else {
						$this->error('申请失败，请重新尝试！');
					}
					exit;
				}
				break;
		
			case 'update' :
				if ($this->isPost()) {
					$this->data_check();
					if(Validate::check_date_differ($this->_post('start'),$over_date)) {
						$this->error('用车日期不得大于会员的截止日期');
					}
					
					exit;
					$Order->create();
					if ($Order->save_one_data(array('id'=>$id))) {
						parent::order_history($id,'修改订单');
						$this->success('修改成功！');
					} else {
						$this->error('没有做出修改');
					}
					
					exit;
				}
				//获取修改数据
				$html_info = $Order->get_one_data(array('id'=>$id,'status'=>0));
				if (empty($html_info)) $this->error('此订单不存在');
		
				$this->assign('html_info',$html_info);
				break;
		
			case 'delete':
			//	$Cars->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;
		
			default:
				$this->error('非法操作！');
		}
		
		
		/* 按照会员级别，获取会员享有资源类型(如车辆资源) */
		$resource_detail = $MemberResource->seek_member_resource($member_rank_id,$this->resource_type[1]);
		$resource_detail = $resource_detail[0];

		$html_radio = '';		//可用车辆资源的HTML
				
		if ($resource_detail) {
			$cars_grade_id = $resource_detail['id'];					//车辆资源级别ID
			$car_number = $resource_detail['car_number'];		//车辆资源可使用天数
			$company_id = 1;														//车辆所属区域，目前业务暂时只在深圳
			
			/* 获取当前类型下，会员可享受的车辆资源列表 */
			$cars_list = $Cars->seek_cars_list($cars_grade_id,$company_id);	
			
			if ($cars_list) {
				foreach ($cars_list AS $key=>$val) {
					$cars_list[$key]['car_status_name']  = $this->car_status[$val['car_status']];
					/* 对不能使用的车辆静止选择 */
					if (in_array($val['car_status'],$this->cars_disabled)) $disabled = 'disabled="disabled"';
					$html_radio .= '
					<label class="radio line">
					<input type="radio" name="cars_id" value="'.$val['id'].'" '.$disabled.'/>
					'.$val['brand'].' ->状态：('.$this->car_status[$val['car_status']].') ->车辆类型：('.$val['type'].') ->车辆颜色('.$val['color'].')
					</label>';
					$disabled = NULL;
				}
				
			} else {
				$html_radio = '暂无可用车辆资源';
			}
			
		} else {
			$html_radio = '此级别的会员没有可分配的车辆资源';
		}
		
		/* 计算过会员使用天数信息 */
		$count_day['sum'] = $car_number;	//总天数
		$count_day['use'] = $use_car_number;		//已使用
		$count_day['residue'] = $count_day['sum'] - $count_day['use']; 	//剩余天数
		
		$this->assign('ACTION_NAME','订单处理');
		$this->assign('TITILE_NAME',$member_name.'--订单处理');
		$this->assign('html_radio',$html_radio);
		$this->assign('count_day',$count_day);
		$this->assign('over_date',$over_date);
		$this->assign('select_driver',$this->driver);
		$this->display();
	}
	
	
	/**
	 * 修改订单状态
	 */
	public function set_order_state () {
		$id = $this->_get('id');
		$order_state = $this->_get('order_state');	//订单状态
		$Order = D('Order');												//订单模型表;
		
		if ($Order->where(array('id'=>$id))->data(array('order_state'=>$order_state))->save()) {
			parent::order_history($id,'提交派车申请');		
			$this->success('成功！');
		} else {
			$this->error('失败！');
		}
	}
	
	
	/**
	 * 车辆调度处理
	 */
	public function cars_arrange_list () {
		$Order = D('Order');													//车辆资源表
		
		/* 获取对应订单状态 */
		$map['o.order_state']  = array('in',
			array(
					$this->order_state[1]['order_status'],	//派车申请
					$this->order_state[2]['order_status'],	//派车申请通过
					$this->order_state[3]['order_status'],	//派车申请拒绝
			)
		);
		$html_list = $Order->seek_user_order($map);
		
		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];
				$html_list[$key]['order_explain'] = $this->order_state[$val['order_state']]['order_explain'];		//订单状态
				$html_list[$key]['driver'] = $this->driver[$val['driver']]['name'];		//司机
			}
		}
		
		$this->assign('ACTION_NAME','派车申请');
		$this->assign('TITILE_NAME','派车申请列表');
		$this->assign('html_list',$html_list);
		$this->assign('order_state',$this->order_state);
		$this->display();
	}
	
	
	/**
	 * 派车处理
	 */
	public function cars_arrange_edit () {
		$Order = D('Order');													//订单表
		$MemberBase = D('MemberBase');							//会员基本信息表
		$id = $this->_get('id');												//订单ID
				

		if ($this->isPost()) {
			$Order->create();
			$save_status = $Order->where(array('id'=>$id))->save();		//修改订单状态
			if ($save_status) {
				$state_content =  $this->order_state[$_POST['order_state']]['order_explain'];		//操作状态
				parent::order_history($id,$state_content);
				$this->success('提交成功,请填写短息内容',U('Admin/Order/order_send_msg',array('id'=>$id)));
			} else {
				$this->error('提交失败,请重新尝试');
			}
			exit;
		}
		
		//获取订单数据
		$html_info = $Order->get_one_data(array('id'=>$id,'status'=>0));
		if (empty($html_info)) $this->error('此订单不存在');
		$html_info['driver'] = $this->driver[$html_info['driver']]['name'] ;
		$mobile_phone = $MemberBase->get_one_data(array('id'=>$html_info['member_base_id']),'mobile_phone');
		$html_info['mobile_phone'] = $mobile_phone['mobile_phone'];

		
		$this->assign('ACTION_NAME','派车申请');
		$this->assign('TITILE_NAME','派车申请列表');
		$this->assign('html_info',$html_info);
		$this->assign('order_state',$this->order_state);
		$this->display();
	}
	
	
	/**
	 * 还车管理列表
	 */
	public function give_back_car_list () {
		$Order = D('Order');													//车辆资源表
		
		/* 获取对应订单状态 */
		$map['o.order_state']  = array(
				$this->order_state[2]['order_status'],	//派车申请通过
		);

		$html_list = $Order->seek_user_order($map);

		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];
				/* 订单状态状态说明 */
				$html_list[$key]['order_state_explain'] = $this->order_state[$val['order_state']]['order_explain'];
				/* 车辆归还状态说明 */
				$html_list[$key]['give_back_state_explain'] = $this->give_back_state[$val['give_back_state']]['status_explain'];
				$html_list[$key]['driver'] = $this->driver[$val['driver']]['name'];		//司机
			}
		}
		
		//dump($html_list);

		
		$this->assign('ACTION_NAME','还车管理');
		$this->assign('TITILE_NAME','还车信息列表');
		$this->assign('html_list',$html_list);
		$this->assign('give_back_state',$this->give_back_state);
		$this->display();

	}
	
	
	/**
	 * 编辑还车信息
	 */
	public function give_back_car_edit () {
		$Order = D('Order');													//订单表
		$MemberBase = D('MemberBase');							//会员基本信息表
		$id = $this->_get('id');												//订单ID
				

		if ($this->isPost()) {
			$Order->create();
			$save_status = $Order->where(array('id'=>$id))->save();		//修改订单状态
			if ($save_status) {
				$state_content =  $this->order_state[$_POST['order_state']]['order_explain'];		//操作状态
				parent::order_history($id,$state_content);
				$this->success('提交成功,请填写短息内容',U('Admin/Order/order_send_msg',array('id'=>$id)));
			} else {
				$this->error('提交失败,请重新尝试');
			}
			exit;
		}
		
		//获取订单数据
		$html_info = $Order->get_one_data(array('id'=>$id,'status'=>0));
		if (empty($html_info)) $this->error('此订单不存在');
		$mobile_phone = $MemberBase->get_one_data(array('id'=>$html_info['member_base_id']),'mobile_phone');
		$html_info['mobile_phone'] = $mobile_phone['mobile_phone'];

		
		$this->assign('ACTION_NAME','还车信息');
		$this->assign('TITILE_NAME','还车信息填写');
		$this->assign('html_info',$html_info);
		$this->assign('order_state',$this->order_state);
		$this->display();
	}
	
	
	/**
	 * 发送短信
	 */
	public function order_send_msg () {
		$Order = D('Order');													//车辆资源表
		$MemberBase = D('MemberBase');							//会员基本信息表
		$id = $this->_get('id');												//订单ID
		
		if ($this->isPost()) {
			$mobile_phone = $_POST['mobile_phone'];		//发送手机号码
			$mobile_phone_message = $_POST['mobile_phone_message'];		//发送内容
			//$state_content =  $this->order_state[$_POST['order_state']]['order_explain'];		//操作状态
				
			$send_result = parent::send_shp($mobile_phone, $mobile_phone_message);	//短信发送结果
			if ($send_result['status'] == true) {
				parent::order_history($id,'发送短信，状态为：成功。内容为'. $mobile_phone_message);
				$this->success('短信发送成功！',U('Admin/Order/cars_arrange_list'));
			} else {
				parent::order_history($id,'发送短信，状态为：失败。');
				$this->error('短信发送失败！');
			}
			exit;
		}
		
		/* 获取订单状态 */
		$html_info = $Order->get_one_data(array('id'=>$id,'status'=>0));

		if (empty($html_info)) $this->error('此订单不存在');
		$mobile_phone = $MemberBase->get_one_data(array('id'=>$html_info['member_base_id'],'status'=>0),'mobile_phone');
		$html_info['mobile_phone'] = $mobile_phone['mobile_phone'];
		
		$this->assign('ACTION_NAME','发送短信');
		$this->assign('TITILE_NAME','订单号：'.$html_info['order_num']);
		$this->assign('html_info',$html_info);
		$this->display();
		
	}
	
	
	/**
	 * 订单历史列表
	 */
	public function order_history_list () {
		$order_id = $this->_get('order_id');
		$html_list = D('OrderHistory')->get_order_history($order_id);

		$this->assign('html_list',$html_list);	
		$this->assign('ACTION_NAME','操作历史');
		$this->assign('TITILE_NAME','操作历史列表');
		$this->display();
	}
	
	
	
}