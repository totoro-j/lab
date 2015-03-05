<?php
	class UcenterAction extends CommonAction{
		public function index(){
			$this->display();
		}

		public function greet(){
			$m=D('TempuserView');
			import('ORG.Util.Page');
			$map['uid']=$_SESSION['id'];
			$count=$m->where($map)->count();
			$page  = new Page($count,10);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$m->limit($page->firstRow.','.$page->listRows)->where($map)->order('id desc')->select();
			$this->assign('list',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function clean_logs(){
			$m=M('Tempuser');
			$map['uid']=$_SESSION['id'];
			$count=$m->where($map)->delete();
			var_dump($count);
			$this->display('greet');
		}

		public function clean_log(){
			$m=M('Tempuser');
			$map['id']=$_GET['id'];
			$count=$m->where($map)->delete();
			$this->redirect('greet');
		}

		public function info(){
			$m=M('User');
			$where['id']=$_SESSION['id'];
			$arr=$m->where($where)->find();
			$this->assign('data',$arr);
			$this->display();
		}

		public function info_edit(){
			$m=M('User');
			$where['id']=$_SESSION['id'];
			$arr=$m->where($where)->find();
			$this->assign('data',$arr);
			$this->display();
		}

		public function con_edit(){
			$tel=$_POST['tel'];
			$mail=$_POST['mail'];
			$code=$_POST['code'];
			if(md5($code)!=$_SESSION['code']){
				$this->error('验证码不正确');
			}
			$m=M('User');
			$n=M('Temp');
			$where['id']=$_SESSION['id'];
			$data = array('tel'=>$tel,'mail'=>$mail);			
			$count=$m->where($where)->setField($data);
			if($count>0){
				$map['ytel']='1';
				$add=$n->add($map);
				$this->success('修改成功','info');
			}else{
				$this->error('尚未做任何修改',U('info_edit'));		
			}
		}

		public function info_pwd(){
			$this->display();
		}

		public function pwd(){
			$password=md5($_POST['password']);
			$newpwd=md5($_POST['newpwd']);
			$repwd=md5($_POST['repwd']);
			$code=$_POST['code'];
			if(md5($code)!=$_SESSION['code']){
				$this->error('验证码不正确');
			}
			
			$m=M('User');
			$n=M('Temp');
			$where['id']=$_SESSION['id'];
			$arr=$m->where($where)->getField('password');
			if($arr == $password){
				if($password == $newpwd){
						echo"<script type='text/javascript'>alert('请勿与原密码重复！');history.back(-1);</script>";
					}else{
						$count=$m->where($where)->setField('password',$newpwd);
						if($count>0){
								$map['ypwd']='1';
								$add=$n->add($map);
								$this->success('修改成功','info');
							}else{
								$this->error('修改失败',U('info_pwd'));		
							}			
					}
			}else{
						$this->error('原密码错误！',U('info_pwd'));
					}
			}

		public function event(){
			$m=D('EventView');
			$n=D('OrdersView');
			import('ORG.Util.Page');
			$where['uid']=$_SESSION['id'];
			$count=$m->where($where)->order('id desc')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$m->where($where)->order('id desc')->select();
			
			for($i = 0; $i < $count; $i++){
				$s=$arr[$i]['id'];
				$map['eid']=$s;
				$item[$i]=$n->where($map)->getField('hours');
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
				$h=$m->where($condition)->setField('testhours',"$cond");
				$j=$n->where($condition)->setField('testhours',"$cond");
			}
			$array=$m->limit($page->firstRow.','.$page->listRows)->where($where)->order('id desc')->select();
			$this->assign('event_list',$array);
			$this->assign('show',$show);
			$this->display();
		}


		public function event_detail(){
			$m=D('EventView');
			$n=D('Event_delView');
			$id=$_GET['id'];
			$where['id']=$id;
			$arr=$m->where($where)->find();
			if($arr['state']=='2' || $arr['state']=='3'){
				$array=$n->where($where)->getField('delinfo');
				$arr['delinfo']=$array;
			}
			$this->assign('dat',$arr);
			$this->display();
		}

		public  function order(){
			$m=D('EventView');		
			$where['uid']=$_SESSION['id'];
			$where['state']=1;
			$arr=$m->where($where)->select();		
			$this->assign('chosen_list',$arr);
			$e=D('OrdersView');
			import('ORG.Util.Page');
			$map['uid']=$_SESSION['id'];
			$count=$e->where($map)->order('id desc')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where($map)->order('id desc')->select();
			$this->assign('order_list',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function order_search(){
			$e=D('EventView');
			$map['uid']=$_SESSION['id'];
			$map['state']=1;
			$array=$e->where($map)->select();
			$this->assign('chosen_list',$array);
			$m=D('OrdersView');	
			import('ORG.Util.Page');
			$content=$_POST['searchform'];
			$where['uid']=$_SESSION['id'];
			$where['testname']=$content;
			$count=$m->where($where)->order('id desc')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$m->limit($page->firstRow.','.$page->listRows)->where($where)->order('id desc')->select();
			$this->assign('order_list',$arr);
			$this->assign('show',$show);
			$this->display('order');
		}

		public function cancel(){
			$m=M('Orders');
			$id=$_GET['id'];
			$where['id']=$id;
			$arr=$m->where($where)->find();
			$a=$arr['starttime'];
			$array = explode("-",$a);
			$year = $array[0];
			$month = $array[1];

			$array = explode(":",$array[2]);
			$minute = $array[1];
			$second = $array[2];

			$array = explode(" ",$array[0]);
			$day = $array[0];
			$hour = $array[1];

			$field = mktime($hour,$minute,$second,$month,$day,$year);
			
			$now=time();
			$span=$field-$now;
			if($now >= $field){
				echo"<script type='text/javascript'>alert('该预约已生效，不可删除！');history.back(-1);</script>";
			}else if($span<3600*24 && $now < $field){
				echo"<script type='text/javascript'>alert('不可删除已距实验时间24小时内的预约,请联系管理员！');history.back(-1);</script>";
			}else if($span>=3600*24 && $now < $field){
				$m->where($where)->delete();
				$this->redirect('order');
			
			};
		}
	}
?>
