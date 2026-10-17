<?php  ob_start();
session_start();
require("connection.php");
		
		mysqli_query(dbcon(),"CREATE TABLE `emi` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`mobile` VARCHAR( 222 ) NOT NULL ,
`order_id` VARCHAR( 222 ) NOT NULL ,
`amount` VARCHAR( 222 ) NOT NULL ,
`f1` VARCHAR( 222 ) NOT NULL ,
`f2` VARCHAR( 222 ) NOT NULL ,
`f3` VARCHAR( 222 ) NOT NULL ,
`f4` VARCHAR( 222 ) NOT NULL ,
`f5` VARCHAR( 222 ) NOT NULL ,
`f6` VARCHAR( 222 ) NOT NULL ,
`f7` VARCHAR( 222 ) NOT NULL ,
`f8` VARCHAR( 222 ) NOT NULL ,
`f9` VARCHAR( 222 ) NOT NULL ,
`f10` VARCHAR( 222 ) NOT NULL ,
`d1` DATE NOT NULL ,
`d2` DATE NOT NULL ,
`d3` DATE NOT NULL ,
`d4` DATE NOT NULL ,
`d5` DATE NOT NULL ,
`d6` DATE NOT NULL ,
`d7` DATE NOT NULL ,
`d8` DATE NOT NULL ,
`d9` DATE NOT NULL ,
`d10` DATE NOT NULL ,
`p1` VARCHAR( 222 ) NOT NULL ,
`p2` VARCHAR( 222 ) NOT NULL ,
`p3` VARCHAR( 222 ) NOT NULL ,
`p4` VARCHAR( 222 ) NOT NULL ,
`p5` VARCHAR( 222 ) NOT NULL ,
`p6` VARCHAR( 222 ) NOT NULL ,
`p7` VARCHAR( 222 ) NOT NULL ,
`p8` VARCHAR( 222 ) NOT NULL ,
`p9` VARCHAR( 222 ) NOT NULL ,
`p10` VARCHAR( 222 ) NOT NULL ,
`emi` VARCHAR( 222 ) NOT NULL
)");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `addbyy` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `date_up` DATE NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `date` DATE NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f51` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f11` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f12` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f13` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f14` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f15` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f16` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f17` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f18` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f19` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f20` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f21` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f22` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f23` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f24` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f25` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f26` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f27` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f28` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f29` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f30` VARCHAR( 222 ) NOT NULL");


mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f31` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f32` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f33` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f34` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f35` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f36` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f37` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f38` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f39` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f40` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f41` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f42` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f43` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f44` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f45` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f46` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f47` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f48` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f49` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f50` VARCHAR( 222 ) NOT NULL");


mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d11` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d12` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d13` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d14` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d15` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d16` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d17` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d18` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d19` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d20` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d21` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d22` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d23` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d24` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d25` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d26` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d27` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d28` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d29` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d30` VARCHAR( 222 ) NOT NULL");


mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d31` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d32` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d33` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d34` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d35` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d36` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d37` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d38` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d39` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d40` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d41` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d42` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d43` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d44` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d45` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d46` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d47` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d48` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d49` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `d50` VARCHAR( 222 ) NOT NULL");



mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p11` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p12` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p13` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p14` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p15` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p16` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p17` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p18` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p19` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p20` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p21` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p22` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p23` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p24` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p25` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p26` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p27` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p28` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p29` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p30` VARCHAR( 222 ) NOT NULL");


mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p31` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p32` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p33` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p34` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p35` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p36` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p37` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p38` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p39` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p40` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p41` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p42` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p43` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p44` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p45` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p46` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p47` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p48` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p49` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `p50` VARCHAR( 222 ) NOT NULL");







?>
		
		
		
		
		
		
		
		 <? 

	  
	  

	   

	    ?>
		
		<div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Emi Details</h5>
          </div>
		  
		  
		  <?php
		  
		  
		    $query1 ="select * from `orders_scheme` where `session`='$_REQUEST[id]'";
								$rsquery1 = mysqli_query(dbcon(),$query1);
								@$rsdata1 = mysqli_fetch_object($rsquery1);
				                
							    $queryc2 ="select * from `customer_info` where `cust_mobile`='$rsdata1->mobile'";
								$rsqueryc2 = mysqli_query(dbcon(),$queryc2);
								@$rsdatac2 = mysqli_fetch_object($rsqueryc2);
		  
		  
		  
		  $Sqls ="select * from `scheme` where `id`='$rsdata1->scheme'";
				$rss=mysqli_query(dbcon(),$Sqls);
				$rsdata1s =mysqli_fetch_object($rss);
		  
		  
		  
		  $date = date('Y-m-d');
		  $date_up = date('Y-m-d');
		  
		  
		  
		  
		  
		  
		  
		   
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  



