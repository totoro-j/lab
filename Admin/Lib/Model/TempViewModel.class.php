<?php
	class TempViewModel extends ViewModel{
		protected $viewFields=array(
		   	  'temp'=>array('id','new_event','new_user','new_order','ypwd','ytel','yorders','temptime','uid','oid','_as'=>'Temp'),
			  'user'=>array('username'=>'username','truename'=>'truename','id'=>'uid','_as'=>'user','_on'=>'user.id=Temp.uid'),
			  'orders'=>array('starttime'=>'starttime','finaltime'=>'finaltime','hours'=>'hours','ordertime'=>'ordertime','id'=>'oid','_as'=>'orders','_on'=>'orders.id=Temp.oid'),
			  'event'=>array('testname'=>'testname','id'=>'eid','_as'=>'event','_on'=>'event.id=Temp.eid'),
  		 );
	}
?>
