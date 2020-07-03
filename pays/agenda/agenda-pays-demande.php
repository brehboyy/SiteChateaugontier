<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Agenda du Pays de Ch&acirc;teau-Gontier | Demande</title>

<?php

include('../pays/acces/connect.php');
$connect;
$base;
 
 $Titre = '';
 $Date = '';
 $Lieu = '';
 $Texte = '';
 $Telephone = '';
 $Courriel1 = '';
 $Site = '';
 $Courriel2 = '';
 
 $Validation = 'non';
 
if (isset($_GET['Id'])) {

  $Id = $_GET['Id'];
  $Id = htmlspecialchars($Id, ENT_QUOTES, 'UTF-8');
	//$requeteDemande = mysql_query("SELECT * FROM  `chateaugrchio`.`pays_agenda` WHERE Numero = '$Id' LIMIT 1 ") ;
  $requeteDemande = $pdo->prepare("SELECT * FROM  `chateaugrchio`.`pays_agenda` WHERE Numero = ? LIMIT 1 ");
  $requeteDemande->execute(array($Id));
  $lignesDemande = $requeteDemande->fetchAll(PDO::FETCH_CLASS);
  foreach ($lignesDemande as $ligneDemande) {

		$Validation = 'ok';
		$Commune = $ligneDemande->Commune ;	
		$Titre = $ligneDemande->Titre ;	
		$Date = $ligneDemande->Date ;	
		$Lieu = $ligneDemande->Lieu ;	
		$Texte = $ligneDemande->Texte ;	
		$Telephone = $ligneDemande->Telephone ;	
		$Courriel1 = $ligneDemande->Courriel1 ;	
		$Site = $ligneDemande->Site ;	
		$Courriel2 = $ligneDemande->Courriel2 ;
		
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
<?php
	if ($Validation == 'ok') {
		echo "<form  name=form1 method=post action=agenda-pays-validation.php>";
	}
	else {
		echo "<form  name=form1 method=post action=agenda-pays-mail.php>";
	}
?>
<form id="form1" name="form1" method="post" action="agenda-pays-mail.php">

<table width="750" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="250" align="right">Commune</td>
    <td width="75">&nbsp;</td>
    <td>
	<?php
		if ($Commune != '') {
			echo $Commune ;
		}
		else {
			echo "
		    <select name=commune id=select>
			<option value=0 selected=selected>*************</option>
			<option value=Ampoign� >Ampoign�</option>
			<option value=Argenton-Notre-Dame >Argenton-Notre-Dame</option>
			<option value=Az� >Az�</option>
			<option value=Biern� >Biern�</option>
			<option value=Chatelain >Chatelain</option>
			<option value=Chemaz� >Chemaz�</option>
			<option value=Coudray >Coudray</option>
			<option value=Daon >Daon</option>
			<option value=Fromenti�res >Fromenti�res</option>
			<option value=Gennes-Sur-Glaize >Gennes-Sur-Glaize</option>
			<option value=Houssay >Houssay</option>
			<option value=Laign� >Laign�</option>
			<option value=Loign�-Sur-Mayenne >Loign�-Sur-Mayenne</option>
			<option value=Longuefuye >Longuefuye</option>
			<option value=M�nil >M�nil</option>
			<option value=Marign�-Peuton >Marign�-Peuton</option>
			<option value=Orign� >Orign�</option>
			<option value=Peuton >Peuton</option>
			<option value=Saint-Denis-D'Anjou >Saint-Denis-D'Anjou</option>
			<option value=Saint-Fort >Saint-Fort</option>
			<option value=Saint-Laurent-Des-Mortiers >Saint-Laurent-Des-Mortiers</option>
			<option value=Saint-Michel-De-Feins >Saint-Michel-De-Feins</option>
			<option value=Saint-Sulpice >Saint-Sulpice</option>
			</select>	";	
		
		}
	?>

    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" bgcolor="#CCCCCC">INFORMATIONS</td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Titre</td>
    <td>&nbsp;</td>    
	<td><textarea name="titre"  cols="45" rows="1"><?php echo $Titre ; ?></textarea></td>
	
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Date</td>
    <td>&nbsp;</td>
    <td><textarea name="date"  cols="45" rows="1"><?php echo $Date ; ?> </textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Lieu</td>
    <td>&nbsp;</td>
    <td><textarea name="lieu"  cols="45" rows="1"><?php echo $Lieu ; ?> </textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top">Texte (pr&eacute;sentation, tarifs, horaire, ... )</td>
    <td>&nbsp;</td>
    <td><textarea name="texte" id="texte" cols="45" rows="5"><?php echo $Texte ; ?> </textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" bgcolor="#CCCCCC">CONTACTS</td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">T&eacute;l&eacute;phone</td>
    <td>&nbsp;</td>
    <td><textarea name="telephone"  cols="45" rows="1"><?php echo $Telephone ; ?> </textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Courriel</td>
    <td>&nbsp;</td>
    <td><input name="courriel1" type="mail" id="courriel2" size="40" value='<?php echo $Courriel1	 ; ?>' /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Site Internet</td>
    <td align="right">http://</td>
    <td><textarea name="site"  cols="45" rows="1"><?php echo $Site ; ?> </textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  
  if ($Validation != 'ok') {
      $Chiffre1 = rand(1,9) ;
      $Chiffre2 = rand(1,9) ;
      $Total = $Chiffre1 + $Chiffre2 ;
      
	  echo "<input type=hidden name=controle2 value=".$Total." />
	  
	  <tr>
		<td colspan=3 align=center bgcolor=#CCCCCC>CONTROLE</td>
		</tr>
	  <tr>
		<td align=right>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>

	  <tr>
		<td align=right><label >Combien font ".$Chiffre1." + ".$Chiffre2." ?</label></td>
		<td>&nbsp;</td>
		<td><input name=controle type=text id=controle size=40 /></td>
	  </tr>
	  <tr>
		<td align=right>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	
  <tr>
    <td align=right>Courriel servant de correspondance avec le service communication du Pays de Ch�teau-Gontier</td>
    <td>&nbsp;</td>
    <td><input name=courriel2 type=mail id=courriel2 size=40 value='".$Courriel2."' /></td>
  </tr>
  <tr>
    <td align=right>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  }
  ?>
  
  <?php
  if ($Validation == 'ok') {	
	
	echo "<tr>
	<td colspan=3 align=center bgcolor=#CCCCCC>DECISION SERVICE COM</td>
	</tr>
	<tr><td colspan=3 >&nbsp;</td></tr>";
	
	echo "<tr><td align=center valign=top colspan=2 ><input type=hidden name=IdValidation value=".$Id." /><input type=submit name=button id=button value=VALIDER /><br/><br/>Date limite d'affichage (JJ / MM / AAAA)<br/><input type=text name=jour maxlength=2 size=1 />-<input type=text name=mois maxlength=2 size=1 />-<input type=text name=annee maxlength=4 size=2 /></form></td>";
	
	echo "<td align=center valign=top ><form  name=form1 method=post action=agenda-pays-refus.php><input type=hidden name=IdRefus value=".$Id." /><input type=submit name=button id=button value=REFUSER /><br/><br/><textarea name=Refus  cols=40 rows=3></textarea></td></form></tr>";
  }
  else {
	echo "<tr><td colspan=3 align=center><input type=submit name=button id=button value=ENVOYER /></td></form></tr>";
  }
  
  ?>
  <tr>
    
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  </table>

</body>
</html>
