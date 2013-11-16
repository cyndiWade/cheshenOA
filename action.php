<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);	//屏蔽一些错误
header('Content-Type:text/html;charset=utf-8');
set_time_limit(0);
require_once 'function.php';					//函数库
require_once 'MysqliDb.class.php';		//数据库驱动类
require_once 'BoxServer.class.php';		//服务器盒子类

define('DB_HOST','localhost');			//主机地址
define('DB_NAME','ecshop');			//数据库名
define('DB_USER','root');					//数据库账号
define('DB_PWD','158.132');			//数据库密码
define('LOG_PATH','log/'.date('y-m-d').'.txt');		//定义日志文件名

echo tolog(LOG_PATH,'server','ok');
/**
 * 数据库启动测试
 */
$Db = new MysqliDb(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if ($Db->status() == 1) {
	echo tolog(LOG_PATH,'db_server','start');
} else {
	echo tolog(LOG_PATH,'db_server','not_start：'.$Db->error());
}


/**
 * socket连接，准备接收客户端数据
 */

$commonProtocol = getprotobyname("tcp");	//与箱子进行socket连接
$socket = socket_create(AF_INET, SOCK_STREAM, $commonProtocol);		//产生socket资源的实例
socket_bind($socket, '42.96.158.132',11000);	//开出端口
//socket_bind($socket, '127.0.0.1',11000);
socket_listen($socket);		//监听端口

socket_set_nonblock($socket);
while(true){

	@$client = socket_accept($socket);				//接收一个客户端连接
	if($client){															//如果连接成功
		echo tolog(LOG_PATH,'客户端','新连接');							
		socket_getpeername($client,$ip,$port);		//获得客户端的ip和端口
		$clients[]=array(
				'client'=>$client,
				'info' =>array(
						'ip'=>"$ip:$port",
				)
		);
		echo tolog(LOG_PATH,'客户端',"$ip:$port");	//记录箱子那边的连接		
		unset($client);
	}
	if(count($clients)>0){	

		foreach($clients as $k=>$client){
			$a=@socket_recv($client['client'],$str,1024,0);			//从socket里结束数据到缓存,socket帧接收函数
			//socket_recv(套字节对象，接收客户端传送的数据，接收的长度，标志)
			//$b=unpack(H*,$str);

			if(!empty($str)){					//客户端传送的数据不为空
				//echo unpack(H*,$str);
				$str=process($str);		//业务流程处理函数
				if($str){
					//写数据到socket缓存，写入数据到客户端	(是向套接口写数据，但是只是写，并没有发送出去)
					socket_write($client[client], $str);	//"You have connected to the socket...\n\r");
				}
			}else if($a===(int)0){		//
				unset($clients[$k]);
				//ksort($clients);
				echo tolog(LOG_PATH,'状态',"lost");	//记录箱子那边的连接
				//print_r(socket_last_error($client));
			}
		}

	}
	sleep(1);
}


/**
 * 业务流程处理
 * @param binary $client_data		//二进制数据
 * return binary		二进制数据
 */
function process($client_data) {
	$Db = new MysqliDb(DB_HOST,DB_USER,DB_PWD,DB_NAME);  //链接数据库
	/* 解析16进制数据为可用字符串 */
	$data_16 = unpack('H*',$client_data); 		//二进制，转换为16进制格式字符
	$Box =new BoxServer($data_16[1]);	
	echo tolog(LOG_PATH,'2jinzhi:',$client_data);
	echo tolog(LOG_PATH,'16jinzhi:',$data_16[1]);
	
	/* 初始化数据 */
	$box_num      = $Box->getTrueLohg();	    //柜子号
	$hz_num       = $Box->getTrueBox();			//盒子号
	$order_num    = $Box->getTrueOrder();	    //订单号
	$order_status = $Box->getStatus();          // 箱子的状态
    $str          = $Box->getStrNum();          // 最后结尾数
    $hy	          = $Box->getName();            //会员卡

	echo 'box_num'.$box_num."\n\r";
	tolog(LOG_PATH,'box_num:',$box_num);
	
	echo 'gaine_num'.$hz_num."\n\r";
	tolog(LOG_PATH,'gaine_num:',$hz_num);
	
	echo 'order_num'.$order_num."\n\r";
	tolog(LOG_PATH,'order_num:',$order_num);
	
	echo 'status'.$Box->getStatus()."\n\r";
	tolog(LOG_PATH,'status:',$Box->getStatus());
	
	echo 'StrNum'.$Box->getStrNum()."\n\r";
	tolog(LOG_PATH,'StrNum:',$Box->getStrNum());
	echo 'hy'.$Box->getName()."\n\r";
	echo 'all'.$Box->lastStr()."\n\r";
	tolog(LOG_PATH,'all:',$Box->lastStr());

    /******************业务流程****************************************************/
     //送货物 
     if($Box->getStatus()==31 && $Box->getStrNum()==42){
	    // 得到订单号 
		$order_sql ="select * from ecs_order_info where order_sn ='".$order_num."'";
        
		$order_info = $Db->one($order_sql);
		if(!empty($order_info)){
             		   // 根据订单中的地质来得到箱子的地质
		   $box_sql = "select * from ecs_box where id='".$order_info->jiayuan."'";

		   $box_info = $Db->one($box_sql);
           //判断柜子的号码与定单中的号码是否一样
		   if($box_num == $box_info->box_num){
		   
		          //更该定单的状态
			  $order_sql ="update ecs_order_info set order_status =5,shipping_status=1 where order_sn='".$order_num."'";
              $Db->_save($order_sql);
               tolog(LOG_PATH,'更改订单的状态:',$sql);
			  // 更改箱子的状态 
               $box_sql ="update ecs_boxs set boxs_state =1 where box_id=".$order_info->jiayuan." and boxs_num =".$hz_num ;
               $Db->_save($box_sql);
               tolog(LOG_PATH,'更改订单的状态:',$box_sql);

			   $hy_sql = "select * from ecs_reg_extend_info where user_id =".$order_info->user_id;

			   $hy_info = $Db->one($hy_sql); // 会员卡号
			   if(!empty($hy_info)){
			        $hy_num =bin2hex($hy_info->content);					//转换为16进制
					$Box->setUserID($hy_num);		//设置返回时的密码。
			   }
               
			    // 3 。设置密码返回给柜子 同时发密码给 用户
                $pwd=rand(100000,999999);  // 生成密码
			   	
				// 获得用户订单中的手机号
				$phone_num = empty($order_info->mobile) ? $order_info->tel : $order_info->mobile;

				//短信通知客人
				$value	=	"您订购的商品已存放至".$box_num."号柜".$hz_num."号箱，开箱密码为：".$pwd."，服务热线：400-060-2026【奥天康元】";

				$value = urlencode(@iconv('UTF-8', 'GB2312', $value));
			$URL='http://hl.my2my.cn/sms/push_mt.jsp?cpid=bjwl&cppwd=bjjmj2010&phone='.$phone_num.'&spnumber=&msgcont='.$value;
				//发送短信
				if (file_get_contents($URL) ==0 ) {			//短信发送成功
					
					/* 发送二进制指令给客户端 */
					$password=bin2hex($pwd);					//转换为16进制
					$Box->setPassword($password);		//设置返回时的密码。
					$return = $Box->lastStr();						//组合返回给客户端的2进制数据
                    //存入数据库中箱子
					$inser_sql = "insert into ecs_hy (`hy_num`,`order_sn`,`phone_num`,`guizi_id`,`hezi_id`,`mima`,`state`)value('".$hy_info->content."','".$order_num."','".$phone_num."',$box_num,$hz_num,'".$pwd."',1)";
					$Db->_add($inser_sql,' ecs_hy');
					echo tolog(LOG_PATH,'送货',"送货成功，$order_num,送到了$box_num 号柜子");	
					echo tolog(LOG_PATH,'返回',$return);
					
					return $return;
				} else {
					// 短信发送失败 记录记录起来 等候再发

					echo tolog(LOG_PATH,'短信',"短信发送失败！号码$phone_num内容$value");	 
					return false;
				}	
               

		    
		   }else{
		   
		     tolog(LOG_PATH,'订单:','$order_num订单送错了柜子');
		   }

		}else{

		tolog(LOG_PATH,'订单:','$order_num不存在');
		}
		
	 
	 }
	 //取货物 
	 elseif($Box->getStatus()==30 && $Box->getStrNum()==42){

		 echo tolog(LOG_PATH,'取货',"顾客开始取货");	//记录箱子那边的连接
      echo tolog(LOG_PATH,'huiyuanhao',$Box->getName());
		 if($Box->getName()){

             $sql ="select * from ecs_hy where hy_num =".$Box->getName()."and state = 1 limit 1";

			 $re = $Db->one($sql);
			 if(!empty($re)){
			    $value	=	"开箱密码为：".$re->mima."，服务热线：400-060-2026【奥天康元】";

				$value = urlencode(@iconv('UTF-8', 'GB2312', $value));
			$URL='http://hl.my2my.cn/sms/push_mt.jsp?cpid=bjwl&cppwd=bjjmj2010&phone='.$re->phone_num.'&spnumber=&msgcont='.$value;
				//发送短信
				if (file_get_contents($URL) ==0 ) {			//短信发送成功
						
					echo tolog(LOG_PATH,'短信',"短信发送成功");
					
					return $return;
				} else {
					// 短信发送失败 记录记录起来 等候再发

					echo tolog(LOG_PATH,'短信',"短信发送失败！号码$re->phone_num内容$value");	 
					return false;
				}
			 
			 }
		 
		 }
		  // 获得订单号以后 检查是否有订单号
        $order_num =pack('H*',$str_mod->getOrderID());//订单ID
		$sql ="select * from ecs_order_info where order_sn ='".$order_num."'";

		$order_info = $Db->one($sql);
        if(empty($order_info)){
		
           echo tolog(LOG_PATH,'取货',"订单号为$order_num 不存在");
		   return false;
		}else{
            
		    // 更改订单状态为已取货 更改箱子的状态为待分配
		  	$guizi=$str_mod->getTrueLohg();//须修改
			$xiangzi=$str_mod->getTrueBox();
			//修改箱子状态（修改订单的状态）
			$update_sql="update boxs set boxs_state=0 where box_id=".$order_info->jiayuan." AND boxs_num=$hz_num"; 	//更新柜子为取			
			$Db->_save($update_sql);
			unset($update_sql);  // 销毁变量
			//更改订单状态
			$sql ="update ecs_order_info set order_status=5,shipping_status=2 where order_sn='".$order_num."'";
			$Db->_save($sql);
			unset($sql);  // 销毁变量
			$sql ="update ecs_hy set state =0 where order_sn='".$order_num."' and state = 1 ";
			$Db->_save($sql);
			unset($sql); 
			//记录日志
		    echo tolog(LOG_PATH,'取货','订单'.$order_num.'的'.$order_info->jiayuan.'号柜子'.$hz_num.'号箱已经取货');	//记录箱子那边的连接
		   
		}


	 
	 }
	 //其他操作
	 else{
	 
	   echo tolog(LOG_PATH,'指令',"错误，不在处理的范围内");
	 }
	 
	/***********************************************************************/
	
	
	//关闭数据库连接
	$Db->_close();
}

function get_address($id){
 $sql ="select * from ecs_box where box_num=".$id;
 $result = $Db->one($sql);

 return $result['box_add'];
}


?>