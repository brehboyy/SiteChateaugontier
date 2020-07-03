<?php				

		// SCRIPT RECAPTCHA GOOGLE
		$reCaptcha = new ReCaptcha($secret);
		if(isset($_POST["g-recaptcha-response"])) {
			$resp = $reCaptcha->verifyResponse(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
			);
					
			if ($resp != null && $resp->success) {			
				$nom = $_POST['nom'];
				$nom = stripslashes($nom);

				$email = $_POST['email'];

				$sujet = $_POST['sujet'];
				$sujet = stripslashes($sujet);

				$email_destinataire = $_POST['email_destinataire'];

				$texte_mail = $_POST['texte'];
				$texte_mail = stripslashes($texte_mail);
						
				$texte = "Nom :\n".$nom."\n\n";
				$texte .= "Courriel :\n".$email ;
				$texte .= "\n\nDemande :\n".$texte_mail;				
						
						
				$headers ='From: "Site - Pays de Ch�teau-Gontier"<test@test.com>'."\n";
				$headers .='Return-Path: test@test.com'."\n";
				$headers .='Reply-To: '.$email.''."\n";
				$headers .='Content-Type: text/plain; charset="utf-8"'."\n";
				$headers .='Content-Transfer-Encoding: 8bit';
								
				$email = $texte ;   
				
				mail($email_destinataire,$sujet,$texte,$headers);

				$email2 = 'test@test.com' ;
				$sujet2 = "Copie : ".$sujet." [".$email_destinataire."]";

				mail($email2,$sujet2,$texte,$headers);

				echo "Votre demande a bien &eacute;t&eacute; enregistr&eacute;e par nos services. Vous recevrez prochainement une r&eacute;ponse.<br/><br/>
				Merci.";
			
			}
				
			else {echo "CAPTCHA incorrect";}
		}   

?>
