<?php

/**
 * 车辆日程安排表
 */

class CarsScheduleModel extends ApiBaseModel {
	

	/**
	 * 添加一条日程记录
	 */
	public function add_one_schedule () {
		$this->start_schedule_time = strtotime($this->start_schedule_time);
		$this->over_schedule_time = strtotime($this->over_schedule_time);
		$this->time = time();
		return $this->add();
	}
	
	
	/* 获取指定记录 */
	public function Seek_All_Schedule ($cars_id) {
		$data =  $this->field('id,cars_id,title,start_schedule_time,over_schedule_time')->where(array('cars_id'=>$cars_id,'status'=>0))->order('id ASC')->select();
		parent::set_all_time($data, array('start_schedule_time','over_schedule_time'),'Y-m-d H:i');
		return $data;
	}
	
	
	
	/* 获取用车开始日期后的所有日程信息 */
	public function Seek_Usable_Cars($cars_ids,$start_schedule_time,$over_schedule_time) {
		
		$conditions['status'] = 0;
		$conditions['cars_id'] = array('in',$cars_ids);
		$conditions['over_schedule_time'] = array('egt',$start_schedule_time);		
		
		//获取订车日期开始时间之后所以的日程安排
		$schedule_list = $this->field('id,cars_id,title,start_schedule_time,over_schedule_time')
		->where($conditions)
		->order('cars_id ASC')
		->select();

		/**
		 * 获取订车日期开始时间之后所以的日程安排
		$data1 = $this->query("
				SELECT
						`id`,`cars_id`,`title`,`start_schedule_time`,`over_schedule_time`
				FROM
						`app_cars_schedule`
				WHERE
						( `status` = 0 )
				AND
						( `cars_id` IN ('10000','10001','10005') )
				AND
						(`over_schedule_time` >= $start_schedule_time )						
				ORDER BY
							 cars_id ASC 		
		");
		**/
		
		if (!empty($schedule_list)) {
			$cars_schedule =  regroupKey ($schedule_list,'cars_id');		//按照车辆ID重新排序日程。

			/* 分析日程，检查预定日期、预计还车日期是否与日程有冲突 */
			foreach ($cars_schedule AS $key=>$val) {
				
				$cars_schedule[$key]['available'] = true;		//记录用车日期与日程是否冲突
				foreach ($val AS $k=>$v) {
					//订车开始时间在已有日程中。
					if ($start_schedule_time >= $v['start_schedule_time'] && $start_schedule_time <= $v['over_schedule_time']) {
						$cars_schedule[$key][$k]['msg']  = '订车日期(在已有日程中)';
						$cars_schedule[$key]['available'] = false;
					//预计还车日期在已有日程中
					} else if ($over_schedule_time >= $v['start_schedule_time'] && $over_schedule_time <= $v['over_schedule_time'])  {
						$cars_schedule[$key][$k]['msg']  = '预计还车日期(在已有日程中)';
						$cars_schedule[$key]['available'] = false;
					//验证订车日期与预计还车日期之间是否有日程存在
					} else if ($start_schedule_time <= $v['start_schedule_time'] &&  $over_schedule_time >= $v['over_schedule_time']) {
						$cars_schedule[$key][$k]['msg']  = '订车日期、预计还车日期(之间存在日程)';
						$cars_schedule[$key]['available'] = false;
					//当现有日程与订车日期和预计还车日期不冲突时。
					} else {	
						$cars_schedule[$key][$k]['msg']  = '订车日期、预计还车日期(与已有日程不冲突)';
					}
				}
			}

			return $cars_schedule;
		} else {
			return false;
		}
	
	}
	

	/**
	 * 获取指定级别车辆日程
	 * @param String $identifying		//车辆级别标识 .如，400,800
	 */
	public function seek_cars_grade_schedule($identifying) {
		$map['cs.status'] = 0;
		$map['identifying'] = array('in',$identifying);
		$data = $this->field('cg.name,c.brand,c.color,cs.start_schedule_time,cs.over_schedule_time,cs.id')
		->table($this->prefix.'cars_grade AS cg')
		->join($this->prefix.'cars AS c ON cg.id=c.cars_grade_id')
		->join('RIGHT JOIN '.$this->prefix.'cars_schedule AS cs ON c.id=cs.cars_id')
		->where($map)
		->select();
		return $data;
	}
	
}

?>
