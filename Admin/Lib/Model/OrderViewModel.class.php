<?php
	class OrderViewModel extends ViewModel{
		protected $viewFields=array(
			'order'=>array('id','starttime','finaltime','hour','time','_as'=>'Order'),
		   	  'event'=>array('testname'=>'testname','testcontent'=>'testcontent','principal'=>'principal','total'=>'total','state'=>'state','time'=>'event_time','_as'=>'Event','_on'=>'User.id=Order.uid',),
			  'user'=>array('truename'=>'truename','_as'=>'user','_on'=>'User.id=Order.uid',),
  		 );
	}
?>
