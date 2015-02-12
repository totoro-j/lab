<?php
	class OrdersViewModel extends ViewModel{
		protected $viewFields=array(
			'orders'=>array('id','starttime','finaltime','hours','ordertime','_as'=>'Orders'),
		   	  'event'=>array('testname'=>'testname','id'=>'eid','_as'=>'event','_on'=>'Event.id=Orders.eid'),
			  'user'=>array('truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'User.id=Orders.uid'),
  		 );
	}
?>