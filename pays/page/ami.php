<?php

$email = $_POST['email'] ;
$nom = $_POST['nom'] ;
$page = $_POST['page'] ;

$texte = $nom.", vous recommande l'article suivant sur le site Internet du Pays de Ch&acirc;teau-Gontier :\n\nhttp://www.chateaugontier.fr/index.php?page=".$page ;


				$headers ='From: "Site - Pays de Ch�teau-Gontier"<test@test.com>'."\n";
				$headers .='Return-Path: test@test.com'."\n";
				$headers .='Reply-To: test@test.com'."\n";
				$headers .='Content-Type: text/plain; charset="utf-8"'."\n";
				$headers .='Content-Transfer-Encoding: 8bit';
						
				$sujet = "Pays de Ch�teau-Gontier";	
					
				mail($email,$sujet,$texte,$headers);		
			

echo "<p class=texte1_paragraphe>L'article a bien &eacute;t&eacute; envoy&eacute; &agrave; l'adresse email suivante : ".$email."</p> ";

include('page/page.php');
?>


