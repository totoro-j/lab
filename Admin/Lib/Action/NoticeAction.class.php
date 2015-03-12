<?php
class NoticeAction extends AdminCommonAction{
	public function index(){
		$notice_list=M('notice');
		import('ORG.Util.Page');
		$count=$notice_list->order('id desc')->count();
		$page  = new Page($count,3);
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
	public function noticeadd(){
		$notice=D('Notice');
		$ntitle=$_GET['ntitle'];
		$content=$_GET['content'];
		$data['ntitle']=$ntitle;
		$data['content']=$content;
		$data['uid']=$_SESSION['id'];
		$lastID=$notice->relation(true)->add($data);
		if($lastID){
			$this->redirect('Notice/index');
		}else{
			$this->error('提交失败');
		}
	}

	public function del(){
		$m=D('Notice');
		$n=D('Notice_del');
		$id=$_GET['id'];
		$field=$m->find($id);
		$m->relation(true)->delete($id);
		$n->add($field);
		$this->redirect('Notice/index');	 
		}
	}
?>
