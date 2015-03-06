<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AdminCommonAction {
	public function index(){
		$this->display();
    	}

	public function greet(){
		$m=D('TempView');
		$c['new_event']=$m->where('new_event=1')->count();
		$c['new_user']=$m->where('new_user=1')->count();
		$c['new_order']=$m->where('new_order=1')->count();
		import('ORG.Util.Page');
		$map['ypwd|ytel|yorders']=1;
		$count=$m->where($map)->count();
		$page  = new Page($count,10);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->limit($page->firstRow.','.$page->listRows)->where($map)->order('id desc')->select();
		var_dump($arr);
		$this->assign('show',$show);
		$this->assign('arr',$arr);
		$this->assign('data',$c);
		$this->display();
	}

	public function clean_logs(){
		$m=M('Temp');
		$map['ypwd|ytel|yorders']=1;
		$count=$m->where($map)->delete();
		$this->redirect('greet');
	}

	public function clean_log(){
		$m=M('Temp');
		$map['id']=$_GET['id'];
		$count=$m->where($map)->delete();
		$this->redirect('greet');
	}

	public function clean_user(){
		$m=M('Temp');
		$count=$m->where('new_user=1')->delete();
		$this->redirect('__APP__/User/usercheck');
	}

	public function clean_event(){
		$m=M('Temp');
		$m->where('new_event=1')->delete();
		$this->redirect('__APP__/Entry/entrycheck');
	}

	public function clean_order(){
		$m=M('Temp');
		$m->where('new_order=1')->delete();
		$this->redirect('__APP__/Appointment/index');
	}
}
?>
