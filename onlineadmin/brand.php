<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();





mysqli_query(dbcon(),"ALTER TABLE  `brand` ADD  `logo` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `brand` ADD  `discount` VARCHAR( 222 ) NOT NULL");
mysqli_query(dbcon(),"ALTER TABLE  `brand` ADD  `link` VARCHAR( 222 ) NOT NULL");



if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }













if(@$_REQUEST['action']=="del")



			{



			 $sql    = "DELETE FROM `brand` WHERE `id`='$_REQUEST[id]'";



			$result = mysqli_query(dbcon(),$sql);





			header("Location:brand.php");



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









</head>

<body>



<!--Header-part-->



<!--close-Header-part--> 



<!--top-Header-menu-->

<?php include('top.php'); ?>



<!--start-top-serch-->

<!--<div id="search">

  <input type="text" placeholder="Search here..."/>

  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>

</div>-->

<!--close-top-serch--> 



<!--sidebar-menu-->



<?php include('left.php'); ?>

<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Advertisement</a> </div>

    <h1>Advertisement</h1>

    <?php /*?><p style="text-align:right;"><a href="brand.php?action=add"><button type="button" class="btn btn-success">Add New</button></a></p><?php */?>

  </div>

  





 

      

      <?php if(@$_REQUEST['action']=="") { ?>   

      

      

       <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

       

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Advertisement List</h5>

          </div>

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

              <thead>

                <tr>

                    <th>S.No</th>

                    <th>Website</th>
                    <th>Discount</th>
                    <th>Link</th>

					<th>Banner</th>

                    <th>Edit</th>

                    <?php /*?><th>Remove</th><?php */?>

                </tr>

              </thead>

              <tbody>

                <!--<tr class="gradeX">

                  <td>Trident</td>

                  <td>Internet

                    Explorer 4.0</td>

                  <td>Win 95+</td>

                  <td class="center">4</td>

                </tr>-->

                

                <?php

								$iCnt = "0"; 

								$query ="select * from `brand` order by id desc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					              $iCnt++;

								

					

								?>

                                    <tr>

                                        <td align="center"><?php echo $iCnt; ?></td>

                                        <td align="center"><?php echo $rsdata->name; ?></td>
                                        <td align="center"><?php echo $rsdata->discount; ?></td>
                                        <td align="center"><?php echo $rsdata->link; ?></td>

										<td align="center"><img src="../Products/Large/<?php echo $rsdata->logo; ?>" width="100"></td>

                                        <td class="center" ><a href="brand.php?action=edit&id=<?php echo $rsdata->id; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>

                                        <?php /*?><td class="center"  ><a href="brand.php?action=del&id=<?php echo $rsdata->id; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td><?php */?>

                                        

                                    </tr>

                                    <?php } ?>

               

              </tbody>

            </table>

          </div>

        </div>

        

        

        <?php } ?>

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

     <?php if(@$_REQUEST['action']=="add") { ?>     

        

        <div class="container-fluid"><hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

            <h5>Create New</h5>

          </div>

       

<?php



  

   if(@$_REQUEST['Save']=='1') {

   

   

    $strFileName = $_FILES['logo']['name'];

			$strFileSize = $_FILES['logo']['size'];

			$strTempFileName = $_FILES['logo']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);

	   

  

	     



		 $register_query="insert into `brand` (`name`,`logo`,`discount`,`link`) values('$_REQUEST[name]','$strFileName','$_REQUEST[discount]','$_REQUEST[link]')";



		mysqli_query(dbcon(),$register_query);



		//echo mysqli_error();



	 	header('location:brand.php');



	} 



	

   

   ?>

          

        

        <div class="widget-content nopadding">

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="brand.php?action=add&Save=1" enctype="multipart/form-data">

              <div id="form-wizard-1" class="step">

			  

			  

			  

			  

			  

			  

                

                

                <div class="control-group">

                  <label class="control-label">Website Name</label>

                  <div class="controls">

                    <input type="text"  style="width:250px;" name="name" />

                  </div>

                </div>
                
                <div class="control-group">

                  <label class="control-label">Discount</label>

                  <div class="controls">

                    <input type="text"  style="width:250px;" name="discount" />

                  </div>

                </div>
                
                <div class="control-group">

                  <label class="control-label">Link</label>

                  <div class="controls">

                    <input type="text"  style="width:250px;" name="link" />

                  </div>

                </div>

				

				

			<div class="control-group">



                  <label class="control-label">Banner</label>



                  <div class="controls">



                   <input name="logo" type="file" placeholder="Upload Picture" class="normal">

				   

                  </div>



                </div>

                

              </div>

            

              <div class="form-actions">

                

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="brand.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

                <div id="status"></div>

              </div>

              <div id="submitted"></div>

            </form>

          </div>

          

          

        </div>

        </div></div></div>

        

        

    <?php } ?>    

        

        

        

        <?php if(@$_REQUEST['action']=="edit") { 

   if(@$_REQUEST['Save']=='1') {

   			if($_FILES['logo']['name']!="")
{

         $strFileName = $_FILES['logo']['name'];

			$strFileSize = $_FILES['logo']['size'];

			$strTempFileName = $_FILES['logo']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);


}


     if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }







	$register_query="update `brand` set `name`='$_REQUEST[name]',`logo`='$simg',`discount`='$_REQUEST[discount]',`link`='$_REQUEST[link]'  where `id`='$_REQUEST[id]'";



		mysqli_query(dbcon(),$register_query); 



	 	header('location:brand.php');



	} 





				$Sql ="select * from `brand` where id=$_REQUEST[id]";



				$rs=mysqli_query(dbcon(),$Sql);



				//echo @mysqli_error();



				$rsdata1 =mysqli_fetch_object($rs);



				?>

        

         <div class="container-fluid"><hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

            <h5>Edit</h5>

          </div>

        

          <div class="widget-content nopadding">

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="brand.php?action=edit&Save=1" enctype="multipart/form-data" >

            

            <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">

              <div id="form-wizard-1" class="step">

                

				

				

			  

                

                <div class="control-group">

                  <label class="control-label">Website Name</label>

                  <div class="controls">

                    <input id="email" type="text"  style="width:250px;" name="name" value="<?php echo $rsdata1->name; ?>" />

                  </div>

                </div>
                
                
                <div class="control-group">

                  <label class="control-label">Discount</label>

                  <div class="controls">

                    <input type="text"  style="width:250px;" name="discount" value="<?php echo $rsdata1->discount; ?>" />

                  </div>

                </div>
                
                <div class="control-group">

                  <label class="control-label">Link</label>

                  <div class="controls">

                    <input type="text"  style="width:250px;" name="link" value="<?php echo $rsdata1->link; ?>" />

                  </div>

                </div>

				

				

				

				

				<div class="control-group">



                  <label class="control-label">Banner</label>



                  <div class="controls">



                   <input name="logo" type="file" placeholder="Upload Picture" class="normal">

				    <input type="hidden" name="simg" value="<?php echo $rsdata1->logo; ?>" >

				   

				   <img src="../Products/Large/<?php echo $rsdata1->logo; ?>" width="">

                  </div>



                </div>

				

				

         

                

              </div>

           

              <div class="form-actions">

                

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="brand.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

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







</body>

</html>

