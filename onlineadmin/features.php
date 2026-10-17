<?php  ob_start();



session_start();



require("connection.php");



//$linkid = db_connect();



if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }



mysqli_query(dbcon(),"CREATE TABLE IF NOT EXISTS `email7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chipset` varchar(255) NOT NULL,
  `cores` varchar(255) NOT NULL,
  `cpu` longtext NOT NULL,
  `architec` varchar(255) NOT NULL,
  `fabric` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `ram_type` varchar(255) NOT NULL,
  `graphics` varchar(255) NOT NULL,
  `build` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `thick` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `water` varchar(255) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `display_type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `bezel` varchar(255) NOT NULL,
  `pixel` varchar(255) NOT NULL,
  `bright` varchar(255) NOT NULL,
  `protection` varchar(255) NOT NULL,
  `color_re` varchar(255) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `b_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `removable` varchar(255) NOT NULL,
  `fast_charge` varchar(255) NOT NULL,
  `charge_speed` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `ui` varchar(255) NOT NULL,
  `internal` varchar(255) NOT NULL,
  `memory_type` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `expand` varchar(255) NOT NULL,
  `sim` varchar(255) NOT NULL,
  `network` longtext NOT NULL,
  `fiveg` varchar(255) NOT NULL,
  `wifi` longtext NOT NULL,
  `wifi_f` varchar(255) NOT NULL,
  `bluetooth` varchar(255) NOT NULL,
  `usb` longtext NOT NULL,
  `lte` varchar(255) NOT NULL,
  `otg` varchar(255) NOT NULL,
  `gps` varchar(255) NOT NULL,
  `nfc` varchar(255) NOT NULL,
  `infrared` varchar(255) NOT NULL,
  `speaker` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `video` longtext NOT NULL,
  `speaker_f` varchar(255) NOT NULL,
  `finger_print` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `other` longtext NOT NULL,
  `c_setup` varchar(255) NOT NULL,
  `c_secondary` longtext NOT NULL,
  `c_tertiary` longtext NOT NULL,
  `fc_setup` varchar(255) NOT NULL,
  `fc_primary` longtext NOT NULL,
  `sensor` varchar(255) NOT NULL,
  `flash` varchar(255) NOT NULL,
  `vr_rear` longtext NOT NULL,
  `vr_front` longtext NOT NULL,
  `eis` varchar(255) NOT NULL,
  `c_feature` longtext NOT NULL,
  `shoot` longtext NOT NULL,
  PRIMARY KEY (`id`)
)");



mysqli_query(dbcon(),"ALTER TABLE  `email7` ADD  `pid` VARCHAR( 222 ) NOT NULL");




if(@$_REQUEST['action']=="del")



			{



			 $sql    = "DELETE FROM `email7` WHERE `id`='$_REQUEST[id]'";



			$result = mysqli_query(dbcon(),$sql);



			header("Location:features.php");





            }





?>





<!DOCTYPE html>



<html lang="en">



<head>



<title><?php include('title.php'); ?></title>



<meta charset="UTF-8" />



<meta name="viewport" content="width=device-width, initial-scale=1.0" />



<link rel="stylesheet" href="css/bootstrap.min.css" />



<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />



<link rel="stylesheet" href="css/uniform.css" />



<link rel="stylesheet" href="css/select2.css" />



<link rel="stylesheet" href="css/matrix-style.css" />



<link rel="stylesheet" href="css/matrix-media.css" />



<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />



<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />



<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />



<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



</head>



<body>



<!--top-Header-menu-->



<?php include('top.php'); ?>



<!--start-top-serch-->





<!--sidebar-menu-->





<?php include('left.php'); ?>



