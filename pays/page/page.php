<!---------------------------->
<!-- SCRIPT TEXTE DES LIENS -->
<!---------------------------->
<style type="text/css">
.popperlink { POSITION: absolute; VISIBILITY: hidden }
</style>

<DIV class=popperlink id=topdecklink></DIV>

<script type="text/javascript" src="./pays/script/cadre_lien.js"></script>

<!------------------------------>
<!------------------------------>

<?php

$requete01 = $pdo->prepare("SELECT * FROM pays_page WHERE Numero = ?");
$requete01->execute(array($page));
$lignes01 = $requete01->fetchAll(PDO::FETCH_CLASS);
foreach ($lignes01 as $ligne01) {

	$titre = $ligne01->Titre ;
	$rubrique = $ligne01->Rubrique ;
}

echo "
<p class=titre_".$rubrique."><img src=pays/image/fleche_".$rubrique.".gif />&nbsp;".$titre."&nbsp;<img src=pays/image/fin_titre_".$rubrique.".gif /></p>


";

	include('pays/page/bloc.php') ;

	if (isset($_GET['impression'])) {

	}
	
	else {		
			echo "
			<div class=outils>
			<a target=_blank href=imprimer.php?impression&page=".$page." onMouseOver=\"poplink('Imprimer cet article');\" onmouseout=\"killlink()\" ><img alt='Imprimer cet article' border=0 src=pays/image/picto_imprimer.gif /></a>&nbsp;
			<a href=index.php?page=".$page."&ami onMouseOver=\"poplink('Recommander cet article &agrave; un ami');\" onmouseout=\"killlink()\" ><img alt='Envoyer cet article � un ami' border=0 src=pays/image/picto_envoyer_ami.gif /></a>&nbsp;
			</div>
			";
			
	}

?>

