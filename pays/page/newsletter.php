<?php				
	
if (isset($_GET['email'])) {	
	$email = $_GET['email'];
}
	
if (isset($_GET['inscription'])) {
	
	if (isset($_GET['accord'])) {			
				
		mysql_query("INSERT INTO `newsletter_mail` ( `Email` ) VALUES ( '$email');");
		
		echo "Votre demande a bien &eacute;t&eacute; enregistr&eacute;e par nos services. Vous recevrez prochainement la newsletter.<br/><br/>
		Merci.";
	}
	else {
		
		echo "Pour valider votre inscription, veuillez cocher la case attestant que vous d&eacute;sirez bien recevoir la newsletter.<br/><br/>
		Merci.<br/><br/>
		<a href=index.php?page=154>Retour formulaire d'inscription</a>
		";
	
	}
	
}
elseif (isset($_GET['annulation'])) {
	
	mysql_query("delete from newsletter_mail where Email = '$email'");		
	
	echo "Votre demande a bien &eacute;t&eacute; enregistr&eacute;e par nos services. Vous ne recevrez plus la newsletter<br/><br/>
	Merci.";
	
}
								
?>
