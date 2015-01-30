<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends AdminCommonAction {
	public function userdetail(){
		$this->display();
	}

	public function userview(){
		$m=M('User');
		import('ORG.Util.Page');
		$count=$m->where('role=1 OR role=2')->order('id desc')->count();
		$page  = new Page($count,5);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->limit($page->firstRow.','.$page->listRows)->where('role=1 OR role=2')->order('id desc')->select();
		$this->assign('list',$arr);
		$this->assign('show',$show);
		$this->display();
	}

	public function usercheck(){
		$m=M('User');
		import('ORG.Util.Page');
		$count=$m->where('role=0')->order('id desc')->count();
		$page  = new Page($count,5);
		$page->setConfig('header','条记录');
		$show=$page->show();
		$arr=$m->where('role=0')->order('id desc')->select();
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
				$where['truename']=array('like',"%{$content}%");}
				break;
		case "sex":
			switch($content)
			{
			case "男":
				$where['sex']=array('eq',"1");
				break;
			case "女":
				$where['sex']=array('eq',"0");
				break;
			default:
				$where['sex']=array('elt',"1");
				break;
			}
			break;
		case "unit":
			if(isset($content) && $content!=null){
				$where['unit']=array('like',"%{$content}%");}
				break;
		case "department":
			if(isset($content) && $content!=null){
				$where['department']=array('like',"%{$content}%");}
				break;
		case "job":
			switch($content)
			{
			case "教师":
				$where['job']=array('eq',"1");
				break;
			case "学生":
				$where['job']=array('eq',"2");
				break;
			case "其它":
				$where['job']=array('eq',"0");
				break;
			default:
				$where['job']=array('elt',"2");
				break;
			}
			break;
		case "principal":
			if(isset($content) && $content!=null){
				$where['principal']=array('like',"%{$content}%");}
				break;
		case "tel":
			if(isset($content) && $content!=null){
				$where['tel']=array('like',"%{$content}%");}
				break;
		case "email":
			if(isset($content) && $content!=null){
				$where['email']=array('like',"%{$content}%");}
				break;
		case "role":
			switch($content)
			{
			case "正式用户":
				$where['role']=array('eq',"1");
				break;
			case "管理员":
				$where['role']=array('eq',"2");
				break;
			default:
				$where['role']=array('egt',"1");
				break;
			}
			break;
		default:
			if(isset($content) && $content!=null){
				$where['name']=array('like',"%{$content}%");}
				break;
		}
		$arr=$m->where($where)->order('id desc')->select();
		$this->assign('list',$arr);
		$this->display('userview');
	
	}

	public function del(){
		$m=M('User');
		$id=$_GET['id'];
		$m->delete($id);
		$this->redirect('userview');
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
			$this->error('shibai');
		}  
		
	}


	public function refuse(){
		$m=M('User');
		$id=$_GET['id'];
		$arr=$m->find($id);
                $arr['role']='2';		
		$count=$m->save($arr);
		if($count>0){
		$this->redirect(usercheck);
		}else{
			$this->error('error');
		}   
		
	}

	public function check(){
		$id=$_GET['id'];
		$m=M('User');
		$arr=$m->find($id);
		$this->assign('data',$arr);
		$this->display();
	}
	
	public function repwd(){
		$m=M('User');
		$id=$_GET['id'];
		$t['id']=array('eq',"$id");
		$myrole=$m->where($t)->order('id desc')->getField('role');
		if($myrole=="2"){
			echo"<script type='text/javascript'>alert('不可重置');history.back(-1);</script>";
		}else{
			$m->where($t)->setField('password',MD5('MRIcenter'));	
			$this->redirect(userview);		
		}
	}

	public function checkPwd(){
		$password=$_POST['password'];
		if($password==MD5('MRIcenter')){
			echo 'y';
		}else{
			echo 'n';	
		}
	}
}
