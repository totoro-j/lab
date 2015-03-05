<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends AdminCommonAction {
	public function userdetail(){
		$this->display();
	}

	public function userview(){
		$m=M('User');
		import('ORG.Util.Page');
		$count=$m->where('role=1 OR role=2 OR role=3')->order('id desc')->count();
		$page  = new Page($count,10);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->limit($page->firstRow.','.$page->listRows)->where('role=1 OR role=2 OR role=3')->order('id desc')->select();
		$this->assign('list',$arr);
		$this->assign('show',$show);
		$this->display();
	}

	public function usercheck(){
		$m=M('User');
		import('ORG.Util.Page');
		$count=$m->where('role=0')->order('id desc')->count();
		$page  = new Page($count,10);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->limit($page->firstRow.','.$page->listRows)->where('role=0')->order('id desc')->select();
		$this->assign('list',$arr);
		$this->assign('show',$show);
		$this->display();
	}

	public function search(){
		$m=M('User');
		$field=$_POST['searchform'];
		$content=$_POST['search'];
		switch ($field)
		{
		case "name":
			if(isset($content) && $content!=null){
				$where['truename']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		case "sex":
			switch($content)
			{
			case "男":
				$where['sex']=array('eq',"1");
				$where['role']=array('in','1,2,3');
				break;
			case "女":
				$where['sex']=array('eq',"0");
				$where['role']=array('in','1,2,3');
				break;
			default:
				$where['sex']=array('elt',"1");
				$where['role']=array('in','1,2,3');
				break;
			}
			break;
		case "unit":
			if(isset($content) && $content!=null){
				$where['unit']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		case "department":
			if(isset($content) && $content!=null){
				$where['department']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		case "job":
			switch($content)
			{
			case "教师":
				$where['job']=array('eq',"1");
				$where['role']=array('in','1,2,3');
				break;
			case "学生":
				$where['job']=array('eq',"2");
				$where['role']=array('in','1,2,3');
				break;
			case "其它":
				$where['job']=array('eq',"0");
				$where['role']=array('in','1,2,3');
				break;
			default:
				$where['job']=array('elt',"2");
				$where['role']=array('in','1,2,3');
				break;
			}
			break;
		case "principal":
			if(isset($content) && $content!=null){
				$where['principal']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		case "tel":
			if(isset($content) && $content!=null){
				$where['tel']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		case "email":
			if(isset($content) && $content!=null){
				$where['email']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		case "role":
			switch($content)
			{
			case "正式用户":
				$where['role']=array('eq',"1");
				$where['role']=array('in','1,2,3');
				break;
			case "管理员":
				$where['role']=array('eq',"2");
				$where['role']=array('in','1,2,3');
				break;
			default:
				$where['role']=array('egt',"1");
				$where['role']=array('in','1,2,3');
				break;
			}
			break;
		default:
			if(isset($content) && $content!=null){
				$where['name']=array('like',"%{$content}%");
				$where['role']=array('in','1,2,3');}else{
					$where['role']=array('in','1,2,3');}
				break;
		}
		$arr=$m->where($where)->order('id desc')->select();
		$this->assign('list',$arr);
		$this->display('userview');
	
	}

	public function pass(){
		$m=M('User');
		$id=$_GET['id'];
		$arr=$m->find($id);
                $arr['role']='1';		
		$count=$m->save($arr);
		if($count>0){
			$this->redirect(usercheck);
		}else{
			$this->error('Error!');
		}  
		
	}


	public function refuse(){
		$m=M('User');
		$n=M('User_del');
		$id=$_POST['refuse_ipt'];
		$arr=$m->find($id);
		$array=$arr;
		$arr['role']='4';
		$delinfo=$_POST['delinfo'];
		$array['delinfo']=$delinfo;
		$array['delstate']='1';
		$n->add($array);			
		$m->save($arr);
		$this->redirect('usercheck');		
	}

	public function cancel(){
		$m=M('User');
		$n=M('User_del');
		$id=$_POST['refuse_ipt'];
		$delinfo=$_POST['delinfo'];
		$yid=$_SESSION['id'];
		$where['id']=$yid;
		$field=$m->find($id);
		$yrole=$m->where($where)->find();
		$tem=$field;		
		if($yrole['role'] != "9" && ($tem['role']=='2' || $tem['role']=='3' || $tem['role']=='9')){
			echo"<script type='text/javascript'>alert('权限不足，操作被拒绝！');history.back(-1);</script>";
		}else{
			$field['role']='5';
			$m->save($field);
			$tem['delstate']='2';
			$tem['delinfo']=$delinfo;
			$n->add($tem);
			$this->redirect('userview');
			
		};
	}	

	public function check(){
		$id=$_GET['id'];
		$m=M('User');
		$arr=$m->find($id);
		$this->assign('data',$arr);
		$this->display();
	}

	public function tcheck(){
		$id=$_GET['id'];
		$m=M('User');
		$arr=$m->find($id);
		$this->assign('data',$arr);
		$this->display();
	}
	
	public function repwd(){
		$m=M('User');
		$id=$_GET['id'];
		$yid=$_SESSION['id'];
		$where['id']=$yid;
		$yrole=$m->where($where)->find();
		$t['id']=array('eq',"$id");
		$myrole=$m->where($t)->order('id desc')->getField('role');
		if($yrole['role'] != "9" && ($tem['role']=='2' || $tem['role']=='3' || $tem['role']=='9')){
			echo"<script type='text/javascript'>alert('权限不足，操作被拒绝！');history.back(-1);</script>";
		}else{
			$count=$m->where($t)->setField('password',MD5('MRIcenter'));
			$this->redirect('userview');		
		};
	}

	public function checkPwd(){
		$password=$_POST['password'];
		if($password==MD5('MRIcenter')){
			echo 'y';
		}else{
			echo 'n';	
		}
	}

	public function role(){
		$m=M('User');
		$id=$_POST['role_ed'];
		$role=$_POST['usertype'];
		$yid=$_SESSION['id'];
		$where['id']=$yid;
		$field=$m->find($id);
		$yrole=$m->where($where)->find();
		$sys=$field;
		if($yrole['role'] != "9"){
			echo"<script type='text/javascript'>alert('权限不足，操作被拒绝！');history.back(-1);</script>";
		}else if(!isset($role) || $role == ""){
			echo"<script type='text/javascript'>alert('你未选择用户权限！');history.back(-1);</script>";
		}else{
			$sys['role']=$role;
			$m->save($sys);
			$this->redirect('userview');
		};
	}

	public function modify(){
		$m_role=M('User');
		$conditon_role['id']=$_SESSION['id'];
		$admin=$m_role->where($conditon_role)->find();
		$m=M('User');
		$condition_user['id']=$_POST['id'];
		$condition['username']=$_POST['username'];
		$condition['principal']=$_POST['principal'];
		$condition['department']=$_POST['department'];
		$condition['unit']=$_POST['unit'];
		$condition['truename']=$_POST['truename'];
		$condition['sex']=$_POST['sex'];	
		//学历判别;2博士;1硕士
		$condition['mail']=$_POST['mail'];
		if($_POST['grade']!=''){
			$condition['grade']=$_POST['grade'];
		}
		if($_POST['degree']!=''){
			$condition['degree']=$_POST['degree'];
		}
		if($_POST['tutor']!=''){
			$condition['tutor']=$_POST['tutor'];
		}
		$condition['tel']=$_POST['tel'];
		//判断身份是否修改， 修改为教师后，取消部分
		if($_POST['job']!=''){
			$condition['job']=$_POST['job'];
		}else if($_POST['job']==1){
			$condition['job']='';
			$condition['degree']='';
			$condition['tutor']='';
		}else{
			$condition['job']=$_POST['job'];
		}
		$user=$m->where($condition_user)->find();
		if(($user['role']==3||$user['role']==2)&&$admin['role']!=9){
			$this->error('您的权限不够');
		}else if($user['role']==9){
			$this->error('您的权限不够啊');
		}
		$lastId=$m->where($condition_user)->save($condition);
		if($lastId){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}
}
