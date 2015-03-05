<?php
	class TempuserViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'tempuser'=>array('id','eventstate','temptime','uid','eid','_as'=>'Tempuser'),
			  'user'=>array('username'=>'username','truename'=>'truename','id'=>'uid','_as'=>'user','_on'=>'User.id=Tempuser.uid'),
			  'event'=>array('testname'=>'testname','id'=>'eid','_as'=>'event','_on'=>'Event.id=Tempuser.eid'),
  		 );
	}
?>
