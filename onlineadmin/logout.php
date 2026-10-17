<?php ob_start();

	// logout.php



	session_start();



	   

	  

    /* session_unset("status");

	session_unset("admin");

	session_unset("billing");

	session_unset("customers");

	session_unset("vendors");

	session_unset("shipment_type");

	session_unset("zone");

	session_unset("country");

	session_unset("price");*/



	//unset($admin);	



	header("location:index.php");



?>	



