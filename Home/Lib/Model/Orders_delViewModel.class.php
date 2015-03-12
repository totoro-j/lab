<?php
	class OrdersViewModel extends ViewModel{
		protected $viewFields=array(
			'orders'=>array('id','starttime','finaltime','hours','ordertime','edit','info','_as'=>'Orders'),
		   	  'event'=>array('testname'=>'testname','state'=>'state','id'=>'eid','_as'=>'event','_on'=>'event.id=Orders.eid'),
			  'user'=>array('truename'=>'truename','principal'=>'principal','id'=>'uid','_as'=>'user','_on'=>'user.id=Orders.uid'),
  		 );
	}
?>
