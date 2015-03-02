<?php
// 本类由系统自动生成，仅供测试用途
class FileAction extends AdminCommonAction {
	public function index(){
		$file=D('ZipView');
		import('ORG.Util.Page');
		$count=$file->order('id desc')->count();
		$page  = new Page($count,10);
		$page->setConfig('header','个文件');
		$show=$page->show();
    		$list=$file->order('id desc')->select();
		$this->assign('data',$list);
		$this->assign('show',$show);
		$this->display(); 
	}
      	
	public function ListFileIsshowupload(){        
		if(!empty($_FILES))
        	{
			$this->ListFileIsshow_upload();
		}
	}

     	public function  ListFileIsshow_upload(){
		import('ORG.Net.UploadFile');
            	$upload = new UploadFile();
            	$upload->maxSize            = 3292200;
            	$upload->allowExts          = explode(',', 'txt,doc,docx,xls,xlsx,zip,7z,rar,pdf');
            	$upload->savePath           = './Public/UploadZip/';
		$upload->saveName           = time().'_'.mt_rand();
            	$upload->saveRule           = 'uniqid';
            	if (!$upload->upload()) 
            	{
            	    $this->error($upload->getErrorMsg());
            	} 
            	else 
            	{
            	$uploadList = $upload->getUploadFileInfo();               
		$_POST['filename'] = $uploadList[0]['name'];
		$_POST['size'] = $uploadList[0]['size']/1000;
		$_POST['savename'] = $uploadList[0]['savename'];
            	}
	    	$m=M('Zip');
	    	$data1['filename']=$_POST['filename'];
		$data1['fileurl']=$_POST['savename'];
		$data1['size']=$_POST['size'];
		$data1['uid']=$_SESSION['id'];
		$list=$m->add($data1);
            	if ($list !== false) 
            	{
			$this->success('上传成功', 'index');
		    }else{
			$this->error('上传失败');
		    }
	}

	public function download(){
		$uploadpath='./Public/UploadZip/';
		$id=$_GET['id'];
		if($id=='')
		{$this->redirect('index');
		}
		$file=M('Zip');
		$result= $file->find($id);
		if($result==false)
		{$this->redirect('index');
		}
		$savename=$result['fileurl'];
		$showname=$result['filename'];
		$filename=$uploadpath.$savename;
		import('ORG.Net.Http');
		Http::download($filename,$showname);
	}

	public function filedel(){
		$m=M('Zip');
		$n=M('Zip_del');
		$id=$_GET['id'];
		$field=$m->find($id);
		$n->add($field);		
		$m->delete($id);
                $this->redirect('index');		
	}
	
}
?>
