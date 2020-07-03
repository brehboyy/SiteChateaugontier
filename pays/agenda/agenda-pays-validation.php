<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Agenda du Pays de Ch&acirc;teau-Gontier | Demande</title>

<?php

include('../pays/acces/connect.php');
$connect;
$base;
 

if (isset($_POST['IdValidation'])) {

 $IdValidation = $_POST['IdValidation'];	
	
 $Titre = $_POST['titre'];
 $Date = $_POST['date'];
 $Lieu = $_POST['lieu'];
 $Texte = $_POST['texte'];
 $Telephone = $_POST['telephone'];
 $Courriel1 = $_POST['courriel1'];
 $Site = $_POST['site'];
 
 $Jour = $_POST['jour'];
 $Mois = $_POST['mois'];
 $Annee = $_POST['annee'];
 
 $Fin = $Annee."-".$Mois."-".$Jour ; 
 
	mysql_query("UPDATE `chateaugrchio`.`pays_agenda` SET `Titre` = '$Titre', `Date` = '$Date', `Lieu` = '$Lieu',`Texte` = '$Texte', `Telephone` = '$Telephone', `Courriel1` = '$Courriel1', `Site` = '$Site', `Fin` = '$Fin' WHERE `pays_agenda`.`Numero` = '$IdValidation';");
	
	
	$Message = "La validation de l'entrée d'agenda <i>".$Titre."</i> est effective." ; 

} 

?>
<style type="text/css">
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 12px;
	color: #000;
}
</style>
</head>

<body>

<table width="750" border="0" cellspacing="0" cellpadding="0">

<?php
  if ($Message != '') {
  echo "
  <tr height=40 >
     <td colspan=3 align=center bgcolor=#FF0000><font color=#FFFFFF >".$Message."</font></td>
  </tr>
  <tr>
    <td align=right>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  }
?>
  

  </table>

</body>
</html>
