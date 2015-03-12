<?php
// 本类由系统自动生成，仅供测试用途
class EntryAction extends AdminCommonAction {
	public function entrydetail(){
		$this->display();
	}

	public function entryview(){
		$e=D('EventView');
		$n=D('OrdersView');
		import('ORG.Util.Page');
		$count=$e->where('state=1')->count();
		$page  = new Page($count,10);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$e->where('state=1')->order('id desc')->select();			
			for($i = 0; $i < $count; $i++){
				$s=$arr[$i]['id'];
				$map['eid']=$s;
				$item[$i]=$n->where($map)->getField('hours',true);
				$p[$i]=count($item[$i]);
			}
			for($k = 0; $k < $count; $k++){
				$arr[$k]['testhours']=0;
				for($h = 0; $h < $p[$k]; $h++){
					$arr[$k]['testhours']=$item[$k][$h]+$arr[$k]['testhours'];
				}
			}
			for($f=0;$f < $count;$f++){
				$condition['id']=(int)$arr[$f]['id'];
				$cond=$arr[$f]['testhours'];
				$h=$e->where($condition)->setField('testhours',"$cond");
				$j=$n->where($condition)->setField('testhours',"$cond");
			}
		$arr=$e->limit($page->firstRow.','.$page->listRows)->where('state=1')->order('id desc')->select();
		$this->assign('entry_list',$arr);
		$this->assign('show',$show);
		$this->display();
	}

	public function entrycheck(){
		$m=D('EventView');
		import('ORG.Util.Page');
		$count=$m->where('state=0')->count();
		$page  = new Page($count,10);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->limit($page->firstRow.','.$page->listRows)->where('state=0')->order('id desc')->select();
		$this->assign('list',$arr);
		$this->assign('show',$show);
		$this->display();
		}

