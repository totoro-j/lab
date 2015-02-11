<?php
class NoticeAction extends AdminCommonAction{
	public function index(){
		$m=D('Notice');
		$arr=$m->relation(true)->order('id desc')->select();
		$puttime=$arr[0]['time'];
		$day=explode(" ",$puttime);
		$this->assign('time',$day[0]);
		$this->assign('editor',$arr[0]['truename']);
		$this->assign('content',$arr[0]['content']);
		$notice=$m->relation(true)->order('id desc')->select();
		$this->assign('notice',$notice);
		$this->display();
	 
	}
	public function noticeadd(){
		$notice=D('Notice');
		$content=$_GET['content'];
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
		$field=$m->relation(true)->find($id);
		$m->relation(true)->delete($id);
		$n->add($field);
		$this->redirect('Notice/index');	 
		}
	}
?>
