<?php
	class EventViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'event'=>array('id','testname','testcontent','total','state','description','time','_as'=>'Event'),
			  'user'=>array('username'=>'username','truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'User.id=Event.uid',),
  		 );
	}
?>
