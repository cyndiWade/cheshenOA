<?php

/**
 * 获取会员信息模块
 */
class MemberAction extends ApiBaseAction {
	
	/**
	 * 追加使用的数据表对象
	 * @var Array  当访问时，$this->db['Member']->query();
	 */
	protected $add_db = array(
		'Member' => 'Member',
		'Verify'=>'Verify',
	//	'MemberRank' => 'MemberRank',
		'MemberBase' => 'MemberBase',
		'MemberResource' => 'MemberResource',
		'Card' => 'Card'
	);

	/* 需要身份验证的方法名 */
	protected $Verify = array(
		'get_member_info',
	);
	
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		
		//请求参数
		$this->request['account'] = $this->_post('account');								//会员账号
		$this->request['name'] = $this->_post('name');										//会员姓名
		$this->request['sex'] = $this->_post('sex');												//会员性别
		$this->request['identity_number'] = $this->_post('identity_number');		//身份证号码
		$this->request['area'] = $this->_post('area');											//投资区域
		$this->request['member_rank_id'] = $this->_post('member_rank_id');	//申请会员级别
	//	$this->request['card_number'] = $this->_post('card_number');				//会员卡号
		$this->request['date'] = $this->_post('date');											//入会日期
		$this->request['over_date'] = $this->_post('over_date');						//结束日期
		$this->request['source'] =  $this->_post('source');									//来源
		$this->request['source_content'] =  $this->_post('source_content');		//推荐账号
		$this->request['remarks'] =  $this->_post('remarks');								//备注内容
		
//  		$this->request['account'] = 13761951734;								//会员账号
//  		$this->request['name'] = 'wade';
//  		$this->request['sex'] = '男';
//  		$this->request['identity_number'] = '123456789';
// 		$this->request['area'] = '上海';
//  	//	$this->request['member_rank_id'] = 9;									//申请会员级别
//  	//	$this->request['card_number'] = 'aaaaaaa';							//会员卡号
// 		$this->request['date'] = '2013-12-15';										//入会日期
//  		$this->request['over_date'] = '2014-1-16';								//结束日期
//  		$this->request['source'] =  1;													//来源
//  		$this->request['source_content'] =  13761951734;					//推荐账号
//  		$this->request['remarks'] =  'aaaa';								//备注内容
	}
	
	
	/**
	 * 验证会员来源
	 * @param INT $source			来源类型
	 * @param String $source_content		来源内容
	 * @param INT $member_id		用户ID
	 */
	private function check_member_source ($source,$source_content,$member_id) {
		//会员来源数据处理
		$result = array();
		if (array_key_exists($source,$this->source_select) == false) {
			$result['status'] = false;
			$result['info'] = '来源填写错误！';
			return $result;
		}
		if (array_search($this->source_select[2], $this->source_select) == $source) {			//对推荐账号进行查找处理
			$info =  $this->db['Member']->seek_base_info($source_content);		//查找账号所属的会员的ID
			if ($member_id == $info['use_id']) {		//推荐账号是本身时
				$result['status'] = false;
				$result['info'] = '推荐账号不能是您自己的账号';
			} else {
				if (!empty($info)) {
					$result['status'] = true;				//表示找到用户信息
					$result['info'] = $info[0]['id'];
				} else {
					$result['status'] = false;				//表示没有找到用户信息
					$result['info'] = '对不起，系统没有找到推荐的用户账号，或者推荐的账号不是会员。';
				}
			}
			return $result;
		} else {
			return false;	
		}	
		
		
		
	}
	
	
	
	/**
	 * 获取会员详细信息
	 */
	public function get_member_info () {
		
		$MemberBase = $this->db['MemberBase'];		//会员模型表
		$MemberResource = $this->db['MemberResource'];		//资源关系表
		
		//查找会员信息
		$member_base_info = $MemberBase->seek_member_one_data($this->oUser->id);

		//会员登录时
		if ($member_base_info) {
			$resource_detail = $MemberResource->seek_member_resource($member_base_info['member_rank_id'],$this->resource_type[1]);
			$resource_detail = $resource_detail[0];
			$car_number = $resource_detail['car_number'];			//车辆资源总天数
		
			$member_data = array(
					'name'=>$member_base_info['name'],
					'date' =>$member_base_info['date'],
					'area' => $member_base_info['area'],
					'over_date' =>$member_base_info['over_date'],
					'mobile_phone' => $member_base_info['mobile_phone'],
					'identity_number' => $member_base_info['identity_number'],
					'member_rank'	=> $this->member_rank[$member_base_info['member_rank_id']],
					'use_car_number' => $member_base_info['use_car_number'],
					'car_number' => $car_number,
					
			);
			parent::callback(C('STATUS_SUCCESS'),'获取成功',$member_data);
		} else {
			parent::callback(C('STATUS_NOT_DATA'),'会员不存在！');
		}
		
	}
	
	
	
	/**
	 * 会员注册接口
	 */
	public function member_register() {

		if ($this->isPost() == false) {

			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
		import("@.Tool.Validate");		//验证类
		
		$MemberBase = $this->db['MemberBase'];		//会员基本信息表
		$Card = $this->db['Card'];									//会员卡片
		$Member = $this->db['Member'];						//注册账号表
			
		//注册账号
		$account = $this->request['account'];								
		$name = $this->request['name'];		
		$identity_number = $this->request['identity_number'];
		$sex = $this->request['sex'];
		$area = $this->request['area'];
		$source = $this->request['source'];								
		$source_content = $this->request['source_content'];				
	//	$member_rank_id = $this->request['member_rank_id'];
	//	$card_number = $this->request['card_number'];
		$date = $this->request['date'];
		$over_date = $this->request['over_date'];
		$remarks = $this->request['remarks'];
			
		//验证
		if (empty($account)) parent::callback(C('STATUS_OTHER'),'账号不得为空！');
		if (empty($name)) parent::callback(C('STATUS_OTHER'),'姓名不得为空！');
		if (empty($identity_number)) parent::callback(C('STATUS_OTHER'),'身份证不得为空！');
		if (empty($area)) parent::callback(C('STATUS_OTHER'),'区域不得为空！');
		if (empty($source)) parent::callback(C('STATUS_OTHER'),'会员来源不得为空！');
		if (empty($source_content)) parent::callback(C('STATUS_OTHER'),'来源内容不得为空！');
		//if (empty($member_rank_id)) parent::callback(C('STATUS_OTHER'),'会员界别不得为空！');
		if (empty($date)) parent::callback(C('STATUS_OTHER'),'会员开始日期不得为空！');
		if (empty($over_date)) parent::callback(C('STATUS_OTHER'),'会员结束日期不得为空！');
		if (empty($remarks)) parent::callback(C('STATUS_OTHER'),'备注内容不得为空！');
			
		//当注册成为会员时，账号存在是，用原账号，不存在时，为用户创建一个账号
		$is_have = $Member->account_is_have($account);		//查看账号是否存在
		if ($is_have) {		//账号存在时
			$member_id = $is_have;
		} else {		//添加注册用户
			$Member->account = $account;
			$Member->password = md5($account);
			$member_id = $Member->add_account(C('ACCOUNT_TYPE.USER'));		//添加会员账号	
		}
		
		//生成身份秘钥
		$encryption = $member_id.':'.$account.':'.date('Y-m-d');					//生成解密后的数据
		$user_key = passport_encrypt($encryption,C('UNLOCAKING_KEY'));	//生成加密字符串,给客户端
			
		//验证会员，入会与离会日期
		$count_days = Validate::count_days($date,$over_date);
		if ($count_days <= 0) parent::callback(C('STATUS_OTHER'),'会员入会日期不得大于离会日期');
		
		/*
		//会员级别范围验证
		if (!array_key_exists($member_rank_id, $this->member_rank)) {
			parent::callback(C('STATUS_OTHER'),'申请会员级别错误！');
		}
			 
		//验证会员卡是否存在
		if ($member_rank_id == $this->shareholder_id) {	//股东会员处理
			$Card->type = 'G';
		} else {
			$Card->type = 'H';
		}	
		$is_have=$Card->seek_card_one($card_number);
		if ($is_have) parent::callback(C('STATUS_OTHER'),'此会员卡已存在');
		*/
			
		//会员来源为推荐账号时，进行的处理，并且验证来源
		$check_source_result = $this->check_member_source($source,$source_content,$member_id);
		if ($check_source_result != false) {
			if ($check_source_result['status'] == false) {
				parent::callback(C('STATUS_OTHER'),$check_source_result['info']);
			}  
		}

		//会员存在时，进行提醒处理
		if ($MemberBase->get_one_data(array('member_id'=>$member_id),'id') == true) {
			//parent::callback(C('STATUS_HAVE_DATA'),'会员已存在！');
			parent::callback(C('STATUS_HAVE_DATA'),'手机号码已经存在！');
			
		}
		
		/* 写入数据库 */		
		$MemberBase->member_id = $member_id;						//用户ID
		$MemberBase->name = $name;										//股东名称
		$MemberBase->sex = $sex;												//性别
		//$MemberBase->member_rank_id = $member_rank_id;		//会员级别
		$MemberBase->member_rank_id = $this->check_rank_id;		//待审核会员类型
		$MemberBase->source = $source;									//用户来源
		$MemberBase->source_content = $source_content;	//来源内容
		$MemberBase->area = $area;											//投资区域
		$MemberBase->mobile_phone = $account;					//手机号码
		$MemberBase->identity_number = $identity_number;	//身份证号码
		$MemberBase->date = $date;											//入会日期
		$MemberBase->over_date = $over_date;						//离会日期
		$MemberBase->remarks = $remarks;								//离会日期
		$member_base_id = $MemberBase->add();	
		if ($member_base_id) {
				//修改注册账号为会员
			$Member->is_rank = 1;				//账号变成会员
			$Member->update_user_info($member_id);
			parent::callback(C('STATUS_SUCCESS'),'添加成功！',array('user_key'=>$user_key));
		} else {
			parent::callback(C('STATUS_UPDATE_DATA'),'添加失败！');
		}

	}
	
	
	
}
?>