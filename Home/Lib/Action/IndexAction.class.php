<?php
class IndexAction extends Action{
	public function index(){
		$m=M('User');
		$nam=$_SESSION['id'];
		$t['id']=array('eq',"$nam");
		$myrole=$m->where($t)->getField('role');
		if(!isset($_SESSION['username']) || $_SESSION['username']==''){
			$topshow=0;
		}else if($myrole=="0"){
			$topshow=3;
		}else if($myrole=="3"){
			$topshow=5;
		}else if($myrole=="1"){
			$topshow=1;
		}else if($myrole=="4" || $myrole=="5"){
			$topshow=4;
		}else{
			$topshow=2;
		}
		$this->assign('topshow',$topshow);
		date_default_timezone_set(PRC);
		$time=isset($_GET['date'])?$_GET['date']:date('Y-m-d');//输入日期，未输入则默认为今天
	//	echo date_default_timezone_set(PRC);
	//	var_dump(date('Y-m-d H:i:s',time()));
		$this->assign('date',$time);
		$date=isset($_GET['date'])?$_GET['date']:date('Y-m-d');
		$date2=isset($_GET['date'])?$_GET['date']:date('Y-m-d');
		$flag=isset($_GET['flag'])?$_GET['flag']:0;
		$this->assign('flag',$flag);
		//判断是不是游客，如果是0，则是游客。如果是1则不是游客
		$user_m=M('User');
		if($_SESSION['id']==''){
			$user_role=0;
		}else{
			$con['id']=$_SESSION['id'];
			$role=$user_m->where($con)->find();
			$u_role=$role['role'];
			if($u_role==4||$u_role==5||$u_role==0){
				$user_role=0;
			}else{	
				$user_role=1;
			}
		}
		$this->assign('user_role',$user_role);
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
		$this->assign('month',$y);//后台传月
		$this->assign('year',$n);//后台传年
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
		$result=$m->field('starttime,finaltime,eid,uid,info')->where($map)->select();//检索选择日期的预约情况
		//复杂的判断过程
		$n=count($result);
		for($i=0;$i<$n;$i++){
			$user=M('user');//建立user
			$condition['id']=$result[$i]['uid'];
			$user_content=$user->where($condition)->select();
			//管理员的设置
			list($a,$b)=explode(" ",$result[$i]['starttime']);
			list($c,$d)=explode(" ",$result[$i]['finaltime']);
			if($d=='00:00:00'){
				$d='24:00:00';
			}
			if($user_content[0]['role']==2||$user_content[0]['role']==9){
				//管理员设置的不可预约时间段
				$time_disable_1.=$b;
				$time_disable_1.=':';
				$time_disable_1.=$d;
				$time_disable_1.=':';
				//管理员设置不可预约原因
				$disable_reason.=$result[$i]['info'];
				$disable_reason.=':';
			}else if($user_content[0]['role']==1&&$user_content[0]['id']==$_SESSION['id']){
				//用户自己设置的不可预约时间段
				$time_disable_3.=$b;
				$time_disable_3.=':';
				$time_disable_3.=$d;
				$time_disable_3.=':';
				$ExperimentCondition['id']=$result[$i]['eid'];
				$experiment=M('event');
				$exName=$experiment->field('testname')->where($ExperimentCondition)->select();
				$ExperimentName.=$exName[0]['testname'];
				$ExperimentName.=':';
			}else if($user_content[0]['role']==1||$user_content[0]['role']==3){
				//用户设置的不可预约时间段
				$time_disable_2.=$b;
				$time_disable_2.=':';
				$time_disable_2.=$d;
				$time_disable_2.=':';
				//时间格式
				//判断是否为游客
				if($user_role==1){
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
			$user_event[0]['testname']="请先申请新实验项目";
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
		list($notice_time,$a)=explode(" ",$notice_time);
		$user_condition['id']=$notice[0]['uid'];
		$user_list=M('user');
		$user=$user_list->where($user_condition)->select();
		$notice_user=$user[0]['username'];
		$notice_title=$notice[0]['ntitle'];
		$this->assign('ntitle',$notice_title);
		$this->assign('content',$notice_content);
		$this->assign('time',$notice_time);
		//下载
		$t=D('ZipView');
		$m=M('User');
		$nam=$_SESSION['id'];
		$maps['id']=array('eq',"$nam");
		$myrole=$m->where($maps)->getField('role');
		if(!isset($_SESSION['username']) || $_SESSION['username']=='' || ($myrole != "2" && $myrole != "9" && $myrole != "1")){
			$ar=$t->where('ziprole=0')->order('id desc')->select();
		}else{
			$ar=$t->order('id desc')->select();
		}
		$n=count($ar);
		for($i=0;$i<$n;$i++){
			list($a,$b)=explode(" ",$ar[$i]['date']);
			$ar[$i]['date']=$a;
		}
		$this->assign('zip',$ar);
		$this->display();
	}

	public function notice(){
		$notice_list=M('notice');
		import('ORG.Util.Page');
		$count=$notice_list->order('id desc')->count();
		$page  = new Page($count,5);
		$page->setConfig('header','条公告');
		$show=$page->show();

		$notice=$notice_list->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
		$n=count($notice);
		for($i=0;$i<$n;$i++){
			list($notice[$i]['time'],$a)=explode(" ",$notice[$i]['time']);
		}
		$this->assign('show',$show);

		$this->assign('notice',$notice);
		$this->display();
	}
	public function download(){
		$uploadpath='./Public/UploadZip/';
		$id=$_GET['id'];
		$m=M('User');
		$file=M('Zip');
		$result= $file->find($id);
		$nam=$_SESSION['id'];
		$maps['id']=array('eq',"$nam");
		$myrole=$m->where($maps)->getField('role');
		if(($myrole == "2" || $myrole == "9" || $myrole == "1") ||($result['ziprole'] == 0)){
			if($id==''){
				$this->redirect('index');
			}
			if($result==false){
				$this->redirect('index');
			}
			$savename=$result['fileurl'];
			$showname=$result['filename'];
			$filename=$uploadpath.$savename;
			import('ORG.Net.Http');
			Http::download($filename,$showname);
			}else{
			echo"<script type='text/javascript'>alert('您的下载操作非法！');history.back(-1);</script>";
		}
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
			$this->error('管理员请在后台修改不可用时间');
		}
		if($_GET['expt_name']=='请先申请新实验项目'){
			$this->error('暂无实验可预约，请先申请实验');
		}

		$date=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//判断日期
		$Ndate=$date;//后台传到前端的值
		list($y,$m,$d)=explode('-',$date);
		$starttime=$_GET['startTime'];
		list($sh,$sf,$ss)=explode(':',$starttime);
		$startstamp=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间转换为时间戳
		if($_GET['endTime']=='24:00:00'){
			$finaltime='00:00:00';
			list($fh,$ff,$fs)=explode(':',$finaltime);
			$finalstamp=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间转换为时间戳
			$finalstamp=$finalstamp+86400;
		}else{
			$finaltime=$_GET['endTime'];
			list($fh,$ff,$fs)=explode(':',$finaltime);
			$finalstamp=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间转换为时间戳
		}
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		if(mktime(0,0,0,$m,$d,$y)<time()){
			$this->error('该时间段已过期');
		}
		
		//判断是否距离现在时间没有超过2小时，未超过报错
		$nowstamp=time();
		if(($startstamp-$nowstamp)/3600<2){
			$this->error('不能预约距现在不到两小时的时间');
		}
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
			list($a,$b)=explode(" ",$result[$i]['finaltime']);
			if($b=='00:00:00'){
				$finaljudge=(mktime(0,0,0,$m,$d,$y)+86400);
			}else{
				list($fh,$ff,$fs)=explode(':',$b);
				$finaljudge=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间时间戳
			}
			if($startstamp>$startjudge&&$startstamp<$finaljudge){
				$this->error('输入时间冲突');
			}elseif($finalstamp>$startjudge&&$finalstamp<$finaljudge){
				$this->error('输入时间冲突');
			}elseif($startstamp<$startjudge&&$finalstamp>$finaljudge){
				$this->error('输入时间冲突');
			}elseif($startstamp>=$finalstamp){
				$this->error('输入时间冲突');
			}
			//判断时间冲突
		}
		$hour=(float)($finalstamp-$startstamp)/3600;
		if($hour<0){
			$this->error('输入时间有误');
		}
		$finaltime=date('Y-m-d, H:i:s',$finalstamp);
		$starttime=date('Y-m-d, H:i:s',$startstamp);
		$data['finaltime']=$finaltime;//结束时间
		$data['starttime']=$starttime;//起始时间
		$event_condition['testname']=$_GET['expt_name'];
		$event_condition['uid']=$_SESSION['id'];
		$event=M('event');
		$event_id=$event->field('id')->where($event_condition)->select();
		$data['eid']=$event_id[0]['id'];
		$data['uid']=$_SESSION['id'];
		$data['hours']=$hour;
		$m=M('orders');
		$lastId=$m->add($data);
		$t=M('Temp');
		$temp_condition['new_order']='1';
		$temp_condition['yorders']='1';
		$temp_condition['uid']=$_SESSION['id'];
		$temp_condition['eid']=$event_id[0]['id'];	
		$temp_condition['oid']=$lastId;
		//var_dump($data['hours']);	
		$add=$t->add($temp_condition);
		if($lastId && $add>0){
		header('Location: http://__URL__/index');	
		}else{
			$this->error('提交失败');
		}
		
	}
	public function success_submit(string $n){
		$this->assign('date',$n);
		$this->display();
	}
	public function application(){
		$m=M('user');
		$condition['id']=$_SESSION['id'];
		$a=$m->where($condition)->field('role')->find();
		if($a['role']==0){
			$this->error('用户尚未通过审核');
		}else if($a['role']==2||$a['role']==9){
			$this->error('管理员不可提交实验');
		}
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
		$map['uid']=$_SESSION['id'];
		$map['eid']=$lastId;
		$add=$t->add($map);
		if($lastId && $add>0){
			$this->success('实验申请成功，请耐心等待审核！','__URL__/index');
		}else{
			$this->error('实验申请失败，请重试！');
		}

	}
}
?>
