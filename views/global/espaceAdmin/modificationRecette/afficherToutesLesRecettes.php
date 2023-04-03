<?php 

include('views/communs/menu.php');

/*if(isset($message))
{
    echo $message;
}  */
?>

<h2 class="text-uppercase text-center mb-5">Choisir une recette dans la liste</h2>
<h4> Il y'a  <?=$nombreRecette?> recette </h4>

<table class="table table-striped table-bordered table-hover"  >
    <thead class="table-danger">
        <tr>
            <th>Nom </th><span>
            <th>Photo </th>
            <th>Description </th>
        
        </tr>
    </thead>

<?php
$ligne = $resultAfficherToutesLesRecettes->fetchAll(PDO::FETCH_NUM);
echo "<tr>";
foreach($ligne as $valeur)
{
	echo " <td>$valeur[3]</td>";
    echo "<td><img src=$valeur[4] height='100' width='200'></td>";
	//echo " <td>$valeur[3]</td>";
	echo " <td>$valeur[5]</td>";
 
   
   
   
?>

<td><a href="controllerAdmin/afficherUneRecette/<?=$valeur[0]?>">Modifier</a></td>
<td><a href="controllerAdmin/supprimerUneRecette/<?=$valeur[0]?>">Supprimer</a></td>

<?php

	echo "<tr>";
}
echo "</table></center>";








?>

<div> <a href='controllerEspaceMembre/pageAdmin' class=" justify-content-center btn btn-success btn-block btn-lg gradient-custom-4 text-body">Revenir à la page d'accueil d'admin</a>
</div>

<?php

require('views/communs/footer.php');

?>

