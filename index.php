<?php 

error_reporting(E_ALL);
//error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');

date_default_timezone_set("Europe/Berlin");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pays de Chateau-Gontier</title>

<meta name="robots" content="index, follow" />
<meta name="description" content="Bienvenue sur le site Internet de la Communaut� de communes du Pays de Chateau-Gontier. Mayenne (53)." />
<meta name="keywords" content="chateau-gontier, chateaugontier, chateau gontier, chateau, gontier, chateau-gontier, chateaugontier, chateau gontier, chateau, pays, communaute de communes, communauté, communauté de communes, communauté, mayenne, ampoigne, argenton, aze, bierne, chatelain, chemaze, coudray, daon, fromentieres, gennes, houssay, laigne, loigne, longuefuye, menil, maringe, origne, peuton, saint denis d'anjou, saint fort, saint laurent des mortiers, saint michel de feins, saint sulpice " />
<meta name="language" content="fr" />
<meta name="Author" content="Pays de Chateau-Gontier">
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';">



<?php

include('pays/acces/connect.php');
$connect;
$base;
include('pays/page/type_page.php');

/************* INTERSTICIEL *****************/
	
	// include('intersticiel.php');

?>



<!------------------------------------------------------- --------------------------->

<link href="./pays/script/style.css" rel="stylesheet" type="text/css" />
<link href="./pays/script/menu.css" rel="stylesheet" type="text/css" />
<link href="./pays/script/contenu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function Menu_Reroutage(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->

</script>


<!---------- CODE GOOGLE ANALYTICS ----------->



<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
		
require 'pays/page/recaptchalib.php';
$siteKey = '-'; // votre cl� publique
$secret = '-c'; // votre cl� priv�e
?>

</head>

