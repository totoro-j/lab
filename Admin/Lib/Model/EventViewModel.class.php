<?php
	class EventViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'event'=>array('id','testname','testcontent','principal','total','state','time','_as'=>'Event'),
			  'user'=>array('truename'=>'truename','_as'=>'user','_on'=>'User.id=Event.uid',),
  		 );
	}
?>
