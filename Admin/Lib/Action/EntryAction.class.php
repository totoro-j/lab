<?php
// 本类由系统自动生成，仅供测试用途
class EntryAction extends AdminCommonAction {
	public function entrydetail(){
		$this->display();
	}

	public function entryview(){
		$e=D('EventView');
		import('ORG.Util.Page');
		$count=$e->where('state=1')->count();
		$page  = new Page($count,5);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$e->limit($page->firstRow.','.$page->listRows)->where('state=1')->select();
		$this->assign('entry_list',$arr);
		$this->assign('show',$show);
		$this->display();
	}

	public function entrycheck(){
		$m=D('EventView');
		import('ORG.Util.Page');
		$count=$m->where('state=0')->count();
		$page  = new Page($count,5);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->limit($page->firstRow.','.$page->listRows)->where('state=0')->select();
		$this->assign('list',$arr);
		$this->assign('show',$show);
		$this->display();
		}

	public function search(){
		$e=D('EventView');
		$field=$_POST['searchform'];
		$content=$_POST['search'];
		switch ($field)
		{
		case "testname":
			if(isset($content) && $content!=null){
				$where['testname']=array('like',"%{$content}%");}
				break;
		case "uid":
			if(isset($content) && $content!=null){
				$where['truename']=array('like',"%{$content}%");}
				break;
		case "principal":
			if(isset($content) && $content!=null){
				$where['principal']=array('like',"%{$content}%");}
				break;
		default:
			if(isset($content) && $content!=null){
				$where['testname']=array('like',"%{$content}%");}
				break;
		}
		$arr=$e->where($where)->select();	
		$this->assign('entry_list',$arr);
		$this->display('entryview');
	}

		public function pass(){
			$m=M('Event');
			$id=$_GET['id'];
			$arr=$m->find($id);
                        $arr['state']='1';
		
			$count=$m->save($arr);
			if($count>0){
				$this->redirect(entrycheck);
			}else{
				$this->error('审核失败');
			}   
		
		}

		public function refuse(){
			$m=M('Event');
			$id=$_GET['id'];
			$arr=$m->find($id);
                        $arr['state']='2';
		
			$count=$m->save($arr);
			if($count>0){
                   	$this->redirect(entrycheck);
			}else{
				$this->error('审核失败');
			}   
		
		}

		public function checkentry(){
			$id=$_GET['id'];
			$m=D('Event');
			$arr=$m->find($id);
			$this->assign('data',$arr);
			$this->display();
		}

		public function entrystatic(){
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
		}
		public function cancel(){
			$m=M('Event');
			$id=$_GET['id'];
			$data['id']=$id;
			$data['state']=0;
		//	var_dump($data);
			$m->save($data);
			$this->redirect('entryview');
		}		
}