$netammount = $rsdata1s->minimum_purchase_amount;

$j=$rsdata1s->emi_months; 
	
	$split = ($netammount/$j);
for($i=1;$i<=$j;$i++)
{

 $reqdates= date('Y-m-d');
	   
	   $explodedeta1s=explode('-',$reqdates);
$actualdate1s=$explodedeta1s[0]."-".$explodedeta1s[1]."-".$explodedeta1s[2];
$d1s=$explodedeta1s[2];
$y1s=$explodedeta1s[0];
$m1s=$explodedeta1s[1];
$maketimes=mktime(0,0,0,$m1s-1,$d1s,$y1s);
$datemks=date('Y-m-d',$maketimes);
	   
	   $reqdate= $datemks;


$explodedeta1=explode('-',$reqdate);
$actualdate1=$explodedeta1[0]."-".$explodedeta1[1]."-".$explodedeta1[2];
$d1=$explodedeta1[2];
$y1=$explodedeta1[0];
$m1=$explodedeta1[1];
$maketime=mktime(0,0,0,$m1+$i,$d1+28,$y1);
$datemk=date('Y-m-d',$maketime);



$tamilu = "update `emi` set  `f".$i."`='$split',`d".$i."`='$datemk' where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'";
mysqli_query(dbcon(),$tamilu);

}
	


		  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		  
		  
		  if(@$_REQUEST['act']=='update')

