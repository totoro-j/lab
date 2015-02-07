<?php
	class CommonAction extends Action{
		Public function _initialize(){
			// 初始化的时候检查用户权限
			$m=M('User');
   			if(!isset($_SESSION['username']) || $_SESSION['username']==''){
				$this->redirect('Login/login');
			}
			$nam=$_SESSION['id'];
			$t['id']=array('eq',"$nam");
			$myrole=$m->where($t)->getField('role');
			if($myrole=="3"){		
				$this->error('没有该系统权限!','__ROOT__/index.php/Index/index');
			}else if($myrole=="0"){
				$this->error('您的账号正在审核中!','__ROOT__/index.php/Index/index');
			}

		}
	}
?>
