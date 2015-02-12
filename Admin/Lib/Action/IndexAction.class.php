<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AdminCommonAction {
	public function index(){
		$this->display();
    	}

	public function greet(){
		$m=M('Temp');
		$count['new_event']=$m->where('new_event=1')->count();
		$count['new_user']=$m->where('new_user=1')->count();
		$count['new_order']=$m->where('new_order=1')->count();
		$this->assign('data',$count);
		$this->display();
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
