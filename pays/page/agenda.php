<font face=verdana color=#106470>
<table width=90% align=center >
									<?php
								
										$jour = date("d");
										$mois = date("m"); 
										$annee = date("Y");
										
										$date_actuelle = $annee.$mois.$jour ;
								
										$couleur = "#e7e7e7" ;
										$AucuneEntreeAgenda = "oui" ;
								
										$requete = mysql_query("SELECT * FROM pays_info WHERE Accueil = '1' ORDER BY Position ASC") ;
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
											
											$commune= $ligne->Commune ;
											$date = $ligne->Date ;
											$objet = $ligne->Objet ;
											$lieu = $ligne->Lieu ;
											$tel = $ligne->Tel ;
											$texte = $ligne->Texte ;
											$email = $ligne->Email ;
											$site = $ligne->Site ;
											
											if ($debut <= $date_actuelle && $fin >= $date_actuelle ) {
											
												$AucuneEntreeAgenda = "non" ;												
												
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
												if ($lieu != '') {
													echo $lieu."<br/>";
												}
												if ($texte != '') {
													echo $texte."<br/>";
												}
												if ($tel != '') {
													echo "<i>Tel : ".$tel."</i><br/>";
												}
												if ($email != '') {
													echo $email."<br/>";
												}
												if ($site != '') {
													echo "<a href=http://".$site." target=_blank>".$site."</a>" ;
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
										
</table>
</font>

