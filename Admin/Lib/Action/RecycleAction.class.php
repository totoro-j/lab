<?php
        class RecycleAction extends AdminCommonAction{
		public function Index(){
			$this->display();
		}

		public function Recycle_notice(){
			$e=D('Notice_del');
			import('ORG.Util.Page');
			$count=$e->count();
			$page  = new Page($count,3);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->relation(true)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_event0(){
			$e=D('Event_delView');
    			import('ORG.Util.Page');
			$count=$e->where('delstate=1')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('delstate=1')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_event1(){
			$e=D('Event_delView');
    			import('ORG.Util.Page');
			$count=$e->where('delstate=2')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('delstate=2')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_user0(){
			$e=M('User_del');
			import('ORG.Util.Page');
			$where['delstate']=array('in','1,3');
			$count=$e->where($where)->count();
			$page  = new Page($count,5);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where($where)->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_user1(){
			$e=M('User_del');
    			import('ORG.Util.Page');
			$count=$e->where('delstate=2')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('delstate=2')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_zip(){
			$e=D('Zip_delView');
    			import('ORG.Util.Page');
			$count=$e->count();
			$page  = new Page($count,5);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function recover_notice(){
			$rec=$_POST['recover'];
			$m=M('Notice');
			$n=M('Notice_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['content']=$field[$i]['content'];
				$where[$i]['time']=$field[$i]['time'];
				$where[$i]['uid']=$field[$i]['uid'];
			}			
			$m->addAll($where);
			$this->redirect('recycle_notice');
		}

		public function recover_event0(){
			$rec=$_POST['recover'];
			$m=M('Event');
			$n=M('Event_del');
			if(is_array($rec)){
				$where='id in('.implode(',',$rec).')';
			}else{
				$where='id='.$rec;
			}
			$m->where($where)->setField('state','0');
			$n->where($where)->delete();
			$this->redirect('recycle_event0');
		}

		public function recover_event1(){
			$rec=$_POST['recover'];
			$m=M('Event');
			$n=M('Event_del');
			if(is_array($rec)){
				$where='id in('.implode(',',$rec).')';
			}else{
				$where='id='.$rec;
			}
			$m->where($where)->setField('state','1');
			$n->where($where)->delete();
			$this->redirect('recycle_event1');
		}


		public function recover_user0(){
			$rec=$_POST['recover'];
			$m=M('User');
			$n=M('User_del');
			if(is_array($rec)){
				$where='id in('.implode(',',$rec).')';
			}else{
				$where='id='.$rec;
			}
			$m->where($where)->setField('role','0');
			$n->where($where)->delete();
			$this->redirect('recycle_user0');
		}

		public function recover_user1(){
			$rec=$_POST['recover'];
			$m=M('User');
			$n=M('User_del');
			if(is_array($rec)){
				$where='id in('.implode(',',$rec).')';
			}else{
				$where='id='.$rec;
			}
			$m->where($where)->setField('role','1');
			$n->where($where)->delete();
			$this->redirect('recycle_user1');
		}

		public function recover_zip(){
			$rec=$_POST['recover'];
			$m=M('Zip');
			$n=M('Zip_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['filename']=$field[$i]['filename'];
				$where[$i]['fileurl']=$field[$i]['fileurl'];
				$where[$i]['size']=$field[$i]['size'];
				$where[$i]['editor']=$field[$i]['editor'];
				$where[$i]['date']=$field[$i]['date'];
				$where[$i]['uid']=$field[$i]['uid'];
			}			
			$m->addAll($where);
			$this->redirect('recycle_zip');
		}

		public function search_notice(){
			$e=D('Notice_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "truename":
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					}
					break;
			case "time":
				if(isset($content) && $content!=null){
					$where['time']=array('like',"%{$content}%");
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					}
					break;
			}
			$arr=$e->relation(true)->where($where)->select();
			$this->assign('data',$arr);
			$this->display('recycle_notice');
		}

		public function search_user0(){
			$e=M('User_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "username":
				if(isset($content) && $content!=null){
					$where['username']=array('like',"%{$content}%");
					
					$where['delstate']=array('in','1,3');}else{
					$where['delstate']=array('in','1,3');
					}
					break;
			case "truename":
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					
					$where['delstate']=array('in','1,3');}else{
					$where['delstate']=array('in','1,3');
					}
					break;
			case "principal":
				if(isset($content) && $content!=null){
					$where['principal']=array('like',"%{$content}%");
					
					$where['delstate']=array('in','1,3');}else{
					$where['delstate']=array('in','1,3');
					}
					break;	
			case "time":
				if(isset($content) && $content!=null){
					$where['time']=array('like',"%{$content}%");
					$where['delstate']=array('in','1,3');}else{
					$where['delstate']=array('in','1,3');

					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					$where['delstate']=array('in','1,3');}else{
					$where['delstate']=array('in','1,3');
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_user0');
		}

		public function search_user1(){
			$e=M('User_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "username":
				if(isset($content) && $content!=null){
					$where['username']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			case "truename":
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			case "principal":
				if(isset($content) && $content!=null){
					$where['principal']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;	
			case "time":
				if(isset($content) && $content!=null){
					$where['time']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_user1');
		}

		public function search_event1(){
			$e=D('Event_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "testname":
				if(isset($content) && $content!=null){
					$where['testname']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			case "truename":
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			case "principal":
				if(isset($content) && $content!=null){
					$where['principal']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;	
			case "time":
				if(isset($content) && $content!=null){
					$where['time']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['testname']=array('like',"%{$content}%");
					$where['delstate']="2";}else{
					$where['delstate']="2";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_event1');
		}

		public function search_event0(){
			$e=D('Event_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "testname":
				if(isset($content) && $content!=null){
					$where['testname']=array('like',"%{$content}%");
					$where['delstate']="1";}else{
					$where['delstate']="1";
					}
					break;
			case "truename":
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					$where['delstate']="1";}else{
					$where['delstate']="1";
					}
					break;
			case "principal":
				if(isset($content) && $content!=null){
					$where['principal']=array('like',"%{$content}%");
					$where['delstate']="1";}else{
					$where['delstate']="1";
					}
					break;	
			case "time":
				if(isset($content) && $content!=null){
					$where['time']=array('like',"%{$content}%");
					$where['delstate']="1";}else{
					$where['delstate']="1";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['testname']=array('like',"%{$content}%");
					$where['delstate']="1";}else{
					$where['delstate']="1";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_event0');
		}

		public function search_zip(){
			$e=D('Zip_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "filename":
				if(isset($content) && $content!=null){
					$where['filename']=array('like',"%{$content}%");
					}
					break;
			case "truename":
				if(isset($content) && $content!=null){
					$where['truename']=array('like',"%{$content}%");
					}
					break;
			case "time":
				if(isset($content) && $content!=null){
					$where['time']=array('like',"%{$content}%");
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['filename']=array('like',"%{$content}%");
					}
					break;
			}
			$arr=$e->relation(true)->where($where)->select();
			$this->assign('data',$arr);
			$this->display('recycle_zip');
		}

		public function delete_notice(){
			$rec=$_POST['recover'];
			$n=M('Notice_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$this->redirect('recycle_notice');
		}

		public function delete_event0(){
			$rec=$_POST['recover'];
			$n=M('Event_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();		
			$this->redirect('recycle_event0');
		}

		
		public function delete_event1(){
			$rec=$_POST['recover'];
			$n=M('Event_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();		
			$this->redirect('recycle_event1');
		}

		public function delete_user0(){
			$rec=$_POST['recover'];
			$n=M('User_del');
			$m=M('User');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$m->where($map)->delete();		
			$this->redirect('recycle_user0');
		}

		public function delete_user1(){
			$rec=$_POST['recover'];
			$n=M('User_del');
			$m=M('User');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$m->where($map)->delete();		
			$this->redirect('recycle_user1');
		}

		public function delete_zip(){
			$rec=$_POST['recover'];
			$n=M('Zip_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();		
			$this->redirect('recycle_zip');
		}

}
?>