{


if($_REQUEST['p1']=='1') { $a1 =  $_REQUEST['f1']; }
if($_REQUEST['p2']=='1') { $a2 =  $_REQUEST['f2']; }
if($_REQUEST['p3']=='1') { $a3 =  $_REQUEST['f3']; }
if($_REQUEST['p4']=='1') { $a4 =  $_REQUEST['f4']; }
if($_REQUEST['p5']=='1') { $a5 =  $_REQUEST['f5']; }
if($_REQUEST['p6']=='1') { $a6 =  $_REQUEST['f6']; }
if($_REQUEST['p7']=='1') { $a7 =  $_REQUEST['f7']; }
if($_REQUEST['p8']=='1') { $a8 =  $_REQUEST['f8']; }
if($_REQUEST['p9']=='1') { $a9 =  $_REQUEST['f9']; }
if($_REQUEST['p10']=='1') { $a10 =  $_REQUEST['f10']; }

if($_REQUEST['p11']=='1') { $a11 =  $_REQUEST['f11']; }
if($_REQUEST['p12']=='1') { $a12 =  $_REQUEST['f12']; }
if($_REQUEST['p13']=='1') { $a13 =  $_REQUEST['f13']; }
if($_REQUEST['p14']=='1') { $a14 =  $_REQUEST['f14']; }
if($_REQUEST['p15']=='1') { $a15 =  $_REQUEST['f15']; }
if($_REQUEST['p16']=='1') { $a16 =  $_REQUEST['f16']; }
if($_REQUEST['p17']=='1') { $a17 =  $_REQUEST['f17']; }
if($_REQUEST['p18']=='1') { $a18 =  $_REQUEST['f18']; }
if($_REQUEST['p19']=='1') { $a19 =  $_REQUEST['f19']; }
if($_REQUEST['p20']=='1') { $a20 =  $_REQUEST['f20']; }



if($_REQUEST['p21']=='1') { $a21 =  $_REQUEST['f21']; }
if($_REQUEST['p22']=='1') { $a22 =  $_REQUEST['f22']; }
if($_REQUEST['p23']=='1') { $a23 =  $_REQUEST['f23']; }
if($_REQUEST['p24']=='1') { $a24 =  $_REQUEST['f24']; }
if($_REQUEST['p25']=='1') { $a25 =  $_REQUEST['f25']; }
if($_REQUEST['p26']=='1') { $a26 =  $_REQUEST['f26']; }
if($_REQUEST['p27']=='1') { $a27 =  $_REQUEST['f27']; }
if($_REQUEST['p28']=='1') { $a28 =  $_REQUEST['f28']; }
if($_REQUEST['p29']=='1') { $a29 =  $_REQUEST['f29']; }
if($_REQUEST['p30']=='1') { $a30 =  $_REQUEST['f30']; }


if($_REQUEST['p31']=='1') { $a31 =  $_REQUEST['f31']; }
if($_REQUEST['p32']=='1') { $a32 =  $_REQUEST['f32']; }
if($_REQUEST['p33']=='1') { $a33 =  $_REQUEST['f33']; }
if($_REQUEST['p34']=='1') { $a34 =  $_REQUEST['f34']; }
if($_REQUEST['p35']=='1') { $a35 =  $_REQUEST['f35']; }
if($_REQUEST['p36']=='1') { $a36 =  $_REQUEST['f36']; }
if($_REQUEST['p37']=='1') { $a37 =  $_REQUEST['f37']; }
if($_REQUEST['p38']=='1') { $a38 =  $_REQUEST['f38']; }
if($_REQUEST['p39']=='1') { $a39 =  $_REQUEST['f39']; }
if($_REQUEST['p40']=='1') { $a40 =  $_REQUEST['f40']; }


if($_REQUEST['p41']=='1') { $a41 =  $_REQUEST['f41']; }
if($_REQUEST['p42']=='1') { $a42 =  $_REQUEST['f42']; }
if($_REQUEST['p43']=='1') { $a43 =  $_REQUEST['f43']; }
if($_REQUEST['p44']=='1') { $a44 =  $_REQUEST['f44']; }
if($_REQUEST['p45']=='1') { $a45 =  $_REQUEST['f45']; }
if($_REQUEST['p46']=='1') { $a46 =  $_REQUEST['f46']; }
if($_REQUEST['p47']=='1') { $a47 =  $_REQUEST['f47']; }
if($_REQUEST['p48']=='1') { $a48 =  $_REQUEST['f48']; }
if($_REQUEST['p49']=='1') { $a49 =  $_REQUEST['f49']; }
if($_REQUEST['p50']=='1') { $a50 =  $_REQUEST['f50']; }





$a = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12 + $a13 + $a14 + $a15 + $a16 + $a17 + $a18 + $a19 + $a20 + $a21 + $a22 + $a23 + $a24 + $a25 + $a26 + $a27 + $a28 + $a29 + $a30 + $a31 + $a32 + $a33 + $a34 + $a35 + $a36 + $a37 + $a38 + $a39 + $a40 + $a41 + $a42 + $a43 + $a44 + $a45 + $a46 + $a47 + $a48 + $a49 + $a50;

$date_up = date('Y-m-d');

mysqli_query(dbcon(),"update emi set  f1='$_REQUEST[f1]',f2='$_REQUEST[f2]',f3='$_REQUEST[f3]',f4='$_REQUEST[f4]',f5='$_REQUEST[f5]',f6='$_REQUEST[f6]',f7='$_REQUEST[f7]',f8='$_REQUEST[f8]',f9='$_REQUEST[f9]',f10='$_REQUEST[f10]',f11='$_REQUEST[f11]',f12='$_REQUEST[f12]',f13='$_REQUEST[f13]',f14='$_REQUEST[f14]',f15='$_REQUEST[f15]',f16='$_REQUEST[f16]',f17='$_REQUEST[f17]',f18='$_REQUEST[f18]',f19='$_REQUEST[f19]',f20='$_REQUEST[f20]',f21='$_REQUEST[f21]',f22='$_REQUEST[f22]',f23='$_REQUEST[f23]',f24='$_REQUEST[f24]',f25='$_REQUEST[f25]',f26='$_REQUEST[f26]',f27='$_REQUEST[f27]',f28='$_REQUEST[f28]',f29='$_REQUEST[f29]',f30='$_REQUEST[f30]',f31='$_REQUEST[f31]',f32='$_REQUEST[f32]',f33='$_REQUEST[f33]',f34='$_REQUEST[f34]',f35='$_REQUEST[f35]',f36='$_REQUEST[f36]',f37='$_REQUEST[f37]',f38='$_REQUEST[f38]',f39='$_REQUEST[f39]',f40='$_REQUEST[f40]',f41='$_REQUEST[f41]',f42='$_REQUEST[f42]',f43='$_REQUEST[f43]',f44='$_REQUEST[f44]',f45='$_REQUEST[f45]',f46='$_REQUEST[f46]',f47='$_REQUEST[f47]',f48='$_REQUEST[f48]',f49='$_REQUEST[f49]',f50='$_REQUEST[f50]',d1='$_REQUEST[d1]',d2='$_REQUEST[d2]',d3='$_REQUEST[d3]',d4='$_REQUEST[d4]',d5='$_REQUEST[d5]',d6='$_REQUEST[d6]',d7='$_REQUEST[d7]',d8='$_REQUEST[d8]',d9='$_REQUEST[d9]',d10='$_REQUEST[d10]',d11='$_REQUEST[d11]',d12='$_REQUEST[d12]',d13='$_REQUEST[d13]',d14='$_REQUEST[d14]',d15='$_REQUEST[d15]',d16='$_REQUEST[d16]',d17='$_REQUEST[d17]',d18='$_REQUEST[d18]',d19='$_REQUEST[d19]',d20='$_REQUEST[d20]',d21='$_REQUEST[d21]',d22='$_REQUEST[d22]',d23='$_REQUEST[d23]',d24='$_REQUEST[d24]',d25='$_REQUEST[d25]',d26='$_REQUEST[d26]',d27='$_REQUEST[d27]',d28='$_REQUEST[d28]',d29='$_REQUEST[d29]',d30='$_REQUEST[d30]',d31='$_REQUEST[d31]',d32='$_REQUEST[d32]',d33='$_REQUEST[d33]',d34='$_REQUEST[d34]',d35='$_REQUEST[d35]',d36='$_REQUEST[d36]',d37='$_REQUEST[d37]',d38='$_REQUEST[d38]',d39='$_REQUEST[d39]',d40='$_REQUEST[d40]',d41='$_REQUEST[d41]',d42='$_REQUEST[d42]',d43='$_REQUEST[d43]',d44='$_REQUEST[d44]',d45='$_REQUEST[d45]',d46='$_REQUEST[d46]',d47='$_REQUEST[d47]',d48='$_REQUEST[d48]',d49='$_REQUEST[d49]',d50='$_REQUEST[d50]',p1='$_REQUEST[p1]',p2='$_REQUEST[p2]',p3='$_REQUEST[p3]',p4='$_REQUEST[p4]',p5='$_REQUEST[p5]',p6='$_REQUEST[p6]',p7='$_REQUEST[p7]',p8='$_REQUEST[p8]',p9='$_REQUEST[p9]',p10='$_REQUEST[p10]',p11='$_REQUEST[p11]',p12='$_REQUEST[p12]',p13='$_REQUEST[p13]',p14='$_REQUEST[p14]',p15='$_REQUEST[p15]',p16='$_REQUEST[p16]',p17='$_REQUEST[p17]',p18='$_REQUEST[p18]',p19='$_REQUEST[p19]',p20='$_REQUEST[p20]',p21='$_REQUEST[p21]',p22='$_REQUEST[p22]',p23='$_REQUEST[p23]',p24='$_REQUEST[p24]',p25='$_REQUEST[p25]',p26='$_REQUEST[p26]',p27='$_REQUEST[p27]',p28='$_REQUEST[p28]',p29='$_REQUEST[p29]',p30='$_REQUEST[p30]',p31='$_REQUEST[p31]',p32='$_REQUEST[p32]',p33='$_REQUEST[p33]',p34='$_REQUEST[p34]',p35='$_REQUEST[p35]',p36='$_REQUEST[p36]',p37='$_REQUEST[p37]',p38='$_REQUEST[p38]',p39='$_REQUEST[p39]',p40='$_REQUEST[p40]',p41='$_REQUEST[p41]',p42='$_REQUEST[p42]',p43='$_REQUEST[p43]',p44='$_REQUEST[p44]',p45='$_REQUEST[p45]',p46='$_REQUEST[p46]',p47='$_REQUEST[p47]',p48='$_REQUEST[p48]',p49='$_REQUEST[p49]',p50='$_REQUEST[p50]',date_up='$date_up',addbyy='$_SESSION[admin]',`f51`='$a' where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'");



header('location:emi1.php?action=view&id='.$_REQUEST['id']);

}

