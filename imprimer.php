<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';">
<title>Pays de Château-gontier</title>

<?php

include('pays/acces/connect.php');
$connect;
$base;

?>

<link href="script/style.css" rel="stylesheet" type="text/css" />
<link href="script/contenu.css" rel="stylesheet" type="text/css" />




</head>

<body onload=imprimer() >

		<div class="impression">
                        
                 <?php
					$page = $_GET['page'];
                 	$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
                 	$page = (int)$page;
					include('pays/page/page.php');
							
						
				?>
			
		</div>
				


  
  
</body>
</html>