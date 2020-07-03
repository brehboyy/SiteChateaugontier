<?php

		$CompteurBandeaux = "0" ;

		$requete = mysql_query("SELECT * FROM pays_bandeaux WHERE Categorie = '$bandeau' ORDER BY Numero ASC") ;
		while ($ligne=mysql_fetch_object($requete)) {		
				
			$CompteurBandeaux++;
			
		}
		
		$BandeauPage = rand('1',$CompteurBandeaux);
		
		$CompteurBandeaux = "0" ;
		
		$requete2 = mysql_query("SELECT * FROM pays_bandeaux WHERE Categorie = '$bandeau' ORDER BY Numero ASC") ;
		while ($ligne2=mysql_fetch_object($requete2)) {		
				
			$CompteurBandeaux++;
			
			if ($CompteurBandeaux == $BandeauPage) {
			
				echo $ligne2->Nom ;
			
			}
		
		}
		
?>