$recx = "select * from emi where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'";
$rssxx=mysqli_query(dbcon(),$recx);
				$rec =mysqli_fetch_array($rssxx);

?>
		  
		  
		  
		  
		  
          <div class="widget-content nopadding">

	   <form name="form1" method="post" action="emi1.php?action=view&act=update&id=<?php echo $_REQUEST['id']; ?>" enctype="multipart/form-data">

	     <table width="80%"  border="0" align="center" cellpadding="5" cellspacing="2" bgcolor="#CCCCCC">

           

<tr><td>&nbsp;</td></tr>
		   

		   <tr>

             <td align="right" class="smalltxt">Mobile : </td>

             <td><? echo $rsdatac2->cust_mobile; ?></td>

           </tr>
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		    <tr>

             <td align="right" class="smalltxt">Date : </td>

             <td><input name="date" type="text" id="date" value="<? echo $rec['date']; ?>"></td>

           </tr>

		   

		   <?      date_default_timezone_set('Asia/Calcutta');

		    $time1 = date('g:i a');

	   

	  

		?>

		  
		    
		   
		   
		   
		   
		   
		   

		  
		   <tr>

             <td align="right" class="smalltxt">Scheme : </td>

             <td>
			 
			 
			 
			 <b><?php echo $rsdata1s->name; ?></b>
			 
			 
			 
			 </td>

           </tr>
		   
		    <tr>
			 
			 <td align="right" class="smalltxt">EMI Option : </td>
			 
			 <td class="smalltxt"><b><?php echo $rsdata1s->emi_months; ?>&nbsp;Months</b></td></tr>
	  

		   
		   
		   
		    
		   <tr>

             <td align="right" class="smalltxt">Order Amount: </td>

             <td class="smalltxt">Rs<input name="amount" type="text"  value="<? echo $rec['amount']; ?>"></td>

           </tr>
		   
		   <tr>

             <td align="right" class="smalltxt">Paid Amount: </td>

             <td class="smalltxt">Rs&nbsp;&nbsp;<b><? echo $rec['f51']; ?></b></td>

           </tr>
		   
		    <tr>

             <td align="right" class="smalltxt">Balance Amount: </td>

             <td class="smalltxt">Rs&nbsp;&nbsp;<b><? echo $bal = $rec['amount'] - $rec['f51']; ?></b></td>

           </tr>
		   
		   
		   
