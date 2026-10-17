<?php




/*define("BASE_URL", "https://sanndy.in/");

define("DB_HOST", "localhost");

define("DB_USER", "webindiainfotech_vkmedical");

define("DB_PASSWORD", "SwhMy3b5L$*_");

define("DB_NAME", "webindiainfotech_vkmedical");*/

/* Fateen backup

define("BASE_URL", "https://sanndy.in/");

define("DB_HOST", "localhost");

define("DB_USER", "vkmedicalcentre_user");

define("DB_PASSWORD", "K$2bIzc!j6Y!");

define("DB_NAME", "vkmedicalcentre_db");

*/

define("BASE_URL", "http://localhost:8081/vkmedicalcentre/public_html/");

/* LOCAL-DEV ONLY: "localhost" resolves to IPv6 ::1 first; MariaDB listens on
   IPv4 only, so each connection stalls ~21s before falling back. "127.0.0.1"
   connects in ~2ms. This file is NEVER uploaded (it holds credentials) and
   must stay as-is on the hosting provider. */
define("DB_HOST", "127.0.0.1");

define("DB_USER", "vk_local_user");

define("DB_PASSWORD", "Fartline*10b");

define("DB_NAME", "vkmedicalcentre_local");

/*

define("BASE_URL", "http://ioyo.in");

define("DB_HOST", "localhost");

define("DB_USER", "root");

define("DB_PASSWORD", "");

define("DB_NAME", "vkmedical");


*/





	function dbcon(){



 $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);







 if (!$link) {



    echo "Error: Unable to connect to MySQL." . PHP_EOL;



    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;



    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;



    exit;



 }



return $link;



}











function sqlSelectX($sql) {



	$qry = mysqli_query(dbcon(), $sql);



	if (!$qry)



	  die (mysqli_error());



	$retResult = array();



	while($rs = mysqli_fetch_assoc($qry)){



		$retResult[] = $rs;



	}



	return $retResult; 



}







function sqlSelect($sql) {



	$qry = mysqli_query(dbcon(), $sql);



	if (!$qry)



	  die (mysqli_error());



	return mysqli_fetch_array($qry);



}







function fnPrint($arr) {



	echo "<pre>";



	print_r($arr);



	echo "</pre>";



	exit;



}	



	



		



		



		



	



		



		



$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);







if (!$link) {



    echo "Error: Unable to connect to MySQL." . PHP_EOL;



    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;



    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;



    exit;



}















































		



		



		



	/*	



		$host = "localhost";



		$dbusername = "root";



		$dbname = "valueautopartscrm";



		$dbpassword = "";



		



	



		



	



		



		$host = "localhost";



		$dbusername = "valueau1_aplcrm";



		$dbname = "valueau1_aplcrm";



		$dbpassword = "J?$yu.yy6GS(";



		



	







	



		



		



		



		function db_connect()



		{



		global $host,$dbusername,$dbpassword,$dbname;



		if(!($link_id=mysql_pconnect($host,$dbusername,$dbpassword)))



		{



		echo("error connecting to host");



		exit();



		}



		



		



		



		if(!mysql_select_db($dbname,$link_id))



		{



		echo("error in selecting the database");



		echo(sprintf("Error : %d %s",mysql_errno($link_id),mysql_error($link_id)));



		}



		return $link_id;



		}



		



		*/



?>







