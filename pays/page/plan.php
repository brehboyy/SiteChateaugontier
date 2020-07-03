<table border=0 cellspacing=0 cellpadding=0 width=100%>

<?php

$colonne = '1' ;

$requete01 = mysql_query("SELECT * FROM pays_rubrique ORDER BY Numero ASC ") ;
while ($ligne01=mysql_fetch_object($requete01)) {

	$nom = $ligne01->Nom ;
	$rubrique = $ligne01->Numero ;
	
	if ($colonne == '1') {
		echo "<tr valign=top>";
	}
	echo "<td width=230>";
	
		echo "<table border=0 cellspacing=0 cellpadding=5>";
		echo "<tr>";
		echo "<td>";
		echo "<p class=titre_".$rubrique.">".$nom."</p>";
		echo "</td>";
		echo "</tr>";
		
		// Insertion des noms de page
		$requete02 = mysql_query("SELECT * FROM pays_page WHERE Rubrique = '$rubrique' AND Menu = '1' AND Archive = '0'  ORDER BY Position DESC ") ;
		while ($ligne02=mysql_fetch_object($requete02)) {		
		
			$page = $ligne02->Titre ;
			$numero = $ligne02->Numero ;
			
			echo "<tr>";
			echo "<td>";
			if ($ligne02->Numero == '1') { // La page du territoire est redirigée vers la carte flash
					echo "<a href=index.php?carte>".$page."</a>";
			}
			else {
					echo "<a href=index.php?page=".$numero.">".$page."</a>";
			}
			echo "</td>";
			echo "</tr>";
		
		}
		echo "</table>";
		
		
	echo "</td>";
	
	if ($colonne == '3') {
		echo "</tr>";
		$colonne = '0';
	}
	$colonne++;	
	
}
?>

</table>

