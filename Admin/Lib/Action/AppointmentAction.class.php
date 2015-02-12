<?php
class AppointmentAction extends AdminCommonAction{
	public function index(){
	$time=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//输入日期，未输入则默认为今天
		$date=isset($_GET['date'])?$_GET['date']:'点击选择';
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
		$result=$m->field('starttime,finaltime,eid,uid')->where($map)->select();//检索今天的预约情况
		//复杂的判断过程
		$n=count($result);
		for($i=0;$i<$n;$i++){
			$user=M('user');//建立user
			$condition['uid']=$result[$i]['uid'];
			$user_content=$user->field('role,tel,truename,id')->where($condition)->select();
			//管理员的设置
			if($user_content[0]['role']==2){
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_1.=$b;
				$time_disable_1.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_1.=$b;
				$time_disable_1.=':';
			}else if($user_content[0]['role']==1&&$user_content[0]['id']==$_SESSION['id']){
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_3.=$b;
				$time_disable_3.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_3.=$b;
				$time_disable_3.=':';
				//用户自身时间段
				$ExperimentCondition['id']=$result[$i]['eid'];
				$experiment=M('event');
				$exName=$experiment->field('testname')->where($ExperimentCondition)->select();
				$ExperimentName.=$exName[0]['testname'];
				$ExperimentName.=':';
			}else if($user_content[0]['role']==1){
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$time_disable_2.=$b;
				$time_disable_2.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$time_disable_2.=$b;
				$time_disable_2.=':';
				//时间格式
				$time_users.=$user_content[$i]['truename'];
				$time_users.=':';
				$time_users.=$user_content[$i]['tel'];
				$time_users.=':';
				//用户：电话

			}else{
				$this->error("对不起，您的权限还不够哦");
			}
		
			


		}
		$this->assign('time_date2',$date2);
		$this->assign('time_date',$date);
		$this->assign('time_disable_1',$time_disable_1);
		$this->assign('time_disable_2',$time_disable_2);
		$this->assign('time_disable_3',$time_disable_3);
		$this->assign('time_users',$time_users);
		$this->assign('ExperimentName',$ExperimentName);
	//	var_dump($time_disable_1);
	//	var_dump($time_disable_2);
	//	var_dump($time_disable_3);
	//	var_dump($time_users);
	//	var_dump($ExperimentName);
		$this->display();
	}	
	public function submit(){
		$m=M('user');
		$condition['id']=$_SESSION['id'];
		$a=$m->where($condition)->field('role')->find();
		if($a['role']==0){
			$this->error('用户尚未通过审核');}
		if($a['role']==1)
			$this->error('权限不够');
		$date=isset($_GET['to_submit_selected_time'])?$_GET['to_submit_selected_time']:date('Y-m-d',time());//判断日期
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
		$appointment=M('event');
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
				$this->error('输入时间冲突，请后台修改');
			}elseif($finalstamp>=$startjudge&&$finalstamp<=$finaljudge){
				$this->error('输入时间冲突，请后台修改');
			}elseif($startstamp<$startjudge&&$finalstamp>$finaljudge){
				$this->error('输入时间冲突，请后台修改');
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
		$data['testname']='管理员设为不可预约';
		$data['testcontent']='无';
		$data['total']=0;
		$data['principal']='管理员';
		$data['state']=1;
		$data['uid']=$_SESSION['id'];
		$data['hour']=($finalstamp-$startstamp)/3600;
		$m=D('event');
		$lastId=$m->add($data);
		if($lastId)
			$this->success('设置成功','index');
		else
			$this->error('提交失败');
 
	 
	
	}	 	
	public function confirm(){
	$appointment=M('appointment');
		$condition1['state']=array('EQ','2');//状态为待审核
		$finaltime=date('Y-m-d',time());
		$finaltime.=' ';
		$finaltime.='00:00:00';	
		$condition1['finaltime']=array('EGT',$finaltime);
		$state2=$appointment->where($condition1)->order('id desc')->select();
		$this->assign('list1',$state2);//待审的用户
		$this->display();
	} 
	public function change(){
		$m=M('appointment');
		$id=$_GET['id'];
		if($_GET['num']==1)//数值是一代表通过审核
			$condition['state']=1;
		elseif($_GET['num']==0)//数值是零代表被拒绝
			$condition['state']=0;
			
		else
			$this->error('真是抱歉呢，提交失败了');
		$lastID=$m->where('id='.$id.'')->save($condition);
		if($lastID)
			$this->success('修改成功了哦','confirm');
		else
			$this->error('修改失败了哦');
	
	}
}

