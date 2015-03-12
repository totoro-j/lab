<?php
	class Zip_delViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'Zip_del'=>array('id','filename','fileurl','size','date','deltime','ziprole','_as'=>'Zip_del'),
			  'user'=>array('username'=>'username','truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'user.id=Zip_del.uid',),
  		 );
	}
?>
