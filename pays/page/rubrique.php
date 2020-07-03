<?php

$rubrique = $_GET['rubrique'] ;
$rubrique = htmlspecialchars($rubrique, ENT_QUOTES, 'UTF-8');
$rubrique = intval($rubrique);
//$requete01 = mysql_query("SELECT * FROM pays_rubrique WHERE Numero = '$rubrique' LIMIT 1 ") ;
$requete01 = $pdo->prepare("SELECT * FROM pays_rubrique WHERE Numero = ? LIMIT 1 ");
$requete01->execute(array($rubrique));
$lignes01=$requete01->fetchAll(PDO::FETCH_CLASS);
foreach ($lignes01 as $ligne01) {

	$nom = $ligne01->Nom ;
	$rubrique = $ligne01->Numero ;	
	
		echo "<table border=0 cellspacing=0 cellpadding=5 width=100%>";
		echo "<tr>";
		echo "<td colspan=2>";
		echo "<p class=titre_".$rubrique.">".$nom."</p>";
		echo "</td>";
		echo "</tr>";
		
		// Insertion des noms de page
		//$requete02 = mysql_query("SELECT * FROM pays_page WHERE Rubrique = '$rubrique' AND Menu = '1' AND Archive = '0'  ORDER BY Position DESC ") ;
		$requete02 = $pdo->prepare("SELECT * FROM pays_page WHERE Rubrique = ? AND Menu = '1' AND Archive = '0'  ORDER BY Position DESC ");
		$requete02->execute(array($rubrique));
		$lignes02=$requete02->fetchAll(PDO::FETCH_CLASS);
		foreach ($lignes02 as $ligne02) {		
		
			$page = $ligne02->Titre ;
			$numero = $ligne02->Numero ;
			
			echo "<tr>";
			echo "<td width=50>&nbsp;</td><td>";
			if ($ligne02->Numero == '1') { // La page du territoire est redirig�e vers la carte flash
					echo "<li><a href=index.php?carte>".$page."</a></li>";
			}
			/*elseif ($numero == '20') { // La page de la piscine est redirig�e vers le site des sports
							echo "<li><a href=http://www.chateaugontier.fr/sports/piscine/>".$page."</a></li>\n";
			}
			elseif ($numero == '21') { // La page des animations sportives est redirig�e vers le site des sports
							echo "<li><a href=http://www.chateaugontier.fr/sports>".$page."</a></li>\n";
			}*/
			else {
					echo "<li><a href=index.php?page=".$numero." style=\"font-size: 14px;\">".$page."</a></li>";
			}
			echo "</td>";
			echo "</tr>";
			
			echo "<tr><td>&nbsp;</td></tr>";
		
		}
		echo "</table>";	
	
}
?>


