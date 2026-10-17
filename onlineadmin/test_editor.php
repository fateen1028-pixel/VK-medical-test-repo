<?php


session_start();

ob_start();





include("editor/FCKEditor/fckeditor.php");

$sBasePath = "editor/FCKEditor/";

?>

				

				<?

					    $oFCKeditor = new FCKeditor('hfshf');

						$oFCKeditor->BasePath = $sBasePath ;

						$oFCKeditor->Width		= '550' ;

						$oFCKeditor->Height		= '350' ;

						$oFCKeditor->ToolbarSet = "Default";

						$oFCKeditor->Value = "";

						$oFCKeditor->Create(); 

		           ?>