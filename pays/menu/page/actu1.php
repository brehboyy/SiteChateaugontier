<?php

								$jour = date("d");
								$mois = date("m");
								$annee = date("Y");
								
								$date_actuelle = $annee.$mois.$jour ;
								
								$compteur = '1' ;

								$requete = mysql_query("SELECT * FROM pays_page WHERE Accueil = '1' AND Type != '4' AND Archive = '0' ORDER BY Position DESC") ;
								while ($ligne=mysql_fetch_object($requete)) {
																
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
									
									$titre = $ligne->Titre ;
									$photomini_accueil = $ligne->Photomini_accueil ;
									
									if ($photomini_accueil == '') {
										$photomini_accueil = "logo" ;
									}									
								
									if ($debut <= $date_actuelle && $fin >= $date_actuelle ) {										
											
										echo "
										<li><a href=# rel=nofollow title='".$titre."'><img src=../lib/images/photos/mini/".$photomini_accueil.".jpg alt=[Alternative text] /></a></li>
										";
										
									}
								}

?>