<body>
<!-- CALQUE PAGE -->
<div class="page">				
				
				<?php

					if (isset($_GET['page'])) {
							$page = $_GET['page'];
							$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
							$page = intval($page);
							
							$data = $pdo->prepare("SELECT * FROM  pays_page WHERE Numero = ?");
							$data->execute(array($page));
							$lignes = $data->fetchAll(PDO::FETCH_CLASS); 
							foreach ($lignes as $ligne) {
							
								$rubrique_bandeau = $ligne->Rubrique ;
								$bandeau = $ligne->Bandeau ;
							}
					}
					else {
						$rubrique_bandeau = 1 ;
						$bandeau = 1 ;
					}
				?>
				
				<!-- CALQUE BANDEAU  -->
				<div style="width:1000px; height:200px; background-image: url(pays/bandeaux/<?php include('pays/page/bandeau.php') ; ?>.jpg);">	
					
					<!-- CALQUE BANDEAU CHARTE-->
					<div class="bandeau">
						
						<!-- CALQUE RECHERCHE -->
						<div class=recherche>
							<form id="form_recherche" name="form_recherche" method="post" action="index.php">
							<label class="recherche"><input class=recherche type="text" name="rechercher" value="Recherche ..." onFocus="this.value=''" /></label>
							<a href="#" onClick = "document.forms.form_recherche.submit()"> <img src="pays/image/bouton_ok.png" border=0 /> </a>
							</form>
						</div>
						<!-- FIN CALQUE RECHERCHE -->
						
						<!-- CALQUE COMMUNES -->
						<div class=communes>
							<form id="form_communes" name="form_communes" method="post" action="#">
											
							<select class=communes name="communes" id="communes" onchange="Menu_Reroutage('parent',this,1)">
							<option value="#">Les 23 communes</option>
							<?php
							
								//$requete01 = mysql_query("SELECT * FROM pays_commune ORDER BY Nom ASC") ;
								$requete01 = $pdo->prepare("SELECT * FROM pays_commune ORDER BY Nom ASC");
								$requete01->execute();
								$lignes01=$requete01->fetchAll(PDO::FETCH_CLASS);
								foreach ($lignes01 as $ligne01) {
									echo "<option value=index.php?page=".$ligne01->Page.">".$ligne01->Nom."</option>";
								}
								
							?>					

							</select>					
							</form>
						</div>
						<!-- FIN CALQUE COMMUNES -->
						<a href=index.php><img src=pays/image/transparent.gif border=0 height=150 width=995 ></a>
					</div>
					<!-- FIN CALQUE BANDEAU -->
				</div>
				<!-- FIN CALQUE BANDEAU CHARTE -->
				
				<!-- CALQUE MENUTOP1 -->
				<div id="menutop1">
					<!-- CALQUE MENU -->
					<div id="menu">
					
						<ul class="niveau1">

						<?php
							$compteur = "1" ;
							$requete02 = $pdo->prepare("SELECT * FROM  pays_rubrique ORDER BY Numero ASC");
							$requete02->execute();
							$lignes02 = $requete02->fetchAll(PDO::FETCH_CLASS);
							//$requete02 = mysql_query("SELECT * FROM  pays_rubrique ORDER BY Numero ASC") ;
							foreach ($lignes02 as $ligne02 ) {
								echo "<li class=sousmenu><a href=index.php?rubrique=".$ligne02->Numero."><br/><br/>&nbsp;</a>\n\n";
								echo "<ul class=niveau2_".$compteur.">\n";
								$rubrique = $ligne02->Numero ;
								$page = intval($_GET['page']);
								$requete03 = $pdo->prepare("SELECT * FROM  pays_page WHERE Rubrique = ? AND Archive = '0' ORDER BY Position DESC");
								$requete03->execute(array($page));
								$lignes03 = $requete03->fetchAll(PDO::FETCH_CLASS);
								//$requete03 = mysql_query("SELECT * FROM  pays_page WHERE Rubrique = '$rubrique' AND Archive = '0' ORDER BY Position DESC") ;
								foreach ($lignes03 as $ligne03) {
								
									$menu = $ligne03->Menu ;
									if ($menu == '1') {
									
										if ($ligne03->Numero == '1') { // La page du territoire est redirigée vers la carte flash
											echo "<li><a href=index.php?carte>".$ligne03->Titre."</a></li>\n";
										}
										/*elseif ($ligne03->Numero == '20') { // La page de la piscine est redirigée vers le site des sports
											echo "<li><a href=http://www.chateaugontier.fr/sports/piscine/ >".$ligne03->Titre."</a></li>\n";
										}
										elseif ($ligne03->Numero == '21') { // La page des animations sportives est redirigée vers le site des sports
											echo "<li><a href=http://www.chateaugontier.fr/sports>".$ligne03->Titre."</a></li>\n";
										}*/
										else {
											echo "<li><a href=index.php?page=".$ligne03->Numero.">".$ligne03->Titre."</a></li>\n";
										}
									}
									
								}
								echo "</ul>\n";
								echo "</li>\n\n";
								
								$compteur++ ;
								
							}
						
						?>
						</ul>
						
					</div>
					<!-- FIN CALQUE MENU -->
					
				</div>
                <!-- FIN CALQUE MENUTOP1 -->
				
				<!-- CALQUE CENTRE (GAUCHE ET CONTENU) -->
				<div class="centre">
						
						<!-- CALQUE GAUCHE (EDITO , AGENDA et CARTE)-->
						<div class="gauche">
						
								<!-- CALQUE RETOUR ACCUEIL -->
								<?php
									if ($TypePage != 'accueil') {
										echo "<div style=\"margin-top: 10px;\">";
										echo "<a href=index.php><img src=pays/image/retour_accueil.png border=0 ></a>";
										echo "</div>";
									}
								?>								
								<!-- FIN CALQUE RETOUR ACCUEIL -->
								
								<!-- CALQUE EDITO (EDITO_VIDE ET EDITO_TEXTE) -->
								<div class="edito">
									<!-- CALQUE EDITO_VIDE -->
									<div class="edito_vide">
									</div>
									<!-- FIN CALQUE EDITO_VIDE -->
									
									<!-- CALQUE EDITO_TEXTE -->
									<div class="edito_texte">
										
									<?php				
										include('pays/page/agenda-accueil.php');
									?>								
									
									</div>
									<!-- FIN CALQUE EDITO_TEXTE -->
									
								</div>
								<!-- FIN CALQUE EDITO -->			
								
								
								<!-- FIN CALQUE AGENDA -->
								
								<!-- CALQUE CARTE -->
								<!--<div class="carte">	
									<A HREF=index.php?carte><IMG SRC=pays/image/vide.png WIDTH=298 HEIGHT=78 BORDER=0></A>
								</div>		-->
								<!-- FIN CALQUE CARTE -->

								<!-- CALQUE LIENS CARTOUCHE -->
								<?php
								if ($TypePage != 'accueil') {							
									echo "
									<div class=liensCartouche>
									<li class=liens><a class=menutop href=index.php?page=32 />Publications</a></li><br/>
									<li class=liens><a class=menutop href=index.php?page=33 />Marchés publics</a></li><br/>
									<li class=liens><a class=menutop href=http://emploi.chateaugontier.fr target=_blank />Offres d'emploi</a></li><br/>		
									<li class=liens><a class=menutop href=index.php?plan>Plan du site</a></li><br/>
									<li class=liens><a class=menutop href=index.php?page=35 />Liens</a></li><br/>	
									<li class=liens><a class=menutop href=index.php?page=36 />Contact</a></li>													
									</div>";
								}
								?>
								
								<!-- FIN CALQUE LIENS -->
								 
						</div>
						<!-- FIN CALQUE GAUCHE -->	
						
						<!-- CALQUE CONTENU -->						
						<div class="contenu">                       
							<?php
								include('pays/page/contenu.php');
							?>
						</div>	
						<!-- FIN CALQUE CONTENU -->
						
				</div>
				<!-- FIN CALQUE CENTRE -->				
				
				<!-- CALQUE LIENS -->
				<?php
				if ($TypePage == 'accueil') {
					echo "
					<div class=liens>
					<a class=menutop href=index.php?page=32 />Publications</a>
					<a class=menutop href=index.php?page=33 />Marchés publics</a>
					<a class=menutop href=http://emploi.chateaugontier.fr target=_blank  />Offres d'emploi</a>				
					<a class=menutop href=index.php?plan>Plan du site</a>
					<a class=menutop href=index.php?page=35 />Liens</a>	
					<a class=menutop href=index.php?page=36 />Contact</a>				
					</div>";
				}
				?>
			
				<!-- FIN CALQUE LIENS -->			
				
				<!-- CALQUE BAS -->
				<div class="bas">
					<?php
					
						if ($TypePage == 'accueil') {
							echo "<div style=\"witdh:1000px; height: 200px; \">";
						}
						else {
							echo "&nbsp;";
							echo "<div style=\"witdh:1000px; height: 200px; margin-top: 10px\">";
						}
						include('pays/page/liens.php');
						echo "</div>";
					?>
					
					<div class="copyright">
					&copy; CCPCG - <a href=index.php?credit>Mentions légales</a>
					</div>
					
				</div> 
				<!-- FIN CALQUE BAS -->
			
    
</div>
<!-- FIN CALQUE PAGE -->
<?php 
/*mysql_close() ;*/
?>
</body>
</html>
