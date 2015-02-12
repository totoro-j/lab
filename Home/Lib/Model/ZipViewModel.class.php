<?php
	class ZipViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'Zip'=>array('id','filename','fileurl','size','date','_as'=>'Zip'),
			  'user'=>array('username'=>'username','truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'User.id=Zip.uid',),
  		 );
	}
?>
