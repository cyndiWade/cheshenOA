<?php
/**
 * 车神会员模块
 */
class RankAction extends AdminBaseAction {
	
	private $MODULE = '会员管理';
	
	/* 会员级别ID */
	private $member_rank_id;
	
	/* 会员类型 */
	private $member_rank = array();
	
	/* 会员类型说明(俱乐部) */
	private $member_content = array();
	
	
	/* 会员来源 */
	private $source_select = array(
			1 => '文华（期）',
			2 => '推荐（推荐方账号）',
			3 => '自主报名（信息来源）',
	);
	
	/* 当前会员级别说明 */
	private $member_rank_name;	
	
	
	/* 会员证件照类型 */
	private $member_photo = array(
		1 => '个人生活照及艺术照'	,
		2 => '身份证正反复印件'	,
		3 => '护照复印件'	,
		4 => '驾驶证复印件'	,
		5 => '行车本复印件'	,
		6 => '信用卡复印件'	,		
	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);

		$this->member_rank_id = $this->_get('member_rank_id');	//初始化会员级别ID
		
	}
	
	
	/* 初始化与验证会员信息 */
	private function check_rank() {
		
		/* 组合会员类型 */
		$MemberRankInfo =  D('MemberRank')->seek_all_data(); 	//获取所有会员级别信息
		foreach ($MemberRankInfo AS $key=>$val) {
			$this->member_rank[$val['id']] = $val['name'];
			if ($val['is_start'] == 0) $this->member_content[$val['identifying']] = $val['content'];
		}

		/* 全局保持会员属性 */
		$this->member_rank_name = $this->member_rank[$this->member_rank_id];		//会员名称
		if (empty($this->member_rank_name)) $this->error('此类型的会员不存在！');
		
		$this->assign('member_rank_id',$this->member_rank_id);
	}
	

	/* AJAX查询用户数据 */
	public function ajax_search_account () {
	
		if ($this->isPost()) {
			$Member = D('Member');
			$account = $this->_post('account');
			
			/* 组合查询条件 */
			$map['account'] =  array('like',"%$account%");
			$map['status'] = 0;
			$result = $Member->get_spe_data($map,'id,account,nickname');
	
			empty($result) ? parent::callback(C('STATUS_NOT_DATA'),'没有数据') : parent::callback(C('STATUS_SUCCESS'),'获取成功',$result);
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}

	
	/**
	 * 会员列表
	 */
	public function rank_list () {
		$this->check_rank();					//验证会员等级信息
		
		$MemberBase = D('MemberBase');	//会员基本信息表

		/* 获取相应会员数据 */
		$member_base_list = $MemberBase->seek_rank_data($this->member_rank_id);
		if ($member_base_list) {
			foreach ($member_base_list AS $key=>$val) {
				$member_base_list[$key]['rank_name'] = $this->member_rank[$val['member_rank_id']];		//会员类型
			}
		}

		/**
		 * CN 0755 2013 B H 100001		会员
		 * CN 0755 2013 D H 123456
		 * CN 0755 20130716 B G 0001 - 900001
		 * 
		 */
		$this->assign('ACTION_NAME','会员列表');
		$this->assign('member_rank_name',$this->member_rank_name);				//会员等级名称
		$this->assign('member_base_list',$member_base_list);
		$this->display();
	}
	
	
	/**
	 * 添加指定级别的会员
	 */
	public function member_base_add () {

		$this->check_rank();											//验证会员等级信息
		
		
		if ($this->isPost()) {
			
			$Card = D('Card');			//会员卡片
			/* 验证会员卡是否存在 */
			
			if ($this->member_rank_id == 9) {	//股东会员处理
				$card_number = $this->_post('card_number');
				$Card->type = 'G';
			} else {
				$card_number = implode('',$_POST['card_number']).$_POST['card_number_over'];
				$Card->type = $_POST['card_number']['type'];
			}
			
			$is_have=$Card->seek_card_one($card_number);
			if ($is_have) $this->error('此会员卡已存在！');
			
			$MemberBase = D('MemberBase');			//会员基本信息表
			$MemberBase->create();
			$MemberBase->property = implode(',',$MemberBase->property);
			$member_base_id = $MemberBase->add();
			
			if ($member_base_id) {
				$Card->member_base_id = $member_base_id;
				$Card->card_number = $card_number;	
				$Card->add();
				 $this->success('添加成功！') ;
			} else {
				$this->error('添加失败！');
			}
			
			exit;
		}

		/* 区别会员类型 */
		$this->assign('ACTION_NAME','添加基本信息');
		$this->assign('TITILE_NAME','添加'.$this->member_rank_name.'基本信息');
		$this->assign('rank_select',$this->member_rank);						//会员等级列表
		$this->assign('source_select',$this->source_select);		//会员来源列表
		$this->assign('rank_content_select',$this->member_content);		//会员类型级别说明
		$this->display('member_base_add');
		
		/**
		if ($rank_type == $this->rank_type['member']) {		//普通会员
			$this->assign('ACTION_NAME','添加会员基本信息');
			$this->assign('TITILE_NAME','添加会员基本信息');
			$this->display('member_base_add');
		} elseif ($rank_type == $this->rank_type['shareholder']) {		//股东会员
			$this->assign('ACTION_NAME','添加股东会员基本信息');
			$this->assign('TITILE_NAME','添加股东会员基本信息');
			$this->display('member_base_add_shareholder');
		}	
		*/
	}

	
	/**
	 * 会员基本信息编辑
	 */
	public function member_base_edit () {
		$id = $this->_get('id');								//基本信息id
		$rank_type = $this->_get('rank_type');		//会员类型	
		$this->check_rank();
		
		$MemberBase = D('MemberBase');			//会员基本信息表
		$Member = D('Member');							//账户信息表
		$Card = D('Card');										//会员卡片
		
		if ($this->isPost()) {
			
			$Card->where(array('member_base_id'=>$id))->data(array('card_number',$_POST['card_number']))->save();
			$MemberBase->create();
			$MemberBase->property = implode(',',$MemberBase->property);
			$MemberBase->save_one_data(array('id'=>$id)) ? $this->success('更新成功！') : $this->error('没有数据被修改！');
			exit;
		}
			
		/* 获取基本数据 */
		$base_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$id));
		if (empty($base_info)) $this->error('此会员不存在！');

		/* 获取用户账号数据 */
		$base_info['member_info'] = $Member->get_one_data(array('id'=>$base_info['member_id']),'account,nickname');

		/* 获取会员卡号 */
		$card_number = $Card->get_one_data(array('member_base_id'=>$base_info['id']),'card_number');
		$base_info['card_number'] = $card_number['card_number'];


		/* 区别会员类型 */
		$this->assign('ACTION_NAME','编辑基本信息');
		$this->assign('TITILE_NAME','编辑'.$this->member_rank_name.'信息');
		
		$this->assign('member_rank_id',$base_info['member_rank_id']);				//当前数据会员等级
		$this->assign('source_select',$this->source_select);
		$this->assign('rank_select',$this->member_rank);						//会员等级列表
		$this->assign('rank_content_select',$this->member_content);		//会员类型级别说明	
		$this->assign('base_info',$base_info);
		$this->display('member_base_edit');
		
		/**
		if ($rank_type == $this->rank_type['member']) {				//普通会员
			$this->assign('ACTION_NAME','编辑会员基本信息');
			$this->assign('TITILE_NAME','编辑会员基本信息');
			$this->display('member_base_edit');
		} elseif ($rank_type == $this->rank_type['shareholder']) {		//股东会员
			$this->assign('ACTION_NAME','编辑股东基本信息');
			$this->assign('TITILE_NAME','编辑股东基本信息');
			$this->display('member_base_edit_shareholder');
		}
		**/
	}
	
	
	
	/**
	 * 会员信用信息
	 */
	public function member_credit () {
		$member_base_id = $this->_get('member_base_id');		//基本信息ID
		if(empty($member_base_id)) $this->error('非法操作！');
		
		$this->check_rank();					//验证会员级别
		
		$MemberCredit = D('MemberCredit');		//会员信息表
		
		if ($this->isPost()) {
			$id = $this->_post('id');		
			$MemberCredit->create();
			$MemberCredit->member_base_id = $member_base_id;
			$MemberCredit->car = JSON($this->_post('car'));
			$MemberCredit->house = JSON($this->_post('house'));
			if (empty($id)) {
				$MemberCredit->add() ? $this->success('添加成功！') : $this->error('添加失败,请重新尝试！');
			} else {
				$MemberCredit->save() ? $this->success('修改成功！') : $this->error('没有数据被修改！');
			}
			exit;
		}
		
		/* 获取数据信息 */
		$credit_info = $MemberCredit->seek_one_data(array('member_base_id'=>$member_base_id));
		
		$this->assign('credit_info',$credit_info);
		$this->assign('ACTION_NAME','信用信息');
		$this->assign('TITILE_NAME','信用信息');
		$this->display();
	}
	
	
	/**
	 * 会员生活信息
	 */
	public function member_life () {
		$member_base_id = $this->_get('member_base_id');		//基本信息ID
		if(empty($member_base_id)) $this->error('非法操作！');
		
		$this->check_rank();					//验证会员级别
		
		$MemberLife = D('MemberLife');		//会员生活表信息
		
		if ($this->isPost()) {
			$id = $this->_post('id');		
			
			$MemberLife->create();
			$MemberLife->member_base_id = $member_base_id;
			$MemberLife->taste = JSON($this->_post('taste'));
			if (empty($id)) {
				$MemberLife->add() ? $this->success('添加成功！') : $this->error('添加失败,请重新尝试！');
			} else {
				$MemberLife->save() ? $this->success('修改成功！') : $this->error('没有数据被修改！');
			}
			exit;
		}
		
		/* 获取数据信息 */
		$life_info = $MemberLife->seek_one_data(array('member_base_id'=>$member_base_id));
		$life_info['taste_select'] = implode(',',(array) $life_info['taste']);		//组合字符串
		
		$this->assign('life_info',$life_info);
		$this->assign('ACTION_NAME','生活信息');
		$this->assign('TITILE_NAME','生活信息');
		$this->display();
	}
	
	
	/**
	 * 会员证件整照片
	 */
	public function member_photo () {
		$member_base_id = $this->_get('member_base_id');		//基本信息ID
		if(empty($member_base_id)) $this->error('非法操作！');	
		$this->check_rank();					//验证会员级别
		
		$MemberPhoto = D('MemberPhoto');
		$photo_list = $MemberPhoto->get_spe_data(array('status'=>0,'member_base_id'=>$member_base_id));
		if (!empty($photo_list)) {
			parent::public_file_dir($photo_list, array('url'), 'images/');		//组合访问地址
			$photo_type_list = regroupKey($photo_list,'type');						//按照图片类似分类
		}

		$this->assign('ACTION_NAME','证件照片');
		$this->assign('TITILE_NAME','证件照片');
		$this->assign('member_base_id',$member_base_id);
		$this->assign('member_photo_select',$this->member_photo);
		$this->assign('photo_type_list',$photo_type_list);
		$this->display();
	}
	
	
	/**
	 * AJAX处理上传会员照片
	 */
	public function ajax_photo_upload() {
		header('Content-Type:text/html;charset=utf-8');
		
		if ($this->isPost()) {
			/* 上传文件目录 */
			$upload_dir = C('UPLOAD_DIR');
			$dir = $upload_dir['web_dir'].$upload_dir['image'];
			
			/* 执行上传 */
			$file = $_FILES['member_photo'];			//上传的文件
			$member_base_id = $this->_post('member_base_id');	//会员基本信息ID
			$type = $this->_post('type');					//图片类型
			
			/* 参数验证 */
			if (empty($member_base_id) || empty($type)) parent::callback(C('STATUS_DATA_LOST'),'参数错误！');
			
			/* 执行上传 */
			$result = parent::upload_file($file, $dir,5120000);		
			
			/* 上传结果处理 */
			if ($result['status'] == true) {
				$MemberPhoto = D('MemberPhoto');
				$MemberPhoto->member_base_id = $member_base_id;
				$MemberPhoto->type = $type;
				$MemberPhoto->url = $result['info'][0]['savename'];
				$status = $MemberPhoto->add();		//写入数据库
				
				if ($status) {
					$return['success'] = true;
					$return['info'] = '保存成功';
					echo json_encode($return);
				} else {
					$return['success'] = false;
					$return['info'] = '保存失败';
					echo json_encode($return);
				}
			} else {
				$return['success'] = false;
				$return['info'] = '上传失败';
				echo json_encode($return);
			}
			
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}

	}
	
	
	/**
	 * AJAX会员删除图片
	 */
	public function ajax_photo_remove () {
		if ($this->isPost()) {
			$id = $this->_post('id');
			$MemberPhoto = D('MemberPhoto');
			$MemberPhoto->del(array('id'=>$id)) ? parent::callback(C('STATUS_SUCCESS'),'删除成功') : parent::callback(C('STATUS_UPDATE_DATA'),'删除失败') ; 
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}
	
}