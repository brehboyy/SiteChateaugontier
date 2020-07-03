<font face=verdana color=#106470>
<table width=90% align=center >
									<?php
								
$jour = date("d");
$mois = date("m"); 
$annee = date("Y");
										
$date_actuelle = $annee.$mois.$jour ;
								
$couleur = "#e7e7e7" ;
$AucuneEntreeAgenda = "oui" ;

$compteur = '0';
$requete = $pdo->prepare("SELECT * FROM pays_info WHERE Accueil = '1' ORDER BY Position ASC");
$requete->execute();
$lignes = $requete->fetchAll(PDO::FETCH_CLASS);	
//$requete = mysql_query("SELECT * FROM pays_info WHERE Accueil = '1' ORDER BY Position ASC") ;
foreach ($lignes as $ligne) {																												
	$dateDebut = $ligne->Debut ;
	$debut = explode("-", $dateDebut);
	$debutAnnee = $debut[0];
	$debutMois = $debut[1]; 
	$debutJour = $debut[2];


	$debut = $debutAnnee.$debutMois.$debutJour ;
												
	$dateFin = $ligne->Fin ;
	$fin = explode("-", $dateFin);
	$finAnnee = $fin[0]; 
	$finMois = $fin[1]; 
	$finJour = $fin[2]; 
											
	$fin = $finAnnee.$finMois.$finJour ;
												
	$commune= $ligne->Commune ;
	$date = $ligne->Date ;
	$objet = $ligne->Objet ;
	
											
	if ($debut <= $date_actuelle && $fin >= $date_actuelle && $compteur < '3' ) {
											
		$AucuneEntreeAgenda = "non" ;
		$compteur++;		
													
		echo "<tr><td bgcolor=".$couleur.">&gt;";
													
		if ($commune != '') {
			echo "<b>".$commune."</b><br/>";
		}
		if ($date != '') {
			echo $date."<br/>";
		}
		if ($objet != '') {
			echo $objet."<br/>";
		}	
													
		echo "</td></tr>";												
																									
		if ($couleur == '#FFFFFF') { $couleur = "#e7e7e7" ; }
		else { $couleur = "#FFFFFF" ;}											
													
		echo "<tr><td>&nbsp;</td></tr>";
	}												
																							
}
if ($AucuneEntreeAgenda == 'oui') {
	echo "<tr><td bgcolor=".$couleur.">Pas d'&eacute;v&egrave;nement &agrave; venir</td></tr>";
}
										
?>
<tr><td ><a href=index.php?agenda style="font-size:medium; color: #106470 ; text-decoration: underline ;">Découvrir l'agenda complet</a></td></tr>
										
</table>
</font>

