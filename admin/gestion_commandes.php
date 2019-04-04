<?php
require_once('../inc/init.inc.php');

//pour la sécurité:  //personne ne sera ici c pas admin
if (!isAdmin()){

    header("location:" . URL . "../index.php");  // si l'utilisateur n'est pas admin il ne poura pas rentrer dans cette page il ne pourra pas s'amuser sur l url grace à l'exit()
    exit();//provoque une erreur fatal et bloc l execution du script  
}

require_once('../inc/header.inc.php');
require_once('../inc/nav.inc.php');
$orderby ='';
$position = '';
//afficher les commandes
//tri sur les commandes
$orderby = (empty($orderby))?'c.id_commande': $_GET['orderby'];
$position = (empty($position))? 'ASC':$_GET['position'];
$mescommandes = $pdo->prepare("SELECT * FROM commande ORDER BY :position :orderby");
$mescommandes->bindParam(':position', $position,PDO::PARAM_STR);
$mescommandes->bindParam(':orderby', $orderby, PDO::PARAM_STR);
$mescommandes->execute();
//creation du tableau d'affichage des commandes 
echo $msg;
echo'<table class="table table-bordered bg-white">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>id_membre</th>
<th>montant</th>
<th>etat</th>
<th>date_enregistrement</th>
<th>Voir</th>
</tr>
</thead>';
while($commandes=$mescommandes->fetch(PDO::FETCH_ASSOC)){
	echo '<tr>' ;
	foreach($commandes as $key => $values)
	{
		echo '<td>'.$values.'</td>';   
	}  

	echo '<td><a href="commandes.php?page='.$_GET['page'].'&action=voir&id_commande='.$commandes['id_commande'].'" class="btn btn-success text-white"  > <i class="fas fa-eye"></i></a>  </td>';
	echo '</tr>' ;
}
echo '</table>';
//inclusion des éléments:
require_once('../inc/modal_mentionslegales.inc.php');
require_once('../inc/modal_conditionsdevente.inc.php');
require_once('../inc/footer.inc.php');