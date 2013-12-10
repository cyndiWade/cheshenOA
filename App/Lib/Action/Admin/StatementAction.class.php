<?php
/**
 * 报表功能
 */
class StatementAction extends AdminBaseAction {
    
	private $MODULE = '报表管理';
	
	//初始化数据库连接
	protected  $db = array(
		'MemberBase' => 'MemberBase',
		'Cars' => 'Cars',
		'MemberRank' => 'MemberRank',
		'CarsGrade' => 'CarsGrade',
		'Company' => 'Company'	
	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);
		
	}
	
	/**
	 * 生成报表
	 * @param String $name			//文件名
	 * @param String $content		//内容
	 */
	private function set_excel($name,$content) {
		header('Content-Type:text/html;charset=utf-8');
		header("Content-Type: application/force-download");
		header("Content-Type: text/csv");					//CSV文件
		header("Content-Disposition: attachment; filename=$name.csv");					//强制跳出下载对话框
		header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
		header('Expires:0');
		header('Pragma:public');

		echo $content;
		exit;
	}
	
	
	
	//会员数据报表
	public function member() {
		header('Content-Type:text/html;charset=utf-8');
		
// 		$sql = "SELECT 
//  	column_name AS `列名`, 
//  	data_type   AS `数据类型`, 
//  character_maximum_length  AS `字符长度`,
//  numeric_precision AS `数字长度`,
//  numeric_scale AS `小数位数`,
//  is_nullable AS `是否允许非空`, 
//  CASE WHEN extra = 'auto_increment' 
//    THEN 1 ELSE 0 END AS `是否自增`,
//  column_default  AS  `默认值`, 
//  column_comment  AS  `备注`
// FROM
//  Information_schema.columns
// WHERE
//   table_Name='app_member_base';";
// 		$tmp_bak = $this->db['MemberBase']->query($sql);
// 	//	dump($tmp_bak);
// 		foreach ($tmp_bak AS $val) {
// 			dump($val['备注']);
// 		}


		$MemberRankInfo =  $this->db['MemberRank']->seek_all_data(); 	//获取所有会员级别信息
		$data = $this->db['MemberBase']->seek_all_data();						//获取所有会员数据
		$obj_rank = A('Admin/Rank');
		$source = $obj_rank->source_select;											//会员来源											
		$not_field = array('member_id','status');										//不需要输出给报表的字段
		
		//重新组合会员级别数据
		foreach ($MemberRankInfo AS $key=>$val) {
			$Member[$val['id']] = $val['name'];
		}
		
		//报列标题
		$title .= '编号,会员级别,区域,来源,来源备注,姓名,性别,手机号码,电话号码,传真号码,QQ号码,证件号码,护照号码,驾驶证,行驶证号码,驾龄,电子邮箱地址,企业名称,性质,注册资金,法人,会员组成员,近3年营业额,企业网站,通讯地址,企业所处行业位置,个人介绍及社会身份,企业主要合作方,主要经营产品,产品产地分布,市场占有率,业务发展规划,紧急联系人,关系,手机号码,入会日期,会员结束日期,会员期间内使用车辆天数,会员卡号'."\n";

		if (!empty($data)) {
			foreach ($data as $key=>$val) {	
				$data[$key]['member_rank_id'] =  $Member[$val['member_rank_id']];		//会员级别
				$data[$key]['source'] =  $source[$val['source']];		//来源说明
				$data[$key]['property'] =  preg_replace("/,/", "|",$val['property']);
				
				foreach ($data[$key] as $k=>$v) {
					if (in_array($k,$not_field)) continue;
					//$str .= (iconv( "UTF-8","gbk",$val['oid'])).',';
					$str .= $v.',';
				}
				$str .= "\n";
			}

		}

		$this->set_excel('会员报表',$title.$str);
    }

    
   //车辆数据表报表
   public function cars() {
  	 	header('Content-Type:text/html;charset=utf-8');
   		
   		$Company_list = $this->db['Company']->company_region_view();		//车辆所属区域
	   	$Cars_Grade_Info = $this->db['CarsGrade']->seek_all_data(); 			//获取车辆级别数据
	   	$Cars_Data = $this->db['Cars']->seek_all_data();								//获取所有车辆数据
	   	$not_field = array('car_status','status');												//不需要输出给报表的字段

	   	foreach ($Company_list AS $key=>$val) {
	   		$Company[$val['id']] = $val['name'];
	   	}
	   	
	   	foreach ($Cars_Grade_Info AS $key=>$val) {
	   		$Cars_Grade[$val['id']] = $val['name'];
	   	}

	   	//报列标题
	   	$title .= '车辆ID,车辆所属区域,车辆级别,车辆品牌,车牌号码,车辆类型,车辆型号,车辆颜色,耗油量,车辆主人,购买日期,购买单位,购买价格,初始公里数,所属部门(与系统部门无关系),发动机型号,车架号,座位数,备注'."\n";

		if (!empty($Cars_Data)) {
			
			foreach ($Cars_Data as $key=>$val) {
				$Cars_Data[$key]['company_id'] =  $Company[$val['company_id']];		//公司区域
				$Cars_Data[$key]['cars_grade_id'] =  $Cars_Grade[$val['cars_grade_id']];		//车辆级别

				foreach ($Cars_Data[$key] as $k=>$v) {
					if (in_array($k,$not_field)) continue;
					//$str .= (iconv( "UTF-8","gbk",$val['oid'])).',';
					$str .= $v.',';
				}
				$str .= "\n";
			}
				
		}
   	
		$this->set_excel('车辆报表',$title.$str);
   }

	
   
   
    
}