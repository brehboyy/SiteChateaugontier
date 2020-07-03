Vous rechercher le terme suivant :
<?php

	$recherche = $_POST['rechercher'];
	
	echo "<h2>".$recherche."</h2></br/>";

	echo "R&eacute;sultat(s) :<br/><br/>";
	
	$compteur = '1' ;
	
	$requete = mysql_query("SELECT * FROM pays_page ORDER BY Numero ASC ") ; 
	while ($ligne=mysql_fetch_object($requete)) {
	
		$sortie = 'non';
	
		$titre = $ligne->Titre ;
		$page = $ligne->Numero ; 
	
		$requete1 = mysql_query("SELECT * FROM pays_bloc WHERE Page = '$page' ORDER By numero ASC ") ;
		while ($ligne1=mysql_fetch_object($requete1)) {
	
			$bloc = $ligne1->Numero ; 
	
			$requete2 = mysql_query("SELECT * FROM pays_sousbloc WHERE Type = '1' AND Texte LIKE '%$recherche%' AND Bloc = '$bloc' ") ;
			while ($ligne2=mysql_fetch_object($requete2)) {
				
				echo "- ".$compteur.". <a href=index.php?page=".$page.">".$titre."</a><br/><br/>";	
				$compteur++ ; 
				$sortie = 'oui' ;
				break ;
			}
			if ($sortie == 'oui') {
				break ;
			}
			
		}
		
	}	


	

?>