	public function entrytime(){
		$e=D('OrdersView');
		$stime=$_POST['date1'].' 00:00:00';
		$ftime=$_POST['date2'].' 24:00:00';
		$array = explode("-",$stime);
		$year1 = $array[0];
		$month1 = $array[1];
		$array = explode(":",$array[2]);
		$minute1 = $array[1];
		$second1 = $array[2];
		$array = explode(" ",$array[0]);
		$day1 = $array[0];
		$hour1 = $array[1];
		$start = mktime($hour1,$minute1,$second1,$month1,$day1,$year1);

		$arr = explode("-",$ftime);
		$year2 = $arr[0];
		$month2 = $arr[1];
		$arr = explode(":",$arr[2]);
		$minute2 = $arr[1];
		$second2 = $arr[2];
		$arr = explode(" ",$arr[0]);
		$day2 = $arr[0];
		$hour2 = $arr[1];
		$final = mktime($hour2,$minute2,$second2,$month2,$day2,$year2);

		$field=$_POST['search2'];
		$content=$_POST['searchtext'];
		switch ($field)
		{
		case "principal":
			if(isset($stime) && $stime!=null && isset($ftime) && $ftime!=null && $start < $final){
			$test=$e->query("SELECT event.testname AS testname FROM lab_orders Orders JOIN lab_event event ON event.id=Orders.eid JOIN lab_user user ON user.id=Orders.uid WHERE ( (UNIX_TIMESTAMP(Orders.starttime) BETWEEN '$start' AND '$final' ) ) AND ( (UNIX_TIMESTAMP(Orders.finaltime) BETWEEN '$start' AND '$final' ) ) AND ( user.principal LIKE '%$content%' )");
			foreach($test as $test0){
			$test0=join(',',$test0);
			$temp[]=$test0;
			}
			}
			break;
		case "truename":
			if(isset($stime) && $stime!=null && isset($ftime) && $ftime!=null && $start < $final){
			$test=$e->query("SELECT event.testname AS testname FROM lab_orders Orders JOIN lab_event event ON event.id=Orders.eid JOIN lab_user user ON user.id=Orders.uid WHERE ( (UNIX_TIMESTAMP(Orders.starttime) BETWEEN '$start' AND '$final' ) ) AND ( (UNIX_TIMESTAMP(Orders.finaltime) BETWEEN '$start' AND '$final' ) ) AND ( user.truename LIKE '%$content%' )");
			foreach($test as $test0){
			$test0=join(',',$test0);
			$temp[]=$test0;
			}
			}
			break;
		default:
			if(isset($stime) && $stime!=null && isset($ftime) && $ftime!=null && $start < $final){
			$test=$e->query("SELECT event.testname AS testname FROM lab_orders Orders JOIN lab_event event ON event.id=Orders.eid JOIN lab_user user ON user.id=Orders.uid WHERE ( (UNIX_TIMESTAMP(Orders.starttime) BETWEEN '$start' AND '$final' ) ) AND ( (UNIX_TIMESTAMP(Orders.finaltime) BETWEEN '$start' AND '$final' ) )");
			foreach($test as $test0){
			$test0=join(',',$test0);
			$temp[]=$test0;
			}
			}
			break;
		}
		$temp=array_unique($temp);
		foreach($temp as $k => $test0){
			$temp[$k]=explode(',',$test0);
		}
		$temp=array_values($temp);
		for($i = 0; $i < count($temp); $i++){
			$s=$temp[$i];
			$ss=implode($s);
			$item[$i]['m']=$e->query("SELECT Orders.id AS id,Orders.starttime AS starttime,Orders.finaltime AS finaltime,Orders.hours AS hours,Orders.ordertime AS ordertime,Orders.edit AS edit,Orders.info AS info,event.testname AS testname,event.state AS state,event.id AS eid,user.truename AS truename,user.principal AS principal,user.id AS uid FROM lab_orders Orders JOIN lab_event event ON event.id=Orders.eid JOIN lab_user user ON user.id=Orders.uid WHERE ( (UNIX_TIMESTAMP(Orders.starttime) BETWEEN '$start' AND '$final' ) ) AND ( (UNIX_TIMESTAMP(Orders.finaltime) BETWEEN '$start' AND '$final' ) ) AND ( (`testname` = '$ss') ) order by starttime desc");
			$p[$i]=count($item[$i]['m']);
		}
		for($k = 0; $k < count($temp); $k++){
			for($h = 0; $h < $p[$k]; $h++){
				$temp[$k]['testhours']=$item[$k]['m'][$h]["hours"]+$temp[$k]['testhours'];
			}
		}

		for($k = 0; $k < count($temp); $k++){
			for($h = 0; $h < $p[$k]; $h++){
				$temp[$k]['principal']=$item[$k]['m'][$h]["principal"];
			}
		}

		for($k = 0; $k < count($temp); $k++){
			for($h = 0; $h < $p[$k]; $h++){
				$temp[$k]['truename']=$item[$k]['m'][$h]["truename"];
			}
		}
		$this->assign('list',$temp);
		$this->assign('item',$item);
		$this->display('entrytime');
	}

	public function search(){
		$e=D('EventView');
		$field=$_POST['searchform'];
		$content=$_POST['search'];
		switch ($field)
		{
		case "testname":
			if(isset($content) && $content!=null){
				$where['testname']=array('like',"%{$content}%");	
				$where['state']="1";}else{
					$where['state']="1";}
				break;
		case "uid":
			if(isset($content) && $content!=null){
				$where['truename']=array('like',"%{$content}%");
				$where['state']="1";}else{
					$where['state']="1";}
				break;
		case "principal":
			if(isset($content) && $content!=null){
				$where['principal']=array('like',"%{$content}%");
				$where['state']="1";}else{
					$where['state']="1";}
				break;
		case "descript":
			if(isset($content) && $content!=null){
				$where['description']=array('like',"%{$content}%");
				$where['state']="1";}else{
					$where['state']="1";}
				break;
		default:
			if(isset($content) && $content!=null){
				$where['testname']=array('like',"%{$content}%");
				$where['state']="1";}else{
					$where['state']="1";}
				break;
		}
		$arr=$e->where($where)->select();	
		$this->assign('entry_list',$arr);
		$this->display('entryview');
	}

