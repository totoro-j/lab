<?php
class AppointmentAction extends AdminCommonAction{
	/*
	public function index(){
			$time=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//输入日期，未输入则默认为今天
		$date=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());
		$date2=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());
		//如果为单数时，改变日期格式
		list($n,$y,$r)=explode('-',$time);
		if(strlen($y)==1){
			$a=0;
			$a.=$y;
			$y=$a;
		}
		if(strlen($r)==1){
			$b=0;
			$b.=$r;
			$r=$b;
		}
		$time=$n;
		$time.='-';
		$time.=$y;
		$time.='-';
		$time.=$r;
		//结束
		$m=M('orders');
		$map['starttime']=array('like',''.$time.'%');
		$result=$m->field('starttime,finaltime,eid,uid,info,id')->where($map)->select();//检索选择日期的预约情况
		//复杂的判断过程
		$n=count($result);
		for($i=0;$i<$n;$i++){
			$user=M('user');//建立user
			$condition['id']=$result[$i]['uid'];
			$user_content=$user->field('role,tel,truename,id')->where($condition)->select();
			//管理员的设置
			if($user_content[0]['role']==2||$user_content[0]['role']==9){
				//管理员设置的不可预约时间段
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_1.=$b;
				$time_disable_1.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_1.=$b;
				$time_disable_1.=':';
				//管理员设置不可预约原因
				$disable_reason.=$result[$i]['info'];
				$disable_reason.=':';
			}else if($user_content[0]['role']==1&&$user_content[0]['id']==$_SESSION['id']){
				//用户自己设置的不可预约时间段
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_3.=$b;
				$time_disable_3.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_3.=$b;
				$time_disable_3.=':';
				$ExperimentCondition['id']=$result[$i]['eid'];
				$experiment=M('event');
				$exName=$experiment->field('testname')->where($ExperimentCondition)->select();
				$ExperimentName.=$exName[0]['testname'];
				$ExperimentName.=':';
			}else if($user_content[0]['role']==1||$user_content[0]['role']==3){
				//用户设置的不可预约时间段
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_2.=$b;
				$time_disable_2.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_2.=$b;
				$time_disable_2.=':';
				//时间格式
				$time_id.=$result[$i]['id'];
				$time_id.=':';
				//用户：电话
				$ExperimentCondition['id']=$result[$i]['eid'];
				$experiment=M('event');
				$exName=$experiment->field('testname')->where($ExperimentCondition)->select();
				$ExperimentName.=$exName[0]['testname'];
				$ExperimentName.=':';

			}
			


		}
		//判断是否过期；0表示时间过期；1表示当天无预约;2表示选择日期正确，且有预约
		if($result==''){
			$time_judge= '1';
		}
		list($y,$m,$d)=explode('-',$time);
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		$a=mktime(0,0,0,$m,$d,$y);//输入日期
		$b=mktime(0,0,0,$w,$e,$q);//今天的日期
		if($a<$b){
			$time_judge= '0';
		}
		if($time_judge==''){
			$time_judge= '2';
		}
		//用户可预约的事件;role 0表示待审核；1表示通过审核；2表示未通过审核
		
		$event=M('event');
		$event_condition['uid']=$_SESSION['id'];
		$event_condition['role']=1;
		$user_event=$event->field('testname')->where($event_condition)->select();
		
		if($user_event==''){
			$user_event[0]['testname']="暂无预约实验";
		}
		$this->assign('list',$user_event);
		//后台赋值
		$this->assign('time_judge',$time_judge);//今日预约判断参数
		$this->assign('time_date2',$date2);
		$this->assign('time_date',$date);//显示的日期
		$this->assign('user_event',$user_event);//用户事件
		$this->assign('time_disable_1',$time_disable_1);//管理员设置的不可预约时间段
		$this->assign('time_disabledReason',$disable_reason);//管理员设置不可预约理由
		$this->assign('time_disable_2',$time_disable_2);//其余设置的不可预约时间段
		$this->assign('time_disable_3',$time_disable_3);//用户自己设置的不可预约时间段
		$this->assign('time_id',$time_id);//预约序号
		$this->assign('time_ExperimentName',$ExperimentName);//实验名称
	

		$this->display();
	 	
	
	}
	 */
		public function index(){
		$this->assign('topshow',$topshow);	
		$time=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//输入日期，未输入则默认为今天
		$this->assign('date',$time);
		$date=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());
		$date2=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());
		//仅预约记录传值
		$Sdate=$_GET['Sdate'];
		if($Sdate!=''){
			list($Sdate,$Sdate_time)=explode(" ",$Sdate);
			$date=$Sdate;
			$date2=$Sdate;
			$time=$Sdate;
		}
		//如果为单数时，改变日期格式
		list($n,$y,$r)=explode('-',$time);
		if(strlen($y)==1){
			$a=0;
			$a.=$y;
			$y=$a;
		}
		if(strlen($r)==1){
			$b=0;
			$b.=$r;
			$r=$b;
		}
		$time=$n;
		$time.='-';
		$time.=$y;
		$time.='-';
		$time.=$r;
		
		//结束
		//前一天与后一天的时间
		$todayStamp=mktime(0,0,0,$y,$r,$n);
		$tomorrowStamp=$todayStamp+86400;
		$yesterdayStamp=$todayStamp - 86400;
		$past_day=date('Y-m-d',$yesterdayStamp);
		$next_day=date('Y-m-d',$tomorrowStamp);
		$this->assign('past_day',$past_day);
		$this->assign('next_day',$next_day);
		//后台传值预约信息的判断
		$m=M('orders');
		$map['starttime']=array('like',''.$time.'%');
		$result=$m->field('starttime,finaltime,eid,uid,info,id')->where($map)->select();//检索选择日期的预约情况
		//复杂的判断过程
		$n=count($result);
			for($i=0;$i<$n;$i++){
			$user=M('user');//建立user
			$condition['id']=$result[$i]['uid'];
			$user_content=$user->field('role,tel,truename,id')->where($condition)->select();
			//管理员的设置
			if($user_content[0]['role']==2||$user_content[0]['role']==9){
				//管理员设置的不可预约时间段
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_1.=$b;
				$time_disable_1.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_1.=$b;
				$time_disable_1.=':';
				//管理员设置不可预约原因
				$disable_reason.=$result[$i]['info'];
				$disable_reason.=':';
			}else if($user_content[0]['role']==1&&$user_content[0]['id']==$_SESSION['id']){
				//用户自己设置的不可预约时间段
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_3.=$b;
				$time_disable_3.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_3.=$b;
				$time_disable_3.=':';
				$ExperimentCondition['id']=$result[$i]['eid'];
				$experiment=M('event');
				$exName=$experiment->field('testname')->where($ExperimentCondition)->select();
				$ExperimentName.=$exName[0]['testname'];
				$ExperimentName.=':';
			}else if($user_content[0]['role']==1||$user_content[0]['role']==3){
				//用户设置的不可预约时间段
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_2.=$b;
				$time_disable_2.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_2.=$b;
				$time_disable_2.=':';
				//时间格式
				$time_id.=$result[$i]['id'];
				$time_id.=':';
				//用户：id
				$ExperimentCondition['id']=$result[$i]['eid'];
				$experiment=M('event');
				$exName=$experiment->field('testname')->where($ExperimentCondition)->select();
				$ExperimentName.=$exName[0]['testname'];
				$ExperimentName.=':';

			}
		
			


		}
		//判断是否过期；1表示当天无预约;2表示选择日期正确，且有预约
		if($result==''){
			$time_judge= '1';
		}
		if($time_judge==''){
			$time_judge= '2';
		}
		//用户可预约的事件;role 0表示待审核；1表示通过审核；2表示未通过审核
		
		$event=M('event');
		$user=M('user');
		$user_condtion['id']=$_SESSION['id'];
		$uer_role=$user->where($user_condtion)->select();
		if($uer_role[0]['role']==2||$uer_role[0]['role']==9){
			$user_event[0]['testname']="管理员登陆无预约实验";
		}else{	
			$event_condition['uid']=$_SESSION['id'];
			$event_condition['state']=1;
			$user_event=$event->field('testname')->where($event_condition)->select();
		}
		if($user_event==''){
			$user_event[0]['testname']="暂无预约实验";
		}
		$this->assign('list',$user_event);
		//后台赋值
		$this->assign('time_judge',$time_judge);//今日预约判断参数
		$this->assign('time_date2',$date2);
		$this->assign('time_date',$date);//显示的日期
		$this->assign('user_event',$user_event);//用户事件
		$this->assign('time_disable_1',$time_disable_1);//管理员设置的不可预约时间段
		$this->assign('time_disabledReason',$disable_reason);//管理员设置不可预约理由
		$this->assign('time_disable_2',$time_disable_2);//其余设置的不可预约时间段
		$this->assign('time_disable_3',$time_disable_3);//用户自己设置的不可预约时间段
		//用户信息批量赋值
		$this->assign('time_id',$time_id);//预约序号
		$this->assign('time_users_name',$time_users_name);//用户名
		$this->assign('time_users_tel',$time_users_tel);//用户电话
		$this->assign('time_users_job',$time_users_job);//用户身份
		$this->assign('time_users_unit',$time_users_unit);//用户单位
		$this->assign('time_users_department',$time_users_department);//用户学院
		$this->assign('time_users_principal',$time_users_principal);//课题负责人
		$this->assign('time_ExperimentName',$ExperimentName);//实验名称
		//公告栏
		$notice_list=M('notice');
		$notice=$notice_list->order('id desc')->select();
		$notice_content=$notice[0]['content'];
		$notice_time=$notice[0]['time'];
		list($notice_time,$a)=explode(" ",$notice_time);
		$user_condition['id']=$notice[0]['uid'];
		$user_list=M('user');
		$user=$user_list->where($user_condition)->select();
		$notice_user=$user[0]['username'];
		$this->assign('content',$notice_content);
		$this->assign('time',$notice_time);
		//下载
		$t=D('ZipView');
		$m=M('User');
		$nam=$_SESSION['id'];
		$maps['id']=array('eq',"$nam");
		$myrole=$m->where($maps)->getField('role');
		if(!isset($_SESSION['username']) || $_SESSION['username']=='' || ($myrole != "2" && $myrole != "9" && $myrole != "1")){
			$ar=$t->where('ziprole=0')->select();
		}else{
			$ar=$t->where('ziprole=1')->select();
		}
		$this->assign('zip',$ar);
		$this->display();	 	 	
	}
	public function submit(){
		$date=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//判断日期
		$ch_date=$date;//传回去的日期
		//转换日期格式
		list($n,$y,$r)=explode('-',$date);
		if(strlen($y)==1){
			$a=0;
			$a.=$y;
			$y=$a;
		}
		if(strlen($r)==1){
			$b=0;
			$b.=$r;
			$r=$b;
		}
		$date=$n;
		$date.='-';
		$date.=$y;
		$date.='-';
		$date.=$r;
		$starttime=$_GET['startTime'];
		$finaltime=$_GET['endTime'];
		list($y,$m,$d)=explode('-',$date);
		list($sh,$sf,$ss)=explode(':',$starttime);
		list($fh,$ff,$fs)=explode(':',$finaltime);
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		if(mktime(0,0,0,$m,$d,$y)<mktime(0,0,0,$w,$e,$q)){
			$this->error('该时间段已过期');
		}
		$startstamp=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间转换为时间戳
		$finalstamp=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间转换为时间戳
		$appointment=M('orders');
		$map['starttime']=array('like',''.$date.'%');//检索条件
		$result=$appointment->field('starttime,finaltime')->where($map)->select();//检索今天的预约情况
		$n=count($result);
		//判断时间段是否冲突
		for($i=0;$i<$n;$i++){
			list($a,$b)=explode(" ",$result[$i]['starttime']);
			list($sh,$sf,$ss)=explode(':',$b);
			$startjudge=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间时间戳
			list($a,$b)=explode(" ",$result[$i]['finaltime']);
			list($fh,$ff,$fs)=explode(':',$b);
			$finaljudge=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间时间戳
			if($startstamp>=$startjudge&&$startstamp<=$finaljudge){
				$this->error('输入时间冲突，请修改');
			}elseif($finalstamp>=$startjudge&&$finalstamp<=$finaljudge){
				$this->error('输入时间冲突，请修改');
			}elseif($startstamp<$startjudge&&$finalstamp>$finaljudge){
				$this->error('输入时间冲突，请修改');
			}elseif($startstamp>=$finalstamp){
				$this->error('输入时间格式不对啦');
			}//判断时间冲突
		}
		
		$finaltime=$date;
		$finaltime.=' ';
		$finaltime.=$_GET['endTime'];
		$starttime=$date;
		$starttime.=' ';
		$starttime.=$_GET['startTime'];
		$data['finaltime']=$finaltime;
		$data['starttime']=$starttime;
		$data['info']=$_GET['info'];
		$data['uid']=$_SESSION['id'];
		$data['hour']=($finalstamp-$startstamp)/3600;
		$m=M('orders');
		$lastId=$m->add($data);
		if($lastId)
			$this->success('设置成功','__URL__/index/date/'.$ch_date.'');
		else
			$this->error('提交失败','__URL__/index/date/'.$ch_date.'');
 
	 
	
	}	 	
	public function modify(){
		$date=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//判断日期
		$ch_date=$date;//传回去的日期
		$id=$_GET['id'];//预约序号
		//转换日期格式
		list($n,$y,$r)=explode('-',$date);
		if(strlen($y)==1){
			$a=0;
			$a.=$y;
			$y=$a;
		}
		if(strlen($r)==1){
			$b=0;
			$b.=$r;
			$r=$b;
		}
		$date=$n;
		$date.='-';
		$date.=$y;
		$date.='-';
		$date.=$r;
		$starttime=$_GET['startTime'];
		$finaltime=$_GET['endTime'];
		list($y,$m,$d)=explode('-',$date);
		list($sh,$sf,$ss)=explode(':',$starttime);
		list($fh,$ff,$fs)=explode(':',$finaltime);
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		/*
		if(mktime(0,0,0,$m,$d,$y)<mktime(0,0,0,$w,$e,$q)){
			$this->error('该时间段已过期');
		}
		 */
		$startstamp=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间转换为时间戳
		$finalstamp=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间转换为时间戳
		$appointment=M('orders');
		$map['starttime']=array('like',''.$date.'%');//检索条件
		$result=$appointment->field('starttime,finaltime,id')->where($map)->select();//检索今天的预约情况
		$n=count($result);
		//判断时间段是否冲突
		for($i=0;$i<$n;$i++){
			if($result[$i]['id']!=$id){
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				list($sh,$sf,$ss)=explode(':',$b);
				$startjudge=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间时间戳
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				list($fh,$ff,$fs)=explode(':',$b);
				$finaljudge=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间时间戳
				if($startstamp>$startjudge&&$startstamp<$finaljudge){
					$this->error('输入时间与其他预约冲突，请修改1');
				}elseif($finalstamp>$startjudge&&$finalstamp<$finaljudge){
					$this->error('输入时间与其它预约冲突，请修改2');
				}elseif($startstamp<$startjudge&&$finalstamp>$finaljudge){
					$this->error('输入时间与其他冲突，请修改3');
				}elseif($startstamp>=$finalstamp){
					$this->error('输入时间格式不对啦');
				}//判断时间冲突
			}
		}
		
		$finaltime=$date;
		$finaltime.=' ';
		$finaltime.=$_GET['endTime'];
		$starttime=$date;
		$starttime.=' ';
		$starttime.=$_GET['startTime'];
		$data['finaltime']=$finaltime;
		$data['starttime']=$starttime;
		$data['hour']=($finalstamp-$startstamp)/3600;
		$data['id']=$id;
		$data['edit']=1;
		$m=M('orders');
		$lastId=$m->save($data);
		if($lastId)
			$this->success('设置成功','__URL__/index/date/'.$ch_date.'');
		else
			$this->error('提交失败','__URL__/index/date/'.$ch_date.'');
	}
}

