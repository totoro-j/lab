<?php
class IndexAction extends CommonAction{
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
		$result=$m->field('starttime,finaltime,eid,uid,info')->where($map)->select();//检索选择日期的预约情况
		//复杂的判断过程
		$n=count($result);
		for($i=0;$i<$n;$i++){
			$user=M('user');//建立user
			$condition['id']=$result[$i]['uid'];
			$user_content=$user->where($condition)->select();
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
				$time_users_name.=$user_content[0]['truename'];
				$time_users_name.=':';
				//用户名
				$time_users_tel.=$user_content[0]['tel'];
				$time_users_tel.=':';
				//用户电话
				
				if($user_content[0]['job']==1){
					$time_users_job.="学生";
				}else if($user_content[0]['job']==2){
					$time_users_job.="老师";	
				}else if($user_content[0]['job']==3){
					$time_users_job.="其他";
				}
				 
				$time_users_job.=':';
				//用户身份
				$time_users_unit.=$user_content[0]['unit'];
				$time_users_unit.=':';
				//用户单位
				$time_users_department.=$user_content[0]['department'];
				$time_users_department.=':';
				//用户学院
				$time_users_principal.=$user_content[0]['principal'];
				$time_users_principal.=':';
				//课题负责人

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
		$user_condition['id']=$notice[0]['uid'];
		$user_list=M('user');
		$user=$user_list->where($user_condition)->select();
		$notice_user=$user[0]['username'];
		$this->assign('content',$notice_content);
		$this->assign('editor',$notice_user);
		$this->assign('time',$notice_time);
		$t=D('ZipView');
		$ar=$t->select();
		$this->assign('zip',$ar);
		$this->display();	 	
	}

	public function download(){
		$uploadpath='./Public/UploadZip/';
		$id=$_GET['id'];
		if($id=='')
		{$this->redirect('index');
		}
		$file=M('Zip');
		$result= $file->find($id);
		if($result==false)
		{$this->redirect('index');
		}
		$savename=$result['fileurl'];
		$showname=$result['filename'];
		$filename=$uploadpath.$savename;
		import('ORG.Net.Http');
		Http::download($filename,$showname);
	}

	public function show(){
		$m=M('User');
		$where['username']=$_SESSION['username'];
		$arr=$m->where($where)->select();
		$this->assign('data',$arr);
		$this->display('show');
	}


	public function submit(){
		$m=M('user');
		$condition['id']=$_SESSION['id'];
		$a=$m->where($condition)->field('role')->find();
		if($a['role']==0){
			$this->error('用户尚未通过审核');
		}else if($a['role']==2||$a['role']==9){
			$this->error('管理员不能申请实验');
		}
		if($_GET['expt_name']=="暂无预约实验"){
			$this->error('暂无实验可预约，请先申请实验');
		}

		$date=isset($_GET['reserveDate'])?$_GET['reserveDate']:date('Y-m-d',time());//判断日期
		$starttime=$_GET['startTime'];
		$finaltime=$_GET['endTime'];
		list($y,$m,$d)=explode('-',$date);
		list($sh,$sf,$ss)=explode(':',$starttime);
		list($fh,$ff,$fs)=explode(':',$finaltime);
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		if(mktime(0,0,0,$m,$d,$y)<mktime(0,0,0,$w,$e,$q)){
			$this->error('该时间段无可预约实验');
		}
		$startstamp=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间转换为时间戳
		$finalstamp=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间转换为时间戳
		$appointment=M('orders');
		$map['starttime']=array('like',''.$date.'%');//检索条件
		$result=$appointment->field('starttime,finaltime')->where($map)->select();//检索今天的预约情况
		//var_dump($result);
		$n=count($result);
		//判断时间段是否冲突
		for($i=0;$i<$n;$i++){
			list($a,$b)=explode(" ",$result[$i]['starttime']);
			list($sh,$sf,$ss)=explode(':',$b);
			$startjudge=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间时间戳
			list($f,$e)=explode(" ",$result[$i]['finaltime']);
			list($fh,$ff,$fs)=explode(':',$e);
			$finaljudge=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间时间戳
			if($startstamp>=$startjudge&&$startstamp<=$finaljudge){
				$this->error('输入时间冲突');
			}elseif($finalstamp>=$startjudge&&$finalstamp<=$finaljudge){
				$this->error('输入时间冲突');
			}elseif($startstamp<=$startjudge&&$finalstamp>=$finaljudge){
				$this->error('输入时间冲突');
			}elseif($startstamp>=$finalstamp){
				$this->error('输入时间冲突');
			}
			//判断时间冲突
		}
		$hour=($finalstamp-$startstamp)/3600;
		if($hour<2){
			$this->error('预约时间不得小于2小时');
		}
		$finaltime=$date;
		$finaltime.=' ';
		$finaltime.=$_GET['endTime'];
		$starttime=$date;
		$starttime.=' ';
		$starttime.=$_GET['startTime'];
		$data['finaltime']=$finaltime;//结束时间
		$data['starttime']=$starttime;//起始时间
		
		$event_condition['testname']=$_GET['expt_name'];
		$event_condition['uid']=$_SESSION['id'];
		$event=M('event');
		$event_id=$event->field('id')->where($event_condition)->select();
		$data['eid']=$event_id[0]['id'];
		$data['uid']=$_SESSION['id'];
		$data['hour']=$hour;
		$m=M('orders');
		$t=M('Temp');
		$temp_conditon['new_order']='1';
		$add=$t->add($temp_conditon);
		$lastId=$m->add($data);
		if($lastId && $add>0){
			$this->success('提交成功','index');
		}else{
			$this->error('提交失败');
		}
 
	 
	}
	
	public function application(){
		$event=M('Event');
		$t=M('Temp');
		$data['testname']=$_POST['expt_name'];
		$data['testcontent']=$_POST['expt_detail'];
		$data['total']=$_POST['expt_times'];
		$data['ed']=$_POST['expt_ed'];
		$data['state']='0';
		$data['uid']=$_SESSION['id'];
		$lastId=$event->add($data);
		$map['new_event']='1';
		$add=$t->add($map);
		if($lastId && $add>0){
			$this->success('实验申请成功，请耐心等待审核！','__URL__/index');
		}else{
			$this->error('实验申请失败，请重试！');
		}
		
	}
}
?>
