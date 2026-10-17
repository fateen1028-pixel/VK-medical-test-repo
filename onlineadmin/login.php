<?php ob_start();

    

    session_start();

		

	require("connection.php");

	//$link_id=db_connect();









	echo $qry="select * from admin where `username`='$_REQUEST[txtusername]' and `password`='$_REQUEST[txtpassword]'";

	$res=mysqli_query(dbcon(),$qry);

	//echo mysqli_error();

	echo $numrows=mysqli_num_rows($res);

	if($numrows==0)

	{

	$_SESSION['_message']="Invalid Username / Password or Account Suspended";

	header("location:index.php?err=1");

	}

	else

	{ 

	if($data=mysqli_fetch_object($res))  

	{

	  $admin=$data->id; 

	   

	  $_SESSION['status'] = $data->status;

	   

	    $_SESSION['user_limit'] = $data->user_limit;

	   

	   $_SESSION['company_name'] = $data->company_name;

	  $_SESSION['admin']=$admin;

	   $_SESSION['eemail'] = $data->email;

	   

	   $_SESSION['f1'] = $data->f1;

	   $_SESSION['f2'] = $data->f2;

	   $_SESSION['f3'] = $data->f3;

	   $_SESSION['f4'] = $data->f4;

	   $_SESSION['f5'] = $data->f5;

	   $_SESSION['f6'] = $data->f6;

	   $_SESSION['f7'] = $data->f7;

	   $_SESSION['f8'] = $data->f8;

	  

  	  header("location:category.php");

	} 

}

?>