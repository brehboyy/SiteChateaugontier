<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Agenda du Pays de Ch&acirc;teau-Gontier | Demande</title>

<?php

include('../pays/acces/connect.php');
$connect;
$base;
 

if (isset($_POST['commune'])) {

 $Commune = $_POST['commune'];
 $Titre = $_POST['titre'];
 $Date = $_POST['date'];
 $Lieu = $_POST['lieu'];
 $Texte = $_POST['texte'];
 $Telephone = $_POST['telephone'];
 $Courriel1 = $_POST['courriel1'];
 $Site = $_POST['site'];
 $Courriel2 = $_POST['courriel2'];
 $Controle = $_POST['controle'];
 $Controle2 = $_POST['controle2'];
 
	//$requeteMax = mysql_query("SELECT MAX(Numero) AS Maximum FROM  `chateaugrchio`.`pays_agenda`  ") ; 
	$requeteMax = $pdo->prepare("SELECT MAX(Numero) AS Maximum FROM  `chateaugrchio`.`pays_agenda`  ");
	$requeteMax->execute(array($Id));
	$lignesMax = $requeteMax->fetchAll(PDO::FETCH_CLASS);

	foreach ($lignesMax as $ligneMax) {
		$Numero = $ligneMax->Maximum + 1 ;
	}
 
 if ($Controle == $Controle2) {
 
	mysql_query("INSERT INTO `chateaugrchio`.`pays_agenda` (`Numero`, `Commune`, `Titre`, `Date`, `Lieu`, `Texte`, `Telephone`, `Courriel1`, `Site`, `Courriel2`, `Debut`, `Fin`) VALUES ('$Numero', '$Commune', '$Titre', '$Date', '$Lieu', '$Texte', '$Telephone', '$Courriel1', '$Site', '$Courriel2', '', '')");
	
	$insertQuery = $pdo->prepare("INSERT INTO `chateaugrchio`.`pays_agenda` (`Numero`, `Commune`, `Titre`, `Date`, `Lieu`, `Texte`, `Telephone`, `Courriel1`, `Site`, `Courriel2`, `Debut`, `Fin`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '', '')");
	$requeteMax->execute(array($Numero, $Commune, $Titre, $Date, $Lieu, $Texte, $Telephone, $Courriel1, $Site, $Courriel2));

	$sujet = 'Agenda Pays - demande';

	$email_destinataire = 'test@test.com';
					
	$texte = "Bonjour,<br/><br/>";
	$texte .= "une nouvelle entr�e dans l'agenda est demand�e par la commune de ".$Commune." :<br/><br/>";
	$texte .= "Pour la voir cliquez sur le <a href=http://www.chateaugontier.fr/test/agenda-pays-demande.php?Id=".$Numero.">lien suivant</a>";				
					
	$headers ='From: "Pays de Ch�teau-Gontier"<test@test.com>'."\n";
	$headers .='Return-Path: test@test.com'."\n";
	$headers .='Reply-To: '.$email.''."\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .='Content-Transfer-Encoding: 8bit';				                   
											
	mail($email_destinataire,$sujet,$texte,$headers);
	
	$Message = "Votre demande a bien �t� envoy�e." ;
 
 }
 else {
 
	$Message = "Le contr�le anti-spam n'est pas correct.<br/><br/><input type=button name=lien1 value=Retour onclick='history.go(-1)'>" ;	
 
 }

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
  <tr height=80 >
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
