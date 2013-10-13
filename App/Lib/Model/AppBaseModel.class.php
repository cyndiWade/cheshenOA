<?php 

/**
 * 公共---基础模型
 */

class AppBaseModel extends Model {
	

	//删除方法
	public  function del($condition) {
		return $this->where($condition)->data(array('status'=>-2))->save();
	}
	
	
	/**
	 * 格式化日期
	 * @param Array $all			//数组
	 * @param Array $fields			//字段如：array('create_time','update_time');
	 */
	protected function set_all_time(&$all,$fields) {
		if (empty($all)) return false;
		/* 多维数组 */
		if (count($all[0]) >=1)  {
			foreach ($all AS $key=>$val) {
				for ($i=0;$i<count($fields);$i++) {
					$all[$key][$fields[$i]] = date('Y-m-d H:i:s',$all[$key][$fields[$i]]);
				}
			}
		/* 一维数组 */	
		} else {
			for ($i=0;$i<count($fields);$i++) {
				$all[$fields[$i]] = date('Y-m-d H:i:s',$all[$fields[$i]]);
			}
		}	
	}
	
	
	/**
	 * 字符长度限制
	 * @param Array $all			//
	 * @param Array $fields			//字段如：array('create_time','update_time');
	 */
	protected function set_str_len(&$all,$fields,$length) {
		if (empty($all)) return false;
		/* 多维数组 */
		if (count($all[0]) >=1)  {
			foreach ($all AS $key=>$val) {
				for ($i=0;$i<count($fields);$i++) {			
					if (mb_strlen($all[$key][$fields[$i]],'utf-8') >$length) {
						$all[$key][$fields[$i]] = mb_substr($all[$key][$fields[$i]],0,10,'utf-8').'...';
			
					}	
				}
			}
			/* 一维数组 */
		} else {
			for ($i=0;$i<count($fields);$i++) {
				$all[$fields[$i]] = mb_substr($all[$key][$fields[$i]],0,10,'utf-8').'...';
			}
		}
	}
	
	
	
	
}
?>