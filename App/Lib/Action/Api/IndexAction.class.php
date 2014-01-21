<?php
// API主页
class IndexAction extends ApiBaseAction {
    

	//获取首页信息
	public function index(){
		$Index = D('Index');
		$File = D('File');
		$pics = $Index->field('pics')->order('id DESC')->limit('1')->find();
		$all_pics = $File->get_store_pic($pics['pics']);
		parent::public_file_dir ($all_pics,'file_address','images/');
		parent::callback(C('STATUS_SUCCESS'),'获取成功',$all_pics);
		
    }
    

    
	public function get_ip () {
		echo get_client_ip();
	}
	
	
    
}