		public function pass(){
			$m=M('Event');
			$n=M('Tempuser');
			$id=$_GET['id'];
			$arr=$m->find($id);
                        $arr['state']='1';		
			$count=$m->save($arr);		
			if($count>0){
				$map['uid']=$arr['uid'];
				$map['eid']=$arr['id'];
				$map['eventstate']=1;
				$add=$n->add($map);
				$this->redirect('entrycheck');
			}else{
				$this->error('审核失败');
			}   
		
		}

		public function refuse(){
			$m=M('Event');
			$n=M('Event_del');
			$t=M('Tempuser');
			$id=$_POST['refuse_ipt'];
			$field=$m->find($id);
			$tem=$field;
			$field['state']='2';
			$delinfo=$_POST['delinfo'];			
			$tem['delinfo']=$delinfo;
			$tem['delstate']='1';
			$n->add($tem);
			$m->save($field);
			$map['uid']=$arr['uid'];
			$map['eid']=$arr['id'];
			$map['eventstate']=0;
			$add=$t->add($map);
                   	$this->redirect('entrycheck');		
		}

		public function checkentry(){
			$id=$_GET['id'];
			$m=D('EventView');
			$n=D('OrdersView');
			$arr=$m->find($id);
			$condition['eid']=$id;
			$r=$n->where($condition)->order('starttime desc')->select();
			$t=count($r);
			$arr['testhours']=0;
			for($i=0;$i<$t;$i++){
				$arr['testhours']=$r[$i]["hours"]+$arr['testhours'];
			}
			$this->assign('data',$arr);
			$where['eid']=$id;
			import('ORG.Util.Page');
			$count=$n->where($where)->count();
			$page  = new Page($count,10);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$field=$n->limit($page->firstRow.','.$page->listRows)->where($where)->order('id desc')->select();
			$this->assign('order_list',$field);
			$this->assign('show',$show);
			$this->display();
		}

		public function tcheckentry(){
			$id=$_GET['id'];
			$m=D('EventView');
			$n=D('OrdersView');
			$arr=$m->find($id);
			$condition['eid']=$id;
			$r=$n->where($condition)->order('starttime desc')->select();
			$t=count($r);
			$arr['testhours']=0;
			for($i=0;$i<$t;$i++){
				$arr['testhours']=$r[$i]["hours"]+$arr['testhours'];
			}
			$this->assign('data',$arr);
			$where['eid']=$id;
			import('ORG.Util.Page');
			$count=$n->where($where)->count();
			$page  = new Page($count,10);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$field=$n->limit($page->firstRow.','.$page->listRows)->where($where)->order('id desc')->select();
			$this->assign('order_list',$field);
			$this->assign('show',$show);
			$this->display();
		}

	/*	public function entrystatic(){
			$m=D('Event');
			$arr=$_POST['interface'];
			$array=explode('^',$arr);
			$map['id']=array('in',$array);
			$r=$m->where($map)->order('starttime desc')->select();
			$t=count($r);
			$u=array($r[$t-1]['starttime'],$r[0]['finaltime'],0);
			for($i=0;$i<$t;$i++){
				$u[2]=$r[$i]["hour"]+$u[2];
			}
			echo json_encode($u);
		}*/

		public function cancel(){
			$m=M('Event');
			$n=M('Event_del');
			$t=M('Tempuser');
			$id=$_POST['refuse_ipt'];
			$field=$m->find($id);
			$tem=$field;
			$field['state']='3';
			$m->save($field);
			$tem['delstate']='2';
			$n->add($tem);
			$map['uid']=$arr['uid'];
			$map['eid']=$arr['id'];
			$map['eventstate']=2;
			$add=$t->add($map);
			$this->redirect('entryview');
		}		
}