<tr><td colspan="10"><hr></td></tr>
		  

		  

		   <tr><td colspan="10"><table width="100%">	   
		   
		   
		   
		   
		   <? 
	
	 $j=$rec['emi']; 
	
	$split = ($rec['amount']/$j);
for($i=1;$i<=$j;$i++)
{?>
	<tr <?php if($rec['p'.$i]>'0') { ?> style="background-color:#009900; color:#FFFFFF;" <?php } else {  ?> style="background-color:#FF0000; color:#FFFFFF;" <?php }?> >
      <td width="24%" height="27" class="smalltxt"><? echo $i; ?>st Month Amount</td>
     <td width="27%" class="smalltxt">
       Rs<input type="text" name="f<? echo $i; ?>" value="<? echo $rec['f'.$i]; ?>" />
	   <?
	   $reqdate= $rec['date'];


$explodedeta1=explode('-',$reqdate);
$actualdate1=$explodedeta1[0]."-".$explodedeta1[1]."-".$explodedeta1[2];
$d1=$explodedeta1[2];
$y1=$explodedeta1[0];
$m1=$explodedeta1[1];
$maketime=mktime(0,0,0,$m1+$i,$d1,$y1);
$datemk=date('Y-m-d',$maketime);

?>
	   
	  <br />Due Date &nbsp;<? //echo $datemk; ?> <input type="text" name="d<? echo $i; ?>" value="<? echo $rec['d'.$i]; ?>" />
     </td>
       <td width="23%" class="smalltxt">Paid Status</td>
      <td width="26%" class="smalltxt">
	  
	  <?

?>
	  
	  
        <label><input type="radio" name="p<? echo $i; ?>" value="1" <? if($rec['p'.$i]>'0') { ?> checked <? } ?>/>Yes&nbsp;&nbsp;</label><label><input type="radio" name="p<? echo $i; ?>" value="" <? if($rec['p'.$i]<='0') { ?> checked <? } ?> />No</label>
      </td>
    </tr>
	
	<tr><td colspan="10"><hr></td></tr>
<? 

} ?>	


</table></td></tr>

		  

		   

          

           <tr>

             <td>&nbsp;</td>

             <td><input type="submit" name="Submit"  class="button" value="Update">

             <input type="button" name="Submit2"  class="button" value="Back" onClick="window.location.href='emi.php'"></td>

           </tr>

		    <tr>

             <td>&nbsp;</td>

             <td>&nbsp;</td>

           </tr>

		    <tr>

             <td>&nbsp;</td>

             <td>&nbsp;</td>

           </tr>

         </table>

        </form>

	  
		
		
		
		
		</div></div></div></div>
		