<div id="content">



  <div id="content-header">



    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Features</a> </div>



    <h1>Features List</h1>



   <?php /*?><p style="text-align:right;"><a href="sub_sub_menu.php"><button type="button" class="btn btn-success">Add Feature</button></a></p><?php */?>



  </div>      







      <?php //if(@$_REQUEST['action']=="") 
	  { ?>   





  <div class="container-fluid">



    <hr>



    <div class="row-fluid">



      <div class="span12">

    

        <div class="widget-box">



          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>



            <h5>Features List</h5>



          </div>







          <div class="widget-content nopadding">



            <table class="table table-bordered data-table">



              <thead>



                <tr>



                    <th>S.No</th>



					<th>Chipset</th>



                    <th>Ram</th>



					<th>Edit</th>



                    <th>Remove</th>



                </tr>



              </thead>



              <tbody>







                <?php



								$iCnt = "0"; 



								$query ="select * from `email7` where `pid`='$_REQUEST[pid]' order by `id` asc";



								$rsquery = mysqli_query(dbcon(),$query);



								while(@$rsdata = mysqli_fetch_object($rsquery))



				                { 



					              $iCnt++;



					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }



								?>



                                    <tr class="<?php echo $alagar; ?>">



                                        <td align="center"><?php echo $iCnt; ?></td>



										<td align="center"><?php echo $rsdata->chipset; ?></td>



                                      	<td align="center"><?php echo $rsdata->ram; ?></td>



                                        <td class="center" style="text-align:center;" ><a href="features.php?action=edit&id=<?php echo $rsdata->id; ?>&pid=<?php echo $rsdata->pid; ?> "><i class="icon-pencil"></i></a></td>



                                        <td class="center" style="text-align:center;"><a href="features.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>



                                    </tr>



                                    <?php } ?>               





              </tbody>



            </table>



          </div>



        </div>





        <?php } ?>



        







     <?php
	 
	 
	 $queryv ="select * from `email7` where `pid`='$_REQUEST[pid]'";



								$rsqueryv = mysqli_query(dbcon(),$queryv);



								@$rsdatav = mysqli_num_rows($rsqueryv);
	 
	 if(@$rsdatav<='0') {
	 
	 
	  if(@$_REQUEST['action']=="add") { ?>     





        <div class="container-fluid"><hr>



    <div class="row-fluid">



      <div class="span12">



        <div class="widget-box">



          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>



            <h5>Create New Image</h5>



          </div>







<?php





   			if(@$_REQUEST['Save']=='1') {



		$register_query="insert into `email7` (`chipset`,`cores`,`cpu`,`architec`,`fabric`,`ram`,`ram_type`,`graphics`,`build`,`height`,`width`,`thick`,`weight`,`color`,`water`,`resolution`,`display_type`,`size`,`bezel`,`pixel`,`bright`,`protection`,`color_re`,`screen`,`b_type`,`capacity`,`removable`,`fast_charge`,`charge_speed`,`os`,`ui`,`internal`,`memory_type`,`storage`,`expand`,`sim`,`network`,`fiveg`,`lte`,`wifi`,`wifi_f`,`bluetooth`,`usb`,`otg`,`gps`,`nfc`,`infrared`,`speaker`,`audio`,`video`,`speaker_f`,`finger_print`,`face`,`other`,`c_setup`,`c_secondary`,`c_tertiary`,`fc_setup`,`fc_primary`,`sensor`,`flash`,`vr_rear`,`vr_front`,`eis`,`c_feature`,`shoot`,`pid`) values('$_REQUEST[chipset]','$_REQUEST[cores]','$_REQUEST[cpu]','$_REQUEST[architec]','$_REQUEST[fabric]','$_REQUEST[ram]','$_REQUEST[ram_type]','$_REQUEST[graphics]','$_REQUEST[build]','$_REQUEST[height]','$_REQUEST[width]','$_REQUEST[thick]','$_REQUEST[weight]','$_REQUEST[color]','$_REQUEST[water]','$_REQUEST[resolution]','$_REQUEST[display_type]','$_REQUEST[size]','$_REQUEST[bezel]','$_REQUEST[pixel]','$_REQUEST[bright]','$_REQUEST[protection]','$_REQUEST[color_re]','$_REQUEST[screen]','$_REQUEST[b_type]','$_REQUEST[capacity]','$_REQUEST[removable]','$_REQUEST[fast_charge]','$_REQUEST[charge_speed]','$_REQUEST[os]','$_REQUEST[ui]','$_REQUEST[internal]','$_REQUEST[memory_type]','$_REQUEST[storage]','$_REQUEST[expand]','$_REQUEST[sim]','$_REQUEST[network]','$_REQUEST[fiveg]','$_REQUEST[lte]','$_REQUEST[wifi]','$_REQUEST[wifi_f]','$_REQUEST[bluetooth]','$_REQUEST[usb]','$_REQUEST[otg]','$_REQUEST[gps]','$_REQUEST[nfc]','$_REQUEST[infrared]','$_REQUEST[speaker]','$_REQUEST[audio]','$_REQUEST[video]','$_REQUEST[speaker_f]','$_REQUEST[finger_print]','$_REQUEST[face]','$_REQUEST[other]','$_REQUEST[c_setup]','$_REQUEST[c_secondary]','$_REQUEST[c_tertiary]','$_REQUEST[fc_setup]','$_REQUEST[fc_primary]','$_REQUEST[sensor]','$_REQUEST[flash]','$_REQUEST[vr_rear]','$_REQUEST[vr_front]','$_REQUEST[eis]','$_REQUEST[c_feature]','$_REQUEST[shoot]','$_REQUEST[pid]')";





		mysqli_query(dbcon(),$register_query);



	 	header('location:features.php?pid='.$_REQUEST['pid']);





	} 





   ?>







        <div class="widget-content nopadding">





            <form id="form-wizard" name="form-wizard" class="form-horizontal" method="post" action="features.php?action=add&Save=1" enctype="multipart/form-data">

<input type="hidden" name="pid" value="<?php echo @$_REQUEST['pid']; ?>" >



              <div id="form-wizard-1" class="step">

              

              

              	<div class="control-group">



                   <h3 style="text-align:right; width:180px;">Performance</h3> 



                </div>

              

                



				<div class="control-group">



                  <label class="control-label">Chipset</label>



                  <div class="controls">



                   <input name="chipset" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

               

                <div class="control-group">



                  <label class="control-label">Number of Cores</label>



                  <div class="controls">



                   <input name="cores" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">CPU</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="cpu"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Architecture</label>



                  <div class="controls">



                   <input name="architec" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Fabrication</label>



                  <div class="controls">



                   <input name="fabric" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">RAM</label>



                  <div class="controls">



                   <input name="ram" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">RAM Type</label>



                  <div class="controls">



                   <input name="ram_type" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Graphics</label>



                  <div class="controls">



                   <input name="graphics" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Design</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Build</label>



                  <div class="controls">



                   <input name="build" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Height</label>



                  <div class="controls">



                   <input name="height" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Width</label>



                  <div class="controls">



                   <input name="width" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Thickness</label>



                  <div class="controls">



                   <input name="thick" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Weight</label>



                  <div class="controls">



                   <input name="weight" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Colors</label>



                  <div class="controls">



                   <input name="color" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Water Resistant</label>



                  <div class="controls">



                   <input name="water" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Display</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Resolution</label>



                  <div class="controls">



                   <input name="resolution" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Display Type</label>



                  <div class="controls">



                   <input name="display_type" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Size</label>



                  <div class="controls">



                   <input name="size" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Bezel-less Display</label>



                  <div class="controls">



                   <input name="bezel" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Pixel Density</label>



                  <div class="controls">



                   <input name="pixel" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Brightness</label>



                  <div class="controls">



                   <input name="bright" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Protection</label>



                  <div class="controls">



                   <input name="protection" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Color Reproduction</label>



                  <div class="controls">



                   <input name="color_re" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Screen to Body Percentage</label>



                  <div class="controls">



                   <input name="screen" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Camera</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Rear Camera Setup</label>



                  <div class="controls">



                   <input name="c_setup" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Rear Camera (Secondary)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="c_secondary"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Rear Camera (Tertiary)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="c_tertiary"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Front Camera Setup</label>



                  <div class="controls">



                   <input name="fc_setup" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Front Camera (Primary)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="fc_primary"></textarea>



                  </div>



                </div>

                

                

                 <div class="control-group">



                  <label class="control-label">Sensor</label>



                  <div class="controls">



                   <input name="sensor" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Flash</label>



                  <div class="controls">



                   <input name="flash" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Video Resolution (Rear)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="vr_rear"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Video Resolution (Front)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="vr_front"></textarea>



                  </div>



                </div>

                

                

                 <div class="control-group">



                  <label class="control-label">Electric Image Stabilization (EIS)</label>



                  <div class="controls">



                   <input name="eis" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Camera Features</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="c_feature"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Shooting Modes</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="shoot"></textarea>



                  </div>



                </div>

                

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Battery</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Type</label>



                  <div class="controls">



                   <input name="b_type" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

               <div class="control-group">



                  <label class="control-label">Capacity</label>



                  <div class="controls">



                   <input name="capacity" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Removable</label>



                  <div class="controls">



                   <input name="removable" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Fast Charging</label>



                  <div class="controls">



                   <input name="fast_charge" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Charging Speed</label>



                  <div class="controls">



                   <input name="charge_speed" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Software</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Operating System</label>



                  <div class="controls">



                   <input name="os" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Custom UI</label>



                  <div class="controls">



                   <input name="ui" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Storage</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Internal Memory</label>



                  <div class="controls">



                   <input name="internal" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Memory Type</label>



                  <div class="controls">



                   <input name="memory_type" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Storage Available for User</label>



                  <div class="controls">



                   <input name="storage" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Expandable Memory</label>



                  <div class="controls">



                   <input name="expand" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Connectivity</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">SIM Configration</label>



                  <div class="controls">



                   <input name="sim" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Network</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="network"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">5G Support</label>



                  <div class="controls">



                   <input name="fiveg" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Voice Over LTE</label>



                  <div class="controls">



                   <input name="lte" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Wi-Fi</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="wifi"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Wi-Fi Features</label>



                  <div class="controls">



                   <input name="wifi_f" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Bluetooth</label>



                  <div class="controls">



                   <input name="bluetooth" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">USB</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="usb"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">USB OTG Support</label>



                  <div class="controls">



                   <input name="otg" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">GPS</label>



                  <div class="controls">



                   <input name="gps" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">NFC Chipset</label>



                  <div class="controls">



                   <input name="nfc" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Infrared</label>



                  <div class="controls">



                   <input name="infrared" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                 <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Sound</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Speaker</label>



                  <div class="controls">



                   <input name="speaker" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Audio Jack</label>



                  <div class="controls">



                   <input name="audio" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Video Player</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="video"></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Speaker Features</label>



                  <div class="controls">



                   <input name="speaker_f" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Sensors</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Finger Print Sensor</label>



                  <div class="controls">



                   <input name="finger_print" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Face Unlock</label>



                  <div class="controls">



                   <input name="face" type="text" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Other Sensor</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="other"></textarea>



                  </div>



                </div>

                

                

                

                

                

				





              </div>







              <div class="form-actions">



                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />



                <a href="sub_sub_menu.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>



                <div id="status"></div>



              </div>





              <div id="submitted"></div>



            </form>





          </div>





        </div>





        </div></div></div>







    <?php } } ?>    



        







        







        <?php 



		    if(@$_REQUEST['action']=='up') {



 			$strFileName = $_FILES['banner_img']['name'];



			$strFileSize = $_FILES['banner_img']['size'];



			$strTempFileName = $_FILES['banner_img']['tmp_name'];



			$strFilepath = "../Products/Large/";



			copy($strTempFileName,$strFilepath.$strFileName);



     		if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }







	$register_query="update `email7` set `chipset`='$_REQUEST[chipset]',`cores`='$_REQUEST[cores]',`cpu`='$_REQUEST[cpu]',`architec`='$_REQUEST[architec]',`fabric`='$_REQUEST[fabric]',`ram`='$_REQUEST[ram]',`ram_type`='$_REQUEST[ram_type]',`graphics`='$_REQUEST[graphics]',`build`='$_REQUEST[build]',`height`='$_REQUEST[height]',`width`='$_REQUEST[width]',`thick`='$_REQUEST[thick]',`weight`='$_REQUEST[weight]',`color`='$_REQUEST[color]',`water`='$_REQUEST[water]',`resolution`='$_REQUEST[resolution]',`display_type`='$_REQUEST[display_type]',`size`='$_REQUEST[size]',`bezel`='$_REQUEST[bezel]',`pixel`='$_REQUEST[pixel]',`bright`='$_REQUEST[bright]',`protection`='$_REQUEST[protection]',`color_re`='$_REQUEST[color_re]',`screen`='$_REQUEST[screen]',`b_type`='$_REQUEST[b_type]',`capacity`='$_REQUEST[capacity]',`removable`='$_REQUEST[removable]',`fast_charge`='$_REQUEST[fast_charge]',`charge_speed`='$_REQUEST[charge_speed]',`os`='$_REQUEST[os]',`ui`='$_REQUEST[ui]',`internal`='$_REQUEST[internal]',`memory_type`='$_REQUEST[memory_type]' ,`storage`='$_REQUEST[storage]',`expand`='$_REQUEST[expand]',`sim`='$_REQUEST[sim]',`network`='$_REQUEST[network]',`fiveg`='$_REQUEST[fiveg]',`lte`='$_REQUEST[lte]',`wifi`='$_REQUEST[wifi]',`wifi_f`='$_REQUEST[wifi_f]',`bluetooth`='$_REQUEST[bluetooth]',`usb`='$_REQUEST[usb]',`otg`='$_REQUEST[otg]',`gps`='$_REQUEST[gps]',`nfc`='$_REQUEST[nfc]',`infrared`='$_REQUEST[infrared]',`speaker`='$_REQUEST[speaker]',`audio`='$_REQUEST[audio]',`video`='$_REQUEST[video]',`speaker_f`='$_REQUEST[speaker_f]' ,`finger_print`='$_REQUEST[finger_print]',`face`='$_REQUEST[face]',`other`='$_REQUEST[other]',`c_setup`='$_REQUEST[c_setup]',`c_secondary`='$_REQUEST[c_secondary]',`c_tertiary`='$_REQUEST[c_tertiary]',`fc_setup`='$_REQUEST[fc_setup]',`fc_primary`='$_REQUEST[fc_primary]',`sensor`='$_REQUEST[sensor]',`flash`='$_REQUEST[flash]',`vr_rear`='$_REQUEST[vr_rear]',`vr_front`='$_REQUEST[vr_front]',`eis`='$_REQUEST[eis]',`c_feature`='$_REQUEST[c_feature]',`shoot`='$_REQUEST[shoot]',`pid`='$_REQUEST[pid]' where `id`='$_REQUEST[id]'";





		mysqli_query(dbcon(),$register_query); 



	 	header('location:features.php?pid='.$_REQUEST['pid']);





	} 



	?>



	



	<?php	



				if(@$_REQUEST['action']=="edit") { 



				$Sql ="select * from `email7` where `id`='$_REQUEST[id]'";



				$rs=mysqli_query(dbcon(),$Sql);



				//echo @mysqli_error();



				$rsdata1 =mysqli_fetch_object($rs);



				?>





         <div class="container-fluid"><hr>





    <div class="row-fluid">



      <div class="span12">



        <div class="widget-box">



          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>



            <h5>Edit Image</h5>



          </div>





          <div class="widget-content nopadding">



            <form  name="thisForm" class="form-horizontal" method="post" action="features.php?action=up" enctype="multipart/form-data">

            <input type="hidden" name="pid" value="<?php echo @$_REQUEST['pid']; ?>" >

            <input type="hidden" name="id" value="<?php echo @$_REQUEST['id']; ?>">



            <div id="form-wizard-1" class="step">

                

                

               <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Performance</h3> 



                </div> 

                

               

                

               <div class="control-group">



                  <label class="control-label">Chipset</label>



                  <div class="controls">



                   <input name="chipset" type="text" value="<?php echo $rsdata1->chipset; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Number of Cores</label>



                  <div class="controls">



                   <input name="cores" type="text" value="<?php echo $rsdata1->cores; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">CPU</label>



                  <div class="controls">



            		<textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="cpu"><?php echo $rsdata1->cpu; ?></textarea>



                 </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Architecture</label>



                  <div class="controls">



                   <input name="architec" type="text" value="<?php echo $rsdata1->architec; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Fabrication</label>



                  <div class="controls">



                   <input name="fabric" type="text" value="<?php echo $rsdata1->fabric; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">RAM</label>



                  <div class="controls">



                   <input name="ram" type="text" value="<?php echo $rsdata1->ram; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">RAM Type</label>



                  <div class="controls">



                   <input name="ram_type" type="text" value="<?php echo $rsdata1->ram_type; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Graphics</label>



                  <div class="controls">



                   <input name="graphics" type="text" value="<?php echo $rsdata1->graphics; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               

               

               

               <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Design</h3> 



                </div> 

                

                

               <div class="control-group">



                  <label class="control-label">Build</label>



                  <div class="controls">



                   <input name="build" type="text" value="<?php echo $rsdata1->build; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Height</label>



                  <div class="controls">



                   <input name="height" type="text" value="<?php echo $rsdata1->height; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Width</label>



                  <div class="controls">



                   <input name="width" type="text" value="<?php echo $rsdata1->width; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Thickness</label>



                  <div class="controls">



                   <input name="thick" type="text" value="<?php echo $rsdata1->thick; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Weight</label>



                  <div class="controls">



                   <input name="weight" type="text" value="<?php echo $rsdata1->weight; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Colors</label>



                  <div class="controls">



                   <input name="color" type="text" value="<?php echo $rsdata1->color; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Water Resistant</label>



                  <div class="controls">



                   <input name="water" type="text" value="<?php echo $rsdata1->water; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               

               

               

               

               

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Display</h3> 



                </div> 

               

               

               <div class="control-group">



                  <label class="control-label">Resolution</label>



                  <div class="controls">



                   <input name="resolution" type="text" value="<?php echo $rsdata1->resolution; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Display Type</label>



                  <div class="controls">



                   <input name="display_type" type="text" value="<?php echo $rsdata1->display_type; ?>" class="normal" style="width:250px;">



                  </div>



               </div>

               

               

               <div class="control-group">



                  <label class="control-label">Size</label>



                  <div class="controls">



                   <input name="size" type="text" value="<?php echo $rsdata1->size; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Bezel-less Display</label>



                  <div class="controls">



                   <input name="bezel" type="text" value="<?php echo $rsdata1->bezel; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Pixel Density</label>



                  <div class="controls">



                   <input name="pixel" type="text" value="<?php echo $rsdata1->pixel; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Brightness</label>



                  <div class="controls">



                   <input name="bright" type="text" value="<?php echo $rsdata1->bright; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Protection</label>



                  <div class="controls">



                   <input name="protection" type="text" value="<?php echo $rsdata1->protection; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Color Reproduction</label>



                  <div class="controls">



                   <input name="color_re" type="text" value="<?php echo $rsdata1->color_re; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Screen to Body Percentage</label>



                  <div class="controls">



                   <input name="screen" type="text" value="<?php echo $rsdata1->screen; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                

                 <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Camera</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Rear Camera Setup</label>



                  <div class="controls">



                   <input name="c_setup" type="text" value="<?php echo $rsdata1->c_setup; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Rear Camera (Secondary)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="c_secondary"><?php echo $rsdata1->c_secondary; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Rear Camera (Tertiary)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="c_tertiary"><?php echo $rsdata1->c_tertiary; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Front Camera Setup</label>



                  <div class="controls">



                   <input name="fc_setup" type="text" value="<?php echo $rsdata1->fc_setup; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Front Camera (Primary)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="fc_primary"><?php echo $rsdata1->fc_primary; ?></textarea>



                  </div>



                </div>

                

                

                 <div class="control-group">



                  <label class="control-label">Sensor</label>



                  <div class="controls">



                   <input name="sensor" type="text" value="<?php echo $rsdata1->sensor; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Flash</label>



                  <div class="controls">



                   <input name="flash" type="text" value="<?php echo $rsdata1->flash; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Video Resolution (Rear)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="vr_rear"><?php echo $rsdata1->vr_rear; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Video Resolution (Front)</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="vr_front"><?php echo $rsdata1->vr_front; ?></textarea>



                  </div>



                </div>

                

                

                 <div class="control-group">



                  <label class="control-label">Electric Image Stabilization (EIS)</label>



                  <div class="controls">



                   <input name="eis" type="text" value="<?php echo $rsdata1->eis; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Camera Features</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="c_feature"><?php echo $rsdata1->c_feature; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Shooting Modes</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="shoot"><?php echo $rsdata1->shoot; ?></textarea>



                  </div>



                </div>

                

                

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Battery</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Type</label>



                  <div class="controls">



                   <input name="b_type" type="text" value="<?php echo $rsdata1->b_type; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

               <div class="control-group">



                  <label class="control-label">Capacity</label>



                  <div class="controls">



                   <input name="capacity" type="text" value="<?php echo $rsdata1->capacity; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Removable</label>



                  <div class="controls">



                   <input name="removable" type="text" value="<?php echo $rsdata1->removable; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Fast Charging</label>



                  <div class="controls">



                   <input name="fast_charge" type="text" value="<?php echo $rsdata1->fast_charge; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Charging Speed</label>



                  <div class="controls">



                   <input name="charge_speed" type="text" value="<?php echo $rsdata1->charge_speed; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Software</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Operating System</label>



                  <div class="controls">



                   <input name="os" type="text" value="<?php echo $rsdata1->os; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Custom UI</label>



                  <div class="controls">



                   <input name="ui" type="text" value="<?php echo $rsdata1->ui; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Storage</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Internal Memory</label>



                  <div class="controls">



                   <input name="internal" type="text" value="<?php echo $rsdata1->internal; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Memory Type</label>



                  <div class="controls">



                   <input name="memory_type" type="text" value="<?php echo $rsdata1->memory_type; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Storage Available for User</label>



                  <div class="controls">



                   <input name="storage" type="text" value="<?php echo $rsdata1->storage; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Expandable Memory</label>



                  <div class="controls">



                   <input name="expand" type="text" value="<?php echo $rsdata1->expand; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Connectivity</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">SIM Configration</label>



                  <div class="controls">



                   <input name="sim" type="text" value="<?php echo $rsdata1->sim; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Network</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="network"><?php echo $rsdata1->network; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">5G Support</label>



                  <div class="controls">



                   <input name="fiveg" type="text" class="normal" value="<?php echo $rsdata1->fiveg; ?>" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Voice Over LTE</label>



                  <div class="controls">



                   <input name="lte" type="text" class="normal" value="<?php echo $rsdata1->lte; ?>" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Wi-Fi</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="wifi"><?php echo $rsdata1->wifi; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Wi-Fi Features</label>



                  <div class="controls">



                   <input name="wifi_f" type="text" value="<?php echo $rsdata1->wifi_f; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Bluetooth</label>



                  <div class="controls">



                   <input name="bluetooth" type="text" value="<?php echo $rsdata1->bluetooth; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">USB</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="usb"><?php echo $rsdata1->usb; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">USB OTG Support</label>



                  <div class="controls">



                   <input name="otg" type="text" value="<?php echo $rsdata1->otg; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">GPS</label>



                  <div class="controls">



                   <input name="gps" type="text" value="<?php echo $rsdata1->gps; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">NFC Chipset</label>



                  <div class="controls">



                   <input name="nfc" type="text" value="<?php echo $rsdata1->nfc; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Infrared</label>



                  <div class="controls">



                   <input name="infrared" type="text" value="<?php echo $rsdata1->infrared; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

				

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Sound</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Speaker</label>



                  <div class="controls">



                   <input name="speaker" type="text" value="<?php echo $rsdata1->speaker; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Audio Jack</label>



                  <div class="controls">



                   <input name="audio" type="text" value="<?php echo $rsdata1->audio; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Video Player</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="video"><?php echo $rsdata1->video; ?></textarea>



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Speaker Features</label>



                  <div class="controls">



                   <input name="speaker_f" type="text" value="<?php echo $rsdata1->speaker_f; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                

                

                

                

                

                <div class="control-group">



                   <h3 style="text-align:right; width:180px;">Sensors</h3> 



                </div>

                                



				<div class="control-group">



                  <label class="control-label">Finger Print Sensor</label>



                  <div class="controls">



                   <input name="finger_print" type="text" value="<?php echo $rsdata1->finger_print; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Face Unlock</label>



                  <div class="controls">



                   <input name="face" type="text" value="<?php echo $rsdata1->face; ?>" class="normal" style="width:250px;">



                  </div>



                </div>

                

                

                <div class="control-group">



                  <label class="control-label">Other Sensor</label>



                  <div class="controls">



                   <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." name="other"><?php echo $rsdata1->other; ?></textarea>



                  </div>



                </div>







				



              </div>

           





              <div class="form-actions">



                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />



                <a href="features.php??action=add&pid=<?php echo @$_REQUEST['pid']; ?>"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>



                <div id="status"></div>



              </div>



              <div id="submitted"></div>







            </form>



          </div>



        </div>



        </div></div></div>







        <?php } ?>









      </div>



    </div>



  </div>



</div>







<!--Footer-part-->







<?php include('footer.php'); ?>







<!--end-Footer-part-->







<script src="js/jquery.min.js"></script> 







<script src="js/jquery.ui.custom.js"></script> 







<script src="js/bootstrap.min.js"></script> 







<script src="js/jquery.uniform.js"></script> 







<script src="js/select2.min.js"></script> 







<script src="js/jquery.dataTables.min.js"></script> 







<script src="js/matrix.js"></script> 







<script src="js/matrix.tables.js"></script>















 















<script src="js/wysihtml5-0.3.0.js"></script> 























<script src="js/jquery.peity.min.js"></script> 







<script src="js/bootstrap-wysihtml5.js"></script> 







<script>







	$('.textarea_editor').wysihtml5();







</script>







<script>







	$('.textarea_editor1').wysihtml5();







</script>































</body>







</html>







