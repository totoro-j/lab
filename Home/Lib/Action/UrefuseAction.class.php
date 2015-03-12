<?php
	class UrefuseAction extends  Action{
	public function detail(){
		$m=M('User');
		$n=M('User_del');
		$id=$_SESSION['id'];
		$where['id']=$id;
		$arr=$m->where($where)->find();
		$this->assign('yrole',$arr);
		$array=$n->where($where)->find();
		$this->assign('yinfo',$array);
		$this->display();
	}

/*	public function logoff(){
		$m=M('User');
		$n=M('User_del');
		$id=$_SESSION['id'];
		$where['id']=$id;
		$arr=$m->where($where)->delete();
		$array=$n->where($where)->data('delstate=3')->save();
		$_SESSION=array();
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
		session_destroy();
		$this->redirect('__APP__/Register/reg');	
	}
*/
}
?>
