<?php
	class Event_delViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'event_del'=>array('id','testname','testcontent','total','state','time','description','testhours','delinfo','delstate','deltime','_as'=>'Event_del'),
			  'user'=>array('username'=>'username','truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'user.id=Event_del.uid'),
  		 );
	}
?>
