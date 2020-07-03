 <html xmlns="http://www.w3.org/1999/xhtml">

<head> 
<title>Pays de Ch�teau-Gontier - Newsletter</title>	
</head>

<body bgcolor="#FFFFFF">

<?php				
include('acces/connect.php');
$connect;
$base;

				$Lien = $_GET['lien'];
				$Lien = htmlspecialchars($Lien, ENT_QUOTES, 'UTF-8');
				$Id = $_GET['id'];
				$Id = htmlspecialchars($Id, ENT_QUOTES, 'UTF-8');
				
				$requete = mysql_query("SELECT * FROM newsletter_mail WHERE Numero = '$Id' LIMIT 1") ;
				
				while ($ligne=mysql_fetch_object($requete)) {		
				
						$Abonne = $ligne->Email." - ".$ligne->Numero ;
						mysql_query("INSERT INTO `newsletter_liens` (`Abonne` , `Lien` , `Newsletter` ) VALUES ('$Abonne' , '$Lien' , '15');") ;
					
								if ($Lien == '1') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.chateaugontier.fr/index.php?page=427'\">";
								}
								if ($Lien == '2') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.chateaugontier.fr/index.php?page=424'\">";
								}
								if ($Lien == '3') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.chateaugontier.fr/index.php?page=425'\">";
								}								
								if ($Lien == '4') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.chateaugontier.fr/index.php?page=425'\">";
								}
								if ($Lien == '5') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.chateaugontier.fr/index.php?page=427'\">";
								}
								if ($Lien == '6') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.chateaugontier.fr/index.php?agenda'\">";
								}
								if ($Lien == '7') {
									echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL='http://www.facebook.fr/chateaugontier.pays'\">";
								}
							
				}
				
?>

</body>

</html>