<?php
        class RecycleAction extends AdminCommonAction{
		public function Index(){
			$this->display();
		}

		public function Recycle_banner(){
			$e=M('Banner_del');
			import('ORG.Util.Page');
			$count=$e->count();
			$page  = new Page($count,3);
			$page->setConfig('header','条记录');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}
	
		public function Recycle_focus(){
		        $e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=1')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=1')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_news(){
			$e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=2')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=2')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_notice(){
			$e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=3')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=3')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_article(){
			$e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=4')->count();
			$page  = new Page($count,10);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=4')->order('id desc')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}
	
		public function recycle_detail(){
			$m=M('Article_del');
			$id=$_GET['id'];
			$arr=$m->find($id);
			$this->assign('no',$arr);
			$this->display();
		}

		public function recover_article(){
			$rec=$_POST['recover'];
			$m=M('Article');
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['parentid']=$field[$i]['parentid'];
				$where[$i]['isshow']=$field[$i]['isshow'];
				$where[$i]['title']=$field[$i]['title'];
				$where[$i]['editor']=$field[$i]['editor'];
				$where[$i]['date']=$field[$i]['date'];
				$where[$i]['content']=$field[$i]['content'];
				$where[$i]['metacontent']=$field[$i]['metacontent'];
				$where[$i]['metaimg']=$field[$i]['metaimg'];	
			}			
			$m->addAll($where);
			$this->redirect('recycle_article');
		}

		public function recover_focus(){
			$rec=$_POST['recover'];
			$m=M('Article');
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['parentid']=$field[$i]['parentid'];
				$where[$i]['isshow']=$field[$i]['isshow'];
				$where[$i]['title']=$field[$i]['title'];
				$where[$i]['editor']=$field[$i]['editor'];
				$where[$i]['date']=$field[$i]['date'];
				$where[$i]['content']=$field[$i]['content'];
				$where[$i]['metacontent']=$field[$i]['metacontent'];
				$where[$i]['metaimg']=$field[$i]['metaimg'];	
			}			
			$m->addAll($where);
			$this->redirect('recycle_focus');
		}

		public function recover_news(){
			$rec=$_POST['recover'];
			$m=M('Article');
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['parentid']=$field[$i]['parentid'];
				$where[$i]['isshow']=$field[$i]['isshow'];
				$where[$i]['title']=$field[$i]['title'];
				$where[$i]['editor']=$field[$i]['editor'];
				$where[$i]['date']=$field[$i]['date'];
				$where[$i]['content']=$field[$i]['content'];
				$where[$i]['metacontent']=$field[$i]['metacontent'];
				$where[$i]['metaimg']=$field[$i]['metaimg'];	
			}			
			$m->addAll($where);
			$this->redirect('recycle_news');
		}

		public function recover_notice(){
			$rec=$_POST['recover'];
			$m=M('Article');
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['parentid']=$field[$i]['parentid'];
				$where[$i]['isshow']=$field[$i]['isshow'];
				$where[$i]['title']=$field[$i]['title'];
				$where[$i]['editor']=$field[$i]['editor'];
				$where[$i]['date']=$field[$i]['date'];
				$where[$i]['content']=$field[$i]['content'];
				$where[$i]['metacontent']=$field[$i]['metacontent'];
				$where[$i]['metaimg']=$field[$i]['metaimg'];	
			}			
			$m->addAll($where);
			$this->redirect('recycle_notice');
		}

		public function recover_banner(){
			$rec=$_POST['recover'];
			$m=M('Banner');
			$n=M('Banner_del');
			$map['id']=array('in',$rec);
			$field=$n->where($map)->select();
			$t=count($field);
			$n->where($map)->delete();
			for($i=0;$i<$t;$i++){
				$where[$i]['id']=$field[$i]['id'];
				$where[$i]['imgurl']=$field[$i]['imgurl'];
				$where[$i]['metacontent']=$field[$i]['metacontent'];
				$where[$i]['date']=$field[$i]['date'];	
			}			
			$m->addAll($where);
			$this->redirect('recycle_banner');
		}

		public function search_news(){
			$e=M('Article_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "title":
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="2";}else{
					$where['parentid']="2";
					}
					break;
			case "editor":
				if(isset($content) && $content!=null){
					$where['editor']=array('like',"%{$content}%");
					$where['parentid']="2";}else{
					$where['parentid']="2";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="2";}else{
					$where['parentid']="2";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_news');
		}

		public function search_focus(){
			$e=M('Article_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "title":
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="1";}else{
					$where['parentid']="1";
					}
					break;
			case "editor":
				if(isset($content) && $content!=null){
					$where['editor']=array('like',"%{$content}%");
					$where['parentid']="1";}else{
					$where['parentid']="1";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="1";}else{
					$where['parentid']="1";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_focus');
		}

		public function search_notice(){
			$e=M('Article_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "title":
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="3";}else{
					$where['parentid']="3";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="3";}else{
					$where['parentid']="3";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_notice');
		}

		public function search_article(){
			$e=M('Article_del');
			$field=$_POST['user_search'];
			$content=$_POST['search_input'];
			switch ($field)
			{
			case "title":
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="4";}else{
					$where['parentid']="4";
					}
					break;
			case "editor":
				if(isset($content) && $content!=null){
					$where['editor']=array('like',"%{$content}%");
					$where['parentid']="4";}else{
					$where['parentid']="4";
					}
					break;
			default:
				if(isset($content) && $content!=null){
					$where['title']=array('like',"%{$content}%");
					$where['parentid']="4";}else{
					$where['parntid']="4";
					}
					break;
			}
			$arr=$e->where($where)->select();	
			$this->assign('data',$arr);
			$this->display('recycle_article');
		}

		public function delete_banner(){
			$rec=$_POST['recover'];
			$n=M('Banner_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$this->redirect('recycle_banner');
		}

		public function delete_article(){
			$rec=$_POST['recover'];
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();		
			$this->redirect('recycle_article');
		}

		public function delete_focus(){
			$rec=$_POST['recover'];
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$this->redirect('recycle_focus');
		}

		public function delete_news(){
			$rec=$_POST['recover'];
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$this->redirect('recycle_news');
		}

		public function delete_notice(){
			$rec=$_POST['recover'];
			$n=M('Article_del');
			$map['id']=array('in',$rec);
			$n->where($map)->delete();
			$this->redirect('recycle_notice');
		}
	}
?>
