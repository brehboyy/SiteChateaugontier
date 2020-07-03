<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Agenda du Pays de Ch&acirc;teau-Gontier | Demande</title>

<?php

include('../pays/acces/connect.php');
$connect;
$base;
 

if (isset($_POST['IdRefus'])) {

 $IdRefus = $_POST['IdRefus'];
 $Refus = $_POST['Refus']; 

 $requeteRefus = mysql_query("SELECT * FROM  `chateaugrchio`.`pays_agenda` WHERE Numero = '$IdRefus' LIMIT 1 ") ;
 while ($ligneRefus=mysql_fetch_object($requeteRefus)) {

	$email_destinataire = $ligneRefus->Courriel2 ;
	$Titre = $ligneRefus->Titre ;
	
 } 
	
	$sujet = 'Agenda Pays - Refus';	
					
	$texte = "Bonjour,<br/><br/>";
	$texte .= "votre demande de mise en ligne de l'�v�nement suivant <i>".$Titre."</i> a �t� rejet�e.<br/><br/>";
	$texte .= "Motif du refus :<br/><br/>".$Refus." ";				
					
	$headers ='From: "Pays de Ch�teau-Gontier"<test@test.com>'."\n";
	$headers .='Return-Path: test@test.com'."\n";
	$headers .='Reply-To: test@test.com'."\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .='Content-Transfer-Encoding: 8bit';				                   
											
	mail($email_destinataire,$sujet,$texte,$headers);
	
	$Message = "Refus bien envoy� � ".$email_destinataire ; 

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
