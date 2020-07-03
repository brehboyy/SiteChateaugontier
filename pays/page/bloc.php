<?php
	//$requete02 = mysql_query("SELECT * FROM pays_bloc WHERE Page = '$page' ORDER BY Position ASC ") ;
	$requete02 = $pdo->prepare("SELECT * FROM pays_bloc WHERE Page = ? ORDER BY Position ASC ");
	$requete02->execute(array($page));
	$lignes02 = $requete02->fetchAll(PDO::FETCH_CLASS);
	foreach ($lignes02 as $ligne02) {
	
		$bloc = $ligne02->Numero ;
		$position_bloc = $ligne02->Position ;
	
		$type_bloc = $ligne02->Type ;
		if ($type_bloc == '1') {
			echo "
			<table width=666 border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td width=666 align=center>";
			
			$position = "1";
			$action = "ajout";
			include('sousbloc.php');
			
			echo "
			</td>
			</tr>
			</table><br/>";
		
		}
		/************** 2 COLONNES *******************/
		elseif ($type_bloc == '2') {
		
			echo "
			<table width=666 border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td width=333 align=center>";
			
			$position = "1";
			$action = "ajout";
			include('sousbloc.php');
			
			echo "
			</td>
			<td width=333 align=center>";
			
			$position = "2";
			$action = "ajout";
			include('sousbloc.php');
			
			echo "
			</td>			
			</tr>			
			</table><br/>";
		
		}
		/********************* 3 COLONNES *******************/
		else {
		
			echo "
			<table width=666 border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td width=222 align=center>";
			
			$position = "1";
			$action = "ajout";
			include('sousbloc.php');
			
			echo "
			</td>
			<td width=222 align=center>";
			
			$position = "2";
			$action = "ajout";
			include('sousbloc.php');
			
			echo "
			</td>
			<td width=222 align=center>";
			
			$position = "3";
			$action = "ajout";
			include('sousbloc.php');
			
			echo "
			</td>			
			</tr>			
			
			</table><br/>";
		
		}
	
	}

?>
