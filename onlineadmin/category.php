<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();









if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }





/*mysqli_query(dbcon(),"ALTER TABLE  `cat` ADD  `meta_name` LONGTEXT NOT NULL ,

ADD  `meta_des` LONGTEXT NOT NULL");*/







if(@$_REQUEST['action']=="del")



			{



			 $sql    = "DELETE FROM `cat` WHERE `id`='$_REQUEST[id]'";



			$result = mysqli_query(dbcon(),$sql);





			header("Location:category.php");



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


<link rel="stylesheet" href="res/style.css" />
<link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
<script type="text/javascript" src="richtexteditor/rte.js"></script>
<script>RTE_DefaultConfig.url_base='richtexteditor'</script>
<script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
<script src="res/patch.js"></script>


</head>

<body>



<!--Header-part-->



<!--close-Header-part--> 



<!--top-Header-menu-->

<?php include('top.php'); ?>


<?php include('left.php'); ?>

<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Category</a> </div>

    <h1>Main Menu List</h1>

    <p style="text-align:right;"><a href="category.php?action=add"><button type="button" class="btn btn-success">Add New Category</button></a></p>

  </div>

  





 

      

      <?php if(@$_REQUEST['action']=="") { ?>   

      

      

       <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

       

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Category List</h5>

          </div>

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

              <thead>

                <tr>

                    <th>S.No</th>

                    <th>Category Name</th>

                    <th>Edit</th>

                    <th>Remove</th>

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

								$query ="select * from `cat` order by id asc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					              $iCnt++;
					

					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }

								?>

                                    <tr class="<?php echo $alagar; ?>">

                                        <td style="text-align:center;"><?php echo $iCnt; ?></td>

                                        <td style="text-align:center;"><?php echo $rsdata->email; ?></td>

                                        <td style="text-align:center;"><a href="category.php?action=edit&id=<?php echo $rsdata->id; ?>"><i class="icon-pencil"></i></a></td>

                                        <td style="text-align:center;"><a href="category.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>

                                        

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

          

          <script language="javascript" type="text/javascript">



	function validate()



	{





	if(document.thisForm.name.value==""){alert("Please Enter Name");document.thisForm.name.focus();return false;}



	}



	function Numchk(num){var numval = num.value; if(isNaN(numval)) { num.value = ""; }}



	</script>

<?php



  

   if(@$_REQUEST['Save']=='1') {

	   

            /*$strFileName = $_FILES['banner_img']['name'];

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);





	 

	 

	        $strFileName1 = $_FILES['img']['name'];

			$strFileSize1 = $_FILES['img']['size'];

			$strTempFileName1 = $_FILES['img']['tmp_name'];

			$strFilepath1 = "../Products/Large/";

			copy($strTempFileName1,$strFilepath1.$strFileName1);

			

			$strFileName2 = $_FILES['img2']['name'];

			$strFileSize2 = $_FILES['img2']['size'];

			$strTempFileName2 = $_FILES['img2']['tmp_name'];

			$strFilepath1 = "../Products/Large/";

			copy($strTempFileName2,$strFilepath2.$strFileName2);

			

			$strFileName3 = $_FILES['img3']['name'];

			$strFileSize3 = $_FILES['img3']['size'];

			$strTempFileName3 = $_FILES['img3']['tmp_name'];

			$strFilepath3 = "../Products/Large/";

			copy($strTempFileName3,$strFilepath3.$strFileName3);

			

			$strFileName4 = $_FILES['img4']['name'];

			$strFileSize4 = $_FILES['img4']['size'];

			$strTempFileName4 = $_FILES['img4']['tmp_name'];

			$strFilepath4 = "../Products/Large/";

			copy($strTempFileName4,$strFilepath4.$strFileName4);*/





		$register_query="insert into `cat` (`email`,`description`) values('$_REQUEST[email]','$_REQUEST[description]')";



		mysqli_query(dbcon(),$register_query);



		//echo mysqli_error();



	 	header('location:category.php');



	} 



	

   

   ?>

          

        

        <div class="widget-content nopadding">

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="category.php?action=add&Save=1" enctype="multipart/form-data">

              <div id="form-wizard-1" class="step">

                

                

                <div class="control-group">

                  <label class="control-label">Category Name</label>

                  <div class="controls">

                    <input type="text"  style="width:90%;" name="email" required />

                  </div>

                </div>

                

               <div class="control-group">

                  <label class="control-label">Description</label>

                  <div class="controls">

                 <?php

				 

									

					    /*$oFCKeditor = new FCKeditor('description');



						$oFCKeditor->BasePath = $sBasePath ;



						$oFCKeditor->Width		= '550' ;



						$oFCKeditor->Height		= '350' ;



						$oFCKeditor->ToolbarSet = "Default";



						@$oFCKeditor->Value = "$rsdata1->description";



						$oFCKeditor->Create();*/

						

						?>

               <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." id="div_editor1" name="description"></textarea>

                 </div>

                </div>

				

				



              <div class="form-actions">

                

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="category.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

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

   

   

   

           $strFileName = $_FILES['meta_name']['name'];

			$strFileSize = $_FILES['meta_name']['size'];

			$strTempFileName = $_FILES['meta_name']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);





     if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }

	 

	  /*

	  $strFileName1 = $_FILES['left_img']['name'];

			$strFileSize1 = $_FILES['left_img']['size'];

			$strTempFileName1 = $_FILES['left_img']['tmp_name'];

			$strFilepath1 = "../Products/Large/";

			copy($strTempFileName1,$strFilepath1.$strFileName1);





     if($strFileName1=="") { $simg1 = $_REQUEST['simg1'];  } else { $simg1 = $strFileName1; }*/

   

   

   





	$register_query="update `cat` set `email`='$_REQUEST[email]',`description`='$_REQUEST[description]',`meta_name`='$simg' where `id`='$_REQUEST[id]'";



		mysqli_query(dbcon(),$register_query); 



	 	header('location:category.php');



	} 





				$Sql ="select * from `cat` where id=$_REQUEST[id]";



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

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="category.php?action=edit&Save=1" enctype="multipart/form-data">

            

            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">

              <div id="form-wizard-1" class="step">

                

                

                <div class="control-group">

                  <label class="control-label">Category Name</label>

                  <div class="controls">

                    <input id="email" type="text"  style="width:90%;" name="email" value="<?php echo $rsdata1->email; ?>" />

                  </div>

                </div>

           <div class="control-group">

                  <label class="control-label">Description</label>

                  <div class="controls">

                 <?php

				 

									

					    /*$oFCKeditor = new FCKeditor('description');



						$oFCKeditor->BasePath = $sBasePath ;



						$oFCKeditor->Width		= '550' ;



						$oFCKeditor->Height		= '350' ;



						$oFCKeditor->ToolbarSet = "Default";



						@$oFCKeditor->Value = "$rsdata1->description";



						$oFCKeditor->Create();*/

						

						?>

               <textarea class="form-control" rows="10" style="width:90%;" placeholder="Enter text ..." id="div_editor1" name="description"><?php echo $rsdata1->description; ?></textarea>

                 </div>

                </div>



<div class="control-group">

                  <label class="control-label">Upload Picture</label>

                  <div class="controls">

                   <input name="meta_name" type="file" placeholder="Upload Picture" class="normal">
				   
				   <input type="hidden" name="simg" value="<?php echo $rsdata1->meta_name; ?>" >
				   
				   <img src="../Products/Large/<?php echo $rsdata1->meta_name; ?>" width="300">
				   
                  </div>

                </div>
				

            

              </div>

           

              <div class="form-actions">

                

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="category.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

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

<script src="https://htmleditor.online/common/editors/ckeditor_4.9.2_standard/ckeditor.js"></script>
<script>
			CKEDITOR.replace( 'editor1',
                {
                    height: 200
                });
				
			CKEDITOR.replace( 'editor2',
                {
                    height: 200
                });
</script>
<script>
			var editor1 = new RichTextEditor("#div_editor1");
			var editor2 = new RichTextEditor("#div_editor2");
			//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
		</script>


</body>

</html>

