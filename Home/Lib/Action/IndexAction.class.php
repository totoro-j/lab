<?php
class IndexAction extends CommonAction{
	public function index(){
		$time=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());//输入日期，未输入则默认为今天
		$date=isset($_GET['date'])?$_GET['date']:'点击选择';
		$date2=isset($_GET['date'])?$_GET['date']:date('Y-m-d',time());
		$m=M('event');
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
		$map['starttime']=array('like',''.$time.'%');
		$result=$m->field('starttime,finaltime')->where($map)->select();//检索今天的预约情况
		$n=count($result);
		//为输出的时间段赋予输出格式
		for($i=0;$i<$n;$i++){
			if($i==$n-1){
				list($a,$b)=explode(" ",$result[$i]['starttime']);
				$judge.=$b;
				$judge.=':';
				list($a,$b)=explode(" ",$result[$i]['finaltime']);
				$judge.=$b;
			}else{
				list($a,$b)=explode(' ',$result[$i]['starttime']);
				$judge.=$b;
				$judge.=':';
				list($a,$b)=explode(' ',$result[$i]['finaltime']);
				$judge.=$b;
				$judge.=':';
				}	
		}
		if($judge==''){
			$judge=1;
		}
		//判断是否过期
		list($y,$m,$d)=explode('-',$time);
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		$a=mktime(0,0,0,$m,$d,$y);//输入日期
		$b=mktime(0,0,0,$w,$e,$q);//今天的日期
		if($a<$b){
			$judge=0;
		}
		//判断是否可选
		$this->assign('time_date2',$date2);
		$this->assign('time_date',$date);
		$this->assign('time_disable',$judge);//判断今日不可选区
		//历史记录
		$appointment=M('event');
		$condition['uid']=$_SESSION['id'];
		$history=$appointment->where($condition)->order('id desc')->select();
		$n=count($history);
		for($i=0;$i<$n;$i++){
			if($history[$i]['state']==0)
				$history[$i]['state']='未通过审核';
			else if($history[$i]['state']==2)
				$history[$i]['state']='待审核';
			else
				$history[$i]['state']='通过审核';
		}
		$this->assign('list',$history);	
		//消息记录
		$notice=D('Notice');
		$list=$notice->relation(true)->order('id desc')->select();
		$content=$list[0]['content'];
		$time=$list[0]['time'];
		$editor=$list[0]['uid'];
		$this->assign('content',$content);
		$this->assign('time',$time);
		$this->assign('editor',$editor);
		//个人信息
		$t=M('User');
		$where['username']=$_SESSION['username'];
		$ar=$t->where($where)->select();
		$this->assign('dat',$ar);
		$this->display();
	 	
	}

	public function show(){
		$m=M('User');
		$where['username']=$_SESSION['username'];
		$arr=$m->where($where)->select();
		$this->assign('data',$arr);
		$this->display('show');
	}

	public function modify(){
		$id=$_GET['id'];
		$m=M('User');
		$arr=$m->find($id);
		$this->assign('data',$arr);
		$this->display();
	}	

	public function update(){
		$m=M('User');
		$data['id']=$_POST['id'];
		$data['tel']=$_POST['tel'];
		$data['mail']=$_POST['mail'];
		$data['password']=MD5($_POST['password']);
		$count=$m->save($data);
		if($count>0){
			$this->success('修改成功','index');
		}else{
			$this->error('修改失败');
		}
	}

	public function submit(){
		$m=M('user');
		$condition['id']=$_SESSION['id'];
		$a=$m->where($condition)->field('role')->find();
		if($a['role']==0){
			$this->error('用户尚未通过审核');}
		$date=isset($_GET['reserveDate'])?$_GET['reserveDate']:date('Y-m-d',time());//判断日期
		$starttime=$_GET['selectedStartTime'];
		$finaltime=$_GET['selectedEndTime'];
		list($y,$m,$d)=explode('-',$date);
		list($sh,$sf,$ss)=explode(':',$starttime);
		list($fh,$ff,$fs)=explode(':',$finaltime);
		list($q,$w,$e)=explode('-',date('Y-m-d',time()));
		if(mktime(0,0,0,$m,$d,$y)<mktime(0,0,0,$w,$e,$q)){
			$this->error('该时间段无可预约实验');
		}
		$startstamp=mktime($sh,$sf,$ss,$m,$d,$y);//起始时间转换为时间戳
		$finalstamp=mktime($fh,$ff,$fs,$m,$d,$y);//结束时间转换为时间戳
		$appointment=M('event');
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
				$this->error('输入时间冲突1');
			}elseif($finalstamp>=$startjudge&&$finalstamp<=$finaljudge){
				$this->error('输入时间冲突2');
			}elseif($startstamp<=$startjudge&&$finalstamp>=$finaljudge){
				$this->error('输入时间冲突3');
			}elseif($strartstamp>=$finalstamp){
				$this->error('输入时间冲突4');
			}
			//判断时间冲突
		}
		$finaltime=$date;
		$finaltime.=' ';
		$finaltime.=$_GET['selectedEndTime'];
		$starttime=$date;
		$starttime.=' ';
		$starttime.=$_GET['selectedStartTime'];
		$data['finaltime']=$finaltime;
		$data['starttime']=$starttime;
		$data['testname']=$_GET['expt_name'];
		$data['testcontent']=$_GET['expt_detail'];
		$data['principal']=$_GET['expt_charge'];
		$data['state']=0;
		$data['uid']=$_SESSION['id'];
		$data['hour']=($finalstamp-$startstamp)/3600;
		$m=D('Event');
		$lastId=$m->add($data);
		if($lastId)
			$this->success('提交成功，等待审核','index');
		else
			$this->error('信息未完善或数据类型不对');
 
	 
	}
	public function notice(){
		$notice=D('Notice');
		$list=$notice->order('id desc')->select();
		$content=$list[0]['content'];
		$time=$list[0]['time'];
		$editor=$list[0]['uid'];
		$this->assign('content',$content);
		$this->assign('time',$time);
		$this->assign('editor',$editor);
		$user=M('user');
		$condition['username']=$_SESSION['username'];
		$information=$user->where($condition)->select();
		$this->assign('username',$information[0]['username']);
		$this->assign('truename',$information[0]['truename']);	
		$this->assign('department',$information[0]['department']);	
		$this->assign('unit',$information[0]['unit']);
		if($information[0]['job']==0)
			$job='其他';
		else if($information[0]['job']==2)
			$job='学生';
		else
			$job='老师';	
		$this->assign('job',$job);	
		$this->assign('principal',$information[0]['principal']);	
		$this->assign('tel',$information[0]['tel']);	
		$this->assign('mail',$information[0]['mail']);
		if($information==1)
			$this->assign('sex','男');
		else
	 		$this->assign('sex','女');
		$this->display();	
	 	
	}
	public function history(){
		$appointment=M('event');
		$condition['testname']=$_SESSION['id'];
		$history=$appointment->where($condition)->order('id desc')->select();
		$n=count($history);
		for($i=0;$i<$n;$i++){
			if($history[$i]['state']==0)
				$history[$i]['state']='未通过审核';
			else if($history[$i]['state']==2)
				$history[$i]['state']='待审核';
			else
				$history[$i]['state']='通过审核';
		}
		$this->assign('list',$history);
		$this->display();
		} 
		
	public function urefuse(){
		$this->display();
	}
}
