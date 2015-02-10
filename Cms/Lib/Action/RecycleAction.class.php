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
			$arr=$e->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}
	
		public function Recycle_focus(){
		        $e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=1')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=1')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_news(){
			$e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=2')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=2')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_notice(){
			$e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=3')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=3')->select();
			$this->assign('data',$arr);
			$this->assign('show',$show);
			$this->display();
		}

		public function Recycle_article(){
			$e=M('Article_del');
    			import('ORG.Util.Page');
			$count=$e->where('parentid=4')->count();
			$page  = new Page($count,5);
			$page->setConfig('header','篇文章');
			$show=$page->show();
			$arr=$e->limit($page->firstRow.','.$page->listRows)->where('parentid=4')->select();
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
			$this->redirect('recycle_article');
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
			$this->redirect('recycle_article');
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
			$this->redirect('recycle_article');
		}
	}
?>