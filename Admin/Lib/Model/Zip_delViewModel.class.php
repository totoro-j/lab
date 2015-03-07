<?php
	class Zip_delViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'Zip_del'=>array('id','filename','fileurl','size','date','ziprole','deltime','_as'=>'Zip_del'),
			  'user'=>array('username'=>'username','truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'User.id=Zip_del.uid',),
  		 );
	}
?>
