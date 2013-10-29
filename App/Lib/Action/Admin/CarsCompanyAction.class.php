<?php
/**
 * 分公司区域车辆管理
 */
class CarsCompanyAction extends CarsBaseAction {
	
	private $MODULE = '车辆管理';

	
	/* 照片类型 */
	private $cars_photo = array(
			1 => '车辆照片',
			2 => '行驶证照片'	,
	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);

	}
	

	/**
	 * 车辆管理首页
	 */
	public function car_index() {
		/* 初始化数据 */
		$company_id =  $this->_get('company_id');			//区域id
		if (empty($company_id)) $company_id = $this->oUser->company_id;	//获取当前用户所属的区域ID
		
		/* 验证 */
		parent::check_company($company_id);									//验证区域数据
		parent::check_rbac($company_id,'CarsAll','index');					//验证权限
		
		$Cars = D('Cars');		//车辆数据表
		$html_list = $Cars->seek_car_info($company_id);

		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['car_status'] = $this->car_status[$val['car_status']];
			}
		}
		
		$this->assign('ACTION_NAME','车辆信息列表');
		$this->assign('TITILE_NAME',$this->company_name.'--车辆信息列表');
		$this->assign('company_id',$company_id);
		$this->assign('html_list',$html_list);
		$this->display();
	}
	
	/**
	 * 车辆管理列表
	 */
	public function car_info() {
		/* 初始化数据 */
		$company_id = $this->_get('company_id');	//区域id
		$act = $this->_get('act');								//操作动作
		$id = $this->_get('id');									//id
		
		/* 验证 */
		parent::check_company($company_id);									//验证区域数据
		parent::check_rbac($company_id,'CarsAll','index');					//验证权限
		
		$Cars = D('Cars');		//车辆数据表

		switch ($act) {
			case  'add':
				if ($this->isPost()) {
					$Cars->create();
					$Cars->company_id = $company_id;
					$Cars->add() ? $this->success('添加成功！') : $this->error('添加失败，请重新尝试！');
					exit;
				}
				break;
				
			case 'update' :
				if ($this->isPost()) {		
					$Cars->create();
					$Cars->save_one_data(array('id'=>$id)) ? $this->success('修改成功！') : $this->error('没有做出修改');
					exit;
				}
				//获取修改数据
				$html_info = $Cars->get_one_data(array('id'=>$id,'status'=>0));
				if (empty($html_info)) $this->error('此车辆不存在');

				$this->assign('html_info',$html_info);
				break;

			case 'delete':
				$Cars->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;

			default:
				$this->error('非法操作！');
		}
		
		$this->assign('ACTION_NAME','编辑车辆数据');
		$this->assign('TITILE_NAME','编辑'.$this->company_name.'--车辆数据');
		$this->assign('company_id',$company_id);
		$this->assign('car_grade_select',$this->car_grade);
		$this->assign('car_status_select',$this->car_status);
		$this->display();
	}
	
	
	/**
	 * 车辆照片管理
	 */
	public function cars_photo () {
		/* 初始化数据 */
		$company_id = $this->_get('company_id');	//区域id
		$cars_id = $this->_get('cars_id');									//id
		if(empty($cars_id)) $this->error('车辆不存在');
		
		/* 验证 */
		parent::check_company($company_id);									//验证区域数据
		parent::check_rbac($company_id,'CarsAll','index');					//验证权限
		
		$CarsPhoto = D('CarsPhoto');
		
		$photo_list = $CarsPhoto->get_spe_data(array('status'=>0,'cars_id'=>$cars_id));
		if (!empty($photo_list)) {
			parent::public_file_dir($photo_list, array('url'), 'images/');		//组合访问地址
			$photo_type_list = regroupKey($photo_list,'type');						//按照图片类似分类
		}

		$this->assign('ACTION_NAME','车辆照片');
		$this->assign('TITILE_NAME','车辆照片');
		$this->assign('company_id',$company_id);
		$this->assign('cars_id',$cars_id);
		$this->assign('photo_select',$this->cars_photo);
		$this->assign('photo_type_list',$photo_type_list);
		$this->display();
	}
	
	/**
	 * AJAX处理上传车辆图片
	 */
	public function ajax_photo_upload() {
		header('Content-Type:text/html;charset=utf-8');
	
		if ($this->isPost()) {
			/* 上传文件目录 */
			$upload_dir = C('UPLOAD_DIR');
			$dir = $upload_dir['web_dir'].$upload_dir['image'];
				
			/* 执行上传 */
			$file = $_FILES['photo_files'];					//上传的文件
			$cars_id = $this->_post('cars_id');				//车辆ID
			$type = $this->_post('type');						//图片类型

			/* 参数验证 */
			if (empty($cars_id) || empty($type)) parent::callback(C('STATUS_DATA_LOST'),'参数错误！');
			
			/* 执行上传 */
			$result = parent::upload_file($file, $dir,5120000);		
				
			/* 上传结果处理 */
			if ($result['status'] == true) {
				$CarsPhoto = D('CarsPhoto');
				$CarsPhoto->cars_id = $cars_id;
				$CarsPhoto->type = $type;
				$CarsPhoto->url = $result['info'][0]['savename'];
				$status = $CarsPhoto->add();		//写入数据库
	
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
	 * AJAX车辆删除图片
	 */
	public function ajax_photo_remove () {
		if ($this->isPost()) {
			$id = $this->_post('id');
			$CarsPhoto = D('CarsPhoto');
			$CarsPhoto->del(array('id'=>$id)) ? parent::callback(C('STATUS_SUCCESS'),'删除成功') : parent::callback(C('STATUS_UPDATE_DATA'),'删除失败') ;
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}
	
	
}