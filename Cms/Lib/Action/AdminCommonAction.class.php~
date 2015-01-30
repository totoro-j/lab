<?php
	class AdminCommonAction extends Action{
		Public function _initialize(){
			// 初始化的时候检查用户权限
			$m=M('User');
   			if(!isset($_SESSION['username']) || $_SESSION['username']==''){
				$this->redirect('Login/login');
			}
			$nam=$_SESSION['username'];
			$t['username']=array('eq',"$nam");
			$myrole=$m->where($t)->getField('role');
			if($myrole=="1"||$myrole=="0"){		
				$this->error('没有权限!','__ROOT__/index.php/Index/index');
			}
		}
	}
?>
